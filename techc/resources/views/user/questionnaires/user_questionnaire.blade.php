﻿<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="format-detection" content="telephone=no,email=no">
<link rel="stylesheet" href="assets/style/normalize.css">
<meta name="description" content="サイトの説明文">
<meta name="keywords" content="カンマで区切ってキーワード">
<meta http-equiv="Content-Style-Type" content="text/css">

<style>
/*ノーマライズ*/
input, button, textarea, select {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;}
input, button, textarea, select {
	margin: 0;
	padding: 0;
	background: none;
	border: none;
	border-radius: 0;
	outline: none;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;}
/*ノーマライズ*/

/*スタイリング*/
form{width: 100%;margin: 0;padding: 0;}
     h1{font-size: 28px;padding-left: 3%;}
form h2{font-size: 20px;padding-left: 3%;
	border-bottom: solid 1px #3a3a3a;
	padding-top: 15px;
	clear: both;}

input[type="radio"]{display: none;}
label{
    display: block;
    float: left;
    cursor: pointer;
    width: 23.5%;
    margin: 0;
    padding: 15px 0;
    font-size: 16px;
    text-align: center;
    line-height: 1;
    box-sizing: border-box;
    -webkit-transition: background-color 0.2s linear;
    transition: background-color 0.2s linear;
    position: relative;
    display: inline-block;

    background-color: #fff;
	color: #59b1eb;
	border: 1px solid #59b1eb;

	border-left: none;

background-size: 100% 200%; 
background-image: linear-gradient(to bottom, transparent 50%, rgba(89, 177, 235, 1) 50%);
transition: background-position .2s cubic-bezier(0.19, 1, 0.22, 1) .1s, color .5s ease 0s, background-color .5s ease;

}

label:first-of-type{
	border-left: 1px solid #59b1eb;
    border-radius: 3px 0 0 3px;
    margin-left: 3%;}
label:last-of-type{
    border-radius: 0 3px 3px 0;}

input[type="radio"]:checked + label{
	/*color: #fff;
	background-color: #59b1eb;
	background-image: -webkit-linear-gradient(top, #59b1eb, #a9e7ff);
	background-image: linear-gradient(to bottom, #59b1eb, #a9e7ff);
	-webkit-transition: none;
	transition: none;
	text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
	border-bottom-color: #a9e7ff;*/

	color:rgba(255, 255, 255, 1);
	background-color: #59b1eb;
	background-image: -webkit-linear-gradient(top, transparent 50%, #59b1eb, #a9e7ff);
	background-image: linear-gradient(to bottom, transparent 50%, #59b1eb, #a9e7ff);
	text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
	border-bottom-color: #a9e7ff;
    background-position: 100% -100%;
}


input[type="text"],textarea {
	property: value;
	width: 94%;
	margin-left: 3%;
	border: 1px solid #3a3a3a;
	border-radius: 3px;
	-webkit-transition: all .3s;
	transition: all .3s;
	resize: none;
	line-height: 1.2;
}
input[type="text"]:focus,textarea:focus {
	box-shadow: 0 0 7px #59b1eb;
	border: 1px solid #59b1eb;
}

input[type="submit"]{
	width: 90%;
	margin-left: 5%;
	background-size: 100% 100%;
	border: 1px solid #59b1eb;
	background-color: #59b1eb;
	background-image: -webkit-linear-gradient(top, transparent -5%, #59b1eb, #a9e7ff);
	background-image: linear-gradient(to bottom, transparent -5%, #59b1eb, #a9e7ff);
	border-radius: 3px;
	color: #fff;
	line-height: 50px;
	-webkit-transition: none;
	transition: none;
	text-shadow: 0 1px 1px rgba(0, 0, 0, .3);

	border-bottom: none;
}

</style>

</head>

<body>
	<h1>アンケート</h1>
	<form action="cgi-bin/formmail.cgi" method="post">
	
		<h2>生徒の対応</h2>
		<p>
		<input type="radio" id="1" name="manner" value="best"><label for="1">最高</label>
		<input type="radio" id="2" name="manner" value="good"><label for="2">良い</label>
		<input type="radio" id="3" name="manner" value="bad"><label for="3">悪い</label>
		<input type="radio" id="4" name="manner" value="worst"><label for="4">最悪</label>
		</p>
		
		<h2>ご感想</h2>
		<p>
		<textarea name="kanso" rows="4" placeholder="記入欄"></textarea>
		<input type="submit" value="送信">
		</p>

		
	</form>

</body>