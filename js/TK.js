var TK = TK || {};

(function(TK) {

    TK = TK || {};

    TK.prototype.trim = function(str) {
        return str.replace(/^\s+|\s+$/g, "");
    };

    TK.prototype.xmlHttp = function() {
        return new XMLHttpRequest();
    };

    TK.prototype.windowWidth = function() {
        var a = document.documentElement;
        return self.innerWidth || (a && a.clientWidth) || document.body.clientWidth;
    };

    /*
    * innerHeight Height (in pixels) of the browser window viewport including,
    * if rendered, the horizontal scrollbar. The innerHeight property sets or
    * returns the inner height of a window's content area.
    * 
    * clientHeight Returns the inner height of an element in pixels, including
    * padding but not the horizontal scrollbar height, border, or margin.
    * 
    */
    TK.prototype.windowHeight = function() {
        var a = document.documentElement;
        return self.innerHeight || (a && a.clientHeight) || document.body.clientHeight;
    };

    /*
    * Returns the layout width of an element. offsetWidth is a read-only
    * property.
    */
    TK.prototype.width = function(obj) {
        return obj ? parseInt(obj.offsetWidth) : 0;
    };

    TK.prototype.utfDecode = function(a) {
        var b = "";
        for ( var c = 0, g = 0, l = a.length; c < l;) {
            g = a.charCodeAt(c);
            if (128 > g) {
                b += String.fromCharCode(g);
                c++;
            } else if (191 < g && 224 > g) {
                b += String.fromCharCode((g & 31) << 6 | a.charCodeAt(c + 1) & 63);
                c += 2;
            } else {
                b += String.fromCharCode((g & 15) << 12 | (a.charCodeAt(c + 1) & 63) << 6 | a.charCodeAt(c + 2) & 63);
                c += 3;
            }
        }
        return b;
    };

    TK.prototype.utfEncode = function(a) {
        var b = "";
        a = a.replace(/\r\n/g, "\n");
        for ( var c = 0, g = 0, l = a.length; c < l; c++) {
            g = a.charCodeAt(c);
            if (128 > g) {
                b += String.fromCharCode(g);
            } else if (127 < g && 2048 > g) {
                b += String.fromCharCode(g >> 6 | 192);
                b += String.fromCharCode(g & 63 | 128);
            } else {
                b += String.fromCharCode(g >> 12 | 224);
                b += String.fromCharCode(g >> 6 & 63 | 128);
                b += String.fromCharCode(g & 63 | 128);
            }
        }
        return b;
    };

    TK.prototype.append = function(child, parent) {
        parent.appendChild(child);
    };

    /*
    * 
    * void is a prefix keyword that takes one argument and always returns
    * undefined.
    * 
    */

    TK.prototype.random = function(a, b) {
        var u = void 0;
        u == a && (a = 0);
        u == b && (b = 9);
        return Math.floor(Math.random() * (b - a + 1) + a);
    };

    TK.prototype.hasClass = function(a, b) {
        return !a || !a.className ? !1 : a.className != a.className.replace(RegExp("\\b" + b + "\\b"), "");
    };

    TK.prototype.isUndefined = function(a) {
        return "undefined" == typeof a;
    };

    TK.prototype.getType = function(a) {
        return Object.prototype.toString.call(a).slice(8, -1);
    };

    TK.prototype.isArray = function(a) {
        return "Array" == this.getType(a);
    };

    TK.prototype.each = function(a, b) {
        if (a) {
            if (!this.isArray(a) && this.isUndefined(a[0])) {
                for ( var c in a) {
                    if (b(a[c], c))
                    break;
                }
            } else {
                for ( var l = a.length, c = 0; c < l && !b(a[c], c); c++);
            }
        }
    };

    TK.prototype.removeClass = function(a, b) {
        if (a) {
            var c = b.split(" ");
            if (0 < c.length) {
                this.each(c, function(b) {
                    this.removeClass(a, b);
                });
            } else if (this.hasClass(a, b)) {
                a.className = a.className.replace(RegExp("\\b" + b + "\\b"), "").replace(/\s$/, "");
            }
        }
    };

    TK.prototype.isElement = function(a) {
        return a && 1 == a.nodeType;
    };

    TK.prototype.isDate = function(a) {
        return "Date" == this.getType(a);
    };

    TK.prototype.isFunction = function(a) {
        return "Function" == this.getType(a);
    };

    TK.prototype.isNumber = function(a) {
        return "Number" == this.getType(a);
    };

    TK.prototype.isObject = function(a) {
        return "object" == typeof a;
    };

    TK.prototype.isString = function(a) {
        return "String" == this.getType(a);
    };

    TK.prototype.readyDo = [];

    TK.prototype.ready.done = false;

    TK.prototype.ready = function (a){
        if(this.ready.done){
            return a();
        }

        if(this.isReady.done){
            this.readyDo.push(a);
        }else{
            this.readyDo=[a];
            this.isReady();
        }
    };

    TK.prototype.onReady = function() {
        if (!this.ready.done) {
            this.ready.done = !0;
            for ( var a = 0, b = this.readyDo.length; a < b; a++){
                this.readyDo[a]();
            }
            this.readyDo = null;
        }
    };

    TK.prototype.isReady.done = false;

    TK.prototype.isReady = function (){
         if(!this.isReady.done){
             this.isReady.done = !0;
             if("complete" == document.readyState){
                 this.onReady();
             } else{
                 if(document.addEventListener){
                     if("interactive" == document.readyState && !this.B.ie9){
                         this.onReady();
                     }else{
                         document.addEventListener("DOMContentLoaded",function(){
                             document.removeEventListener("DOMContentLoaded",arguments.callee,!1);
                             this.onReady();
                         },!1);
                     }
                 }else{
                     if(document.attachEvent){
                         var a=top!=self;
                         a?document.attachEvent("onreadystatechange",function(){
                             "complete"===document.readyState&&(document.detachEvent("onreadystatechange",arguments.callee),this.onReady());
                         }):document.documentElement.doScroll&&!a&&function(){
                             if(!this.ready.done){
                                 try{
                                     document.documentElement.doScroll("left");
                                 }catch(a){
                                     setTimeout(arguments.callee,0);
                                     return;
                                 }
                                 this.onReady();
                             }
                         }();
                     }
                 }				 
             }

             this.EA(window,"load",this.onReady);
         }
    };

    TK.prototype.EA = function (a,b,c,g){
         if(a){
             if(this.isString(c)){
                 c = (function(c){
                     return function(){
                         eval(c);
                     };
                 })(c);
             }

             if(a.addEventListener){
                 if("mousewheel"==b && UI.B.firefox){
                     b="DOMMouseScroll";
                 }
                 a.addEventListener(b,c,g);
                 return !0;
             }else if(a.attachEvent){
                 return a.attachEvent("on"+b , c);
             }else{
                 return !1;
             }
         }else{

         }
    };


})(TK);


