<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="archive-services" class="bg-white">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <?php
    $service_hopper   = array();
    $i = 0;

    // Query all brands and parse all info
    $services_args = array(
        'post_type' => 'services',
        'posts_per_page' => -1,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    );

    $services_query = new WP_Query($services_args);

    if($services_query->have_posts()):
        while($services_query->have_posts()):
            $services_query->the_post();

            $service_image_array = get_field('service_image');

            $service_hopper[$i]['service_name']         = get_the_title();
            $service_hopper[$i]['service_image']        = $service_image_array['url'];
            $service_hopper[$i]['permalink']            = get_permalink();
            $i++;
        endwhile;
        wp_reset_postdata();
    endif;

    // Reset
    unset($i);

    function build_service_block($service) {
        ?>
        <div class="col-lg-4 col-sm-6">
            <a href="<?php echo $service['permalink']; ?>" class="d-block white-frame drop-shadow inset-shadow img-link">
                <img src="<?php echo $service['service_image']; ?>" class="img-fluid" alt="<?php echo $service['service_name']; ?>">
            </a>
            <h2 class="black text-center mb-4">
                <a href="<?php echo $service['permalink']; ?>" class="d-block pt-1">
                    <?php echo $service['service_name']; ?>
                </a>
            </h2>
        </div>
        <?php
    }

    if(!empty($service_hopper)):
        ?>
        <div class="container pt-5 pb-3 py-lg-5">
            <div class="row justify-content-center">
                <?php
                foreach($service_hopper as $service):
                    build_service_block($service);
                endforeach;
                ?>
            </div>
        </div>
        <?php
    endif;
    ?>

    <?php include(get_stylesheet_directory() . '/parts/shop-online-van.php'); ?>

</div>

<?php get_footer(); ?>