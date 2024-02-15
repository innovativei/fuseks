<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); } if (CFCT_DEBUG) { cfct_banner(__FILE__); }

$testimonial_slider = FALSE;

?>
<!DOCTYPE html>

<!--

Authors: Innovative
Website: http://innovativei.com

-->

<head>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
    <title><?php wp_title( '-', true, 'right' ); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
    
</head>

<body id="top-of-page">

<header class="header cf">
    <?php include(locate_template('parts/navigation.php')); ?>
</header>

<main id="main">
