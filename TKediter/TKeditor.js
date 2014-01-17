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
	var _VERSION = '0.0.1 (2013-06-14)',
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
    var _INLINE_TAG_MAP = _toMap('a,abbr,acronym,b,basefont,bdo,big,br,button,cite,code,del,dfn,em,font,i,img,input,ins,kbd,label,map,q,s,samp,select,small,span,strike,strong,sub,sup,textarea,tt,u,var'),
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
			if (/TKeditor[\w\-\.]*\.js/.test(src)) {
				return src.substring(0, src.lastIndexOf('/') + 1);
			}
		}
		return '';
	}
	TK.basePath = _getBasePath();
	TK.options = {
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
	
	function _lang(mixed, langType) {
		langType = langType === undefined ? TK.options.langType : langType;
		if (typeof mixed === 'string') {
			if (!_language[langType]) {
				return 'no language';
			}
			var pos = mixed.length - 1;
			if (mixed.substr(pos) === '.') {
				return _language[langType][mixed.substr(0, pos)];
			}
			var obj = _parseLangKey(mixed);
			return _language[langType][obj.ns][obj.key];
		}
		_each(mixed, function(key, val) {
			var obj = _parseLangKey(key);
			if (!_language[langType]) {
				_language[langType] = {};
			}
			if (!_language[langType][obj.ns]) {
				_language[langType][obj.ns] = {};
			}
			_language[langType][obj.ns][obj.key] = val;
		});
	}
	
	
	function TKEditor(options) {
		var self = this;
		self.options = {};
		function setOption(key, val) {
			if (TKEditor.prototype[key] === undefined) {
				self[key] = val;
			}
			self.options[key] = val;
		}
		_each(options, function(key, val) {
			setOption(key, options[key]);
		});
		_each(TK.options, function(key, val) {
			if (self[key] === undefined) {
				setOption(key, val);
			}
		});
		var se = TK(self.srcElement || '<textarea/>');
		if (!self.width) {
			self.width = se[0].style.width || se.width();
		}
		if (!self.height) {
			self.height = se[0].style.height || se.height();
		}
		setOption('width', _undef(self.width, self.minWidth));
		setOption('height', _undef(self.height, self.minHeight));
		setOption('width', _addUnit(self.width));
		setOption('height', _addUnit(self.height));
		if (_MOBILE && (!_IOS || _V < 534)) {
			self.designMode = false;
		}
		self.srcElement = se;
		self.initContent = '';
		self.plugin = {};
		self.isCreated = false;
		self.isLoading = false;
		self._handlers = {};
		self._contextmenus = [];
		self._undoStack = [];
		self._redoStack = [];
		self._calledPlugins = {};
		self._firstAddBookmark = true;
		self.menu = self.contextmenu = null;
		self.dialogs = [];
	}
	TKEditor.prototype = {
			lang : function(mixed) {
				return _lang(mixed, this.langType);
			},
			loadPlugin : function(name, fn) {
				var self = this;
				if (_plugins[name]) {
					if (self._calledPlugins[name]) {
						if (fn) {
							fn.call(self);
						}
						return self;
					}
					_plugins[name].call(self, TKindEditor);
					if (fn) {
						fn.call(self);
					}
					self._calledPlugins[name] = true;
					return self;
				}
				if (self.isLoading) {
					return self;
				}
				self.isLoading = true;
				_loadScript(self.pluginsPath + name + '/' + name + '.js?ver=' + encodeURIComponent(TK.DEBUG ? _TIME : _VERSION), function() {
					self.isLoading = false;
					if (_plugins[name]) {
						self.loadPlugin(name, fn);
					}
				});
				return self;
			},
			handler : function(key, fn) {
				var self = this;
				if (!self._handlers[key]) {
					self._handlers[key] = [];
				}
				if (_isFunction(fn)) {
					self._handlers[key].push(fn);
					return self;
				}
				_each(self._handlers[key], function() {
					fn = this.call(self, fn);
				});
				return fn;
			},
			clickToolbar : function(name, fn) {
				var self = this, key = 'clickToolbar' + name;
				if (fn === undefined) {
					if (self._handlers[key]) {
						return self.handler(key);
					}
					self.loadPlugin(name, function() {
						self.handler(key);
					});
					return self;
				}
				return self.handler(key, fn);
			},
			updateState : function() {
				var self = this;
				_each(('justifyleft,justifycenter,justifyright,justifyfull,insertorderedlist,insertunorderedlist,' +
					'subscript,superscript,bold,italic,underline,strikethrough').split(','), function(i, name) {
					self.cmd.state(name) ? self.toolbar.select(name) : self.toolbar.unselect(name);
				});
				return self;
			},
			addContextmenu : function(item) {
				this._contextmenus.push(item);
				return this;
			},
			afterCreate : function(fn) {
				return this.handler('afterCreate', fn);
			},
			beforeRemove : function(fn) {
				return this.handler('beforeRemove', fn);
			},
			beforeGetHtml : function(fn) {
				return this.handler('beforeGetHtml', fn);
			},
			beforeSetHtml : function(fn) {
				return this.handler('beforeSetHtml', fn);
			},
			afterSetHtml : function(fn) {
				return this.handler('afterSetHtml', fn);
			},
			create : function() {
				var self = this, fullscreenMode = self.fullscreenMode;
				if (self.isCreated) {
					return self;
				}
				if (self.srcElement.data('tkeditor')) {
					return self;
				}
				self.srcElement.data('tkeditor', 'true');
				if (fullscreenMode) {
					_docElement().style.overflow = 'hidden';
				} else {
					_docElement().style.overflow = '';
				}
				var width = fullscreenMode ? _docElement().clientWidth + 'px' : self.width,
					height = fullscreenMode ? _docElement().clientHeight + 'px' : self.height;
				if ((_IE && _V < 8) || _QUIRKS) {
					height = _addUnit(_removeUnit(height) + 2);
				}
				var container = self.container = TK(self.layout);
				if (fullscreenMode) {
					K(document.body).append(container);
				} else {
					self.srcElement.before(container);
				}
				var toolbarDiv = TK('.toolbar', container),
					editDiv = TK('.edit', container),
					statusbar = self.statusbar = TK('.statusbar', container);
				container.removeClass('container')
					.addClass('ke-container ke-container-' + self.themeType).css('width', width);
				if (fullscreenMode) {
					container.css({
						position : 'absolute',
						left : 0,
						top : 0,
						'z-index' : 811211
					});
					if (!_GECKO) {
						self._scrollPos = _getScrollPos();
					}
					window.scrollTo(0, 0);
					TK(document.body).css({
						'height' : '1px',
						'overflow' : 'hidden'
					});
					TK(document.body.parentNode).css('overflow', 'hidden');
					self._fullscreenExecuted = true;
				} else {
					if (self._fullscreenExecuted) {
						TK(document.body).css({
							'height' : '',
							'overflow' : ''
						});
						TK(document.body.parentNode).css('overflow', '');
					}
					if (self._scrollPos) {
						window.scrollTo(self._scrollPos.x, self._scrollPos.y);
					}
				}
				var htmlList = [];
				TK.each(self.items, function(i, name) {
					if (name == '|') {
						htmlList.push('<span class="tke-inline-block tke-separator"></span>');
					} else if (name == '/') {
						htmlList.push('<div class="tke-hr"></div>');
					} else {
						htmlList.push('<span class="tke-outline" data-name="' + name + '" title="' + self.lang(name) + '" unselectable="on">');
						htmlList.push('<span class="tke-toolbar-icon tke-toolbar-icon-url tke-icon-' + name + '" unselectable="on"></span></span>');
					}
				});
				var toolbar = self.toolbar = _toolbar({
					src : toolbarDiv,
					html : htmlList.join(''),
					noDisableItems : self.noDisableItems,
					click : function(e, name) {
						e.stop();
						if (self.menu) {
							var menuName = self.menu.name;
							self.hideMenu();
							if (menuName === name) {
								return;
							}
						}
						self.clickToolbar(name);
					}
				});
				var editHeight = _removeUnit(height) - toolbar.div.height();
				var edit = self.edit = _edit({
					height : editHeight > 0 && _removeUnit(height) > self.minHeight ? editHeight : self.minHeight,
					src : editDiv,
					srcElement : self.srcElement,
					designMode : self.designMode,
					themesPath : self.themesPath,
					bodyClass : self.bodyClass,
					cssPath : self.cssPath,
					cssData : self.cssData,
					beforeGetHtml : function(html) {
						html = self.beforeGetHtml(html);
						return _formatHtml(html, self.filterMode ? self.htmlTags : null, self.urlType, self.wellFormatMode, self.indentChar);
					},
					beforeSetHtml : function(html) {
						html = _formatHtml(html, self.filterMode ? self.htmlTags : null, '', false);
						return self.beforeSetHtml(html);
					},
					afterSetHtml : function() {
						self.edit = edit = this;
						self.afterSetHtml();
					},
					afterCreate : function() {
						self.edit = edit = this;
						self.cmd = edit.cmd;
						self._docMousedownFn = function(e) {
							if (self.menu) {
								self.hideMenu();
							}
						};
						TK(edit.doc, document).mousedown(self._docMousedownFn);
						_bindContextmenuEvent.call(self);
						_bindNewlineEvent.call(self);
						_bindTabEvent.call(self);
						_bindFocusEvent.call(self);
						edit.afterChange(function(e) {
							if (!edit.designMode) {
								return;
							}
							self.updateState();
							self.addBookmark();
							if (self.options.afterChange) {
								self.options.afterChange.call(self);
							}
						});
						edit.textarea.keyup(function(e) {
							if (!e.ctrlKey && !e.altKey && _INPUT_KEY_MAP[e.which]) {
								if (self.options.afterChange) {
									self.options.afterChange.call(self);
								}
							}
						});
						if (self.readonlyMode) {
							self.readonly();
						}
						self.isCreated = true;
						if (self.initContent === '') {
							self.initContent = self.html();
						}
						self.afterCreate();
						if (self.options.afterCreate) {
							self.options.afterCreate.call(self);
						}
					}
				});
				statusbar.removeClass('statusbar').addClass('tke-statusbar')
					.append('<span class="tke-inline-block tke-statusbar-center-icon"></span>')
					.append('<span class="tke-inline-block tke-statusbar-right-icon"></span>');
				function fullscreenResizeHandler(e) {
					if (self.isCreated) {
						self.resize(_docElement().clientWidth, _docElement().clientHeight, false);
					}
				}
				K(window).unbind('resize', fullscreenResizeHandler);
				function initResize() {
					if (statusbar.height() === 0) {
						setTimeout(initResize, 100);
						return;
					}
					self.resize(width, height, false);
				}
				initResize();
				if (fullscreenMode) {
					K(window).bind('resize', fullscreenResizeHandler);
					toolbar.select('fullscreen');
					statusbar.first().css('visibility', 'hidden');
					statusbar.last().css('visibility', 'hidden');
				} else {
					if (_GECKO) {
						K(window).bind('scroll', function(e) {
							self._scrollPos = _getScrollPos();
						});
					}
					if (self.resizeType > 0) {
						_drag({
							moveEl : container,
							clickEl : statusbar,
							moveFn : function(x, y, width, height, diffX, diffY) {
								height += diffY;
								self.resize(null, height);
							}
						});
					} else {
						statusbar.first().css('visibility', 'hidden');
					}
					if (self.resizeType === 2) {
						_drag({
							moveEl : container,
							clickEl : statusbar.last(),
							moveFn : function(x, y, width, height, diffX, diffY) {
								width += diffX;
								height += diffY;
								self.resize(width, height);
							}
						});
					} else {
						statusbar.last().css('visibility', 'hidden');
					}
				}
				return self;
			},
			remove : function() {
				var self = this;
				if (!self.isCreated) {
					return self;
				}
				self.beforeRemove();
				self.srcElement.data('tkeditor', '');
				if (self.menu) {
					self.hideMenu();
				}
				_each(self.dialogs, function() {
					self.hideDialog();
				});
				K(document).unbind('mousedown', self._docMousedownFn);
				self.toolbar.remove();
				self.edit.remove();
				self.statusbar.last().unbind();
				self.statusbar.unbind();
				self.container.remove();
				self.container = self.toolbar = self.edit = self.menu = null;
				self.dialogs = [];
				self.isCreated = false;
				return self;
			},
			resize : function(width, height, updateProp) {
				var self = this;
				updateProp = _undef(updateProp, true);
				if (width) {
					if (!/%/.test(width)) {
						width = _removeUnit(width);
						width = width < self.minWidth ? self.minWidth : width;
					}
					self.container.css('width', _addUnit(width));
					if (updateProp) {
						self.width = _addUnit(width);
					}
				}
				if (height) {
					height = _removeUnit(height);
					editHeight = _removeUnit(height) - self.toolbar.div.height() - self.statusbar.height();
					editHeight = editHeight < self.minHeight ? self.minHeight : editHeight;
					self.edit.setHeight(editHeight);
					if (updateProp) {
						self.height = _addUnit(height);
					}
				}
				return self;
			},
			select : function() {
				this.isCreated && this.cmd.select();
				return this;
			},
			html : function(val) {
				var self = this;
				if (val === undefined) {
					return self.isCreated ? self.edit.html() : _elementVal(self.srcElement);
				}
				self.isCreated ? self.edit.html(val) : _elementVal(self.srcElement, val);
				if (self.isCreated) {
					self.cmd.selection();
				}
				return self;
			},
			fullHtml : function() {
				return this.isCreated ? this.edit.html(undefined, true) : '';
			},
			text : function(val) {
				var self = this;
				if (val === undefined) {
					return _trim(self.html().replace(/<(?!img|embed).*?>/ig, '').replace(/&nbsp;/ig, ' '));
				} else {
					return self.html(_escape(val));
				}
			},
			isEmpty : function() {
				return _trim(this.text().replace(/\r\n|\n|\r/, '')) === '';
			},
			isDirty : function() {
				return _trim(this.initContent.replace(/\r\n|\n|\r|t/g, '')) !== _trim(this.html().replace(/\r\n|\n|\r|t/g, ''));
			},
			selectedHtml : function() {
				return this.isCreated ? this.cmd.range.html() : '';
			},
			count : function(mode) {
				var self = this;
				mode = (mode || 'html').toLowerCase();
				if (mode === 'html') {
					return _removeBookmarkTag(_removeTempTag(self.html())).length;
				}
				if (mode === 'text') {
					return self.text().replace(/<(?:img|embed).*?>/ig, 'K').replace(/\r\n|\n|\r/g, '').length;
				}
				return 0;
			},
			exec : function(key) {
				key = key.toLowerCase();
				var self = this, cmd = self.cmd,
					changeFlag = _inArray(key, 'selectall,copy,paste,print'.split(',')) < 0;
				if (changeFlag) {
					self.addBookmark(false);
				}
				cmd[key].apply(cmd, _toArray(arguments, 1));
				if (changeFlag) {
					self.updateState();
					self.addBookmark(false);
					if (self.options.afterChange) {
						self.options.afterChange.call(self);
					}
				}
				return self;
			},
			insertHtml : function(val, quickMode) {
				if (!this.isCreated) {
					return this;
				}
				val = this.beforeSetHtml(val);
				this.exec('inserthtml', val, quickMode);
				return this;
			},
			appendHtml : function(val) {
				this.html(this.html() + val);
				if (this.isCreated) {
					var cmd = this.cmd;
					cmd.range.selectNodeContents(cmd.doc.body).collapse(false);
					cmd.select();
				}
				return this;
			},
			sync : function() {
				_elementVal(this.srcElement, this.html());
				return this;
			},
			focus : function() {
				this.isCreated ? this.edit.focus() : this.srcElement[0].focus();
				return this;
			},
			blur : function() {
				this.isCreated ? this.edit.blur() : this.srcElement[0].blur();
				return this;
			},
			addBookmark : function(checkSize) {
				checkSize = _undef(checkSize, true);
				var self = this, edit = self.edit,
					body = edit.doc.body,
					html = _removeTempTag(body.innerHTML), bookmark;
				if (checkSize && self._undoStack.length > 0) {
					var prev = self._undoStack[self._undoStack.length - 1];
					if (Math.abs(html.length - _removeBookmarkTag(prev.html).length) < self.minChangeSize) {
						return self;
					}
				}
				if (edit.designMode && !self._firstAddBookmark) {
					var range = self.cmd.range;
					bookmark = range.createBookmark(true);
					bookmark.html = _removeTempTag(body.innerHTML);
					range.moveToBookmark(bookmark);
				} else {
					bookmark = {
						html : html
					};
				}
				self._firstAddBookmark = false;
				_addBookmarkToStack(self._undoStack, bookmark);
				return self;
			},
			undo : function() {
				return _undoToRedo.call(this, this._undoStack, this._redoStack);
			},
			redo : function() {
				return _undoToRedo.call(this, this._redoStack, this._undoStack);
			},
			fullscreen : function(bool) {
				this.fullscreenMode = (bool === undefined ? !this.fullscreenMode : bool);
				return this.remove().create();
			},
			readonly : function(isReadonly) {
				isReadonly = _undef(isReadonly, true);
				var self = this, edit = self.edit, doc = edit.doc;
				if (self.designMode) {
					self.toolbar.disableAll(isReadonly, []);
				} else {
					_each(self.noDisableItems, function() {
						self.toolbar[isReadonly ? 'disable' : 'enable'](this);
					});
				}
				if (_IE) {
					doc.body.contentEditable = !isReadonly;
				} else {
					doc.designMode = isReadonly ? 'off' : 'on';
				}
				edit.textarea[0].disabled = isReadonly;
			},
			createMenu : function(options) {
				var self = this,
					name = options.name,
					knode = self.toolbar.get(name),
					pos = knode.pos();
				options.x = pos.x;
				options.y = pos.y + knode.height();
				options.z = self.options.zIndex;
				options.shadowMode = _undef(options.shadowMode, self.shadowMode);
				if (options.selectedColor !== undefined) {
					options.cls = 'tke-colorpicker-' + self.themeType;
					options.noColor = self.lang('noColor');
					self.menu = _colorpicker(options);
				} else {
					options.cls = 'tke-menu-' + self.themeType;
					options.centerLineMode = false;
					self.menu = _menu(options);
				}
				return self.menu;
			},
			hideMenu : function() {
				this.menu.remove();
				this.menu = null;
				return this;
			},
			hideContextmenu : function() {
				this.contextmenu.remove();
				this.contextmenu = null;
				return this;
			},
			createDialog : function(options) {
				var self = this, name = options.name;
				options.z = self.options.zIndex;
				options.shadowMode = _undef(options.shadowMode, self.shadowMode);
				options.closeBtn = _undef(options.closeBtn, {
					name : self.lang('close'),
					click : function(e) {
						self.hideDialog();
						if (_IE && self.cmd) {
							self.cmd.select();
						}
					}
				});
				options.noBtn = _undef(options.noBtn, {
					name : self.lang(options.yesBtn ? 'no' : 'close'),
					click : function(e) {
						self.hideDialog();
						if (_IE && self.cmd) {
							self.cmd.select();
						}
					}
				});
				if (self.dialogAlignType != 'page') {
					options.alignEl = self.container;
				}
				options.cls = 'tke-dialog-' + self.themeType;
				if (self.dialogs.length > 0) {
					var firstDialog = self.dialogs[0],
						parentDialog = self.dialogs[self.dialogs.length - 1];
					firstDialog.setMaskIndex(parentDialog.z + 2);
					options.z = parentDialog.z + 3;
					options.showMask = false;
				}
				var dialog = _dialog(options);
				self.dialogs.push(dialog);
				return dialog;
			},
			hideDialog : function() {
				var self = this;
				if (self.dialogs.length > 0) {
					self.dialogs.pop().remove();
				}
				if (self.dialogs.length > 0) {
					var firstDialog = self.dialogs[0],
						parentDialog = self.dialogs[self.dialogs.length - 1];
					firstDialog.setMaskIndex(parentDialog.z - 1);
				}
				return self;
			},
			errorDialog : function(html) {
				var self = this;
				var dialog = self.createDialog({
					width : 750,
					title : self.lang('uploadError'),
					body : '<div style="padding:10px 20px;"><iframe frameborder="0" style="width:708px;height:400px;"></iframe></div>'
				});
				var iframe = TK('iframe', dialog.div), doc = K.iframeDoc(iframe);
				doc.open();
				doc.write(html);
				doc.close();
				TK(doc.body).css('background-color', '#FFF');
				iframe[0].contentWindow.focus();
				return self;
			}
		};
	_instances = [];
	function _create(expr, options) {
		options = options || {};
		options.basePath = _undef(options.basePath, TK.basePath);
		options.themesPath = _undef(options.themesPath, options.basePath + 'themes/');
		options.langPath = _undef(options.langPath, options.basePath + 'lang/');
		options.pluginsPath = _undef(options.pluginsPath, options.basePath + 'plugins/');
		if (_undef(options.loadStyleMode, K.options.loadStyleMode)) {
			var themeType = _undef(options.themeType, K.options.themeType);
			_loadStyle(options.themesPath + 'default/default.css');
			_loadStyle(options.themesPath + themeType + '/' + themeType + '.css');
		}
		
		function create(editor) {
			_each(_plugins, function(name, fn) {
				fn.call(editor, KindEditor);
			});
			return editor.create();
		}
		var tknode = TK(expr);
		if (!tknode || tknode.length === 0) {
			return;
		}
		if (tknode.length > 1) {
			tknode.each(function() {
				_create(this, options);
			});
			return _instances[0];
		}
		options.srcElement = tknode[0];
		var editor = new TKEditor(options);
		
	}
	
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
	
	var _eventExpendo = 'tkeditor_' + _TIME, _eventId = 0, _eventData = {};
	function _getId(el) {
		return el[_eventExpendo] || null;
	}
	function _setId(el) {
		el[_eventExpendo] = ++_eventId;
		return _eventId;
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
	function _ready(fn) {
		var loaded = false;
		function readyFunc() {
			if (!loaded) {
				loaded = true;
				fn(TKEditor);
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
	
	
})(window);