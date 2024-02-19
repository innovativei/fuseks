<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="archive-locations" class="bg-white">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <div class="container py-5">
        <div id="store-select" class="gen-wrapper">
            <div class="container">
                <h1 class="black">Select Your Store</h1>
                <?php
                include(get_stylesheet_directory() . '/parts/store-select.php');
                ?>
            </div>
        </div>
    </div>

    <?php include(get_stylesheet_directory() . '/parts/shop-online-van.php'); ?>

</div>

<?php get_footer(); ?>