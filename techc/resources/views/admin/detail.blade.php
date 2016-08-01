<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="{{{asset('/assets/css/bootstrap.min.css')}}}" rel="stylesheet">
<link href="{{{asset('/assets/css/detail.css')}}}" rel="stylesheet">
</head>

<body>
<div class="wrap">
	<img src="../../assets/{{ $lists->img }}.jpg" alt="">
	<div class="info">
		<table class="info_table">
			<tr>
				<th>作品名</th>
				<td>{{ $lists->product_name }}</td>
			</tr>
			<tr>
				<th>出展者</th>
				<td>
					@foreach($members as $member)
						<p>{{ $member->name }}</p>
					@endforeach
				</td>
			</tr>
			<tr>
				<th class="overview">概要</th>
				<td class="overview">{{ $lists->overview }}</td>
			</tr>
			<tr>
				<th>評価数</th>
				<td>
					{{ $sum_val }}
				</td>
			</tr>
			<tr>
				<th>評価を受けた年齢層</th>
				<td>
					@foreach($sum_age as $key => $val)
						<p>
							@if($key != 4)
								{{ $key + 1 . '0'}}代 : 
							@else
								それ以外 : 
							@endif
							{{ $val }}
						</p>
					@endforeach
				</td>
			</tr>
			<tr>
				<th>評価を受けた性別</th>
				<td>
					<p>男性:{{ $sum_gen['man'] }}</p><p>女性{{ $sum_gen['woman'] }}</p>
				</td>
			</tr>	
		</table>
	</div>

	<div class="impressions">
		<h2>感想一覧</h2>
		<table class="impressions_table">
			<tr>
				<th>年齢</th><th>性別</th><th>評価</th><th>感想</th>
			</tr>
			@foreach($evaluation as $recode)
				<tr>
					<td>
						@if($recode->age_group != 4)
							{{ $recode->age_group + 1 . '0' }}
						@else
							50歳以上
						@endif
					</td>

					<td>
						@if($recode->gender)
							男性
						@else
							女性
						@endif
					</td>

					<td>
						{{ $recode->value }}
					</td>

					<td>
						{{ $recode->impressions }}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>
</body>

</html>