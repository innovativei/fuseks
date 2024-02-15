<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

load_theme_textdomain('carrington-jam');

define('CFCT_DEBUG', false);
define('CFCT_PATH', trailingslashit(TEMPLATEPATH));

include_once(CFCT_PATH.'carrington-core/carrington.php');
include_once(CFCT_PATH.'functions/sidebars.php');

// Load our scripts
function fount_load_scripts() {
    wp_deregister_script('jquery');
    
    wp_enqueue_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js", false, null);
    wp_enqueue_script('plugins', get_stylesheet_directory_uri().'/js/plugins.js', false, null);
    wp_enqueue_script('vimeo', 'https://player.vimeo.com/api/player.js', false, null);

    wp_enqueue_script('scripts', get_stylesheet_directory_uri().'/js/script.js', false, null);
    wp_enqueue_script('icons', 'https://kit.fontawesome.com/e4c9cbfaf8.js', false, null);
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css2?family=League+Gothic&family=Roboto+Slab:wght@700;900&family=Roboto:wght@300;400;700&display=swap', array(), null);

    //if(ENVIRONMENT == "development") {
        wp_enqueue_style('main', get_stylesheet_directory_uri().'/devcss/style.css', array(), false, 'all');
    //} else {
        //wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.css', array(), false, 'all');
    //}

    if ( is_singular('post') ) { 
      wp_enqueue_script( 'comment-reply' ); 
    }
} add_action( 'wp_enqueue_scripts', 'fount_load_scripts' );

// Add support for featured images
add_theme_support( 'post-thumbnails' );

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
} add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );

// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

// Prevent BWP from minifying for admin users
add_filter("bwp_minify_is_loadable", "no_logged_in_minify");

function no_logged_in_minify($loadable) {
    if(is_user_logged_in() && !is_admin()) {
        $loadable = false;
    }
    return $loadable;
}

function clever_debug($object = null) {
    if($object === null) {
        $object = debug_backtrace();
    }
    echo "<script>";
    echo "window.debug_message = window.debug_message || [];";
    echo "window.debug_message.push(" . json_encode($object) . ")";
    echo "</script>";
}

function fount_configure_link($link) {
    if(!isset($link)) {
        return false;
    }
    if(!isset($link['url']) || $link['url'] == '') {
        return false;
    }
    if($link['url'] == '#' && $link['title'] == '') {
        return false;
    }
    if($link['title'] == '' && $link['url'] == '') {
        return false;
    }
    if($link['title'] == '') {
        $post_id = url_to_postid($link['url']);
        $link['title'] = get_the_title($post_id);
    }

    return $link;
}

/*
Currently not used
function fount_output_link($link, $classes="") {
    $link = fount_configure_link($link);
    if($link) {
        echo '<a class="'.$classes.'" href="'.$link['url'].'" target="'.$link['target'].'">'.$link['title'].'</a>';
    }
}
*/

/* Trim video share links down to video IDs and other pertinent information */
function fount_yt_share_stripper($youtube_url) {
    // Match the video ID from the URL
    $pattern = '/youtu\.be\/([a-zA-Z0-9_-]{11})/';
    preg_match($pattern, $youtube_url, $matches);

    // Check if a match was found
    if (isset($matches[1])) {
        return $matches[1]; // Return the video ID
    } else {
        return false; // Return false if no match was found
    }
}

function fount_vimeo_share_stripper($vimeo_url) {
    // Match the video ID and share ID from the URL
    $pattern = '/vimeo\.com\/(?:\/)?(\d+)(?:\/([^\/\?]+))?/';
    preg_match($pattern, $vimeo_url, $matches);

    // Check if a match was found
    if (isset($matches[1])) {
        $video_id = $matches[1];
        $share_id = isset($matches[2]) ? $matches[2] : ''; // Check if share ID exists, set to empty string if not
        return array($video_id, $share_id); // Return both IDs
    } else {
        return false; // Return false if no match was found
    }
}

function fount_generate_vimeo_embed_code($vimeo_url) {
    // Extract video ID and share ID
    $info = fount_vimeo_share_stripper($vimeo_url);
    if ($info !== false) {
        list($video_id, $share_id) = $info;

        // Construct iframe src attribute
        $src = "https://player.vimeo.com/video/$video_id";
        if (!empty($share_id)) {
            $src .= "?h=$share_id";
        }

        // Construct and return the iframe code
        return '<iframe src="' . htmlspecialchars($src) . '" frameborder="0" allow="fullscreen"></iframe>';
    } else {
        return "Invalid Vimeo URL.";
    }
}

/** Makes sure back end JS & CSS load. */
define('CONCATENATE_SCRIPTS', false);

?>
