<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="service">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white pt-3 pb-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col-md-6">
                    <?php
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
                            <a href="<?php the_field('shop_online_link'); ?>" class="button">Shop Online</a>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if($service_image = get_field('service_image')):
                        ?>
                        <div class="drop-shadow white-frame inset-shadow mb-3">
                            <img src="<?php echo $service_image['url']; ?>" alt="<?php the_title(); ?>" class="img-fluid">
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include(get_stylesheet_directory() . '/parts/testimonials.php'); ?>
</div>

<?php get_footer(); ?>
