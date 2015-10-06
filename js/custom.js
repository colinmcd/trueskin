jQuery(document).ready(function($){

    var home = ($(".home").length > 0) ?  true :  false ;
    var archive = ($(".archive").length > 0) ?  true :  false ;
    
    $.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));



    $(".slider-caption").click(function(){
        if($(".slider-content:visible").length == 0) {
            $(".slider-content, .content-social").fadeIn();
            $(this).text("close");
            $(this).addClass("show");
        }
        else {
            $(".slider-content, .content-social").fadeOut();
            $(this).text("caption");
            $(this).removeClass("show");
        }
    });
    
    var timeout;
    
    $('.home .down-arrow').click(function(){
        
       $('body').animate({
            scrollTop: $("#section1").offset().top
        }, 1500, "swing", function() {
            window.onscroll=null;
            clearTimeout(timeout);  
            timeout = setTimeout(function() {
                $(".headroom").removeClass('hide-menu');
                window.onscroll=incrementalScroll;
            }, 50);
           
        });
        return false;
    });  

    // if($(".home:not(.scrolled)").length > 0) {
    //     window.onscroll = function (e) {  
    //         $('html, body').animate({
    //             scrollTop: $("#section1").offset().top
    //         }, 1000);
    //         $(".home").addClass("scrolled");
    //         return false;
    //     }

    // }
   
    $(".bottom-action>.share").hover(function() {
            
        $(this).toggleClass('hover');
      
        return false;
    });

    $(".mitem").mouseleave(function() {
        $(".social-share").fadeOut().remove();
    });

    

    $(".true-main-menu .cart").insertAfter(".true-main-menu li:nth-child(1)");
    $(".true-mobile-menu .cart").appendTo(".true-mobile-menu li:nth-child(3)");

    if(home) {
     updateHomeTiles($(window));
     // checkSection();
    }

    if(archive) {
     updateArchiveTiles($(window));
    }

    var mansory = document.querySelector('#mansory');
    if(mansory) {
        var msnry = new Masonry( mansory, {
          itemSelector: '.mitem'
        });
    }


    updateMenu();
    

    $(window).resize(function() {
        updateMenu();
    });

    function updateMenu() {
        var height = $(window).height();
        $(".story-cover, .story_cover_overlay_filter").height(height);
    }

    
    if($.browser.device) {

        // $(".social").mouseenter(function(){
        //     $(this).addClass("hover");
        // });
        
        $(".social").on("click",function(){
            // $(this).addClass("hover");

            $('.true-share-modal').modal('show');

            $(".social").addClass("nohover");
            $('.social .icons').hide();
            return false;
        });
    }

