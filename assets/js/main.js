(function ($) {
    "use strict";

    $.fn.elExists = function() {
        return this.length > 0;
    };
    
    /*-- Menu Sticky --*/
    var windows = $(window);
    var sticky = $('.header-sticky');
    windows.on('scroll', function () {
        var scroll = windows.scrollTop();
        if (scroll < 300) {
            sticky.removeClass('is-sticky');
        } else {
            sticky.addClass('is-sticky');
        }
    });
   
    /*--- Clickable menu active --*/
    const slinky = $('#menu').slinky();

    /*-- Mobile Menu Toggle --*/
    function sidebarMainmenu() {
        var menuTrigger = $('.clickable-mainmenu-active a'),
            endTrigger = $('button.clickable-mainmenu-close'),
            container = $('.clickable-mainmenu');
        menuTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('inside');
        });
        endTrigger.on('click', function() {
            container.removeClass('inside');
        });
    };
    sidebarMainmenu();
    
    /*-- One PageNav Scrolling --*/
    function onePageScrolling(){
        $('.sectionNav').onePageNav({
            currentClass: 'current',
            changeHash: false,
            scrollSpeed: 750
        });
    }
    onePageScrolling();
    
    /*-- About Carousel --*/
    $('.about-carousel').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    /*-- Video Popup --*/
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade'
    });
        
    /*-- Gallery Popup (Lightbox) --*/
    $('.gallery-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        mainClass: 'mfp-fade'
    });

    /*-- Scroll Up --*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up"></i>',
    });
 
})(jQuery);