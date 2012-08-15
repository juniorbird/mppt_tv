<?php

// Change "post" name to "news"
// from http://new2wp.com/snippet/change-wordpress-posts-post-type-news/
// For Kanbanery #360887

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][16][0] = 'News Tags';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


// Create a new post type for Team Members
// from http://codex.wordpress.org/Post_Types
// For Kanbanery #360887
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'team_member',
		array(
			'labels' => array(
				'name' => __( 'Team Members' ),
				'singular_name' => __( 'Team Member' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'team')
		)
	);
	register_post_type( 'sizzle',
		array(
			'labels' => array(
				'name' => __( 'Sizzles' ),
				'singular_name' => __( 'Sizzle' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sizzle')
		)
	);
}



// Put the menu items in a nice order so that it's obvious for an editor what to do
// http://wp.tutsplus.com/tutorials/creative-coding/customizing-your-wordpress-admin/
// For Kanbanery #360887

function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	
	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=page', // Pages
		'edit.php', // News
		'edit.php?post_type=team_member', // Team Members
		'edit.php?post_type=sizzle', // Team Members
		'separator2',
		'upload.php', // Media
		'separator-last', // Second separator
		'themes.php', // Appearance
		'plugins.php', // Plugins
		'users.php', // Users
		'tools.php', // Tools
		'options-general.php', // Settings
	);
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');


// Remove menu items for post types they won't use
// http://wp.tutsplus.com/tutorials/creative-coding/customizing-your-wordpress-admin/
// For Kanbanery #360887

function edit_admin_menus() {
	 remove_menu_page('edit-comments.php'); // Remove the Comments Menu  
	 remove_menu_page('link-manager.php'); // Remove the Links Menu  
}
add_action( 'admin_menu', 'edit_admin_menus' ); 

?>