<?php

// Home Page
if(is_front_page()):
    include(get_stylesheet_directory() . '/parts/hero/hero-home.php');

// All Locations Page
elseif(is_page_template('single-all-locations.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-locations.php');

// Location CPT
elseif(get_post_type() === 'locations'):
    include(get_stylesheet_directory() . '/parts/hero/hero-location.php');

// All Services Page
elseif(is_page_template('single-all-services.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-services.php');

// Service CPT and all other pages that don't require a special hero
elseif(
    get_post_type() === 'services' ||
    is_page_template('single-all-brands.php') ||
    is_page_template('single-careers.php') ||
    is_page_template('single-about.php') ||
    is_page_template('single-contact.php')
):
    include(get_stylesheet_directory() . '/parts/hero/hero-default.php');

// Everything else as a catch all
else:
    include(get_stylesheet_directory() . '/parts/hero/hero-default.php');
endif;

?>