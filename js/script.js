(function($) {
    $(document).ready(function() {

        // All Brands Page Filter Closer
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#all-brands #filter-dropdown.open').length) {
                $('#all-brands #filter-dropdown').removeClass('open').children('.options').slideUp();
            }
        });

        mobileNav();
        navParentHighlighter();
        allSliders();
        brandFilter();
        careerFlipBoxes();
        smoothScroll();

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

    function navParentHighlighter() {
        var highlightedDDmenuItem = $('nav .dropdown-wrapper li.highlight');
        if(highlightedDDmenuItem.hasClass('highlight')) {
            var parentDDWrapper = highlightedDDmenuItem.closest('.dropdown-wrapper');
            parentDDWrapper.siblings('a').addClass('highlight');
        }
    }

    function allSliders() {
        var allSliders = $('.slider-hand-arrows');

        $(allSliders).each(function() {
            var prevArrow       = $(this).siblings('.hand-arrows').children('.arrow.prev'),
                nextArrow       = $(this).siblings('.hand-arrows').children('.arrow.next'),
                appendDots      = $(this).siblings('.mobile-controls').children('.slider-dots'),
                prevArrowMobile = $(this).siblings('.mobile-controls').children('.arrow-sm.prev'),
                nextArrowMobile = $(this).siblings('.mobile-controls').children('.arrow-sm.next');

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
                            prevArrow: prevArrowMobile,
                            nextArrow: nextArrowMobile
                        }
                    }
                ]
            });
        });
    }

    function brandFilter() {
        var filterDropdown      = $('#all-brands #filter-dropdown'),
            filterPlaceholder   = $('#all-brands #filter-dropdown .placeholder'),
            filterOption        = $('#all-brands #filter-dropdown .options .location'),
            resetFilter         = $('#all-brands #filter-dropdown .reset'),
            allBrands           = $('#brand-hopper .brand');

        $(filterDropdown).click(function() {
            $(this).toggleClass('open').children('.options').slideToggle();
        });

        $(filterOption).click(function() {
            $(this).addClass('selected');
            var locationID      = $(this).data('filter-arg'),
                locationName    = $(this).text();

            $(filterPlaceholder).text(locationName);

            $(allBrands).each(function() {
                $(this).addClass('d-none');
                var brandLocs       = $(this).data('locs');
                var brandLocs       = brandLocs + '';
                var brandLocArray   = brandLocs.split('|');

                for (let i = 0; i < brandLocArray.length; i++) {
                    if (brandLocArray[i] == locationID) {
                        $(this).removeClass('d-none');
                    }
                }
            });
        });

        $(resetFilter).click(function() {
            $(allBrands).removeClass('d-none');
            $(filterPlaceholder).text('Filter By Store');
        });
    }

    function careerFlipBoxes() {
        var mobileFlip = $('#careers .flip-box-wrapper.mobile');

        $(mobileFlip).click(function() {
            $(this).toggleClass('flipped');
            console.log ('Flipped!');
        });
    }

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

})( jQuery )
