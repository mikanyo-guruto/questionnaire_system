@extends('user/common.master')

<body class="drawer drawer--right notop work ollranking">
		
	@section('header_title')
		<h2>総合ランキング</h2>
	@stop
	
	@include('user/common/drawer')

	@section('body')
	
	<main role="main">
		<div class="work">
			<ul>
				@if(!empty($ary))
					<?php $i = 0; ?>
					@foreach($ary as $key)
						<?php $class = checkclass($i); ?>
						<li class="afcf">
							@if($i < 3)
								<img class="number" src="{{{asset('assets/images/')}}}/<?php echo $class; ?>.png" alt="">
							@else
								<p class="number"><?php echo $i+1; ?>位</p>
							@endif
							<a href="{{{url('/list/detail/')}}}/{{$key->id}}">
								<img src="{{{asset('/assets/images/user')}}}/{{$key->img}}" alt="">
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
