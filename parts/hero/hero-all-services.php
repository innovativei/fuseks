<?php

// Grab random service hero bg
$service_args = array(
    'post_type' => 'services',
    'posts_per_page' => -1,
);

$service_query = new WP_Query($service_args);

$service_bg = array();
$i = 0;

if($service_query->have_posts()):
    while($service_query->have_posts()):
        $service_query->the_post();
        $service_bg_image = get_field('background');
        $service_bg[$i] = $service_bg_image;
        $i++;
    endwhile;
    wp_reset_postdata();
endif;

// Reset & Shuffle
unset($i);
shuffle($service_bg);
?>

<div id="hero" class="location shade d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $service_bg[0]; ?>)">
    <h1 class="white massive text-center mb-0">Our Services</h1>
</div>