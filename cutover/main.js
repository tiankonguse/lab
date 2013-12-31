function startMove(obj, json, endFn) {
	clearInterval(obj.timer);
	obj.timer = setInterval(function() {
		moveOneStep(obj, json, endFn);
	}, 30);
}

function moveOneStep(obj, json, endFn) {
	var bBtn = true;
	for ( var attr in json) {
		var iCur = 0;
		if (attr == 'opacity') {
			var val = Math.round(parseFloat(getStyle(obj, attr)) * 100);
			if (val == 0) {
				iCur = val;
			} else {
				iCur = val || 100;
			}
		} else {
			iCur = parseInt(getStyle(obj, attr)) || 0;
		}

		var iSpeed = (json[attr] - iCur) / 8;
		iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
		if (iCur != json[attr]) {
			bBtn = false;
		}

		if (attr == 'opacity') {
			obj.style.filter = 'alpha(opacity=' + (iCur + iSpeed) + ')';
			obj.style.opacity = (iCur + iSpeed) / 100;
		} else {
			obj.style[attr] = iCur + iSpeed + 'px';
		}
	}

	if (bBtn) {
		clearInterval(obj.timer);
		if (endFn) {
			endFn.call(obj);
		}
	}
}

function getStyle(obj, attr) {
	if (obj.currentStyle) {
		return obj.currentStyle[attr];
	} else {
		return getComputedStyle(obj, false)[attr];
	}
}


