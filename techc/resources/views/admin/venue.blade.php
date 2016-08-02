@extends('common.master')
	@section('addCss')
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
	@stop
	@section('contents')
		<div class="list">
			<ul>
				<li>
					<select name="year">
						<option value="2015">2015</option>
					</select>
				</li>
				<li>
					<select name="genle">
						<option>学生</onption>
						<option>企業</option>
					</select>
				</li>
			</ul>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>客層</th>
						<th>企業名</th>
						<th>平均評価</th>
						<th>詳細</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>学生</td>
						<td>0</td>
						<td>0</td>
						<td><a href="#" class="btn btn-info">詳細</a></td>
					</tr>
					<tr>
						<td>企業</td>
						<td>ソニー</td>
						<td>0</td>
						<td><a href="#" class="btn btn-info">詳細</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	@stop