(function(TK){
    try{
        document.execCommand("BackgroundImageCache",!1,!0);
    }catch(e){

    }
    
    TK.prototype.isCN = function(e){
        var t=new RegExp("[\u4e00-\u9fa5]");
        return t.test(e)
    };
    
    TK.prototype.cookie = {
        get:function(e){
            var t=[],n={},r=[],i=document.cookie;
            t=i.split(";");
            for(var s=0,o=t.length;s<o;s++){
                r=t[s].replace(/^\s+/,"").replace(/\s+$/,"");
                r=r.split("=");
                n[r[0]]=r[1];
                if(r[0]==e)return r[1];
            }
            return e?null:n;
        },
        set:function(e,t,n,r,i,s){
            var o=encodeURIComponent(e)+"="+encodeURIComponent(t);
            n instanceof Date&&(o+="; expires="+n.toGMTString());
            r&&(o+="; path="+r);
            i&&(o+="; domain="+i);
            s&&(o+="; secure");
            document.cookie=o
        }
    };

    TK.prototype.getURI = function(e){
        var t = TK.getJsonHref();
        if(typeof e == "string" && e.indexOf(",") < 0)return t[e];
        var n=[];
        typeof e=="string" && e.indexOf(",") > 0 ? n=e.split(","):_keys instanceof Array&&(n=e);
        var r=[];
        for(var i=0;i<n.length;i++)
            t[n[i]]&&r.push(t[n[i]]);
        
        return r.join("&");
    };
    
    TK.prototype.getJsonHref = function(){
        var e=window.location.href,t=window.location.search.replace("?",""),n=arguments[0]=="undefined"?"":arguments[0],r=t.split("&"),i={};
        for(var s=0;s<r.length;s++){
            var o=r[s].split("=");
            TK.isCN(o[1])?i[o[0]]=o[0]+"="+encodeURIComponent(o[1]):i[o[0]]=r[s]
        }
        return i;
    };

})(TK);


