(function (e) {
    "use strict";
    var n = window.AFTHEMES_JS || {};
    n.mobileMenu = {
        init: function () {
            this.toggleMenu(), this.menuMobile(), this.menuArrow();

        },
        toggleMenu: function () {
            e('#masthead').on('click', '.toggle-menu', function (event) {
                var ethis = e('.main-navigation .menu .menu-mobile');
                if (ethis.css('display') == 'block') {
                    ethis.slideUp('300');
                } else {
                    ethis.slideDown('300');
                }
                e('.ham').toggleClass('exit');
            });
            e('#masthead .main-navigation ').on('click', '.menu-mobile a button', function (event) {
                event.preventDefault();
                var ethis = e(this),
                    eparent = ethis.closest('li');

                if (eparent.find('> .children').length) {
                    var esub_menu = eparent.find('> .children');
                } else {
                    var esub_menu = eparent.find('> .sub-menu');
                }


                if (esub_menu.css('display') == 'none') {
                    esub_menu.slideDown('300');
                    ethis.addClass('active');
                } else {
                    esub_menu.slideUp('300');
                    ethis.removeClass('active');
                }
                return false;
            });
        },
        menuMobile: function () {
            if (e('.main-navigation .menu > ul').length) {
                var ethis = e('.main-navigation .menu > ul'),
                    eparent = ethis.closest('.main-navigation'),
                    pointbreak = eparent.data('epointbreak'),
                    window_width = window.innerWidth;
                if (typeof pointbreak == 'undefined') {
                    pointbreak = 992;
                }
                if (pointbreak >= window_width) {

                    e('.main-navigation').addClass('aft-mobile-navigation');

                    ethis.addClass('menu-mobile').removeClass('menu-desktop');
                    e('.main-navigation .toggle-menu').css('display', 'block');

                } else {

                    e('.main-navigation').removeClass('aft-mobile-navigation');

                    ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                    e('.main-navigation .toggle-menu').css('display', '');
                }

                if (e('.main-navigation').hasClass('aft-mobile-navigation')) {
                    var navElement = document.querySelector(".aft-mobile-navigation");
                    if (navElement) {
                        n.trapFocus(navElement);
                    }
                }
            }
        },
        menuArrow: function () {
            if (e('#masthead .main-navigation div.menu > ul').length) {
                e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<button class="dropdown-toggle">');
                e('#masthead .main-navigation div.menu > ul .children').parent('li').find('> a').append('<button class="dropdown-toggle">');
            }
        }
    },

        n.trapFocus = function (element) {


            var focusableEls = element.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'),
                firstFocusableEl = focusableEls[0],
                lastFocusableEl = focusableEls[focusableEls.length - 1],
                KEYCODE_TAB = 9;

            element.addEventListener('keydown', function (e) {
                var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

                if (!isTabPressed) {
                    return;
                }

                if (e.shiftKey) /* shift + tab */ {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus();
                        e.preventDefault();
                    }
                } else /* tab */ {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus();
                        e.preventDefault();
                    }
                }

            });
        },

        n.DataBackground = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {
                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });

            e('.bg-image').each(function () {
                var src = e(this).children('img').attr('src');
                e(this).css('background-image', 'url(' + src + ')').children('img').hide();
            });
        },

        n.Preloader = function () {

            e('.spinner-container').fadeOut();
            e('#af-preloader').delay(1000).fadeOut('slow');

        },

        n.Search = function () {

            e(".af-search-click").on('click', function () {
                e("#af-search-wrap").toggleClass("af-search-toggle");
            });

        },

        n.RtlCheck = function () {
            if (e('body').hasClass("rtl")) {
                return true;
            } else {
                return false;
            }
        },

        n.Offcanvas = function () {


            e('.offcanvas-nav').sidr({
                side: 'right',
                displace: false,
            });

            e('.sidr-class-sidr-button-close').click(function () {
                e.sidr('close', 'sidr');
            });
        },

        n.openCloseSearch = function () {
            e('.open-search-form').click(function () {
                e('#myOverlay').show();
                e('body').addClass('aft-open');
            });

            e('.close-serach-form').click(function () {
                e('#myOverlay').hide();
                e('body').removeClass('aft-open');
            });


        },

        // SHOW/HIDE SCROLL UP //
        n.show_hide_scroll_top = function () {
            if (e(window).scrollTop() > e(window).height() / 2) {
                e("#scroll-up").fadeIn(300);
            } else {
                e("#scroll-up").fadeOut(300);
            }
        },

        n.scroll_up = function () {
            e("#scroll-up").on("click", function () {
                e("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        },

        //Toggle class when top categories is clicked
        n.ToggleCategories = function () {


            e('#aft-top-categories-btn').unbind().on("click tap touchstart", function (event) {
                event.preventDefault();
                if (e(this).parent().hasClass("category-dropdown-active")) {
                    e(this).parent().removeClass('category-dropdown-active');
                } else {
                    e(this).parent().addClass('category-dropdown-active');
                    var catElement = document.querySelector(".category-dropdown-active");
                    if (catElement) {
                        n.trapFocus(catElement);
                    }
                }


            });

        },


        n.MainBannerSlider = function () {
            e('.main-banner-slider-single.aft-slider').slick({
                slidesToScroll: 1,
                autoplay: true,
                dots: true,
                //fade: true,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                rtl: n.RtlCheck()
            });
        },

        n.MainBannerCarousel = function () {
            e('.main-banner-slider-single.aft-carousel').slick({
                autoplay: true,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                rtl: n.RtlCheck()
            });
        },


        n.ExpressProductCarousel = function () {
            e('.express-product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 12000,
                    infinite: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },

        n.ExpressProductCarousels = function () {
            e('.wide .express-product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 12000,
                    infinite: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 3,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },

        n.ProductCarouselWide = function () {
            e('.wide .product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 12000,
                    infinite: true,
                    arrows: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },

        n.ProductCarousel = function () {
            e('.product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 12000,
                    infinite: true,
                    arrows: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },

        n.SidrProductCarousel = function () {
            e('#sidr .product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 12000,
                    infinite: true,
                    arrows: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },

        n.FooterProductCarousel = function () {
            e('.primary-footer .product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 12000,
                    infinite: true,
                    arrows: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },
        n.SecondaryProductCarousel = function () {
            e('#secondary .product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 12000,
                    infinite: true,
                    arrows: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },

        n.BrandCarousel = function () {


            e('.brand-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 12000,
                    infinite: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });


        },


        n.TabbedCarousel = function () {
            e('.tabbed-product-carousel').each(function () {
                e(this).not('.slick-initialized').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 12000,
                    infinite: true,
                    nextArrow: '<span class="slide-icon slide-next af-slider-btn"></span>',
                    prevArrow: '<span class="slide-icon slide-prev af-slider-btn"></span>',
                    appendArrows: jQuery(this).parents('.aft-slider-carousel').find('.aft-slider-btn-wrapper'),
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },
        e(document).ready(function () {
            n.mobileMenu.init(),
                n.DataBackground(),
                n.Offcanvas(),
                n.openCloseSearch(),
                n.scroll_up(),
                n.MainBannerSlider(),
                n.MainBannerCarousel(),
                n.ProductCarouselWide(),
                n.SecondaryProductCarousel(),
                n.FooterProductCarousel(),
                n.SidrProductCarousel(),
                n.ProductCarousel(),
                n.ExpressProductCarousels(),
                n.ExpressProductCarousel(),
                n.BrandCarousel(),
                n.TabbedCarousel(),
                n.ToggleCategories();
        }), e(window).scroll(function () {
        n.show_hide_scroll_top();
    }), e(window).resize(function () {
        n.mobileMenu.menuMobile(),
            n.ToggleCategories();
    }), e(window).load(function () {
        n.Preloader(),
            n.Search();
    })
})(jQuery);