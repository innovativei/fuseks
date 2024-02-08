(function($) {
    $(document).ready(function() {

        allSliders();
        mobileNav();

        //smoothScroll();
    });

    function mobileNav() {
        var trigger = $('#mobile-menu-trigger'),
            menu    = $('#mobile-menu');

        $(trigger).click(function() {
            if ($(menu).hasClass('open')) {
                killMobileMenu();
            } else {
                $(menu).toggleClass('open');
                $(trigger).toggleClass('open');
                $('body').toggleClass('overflow-hidden');
            }
        });

        $(window).on("resize",function(){
            if (window.innerWidth >= 992) {
                killMobileMenu();
            }
        });

        var flyoutTrigger   = $('#mobile-menu li.flyout .flyout-trigger'),
            flyoutPanel     = $(flyoutTrigger).siblings('.flyout-wrapper'),
            mainMenuNav     = $(menu).children('nav'),
            flyoutReturn    = $(flyoutPanel).children('.flyout-return');

        $(flyoutTrigger).click(function() {
            $(this).siblings('.flyout-wrapper').removeClass('invisible');
            $(mainMenuNav).addClass('off-screen');
        });

        $(flyoutReturn).click(function() {
            $(mainMenuNav).removeClass('off-screen');
            $(this).parent('.flyout-wrapper').addClass('invisible');
        });

        function killMobileMenu() {
            $(menu).removeClass('open');
            $(trigger).removeClass('open');
            $('body').removeClass('overflow-hidden');
            $(flyoutPanel).addClass('invisible');
            $(mainMenuNav).removeClass('off-screen');
        }
    }

    function allSliders() {
        var allSliders = $('.slider-hand-arrows');

        $(allSliders).each(function() {
            var prevArrow   = $(this).siblings('.hand-arrows').children('.arrow.prev'),
                nextArrow   = $(this).siblings('.hand-arrows').children('.arrow.next'),
                appendDots  = $(this).siblings('.slider-dots');

            if ($(this).data('autoplay')) {
                var autoplay = true;
            } else {
                var autoplay = false;
            }

            if ($(this).data('show')) {
                var slidesToShow = $(this).data('show');
            } else {
                var slidesToShow = 1;
            }

            if ($(this).data('scroll')) {
                var slidesToScroll = $(this).data('scroll');
            } else {
                var slidesToScroll = 1;
            }

            if ($(this).data('fade')) {
                var fade = true;
            } else {
                var fade = false;
            }

            if ($(this).data('autospeed')) {
                var autoplaySpeed = $(this).data('autospeed');
            } else {
                var autoplaySpeed = 3000;
            }

            if ($(this).data('adaptiveheight')) {
                var adaptiveHeight = true;
            } else {
                var adaptiveHeight = false;
            }

            if ($(this).data('responsive-mobile')) {
                var adaptiveHeight = true;
            } else {
                var adaptiveHeight = false;
            }

            $(this).slick({
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                autoplay: autoplay,
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll,
                fade: fade,
                autoplaySpeed: autoplaySpeed,
                adaptiveHeight: adaptiveHeight,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            dots: true,
                            appendDots: appendDots,
                        }
                    }
                ]
            });
        });
    }

    /*

    function smoothScroll() {
        $('a[href*="#"]')
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
        });
    }

    function customSelect() {
        $('select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;
            $this.addClass('select-hidden'); 
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled" tabindex="0"></div>');

            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val(),
                    class: $this.children('option').eq(i).attr("class"),
                    tabindex: "0"
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function(e) {
                e.stopPropagation();
                $('div.select-styled.active').not(this).each(function(){
                    $(this).removeClass('active').siblings('ul.select-options').slideToggle(200).removeClass('open');
                });
                $(this).toggleClass('active').siblings('ul.select-options').slideToggle(200).toggleClass('open');
            });

            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel')).change();
                $list.slideUp(200).removeClass('open');
            });

            $(document).click(function() {
                $styledSelect.removeClass('active');
                $list.slideUp(200).removeClass('open');
            });
        });
    }
    */

})( jQuery )
