var count = 1;

/// アンケート作成時、質問を増やす際の関数
function add_questionnaire() {
	// 要素数をインクリメント
	count++;

	var ele = document.createElement("div");
	ele.id = "ques" + count;
	var div_name = "ques" + (count - 1);

	/*
		--- 要素のタグを生成 ---
		･タイトル
		･質問内容(テキストフィールド)
		･解答形式(ラジオボタン)
			4択 or 記述
	*/
	// タイトル
	var h3 = document.createElement("h3");
	var title = "問" + count;
	var h3_node = document.createTextNode(title);
	h3.appendChild(h3_node);
	ele.appendChild(h3);

	// 質問内容
	var ques_content = document.createElement("p");
	var input = document.createElement("input");
	ques_content.appendChild(document.createTextNode("質問内容："));
	input.setAttribute("type", "text");
	input.setAttribute("required", "required");
	input.name = "content" + count;
	ques_content.appendChild(input);
	ele.appendChild(ques_content);

	// 解答形式
	var ques_format = document.createElement("p");
	var inp_radio1 = document.createElement("input");
	var inp_radio2 = document.createElement("input");
	ques_format.appendChild(document.createTextNode("解答形式："));

	// 属性のフォーマット
	inp_radio1.type = "radio";
	inp_radio2.type = "radio";
	inp_radio1.name = "format" + count;
	inp_radio2.name = "format" + count;
	inp_radio1.value = "radio";
	inp_radio2.value = "text";
	inp_radio1.setAttribute("required", "required");
	inp_radio2.setAttribute("required", "required");

	ques_format.appendChild(inp_radio1);
	ques_format.appendChild(document.createTextNode("4択"));
	ques_format.appendChild(inp_radio2);
	ques_format.appendChild(document.createTextNode("記述"));

	ele.appendChild(ques_format);

	// 質問数をhidden要素の値に代入
	document.create.count_ques.value = count;

	// 今あるアンケートの要素の次に新しく要素を追加
	var div_content = document.getElementById(div_name);
	//div_content.appendChild(ele);
	div_content.parentNode.insertBefore(ele, div_content.nextSibling);
}