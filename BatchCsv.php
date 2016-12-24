<?php
	$dsn = 'mysql:dbname=questionnaire_system;host=localhost;charset=utf8mb4';
	$usr = 'root';
	$pas = '';
	$dbh = new PDO($dsn, $usr, $pas);
	
	// tableをtruncate
	$query = "TRUNCATE TABLE products";
	$dbh->query($query)->fetch(PDO::FETCH_ASSOC);
	$query = "TRUNCATE TABLE members";
	$dbh->query($query)->fetch(PDO::FETCH_ASSOC);
	
	// CSVファイルから情報を取得
	$file_path = __DIR__ . '\\csv_data\\';
	$dir = new DirectoryIterator($file_path);
	
	// エラー時のファイル格納用	
	$error_log = array();

	foreach($dir as $fileInfo) {
		
		if(true === $fileInfo->isDot()) continue;

		$csv = new SplFileObject($file_path . $fileInfo->getFilename());
		$csv->setFlags(SplFileObject::READ_CSV);
		
		// CSVファイルから情報を取得
		$i = false;
		foreach($csv as $row) {

			if($row[0] == null) continue;
			
			mb_convert_variables("UTF-8", "SHIFT-JIS", $row);

			if($i) {
				// 値の取得
				$product_name = $row[0];
				$delegate = strstr($row[1], "\n", true);
				$img = $row[2];
				$genre = $row[3];
				$period = $row[4];
				$overview = $row[5];
				
				// バリデート			
				$error_msg = $fileInfo->getFilename();
				
				// ジャンル
				switch(mb_strtolower(mb_convert_kana($genre, "r"))) {
					case "it":
						$genre = "it";
						break;
					case "game":
						$genre = "game";
						break;
					case "illust":
						$genre = "illust";
						break;
					default:
						array_push($error_log, "[ERROR]validation(genre) : " . $error_msg);
						continue;
				}

				// 値をセット
				$product = array($product_name, $delegate, $img, $genre, $period, $overview);
				$member = explode("\n", $row[1]);
				
				// productsテーブルにinsert
				$query_product = 'INSERT INTO products (product_name, delegate, img, genre, period, overview) VALUES (:product_name, :delegate, :img, :genre, :period, :overview)';
				$query_member = 'INSERT INTO members (product_id, name) VALUES (:product_id, :name)';
				$stmt_product = $dbh->prepare($query_product);
				$stmt_member = $dbh->prepare($query_member);
				
				$params = ['product_name', 'delegate', 'img', 'genre', 'period', 'overview'];
				
				$j = 0;
				foreach($params as $p) {
					$stmt_product->bindValue(":{$p}", $product[$j], PDO::PARAM_STR);
					$j++;
				}
				
				if($stmt_product->execute()) {
					// membersテーブルにinsert
					$id = $dbh->lastInsertId('id');
					
					foreach($member as $m) {
						$stmt_member->bindValue(':product_id', $id, PDO::PARAM_STR);
						$stmt_member->bindValue(':name', $m, PDO::PARAM_STR);
						if($stmt_member->execute()) {
							// 成功
						}else{
							array_push($error_log, "[ERROR]insertError : " . $error_ms);
							continue;
						}
					}
				}else{
					array_push($error_log, "[ERROR]insertError : " . $error_msg);
					continue;
				}
			}
			$i = true;
		}
	}

	if(empty($error_log)) {
		echo "成功";
	}else{
		foreach ($error_log as $key) {
			# code...
			echo $key . '<br/>';
		}
	}