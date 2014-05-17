$(document).ready(
    (function() {
        function getAnim(i){
            var data = "bounce flash pulse rubberBand shake swing tada wobble bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flip flipInX flipInY flipOutX flipOutY lightSpeedIn lightSpeedOut rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight slideInDown slideInLeft slideInRight slideOutLeft slideOutRight slideOutUp hinge rollIn rollOut";
            var obj = data.split(" ");
            return obj[i];

        }
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

        function testAnim(obj,i, fn) {
            var x = getAnim(i);
            obj.addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                if(fn)fn();
                //obj.removeClass(x + " animated");
            });
        };

        //        jQuery(".wrap-in .bottom").addClass("hide");

        jQuery(".wrap-in").each(function(){
            var $this = $(this);
            var $wrap = $this;
            var $wrapOut = $this.parent();
            var $pre = $wrapOut.parent();
            var $top = $this.find(".top");
            var $bottom = $this.find(".bottom");

            $wrapOut.animate({
                height : $this.find(".top").outerHeight() + "px"
            },201);
            var time = 10;
            var timeHand = setInterval(function(){
                if(time <= 0 && timeHand){
                    clearInterval(timeHand);
                    timeHand = null;
                }else{
                    fclick();
                    time--;
                }
            },3000);

            var fclick = function(){
                var iHeight = $top.outerHeight();
                var pos = $this.attr("data-pos") == 0 ? 0: 1;
                $this.attr("data-pos", (pos + 1)%2);

                if(pos){
                    $wrapOut.animate({
                        height : $bottom.outerHeight() + "px"
                    },201);
                    $wrap.animate({
                        top : (-iHeight) + "px"
                    }, 200);
                }else{
                    $wrapOut.animate({
                        height : $top.outerHeight() + "px"
                    },201);
                    $wrap.animate({
                        top :0 + "px"
                    } , 200);

                }
            };

            $pre.click(function(){
                if(time > 0 && timeHand){
                    clearInterval(timeHand);
                    timeHand = null;
                    time = 0; 
                }
                fclick();
            });
        });

        jQuery(".wrap-in0").click(function(){
            console.log("click");
            var $this = $(this);
            //var $wrap = $this.find(".wrap-in");
            var $wrap = $this;
            var $top = $this.find(".top")
            var $bottom = $this.find(".bottom");
            //var iHeight = $wrap.parent().height();
            var iHeight = $wrap.outerHeight();
            var pos = $this.attr("data-pos") == 0 ? 0: 1;
            $this.attr("data-pos", (pos + 1)%2);
            console.log(iHeight,pos);
            if(pos){
                $wrap.animate({
                    top : (-iHeight) + "px"
                }, 200, function(){
                    $top.addClass("hide");
                    $wrap.css("top","0px");
                    $bottom.removeClass("hide");
                });
            }else{
                $wrap.animate({
                    top :iHeight + "px"
                } , 200,function(){
                    $bottom.addClass("hide");
                    $wrap.css("top","0px");
                    $top.removeClass("hide");
                });

            }
        });

    }));



