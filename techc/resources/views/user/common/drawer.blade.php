<header role="banner">
	<h1><a href="{{{url('/')}}}"><img src="{{{asset('assets/images/techlogo.png')}}}" alt=""></a></h1>
	@yield('header_title')
	<button type="button" class="drawer-toggle drawer-hamburger">
		<span class="sr-only">toggle navigation</span>
		<span class="drawer-hamburger-icon"></span>
	</button>
	<nav class="drawer-nav" role="navigation">
		<ul class="drawer-menu">
			<li class="drawer-brand">Menu</li>
			<li><a class="drawer-menu-item" href="{{{url('/')}}}">Top</a></li>
			<li><a class="drawer-menu-item" href="{{{url('list/game')}}}">Gameワールド</a></li>
			<li><a class="drawer-menu-item" href="{{{url('list/illust')}}}">Illustワールド</a></li>
			<li><a class="drawer-menu-item" href="{{{url('list/it')}}}">ITワールド</a></li>
			<li><a class="drawer-menu-item" href="{{{url('ranking/ranking_all')}}}">ランキング</a></li>
		</ul>
	</nav>
</header>