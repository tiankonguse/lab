var TK = {};

TK = window;

TK.$ = function(id) {
    return document.getElementById(id);
};

/**
 * 
 * ev 监听所有事件
 * 
 * 
 */

TK.ev = null;

TK.GetEv = function() {
    ev = event;

    return ev;
};

/**
 * IsIE： 非ie浏览器时值为undefined. 相当于false
 */
TK.IsIE = document.all;

/**
 * 
 * IEVer 如果是ie浏览器，获得ie浏览器的版本号
 * 
 */
TK.IEVer = null;

TK.getIEVer = function() {
    var iVerNo = 0;
    var sVer = navigator.userAgent;
    if (sVer.indexOf("MSIE") > -1) {
	var sVerNo = sVer.split(";")[1];
	sVerNo = sVerNo.replace("MSIE", "");
	iVerNo = parseFloat(sVerNo);
    }
    IEVer = iVerNo;
};

/**
 * 
 * 保存当期活动的menu
 * 
 */
TK.activeMenu = null;

TK.HideMenu = function() {
    if (activeMenu != null) {
	Hide(activeMenu);
	activeMenu = null;
    }
};

/**
 * 
 * 得到当前的frames
 * 
 * 
 */

TK.getFrams = function() {
    return frames["main-content-iframe"];
};

/**
 * setEditable 使frame可以编辑 默认是不可编辑的
 * 
 */
TK.setEditable = function() {
    var f = getFrams();
    f.document.designMode = "on";
}

TK.setFrmClick = function() {

    var f = getFrams();

    f.document.onmousemove = function() {
	// onblur();
    }

    f.document.onclick = function() {
	HideMenu();
    }
}

TK.Loaded = false;

TK.FormSubmit = function() {
	
	if ($("main-title-input").value =="") {
		alert("标题不能为空");
		return false;
	}
	if ($("main-title-input").value.length > 80) {
		alert("标题太长");
		return false;
	}

	
	var f = getFrams();
	var fbody = f.document.getElementsByTagName("BODY")[0];
	$("main-content-html").value = fbody.innerHTML;
	
	return true;
};

/*
 * 
 * 工具条1: 发表，保存，撤销，重做
 * 
 */
TK.onMouseDownToolbarGroup1 = function() {
    $("toolbar-submit").onmousedown = function() {
	if(FormSubmit()){
	    $("content-form").submit();
	}
    };
};

/*
 * 
 * 工具条2 字体 大小 加粗 斜体 下划线 颜色 发光
 * 
 */
TK.onMouseDownToolbarGroup2 = function() {

    /*
     * 字体
     */
    $("toolbar-fontname").onmousedown = function() {
	displayElement("toolbar-fontname", "");
    };
    

    $("toolbar-fontname-list").onmousedown = function() {
	var name = event.srcElement;
	if (name.title != "-1") {
	    format('fontname', name.style.fontFamily);
	    $("toolbar-fontname-list-current").innerHTML = name.innerHTML;
	    Hide($("toolbar-fontname-list"));
	}
    };

    /*
     * 大小
     */
    $("toolbar-fontsize").onmousedown = function() {
	displayElement("toolbar-fontsize", "");
    };

    $("toolbar-fontsize-list").onmousedown = function() {
	var name = event.srcElement;
	if (name.title != "-1") {
	    format('fontSize', name.innerHTML + "pt");
	    $("toolbar-fontsize-list-current").innerHTML = name.innerHTML;
	    Hide($("toolbar-fontsize-list"));
	}
    };

    // 加粗
    $("toolbar-bold").onmousedown = function() {
	format('Bold');
    };

    // 斜体
    $("toolbar-italic").onmousedown = function() {
	format('Italic');
    };

    // 下划线
    $("toolbar-underline").onmousedown = function() {
	format('Underline');
    };

    // 颜色
    $("toolbar-color").onmousedown = function() {
	var colorValue = TK.showColorBorad();
	if (colorValue != null && colorValue) {
	    format("foreColor", colorValue);
	}
    };
    /*
     * 点击左侧颜色
     */
    $("toolbar-color-board-canvas-left").onmousedown = function() {
//	
//	$("toolbar-color-board-left-drag").style.top = (event.offsetY + 3)
//		+ "px";
//
//	$("myerror").innerHTML = "<br/>x:" + event.offsetX + ",y:"
//		+ event.offsetY;
    };
    // 发光

};

