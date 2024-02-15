<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="location">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>
    <?php include(get_stylesheet_directory() . '/parts/testimonials.php'); ?>
</div>

<?php get_footer(); ?>
