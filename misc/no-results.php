<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

echo '<p>', _e('Sorry, we couldn\'t find any results that matched your request.', 'carrington-jam'), '</p>';

?>