/*
 * 
 * 工具条3 对齐方式 列表 缩进
 * 
 */
TK.onMouseDownToolbarGroup3 = function() {

    /*
     * 对齐方式
     */
    $("toolbar-justifyleft").onmousedown = function() {
	format('justifyleft');
    };

    $("toolbar-justifycenter").onmousedown = function() {
	format('justifycenter');
    };

    $("toolbar-justifyright").onmousedown = function() {
	format('justifyright');
    };

    $("toolbar-justifyfull").onmousedown = function() {
	format('justifyfull');
    };

    /*
     * 列表
     */
    $("toolbar-listol").onmousedown = function() {
	format('Insertorderedlist');
    };

    $("toolbar-listul").onmousedown = function() {
	format('Insertunorderedlist');
    };

    /*
     * 缩进
     */
    $("toolbar-tableft").onmousedown = function() {
	format('Outdent');
    };

    $("toolbar-tabright").onmousedown = function() {
	format('Indent');
    };

};

/*
 * 工具条:链接 工具条:图片 工具条:表情 工具条: 高级工具条
 * 
 */

TK.onMouseDownToolbarGroup4 = function() {
    /*
     * 插入链接
     */
    $("toolbar-link").onmousedown = function() {
	var URL = prompt("Enter link location :", "http://");
	if ((URL != null) && (URL != "http://")) {
	    format("CreateLink", URL);
	}
    };
    /*
     * 插入图片
     */
    $("toolbar-image").onmousedown = function() {
	var sPhoto = prompt("请输入图片位置:", "http://");
	if ((sPhoto != null) && (sPhoto != "http://")) {
	    format("InsertImage", sPhoto);
	}
    };

    /*
     * 高级功能
     */
    $("toolbar-switcher").onmousedown = function() {

	if ($("toolbar-extra").style.display != "block") {
	    $("toolbar-extra").style.display = "block";
	} else {
	    $("toolbar-extra").style.display = "none";
	}
    };

};

/*
 * 工具条:清除格式 工具条:切换到HTML代码 工具条:全屏
 */
TK.onMouseDownToolbarGroup5 = function() {
    /*
     * 切换到HTML代码
     */
    $("toolbar-html").onmousedown = function() {

	var f = getFrams();
	var fbody = f.document.getElementsByTagName("BODY")[0];

	if ($("main-content-html").style.display != "block") {

	    $("main-content-html").style.display = "block";
	    $("main-content-html").value = fbody.innerHTML;
	    $("main-content-iframe").style.display = "none";

	} else {
	    $("main-content-iframe").style.display = "block";
	    fbody.innerHTML = $("main-content-html").value;
	    $("main-content-html").style.display = "none";

	}

    };
};

TK.onMouseDownToolbarGroup6 = function() {

};

TK.onload = function() {

    try {
	Loaded = true;
	setEditable();
	getIEVer();
	setFrmClick();
    } catch (e) {

    }
    onMouseDownToolbarGroup1();
    onMouseDownToolbarGroup2();
    onMouseDownToolbarGroup3();
    onMouseDownToolbarGroup4();
    onMouseDownToolbarGroup5();
    onMouseDownToolbarGroup6();

    if (0 && IEVer) {
	ieFunction();
    }

    /*
     * 这个定时器主要用于调整框架，当框架没有得到焦点时应该不会变大或变小吧
     * 
     */
    setInterval("StartCheckIfram()", 1000);

}

