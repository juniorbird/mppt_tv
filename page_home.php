<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */

/**
 * Template Name: Home Page
 *
 * Selectable from a dropdown menu on the edit page screen.
 */

// You can override via functions.php conditionals or define:
$columns = 'sixteen';
get_header();
st_before_content($columns='');
get_template_part( 'loop', 'page' );
get_footer();
?>