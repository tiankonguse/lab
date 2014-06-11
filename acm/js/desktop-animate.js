// Lightscreen animate
//---------------------------------------------
$(document).ready(function(){
    $(".icon-menu, .icon-arr-down").css({
        display: "block"
    });
    $(".author, .tagline, .main-menu, .social-links, .intro-message, .go-about").css({
        visibility: "visible"
    });
    $(".author").css({
        opacity: 0,
        top: 0
    });
    
    $(".tagline").css({
        opacity: 0
    });
    
    $(".main-menu").css({
        opacity: 0
    });
    
    $(".social-links").css({
        opacity: 0,
        bottom: 0,
    });
    
    $(".light-screen").mouseenter(function(){
    
        $(this).find(".icon-menu").stop(true).delay(100).animate({
            opacity: 0
        }, 200);
        
        $(this).find(".author").stop(true).delay(100).animate({
            opacity: 1,
            top: "5%"
        }, 200);
        
        $(this).find(".tagline").stop(true).delay(100).animate({
            opacity: 1
        }, 500);
        
        $(this).find(".main-menu").stop(true).delay(100).animate({
            opacity: 1
        }, 500);
        
        $(this).find(".social-links").stop(true).delay(100).animate({
            opacity: 1,
            bottom: "5%"
        }, 200);
        
    });
    $(".light-screen").mouseleave(function(){
    
        $(this).find(".icon-menu").stop(true).delay(200).animate({
            opacity: 1
        }, 300);
        
        $(this).find(".author").stop(true).animate({
            opacity: 0,
            top: 0
        }, 200);
        
        $(this).find(".tagline").stop(true).animate({
            opacity: 0
        }, 200);
        
        $(this).find(".main-menu").stop(true).animate({
            opacity: 0
        }, 200);
        
        $(this).find(".social-links").stop(true).animate({
            opacity: 0,
            bottom: 0
        }, 200);
        
    });
    
});

// Darkscreen animate
//---------------------------------------------
$(document).ready(function(){
    $(".intro-message").css({
        opacity: 0
    });
    
    $(".go-about").css({
        opacity: 0
    });
    
    
    $(".dark-screen").mouseenter(function(){
    
        $(this).find(".icon-arr-down").stop(true).delay(100).animate({
            opacity: 0
        }, 200);
        
        $(this).find(".intro-message").stop(true).delay(100).animate({
            opacity: 1
        }, 200);
        
        $(this).find(".go-about").stop(true).delay(100).animate({
            opacity: 1
        }, 500);
        
    });
    $(".dark-screen").mouseleave(function(){
    
        $(this).find(".icon-arr-down").stop(true).delay(200).animate({
            opacity: 1
        }, 300);
        
        $(this).find(".intro-message").stop(true).animate({
            opacity: 0
        }, 200);
        
        
        $(this).find(".go-about").stop(true).animate({
            opacity: 0
        }, 200);
        
    });
});


