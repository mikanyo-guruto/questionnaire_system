<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link href="{{{asset('/assets/css/questionnaire_edit.css')}}}" rel="stylesheet">
	<link href="{{{asset('/assets/css/bootstrap.min.css')}}}" rel="stylesheet">
</head>
<body>
<body>
	<div class="wrap">
		<div class="side_bar">
			<h2>We are TECH.C<br>アンケートシステム</h2>
			<ul>
				<li><a href="#">作品アンケート</a></li>
				<li><a href="./venue">会場アンケート</a></li>
			</ul>
			<ul>
				<li><a href="#">アンケート編集</a></li>
			</ul>
		</div>
		
		<div class="questionnaire_list">
			<h1>年度別アンケート一覧</h1>
			<button class="btn btn-primary">新規アンケート作成</button>
			
			<div class="questionnaiire_year" onclick="obj=document.getElementById('open2017').style; obj.display=(obj.display=='none')?'block':'none';">
				<a href="#" style="cursor:pointer;"><h2>2017年のアンケート</h2><p>▼</p></a>
			</div>
			<div id="open2017" style="display:none;clear:both;">
				<h2>問1</h2>
			</div>

			<div class="questionnaiire_year" onclick="obj=document.getElementById('open2016').style; obj.display=(obj.display=='none')?'block':'none';">
				<a href="#" style="cursor:pointer;"><h2>2016年のアンケート</h2><p>▼</p></a>
			</div>
			<div id="open2016" style="display:none;clear:both;">
				<h2>問1</h2>
			</div>

			<div class="questionnaiire_year" onclick="obj=document.getElementById('open2015').style; obj.display=(obj.display=='none')?'block':'none';">
				<a href="#" style="cursor:pointer;"><h2>2015年のアンケート</h2><p>▼</p></a>
			</div>			
			<div id="open2015" style="display:none;clear:both;">
				<h2>問1</h2>
			</div>
		</div>
	</div>
</div>
</body>
</html>