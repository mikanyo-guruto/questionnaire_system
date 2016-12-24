<?php

require __DIR__ . '\\conf.php';

class QRcode
{
	private $host;
	private $dsn;
	private $usr;
	private $pas;

	function __construct($host, $dsn, $usr, $pas) {
		$this->host = $host;
		$this->dsn = $dsn;
		$this->usr = $usr;
		$this->pas = $pas;
	}

	public function getAll() {
		// pathの指定
		$lib_path = "./qr_img0.50j/php/qr_img.php?d=";
		$url = "http://" . $this->host . "/techc/public/user/list/detail/";

		// queryの実行
		$dbh = new PDO($this->dsn, $this->usr, $this->pas);
		$query = 'SELECT id, product_name, genre FROM products';
		$stmt = $dbh->query($query);

		// 配列へ格納
		$qr_data = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// QRコードライブラリのURL+作品URL
			$img_path = $lib_path . $url . "/". $row['id'];
			$tmp = array('url'=>NULL, 'img'=>NULL);
			$tmp['product_name'] = $row['product_name'];
			$tmp['img'] = $img_path;
			array_push($qr_data, $tmp);
		}
		return $qr_data;
	}
}
$qr = new QRcode($host, $dsn, $usr, $pas);
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


