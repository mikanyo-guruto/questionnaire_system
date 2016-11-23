@extends('user/common/master')

	@section('title')
		アンケート
	@stop

	@section('body')

<body class="drawer drawer--right notop world illust">

	@section('header_title')
		<h2>アンケート</h2>
	@stop
	@include('user/common/drawer')
	
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
