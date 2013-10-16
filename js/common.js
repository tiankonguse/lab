(function() {
	$(document).ready(function() {
		//监听滚动
		$(window).scroll(function(event) {
			if ($(window).scrollTop() > 20) {
				_topShow();
				return;
			}
			_topHide();
		});
		//滚动到顶部
		$('.top-btn').click(function(e) {
			_scrollTop();
		});
	});

	var _topShow = function() {
		$('.top-btn').removeClass('top-hide').addClass('top-show');
	};
	var _topHide = function() {
		if ($('.top-btn').attr('class') != undefined && $('.top-btn').attr('class').indexOf('top-show') != -1)
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

