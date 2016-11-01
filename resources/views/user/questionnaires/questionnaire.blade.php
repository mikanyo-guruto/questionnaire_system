<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アンケート</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="format-detection" content="telephone=no,email=no">

<link rel="stylesheet" href="{{{asset('assets/css/user/normalize.css')}}}">
<link rel="stylesheet" href="{{{asset('assets/css/user/style.css')}}}">

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
<script type="text/javascript" src="{{{asset('assets/js/user/script.js')}}}"></script>
<!--<![endif]-->
<!-- drawer.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css">
<!-- jquery & iScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<!-- drawer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
</head>

<body class="drawer drawer--right notop world illust">
	<header role="banner">
		<h1><a href="/"><img src="{{{asset('assets/images/techlogo.png')}}}" alt=""></a></h1>
		<h2>アンケート</h2>
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
		<form>
		@if(!empty($ary))
			@foreach($ary as $key)
				<p>{{$key->content}}</p>
				@if($key->type=="radio")
					<input type="radio">良い
					<input type="radio">普通
					<input type="radio">悪い
				@elseif($key->type=="text")
					<input type="text"> 
				@endif
			@endforeach
		@else
			<p>今年のアンケートはまだ実装されていません</p>
		@endif
		</form>
	</main>
<!-- <footer role="contentinfo"></footer> -->
</body>
