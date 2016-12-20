<?php
class QRcode
{	
	
	private $dsn = 'mysql:dbname=questionnaire_system;host=localhost;charset=utf8mb4';
	private $usr = 'root';
	private $pas = '';
	
	public function getAll() {
		// pathの指定
		$server = "http://localhost/csv";
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

$qr = new QRcode();
$data = $qr->getAll();
?>
<html>
<style>
* {
	margin: 0 auto;
	padding: 0;
}
.wrap {
	height: 1060px;
	width: 750px;
}
.contents {
	float: left;
	height: 212px;
	text-align: center;
	width: 250px;
}
</style>
<body>
<div class="wrap">
	<?php
		$i=1;
		foreach($data as $key) { 
	?>
		<div class="contents main<?php echo $i; ?>">
		<img src="<?php echo $key['img']; ?>">
		<p><?php echo $key['product_name']; ?></p>
		</div>
	<?php
			$i++;
		}
	?>
</div>
</body>
</html>


