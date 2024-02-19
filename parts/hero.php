<?php

// Home
if(is_front_page()):
    include(get_stylesheet_directory() . '/parts/hero/hero-home.php');

// All Locations
elseif(is_page('locations')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-locations.php');

// Single Location
elseif(get_post_type() === 'locations'):
    include(get_stylesheet_directory() . '/parts/hero/hero-location.php');

// All Services
elseif(is_page('services')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-services.php');

// Single Service
elseif(get_post_type() === 'services'):
    include(get_stylesheet_directory() . '/parts/hero/hero-service.php');

// All Brands
elseif(is_page('brands')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-brands.php');

// Single Brand
elseif(get_post_type() === 'brands'):
    include(get_stylesheet_directory() . '/parts/hero/hero-brand.php');




// Everything else as a catch all
else:
    include(get_stylesheet_directory() . '/parts/hero/hero-default.php');
endif;

?>