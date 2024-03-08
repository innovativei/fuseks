<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="location">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white pt-3 pb-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col-md-5">
                    <h1 class="black mb-0">Fusek's True Value <?php the_title(); ?></h1>
                    <?php
                    if(get_field('address')):
                        ?>
                        <p><?php the_field('address'); ?></p>
                        <?php
                    endif;
                    if(get_field('get_directions_link')):
                        ?>
                        <p class="get-directions black">
                            <a href="<?php the_field('get_directions_link'); ?>" target="_blank">Get Directions<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </p>
                        <?php
                    endif;
                    if(get_field('phone')):
                        ?>
                        <p>
                            <strong>Phone:</strong>
                            <br />
                            <?php the_field('phone'); ?>
                        </p>
                        <?php
                    endif;
                    if(get_field('hours')):
                        ?>
                        <p class="mb-0">
                            <strong>Store Hours:</strong>
                        </p>
                        <table class="hours mb-3 mb-lg-0">
                            <?php
                            while(have_rows('hours')):
                                the_row();
                                ?>
                                <tr>
                                    <td><?php the_sub_field('day'); ?></td>
                                    <td><?php the_sub_field('open_hours'); ?></td>
                                </tr>
                                <?php
                            endwhile;
                            ?>
                        </table>
                        <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <?php
                    if($location_image = get_field('location_image')):
                        ?>
                        <div class="drop-shadow white-frame inset-shadow mb-3">
                            <img src="<?php echo $location_image['url']; ?>" alt="<?php the_title(); ?>" class="img-fluid">
                        </div>
                        <?php
                    endif;
                    if($map = get_field('map')):
                        ?>
                        <div class="drop-shadow white-frame inset-shadow">
                            <div class="acf-map">
                                <div class="marker" data-lat="<?php echo esc_attr($map['lat']); ?>" data-lng="<?php echo esc_attr($map['lng']); ?>"></div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
            <?php

            //Get post info
            $current_post = get_post();
            $current_post_id = get_queried_object_id();

            $brand_hopper   = array();
            $i = 0;

            // Query all brands and parse all info
            $brand_args = array(
                'post_type' => 'brands',
                'posts_per_page' => -1,
            );

            $brand_query = new WP_Query($brand_args);

            if($brand_query->have_posts()):
                $current_location = array();
                while($brand_query->have_posts()):
                    $brand_query->the_post();

                    $locations  = get_field('associated_locations');
                    if($locations):
                        foreach ($locations as $location) {
                            if (
                                isset($location) && 
                                $location === $current_post_id
                            ) {
                                $brand_name = get_field('brand_name');
                                $logo       = get_field('logo');
                                if(get_field('logo_type') == 'image') {
                                    $logo = get_field('logo');
                                }elseif(get_field('logo_type') == 'link'){
                                    $logo = get_field('logo_link');
                                }
                                //$permalink  = get_permalink();

                                $brand_hopper[$i] = array(
                                    'brand_name'    => $brand_name,
                                    'logo'          => $logo,
                                    //'permalink'     => $permalink,
                                );
                            }
                            $i++;
                        }
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;

            // Reset and shuffle
            unset($i);
            $brand_hopper = array_values($brand_hopper);
            shuffle($brand_hopper);

            function build_brand_slide($brand) {
                ?>
                <div>
                    <!--
                    <a href="<?php echo $brand['permalink']; ?>" target="_blank" class="d-block">
                    -->
                        <img src="<?php echo $brand['logo']; ?>" class="img-fluid" alt="<?php echo $brand['brand_name']; ?>">
                    <!--
                    </a>
                    -->
                </div>
                <?php
            }

            if(!empty($brand_hopper)):
                ?>
                <h1 class="black mb-0">Brands You'll Find Here</h1>
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
                <?php
            endif;

            $team_hopper    = array();
            $i = 0;

            // Query all team members and parse all info
            $team_args = array(
                'post_type' => 'team-member',
                'posts_per_page' => -1,
            );

            $team_query = new WP_Query($team_args);

            if($team_query->have_posts()):
                $current_location = array();
                while($team_query->have_posts()):
                    $team_query->the_post();

                    $locations  = get_field('associated_locations');
                    if($locations):
                        foreach ($locations as $location) {
                            if (
                                isset($location) && 
                                $location === $current_post_id
                            ) {
                                $first_name = get_field('first_name');
                                $last_name  = get_field('last_name');
                                $photo      = get_field('photo');
                                $caption    = get_field('caption');

                                $team_hopper[$i] = array(
                                    'first_name'    => $first_name,
                                    'last_name'     => $last_name,
                                    'photo'         => $photo,
                                    'caption'       => $caption,
                                );
                            }
                            $i++;
                        }
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;

            // Reset and shuffle
            unset($i);
            $team_hopper = array_values($team_hopper);
            shuffle($team_hopper);

            function build_team_member_slide($team_member) {
                ?>
                <div>
                    <img src="<?php echo $team_member['photo']; ?>" class="white-frame drop-shadow inset-shadow img-fluid" alt=" <?php echo $team_member['first_name'] . ' ' . $team_member['last_name']; ?>">
                    <p class="text-center mb-0">
                        <strong>
                            <?php echo $team_member['first_name'] . ' ' . $team_member['last_name']; ?>
                        </strong>
                        <br><?php echo $team_member['caption']; ?>
                    </p>
                </div>
                <?php
            }

            if(!empty($team_hopper)):
                ?>
                <h1 class="black">The Fusek's <?php the_title(); ?> Team</h1>
                <div class="slider-wrapper d-none d-md-block mb-3">
                    <div 
                        class="slider-hand-arrows team" 
                        data-autoplay="true" 
                        data-show="4" 
                        data-scroll="4"
                    >
                        <?php
                        foreach($team_hopper as $team_member):
                            build_team_member_slide($team_member);
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
                        class="slider-hand-arrows" 
                        data-autoplay="true" 
                        data-show="2" 
                        data-scroll="2"
                    >
                        <?php
                        foreach($team_hopper as $team_member):
                            build_team_member_slide($team_member);
                        endforeach;
                        ?>
                    </div>
                    <div class="mobile-controls d-flex justify-content-center align-items-center d-lg-none">
                        <div class="arrow-sm prev"></div>
                        <div class="slider-dots"></div>
                        <div class="arrow-sm next"></div>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
    </section>
    <?php include(get_stylesheet_directory() . '/parts/testimonials.php'); ?>
</div>

<?php get_footer(); ?>