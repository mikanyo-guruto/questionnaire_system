@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
	@stop
	@section('contents')
		<div class="list">
			<h2>作品別</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>作品名</th>
						<th>作者名</th>
						<th>評価数</th>
						<th>詳細</th>
					</tr>
				</thead>
				<tbody>
				@foreach($lists as $list)
					<tr>
						<td>{{{ $list->product_name }}}</td>
						<td>
							<span>
							@foreach($list->member as $member)
								{{ $member->name }}
							@endforeach
							</span>
						</td>
						<td>
							{{ $sum_val[$list->id] }}
						</td>
						<td><a href="./list/detail/{{ $list->id }}" class="btn btn-info">詳細</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	@stop