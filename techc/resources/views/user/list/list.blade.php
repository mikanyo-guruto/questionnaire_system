@extends('user/common/master')

	@section('title')
		@if($genre=="illust")
			イラスト
		@elseif($genre=="game")
			ゲーム
		@elseif($genre=="it")
			IT
		@endif
		ワールド
	@stop

	@section('body')

	<body class="drawer drawer--right notop world illust">

		@section('header_title')
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
		@stop
		@include('user/common/drawer')

		<main role="main">
			<div class="work">
				<ul>
					@if(!empty($ary))
						@foreach($ary as $key)
							<li>
								<a href="detail/{{$key->id}}">
								<img src="{{{asset('assets/images/user/')}}}/{{$key->img}}" alt="">
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
