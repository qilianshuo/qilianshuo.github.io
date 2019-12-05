var count = 0;

function add() {
	var a = document.createElement("tr");
	var tab = document.getElementById("tab");
	var name = document.getElementById("newname").value;
	var num = document.getElementById("num").value;
	tab.innerHTML +=
		"<tr id='" + count + "'>" +
		"<td>" + name + "</td>" +
		"<td>" + num + "</td>" +
		"<td><a href='javascript:delet(" + count + ")'>" +
		//"<td><a onclick='delet("+count+")'>"+
		"Delete" +
		"</a></td>" +
		"</tr>";
	count++;
	alert("添加成功!");
}

function delet(count) {
	var row = document.getElementById(count);
	row.remove(count);
}

function empty() {
	var all;
	all = document.getElementById(count);
	all.remove(count);
}
