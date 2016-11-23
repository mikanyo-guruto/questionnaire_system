<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>WeAreTECH.C.</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="format-detection" content="telephone=no,email=no">

<link rel="stylesheet" href="assets/css/user/normalize.css">
<link rel="stylesheet" href="assets/css/user/style.css">

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
<script type="text/javascript" src="assets/js/user/script.js"></script>
<!--<![endif]-->
<!-- drawer.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css">
<!-- jquery & iScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<!-- drawer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
</head>

<body class="drawer drawer--right top">
	<header role="banner">
		<h1><img src="assets/images/toplogo.svg" alt=""></h1>
		<button type="button" class="drawer-toggle drawer-hamburger">
			<span class="sr-only">toggle navigation</span>
			<span class="drawer-hamburger-icon"></span>
		</button>
		<nav class="drawer-nav" role="navigation">
			<ul class="drawer-menu">
				<li class="drawer-brand"><p>Menu</p></li>
				<li><a class="drawer-menu-item" href="{{{url('/')}}}">Top</a></li>
				<li><a class="drawer-menu-item" href="world/game">Gameワールド</a></li>
				<li><a class="drawer-menu-item" href="world/illust">Illustワールド</a></li>
				<li><a class="drawer-menu-item" href="world/it">ITワールド</a></li>
				<li><a class="drawer-menu-item" href="ranking/ranking_all">ランキング</a></li>
			</ul>
		</nav>
	</header>
	<main role="main">
		<div class="ranking">
			<h2>ランキング速報</h2>
			<ul>
				<li class="afcf"><a href="#"><p>1位</p><span>タイトル</span></a></li>
				<li class="afcf"><a href="#"><p>2位</p><span>作品名</span></a></li>
				<li class="afcf"><a href="#"><p>3位</p><span>OOOO</span></a></li>
			</ul>
		</div>
		<div class="contents afcf">
			<!-- <ul>
				<li class="game"><a href="world/game.html"><p>ゲーム</p></a></li>
				<li class="illust"><a href="world/illust.html">イラスト</a></li>
				<li class="it"><a href="world/it.html">IT</a></li>
			</ul> -->
			<ul>
				<li class="game"><a href="list/game"><img src="assets/images/game.svg" alt=""></a></li>
				<li class="illust"><a href="list/illust"><img src="assets/images/illust.svg" alt=""></a></li>
				<li class="it"><a href="list/it"><img src="assets/images/it.svg" alt=""></a></li>
			</ul>
		</div>
		<div class="question">
			<h2>会場アンケートにご協力お願いします</h2>
			<!-- <a href="#"><p>会場アンケート</p></a> -->
			<a href="#"><p><img src="assets/images/ollanke.svg" alt=""></p></a>
		</div>
	</main>
<!-- <footer role="contentinfo"></footer> -->

</body>
