@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/edit.css')}}}" rel="stylesheet">
	@stop
	@section('contents')
		<div class="list">
			<h2>作品別<span class="btn btn-default create_btn"><a href="./create">アンケートを作成</a></span></h2>
			
			<ul>
				<li>
					<form method="get" action="edit">
					<select name="year">
					@foreach($year_list as $key)
						<option value="{{ $key }}">{{ $key }}</option>
					@endforeach
					</select>
					<input type="submit" value="検索">
				</li>
			</ul>
			<div class="year_questionnaire">
			@if(!empty($ques))
				<?php $i=1; ?>
				@foreach($ques as $key => $val)
					<p class="ques">問<?php echo $i; ?>:{{ $val->content }}</p>
					<p class="ans">解答形式：
					@if($val->type === "radio")
						4択
					@else($val->type === "text")
						記入
					@endif</p>
					<?php $i++; ?>
				@endforeach
			@else
				<p>登録履歴がありません</p>
			@endif
			</div>
		</div>
	@stop