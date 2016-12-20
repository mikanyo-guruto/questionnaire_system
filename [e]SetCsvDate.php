<?php 
class SetCsvDate
{
			
	private $dsn = 'mysql:dbname=questionnaire_system;host=localhost;charset=utf8mb4';
	private $usr = 'root';
	private $pas = '';
	
	private $products = array();
	private $members = array();
		
	/*
		### CSVファイルを読み込むプログラム
		実行すると、このプログラムを配置しているディレクトリの[csv_date]ディレクトリを参照
	*/
	public function getCsvData()
	{
		$file_path = __DIR__ . '\csv_date\\';
		$dir = new DirectoryIterator($file_path);
		
		/*
			# csvを格納する配列
			recodes = 作品テーブルに保存するデータ
			name = メンバーテーブルに保存するデータ
		*/
		$recodes = array();
		$name = array();
		$i = 0;
		foreach ($dir as $fileInfo) {
			if(true === $fileInfo->isDot()) continue;

			// windowsだとファイルの名前がshift-jisなのでエンコード
			$file = mb_convert_encoding($fileInfo->getFilename(), "UTF-8", "shift-jis");

			// csvの展開
			$date = new SplFileObject($file_path . $file);
			$date->setFlags(SplFileObject::READ_CSV);
			
			/*
				# csvのデータを配列に格納
				i = カラムのスキップ用
				*製作者の名前はname配列で取得
			*/
			$j = 0;
			foreach ($date as $line) {

				// csvの中身をUTF8にエンコード
				mb_convert_variables("UTF-8", "SHIFT-JIS", $line);
				// カラムと空白行をスキップ
				if($j == 0 || empty($line[0])) {
					$j++;
					continue;
				}
				
				$delegate = strstr($line[1], "\n", true);
				
				// 名前の部分は別テーブルなので別の配列に格納
				$name[] = explode("\n", $line[1]);
				// メンバー全員の配列を削除
				unset($line[1]);

				// カラムの指定
				$recodes[$i]['product_name'] = $line[0];
				$recodes[$i]['delegate'] = $delegate;
				$recodes[$i]['img'] = $line[2];
				$recodes[$i]['genre'] = $line[3];
				$recodes[$i]['period'] = $line[4];
				$recodes[$i]['overview'] = $line[5];

				$j++;
			}
			$i++;
		}
		$this->products = $recodes;
		$this->members = $name;
	}
	
	// 作品と関連するメンバーを仮のCSVに保存
	public function insertTmpCsv() {

		$file_product = new SplFileObject('temp_weare_products.csv', 'w');
		$file_member = new SplFileObject('temp_weare_members.csv', 'w');

		// カラムの設定
		$col = Array("tmp_id", "product_name", "delegate", "img", "genre", "period", "overview");
		$file_product->fputcsv($col);
		$col = Array("product_id", "name");
		$file_member->fputcsv($col);

		$products = $this->products;
		$members = $this->members;
		
		// csvへ挿入
		try{
			// 作品の挿入
			foreach($products as $key => $val) {
				$tmp = Array();
				array_push($tmp, $key);
				foreach($val as $col) {
					array_push($tmp, $col);
				}
				mb_convert_variables('SJIS-win', 'UTF-8', $tmp);
				$file_product->fputcsv($tmp);
			}
			
			// メンバーの挿入
			foreach($members as $key => $val) {
				foreach($val as $col) {
					$tmp = Array($key, $col);
					mb_convert_variables('SJIS-win', 'UTF-8', $tmp);
					$file_member->fputcsv($tmp);
				}
			}
			
			return true;
		}catch(Exception $e){
			return false;
		}
	}
	
	// DBに取得したデータをINSERT
	public function insertDb() {
		
		try {
			$db = new PDO($this->dsn, $this->usr, $this->pas);
			
			// tempcsvの読み込み
			$products = new SplFileObject('temp_weare_products.csv');
			$products->setFlags(SplFileObject::READ_CSV);
			$members = new SplFileObject('temp_weare_members.csv');
			$members->setFlags(SplFileObject::READ_CSV);
			
			// パラメータの設定
			$query_product = 'INSERT INTO products (product_name, delegate, img, genre, period, overview) VALUES (:product_name, :delegate, :img, :genre, :period, :overview)';
			$query_member = 'INSERT INTO members (product_id, name) VALUES (:product_id, :name)';
			$stmt_product = $db->prepare($query_product);
			$stmt_member = $db->prepare($query_member);

			// 作品テーブルへインサート
			$i = 0;
			foreach($products as $row) {
				
				if($i > 0) {
					
					if($row[0] == null) continue;
					
					mb_convert_variables('UTF-8', 'SJIS-win', $row);
					
					$params = ['product_name', 'delegate', 'img', 'genre', 'period', 'overview'];
					$tmp_product_id = $row[0];
					
					$j = 1;
					foreach($params as $p) {
						$stmt_product->bindValue(":{$p}", $row[$j], PDO::PARAM_STR);
						$j++;
					}
					
					$flg_product = $stmt_product->execute();
					
					if($flg_product) {
						// インサートした時のIDを取得
						$id = $db->lastInsertId('id');
						
						// 仮csvデータからidに関連するメンバーを取得
						$j = 0;
						$tmp_members = Array();
						foreach($members as $key) {
							if($j > 0) {
								// もしtmp_product_idと一致していたら
								if($tmp_product_id == $key[0]) {
									array_push($tmp_members, $key[1]);
								}
							}
							$j++;
						}
						
						mb_convert_variables('UTF-8', 'SJIS-win', $tmp_members);

						// メンバーテーブルへインサート
						foreach($tmp_members as $row) {
							$stmt_member->bindValue(':product_id', $id, PDO::PARAM_STR);
							$stmt_member->bindValue(':name', $row, PDO::PARAM_STR);
							$flg_member = $stmt_member->execute();
							
							if(!$flg_member) {
								echo "[ERROR] Member Insert Error";
								continue;
							}
						}
					}else{
						echo "[ERROR] Product Insert Error";
						continue;
					}
				}
				$i++;
			}
		}catch (PDOException $e){
			print('[ERROR]' . $e->getMessage());
			die();
		}
	}
	
}
$product = new SetCsvDate();
$recodes = $product->getCsvData();
$product->insertTmpCsv();
//$product->insertDb();
