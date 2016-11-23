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

	@section('addJs')
		<script>window.jQuery || document.write('\x3cscript src="/assets/js/jquery-2.1.4.min.js"\x3e\x3c/script\x3e')</script>
		<script src="{{{asset('assets/js/user/jquery.bxslider.js')}}}"></script>
		<script type="text/javascript" src="{{{asset('assets/js/user/tabmenu.js')}}}"></script>
	@stop

	@section('body')

	<body class="drawer drawer--right notop illust">

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
			<div class="workdetail">
				@if(!empty($ary))
					<img src="{{{asset('assets/images/user/')}}}/{{$ary->img}}" alt="">

					<div class="container">
					    <div class="tabContainer">
					        <div class="tab">
					            <div class="tab__button active"><a href="#">概要</a></div>
								<div class="tab__button"><a href="#">メンバー</a></div>
					            <div class="tab__button"><a href="#">詳細</a></div>
					        </div>
					    </div>

					    <div class="contents">

				        <div class="contents__content about">
				            <div>
								<h3>プロジェクト名</h3>
								<p>{{$ary->product_name}}</p>
							</div>
				            <div>
								<h3>代表者</h3>
								<p>{{$ary->delegate}}</p>
							</div>
				        </div>

				        <div class="contents__content member">
				            <div>
				            	<p>岩本岳大<br><span>（3年　Webデザイナー）</span><br><br></p>
							</div>
				        </div>

				        <div class="contents__content overview">
				            <div>
								<h3>概要</h3>
								<p>{{$ary->overview}}</p>
							</div>
				        </div>

				    </div>
				@else
						<p>作品がまだ登録されていません</p>
				@endif
			</div>

			<div class="box">
				<!-- <h3>投票お願いします</h3> -->
				<!-- <img src="../../../assets/images/box.svg" alt=""> -->
				<!-- <a href=""><p>投票する</p></a> -->
				<a href="{{{url('questionnaires/questionnaire')}}}">
				<h3>投票する。</h3>
				<!-- <img src="../../../assets/images/tohyo.svg" alt=""> -->
				</a>
			</div>
		</div>
	</main>
</body>
