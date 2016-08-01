<!DOCTYPE html>
<html>
	<head>
		<link href="{{{asset('/assets/css/bootstrap.min.css')}}}" rel="stylesheet">
		<link href="{{{asset('/assets/css/list.css')}}}" rel="stylesheet">
		<meta charset="UTF-8">
	</head>

<body>
	<div class="wrap">
		<div class="side_bar">
			<h2>We are TECH.C<br>アンケートシステム</h2>
			<ul>
				<li><a href="./list">作品アンケート</a></li>
				<li><a href="./venue">会場アンケート</a></li>
			</ul>
			<ul>
				<li><a href="#">アンケート編集</a></li>
			</ul>
		</div>
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
	</div>
</body>
</html>