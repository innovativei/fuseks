<?php

$hero_type = get_field('hero_type');

if($hero_type == 'image'):
    ?>
    <div id="hero" class="location shade d-flex justify-content-center align-items-center" style="background-image: url(<?php the_field('background'); ?>)">
        <h1 class="white massive text-center mb-0">
            <?php the_title(); ?> Location
        </h1>
    </div>
    <?php
elseif($hero_type == 'video'):
    ?>
    <div id="hero" class="location shade d-flex justify-content-center align-items-center">
        <video playsinline autoplay muted loop style="background-image: url(<?php the_field('poster'); ?>);" src="<?php the_field('background_video'); ?>"></video>
        <h1 class="white massive text-center mb-0">
            <?php the_title(); ?> Location
        </h1>
    </div>
    <?php
endif;
?>