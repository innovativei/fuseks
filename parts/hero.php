<?php

// Home
if(is_front_page()):
    include(get_stylesheet_directory() . '/parts/hero/hero-home.php');

// All Locations
elseif(is_page_template('single-all-locations.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-locations.php');

// Single Location
elseif(get_post_type() === 'locations'):
    include(get_stylesheet_directory() . '/parts/hero/hero-location.php');

// All Services
elseif(is_page_template('single-all-services.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-services.php');

// Single Service
elseif(get_post_type() === 'services'):
    include(get_stylesheet_directory() . '/parts/hero/hero-service.php');

// All Brands
elseif(is_page_template('single-all-brands.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-all-brands.php');

// Single Brand
elseif(get_post_type() === 'brands'):
    include(get_stylesheet_directory() . '/parts/hero/hero-brand.php');

// Careers
elseif(is_page_template('single-careers.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-careers.php');

// About
elseif(is_page_template('single-about.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-about.php');

// Contact
elseif(is_page_template('single-about.php')):
    include(get_stylesheet_directory() . '/parts/hero/hero-contact.php');



// Everything else as a catch all
else:
    include(get_stylesheet_directory() . '/parts/hero/hero-default.php');
endif;

?>