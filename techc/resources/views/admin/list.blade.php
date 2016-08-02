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
						<th>代表者</th>
						<th>評価数</th>
						<th>詳細</th>
					</tr>
				</thead>
				<tbody>
				@foreach($lists as $product)
					<tr>
						<td>{{{ $product->product_name }}}</td>
						<td>{{{ $product->delegate }}}</td>
						<td>{{{ $product->value }}}</td>
						<td><a href="./list/detail/{{ $product->id }}" class="btn btn-info">詳細</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	@stop