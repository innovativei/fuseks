<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="contact">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white py-5">
        <div class="container">
            <?php
            if(get_field('intro_headline')):
                ?>
                <h2 class="black">
                    <?php the_field('intro_headline'); ?>
                </h2>
                <?php
            endif;
            if(get_field('intro_information')):
                the_field('intro_information');
            endif;
            ?>
            <h1 class="black">Store Locations</h1>
            <?php include(get_stylesheet_directory() . '/parts/store-select.php'); ?>
        </div>
    </section>

    <?php include(get_stylesheet_directory() . '/parts/get-social.php'); ?>

</div>

<?php get_footer(); ?>
