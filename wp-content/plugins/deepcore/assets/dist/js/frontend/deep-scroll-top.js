!function(n){jQuery(document).ready(function(){jQuery(window).on("scroll",function(){100<jQuery(this).scrollTop()?jQuery(".scrollup").fadeIn():jQuery(".scrollup").fadeOut()}),jQuery(".scrollup").on("click",function(){return jQuery("html, body").animate({scrollTop:0},700),!1}),jQuery(function(){jQuery(".wn-smoothscroll-a").on("click",function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=jQuery(this.hash);if((e=e.length?e:jQuery("[name="+this.hash.slice(1)+"]")).length)return jQuery("html,body").animate({scrollTop:e.offset().top},700),!1}}),n('.nav > li > a[href*="#"]:not([href="#"]),.responav > li > a[href*="#"]:not([href="#"])').on("click",function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=n(this.hash);if((e=e.length?e:n("[name="+this.hash.slice(1)+"]")).length)return n("html, body").animate({scrollTop:e.offset().top},700),!1}})})})}(jQuery);