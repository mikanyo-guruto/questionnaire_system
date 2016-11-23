@extends('user/common/master')

	@section('title')
		WeAreTECH.C
	@stop

	@section('body')
<body class="drawer drawer--right top">
	<header role="banner">
		<h1><img src="{{{asset('assets/images/toplogo.svg')}}}" alt=""></h1>
		<button type="button" class="drawer-toggle drawer-hamburger">
			<span class="sr-only">toggle navigation</span>
			<span class="drawer-hamburger-icon"></span>
		</button>
		<nav class="drawer-nav" role="navigation">
			<ul class="drawer-menu">
				<li class="drawer-brand"><p>Menu</p></li>
				<li><a class="drawer-menu-item" href="{{{url('/')}}}">Top</a></li>
				<li><a class="drawer-menu-item" href="{{{url('list/game')}}}">Gameワールド</a></li>
				<li><a class="drawer-menu-item" href="{{{url('list/illust')}}}">Illustワールド</a></li>
				<li><a class="drawer-menu-item" href="{{{url('list/it')}}}">ITワールド</a></li>
				<li><a class="drawer-menu-item" href="{{{url('ranking/ranking_all')}}}">ランキング</a></li>
			</ul>
		</nav>
	</header>
	<main role="main">
		<div class="ranking">
			<h2>ランキング速報</h2>
			<ul>
				<?php $i = 0; ?>
				@foreach($ary as $key)
					<li class="afcf">
						<a href="{{{url('list/detail/')}}}/{{$key->id}}">
							<p><?php echo $i+1 ?>位</p>
							<span>{{$key->product_name}}</span>
						</a>
					</li>
					<?php $i++; ?>
				@endforeach
			</ul>
		</div>
		<div class="contents afcf">
			<!-- <ul>
				<li class="game"><a href="world/game.html"><p>ゲーム</p></a></li>
				<li class="illust"><a href="world/illust.html">イラスト</a></li>
				<li class="it"><a href="world/it.html">IT</a></li>
			</ul> -->
			<ul>
				<li class="game"><a href="list/game"><img src="{{{asset('assets/images/game.svg')}}}" alt=""></a></li>
				<li class="illust"><a href="list/illust"><img src="{{{asset('assets/images/illust.svg')}}}" alt=""></a></li>
				<li class="it"><a href="list/it"><img src="{{{asset('assets/images/it.svg')}}}" alt=""></a></li>
			</ul>
		</div>
		<div class="question">
			<h2>会場アンケートにご協力お願いします</h2>
			<!-- <a href="#"><p>会場アンケート</p></a> -->
			<a href="#"><p><img src="{{{asset('assets/images/ollanke.svg')}}}" alt=""></p></a>
		</div>
	</main>
<!-- <footer role="contentinfo"></footer> -->

</body>
