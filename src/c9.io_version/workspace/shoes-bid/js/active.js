/* Active */
$(document).ready(function() {
    (function($) {
        'use strict';

        var $window = $(window);

        // Nav Active Code
        if ($.fn.classyNav) {
            $('#essenceNav').classyNav();
        }

        // Sliders Active Code
        if ($.fn.owlCarousel) {
            $('.popular-products-slides').owlCarousel({
                items: 4,
                margin: 30,
                loop: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 1000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    }
                }
            });
            $('.product_thumbnail_slides').owlCarousel({
                items: 1,
                margin: 0,
                loop: true,
                nav: false,
                navText: ["<img src='img/core-img/long-arrow-left.svg' alt=''>", "<img src='img/core-img/long-arrow-right.svg' alt=''>"],
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 1000
            });
        }

        // Header Cart Active Code
        var cartbtn1 = $('#essenceCartBtn');
        var cartOverlay = $(".cart-bg-overlay");
        var cartWrapper = $(".right-side-cart-area");
        var cartbtn2 = $("#rightSideCart");
        var cartOverlayOn = "cart-bg-overlay-on";
        var cartOn = "cart-on";

        cartbtn1.on('click', function() {
            cartOverlay.toggleClass(cartOverlayOn);
            cartWrapper.toggleClass(cartOn);
        });
        cartOverlay.on('click', function() {
            $(this).removeClass(cartOverlayOn);
            cartWrapper.removeClass(cartOn);
        });
        cartbtn2.on('click', function() {
            cartOverlay.removeClass(cartOverlayOn);
            cartWrapper.removeClass(cartOn);
        });

        // ScrollUp Active Code
        if ($.fn.scrollUp) {
            $.scrollUp({
                scrollSpeed: 1000,
                easingType: 'easeInOutQuart',
                scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
            });
        }

        // Sticky Active Code
        $window.on('scroll', function() {
            if ($window.scrollTop() > 0) {
                $('.header_area').addClass('sticky');
            }
            else {
                $('.header_area').removeClass('sticky');
            }
        });

        // Nice Select Active Code
        if ($.fn.niceSelect) {
            $('select').niceSelect();
        }

        // Favorite Button Active Code
        var favme = $(".favme");

        favme.on('click', function() {
            $(this).toggleClass('active');
        });

        favme.on('click touchstart', function() {
            $(this).toggleClass('is_animating');
        });

        favme.on('animationend', function() {
            $(this).toggleClass('is_animating');
        });

        // Nicescroll Active Code
        if ($.fn.niceScroll) {
            $(".cart-list, .cart-content").niceScroll();
        }

        // wow Active Code
        if ($window.width() > 767) {
            new WOW().init();
        }

        // Tooltip Active Code
        if ($.fn.tooltip) {
            $('[data-toggle="tooltip"]').tooltip();
        }

        // PreventDefault a Click
        $("a[href='#']").on('click', function($) {
            $.preventDefault();
        });

        $(".owl-carousel").owlCarousel({
            items: 2,
            margin: 0,
            loop: true,
            dots: true,
            autoplay: false,
            smartSpeed: 1000,

            autoHeight: true
        });


        $(".slider-range-price").slider({
            range: true,
            min: 0,
            max: 9999,
            values: [1, 9999],
            slide: function(event, ui) {
                $("#amount-min").val(ui.values[0]);
                $("#amount-max").val(ui.values[1]);
            }
        });
        $("#amount-min").val($(".slider-range-price").slider("values", 0));
        $("#amount-max").val($(".slider-range-price").slider("values", 1));

    })(jQuery);
});
