(function (window, undefined) {
	if (window.TKEditor) {
		return;
	}
	if (!window.console) {
		window.console = {};
	}
	if (!console.log) {
		console.log = function () {};
	}
	var _VERSION = '4.1.6 (2013-03-24)',
		_ua = navigator.userAgent.toLowerCase(),
		_IE = _ua.indexOf('msie') > -1 && _ua.indexOf('opera') == -1,
		_GECKO = _ua.indexOf('gecko') > -1 && _ua.indexOf('khtml') == -1,
		_WEBKIT = _ua.indexOf('applewebkit') > -1,
		_OPERA = _ua.indexOf('opera') > -1,
		_MOBILE = _ua.indexOf('mobile') > -1,
		_IOS = /ipad|iphone|ipod/.test(_ua),
		_QUIRKS = document.compatMode != 'CSS1Compat',
		_matches = /(?:msie|firefox|webkit|opera)[\/:\s](\d+)/.exec(_ua),
		_V = _matches ? _matches[1] : '0',
		_TIME = new Date().getTime();
		
	function _is(val, object){
		return (!!val) && Object.prototype.toString.call(val) === ('[object '+object+']');
	}	
		
	function _isArray(val) {
		if (!val) {
			return false;
		}
		return Object.prototype.toString.call(val) === '[object Array]';
	}
	function _isFunction(val) {
		if (!val) {
			return false;
		}
		return Object.prototype.toString.call(val) === '[object Function]';
	}
	function _inArray(val, arr) {
		for (var i = 0, len = arr.length; i < len; i++) {
			if (val === arr[i]) {
				return i;
			}
		}
		return -1;
	}
	function _each(obj, fn) {
		if (_isArray(obj)) {
			for (var i = 0, len = obj.length; i < len; i++) {
				if (fn.call(obj[i], i, obj[i]) === false) {
					break;
				}
			}
		} else {
			for (var key in obj) {
				if (obj.hasOwnProperty(key)) {
					if (fn.call(obj[key], key, obj[key]) === false) {
						break;
					}
				}
			}
		}
	}
	function _trim(str) {
		return str.replace(/(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g, '');
	}
	function _inString(val, str, delimiter) {
		delimiter = delimiter === undefined ? ',' : delimiter;
		return (delimiter + str + delimiter).indexOf(delimiter + val + delimiter) >= 0;
	}
	function _addUnit(val, unit) {
		unit = unit || 'px';
		return val && /^\d+$/.test(val) ? val + unit : val;
	}
	function _removeUnit(val) {
		var match;
		return val && (match = /(\d+)/.exec(val)) ? parseInt(match[1], 10) : 0;
	}
	function _escape(val) {
		return val.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
	}
	function _unescape(val) {
		return val.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"').replace(/&amp;/g, '&');
	}
	function _toCamel(str) {
		var arr = str.split('-');
		str = '';
		_each(arr, function(key, val) {
			str += (key > 0) ? val.charAt(0).toUpperCase() + val.substr(1) : val;
		});
		return str;
	}
	function _toHex(val) {
		function hex(d) {
			var s = parseInt(d, 10).toString(16).toUpperCase();
			return s.length > 1 ? s : '0' + s;
		}
		return val.replace(/rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/ig,
			function($0, $1, $2, $3) {
				return '#' + hex($1) + hex($2) + hex($3);
			}
		);
	}
	function _toMap(val, delimiter) {
		delimiter = delimiter === undefined ? ',' : delimiter;
		var map = {}, arr = _isArray(val) ? val : val.split(delimiter), match;
		_each(arr, function(key, val) {
			if ((match = /^(\d+)\.\.(\d+)$/.exec(val))) {
				for (var i = parseInt(match[1], 10), _i = parseInt(match[2], 10); i <= _i; i++) {
					map[i.toString()] = true;
				}
			} else {
				map[val] = true;
			}
		});
		return map;
	}
	function _toArray(obj, offset) {
		return Array.prototype.slice.call(obj, offset || 0);
	}
	function _undef(val, defaultVal) {
		return val === undefined ? defaultVal : val;
	}
	function _invalidUrl(url) {
		return !url || /[<>"]/.test(url);
	}
	function _addParam(url, param) {
		return url.indexOf('?') >= 0 ? url + '&' + param : url + '?' + param;
	}
	function _extend(child, parent, proto) {
		if (!proto) {
			proto = parent;
			parent = null;
		}
		var childProto;
		if (parent) {
			var fn = function () {};
			fn.prototype = parent.prototype;
			childProto = new fn();
			_each(proto, function(key, val) {
				childProto[key] = val;
			});
		} else {
			childProto = proto;
		}
		childProto.constructor = child;
		child.prototype = childProto;
		child.parent = parent ? parent.prototype : null;
	}
	function _json(text) {
		var match;
		if ((match = /\{[\s\S]*\}|\[[\s\S]*\]/.exec(text))) {
			text = match[0];
		}
		var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
		cx.lastIndex = 0;
		if (cx.test(text)) {
			text = text.replace(cx, function (a) {
				return '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
			});
		}
		if (/^[\],:{}\s]*$/.
		test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').
		replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
		replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
			return eval('(' + text + ')');
		}
		throw 'JSON parse error';
	}
	var _round = Math.round;
	var TK = {
		DEBUG : false,
		VERSION : _VERSION,
		IE : _IE,
		GECKO : _GECKO,
		WEBKIT : _WEBKIT,
		OPERA : _OPERA,
		V : _V,
		TIME : _TIME,
		each : _each,
		isArray : _isArray,
		isFunction : _isFunction,
		inArray : _inArray,
		inString : _inString,
		trim : _trim,
		addUnit : _addUnit,
		removeUnit : _removeUnit,
		escape : _escape,
		unescape : _unescape,
		toCamel : _toCamel,
		toHex : _toHex,
		toMap : _toMap,
		toArray : _toArray,
		undef : _undef,
		invalidUrl : _invalidUrl,
		addParam : _addParam,
		extend : _extend,
		json : _json
	};
	var
		_INLINE_TAG_MAP = _toMap('a,abbr,acronym,b,basefont,bdo,big,br,button,cite,code,del,dfn,em,font,i,img,input,ins,kbd,label,map,q,s,samp,select,small,span,strike,strong,sub,sup,textarea,tt,u,var'),
		_BLOCK_TAG_MAP = _toMap('address,applet,blockquote,body,center,dd,dir,div,dl,dt,fieldset,form,frameset,h1,h2,h3,h4,h5,h6,head,hr,html,iframe,ins,isindex,li,map,menu,meta,noframes,noscript,object,ol,p,pre,script,style,table,tbody,td,tfoot,th,thead,title,tr,ul'),
		_SINGLE_TAG_MAP = _toMap('area,base,basefont,br,col,frame,hr,img,input,isindex,link,meta,param,embed'),
		_STYLE_TAG_MAP = _toMap('b,basefont,big,del,em,font,i,s,small,span,strike,strong,sub,sup,u'),
		_CONTROL_TAG_MAP = _toMap('img,table,input,textarea,button'),
		_PRE_TAG_MAP = _toMap('pre,style,script'),
		_NOSPLIT_TAG_MAP = _toMap('html,head,body,td,tr,table,ol,ul,li'),
		_AUTOCLOSE_TAG_MAP = _toMap('colgroup,dd,dt,li,options,p,td,tfoot,th,thead,tr'),
		_FILL_ATTR_MAP = _toMap('checked,compact,declare,defer,disabled,ismap,multiple,nohref,noresize,noshade,nowrap,readonly,selected'),
		_VALUE_TAG_MAP = _toMap('input,button,textarea,select');
		
	function _getBasePath() {
		var els = document.getElementsByTagName('script'), src;
		for (var i = 0, len = els.length; i < len; i++) {
			src = els[i].src || '';
			if (/TKediter[\w\-\.]*\.js/.test(src)) {
				return src.substring(0, src.lastIndexOf('/') + 1);
			}
		}
		return '';
	}
	TK.basePath = _getBasePath();
	
K.options = {
	designMode : true,
	fullscreenMode : false,
	filterMode : true,
	wellFormatMode : true,
	shadowMode : true,
	loadStyleMode : true,
	basePath : TK.basePath,
	themesPath : TK.basePath + 'themes/',
	langPath : TK.basePath + 'lang/',
	pluginsPath : TK.basePath + 'plugins/',
	themeType : 'default',
	langType : 'zh_CN',
	urlType : '',
	newlineTag : 'p',
	resizeType : 2,
	syncType : 'form',
	pasteType : 2,
	dialogAlignType : 'page',
	useContextmenu : true,
	fullscreenShortcut : false,
	bodyClass : 'tke-content',
	indentChar : '\t',
	cssPath : '',
	cssData : '',
	minWidth : 650,
	minHeight : 100,
	minChangeSize : 50,
	zIndex : 811213,
	items : [
		'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
		'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
		'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
		'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
		'anchor', 'link', 'unlink', '|', 'about'
	],
	noDisableItems : ['source', 'fullscreen'],
	colorTable : [
		['#E53333', '#E56600', '#FF9900', '#64451D', '#DFC5A4', '#FFE500'],
		['#009900', '#006600', '#99BB00', '#B8D100', '#60D978', '#00D5FF'],
		['#337FE5', '#003399', '#4C33E5', '#9933E5', '#CC33E5', '#EE33EE'],
		['#FFFFFF', '#CCCCCC', '#999999', '#666666', '#333333', '#000000']
	],
	fontSizeTable : ['9px', '10px', '12px', '14px', '16px', '18px', '24px', '32px'],
	htmlTags : {
		font : ['id', 'class', 'color', 'size', 'face', '.background-color'],
		span : [
			'id', 'class', '.color', '.background-color', '.font-size', '.font-family', '.background',
			'.font-weight', '.font-style', '.text-decoration', '.vertical-align', '.line-height'
		],
		div : [
			'id', 'class', 'align', '.border', '.margin', '.padding', '.text-align', '.color',
			'.background-color', '.font-size', '.font-family', '.font-weight', '.background',
			'.font-style', '.text-decoration', '.vertical-align', '.margin-left'
		],
		table: [
			'id', 'class', 'border', 'cellspacing', 'cellpadding', 'width', 'height', 'align', 'bordercolor',
			'.padding', '.margin', '.border', 'bgcolor', '.text-align', '.color', '.background-color',
			'.font-size', '.font-family', '.font-weight', '.font-style', '.text-decoration', '.background',
			'.width', '.height', '.border-collapse'
		],
		'td,th': [
			'id', 'class', 'align', 'valign', 'width', 'height', 'colspan', 'rowspan', 'bgcolor',
			'.text-align', '.color', '.background-color', '.font-size', '.font-family', '.font-weight',
			'.font-style', '.text-decoration', '.vertical-align', '.background', '.border'
		],
		a : ['id', 'class', 'href', 'target', 'name'],
		embed : ['id', 'class', 'src', 'width', 'height', 'type', 'loop', 'autostart', 'quality', '.width', '.height', 'align', 'allowscriptaccess'],
		img : ['id', 'class', 'src', 'width', 'height', 'border', 'alt', 'title', 'align', '.width', '.height', '.border'],
		'p,ol,ul,li,blockquote,h1,h2,h3,h4,h5,h6' : [
			'id', 'class', 'align', '.text-align', '.color', '.background-color', '.font-size', '.font-family', '.background',
			'.font-weight', '.font-style', '.text-decoration', '.vertical-align', '.text-indent', '.margin-left'
		],
		pre : ['id', 'class'],
		hr : ['id', 'class', '.page-break-after'],
		'br,tbody,tr,strong,b,sub,sup,em,i,u,strike,s,del' : ['id', 'class'],
		iframe : ['id', 'class', 'src', 'frameborder', 'width', 'height', '.width', '.height']
	},
	layout : '<div class="container"><div class="toolbar"></div><div class="edit"></div><div class="statusbar"></div></div>'
};	
	var _useCapture = false;
	var _INPUT_KEY_MAP = _toMap('8,9,13,32,46,48..57,59,61,65..90,106,109..111,188,190..192,219..222');
	
	var _CURSORMOVE_KEY_MAP = _toMap('33..40');
	var _CHANGE_KEY_MAP = {};
	_each(_INPUT_KEY_MAP, function(key, val) {
		_CHANGE_KEY_MAP[key] = val;
	});
	
	_each(_CURSORMOVE_KEY_MAP, function(key, val) {
		_CHANGE_KEY_MAP[key] = val;
	});
	
	function _bindEvent(el, type, fn) {
		if (el.addEventListener){
			el.addEventListener(type, fn, _useCapture);
		} else if (el.attachEvent){
			el.attachEvent('on' + type, fn);
		}
	}
	function _unbindEvent(el, type, fn) {
		if (el.removeEventListener){
			el.removeEventListener(type, fn, _useCapture);
		} else if (el.detachEvent){
			el.detachEvent('on' + type, fn);
		}
	}
	var _EVENT_PROPS = ('altKey,attrChange,attrName,bubbles,button,cancelable,charCode,clientX,clientY,ctrlKey,currentTarget,' +
		'data,detail,eventPhase,fromElement,handler,keyCode,metaKey,newValue,offsetX,offsetY,originalTarget,pageX,' +
		'pageY,prevValue,relatedNode,relatedTarget,screenX,screenY,shiftKey,srcElement,target,toElement,view,wheelDelta,which').split(',');
	function TKEvent(el, event) {
		this.init(el, event);
	}
	
	_extend(TKEvent, {
		init : function(el, event) {
			var self = this, doc = el.ownerDocument || el.document || el;
			self.event = event;
			_each(_EVENT_PROPS, function(key, val) {
				self[val] = event[val];
			});
			if (!self.target) {
				self.target = self.srcElement || doc;
			}
			if (self.target.nodeType === 3) {
				self.target = self.target.parentNode;
			}
			if (!self.relatedTarget && self.fromElement) {
				self.relatedTarget = self.fromElement === self.target ? self.toElement : self.fromElement;
			}
			if (self.pageX == null && self.clientX != null) {
				var d = doc.documentElement, body = doc.body;
				self.pageX = self.clientX + (d && d.scrollLeft || body && body.scrollLeft || 0) - (d && d.clientLeft || body && body.clientLeft || 0);
				self.pageY = self.clientY + (d && d.scrollTop  || body && body.scrollTop  || 0) - (d && d.clientTop  || body && body.clientTop  || 0);
			}
			if (!self.which && ((self.charCode || self.charCode === 0) ? self.charCode : self.keyCode)) {
				self.which = self.charCode || self.keyCode;
			}
			if (!self.metaKey && self.ctrlKey) {
				self.metaKey = self.ctrlKey;
			}
			if (!self.which && self.button !== undefined) {
				self.which = (self.button & 1 ? 1 : (self.button & 2 ? 3 : (self.button & 4 ? 2 : 0)));
			}
			switch (self.which) {
			case 186 :
				self.which = 59;
				break;
			case 187 :
			case 107 :
			case 43 :
				self.which = 61;
				break;
			case 189 :
			case 45 :
				self.which = 109;
				break;
			case 42 :
				self.which = 106;
				break;
			case 47 :
				self.which = 111;
				break;
			case 78 :
				self.which = 110;
				break;
			}
			if (self.which >= 96 && self.which <= 105) {
				self.which -= 48;
			}
		},
		preventDefault : function() {
			var ev = this.event;
			if (ev.preventDefault) {
				ev.preventDefault();
			}
			ev.returnValue = false;
		},
		stopPropagation : function() {
			var ev = this.event;
			if (ev.stopPropagation) {
				ev.stopPropagation();
			}
			ev.cancelBubble = true;
		},
		stop : function() {
			this.preventDefault();
			this.stopPropagation();
		}
	});
	
	var _eventExpendo = 'TKEditor_' + _TIME, _eventId = 0, _eventData = {};
	function _getId(el) {
		return el[_eventExpendo] || null;
	}
	function _setId(el) {
		el[_eventExpendo] = ++_eventId;
		return _eventId;
	}
	function _removeId(el) {
		try {
			delete el[_eventExpendo];
		} catch(e) {
			if (el.removeAttribute) {
				el.removeAttribute(_eventExpendo);
			}
		}
	}
	function _bind(el, type, fn) {
		if (type.indexOf(',') >= 0) {
			_each(type.split(','), function() {
				_bind(el, this, fn);
			});
			return;
		}
		var id = _getId(el);
		if (!id) {
			id = _setId(el);
		}
		if (_eventData[id] === undefined) {
			_eventData[id] = {};
		}
		var events = _eventData[id][type];
		if (events && events.length > 0) {
			_unbindEvent(el, type, events[0]);
		} else {
			_eventData[id][type] = [];
			_eventData[id].el = el;
		}
		events = _eventData[id][type];
		if (events.length === 0) {
			events[0] = function(e) {
				var kevent = e ? new KEvent(el, e) : undefined;
				_each(events, function(i, event) {
					if (i > 0 && event) {
						event.call(el, kevent);
					}
				});
			};
		}
		if (_inArray(fn, events) < 0) {
			events.push(fn);
		}
		_bindEvent(el, type, events[0]);
	}
	function _unbind(el, type, fn) {
		if (type && type.indexOf(',') >= 0) {
			_each(type.split(','), function() {
				_unbind(el, this, fn);
			});
			return;
		}
		var id = _getId(el);
		if (!id) {
			return;
		}
		if (type === undefined) {
			if (id in _eventData) {
				_each(_eventData[id], function(key, events) {
					if (key != 'el' && events.length > 0) {
						_unbindEvent(el, key, events[0]);
					}
				});
				delete _eventData[id];
				_removeId(el);
			}
			return;
		}
		if (!_eventData[id]) {
			return;
		}
		var events = _eventData[id][type];
		if (events && events.length > 0) {
			if (fn === undefined) {
				_unbindEvent(el, type, events[0]);
				delete _eventData[id][type];
			} else {
				_each(events, function(i, event) {
					if (i > 0 && event === fn) {
						events.splice(i, 1);
					}
				});
				if (events.length == 1) {
					_unbindEvent(el, type, events[0]);
					delete _eventData[id][type];
				}
			}
			var count = 0;
			_each(_eventData[id], function() {
				count++;
			});
			if (count < 2) {
				delete _eventData[id];
				_removeId(el);
			}
		}
	}
	function _fire(el, type) {
		if (type.indexOf(',') >= 0) {
			_each(type.split(','), function() {
				_fire(el, this);
			});
			return;
		}
		var id = _getId(el);
		if (!id) {
			return;
		}
		var events = _eventData[id][type];
		if (_eventData[id] && events && events.length > 0) {
			events[0]();
		}
	}
	function _ctrl(el, key, fn) {
		var self = this;
		key = /^\d{2,}$/.test(key) ? key : key.toUpperCase().charCodeAt(0);
		_bind(el, 'keydown', function(e) {
			if (e.ctrlKey && e.which == key && !e.shiftKey && !e.altKey) {
				fn.call(el);
				e.stop();
			}
		});
	}
	function _ready(fn) {
		var loaded = false;
		function readyFunc() {
			if (!loaded) {
				loaded = true;
				fn(KindEditor);
			}
		}
		function ieReadyFunc() {
			if (!loaded) {
				try {
					document.documentElement.doScroll('left');
				} catch(e) {
					setTimeout(ieReadyFunc, 100);
					return;
				}
				readyFunc();
			}
		}
		function ieReadyStateFunc() {
			if (document.readyState === 'complete') {
				readyFunc();
			}
		}
		if (document.addEventListener) {
			_bind(document, 'DOMContentLoaded', readyFunc);
		} else if (document.attachEvent) {
			_bind(document, 'readystatechange', ieReadyStateFunc);
			var toplevel = false;
			try {
				toplevel = window.frameElement == null;
			} catch(e) {}
			if (document.documentElement.doScroll && toplevel) {
				ieReadyFunc();
			}
		}
		_bind(window, 'load', readyFunc);
	}
	if (_IE) {
		window.attachEvent('onunload', function() {
			_each(_eventData, function(key, events) {
				if (events.el) {
					_unbind(events.el);
				}
			});
		});
	}
	TK.ctrl = _ctrl;
	TK.ready = _ready;
	function _getCssList(css) {
		var list = {},
			reg = /\s*([\w\-]+)\s*:([^;]*)(;|$)/g,
			match;
		while ((match = reg.exec(css))) {
			var key = _trim(match[1].toLowerCase()),
				val = _trim(_toHex(match[2]));
			list[key] = val;
		}
		return list;
	}
	function _getAttrList(tag) {
		var list = {},
			reg = /\s+(?:([\w\-:]+)|(?:([\w\-:]+)=([^\s"'<>]+))|(?:([\w\-:"]+)="([^"]*)")|(?:([\w\-:"]+)='([^']*)'))(?=(?:\s|\/|>)+)/g,
			match;
		while ((match = reg.exec(tag))) {
			var key = (match[1] || match[2] || match[4] || match[6]).toLowerCase(),
				val = (match[2] ? match[3] : (match[4] ? match[5] : match[7])) || '';
			list[key] = val;
		}
		return list;
	}
	function _addClassToTag(tag, className) {
		if (/\s+class\s*=/.test(tag)) {
			tag = tag.replace(/(\s+class=["']?)([^"']*)(["']?[\s>])/, function($0, $1, $2, $3) {
				if ((' ' + $2 + ' ').indexOf(' ' + className + ' ') < 0) {
					return $2 === '' ? $1 + className + $3 : $1 + $2 + ' ' + className + $3;
				} else {
					return $0;
				}
			});
		} else {
			tag = tag.substr(0, tag.length - 1) + ' class="' + className + '">';
		}
		return tag;
	}
	function _formatCss(css) {
		var str = '';
		_each(_getCssList(css), function(key, val) {
			str += key + ':' + val + ';';
		});
		return str;
	}
	
	function _formatUrl(url, mode, host, pathname) {
		mode = _undef(mode, '').toLowerCase();
		if (url.substr(0, 5) != 'data:') {
			url = url.replace(/([^:])\/\//g, '$1/');
		}
		if (_inArray(mode, ['absolute', 'relative', 'domain']) < 0) {
			return url;
		}
		host = host || location.protocol + '//' + location.host;
		if (pathname === undefined) {
			var m = location.pathname.match(/^(\/.*)\//);
			pathname = m ? m[1] : '';
		}
		var match;
		if ((match = /^(\w+:\/\/[^\/]*)/.exec(url))) {
			if (match[1] !== host) {
				return url;
			}
		} else if (/^\w+:/.test(url)) {
			return url;
		}
		function getRealPath(path) {
			var parts = path.split('/'), paths = [];
			for (var i = 0, len = parts.length; i < len; i++) {
				var part = parts[i];
				if (part == '..') {
					if (paths.length > 0) {
						paths.pop();
					}
				} else if (part !== '' && part != '.') {
					paths.push(part);
				}
			}
			return '/' + paths.join('/');
		}
		if (/^\//.test(url)) {
			url = host + getRealPath(url.substr(1));
		} else if (!/^\w+:\/\//.test(url)) {
			url = host + getRealPath(pathname + '/' + url);
		}
		function getRelativePath(path, depth) {
			if (url.substr(0, path.length) === path) {
				var arr = [];
				for (var i = 0; i < depth; i++) {
					arr.push('..');
				}
				var prefix = '.';
				if (arr.length > 0) {
					prefix += '/' + arr.join('/');
				}
				if (pathname == '/') {
					prefix += '/';
				}
				return prefix + url.substr(path.length);
			} else {
				if ((match = /^(.*)\//.exec(path))) {
					return getRelativePath(match[1], ++depth);
				}
			}
		}
		if (mode === 'relative') {
			url = getRelativePath(host + pathname, 0).substr(2);
		} else if (mode === 'absolute') {
			if (url.substr(0, host.length) === host) {
				url = url.substr(host.length);
			}
		}
		return url;
	}
	
	function _formatHtml(html, htmlTags, urlType, wellFormatted, indentChar) {
		urlType = urlType || '';
		wellFormatted = _undef(wellFormatted, false);
		indentChar = _undef(indentChar, '\t');
		var fontSizeList = 'xx-small,x-small,small,medium,large,x-large,xx-large'.split(',');
		html = html.replace(/(<(?:pre|pre\s[^>]*)>)([\s\S]*?)(<\/pre>)/ig, function($0, $1, $2, $3) {
			return $1 + $2.replace(/<(?:br|br\s[^>]*)>/ig, '\n') + $3;
		});
		html = html.replace(/<(?:br|br\s[^>]*)\s*\/?>\s*<\/p>/ig, '</p>');
		html = html.replace(/(<(?:p|p\s[^>]*)>)\s*(<\/p>)/ig, '$1<br />$2');
		html = html.replace(/\u200B/g, '');
		html = html.replace(/\u00A9/g, '&copy;');
		var htmlTagMap = {};
		if (htmlTags) {
			_each(htmlTags, function(key, val) {
				var arr = key.split(',');
				for (var i = 0, len = arr.length; i < len; i++) {
					htmlTagMap[arr[i]] = _toMap(val);
				}
			});
			if (!htmlTagMap.script) {
				html = html.replace(/(<(?:script|script\s[^>]*)>)([\s\S]*?)(<\/script>)/ig, '');
			}
			if (!htmlTagMap.style) {
				html = html.replace(/(<(?:style|style\s[^>]*)>)([\s\S]*?)(<\/style>)/ig, '');
			}
		}
		var re = /([ \t\n\r]*)<(\/)?([\w\-:]+)((?:\s+|(?:\s+[\w\-:]+)|(?:\s+[\w\-:]+=[^\s"'<>]+)|(?:\s+[\w\-:"]+="[^"]*")|(?:\s+[\w\-:"]+='[^']*'))*)(\/)?>([ \t\n\r]*)/g;
		var tagStack = [];
		html = html.replace(re, function($0, $1, $2, $3, $4, $5, $6) {
			var full = $0,
				startNewline = $1 || '',
				startSlash = $2 || '',
				tagName = $3.toLowerCase(),
				attr = $4 || '',
				endSlash = $5 ? ' ' + $5 : '',
				endNewline = $6 || '';
			if (htmlTags && !htmlTagMap[tagName]) {
				return '';
			}
			if (endSlash === '' && _SINGLE_TAG_MAP[tagName]) {
				endSlash = ' /';
			}
			if (_INLINE_TAG_MAP[tagName]) {
				if (startNewline) {
					startNewline = ' ';
				}
				if (endNewline) {
					endNewline = ' ';
				}
			}
			if (_PRE_TAG_MAP[tagName]) {
				if (startSlash) {
					endNewline = '\n';
				} else {
					startNewline = '\n';
				}
			}
			if (wellFormatted && tagName == 'br') {
				endNewline = '\n';
			}
			if (_BLOCK_TAG_MAP[tagName] && !_PRE_TAG_MAP[tagName]) {
				if (wellFormatted) {
					if (startSlash && tagStack.length > 0 && tagStack[tagStack.length - 1] === tagName) {
						tagStack.pop();
					} else {
						tagStack.push(tagName);
					}
					startNewline = '\n';
					endNewline = '\n';
					for (var i = 0, len = startSlash ? tagStack.length : tagStack.length - 1; i < len; i++) {
						startNewline += indentChar;
						if (!startSlash) {
							endNewline += indentChar;
						}
					}
					if (endSlash) {
						tagStack.pop();
					} else if (!startSlash) {
						endNewline += indentChar;
					}
				} else {
					startNewline = endNewline = '';
				}
			}
			if (attr !== '') {
				var attrMap = _getAttrList(full);
				if (tagName === 'font') {
					var fontStyleMap = {}, fontStyle = '';
					_each(attrMap, function(key, val) {
						if (key === 'color') {
							fontStyleMap.color = val;
							delete attrMap[key];
						}
						if (key === 'size') {
							fontStyleMap['font-size'] = fontSizeList[parseInt(val, 10) - 1] || '';
							delete attrMap[key];
						}
						if (key === 'face') {
							fontStyleMap['font-family'] = val;
							delete attrMap[key];
						}
						if (key === 'style') {
							fontStyle = val;
						}
					});
					if (fontStyle && !/;$/.test(fontStyle)) {
						fontStyle += ';';
					}
					_each(fontStyleMap, function(key, val) {
						if (val === '') {
							return;
						}
						if (/\s/.test(val)) {
							val = "'" + val + "'";
						}
						fontStyle += key + ':' + val + ';';
					});
					attrMap.style = fontStyle;
				}
				_each(attrMap, function(key, val) {
					if (_FILL_ATTR_MAP[key]) {
						attrMap[key] = key;
					}
					if (_inArray(key, ['src', 'href']) >= 0) {
						attrMap[key] = _formatUrl(val, urlType);
					}
					if (htmlTags && key !== 'style' && !htmlTagMap[tagName]['*'] && !htmlTagMap[tagName][key] ||
						tagName === 'body' && key === 'contenteditable' ||
						/^kindeditor_\d+$/.test(key)) {
						delete attrMap[key];
					}
					if (key === 'style' && val !== '') {
						var styleMap = _getCssList(val);
						_each(styleMap, function(k, v) {
							if (htmlTags && !htmlTagMap[tagName].style && !htmlTagMap[tagName]['.' + k]) {
								delete styleMap[k];
							}
						});
						var style = '';
						_each(styleMap, function(k, v) {
							style += k + ':' + v + ';';
						});
						attrMap.style = style;
					}
				});
				attr = '';
				_each(attrMap, function(key, val) {
					if (key === 'style' && val === '') {
						return;
					}
					val = val.replace(/"/g, '&quot;');
					attr += ' ' + key + '="' + val + '"';
				});
			}
			if (tagName === 'font') {
				tagName = 'span';
			}
			return startNewline + '<' + startSlash + tagName + attr + endSlash + '>' + endNewline;
		});
		html = html.replace(/(<(?:pre|pre\s[^>]*)>)([\s\S]*?)(<\/pre>)/ig, function($0, $1, $2, $3) {
			return $1 + $2.replace(/\n/g, '<span id="__kindeditor_pre_newline__">\n') + $3;
		});
		html = html.replace(/\n\s*\n/g, '\n');
		html = html.replace(/<span id="__kindeditor_pre_newline__">\n/g, '\n');
		return _trim(html);
	}
	
	function _clearMsWord(html, htmlTags) {
		html = html.replace(/<meta[\s\S]*?>/ig, '')
			.replace(/<![\s\S]*?>/ig, '')
			.replace(/<style[^>]*>[\s\S]*?<\/style>/ig, '')
			.replace(/<script[^>]*>[\s\S]*?<\/script>/ig, '')
			.replace(/<w:[^>]+>[\s\S]*?<\/w:[^>]+>/ig, '')
			.replace(/<o:[^>]+>[\s\S]*?<\/o:[^>]+>/ig, '')
			.replace(/<xml>[\s\S]*?<\/xml>/ig, '')
			.replace(/<(?:table|td)[^>]*>/ig, function(full) {
				return full.replace(/border-bottom:([#\w\s]+)/ig, 'border:$1');
			});
		return _formatHtml(html, htmlTags);
	}
	
	function _mediaType(src) {
		if (/\.(rm|rmvb)(\?|$)/i.test(src)) {
			return 'audio/x-pn-realaudio-plugin';
		}
		if (/\.(swf|flv)(\?|$)/i.test(src)) {
			return 'application/x-shockwave-flash';
		}
		return 'video/x-ms-asf-plugin';
	}
	function _mediaClass(type) {
		if (/realaudio/i.test(type)) {
			return 'tke-rm';
		}
		if (/flash/i.test(type)) {
			return 'tke-flash';
		}
		return 'tke-media';
	}
	function _mediaAttrs(srcTag) {
		return _getAttrList(unescape(srcTag));
	}
	function _mediaEmbed(attrs) {
		var html = '<embed ';
		_each(attrs, function(key, val) {
			html += key + '="' + val + '" ';
		});
		html += '/>';
		return html;
	}
	function _mediaImg(blankPath, attrs) {
		var width = attrs.width,
			height = attrs.height,
			type = attrs.type || _mediaType(attrs.src),
			srcTag = _mediaEmbed(attrs),
			style = '';
		if (width > 0) {
			style += 'width:' + width + 'px;';
		}
		if (height > 0) {
			style += 'height:' + height + 'px;';
		}
		var html = '<img class="' + _mediaClass(type) + '" src="' + blankPath + '" ';
		if (style !== '') {
			html += 'style="' + style + '" ';
		}
		html += 'data-ke-tag="' + escape(srcTag) + '" alt="" />';
		return html;
	}
	function _tmpl(str, data) {
		var fn = new Function("obj",
			"var p=[],print=function(){p.push.apply(p,arguments);};" +
			"with(obj){p.push('" +
			str.replace(/[\r\t\n]/g, " ")
				.split("<%").join("\t")
				.replace(/((^|%>)[^\t]*)'/g, "$1\r")
				.replace(/\t=(.*?)%>/g, "',$1,'")
				.split("\t").join("');")
				.split("%>").join("p.push('")
				.split("\r").join("\\'") + "');}return p.join('');");
		return data ? fn(data) : fn;
	}
	TK.formatUrl = _formatUrl;
	TK.formatHtml = _formatHtml;
	TK.getCssList = _getCssList;
	TK.getAttrList = _getAttrList;
	TK.mediaType = _mediaType;
	TK.mediaAttrs = _mediaAttrs;
	TK.mediaEmbed = _mediaEmbed;
	TK.mediaImg = _mediaImg;
	TK.clearMsWord = _clearMsWord;
	TK.tmpl = _tmpl;
	function _contains(nodeA, nodeB) {
		if (nodeA.nodeType == 9 && nodeB.nodeType != 9) {
			return true;
		}
		while ((nodeB = nodeB.parentNode)) {
			if (nodeB == nodeA) {
				return true;
			}
		}
		return false;
	}
	var _getSetAttrDiv = document.createElement('div');
	_getSetAttrDiv.setAttribute('className', 't');
	var _GET_SET_ATTRIBUTE = _getSetAttrDiv.className !== 't';
	function _getAttr(el, key) {
		key = key.toLowerCase();
		var val = null;
		if (!_GET_SET_ATTRIBUTE && el.nodeName.toLowerCase() != 'script') {
			var div = el.ownerDocument.createElement('div');
			div.appendChild(el.cloneNode(false));
			var list = _getAttrList(_unescape(div.innerHTML));
			if (key in list) {
				val = list[key];
			}
		} else {
			try {
				val = el.getAttribute(key, 2);
			} catch(e) {
				val = el.getAttribute(key, 1);
			}
		}
		if (key === 'style' && val !== null) {
			val = _formatCss(val);
		}
		return val;
	}
	function _queryAll(expr, root) {
		var exprList = expr.split(',');
		if (exprList.length > 1) {
			var mergedResults = [];
			_each(exprList, function() {
				_each(_queryAll(this, root), function() {
					if (_inArray(this, mergedResults) < 0) {
						mergedResults.push(this);
					}
				});
			});
			return mergedResults;
		}
		root = root || document;
		function escape(str) {
			if (typeof str != 'string') {
				return str;
			}
			return str.replace(/([^\w\-])/g, '\\$1');
		}
		function stripslashes(str) {
			return str.replace(/\\/g, '');
		}
		function cmpTag(tagA, tagB) {
			return tagA === '*' || tagA.toLowerCase() === escape(tagB.toLowerCase());
		}
		function byId(id, tag, root) {
			var arr = [],
				doc = root.ownerDocument || root,
				el = doc.getElementById(stripslashes(id));
			if (el) {
				if (cmpTag(tag, el.nodeName) && _contains(root, el)) {
					arr.push(el);
				}
			}
			return arr;
		}
		function byClass(className, tag, root) {
			var doc = root.ownerDocument || root, arr = [], els, i, len, el;
			if (root.getElementsByClassName) {
				els = root.getElementsByClassName(stripslashes(className));
				for (i = 0, len = els.length; i < len; i++) {
					el = els[i];
					if (cmpTag(tag, el.nodeName)) {
						arr.push(el);
					}
				}
			} else if (doc.querySelectorAll) {
				els = doc.querySelectorAll((root.nodeName !== '#document' ? root.nodeName + ' ' : '') + tag + '.' + className);
				for (i = 0, len = els.length; i < len; i++) {
					el = els[i];
					if (_contains(root, el)) {
						arr.push(el);
					}
				}
			} else {
				els = root.getElementsByTagName(tag);
				className = ' ' + className + ' ';
				for (i = 0, len = els.length; i < len; i++) {
					el = els[i];
					if (el.nodeType == 1) {
						var cls = el.className;
						if (cls && (' ' + cls + ' ').indexOf(className) > -1) {
							arr.push(el);
						}
					}
				}
			}
			return arr;
		}
		function byName(name, tag, root) {
			var arr = [], doc = root.ownerDocument || root,
				els = doc.getElementsByName(stripslashes(name)), el;
			for (var i = 0, len = els.length; i < len; i++) {
				el = els[i];
				if (cmpTag(tag, el.nodeName) && _contains(root, el)) {
					if (el.getAttributeNode('name')) {
						arr.push(el);
					}
				}
			}
			return arr;
		}
		function byAttr(key, val, tag, root) {
			var arr = [], els = root.getElementsByTagName(tag), el;
			for (var i = 0, len = els.length; i < len; i++) {
				el = els[i];
				if (el.nodeType == 1) {
					if (val === null) {
						if (_getAttr(el, key) !== null) {
							arr.push(el);
						}
					} else {
						if (val === escape(_getAttr(el, key))) {
							arr.push(el);
						}
					}
				}
			}
			return arr;
		}
		function select(expr, root) {
			var arr = [], matches;
			matches = /^((?:\\.|[^.#\s\[<>])+)/.exec(expr);
			var tag = matches ? matches[1] : '*';
			if ((matches = /#((?:[\w\-]|\\.)+)$/.exec(expr))) {
				arr = byId(matches[1], tag, root);
			} else if ((matches = /\.((?:[\w\-]|\\.)+)$/.exec(expr))) {
				arr = byClass(matches[1], tag, root);
			} else if ((matches = /\[((?:[\w\-]|\\.)+)\]/.exec(expr))) {
				arr = byAttr(matches[1].toLowerCase(), null, tag, root);
			} else if ((matches = /\[((?:[\w\-]|\\.)+)\s*=\s*['"]?((?:\\.|[^'"]+)+)['"]?\]/.exec(expr))) {
				var key = matches[1].toLowerCase(), val = matches[2];
				if (key === 'id') {
					arr = byId(val, tag, root);
				} else if (key === 'class') {
					arr = byClass(val, tag, root);
				} else if (key === 'name') {
					arr = byName(val, tag, root);
				} else {
					arr = byAttr(key, val, tag, root);
				}
			} else {
				var els = root.getElementsByTagName(tag), el;
				for (var i = 0, len = els.length; i < len; i++) {
					el = els[i];
					if (el.nodeType == 1) {
						arr.push(el);
					}
				}
			}
			return arr;
		}
		var parts = [], arr, re = /((?:\\.|[^\s>])+|[\s>])/g;
		while ((arr = re.exec(expr))) {
			if (arr[1] !== ' ') {
				parts.push(arr[1]);
			}
		}
		var results = [];
		if (parts.length == 1) {
			return select(parts[0], root);
		}
		var isChild = false, part, els, subResults, val, v, i, j, k, length, len, l;
		for (i = 0, lenth = parts.length; i < lenth; i++) {
			part = parts[i];
			if (part === '>') {
				isChild = true;
				continue;
			}
			if (i > 0) {
				els = [];
				for (j = 0, len = results.length; j < len; j++) {
					val = results[j];
					subResults = select(part, val);
					for (k = 0, l = subResults.length; k < l; k++) {
						v = subResults[k];
						if (isChild) {
							if (val === v.parentNode) {
								els.push(v);
							}
						} else {
							els.push(v);
						}
					}
				}
				results = els;
			} else {
				results = select(part, root);
			}
			if (results.length === 0) {
				return [];
			}
		}
		return results;
	}
	function _query(expr, root) {
		var arr = _queryAll(expr, root);
		return arr.length > 0 ? arr[0] : null;
	}
	TK.query = _query;
	TK.queryAll = _queryAll;
	function _get(val) {
		return TK(val)[0];
	}
	function _getDoc(node) {
		if (!node) {
			return document;
		}
		return node.ownerDocument || node.document || node;
	}
	function _getWin(node) {
		if (!node) {
			return window;
		}
		var doc = _getDoc(node);
		return doc.parentWindow || doc.defaultView;
	}
	function _setHtml(el, html) {
		if (el.nodeType != 1) {
			return;
		}
		var doc = _getDoc(el);
		try {
			el.innerHTML = '<img id="__tkeditor_temp_tag__" width="0" height="0" style="display:none;" />' + html;
			var temp = doc.getElementById('__tkeditor_temp_tag__');
			temp.parentNode.removeChild(temp);
		} catch(e) {
			TK(el).empty();
			TK('@' + html, doc).each(function() {
				el.appendChild(this);
			});
		}
	}
	function _hasClass(el, cls) {
		return _inString(cls, el.className, ' ');
	}
	function _setAttr(el, key, val) {
		if (_IE && _V < 8 && key.toLowerCase() == 'class') {
			key = 'className';
		}
		el.setAttribute(key, '' + val);
	}
	function _removeAttr(el, key) {
		if (_IE && _V < 8 && key.toLowerCase() == 'class') {
			key = 'className';
		}
		_setAttr(el, key, '');
		el.removeAttribute(key);
	}
	function _getNodeName(node) {
		if (!node || !node.nodeName) {
			return '';
		}
		return node.nodeName.toLowerCase();
	}
	function _computedCss(el, key) {
		var self = this, win = _getWin(el), camelKey = _toCamel(key), val = '';
		if (win.getComputedStyle) {
			var style = win.getComputedStyle(el, null);
			val = style[camelKey] || style.getPropertyValue(key) || el.style[camelKey];
		} else if (el.currentStyle) {
			val = el.currentStyle[camelKey] || el.style[camelKey];
		}
		return val;
	}
	function _hasVal(node) {
		return !!_VALUE_TAG_MAP[_getNodeName(node)];
	}
	function _docElement(doc) {
		doc = doc || document;
		return _QUIRKS ? doc.body : doc.documentElement;
	}
	function _docHeight(doc) {
		var el = _docElement(doc);
		return Math.max(el.scrollHeight, el.clientHeight);
	}
	function _docWidth(doc) {
		var el = _docElement(doc);
		return Math.max(el.scrollWidth, el.clientWidth);
	}
	function _getScrollPos(doc) {
		doc = doc || document;
		var x, y;
		if (_IE || _OPERA) {
			x = _docElement(doc).scrollLeft;
			y = _docElement(doc).scrollTop;
		} else {
			x = _getWin(doc).scrollX;
			y = _getWin(doc).scrollY;
		}
		return {x : x, y : y};
	}
	function TKNode(node) {
		this.init(node);
	}
	
	
	
});
