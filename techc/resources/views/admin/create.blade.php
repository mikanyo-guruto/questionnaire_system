@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/admin/list.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/admin/create.css')}}}" rel="stylesheet">

		<script type="text/javascript" src="{{{asset('/assets/js/create_ques.js')}}}"></script>
	@stop
	@section('contents')
		<div class="create">
			<h2>アンケート作成</h2>
			<form action="create_conf" method="post" name="create">
			<p>開始日：<input type="date" name="start" value="<?php if(!empty($ques)) echo $ques['start']; ?>" required></p>
			<p>終了日：<input type="date" name="finish" value="<?php if(!empty($ques)) echo $ques['finish']; ?>"　required></p>
			<input type="hidden" id="count" name="count_ques" value="<?php echo !empty($ques) ? $ques['count_ques'] : 0; ?>">
			<div id="ques0"></div>
			@if(!empty($ques))
				<script>
					count = parseInt(document.getElementById('count').value) + 1
				</script>
				@for($i=1; $i<=$ques['count_ques']; $i++)
				<div id="ques<?php echo $i; ?>">
					<h3>問<?php echo $i; ?></h3>
					<p>質問内容：<input type="text" name="content<?php echo $i; ?>" value="<?php if(!empty($ques)) echo $ques["content$i"]; ?>"　required="required"></p>
					<p>解答形式：
					<input type="radio" name="format<?php echo $i; ?>" value="radio" <?php if(!empty($ques)&&$ques["format$i"] === "radio") echo "checked='checked'"?> required="required">4択</input>
					<input type="radio" name="format<?php echo $i; ?>" value="text" <?php if(!empty($ques)&&$ques["format$i"] === "text") echo "checked='checked'"?>　required="required">記入</input>
					</p>
				</div>
				@endfor
			@else
				<script>
					add_questionnaire();
				</script>
			@endif

				<input tyep="button" class="btn btn-default add_ques" name="con_add" value="質問を追加する" onclick="add_questionnaire();">

				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="submit" class="btn btn-success create_ques" value="作成">
			</form>
		</div>
	@stop