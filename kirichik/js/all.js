// Home page hide
//---------------------------------------------
$(document).ready(function(){
    function getAnim(){
        var data = "bounce flash pulse rubberBand shake swing tada wobble bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flip flipInX flipInY flipOutX flipOutY lightSpeedIn lightSpeedOut rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight slideInDown slideInLeft slideInRight slideOutLeft slideOutRight slideOutUp hinge rollIn rollOut";
        var obj = data.split(" ");
        return obj[parseInt(Math.random()*obj.length)];
    }

    function testAnim(obj) {
        var x = "";
        ALL.allAnim && (x = getAnim());
        ALL.slowin && (x = "slowin");
        obj.addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            setTimeout(function(){
                obj.removeClass(x + " animated");
            },3500);
        });
    };
    if (jQuery(window).width() > 1000) {
        $(".pg-item").css("min-height",($(window).height()) +"px");
        $(window).resize(function(){
            $(".pg-item").css("min-height",($(window).height()) +"px");
        });
        var animate_in = 499, animate_out = 500;
        var lock = 0;
        var $pgItem = $(".pg-item");
        var $home = $("#home");
        function page_up(){
            var id = $pgItem.filter(":in-viewport:last").attr("id") ;
            if(!id){
                //top
            }else{
                var $id = $("#" + id);
                var $pre = $id.prev();
                if($pre.length != 0){
                    // not top
                    ALL.slowin || testAnim($id);
                    var top = $pre.offset().top;
                    testAnim($pre);
                    lock = 1;
                    $("html, body").animate({
                        scrollTop: top + "px"
                    }, animate_in, "easeInOutExpo", function(){
                        window.setTimeout(function(){
                            lock = 0;
                        }, animate_out);

                    });
                }else{
                    ALL.slowin || testAnim($id);
                    testAnim($home);
                    lock = 1;
                    $("html, body").animate({
                        scrollTop: 0 + "px"
                    }, animate_in, "easeInOutExpo", function(){
                        window.setTimeout(function(){
                            lock = 0;
                        },animate_out);
                    });
                }
            }
        }

        function page_down(){
            var id = $pgItem.filter(":in-viewport:last").attr("id") ;
            if(!id){
                var $next =$($pgItem[0]);
                ALL.slowin || testAnim($home);
                var top = $next.offset().top;
                testAnim($next);

                lock = 1;
                $("html, body").animate({
                    scrollTop: top + "px"
                }, animate_in, "easeInOutQuad", function(){
                    window.setTimeout(function(){
                        lock = 0;
                    }, animate_out);
                });

            }else{
                var $id = $("#" + id);
                var $next = $id.next();
                if($next.length != 0){
                    ALL.slowin || testAnim($id);
                    var top = $next.offset().top;
                    testAnim($next);
                    lock = 1;
                    $("html, body").animate({
                        scrollTop: top + "px"
                    }, animate_in, "easeInOutQuad", function(){
                        window.setTimeout(function(){
                            lock = 0;
                        }, animate_out);
                    });
                }else{

                }
            }
        }

        $(document).bind('mousewheel DOMMouseScroll', function(event){
            if(lock == 1){
                return false;
            }
            var delta = event.originalEvent.wheelDelta || (0 - event.originalEvent.detail);
            if(delta < 0){
                //down
                page_down();
            }else{
                //up
                page_up();
            }
            return false;
        });



        $(document).keydown(function(event){
            if(lock == 1){
                return false;
            }
            switch(event.which){
                case 32:
                case 13:
                case 40:
                case 34:
                    page_down();
                    break;
                case 38:
                case 33:
                    page_up();
                    break;
            }

        });

    }
});

// Navigation
//---------------------------------------------

$(document).ready(function(){
    var sections = $(".pg-item");
    var menu_links = $(".side-menu ul li a");

    $(window).scroll(function(){
        if (sections.filter(":in-viewport:last").attr("id") == sections.last().attr("id")) {
            menu_links.removeClass("active");
            menu_links.last().addClass("active");
        }
        else {
            sections.filter(":in-viewport:first").each(function(){
                var active_section = $(this);
                var active_link = $('.side-menu ul li a[href="#' + active_section.attr("id") + '"]');
                menu_links.removeClass("active");
                active_link.addClass("active");
            });
        }
    });
});




// Local scroll
//---------------------------------------------

$(document).ready(function(){
    $('.main-menu, .go-about, .side-logo-wrap, .side-menu').localScroll({
        target: 'body',
        hash: true,
        duration: 1230,
        esing: "easeInOutExpo"
    });
});

// Mobile menu
//---------------------------------------------

$(document).ready(function(){

    $(".ps-icon-menu, .ps-menu-toggle").click(function(){
        if ($(".sidebar").hasClass("opened")) {

            $(".sidebar").animate({
                left: "-350px"
            }, "easeOutCirc");
            $(".ps-icon-menu").removeClass("actived");
            $(".ps-icon-menu b").animate({
                right: "50%",
                marginRight: "-17px"
            });
            $(".white-overlay").fadeOut();
            $(".sidebar").removeClass("opened");

        }
        else {

            $(".white-overlay").fadeIn();
            $(".sidebar").animate({
                left: 0
            }, 300, "easeOutCirc");
            $(".ps-icon-menu").addClass("actived");
            $(".ps-icon-menu b").animate({
                right: "10px",
                marginRight: 0
            });
            $(".sidebar").addClass("opened");

        }
    });

    $(window).scroll(function(){
        if ($(".sidebar").hasClass("opened")) {

            $(".sidebar").animate({
                left: "-350px"
            }, "easeOutCirc");
            $(".ps-icon-menu").removeClass("actived");
            $(".ps-icon-menu b").animate({
                right: "50%",
                marginRight: "-17px"
            });
            $(".white-overlay").fadeOut();
            $(".sidebar").removeClass("opened");

        }
    });

});



