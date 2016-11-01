<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>
	@if($genre=="illust")
		イラスト
	@elseif($genre=="game")
		ゲーム
	@elseif($genre=="it")
		IT
	@endif
	ワールド
</title>

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
		<h1><a href="/"><img src="../../assets/images/techlogo.png" alt=""></a></h1>
		<h2>
			@if($genre=="illust")
				イラスト
			@elseif($genre=="game")
				ゲーム
			@elseif($genre=="it")
				IT
			@endif
			ワールド
		</h2>
		<button type="button" class="drawer-toggle drawer-hamburger">
			<span class="sr-only">toggle navigation</span>
			<span class="drawer-hamburger-icon"></span>
		</button>
		<nav class="drawer-nav" role="navigation">
			<ul class="drawer-menu">
				<li class="drawer-brand">Menu</li>
				<li><a class="drawer-menu-item" href="./">Top</a></li>
				<li><a class="drawer-menu-item" href="/user/list/game">Gameワールド</a></li>
				<li><a class="drawer-menu-item" href="/user/list/illust">Illustワールド</a></li>
				<li><a class="drawer-menu-item" href="/user/list/it">ITワールド</a></li>
				<li><a class="drawer-menu-item" href="/user/ranking/index">ランキング</a></li>	
			</ul>
		</nav>
	</header>
	<main role="main">
		<div class="work">
			<ul>
				@if(!empty($ary))
					@foreach($ary as $key)
						<li>
							<a href="detail/{{$key->id}}">
							<img src="../../assets/{{$key->img}}" alt="">
							<p>作品名:{{$key->product_name}}<br>代表者:{{$key->delegate}}</p>
							</a>
							<a href="user/questionnaire"><img src="../../assets/images/box.png" alt=""></a>
						</li>
					@endforeach
				@else
					<p>作品がまだ登録されていません</p>
				@endif
			</ul>
	</div>
	</main>
<!-- <footer role="contentinfo"></footer> -->
</body>
