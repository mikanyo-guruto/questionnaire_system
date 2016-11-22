<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>総合ランキング</title>

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

<script language="JavaScript">
    <!--
            //タイマーをセット
    function tm(){
        tm = setInterval("location.reload()",30000);
    }
    //-->
</script>
</head>

<body class="drawer drawer--right notop work ollranking" onLoad="tm()">
	<header role="banner">
		<h1><a href="/"><img src="../assets/images/techlogo.png" alt=""></a></h1>
		<h2>総合ランキング</h2>
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
		<div class="work">
			<ul>
				@if(!empty($ary))
					<?php $i = 0; ?>
					@foreach($ary as $key)
						<?php $class = checkclass($i); ?>
						<li class="afcf">
							@if($i < 3)
								<img class="number" src="/assets/images/<?php echo $class; ?>.png" alt="">
							@else
								<p class="number"><?php echo $i+1; ?>位</p>
							@endif
							<a href="/list/detail/{{$key->id}}">
								<img src="/assets/{{$key->img}}" alt="">
								<p>作品名:{{$key->product_name}}<br>代表者:{{$key->delegate}}</p>
							</a>
							<a href="$"><img src="/assets/images/techlogo.png" alt=""></a>
						</li>
						<?php $i++ ?>
					@endforeach
				@endif
			</ul>
		</div>
	</main>
<!-- <footer role="contentinfo"></footer> -->
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

				default:
					break;
			}
			return $class;
		}
	?>
</body>