TK.ieFunction = function() {
    $("toolbar-fontname-list").onmousemove = function() {
	try {
	    event.srcElement.style.backgroundColor = "rgba(141, 145, 126, 0.30)";
	} catch (e) {
	    event.srcElement.style.backgroundColor = "rgb(141, 145, 126)";
	}
    };

    $("toolbar-fontname-list").onmouseout = function() {
	try {
	    event.srcElement.style.backgroundColor = "rgba(235, 236, 230, 0.30)";
	} catch (e) {
	    event.srcElement.style.backgroundColor = "rgb(235, 236, 230)";
	}
    };

    $("toolbar-fontsize-list").onmousemove = function() {
	try {
	    event.srcElement.style.backgroundColor = "rgba(141, 145, 126, 0.30)";
	} catch (e) {
	    event.srcElement.style.backgroundColor = "rgb(141, 145, 126)";
	}
    };

    $("toolbar-fontsize-list").onmouseout = function() {
	try {
	    event.srcElement.style.backgroundColor = "rgba(235, 236, 230, 0.30)";
	} catch (e) {
	    event.srcElement.style.backgroundColor = "rgb(235, 236, 230)";
	}
    };

    try {
	$("toolbar-fontsize-list").style.backgroundColor = "rgba(235, 236, 230, 0.30)";
	$("toolbar-fontname-list").style.backgroundColor = "rgba(235, 236, 230, 0.30)";
    } catch (e) {
	$("toolbar-fontsize-list").style.backgroundColor = "rgb(235, 236, 230)";
	$("toolbar-fontname-list").style.backgroundColor = "rgb(235, 236, 230)";
    }

};

TK.onblur = function() {

};

TK.GetLastChild = function(e) {
	var num = e.children.length;
	if (num > 0) {
		e = e.children[num - 1];
		num = e.children.length;
	}
	return e;
};

TK.iframCkeck = function(myifram) {
    var f = frames[myifram].document.body;
    var num = f.children.length;
    if (num > 0) {
	var NewHeight = GetY(GetLastChild(f)) + 40;
	if (NewHeight > 800) {
	    $(myifram).style.height = NewHeight + "px";
	}
    }
}

TK.StartCheckIfram = function() {
    iframCkeck("main-content-iframe");
};

TK.onclick = function() {

};

TK.onerror = function(msg, url, line) {
    $("myerror").innerHTML = $("myerror").innerHTML + "<br/>onerror:" + msg
	    + "<br/> url:" + url + "<br/> line:" + line + "<br>";
};

TK.format = function(type, para) {

    HideMenu();

    var f = getFrams();

    var alertmsg = "";

    if (!IsIE) {
	switch (type) {
	case "Cut":
	    alertmsg = "你的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成";
	    break;
	case "Copy":
	    alertmsg = "你的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成";
	    break;
	case "Paste":
	    alertmsg = "你的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成";
	    break;
	}

	if (alertmsg != "") {
	    alert(alertmsg);
	    return;
	}
    }

    f.focus();

    if (!para) {
	if (IsIE) {
	    f.document.execCommand(type);
	} else {
	    f.document.execCommand(type, false, false);
	}
    } else {
	f.document.execCommand(type, false, para);
    }

    f.focus();

}

TK.Hide = function(obj) {
    obj.style.display = "none";
};

TK.GetX = function(e) {
    var x = e.offsetLeft;
    while (e = e.offsetParent) {
	x += e.offsetLeft;
    }
    return x;
}

TK.GetY = function(e) {
    var y = e.offsetTop;
    while (e = e.offsetParent) {
	y += e.offsetTop;
    }
    return y;
}

TK.displayElement = function(name, displayValue) {

    HideMenu();

    var elementname = name + "-list";

    if (typeof elementname == "string") {
	activeMenu = $(elementname);
    }

    if (activeMenu == null) {
	return;
    }

    name = $(name);
    // $("myerror").innerHTML += "<br/>elementname:"+elementname
    // +"->activeMenu:"+activeMenu ;

    if (name != null) {
	var x = GetX(name);
	var y = GetY(name);
	// $("myerror").innerHTML +=
	// "<br/>activeMenu"+activeMenu+"x:"+x+",y:"+y;
	activeMenu.style.display = "block";
	activeMenu.style.left = x + "px";
	activeMenu.style.top = (y + 25) + "px";
    }
}
TK.showColorBorad = function() {
    var colorValue = null;

    return colorValue;
};
