<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="all-brands">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white py-3">
        <div class="container">
            <div class="row">
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
                    <div class="featured-brand">
                        <?php

                        // Check if there is a featured brand set and parse.
                        $featured_brand_id = get_field('featured_brand');
                        if($featured_brand_id):
                            foreach($featured_brand_id as $feat_brand):
                                $featured_brand_info['name'] = get_the_title($feat_brand);
                                $featured_brand_info['link'] = get_the_permalink($feat_brand);
                                if(get_field('logo_type', $feat_brand) == 'image') {
                                    $featured_brand_info['logo'] = get_field('logo', $feat_brand);
                                }elseif(get_field('logo_type', $feat_brand) == 'link'){
                                    $featured_brand_info['logo'] = get_field('logo_link', $feat_brand);
                                }
                                $featured_brand_info['locs'] = get_field('associated_locations', $feat_brand);
                            endforeach;

                            echo '<h1 class="black">Monthly Featured Brand</h1>';

                            $featured_brand_image_classes = 'd-flex justify-content-center bg-cream white-frame drop-shadow inset-shadow mb-2';
                            if($featured_brand_image = get_field('featured_brand_image')):
                                $featured_brand_image_classes .= '';
                            else:
                                $featured_brand_image_classes .= ' p-3';
                            endif;
                            ?>

                            <a href="<?php echo $featured_brand_info['link']; ?>" class="<?php echo $featured_brand_image_classes; ?>">
                                <?php
                                $featured_brand_image_output    = '<img src="';

                                if($featured_brand_image = get_field('featured_brand_image')):
                                    $featured_brand_image_output   .= $featured_brand_image;
                                else:
                                    $featured_brand_image_output   .= $featured_brand_info['logo'];
                                endif;

                                $featured_brand_image_output   .= '" alt="';
                                $featured_brand_image_output   .= $featured_brand_info['name'];
                                $featured_brand_image_output   .= '" class="img-fluid">';
                                echo $featured_brand_image_output;
                                ?>
                            </a>

                            <h3 class="black mb-0">
                                <a href="<?php echo $featured_brand_info['link']; ?>">
                                    <?php
                                    echo $featured_brand_info['name'];
                                    ?>
                                </a>
                            </h3>

                            <?php
                            // Find locations, link, and display
                            if($featured_brand_info['locs']):
                                echo '<p class="black">Avaliable at: ';
                                foreach($featured_brand_info['locs'] as $key => $location):
                                    $featured_brand_location_link   = get_the_permalink($location);
                                    $featured_brand_location_title  = get_the_title($location);

                                    echo '<a href="';
                                    echo $featured_brand_location_link;
                                    echo '">Fusek\'s ';
                                    echo $featured_brand_location_title;
                                    echo '</a>';

                                    if ($key === array_key_last($featured_brand_info['locs'])):
                                        echo '.';
                                    else:
                                        echo ', ';
                                    endif;
                                endforeach;
                                echo '</p>';
                            endif;
                        endif;
                        ?>
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
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    );

    $brands_query = new WP_Query($brand_args);

    if($brands_query->have_posts()):
        while($brands_query->have_posts()):
            $brands_query->the_post();

            $brand_hopper[$i]['name']   = get_the_title();
            $brand_hopper[$i]['link']   = get_the_permalink();
            if(get_field('logo_type') == 'image') {
                $brand_hopper[$i]['logo'] = get_field('logo');
            }elseif(get_field('logo_type') == 'link'){
                $brand_hopper[$i]['logo'] = get_field('logo_link');
            }
            $brand_hopper[$i]['locs']   = get_field('associated_locations');
            $i++;
        endwhile;
        wp_reset_postdata();
    endif;

    // Reset
    unset($i);

    function build_brand_block($brand) {
        $brand_locations = '';
        foreach($brand['locs'] as $key => $location):
            $brand_locations .= $location;
            if (!($key === array_key_last($brand['locs']))):
                $brand_locations .= '|';
            endif;
        endforeach;
        ?>
        <div class="col-6 col-sm-4 col-lg-3 mb-3 brand" data-locs="<?php echo $brand_locations; ?>">
            <a href="<?php echo $brand['link']; ?>" class="d-flex justify-content-center align-items-center w-100 p-2 p-sm-0">
                <img src="<?php echo $brand['logo']; ?>" class="img-fluid" alt="<?php echo $brand['name']; ?>">
            </a>
        </div>
        <?php
    }

    if(!empty($brand_hopper)):
        ?>
        <section id="brand-filter-bar" class="bg-cream py-3">
            <div class="container d-sm-flex align-items-sm-center">
                <h1 class="black d-block d-sm-inline-block mb-sm-0">Our Brands</h1>

                <?php
                $location_args = array(
                    'post_type' => 'locations',
                    'posts_per_page' => -1,
                    'orderby' => 'ID',
                    'order' => 'ASC',
                );

                $location_query = new WP_Query($location_args);

                if($location_query->have_posts()):
                    ?>
                    <div id="filter-dropdown">
                        <i class="fa-solid fa-sort-down"></i>
                        <div class="placeholder">Filter By Store</div>
                        <div class="options">
                            <?php
                            $reset_filter_args = '';
                            while($location_query->have_posts()):
                                $location_query->the_post();
                                $location_id    = get_the_ID();
                                $location_name  = get_the_title();
                                $reset_filter_args .= $location_id . '|';
                                ?>
                                <div class="location" data-filter-arg="<?php echo $location_id; ?>">
                                    <?php echo $location_name; ?>
                                </div>
                                <?php
                            endwhile;
                            $reset_filter_args = substr($reset_filter_args, 0 , -1);
                            wp_reset_postdata();
                            ?>
                            <div class="location reset" data-filter-arg="<?php echo $reset_filter_args; ?>">Reset Filter</div>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </section>

        <section id="brand-hopper" class="bg-white py-3">
            <div class="container-md">
                <div class="row justify-content-center">
                    <?php
                    foreach($brand_hopper as $brand):
                        build_brand_block($brand);
                    endforeach;
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>
</div>

<?php get_footer(); ?>