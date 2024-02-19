<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="home">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section id="order-now" class="py-3">
        <div class="container-md">
            <div class="row justify-content-center">
                <div class="col-sm-3 rel">
                    <img src="<?php bloginfo('template_directory'); ?>/img/service-man.png" class="service-man img-fluid d-none d-sm-block">
                </div>
                <div class="col-lg-6 col-md-8 col-sm-9 d-flex flex-column justify-content-center">
                    <div class="header text-center text-sm-left">Need It Fast?</div>
                    <div class="subheader text-center text-sm-left">Get FREE same-day PICKUP or DELIVERY on all in stock items &mdash; NO EXCEPTIONS!!</div>
                    <p class="white text-center text-sm-left">Available at both lcoations</p>
                    <div class="buttons text-center text-sm-left mb-0">
                        <a href="#" class="button mb-0">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    $brand_hopper   = array();
    $i = 0;

    // Query all brands and parse all info
    $brand_args = array(
        'post_type' => 'brands',
        'posts_per_page' => -1,
    );

    $brand_query = new WP_Query($brand_args);

    if($brand_query->have_posts()):
        while($brand_query->have_posts()):
            $brand_query->the_post();

            $brand_hopper[$i]['brand_name'] = get_field('brand_name');
            $brand_hopper[$i]['logo']       = get_field('logo');
            $brand_hopper[$i]['permalink']  = get_permalink();
            $i++;
        endwhile;
        wp_reset_postdata();
    endif;

    // Reset and shuffle
    unset($i);
    shuffle($brand_hopper);

    function build_brand_slide($brand) {
        ?>
        <div>
            <a href="<?php echo $brand['permalink']; ?>" target="_blank" class="d-block">
                <img src="<?php echo $brand['logo']; ?>" class="img-fluid" alt="<?php echo $brand['brand_name']; ?>">
            </a>
        </div>
        <?php
    }

    if(!empty($brand_hopper)):
        ?>
        <section id="featured-brands" class="bg-cream pt-4 pb-3">
            <div class="gen-wrapper">
                <div class="container">
                    <h1 class="black mb-0">Featured Brands</h1>
                </div>
            </div>
            <div class="container">
                <div class="slider-wrapper d-none d-md-block mb-3">
                    <div 
                        class="slider-hand-arrows brand" 
                        data-autoplay="true" 
                        data-show="4" 
                        data-scroll="4"
                    >
                        <?php
                        foreach($brand_hopper as $brand):
                            build_brand_slide($brand);
                        endforeach;
                        ?>
                    </div>
                    <div class="hand-arrows d-none d-lg-block">
                        <div class="arrow prev"></div>
                        <div class="arrow next"></div>
                    </div>
                    <div class="mobile-controls d-flex justify-content-center align-items-center d-lg-none">
                        <div class="arrow-sm prev"></div>
                        <div class="slider-dots"></div>
                        <div class="arrow-sm next"></div>
                    </div>
                </div>
                <div class="slider-wrapper d-block d-md-none">
                    <div 
                        class="slider-hand-arrows brand" 
                        data-autoplay="true" 
                        data-show="2" 
                        data-scroll="2"
                    >
                        <?php
                        foreach($brand_hopper as $brand):
                            build_brand_slide($brand);
                        endforeach;
                        ?>
                    </div>
                    <div class="mobile-controls d-flex justify-content-center align-items-center d-lg-none">
                        <div class="arrow-sm prev"></div>
                        <div class="slider-dots"></div>
                        <div class="arrow-sm next"></div>
                    </div>
                </div>
                <div class="buttons mb-0 text-center">
                    <a href="/brands" target="_blank" class="button mb-0">View All Brands</a>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>

    <?php
    if(
        have_rows('bargains') ||
        get_field('dog_photo')
    ):
        ?>
        <section id="bargain" class="bg-white py-4">
            <?php
            if(have_rows('bargains')):
                ?>
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
                            <div class="slider-hand-arrows drop-shadow white-frame"
                                data-autoplay="true"
                            >
                                <?php
                                while(have_rows('bargains')):
                                    the_row();
                                    $image = get_sub_field('image');

                                    if($link = get_sub_field('link')):
                                        ?>
                                        <div class="linked-image">
                                            <a href="<?php echo $link; ?>" target="_blank" style="background-image: url(<?php echo $image; ?>);"></a>
                                        </div>
                                        <?php
                                    else:
                                        ?>
                                        <div class="static" style="background-image: url(<?php echo $image; ?>);"></div>
                                        <?php
                                    endif;
                                endwhile;
                                ?>
                            </div>
                            <div class="hand-arrows d-none d-lg-block">
                                <div class="arrow prev"></div>
                                <div class="arrow next"></div>
                            </div>
                            <div class="mobile-controls d-flex justify-content-center align-items-center d-lg-none">
                                <div class="arrow-sm prev"></div>
                                <div class="slider-dots"></div>
                                <div class="arrow-sm next"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endif;

            if($dotw = get_field('dog_photo')):
                ?>
                <div class="gen-wrapper">
                    <div class="container">
                        <h1 class="black mb-0">Fusek's Dog Of The Week</h1>
                        <h2 class="red">#FuseksDOTW</h2>
                        <div class="drop-shadow inset-shadow white-frame mb-2">
                            <img src="<?php echo $dotw; ?>" alt="Dog of the Week" class="img-fluid">
                        </div>
                        <?php
                        if($dog_caption = get_field('dog_caption')):
                            ?>
                            <p class="black mb-0"><?php echo $dog_caption; ?></p>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </section>
        <?php
    endif;
    ?>

    <?php
    if(
        get_field('intro_paragraph') &&
        have_rows('square_images') &&
        get_field('rectangular_image')
    ):
        $square_images = array();
        $i = 1;
        while(have_rows('square_images')):
            the_row();
            $square_images[$i] = get_sub_field('square_image');
            $i++;
        endwhile;
        unset($i);
        ?>
        <section id="about" class="bg-green rel pt-4">
            <div class="gen-wrapper">
                <div class="container">
                    <h1 class="white mb-0">Our Story</h1>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-11">
                                    <p class="white"><?php the_field('intro_paragraph'); ?>.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="buttons">
                                        <a href="/about" class="button">Read More</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-lg-block">
                                    <div class="white-frame inset-shadow drop-shadow mb-3">
                                        <img src="<?php echo $square_images[1]; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-flex align-items-end">
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $square_images[2]; ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end d-none d-lg-flex">
                        <div class="col-md-6">
                            <div class="white-frame drop-shadow inset-shadow">
                                <img src="<?php the_field('rectangular_image'); ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row d-lg-none">
                        <div class="col-sm-6">
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $square_images[1]; ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $square_images[2]; ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>

    <?php include(get_stylesheet_directory() . '/parts/testimonials.php'); ?>
</div>

<?php get_footer(); ?>
