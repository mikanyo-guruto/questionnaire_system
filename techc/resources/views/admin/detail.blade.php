<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="{{{asset('/assets/css/bootstrap.min.css')}}}" rel="stylesheet">
<link href="{{{asset('/assets/css/detail.css')}}}" rel="stylesheet">
</head>
<body>
<div class="wrap">
	<img src="../../assets/{{ $product->img }}.jpg" alt="">
	<div class="info">
		<table class="info_table">
			<tr>
				<th>作品名</th>
				<td>{{ $product->product_name }}</td>
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
				<td class="overview">{{ $product->overview }}</td>
			</tr>
			<tr>
				<th>評価数</th>
				<td>{{ $product->value }}</td>
			</tr>
			<tr>
				<th>評価を受けた年齢層</th>
				<td>
					@foreach($age as $key => $val)
						<p>{{ $key }}@if(!($key === "その他"))代@endif
						 : {{ $val }}</p>
					@endforeach
				</td>
			</tr>
			<tr>
				<th>評価を受けた性別</th>
				<td>
					<p>男性:{{ $gender[0] }}</p><p>女性:{{ $gender[1] }}</p>
				</td>
			</tr>	
		</table>
	</div>

	<div class="impressions">
		<h2>感想一覧</h2>
		<table class="impressions_table">
			<tr>
				<th>年齢</th><th>性別</th><th>感想</th>
			</tr>
				@foreach($evals as $key)
				<tr>
					<td>
						@if($key->age_group === 0)
							その他
						@else
							{{ $key->age_group*10 }}代
						@endif
					</td>

					<td>
						@if($key->gender === 0)
							男性
						@else
							女性
						@endif
					</td>

					<td>
						{{ $key->impression }}
					</td>
				</tr>
				@endforeach
		</table>
	</div>
</div>
</body>

</html>