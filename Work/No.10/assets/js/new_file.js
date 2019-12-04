var count = 0;

function add() {
	var a = document.createElement("tr");
	var tab = document.getElementById("tab");
	var ID = document.getElementById("newname").value;
	var password = document.getElementById("password").value;
	tab.innerHTML +=
		"<tr id='" + count + "'>" +
		"<td>" + ID + "</td>" +
		"<td>" + password + "</td>" +
		"<td><a href='javascript:(" + count + ")'>" +
		"Delete" +
		"</a></td>" +
		"</tr>";
		count++;
		alert("登陆功能待开发,敬请期待!");
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
