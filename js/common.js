(function() {
	$(document).ready(function() {
		// 监听滚动
		$(window).scroll(function(event) {
			if ($(window).scrollTop() > 20) {
				_topShow();
				return;
			}
			_topHide();
		});
		// 滚动到顶部
		$('.top-btn').click(function(e) {
			_scrollTop();
		});
	});

	var _topShow = function() {
		$('.top-btn').removeClass('top-hide').addClass('top-show');
	};
	var _topHide = function() {
		if ($('.top-btn').attr('class') != undefined
				&& $('.top-btn').attr('class').indexOf('top-show') != -1)
			$('.top-btn').addClass('top-hide');
	};
	var _scrollTop = function() {
		var _duration = 1000;
		var _scrollTop = $(window).scrollTop();
		var _times = _duration / 10;
		var _step = _scrollTop / _times;
		var _current = 0;
		var _timer = setInterval(function() {
			_current++;
			if (_current > _times) {
				clearInterval(_timer);
				return;
			}
			$(window).scrollTop($(window).scrollTop() - _step);
		}, 10);
	};
})();

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function noop() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());


/* 点击向上滚动 */
function scrollToTop(ele){
    this.button = ele;
    this.step = 600; 
    this.doc = $(document);
    this.initEvent();
}


scrollToTop.prototype = {
    initEvent : function(){
        var obj = this;
        obj.button.click(function(e){
            e.preventDefault();
            obj.doc.scrollTo(0,obj.step);
        });
    }
};


