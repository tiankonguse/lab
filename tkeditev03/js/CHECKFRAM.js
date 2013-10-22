CHECKFRAM = {
	myifram : " ",
	height : 0,
	$ : function(id) {
		return document.getElementById(id);
	},
	GetY : function(e) {
		var y = e.offsetTop;
		while (e = e.offsetParent) {
			y += e.offsetTop;
		}
		return y;
	},
	GetLastChild : function(e) {
		var num = e.children.length;
		if (num > 0) {
			e = e.children[num - 1];
			num = e.children.length;
		}
		return e;
	},
	MyiframCheck : function() {
		var f = frames[this.myifram].document.body;
		var NewHeight = this.GetY(this.GetLastChild(f)) + 20;
		if (NewHeight > this.height) {
			this.$(this.myifram).style.height = NewHeight + "px";
		}
//		setTimeout("CHECKFRAM.MyiframCheck()", 1000);
	},

	StartCheckIfram : function(myifram, height) {
		this.myifram = myifram;
		this.height = height;
//		this.MyiframCheck();
		setInterval("CHECKFRAM.MyiframCheck()",1000);
	}
};