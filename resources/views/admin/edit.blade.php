@extends('admin/common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/admin/list.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/admin/edit.css')}}}" rel="stylesheet">
		<script>
			// ドロップダウンで選択したオプションにselectedを付ける
			window.onload = function() {
				// URLのyearを取得
				var url = decodeURIComponent(window.location.search);
				var url_year = url.replace(/\?year=/, "");
				var form = document.getElementById("edit").year;
				// optionにある年を検索し、urlのyearと一致したらその要素にselected
				for(var i=0; i<form.options.length; i++) {
					if(form.options[i].value == url_year) {
						form.options[i].setAttribute("selected", "selected");
						break;
					}
				}
			};
		</script>
	@stop
	@section('contents')
		<div class="list">
			<h2>作品別<span class="btn btn-default create_btn"><a href="./create">アンケートを作成</a></span></h2>
			
			<ul>
				<li>
					<form method="get" action="edit" id="edit" name="edit">
					<select name="year" onChange="document.edit.submit();">
					@foreach($year_list as $key)
						<option value="{{ $key }}" name="{{ $key }}">{{ $key }}</option>
					@endforeach
					</select>
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