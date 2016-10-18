@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/admin/venue.css')}}}" rel="stylesheet">
		<script type="text/javascript" src="{{{asset('/assets/js/canvasjs.min.js')}}}"></script>
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
		</script>
	@stop
	@section('contents')
		<div class="list">
			<h2>会場アンケート</h2>
			<ul class="sort">
				<li>
					<select name="year">
						<option value="2015">2015</option>
						<option value="2016">2015</option>
						<option value="2017">2015</option>
					</select>
				</li>	
				<li>
					<select name="genle">
						<option>学生</onption>
						<option>企業</option>
					</select>
				</li>
			</ul>

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
		</div>
	@stop