function Magnifier(option) {
	this.cont = option.cont;
	this.bor = option.bor;
	this.img = option.img;
	this.mag = option.mag;
	this.scale = option.scale || 4;
	this.imgHttp = option.imgHttp || $("#img")[0].src;

	this.init(); // 初始化
}

Magnifier.prototype = {
	init : function() {
		// 给放大的图像初始化属性
		this.img.css({
			'position' : 'absolute',
			'width' : (this.cont.innerWidth() * this.scale) + 'px',
			// 原始图像的宽*比例值
			'height' : (this.cont.innerHeight() * this.scale) + 'px'
		// 原始图像的高*比例值
		});

		// 给放大框初始化属性
		this.mag.css({
			'display' : 'none',
			'width' : this.cont.innerWidth() + 'px',
			// m.cont为原始图像,与原始图像等宽
			'height' : this.cont.innerHeight() + 'px',
			'position' : 'absolute',
			'left' : this.cont.offset().left + this.cont.outerWidth() + 10
					+ 'px', // 放大框的位置为原始图像的右方远10px
			'top' : this.cont.offset().top + 'px'
		});

		var borderWid = this.cont.outerWidth() - this.cont.innerWidth();

		this.bor.css({
			'display' : 'none', // 开始设置为不可见
			'width' : this.cont.innerWidth() / this.scale - borderWid + 'px',
			// 原始图片的宽/比例值 - border的宽度
			'height' : this.cont.innerHeight() / this.scale - borderWid + 'px',
			// 原始图片的高/比例值 - border的宽度
			'opacity' : 0.5
		// 设置透明度
		});

		this.img[0].src = this.imgHttp; // 让原始图像的src值给予放大图像

		var _this = this;

		this.bor._data = {
			top : this.cont.offset().top,
			left : this.cont.offset().left,
			bottom : this.cont.innerHeight() - this.bor.innerHeight(),
			right : this.cont.innerWidth() - this.bor.innerWidth(),
			height_2 : parseInt(this.bor.innerHeight()) / 2,
			width_2 : parseInt(this.bor.innerWidth()) / 2
		};

		this.cont.bind('mousemove', function(e) {
			_this.move(e);
		})
		this.cont.bind('mouseout', function() {
			_this.end();
		})

	},
	move : function(e) {
		this.bor.show()
				.css(
						{
							'top' : Math.min(Math.max(e.pageY
									- this.bor._data.top
									- this.bor._data.height_2, 0),
									this.bor._data.bottom) - this.cont.innerHeight()
									+ 'px',
							'left' : (Math.min(Math.max(e.pageX
									- this.bor._data.left
									- this.bor._data.width_2, 0),
									this.bor._data.right))
									+ 'px'
						// left=鼠标x - this.offsetLeft -
						// 浏览框宽/2,Math.max和Math.min让浏览框不会超出图像
						})
		this.mag.show();

		this.img.show().css({
			'top' : -((parseInt(this.bor[0].style.top) + this.cont.innerHeight()) * this.scale) + 'px',
			'left' : -(parseInt(this.bor[0].style.left) * this.scale) + 'px'
		})
	},
	end : function(e) {
		this.bor.hide();
		this.mag.hide();
	}
}