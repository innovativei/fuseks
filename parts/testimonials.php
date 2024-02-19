<?php

// Query all testimonials and parse all info
$args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => -1,
);

$testimonials_query = new WP_Query($args);
$hopper         =
$location_ids   =
$service_ids    = array();
$i = 0;

if($testimonials_query->have_posts()):
    while($testimonials_query->have_posts()):
        $testimonials_query->the_post();

        $testimonial_type       =
        $testimonial            =
        $reviewer_name          =
        $reviewer_info          =
        $video_testimonial_type =
        $vid                    =
        $home                   =
        $about                  =
        $locations              =
        $services               = '';

        $testimonial_type = get_field('testimonial_type');

        if($testimonial_type == 'text'):
            if(have_rows('text_testimonial')):
                while(have_rows('text_testimonial')):
                    the_row();
                    $testimonial = get_sub_field('testimonial');
                    $reviewer_name = get_sub_field('reviewer_name');
                    $reviewer_info = get_sub_field('reviewer_info');
                endwhile;
            endif;
        elseif($testimonial_type == 'video'):
            if(have_rows('video_testimonial')):
                while(have_rows('video_testimonial')):
                    the_row();
                    $video_testimonial_type = get_sub_field('video_testimonial_type');
                    if($video_testimonial_type == 'youtube'):
                        $vid = get_sub_field('youtube_video_share_link');
                    elseif($video_testimonial_type == 'vimeo'):
                        $vid = get_sub_field('vimeo_video_share_link');
                    endif;
                endwhile;
            endif;
        endif;
        if(have_rows('display_pages')):
            while(have_rows('display_pages')):
                the_row();
                if(get_sub_field('home_toggle')):
                    $home = TRUE;
                endif;
                if(get_sub_field('about_toggle')):
                    $about = TRUE;
                endif;
            endwhile;
        endif;
        $hopper[$i] = array(
            'type'          => $testimonial_type,
            'text'          => array(
                'testimonial'   => $testimonial,
                'name'          => $reviewer_name,
                'info'          => $reviewer_info,
            ),
            'video'         => array(
                'format'        => $video_testimonial_type,
                'share'         => $vid,
            ),
            'display'       => array (
                'pages'         => array(
                    'home'          => $home,
                    'about'         => $about,
                ),
                'locations' => array (
                ),
                'services'  => array(
                ),
            ),
        );
        if(have_rows('display_pages')):
            while(have_rows('display_pages')):
                the_row();
                $locations = get_sub_field('locations_rel');
                if($locations):
                    foreach($locations as $location):
                        array_push($hopper[$i]['display']['locations'], $location);
                    endforeach;
                endif;
                $services = get_sub_field('services_rel');
                if($services):
                    foreach($services as $service):
                        array_push($hopper[$i]['display']['services'], $service);
                    endforeach;
                endif;
            endwhile;
        endif;

        $i++;
    endwhile;
    wp_reset_postdata();
endif;
unset($i);

$is_slider = FALSE;

function test_and_construct_single_testimonial($single_testimonial, $is_slider, $slider_prepend = '',
$slider_append  = '') {
    // Check to see if this construct is for the slider, if so, ouput opening div
    if($is_slider) {
        $slider_prepend = '<div>';
        $slider_append  = '</div>';
    }
    echo $slider_prepend;

    // Check testimonial type and output correct structure
    if($single_testimonial['type'] == 'text'):
        $quote  = $single_testimonial['text']['testimonial'];
        $name   = $single_testimonial['text']['name'];
        $info   = $single_testimonial['text']['info'];

        ?>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2 class="black text-center my-md-3">
                    &quot;<?php echo($quote); ?>&quot;
                </h2>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 col-md-5">
                <h2 class="black text-center text-md-left mb-0">
                    &mdash;&nbsp;<?php echo($name); ?>
                </h2>
                <?php
                if($info != ''):
                    ?>
                    <div class="d-flex justify-content-center justify-content-md-start mb-md-2">
                        <h2 class="black mb-0">
                            <span>&mdash;&nbsp;</span>
                        </h2>
                        <h3 class="black mb-0">
                            <?php echo($info); ?>
                        </h3>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            <div class="col-lg-2 col-md-1"></div>
        </div>
        <?php
    elseif($single_testimonial['type'] == 'video'):
        $vid = $single_testimonial['video']['share'];

        // Check what type of video and construct accordingly
        if($single_testimonial['video']['format'] == 'youtube'):
            $vid_id = fount_yt_share_stripper($vid);
            ?>
            <div class="drop-shadow white-frame">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/<?php echo $vid_id; ?>?color=white" frameborder="0" allowfullscreen class="no-select"></iframe>
                </div>
            </div>
            <?php
        elseif($single_testimonial['video']['format'] == 'vimeo'):
            ?>
            <div class="drop-shadow white-frame">
                <div class="video-container">
                    <?php echo fount_generate_vimeo_embed_code($vid); ?>
                </div>
            </div>
            <?php
        endif;
    endif;

    // Close slider slide
    echo $slider_append;
}
?>

