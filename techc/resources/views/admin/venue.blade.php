@extends('admin/common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/admin/venue.css')}}}" rel="stylesheet">
		<script type="text/javascript" src="{{{asset('/assets/js/admin/canvasjs.min.js')}}}"></script>
		<script type="text/javascript">
		function bar_graph(id, ary)
		{
			console.log(id);
			var chart = new CanvasJS.Chart("chartContainer" + id, {
				data: [{
					type: 'column',
					dataPoints: ary	
				}]
			});
			chart.render();
		}

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
			<h2>会場アンケート</h2>
			<ul class="sort">
				<li>
					<form method="get" action="venue" id="edit" name="edit">
					<select name="year" onChange="document.edit.submit();">
					@foreach($year_list as $key)
						<option value="{{ $key }}" name="{{ $key }}">{{ $key }}</option>
					@endforeach
					</select>
				</li>
			</ul>
			
			<div class = "main_contents">
			@if(!empty($ques))
				<?php $i=1; ?>
				@foreach($ques as $key => $val)
					<h3>問<?php echo $i ?>. {{ $val->content }}</h3>
					<div id="chartContainer<?php echo $i; ?>" class="chartContainer">
						@if($val->type === "radio")
							<script type="text/javascript">	
								var dataPlot = [
									{ label: "とてもよかった",	y: <?php echo $answer_count[$val->id]["1"]; ?> },
									{ label: "よかった",		y: <?php echo $answer_count[$val->id]["2"]; ?> },
									{ label: "あまりよくなかった",	y: <?php echo $answer_count[$val->id]["3"]; ?> },
									{ label: "悪かった",		y: <?php echo $answer_count[$val->id]["4"]; ?> }
								];
								bar_graph(<?php echo $i; ?>, dataPlot);
							</script>
						@else
							<?php for($k=0; $k < count($answer_count[$val->id]); $k++){ ?>
								<p>
									<?php echo $answer_count[$val->id][$k]["answer"]; ?>:
									<?php echo $answer_count[$val->id][$k]["res"]; ?>
								</p>
							<?php } ?>
						@endif
					</div>
					<?php $i++; ?>
				@endforeach
			@else
				<p>登録履歴がありません</p>
			@endif
			</div>
		</div>
	@stop