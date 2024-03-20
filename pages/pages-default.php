<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="application">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white py-5">
        <div class="container">
            content goes here.
        </div>
    </section>
</div>

<?php get_footer(); ?>