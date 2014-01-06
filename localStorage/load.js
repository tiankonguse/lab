var TK = TK || {};

TK.loader = {};

(function(loader, basepath) {
    var version = "1.01";
    loader.files = [];
    loader.filemeta = [];
    TK.basepath = basepath;
    basepath = basepath || "http://tiankonguse.com";

    var load;
    var hasjQuery = false;

    // 判断是否支持本地存储
    loader.localstorage = function() {
	return !!window.localStorage;
    };

    // 获取本地缓存文件元信息
    loader.getLocalStorageFileMeta = function() {
	var fileMeta = localStorage.getItem('fileMeta');
	if (typeof fileMeta == 'undefined' || fileMeta == null) {
	    fileMeta = null;
	}
	return fileMeta;
    };

    loader.getLocalStorageFileMetaObj = function() {
	var fileMeta = loader.getLocalStorageFileMeta();
	if (typeof fileMeta != 'undefined' && fileMeta != null) {
	    var fileMetaList = fileMeta.split(';');
	    for ( var i = 0; i < fileMetaList.length; i++) {
		loader.filemeta.push(eval('(' + fileMetaList[i] + ')'));
	    }
	}
    };

    // 获取最新文件元信息
    loader.getLoaderFileMetaInfo = function(key) {
	if (loader.filemeta && loader.filemeta.length > 0) {
	    for ( var i = 0; i < loader.filemeta.length; i++) {
		if (loader.filemeta[i].name == key) {
		    return loader.filemeta[i];
		}
	    }
	}
	return null;
    };

    // 获取缓存数据元信息
    loader.getFileMetaInfo = function(key) {
	var fileMeta = loader.getLocalStorageFileMeta();
	if (typeof fileMeta != 'undefined' && fileMeta != null) {
	    var fileMetaList = fileMeta.split(';');
	    for ( var i = 0; i < fileMetaList.length; i++) {
		var info = eval('(' + fileMetaList[i] + ')');
		if (info.name == key) {
		    return info;
		}
	    }
	}
	return null;
    };

    // 保存或更新数据文件元信息
    loader.saveOrUpdateFileMeta = function(key) {
	var metaInfo = loader.getLoaderFileMetaInfo(key);
	var fileMeta = loader.getLocalStorageFileMeta();
	if (fileMeta == null) {
	    loader.setItem('fileMeta', '{name:"' + metaInfo.name + '",v:"'
		    + metaInfo.v + '"}');
	} else {
	    localStorage.removeItem('fileMeta');
	    var fileMetaList = fileMeta.split(';');
	    for ( var i = 0; i < fileMetaList.length; i++) {
		var info = eval('(' + fileMetaList[i] + ')');
		if (info.name == key) {
		    fileMetaList[i] = '{name:"' + metaInfo.name + '",v:"'
			    + metaInfo.v + '"}';
		    loader.setItem('fileMeta', fileMetaList.join(';'));
		    return;
		}
	    }
	    fileMeta += ';{name:"' + metaInfo.name + '",v:"' + metaInfo.v
		    + '"}';
	    loader.setItem('fileMeta', fileMeta);
	}
    };

    // 比较缓存数据是否为最新版本
    loader.compareFileMetaInfo = function(key) {
	// if(load){
	// return false;
	// }
	if (loader.filemeta && loader.filemeta.length > 0) {
	    for ( var i = 0; i < loader.filemeta.length; i++) {
		if (loader.filemeta[i].name == key) {
		    var localMetaInfo = loader.getFileMetaInfo(key);
		    if (localMetaInfo != null
			    && localMetaInfo.v == loader.filemeta[i].v) {
			return true;
		    } else {
			return false;
		    }
		}
	    }
	}
	return false;
    };

    // 保存本地缓存
    loader.setItem = function(key, value) {
	if (key != 'fileMeta') {
	    loader.saveOrUpdateFileMeta(key);
	}
	localStorage.setItem(key, value);
    };

    // 获取本地缓存
    loader.getItem = function(key) {
	var fileMeta = loader.getLocalStorageFileMeta();
	if (fileMeta != null && loader.compareFileMetaInfo(key)) {
	    return localStorage.getItem(key);
	} else {
	    localStorage.removeItem(key);
	    return null;
	}
    };

    // 根据地址加载文件
    loader.fileLoader = function(file, callBack) {
//	console.log(file[0]);
	var ret = null;
	if (!hasjQuery && (typeof jQuery != "undefined")) {
	    hasjQuery = true;
	}

	if (file && file.length > 0) {
	    file.push(callBack);
	    loader.files.push(file);

	    var name = file[0].name;
	    var url = file[0].url;
	    var v = file[0].v;
	    var type = file[0].type;
	    var load = file[0].load;
	    var onerror = file[0].onerror;
	    var unStore = file[0].unStore;

	    var metaInfo = loader.getLoaderFileMetaInfo(name);
	    if (metaInfo == null) {
		loader.filemeta.push({
		    name : name,
		    v : v
		});
	    } else {
		metaInfo.v = v;
	    }

	    // 判断是否支持本地存储
	    if (!unStore && loader.localstorage()) {

		var content = loader.getItem(name);

		if (load || typeof content == 'undefined' || content == null) {
		    loader.getFile(basepath + url, false);

		    if (typeof loader.getFileResponse != 'undefined'
			    && loader.getFileResponse != null
			    && loader.getFileResponse != '') {
			loader.setItem(name, loader.getFileResponse);
			content = loader.getItem(name);
		    }
		}

		if (typeof content != 'undefined' && content != null) {
		    if (type == 'js') {
			// js 放到 body 的最后
			if (false && hasjQuery) {
			    jQuery('head:last')
				    .append(
					    ret = jQuery(('<script type="text/javascript">'
						    + content + '</script>')));
			    ret = ret[0];
			} else {
			    var script = document.createElement('script');
			    script.type = 'text/javascript';
			    if (onerror) {
				script.onerror = onerror;
			    }
			    script.innerHTML = content;
			    document.getElementsByTagName('head')[0]
				    .appendChild(script);
			    ret = script;
			}

		    } else if (type == 'css') {
			// css 放在 head 的最后
			if (hasjQuery) {
			    jQuery('head:first').append(
				    ret = jQuery(('<style type="text/css">'
					    + content + '</style>')));
			    ret = ret[0];
			} else {
			    var style = document.createElement('style');
			    style.type = 'type="text/css"';
			    style.innerHTML = content;
			    document.getElementsByTagName('head')[0]
				    .appendChild(style);
			    ret = style;
			}

		    }
		}
	    } else {
		if (type == 'js') {
		    // js 放到 body 的最后
		    var script = document.createElement('script');
		    script.type = 'text/javascript';
		    script.src = basepath + url;
		    document.getElementsByTagName('head')[0]
			    .appendChild(script);
		    ret = script;
		} else if (type == 'css') {
		    // css 放在 head 的最后
		    var style = document.createElement('link');
		    style.rel = 'stylesheet';
		    style.type = 'type="text/css"';
		    style.href = basepath + url + '?t=' + new Date().getTime();
		    document.getElementsByTagName('head')[0].appendChild(style);
		    ret = style;
		}
	    }

	}

	if (callBack) {
	    callBack();
	}
	return ret;
    };

    // 获取文件
    loader.getFile = function(url, async, callback) {
	if (typeof callback == 'undefined') {
	    callback = loader.getFileCallBack;
	}
	if (window.XMLHttpRequest) {
	    loader.xmlhttp = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
	    loader.xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (loader.xmlhttp != null) {
	    loader.xmlhttp.onreadystatechange = callback;
	    loader.xmlhttp.open("GET", url, async);
	    loader.xmlhttp.send(null);
	}
    }

    // 获取文件回调函数
    loader.getFileCallBack = function(data) {
	if (loader.xmlhttp.readyState == 4 && loader.xmlhttp.status == 200) {
	    loader.getFileResponse = loader.xmlhttp.responseText;
	}
    }
    loader.goBackTo = function() {
	try {
	    window.history.go(-1);
	    return false;
	} catch (e) {
	    window.location.href = document.referrer;
	}
    }

    loader.xssFilter = function(val) {
	val = val.toString();
	val = val.replace(/[<%3C]/g, "&lt;");
	val = val.replace(/[>%3E]/g, "&gt;");
	val = val.replace(/"/g, "&quot;");
	val = val.replace(/'/g, "&apos;");
	return val;
    };

    loader.loadJS = function(obj) {
	obj.name  = obj.url;
	obj.type  ="js";
	obj.load  = !!obj.load;
	obj.unStore  =!!obj.unStore;
	obj.v = obj.v || version;
	return TK.loader.fileLoader([ obj ]);
    };
    loader.loadCSS = function(obj) {
	obj.name  = obj.url;
	obj.type  ="css";
	obj.load  = !!obj.load;
	obj.unStore  =!!obj.unStore;
	obj.v = obj.v || version;
	return TK.loader.fileLoader([ obj ]);
    };

})(TK.loader, basepath);
