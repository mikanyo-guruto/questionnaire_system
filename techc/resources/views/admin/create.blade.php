@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/create.css')}}}" rel="stylesheet">

		<script type="text/javascript" src="{{{asset('/assets/js/create_ques.js')}}}"></script>
	@stop
	@section('contents')
		<div class="create">
			<h2>アンケート作成</h2>
			<form action="create_action" method="post" name="create">
				<div id="ques1">
					<h3>問1</h3>
					<p>質問内容：<input type="text"></p>
					<p>解答形式：
					<input type="radio" name="format" value="radio">4択</input>
					<input type="radio" name="format" value="text">記入</input>
					</p>
				</div>
			</form>
			<input tyep="button" class="btn btn-default add_ques" value="質問を追加する" onclick="add_questionnaire();">
			<input type="submit" class="btn btn-success create_ques" value="作成">
		</div>
	@stop