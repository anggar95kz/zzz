function menuBtnClicked(clickedButton) {
        // 获取所有按钮
        var buttons = document.querySelectorAll('#leftmenu button');

        // 移除所有按钮的active类
        buttons.forEach(function(button) {
            button.style.fontWeight="normal";
        });

        // 将点击的按钮添加active类
        clickedButton.style.fontWeight="bold";
	
	let id = clickedButton.id;
	for (var i=1;i<=10;i++){
		document.getElementById('menucont'+i.toString()).style.display="none";
	}
	var s = 'menucont'+id.replace("menu","");
	document.getElementById(s).style.display="block";
	document.getElementById('savediv').style.display="block";
    }

function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}


function raschet()
{
var id = getQueryVariable("id");
window.location.href="../raschet/sotov.php?id="+id;
}

function multiraschet()
{
let chs = document.getElementsByTagName('input');

for (let i = 0; i < chs.length; i++) {
    if (chs[i].type == "checkbox") {
        alert(chs[i].checked);
    }
}


}

function navigate(url) {
  window.location.href = url;
}


function openAnketa(tr) {
	navigate('../connection_type/sotov.php', l);
}


