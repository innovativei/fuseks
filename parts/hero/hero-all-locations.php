<?php

// Grab random location hero bg
$location_args = array(
    'post_type' => 'locations',
    'posts_per_page' => -1,
);

$location_query = new WP_Query($location_args);

$location_hero = array();
$i = 0;

if($location_query->have_posts()):
    while($location_query->have_posts()):
        $location_query->the_post();
        $location_hero[$i]['type']          = get_field('hero_type');

        if($location_hero[$i]['type']       == 'image'){
            $location_hero[$i]['url']       = get_field('background');
        }elseif($location_hero[$i]['type']  == 'video'){
            $location_hero[$i]['url']       = get_field('background_video');
            $location_hero[$i]['poster']    = get_field('poster');
        }
        $i++;
    endwhile;
    wp_reset_postdata();
endif;

// Reset & Shuffle & Choose
unset($i);
shuffle($location_hero);
$selected_hero = $location_hero[0];

if($selected_hero['type'] == 'image'):
    ?>
    <div id="hero" class="location shade d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $selected_hero['url']; ?>)">
        <h1 class="white massive text-center mb-0">
            <?php the_field('text_overlay'); ?>
        </h1>
    </div>
    <?php
elseif($selected_hero['type'] == 'video'):
    ?>
    <div id="hero" class="location shade d-flex justify-content-center align-items-center">
        <video playsinline autoplay muted loop style="background-image: url(<?php echo $selected_hero['poster']; ?>);" src="<?php echo $selected_hero['url']; ?>"></video>
        <h1 class="white massive text-center mb-0">
            <?php the_field('text_overlay'); ?>
        </h1>
    </div>
    <?php
endif;
?>