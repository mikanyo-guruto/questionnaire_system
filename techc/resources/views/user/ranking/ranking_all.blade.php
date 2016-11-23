@extends('user/common.master')

@section('body')

<body class="drawer drawer--right notop ranking">
	
	@section('header_title')
		<h2>総合ランキング</h2>
	@stop

	@include('user/common/drawer')

	<main role="main">
			<h2>総合ランキング</h2>
			<div>
			<ul class="afcf">
				@if(!empty($all))
					<?php $i = 0; ?>
					@foreach($all as $key)
						<?php $class = checkclass($i); ?>
						<li class="<?php echo $class; ?>">
							<img src="{{{asset('assets/images/')}}}/<?php echo $class; ?>.png" alt="">
							<a href="{{{url('/list/detail/')}}}/{{$key->id}}">
								<figure>
									<img src="{{{asset('assets/images/user/')}}}/{{$key->img}}" alt="">
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
			<a href="{{{url('/ranking/synthesis')}}}"><p>もっと見る</p></a>

			<h2>ゲームランキング</h2>
			<div class="afcf">
			<ul class="afcf">
				@if(!empty($ranking_game))
						<?php $i = 0; ?>
						@foreach($ranking_game as $key)
							<?php $class = checkclass($i); ?>
							<li class="<?php echo $class; ?>">
								<img src="../assets/images/<?php echo $class; ?>.png" alt="">
								<a href="{{{url('/list/detail/')}}}/{{$key->id}}">
									<figure>
										<img src="{{{asset('assets/images/user/')}}}/{{$key->img}}" alt="">
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
			<a href="{{{url('ranking/ranking_genre/game')}}}"><p>もっと見る</p></a>

			<h2>イラストランキング</h2>
			<div class="afcf">
			<ul class="afcf">
				@if(!empty($ranking_illust))
					<?php $i = 0; ?>
					@foreach($ranking_illust as $key)
						<?php $class = checkclass($i); ?>
						<li class="<?php echo $class; ?>">
							<img src="../assets/images/<?php echo $class; ?>.png" alt="">
							<a href="{{{url('/list/detail/')}}}/{{$key->id}}">
								<figure>
									<img src="{{{asset('assets/images/user/')}}}/{{$key->img}}" alt="">
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
			<a href="{{{url('ranking/ranking_genre/illust')}}}"><p>もっと見る</p></a>

			<h2>ITランキング</h2>
			<div class="afcf">
			<ul class="afcf">
				@if(!empty($ranking_it))
					<?php $i = 0; ?>
					@foreach($ranking_it as $key)
						<?php $class = checkclass($i); ?>
						<li class="<?php echo $class; ?>">
							<img src="../assets/images/<?php echo $class; ?>.png" alt="">
							<a href="{{{url('/list/detail/')}}}/{{$key->id}}">
								<figure>
									<img src="{{{asset('assets/images/user/')}}}/{{$key->img}}" alt="">
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
			<a href="{{{url('ranking/ranking_genre/it')}}}"><p>もっと見る</p></a>
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