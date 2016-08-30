@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/create.css')}}}" rel="stylesheet">

		<script type="text/javascript" src="{{{asset('/assets/js/create_ques.js')}}}"></script>
	@stop
	@section('contents')
		<div class="create">
			<h2>アンケート作成</h2>
			<form action="create_conf" method="post" name="create">
			<p>開始日：<input type="date" name="start" required></p>
			<p>終了日：<input type="date" name="finish" required></p>
				<div id="ques1">
					<h3>問1</h3>
					<p>質問内容：<input type="text" name="content1" required="required"></p>
					<p>解答形式：
					<input type="radio" name="format1" value="radio" required="required">4択</input>
					<input type="radio" name="format1" value="text" required="required">記入</input>
					</p>
				</div>

				<input tyep="button" class="btn btn-default add_ques" name="con_add" value="質問を追加する" onclick="add_questionnaire();">

				<input type="hidden" name="count_ques" value="1">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="submit" class="btn btn-success create_ques" value="作成">
			</form>
		</div>
	@stop