<section id="testimonial" class="py-5">
    <div class="icons d-flex justify-content-center">
        <div class="icon" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/icon-brush.png);"></div>
        <div class="icon" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/icon-plug.png)";></div>
        <div class="icon" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/icon-wrench.png);"></div>
    </div>
    <div class="container">
        <?php
        // Is this the About template? If so, build slider
        if(is_page_template('single-about.php')):
            $is_slider = TRUE;
            ?>
            <div class="slider-wrapper">
                <div
                    class="slider-hand-arrows" 
                    data-adaptiveHieght="true" 
                    data-fade="true" 
                >
                    <?php
                    // Clone array and set up array for About page with only About posts
                    $about_testimonials = array_replace([], $hopper);
                    $i = 0;
                    foreach ($about_testimonials as $testimonial) {
                        if (
                            isset(
                                $testimonial['display']['pages']['about']) && 
                                $testimonial['display']['pages']['about'] === ''
                            ) {
                                unset($about_testimonials[$i]);
                            }
                        $i++;
                    }
                    // Reset and shuffle
                    unset($i);
                    $about_testimonials = array_values($about_testimonials);
                    shuffle($about_testimonials);

                    foreach($about_testimonials as $about_testimonial):
                        test_and_construct_single_testimonial($about_testimonial, $is_slider);
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
            <?php
        // Not the About template? Thats cool, proceed
        else:
            $is_slider = FALSE;
            // Check to see if we are on a Post page
            if(is_single()) {
                //Get post info
                $current_post = get_post();
                $current_post_id = get_queried_object_id();

                // Check if the current post object exists and if it has a post type
                if ($current_post && $current_post->post_type) {
                    $post_type = $current_post->post_type;

                    // Test what kind of custom post type it is
                    if ($post_type === 'locations') {

                        // Clone array and set up array for only the current Location
                        $location_testimonials = array_replace([], $hopper);
                        $i = 0;
                        $possible_locations = array();
                        foreach ($location_testimonials as $testimonial) {
                            foreach($testimonial['display']['locations'] as $location) {
                                if (
                                    isset($location) && 
                                    $location === $current_post_id
                                ) {
                                    array_push($possible_locations, $location_testimonials[$i]);
                                }
                            }
                            $i++;
                        }

                        // Reset and shuffle
                        unset($i);
                        $possible_locations = array_values($possible_locations);
                        shuffle($possible_locations);

                        // Grab the first one and display it, if it exists.
                        if(array_key_exists(0, $possible_locations)) {
                            $selected_testimonial = $possible_locations[0];
                            test_and_construct_single_testimonial($selected_testimonial, $is_slider);
                        } else {
                            // If all else fails, give the section some elbow room
                            echo('<div class="my-5"></div>');
                        }
                    } elseif ($post_type === 'services') {

                        // Clone array and set up array for only the current Survice
                        $service_testimonials = array_replace([], $hopper);
                        $i = 0;
                        $possible_services = array();
                        foreach ($service_testimonials as $testimonial) {
                            foreach($testimonial['display']['services'] as $service) {
                                if (
                                    isset($service) && 
                                    $service === $current_post_id
                                ) {
                                    array_push($possible_services, $service_testimonials[$i]);
                                }
                            }
                            $i++;
                        }

                        // Reset and shuffle
                        unset($i);
                        $possible_services = array_values($possible_services);
                        shuffle($possible_services);

                        // Grab the first one and display it.
                        if(array_key_exists(0, $possible_services)) {
                            $selected_testimonial = $possible_services[0];
                            test_and_construct_single_testimonial($selected_testimonial, $is_slider);
                        } else {
                            // If all else fails, give the section some elbow room
                            echo('<div class="my-5"></div>');
                        }
                    } else {
                        // If all else fails, give the section some elbow room
                        echo('<div class="my-5"></div>');
                    }
                }

            // Check to see if we are on the home template
            }elseif(is_page_template('single-home.php')) {
                // Clone array and set up array for Home page with only Home posts
                $home_testimonials = array_replace([], $hopper);
                $i = 0;
                foreach ($home_testimonials as $testimonial) {
                    if (
                        isset($testimonial['display']['pages']['home']) && 
                        $testimonial['display']['pages']['home'] !== TRUE
                    ) {
                        unset($home_testimonials[$i]);
                    }
                    $i++;
                }

                // Reset and shuffle
                unset($i);
                $home_testimonials = array_values($home_testimonials);
                shuffle($home_testimonials);

                // Grab the first one and display it.
                $selected_testimonial = $home_testimonials[0];
                test_and_construct_single_testimonial($selected_testimonial, $is_slider);
            } else {
                // If all else fails, give the section some elbow room
                echo('<div class="my-5"></div>');
            }
        endif;
        ?>
    </div>
</section>