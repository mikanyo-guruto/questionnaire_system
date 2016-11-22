<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>サイトタイトル</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="format-detection" content="telephone=no,email=no">

<link rel="stylesheet" href="../assets/style/normalize.css">
<link rel="stylesheet" href="../assets/style/style.css">

<meta name="description" content="サイトの説明文">
<meta name="keywords" content="カンマで区切ってキーワード">

<meta http-equiv="Content-Style-Type" content="text/css">

<!--[if lte IE 9]>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!--[if gt IE 9]><!-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../assets/script/script.js"></script>
<!--<![endif]-->
<!-- drawer.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css">
<!-- jquery & iScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<!-- drawer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
</head>

<body class="drawer drawer--right notop ranking">
	<header role="banner">
		<h1><a href="/"><img src="../assets/images/techlogo.png" alt=""></a></h1>
		<h2>ランキング</h2>
		<button type="button" class="drawer-toggle drawer-hamburger">
			<span class="sr-only">toggle navigation</span>
			<span class="drawer-hamburger-icon"></span>
		</button>
		<nav class="drawer-nav" role="navigation">
			<ul class="drawer-menu">
				<li class="drawer-brand">Menu</li>
				<li><a class="drawer-menu-item" href="/">Top</a></li>
				<li><a class="drawer-menu-item" href="/list/game">Gameワールド</a></li>
				<li><a class="drawer-menu-item" href="/list/illust">Illustワールド</a></li>
				<li><a class="drawer-menu-item" href="/list/it">ITワールド</a></li>
				<li><a class="drawer-menu-item" href="/ranking/index">ランキング</a></li>
			</ul>
		</nav>
	</header>
	<main role="main">
			<h2>総合ランキング</h2>
			<div>
			<ul class="afcf">
				@if(!empty($ary))
					<?php $i = 0; ?>
					@foreach($ary as $key)
						<?php $class = checkclass($i); ?>
						<?php echo $i; ?>
						<li class="<?php echo $class; ?>">
							<img src="../assets/images/<?php echo $class; ?>.png" alt="">
							<a href="$">
								<figure>
									<img src="../assets/{{$key->img}}" alt="">
									<figcaption>{{$key->product_name}}</figcaption>
								</figure>
							</a>
						</li>
						<?php $i++; ?>
					@endforeach
				@else					
					<p>作品がまだ評価されていません</p>
				@endif
			</ul>
			<a href="/ranking/all"><p>もっと見る</p></a>

			<h2>ゲームランキング</h2>
			<div class="afcf">
			<ul class="afcf">
				@if(!empty($ary))
					<?php $i = 0; ?>
					@foreach($ary as $key)
						<?php $class = checkclass($i); ?>
						<li class="<?php echo $class; ?>">
							<img src="../assets/images/<?php echo $class; ?>.png" alt="">
							<a href="$">
								<figure>
									<img src="../assets/{{$key->img}}" alt="">
									<figcaption>{{$key->product_name}}</figcaption>
								</figure>
							</a>
						</li>
						<?php $i++; ?>
					@endforeach
				@else					
					<p>作品がまだ評価されていません</p>
				@endif
			</ul>
			<a href="/ranking/game"><p>もっと見る</p></a>

			<h2>イラストランキング</h2>
			<div class="afcf">
			<ul class="afcf">
				@if(!empty($ary))
					<?php $i = 0; ?>
					@foreach($ary as $key)
						<?php $class = checkclass($i); ?>
						<li class="<?php echo $class; ?>">
							<img src="../assets/images/<?php echo $class; ?>.png" alt="">
							<a href="$">
								<figure>
									<img src="../assets/{{$key->img}}" alt="">
									<figcaption>{{$key->product_name}}</figcaption>
								</figure>
							</a>
						</li>
						<?php $i++; ?>
					@endforeach
				@else					
					<p>作品がまだ評価されていません</p>
				@endif
			</ul>
			<a href="/ranking/illust"><p>もっと見る</p></a>

			<h2>ITランキング</h2>
			<div class="afcf">
			<ul class="afcf">
				@if(!empty($ary))
					<?php $i = 0; ?>
					@foreach($ary as $key)
						<?php $class = checkclass($i); ?>
						<li class="<?php echo $class; ?>">
							<img src="../assets/images/<?php echo $class; ?>.png" alt="">
							<a href="$">
								<figure>
									<img src="../assets/{{$key->img}}" alt="">
									<figcaption>{{$key->product_name}}</figcaption>
								</figure>
							</a>
						</li>
						<?php $i++; ?>
					@endforeach
				@else					
					<p>作品がまだ評価されていません</p>
				@endif
			</ul>
			</div>
			<a href="/ranking/it"><p>もっと見る</p></a>
	</main>

	<?php
		function checkclass ($i) {
			$class = null;
			switch ($i) {
				case 0:
					$class = "gold";
					break;
				
				case 1:
					$class = "silver";
					break;

				case 2:
					$class = "bronze";
					break;
			}
			return $class;
		}
	?>
<!-- <footer role="contentinfo"></footer> -->
</body>