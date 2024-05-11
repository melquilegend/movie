<?php
/**
* Template Name: Home page
*
* @package WordPress
* @subpackage movie
*/

get_header();  // This line is here to include the header part of the theme.

// Including the homepage.php from the template-parts folder
get_template_part('templates/homepage');

get_footer();  // This line is here to include the footer part of the theme.
?>
