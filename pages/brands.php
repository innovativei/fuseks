<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="brand">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white pt-3 pb-5">
        <div class="container">
            <?php
            if(get_field('video')):
                ?>
                <video controls="controls" class="my-3">
                    <source src="<?php the_field('video'); ?>">
                </video>
                <?php
            endif;
            if(get_field('headline')):
                ?>
                <h2 class="black">
                    <?php the_field('headline'); ?>
                </h2>
                <?php
            endif;
            if(get_field('information')):
                the_field('information');
            endif;
            if(get_field('shop_online_link')):
                ?>
                <div class="buttons">
                    <a href="<?php the_field('shop_online_link'); ?>" class="button">Shop <?php the_field('brand_name'); ?> Online</a>
                </div>
                <?php
            endif;
            ?>
        </div>
    </section>
    <?php include(get_stylesheet_directory() . '/parts/testimonials.php'); ?>
</div>

<?php get_footer(); ?>
