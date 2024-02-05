<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="home">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section id="order-now" class="py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 rel">
                    <img src="<?php bloginfo('template_directory'); ?>/img/service-man.png" class="service-man img-fluid">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="header">Need It Fast?</div>
                    <div class="subheader">Get FREE same-day PICKUP or DELIVERY on all in stock items &mdash; NO EXCEPTIONS!!</div>
                    <p class="white">Available at both lcoations</p>
                    <div class="buttons mb-0">
                        <a href="#" class="button mb-0">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="featured-brands" class="bg-cream pt-4 pb-3">
        <div class="gen-wrapper">
            <div class="container">
                <h1 class="black">Featured Brands</h1>
            </div>
        </div>
        <div class="container">
            <div class="slider-wrapper">
                <div 
                    class="slider-hand-arrows" 
                    data-autoplay="true" 
                    data-show="4" 
                    data-scroll="4"
                >
                    <?php
                    $i = 0;
                    while($i < 8) {
                        ?>
                        <div>
                            <a href="#" target="_blank" class="d-block">
                                <img src="https://picsum.photos/400/400?random=<?php echo $i; ?>" class="img-fluid">
                            </a>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
                <div class="hand-arrows">
                    <div class="arrow prev"></div>
                    <div class="arrow next"></div>
                </div>
            </div>
            <div class="buttons mb-0 text-center">
                <a href="#" target="_blank" class="button mb-0">View All Brands</a>
            </div>
        </div>
    </section>

    <section id="bargain" class="bg-white py-4">
        <div class="gen-wrapper">
            <div class="container">
                <h1 class="black">Bargain of the Month</h1>
            </div>
        </div>
        <div class="mb-4">
            <div class="container">
                <div class="slider-wrapper">
                    <div class="shadow top"></div>
                    <div class="shadow bottom"></div>
                    <div class="shadow left"></div>
                    <div class="shadow right"></div>
                    <div class="corner tl"></div>
                    <div class="corner tr"></div>
                    <div class="corner bl"></div>
                    <div class="corner br"></div>
                    <div class="slider-hand-arrows drop-shadow white-frame">
                        <?php
                        $i = 0;
                        while($i < 3) {
                            ?>
                            <div>
                                <div class="">
                                    <a href="#" target="_blank" class="d-block">
                                        <img src="https://picsum.photos/1110/614?random=<?php echo $i; ?>" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="hand-arrows">
                        <div class="arrow prev"></div>
                        <div class="arrow next"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gen-wrapper">
            <div class="container">
                <h1 class="black mb-0">Fusek's Dog Of The Week</h1>
                <h2 class="red">#FuseksDOTW</h2>
                <div class="drop-shadow inset-shadow white-frame mb-2">
                    <img src="https://picsum.photos/1110/614?random=<?php echo rand(); ?>" alt="" class="img-fluid">
                </div>
                <p class="black mb-0">Bosco and his owner John had a blast picking out paint at our downtown location!</p>
            </div>
        </div>
    </section>

    <section id="about" class="bg-green rel pt-4">
        <div class="gen-wrapper">
            <div class="container">
                <h1 class="white mb-0">Our Story</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-11">
                                <p class="white">Short blurb that cements the local, family-owned, and trustworty elements of the Fusek's True Value brand story. Short blurb that cements the local, family-owned, and trustworty elements of the Fusek's True Value brand story.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="buttons">
                                    <a href="#" class="button">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="white-frame inset-shadow drop-shadow mb-3">
                                    <img src="https://picsum.photos/800/800?random=<?php echo rand(); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-end">
                        <div class="white-frame drop-shadow inset-shadow mb-3">
                            <img src="https://picsum.photos/800/800?random=<?php echo rand(); ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-md-6">
                        <div class="white-frame drop-shadow inset-shadow">
                            <img src="https://picsum.photos/800/400?random=<?php echo rand(); ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="icons d-flex justify-content-center">
            <div class="icon" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/icon-brush.png);"></div>
            <div class="icon" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/icon-plug.png)";></div>
            <div class="icon" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/icon-wrench.png);"></div>
        </div>
    </section>

    <section id="testimonial" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="black text-center my-3">"Fusek's hardware is a very convenient location for people in the downtown area. They have competitive prices and competent emplyees. I am very well treated and always welcome to shop at my leisure or just visit to see what is new or on sale."</h2>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <h2 class="black mb-0">&mdash;&nbsp;Clayton P.</h2>
                    <div class="d-flex">
                        <h2 class="black"><span>&mdash;&nbsp;</span></h2>
                        <h3 class="black mb-0">Customer since 2018</h3>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
