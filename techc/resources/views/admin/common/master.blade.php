<!DOCTYPE html>
<html>
	<head>
		<link href="{{{asset('/assets/css/bootstrap.min.css')}}}" rel="stylesheet">
		@yield('addCss')
		<meta charset="UTF-8">
	</head>
	
	<body>
		<div class="wrap">
			<div class="side_bar">
				<h2>We are TECH.C<br>アンケートシステム</h2>
				<ul>
					<li><a href="./list">作品アンケート</a></li>
					<li><a href="./venue">会場アンケート</a></li>
				</ul>
				<ul>
					<li><a href="./edit">アンケート一覧</a></li>
				</ul>
			</div>
			@yield('contents')
		</div>
	</body>
</html>

