<?php

// Grab random service hero bg
$service_args = array(
    'post_type' => 'services',
    'posts_per_page' => -1,
);

$service_query = new WP_Query($service_args);

$service_hero = array();
$i = 0;

if($service_query->have_posts()):
    while($service_query->have_posts()):
        $service_query->the_post();
        $service_hero[$i]['type']          = get_field('hero_type');

        if($service_hero[$i]['type']       == 'image'){
            $service_hero[$i]['url']       = get_field('background');
        }elseif($service_hero[$i]['type']  == 'video'){
            $service_hero[$i]['url']       = get_field('background_video');
            $service_hero[$i]['poster']    = get_field('poster');
        }
        $i++;
    endwhile;
    wp_reset_postdata();
endif;

// Reset & Shuffle & Choose
unset($i);
shuffle($service_hero);
$selected_hero = $service_hero[0];

if($selected_hero['type'] == 'image'):
    ?>
    <div id="hero" class="default shade d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $selected_hero['url']; ?>)">
        <h1 class="white massive text-center mb-0">
            <?php the_field('text_overlay'); ?>
        </h1>
    </div>
    <?php
elseif($selected_hero['type'] == 'video'):
    ?>
    <div id="hero" class="default shade d-flex justify-content-center align-items-center">
        <video playsinline autoplay muted loop style="background-image: url(<?php echo $selected_hero['poster']; ?>);" src="<?php echo $selected_hero['url']; ?>"></video>
        <h1 class="white massive text-center mb-0">
            <?php the_field('text_overlay'); ?>
        </h1>
    </div>
    <?php
endif;
?>