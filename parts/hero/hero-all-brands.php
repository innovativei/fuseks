<?php

// Grab random location hero bg
$location_args = array(
    'post_type' => 'locations',
    'posts_per_page' => -1,
);

$location_query = new WP_Query($location_args);

$location_bg = array();
$i = 0;

if($location_query->have_posts()):
    while($location_query->have_posts()):
        $location_query->the_post();
        $location_image = get_field('background');
        $location_bg[$i] = $location_image;
        $i++;
    endwhile;
    wp_reset_postdata();
endif;

// Reset & Shuffle
unset($i);
shuffle($location_bg);
?>

<div id="hero" class="brand shade d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $location_bg[0]; ?>)">
    <h1 class="white massive text-center mb-0">Our Brands</h1>
</div>