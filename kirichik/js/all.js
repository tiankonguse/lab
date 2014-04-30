// Home page hide
//---------------------------------------------
$(document).ready(function(){
    if (jQuery(window).width() > 1000) {
        $(".pg-item").css("min-height",($(window).height()) +"px");
        $(window).resize(function(){
            $(".pg-item").css("min-height",($(window).height()) +"px");
        });
        var animate_in = 499, animate_out = 500;
        var lock = 0;
        var $pgItem = $(".pg-item");
        function page_up(){
            var id = $pgItem.filter(":in-viewport:last").attr("id") ;
            if(!id){
                //top
            }else{
                var $id = $("#" + id);
                var $pre = $id.prev();
                if($pre.length != 0){
                    // not top
                    lock = 1;
                    $("html, body").animate({
                        scrollTop: ($pre.offset().top) + "px"
                    }, animate_in, "easeInOutExpo", function(){
                        window.setTimeout(function(){
                            lock = 0;
                        }, animate_out);
                    });
                }else{
                    lock = 1;
                    $("html, body").animate({
                        scrollTop: (0) + "px"
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
                lock = 1;
                $("html, body").animate({
                    scrollTop: ($next.offset().top) + "px"
                }, animate_in, "easeInOutQuad", function(){
                    window.setTimeout(function(){
                        lock = 0;
                    }, animate_out);
                });

            }else{
                var $id = $("#" + id);
                var $next = $id.next();
                if($next.length != 0){
                    lock = 1;
                    $("html, body").animate({
                        scrollTop: ($next.offset().top) + "px"
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

