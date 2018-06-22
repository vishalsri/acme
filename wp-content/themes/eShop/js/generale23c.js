(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nca|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
/*global jQuery: false, $: false */
jQuery(document).ready(function($) {
    var $body = jQuery('body'),
        $window = jQuery(window),
        $wrapper = $("#main-wrapper"),
        $header = $(".header");
    function homeHeight() {
        var $top_menu_inner = jQuery(".top-menu-inner"),
            wHeight = $window.height(),
            wWidth = $window.width(),
            menuPaddingTop = $top_menu_inner.css("padding-top"),
            menuPaddingBottom = $top_menu_inner.css("padding-bottom"),
            menuPaddingLeft = $top_menu_inner.css("padding-left"),
            menuPaddingRight = $top_menu_inner.css("padding-right"),
        //jQuery("#work-image").height(wHeight - parseFloat(jQuery(".main-content-inner").css("padding-top")));
            menuArea = wHeight - parseFloat(menuPaddingTop) - parseFloat(menuPaddingBottom),
            menuWidth = wWidth - parseFloat(menuPaddingLeft) - parseFloat(menuPaddingRight),
            $rows = 2;
        jQuery("#home-image").height(wHeight);
        if ($window.width() < 767) {
            $rows = 3;
        }

        if ($window.scrollTop() < 100) {
            $window.scrollTop(0, 300);
        }
        jQuery(".top-menu ul li").animate({
          'height':(menuArea * 0.99) / $rows,
          'margin-left': menuWidth * 0.01
        },
        {
          duration: 250,
          easing:'linear'
        });
        // jQuery(".service-menu ul li").animate({
        //   'height':(menuArea * 0.99) / $rows - 16,
        //   'margin-left': menuWidth * 0.01
        // },
        // {
        //   duration: 250,
        //   easing:'linear'
        // });
    }
    $body.flowtype({
        minFont: 12,
        maxFont: 48
    });

    // OPEN / CLOSE SIDEBAR MENU
    $(".home-bell, .red-section-bell, li#menu-item-52 > a, .show-nav #site-canvas, .close-side-menu-btn, .opened .top-menu, a.home-bell span, a.maintenance-bell span, a.brandtender-btn, a.contact-location-email").click(function(e) {
      if(jQuery.browser.mobile){
        $('.side-menu').css('position','absolute');
        var top = $(document).scrollTop();
        $('.side-menu').css('top', top);
      }

        $('.side-menu .security-form').hide();
        $('.side-menu .contact-form').show();

        $body.toggleClass('opened');
        $('.wrapper').toggleClass('show-nav');
        $('.menu-trigger.opened').click();

        // Firefox fix for adding overflow hidden to the body. 300ms = animation time of side menu
        setTimeout(function(){
          $body.toggleClass('finished');
        }, 300);

        return false;
    });

    $(".security-contact").click(function(e) {
        $('.side-menu .contact-form').hide();
        $('.side-menu .security-form').show();

        $body.toggleClass('opened');
        $('.wrapper').toggleClass('show-nav');
        $('.menu-trigger.opened').click();

        // Firefox fix for adding overflow hidden to the body. 300ms = animation time of side menu
        setTimeout(function(){
          $body.toggleClass('finished');
        }, 300);

        return false;
    });

    $('.top-menu').on('click', function(){
      if($body.hasClass('opened')){
        $('.close-side-menu-btn').click();
      }
    });
    /*
    $window.load(function(e) {
        $("a.home-bell span, a.maintenance-bell span").addClass("slideUp2");
        setTimeout(function() {
            $("a.home-bell span, a.maintenance-bell span").removeClass("slideUp2");
        }, 2000);
    });

    $("a.home-bell").hover(function(e) {
        $(this).find("span").toggleClass("slideUp2");
    });
    */
    $("a.close-side-menu-btn").click(function(e) {
        $wrapper.click();
    });

    // OPEN / CLOSE MAIN MENU
    $(".menu-trigger").click(function(e) {
        $(this).toggleClass("opened");
        //$(".top-menu").fadeToggle(300);
        $(".top-menu").toggleClass('active');
        // $('.service-menu .nav-back').trigger('click');
    });

    // CLICK NAVIGATION ARROWS
    $(".go-down-arrow").click(function(e) {
        var target = $(this).attr("href");
        $('html, body').animate({ // 'body' for webkit; 'html' for firefox
            scrollTop: $(target).offset().top - 100
        }, 1000, 'easeInCubic');
        return false;
    });

    // STICKY HEADER
    $window.scroll(function(e) {
        if ($window.scrollTop() > 50) {
            $header.addClass("sticky");
            $body.addClass("has-sticky");
        } else {
            $header.removeClass("sticky");
            $body.removeClass("has-sticky");
        }
        if ($(".red-section").length) {
            var topScroll = $(window).scrollTop(),
                //wHeight = $(window).height(),
               stopArea = $(".red-section").offset().top - 150;
            //if (topScroll > stopArea) {
            //    if (!$header.hasClass("not-sticky")){
            //       $header.addClass("not-sticky").animate({"top": -(stopArea - $header.height())},{ duration: 250 });
            //    }
            //} else {
                $header.css("top", "0px").removeClass("not-sticky");
            //}
        }
    });


    var blogPostCounter = $('.blog-post-counter'),
        pageTitle = $('.page-title');

    $window.scroll(function(e) {
        var stickBar = $(".blog-single-top"),
            topPosition = 65,
            topScroll = $window.scrollTop(),
            startStick = topPosition - $(".header").height();

        if (stickBar.length) {
            if (!stickBar.hasClass("stickyBar")){
              topPosition = stickBar.offset().top;
            }
        }
        if ($window.scrollTop() > startStick) {
            stickBar.addClass("stickyBar");
        } else {
            stickBar.removeClass("stickyBar");
        }

        if ($(".red-section").length) {
          var stopStick = $(".red-section").offset().top - 150;
            if (topScroll > stopStick) {
                if (!stickBar.hasClass("not-sticky")){
                  stickBar.addClass("not-sticky");
                }
            } else {
                stickBar.removeClass("not-sticky");
            }
        }

        // @FIXME force safari to redraw to prevent artifacting on blog page
        blogPostCounter.css('overflow', 'hidden').height();
        blogPostCounter.css('overflow', 'auto');
        pageTitle.css('overflow', 'hidden').height();
        pageTitle.css('overflow', 'inherit');
    });

    // CUSTOM SELECT
    $("select").select2({
        'width': '100%',
        'minimumResultsForSearch': -1
    });

    $(".wpcf7-form-control-wrap.project select").select2({
        placeholder: "Type of Project *"
    });

    // POP UP HOMEPAGE FEATURED ITEMS
    $window.scroll(function() {
        $('.home-featured-item').each(function() {
            var imagePos = $(this).offset().top,
                topOfWindow = $window.scrollTop();
            if (imagePos < topOfWindow + 700 && $body.hasClass("home")) {
                $(this).addClass("slideUp");
            }
        });
    });

    // STOP STICKY BELL
    $window.scroll(function(e) {
        if ($(".red-section").length) {
            var topScroll = $window.scrollTop(),
                wHeight = $window.height(),
                stopArea = $(".red-section").offset().top - wHeight;
            if (topScroll > stopArea) {
                // $(".home-bell").addClass("not-sticky").css("top", stopArea + wHeight - $(".home-bell").height() + 1); // +1 for safari 8 fix
            } else {
                // $(".home-bell").removeClass("not-sticky").css("top", "");
            }
        }
    });
    $(window).scroll();

    // LL CULTURE
    $(".culture-inner-slider").each(function(index, element) {

        $(this).cycle({
            'fx': "scrollHorz",
            'slides': "> div",
            'speed': 1500,
            'timeout': (function() {
                return 5000 + Math.ceil(Math.random() * 1000);
            }()),
            'log': false
        });
    });

    // CONTACT SLIDER
    $(".contact-location-slider").cycle({
        'fx': "scrollHorz",
        'slides': "> div",
        'speed': 800,
        'timeout': 0,
        'prev': '.location-prev',
        'next': '.location-next',
        'log': false
            //'swipe': true
    });

    $('.contact-location-slider').on('cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        var $next = $(incomingSlideEl).data("num");
        $(".contact-locations-tabs ul li a").each(function(index, element) {
            if ($(this).data("num") == $next) {
                $(".contact-locations-tabs ul li").removeClass("active");
                $(this).parent().addClass("active");
            }
        });
    });

    $(".map-type-switch").click(function(e) {
        $(this).toggleClass("active");
        $(this).parent().parent().find(".contact-location-map-image").toggleClass("slideUp");
        return false;
    });

    $(".contact-locations-tabs ul li a").click(function(e) {
        var target = $(this).data("num");
        $(".contact-locations-tabs ul li").removeClass("active");
        $(this).parent().addClass("active");
        $('.contact-location-slider').cycle('goto', target - 1);
        return false;
    });

    // SERVICES
    $(".tabpanel-cycle").cycle({
        'fx': "scrollHorz",
        'slides': "> div",
        'speed': 800,
        'timeout': 0,
        'prev': '.prev-tab',
        'next': '.next-tab',
        'swipe': true,
        'log': false
    });

    $('.tabpanel-cycle').on('cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        var $next = $(incomingSlideEl).data("num");
        $(".tabpanel-header ul li a").each(function(index, element) {
            if ($(this).data("num") == $next) {
                $(".tabpanel-header ul li").removeClass("active");
                $(this).parent().addClass("active");
            }
        });
    });

    $(".tabpanel-header ul li a").click(function(e) {
        var target = $(this).data("num");
        $(".tabpanel-header ul li").removeClass("active");
        $(this).parent().addClass("active");
        $('.tabpanel-cycle').cycle('goto', target - 1);
        return false;
    });

    $('.top-menu #menu-main-menu li.menu-item-has-children a[title="services"]').click(function() {
        $('.top-menu-main').animate({opacity: 0}, 500, function() {
            $('.top-menu-main').hide();
            $('.service-menu').animate({opacity: 1}, 500, function() {});
        });
    });


    $('.service-menu .nav-back').click(function() {
        $('.service-menu').animate({opacity: 0}, 500, function() {
            $('.top-menu-main').show();
            $('.top-menu-main').animate({opacity: 1}, 500, function() {});
        });
    });

    $('.top-menu #menu-main-menu li.menu-item-has-children a[title="clients"]').click(function() {
        $('.top-menu-main').animate({opacity: 0}, 500, function() {
            $('.top-menu-main').hide();
            $('.service-menu').hide();
            $('.client-menu').animate({opacity: 1}, 500, function() {});
        });
    });

    $('.client-menu .nav-back').click(function() {
        $('.client-menu').animate({opacity: 0}, 500, function() {
            $('.top-menu-main').show();
            $('.service-menu').show();
            $('.top-menu-main').animate({opacity: 1}, 500, function() {});
        });
    });

    // BLOG
    $(".post-share-btn").click(function(e) {
        $("#post-share").fadeIn(300);
        $("#post-share .post-title").text($("h1.page-title").text());
        $("#post-share .post-subtitle").text($(".post-single-subtitle p").text());
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    $(".close-share-btn").click(function(e) {
        $("#post-share").fadeOut(300);
    });

    // WORK
    $(".work-filters > span").click(function(e) {
        $(this).next().slideToggle(300);
    });

    $(".work-filters").click(function(e) {
        e.stopPropagation();
    });

    $('.footer .rooftop-lounge').on('click', function(e) {
      e.stopPropagation();
      //var topScroll = $window.scrollTop();
      $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    $(document).click(function(e) {
        $(".work-filters > div").slideUp(300);
    });

    // BLOG SCROLL
    $window.scroll(function(e) {
        if($(window).width() > 767) {
            if ($(".author-box").length) {
                var topScroll = $window.scrollTop(),
                    stopArea = $(".footer").offset().top - $(".author-box").height() - 140,
                    startArea = $(".post-body").offset().top - 70,
                    $post_sidebar = $(".post-sidebar");

                if (topScroll > stopArea) {
                    $post_sidebar.addClass("not-sticky");
                } else {
                    $post_sidebar.css('top', topScroll - startArea + 55);
                    $post_sidebar.removeClass("not-sticky");
                }

                if (topScroll > startArea) {
                    $post_sidebar.addClass("fixed-section");
                } else {
                    $post_sidebar.removeClass("fixed-section").css('top', 20);
                }
            }
        }
    });

    // CALCULATE HEIGHT OF MAIN IMAGE AND MENU ITEMS
    homeHeight();
    $window.scroll();
    $window.resize(function() {
        setTimeout(function() {
            homeHeight();
        }, 500);

        if( $('a.menu-trigger').hasClass('opened') && $window.width() > 991) {
            $('a.menu-trigger').removeClass('opened');
            $('.top-menu.active').removeClass('active');
        }
    });
});
