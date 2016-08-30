@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/create.css')}}}" rel="stylesheet">

		<script type="text/javascript" src="{{{asset('/assets/js/create_ques.js')}}}"></script>
	@stop
	@section('contents')
		<div class="create">
			<h2>この内容でよろしいですか？</h2>
			<form action="create_run" method="post" name="create_run">
				<p>開始日：{{ $date["start"] }}</p>
				<p>終了日：{{ $date["finish"] }}</p>
				<?php $i=1; ?>
				@foreach($ques as $key)
					<h3>問<?php echo $i; ?></h3>
					<p class="content">{{ $key["content"] }}</p>
					<p class="format">解答形式：
						@if($key["format"] == "radio")
							4択
						@elseif($key["format"] == "text")
							記述
						@endif
					</p>

					<input type="hidden" name="content<?php echo $i; ?>" value="{{ $key["content"] }}">
					<input type="hidden" name="format<?php echo $i; ?>" value="{{ $key["format"] }}">

					<?php $i++; ?>
				@endforeach
				<input type="hidden" name="start" value="<?php echo $date["start"]; ?>">
				<input type="hidden" name="finish" value="<?php echo $date["finish"]; ?>">
				<input type="hidden" name="count_ques" value="<?php echo $i-1; ?>">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="submit" class="btn btn-success create_ques" value="作成">
			</form>
		</div>
	@stop