$(".tiles .post").on("hover",function() {
    $(this).toggleClass("hover");
});
$("#suggestions .post").on("hover",function() {
    $(this).toggleClass("hover");
});


    // $(window).on("mousewheel",function(e) {
    //     if (e.originalEvent.wheelDelta >= 0) {
    //         $(".headroom").removeClass("hide");
    //     }
    //     else {
    //         $(".headroom").addClass("hide");
    //     }
    // });

    // $(window).on( 'DOMMouseScroll mousewheel', function ( event ) {
    //   if( event.originalEvent.detail > 0 || event.originalEvent.wheelDelta < 0 ) { //alternative options for wheelData: wheelDeltaX & wheelDeltaY
    //     //scroll down
    //     
    //   } else {
    //     //scroll up
    //     $(".headroom").removeClass("hide");
    //   }
    //   //prevent page fom scrolling
    //   // return false;
    // });

    // $(".headroom").headroom();

   function incrementalScroll(e) {
     
        var scrollX = (this.x || window.pageXOffset) - window.pageXOffset;
        var scrollY = (this.y || window.pageYOffset) - window.pageYOffset;
        
        this.x = window.pageXOffset;
        this.y = window.pageYOffset;
        
        test(scrollX, scrollY);

        if(home) {
            // checkSection();
        }
    }
            
    
    window.onscroll=incrementalScroll;


    function test(scrollX, scrollY){
        
        var directionX = !scrollX ? "NONE" : scrollX>0 ? "LEFT" : "RIGHT";
        var directionY = !scrollY ? "NONE" : scrollY>0 ? "UP" : "DOWN";

        //dont hide and show menu on hoempage
        // if(!home) {
            if(directionY == "UP") {
                $(".headroom").removeClass("hide-menu");
            }
            else if (directionY == "DOWN") {
                if($(window).scrollTop() > 100) {
                    $(".headroom").addClass("hide-menu");
                }  
            }
        // }
        
    }




    if(home) {
        
        updateHomeTiles($(window));
        $(window).resize(function(e) {
            updateHomeTiles($(this));
        });
        
    }

    if(archive) {
        
        updateArchiveTiles($(window));
        $(window).resize(function(e) {
            updateArchiveTiles($(this));
        });
        
    }





    function updateHomeTiles(screen) {
        if(screen.width() <= 768) {
            $.each($(".home .mitem"),function(k,v){ var height = $(v).data('height'); $(v).height(height+80) });
        }
        else {
            $.each($(".home .mitem"),function(k,v){ var height = $(v).data('height'); $(v).height(height-2) });
        }
    }


    function updateArchiveTiles(screen) {
        console.log("archive");
        if(screen.width() <= 768) {
            $.each($(".archive .mitem"),function(k,v){ var height = $(v).data('height'); $(v).height(height+53) });
        }
        else {
            $.each($(".archive .mitem"),function(k,v){ var height = $(v).data('height'); $(v).height(height-20) });
        }
    }


    function checkSection() {
        var window_offset = $(window).height() - $(window).scrollTop();
        if(window_offset < 0) {
            $(".headroom").css("background-color","#FFFFDE");
        }
        else {
            $(".headroom").css("background-color","transparent"); 
        }
    }


    // $("a i.fa-facebook").on("click",function() {
       // https://www.facebook.com/sharer/sharer.php?s=100&p[title]=EXAMPLE&p[summary]=EXAMPLE&p[url]=EXAMPLE&p[images][0]=EXAMPLE
       // FB.ui(
       //    {
       //      method: 'share',
       //      href: document.URL,
       //    },
       //    function(response) {}
       //  );

      // return false;
   // });

    $(".mobile-menu").click(function(){
        var $this = $(".top-custom-menu");
        if($this.hasClass("show")) { 
            $this.removeClass("show");
            $('body, html').css("overflow-y","visible");
        } else { 
            $this.addClass("show");
            $('body, html').css("overflow-y","hidden");
        }
        return false;
    });

    $(".x").on('click',function() {
        $(".background-cover").fadeOut();

        return false;
    });


    $(".true-menu ul li:first-child").click(function() {
        $(".background-cover").fadeIn();
        return false;
    });



    $('.mc-subscription').submit(function(e) {
        
        // Prepare query string and send AJAX request
        $.ajax({
            url: 'wp-content/themes/true/inc/store-address.php',
            data: 'ajax=true&email=' + escape($(this).find('#mce-EMAIL').val()),
            success: function(msg) {
                console.log(msg);
                if(msg.indexOf("already subscribed") > -1) {
                    alert("Thanks, but you are already subscribed!");
                    $(".x").trigger("click");
                }
                else if(msg.indexOf("No email address") > -1) {
                    alert("No email provided!")
                }
                else {
                    alert(msg);
                    $(".x").trigger("click");
                }
                
                
            }
        });
    
        return false;
    });


});


    var elemSelector = '.headroom'
    , tStart = 100 // start transition this px from top
    , tEnd = 300   // end transition
    , cStart = [0, 0, 0, 0.4]  // start color
    , cEnd = [0, 0, 0, 1.0]   // end color
    , cDiff = [
        cEnd[0] - cStart[0],
        cEnd[1] - cStart[1],
        cEnd[2] - cStart[2],
        cEnd[3] - cStart[3]
    ];

    jQuery(document).ready(function($) {
        scrollColor();
        function scrollColor() {
            var p = ($(this).scrollTop() - tStart) / (tEnd - tStart); // % of transition
            p = Math.min(1, Math.max(0, p)); // Clamp to [0, 1]
            var cBg = [
                Math.round(cStart[0] + cDiff[0] * p),
                Math.round(cStart[1] + cDiff[1] * p),
                Math.round(cStart[2] + cDiff[2] * p),
                Math.round((cStart[3] + cDiff[3] * p) * 100) / 100
            ];
            $(elemSelector).css('background-color', 'rgba(' + cBg.join(',') + ')');
        }
        $(document).scroll(function() {
            scrollColor();
        });
    });