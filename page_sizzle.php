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
 * Template Name: Sizzle Page
 *
 * Selectable from a dropdown menu on the edit page screen.
 */

// You can override via functions.php conditionals or define:
// $columns = 'four';
query_posts( 'post_type=sizzle');

get_header();
st_before_content($columns='');
get_template_part( 'loop', 'page' );
st_after_content();
get_sidebar('page');
get_footer();
?>