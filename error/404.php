<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="error">
    <section class="error-banner bg-dark-green py-md-2 py-3">
        <div class="error-man d-none d-md-block" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/error-man.png);"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 offset-xs-0 offset-md-3">
                    <h1 class="white mb-1 mb-md-0 text-center text-md-left">404 Error</h1>
                    <h2 class="white mb-0 mb-md-1 mb-lg-1 text-center text-md-left">We cannot find that in our toolbox!</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white pt-lg-5 pt-md-4 pt-3 pb-5">
        <div class="container">
            <h1 class="black">Looking for Store Locations?</h1>
            <?php include(get_stylesheet_directory() . '/parts/store-select.php'); ?>

            <h1 class="black mt-3">These items may also be helpful to you.</h1>
            <div class="row">
                <div class="col-md-4">
                    <a href="/brands" class="d-block white-frame drop-shadow inset-shadow mb-1">
                        <img src="<?php the_field('brands_image', 'options'); ?>" alt="Our Brands" class="img-fluid">
                    </a>
                    <a href="/brands" class="mb-3">
                        <h2 class="black text-center">Our Brands</h2>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/services" class="d-block white-frame drop-shadow inset-shadow mb-1">
                        <img src="<?php the_field('services_image', 'options'); ?>" alt="Our Services" class="img-fluid">
                    </a>
                    <a href="/services" class="mb-3">
                        <h2 class="black text-center">Our Services</h2>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/about" class="d-block white-frame drop-shadow inset-shadow mb-1">
                        <img src="<?php the_field('our_story_image', 'options'); ?>" alt="Our Story" class="img-fluid">
                    </a>
                    <a href="/about" class="mb-3">
                        <h2 class="black text-center">Our Story</h2>
                    </a>
                </div>
            </div>
    </section>
</div>
<?php get_footer(); ?>
