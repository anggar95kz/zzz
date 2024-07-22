function menuBtnClicked(clickedButton) {
        // 获取所有按钮
        var buttons = document.querySelectorAll('#leftmenu button');
	var count = 0;
        // 移除所有按钮的active类
        buttons.forEach(function(button) {
count=count+1;
            button.style.fontWeight="normal";
        });

        // 将点击的按钮添加active类
        clickedButton.style.fontWeight="bold";
	
	let id = clickedButton.id;
	for (var i=1;i<7;i++){
		document.getElementById('menucont'+i.toString()).style.display="none";
	}
	var s = 'menucont'+id.replace("menu","");
	document.getElementById(s).style.display="block";
	document.getElementById('savediv').style.display="block";
    }