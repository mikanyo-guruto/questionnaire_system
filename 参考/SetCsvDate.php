<?php 
class SetCsvDate
{
			
	private $dsn = 'mysql:dbname=questionnaire_system;host=localhost;charset=utf8mb4';
	private $usr = 'root';
	private $pas = '';
	
	/*
		### CSVファイルを読み込むプログラム
		実行すると、このプログラムを配置しているディレクトリの[csv_date]ディレクトリを参照
	*/
	public function setAllDate()
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
				// 名前の部分は別テーブルなので別の配列に格納
				$name[] = explode("\n", $line[2]);
				// メンバー全員の配列を削除
				unset($line[2]);

				// カラムの指定
				$recodes[$i]['product_name'] = $line[0];
				$recodes[$i]['delegate'] = $line[1];
				$recodes[$i]['img'] = $line[3];
				$recodes[$i]['genre'] = $line[4];
				$recodes[$i]['period'] = $line[5];
				$recodes[$i]['overview'] = $line[6];

				$j++;
			}
			$i++;
		}
		// --- ここまでがCSV取得処理 --- //

		// DBに取得したデータをINSERT
		try {
			$db = new PDO($this->dsn, $this->usr, $this->pas);
			
			$query_product = 'INSERT INTO products (product_name, overview, genre, img, period, delegate) VALUES (:product_name, :overview, :genre, :img, :period, :delegate)';
			$query_member = 'INSERT INTO members (product_id, name) VALUES (:product_id, :name)';
			$i = 0;
			
			// 作品テーブルへインサート
			foreach($recodes as $row) {

				$stmt_product = $db->prepare($query_product);
				$stmt_product->bindValue(':product_name', $row['product_name'], PDO::PARAM_STR);
				$stmt_product->bindValue(':overview', $row['overview'], PDO::PARAM_STR);
				$stmt_product->bindValue(':genre', $row['genre'], PDO::PARAM_STR);
				$stmt_product->bindValue(':img', $row['img'], PDO::PARAM_STR);
				$stmt_product->bindValue(':period', $row['period'], PDO::PARAM_STR);
				$stmt_product->bindValue(':delegate', $row['delegate'], PDO::PARAM_STR);
				$flg_product = $stmt_product->execute();

				// 作品テーブルへ登録が成功した処理
				if($flg_product) {
					// インサートした時のIDを取得
					$id = $db->lastInsertId('id');
					foreach($name[$i] as $row) {
						// メンバーテーブルへインサート
						$stmt_member = $db->prepare($query_member);
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
				$i++;
			}
		}catch (PDOException $e){
			print('[ERROR]' . $e->getMessage());
			die();
		}
	}
	
	public function getQrAll() {
		// pathの指定
		$server = "http://localhost/Test";
		$lib_path = "./qr_img0.50j/php/qr_img.php?d=";
		$url = "http://dev2.m-fr.net/mikanyo-guruto/techc/public/user/list/detail/";
		$qr_data = array();
		
		// DBへアクセス
		$db = new PDO($this->dsn, $this->usr, $this->pas);
		$query = 'SELECT id, product_name, genre FROM products';
		$stmt = $db->query($query);
		
		// 配列へ格納
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// QRコードライブラリのURL+作品URL
			$img_path = $server . $lib_path . $url . "/". $row['id'];
			$tmp = array('url'=>NULL, 'img'=>NULL);
			$tmp['product_name'] = $row['product_name'];
			$tmp['img'] = $img_path;
			array_push($qr_data, $tmp);
		}
		return $qr_data;
	}
}
$product = new SetCsvDate();
$product->setAllDate();
//$qr_ary = $product->getQrAll();
?>
<html>
<body>
	<?php
		$i=1;
		foreach($qr_ary as $key) { 
	?>
		<div class="main<?php echo $i; ?>">
		<img src="<?php echo $key['img']; ?>">
		<p><?php echo $key['product_name']; ?></p>
		</div>
	<?php
		$i++;
		}
	?>
</body>
</html>

