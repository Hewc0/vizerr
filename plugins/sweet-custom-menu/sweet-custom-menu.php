<?php
/*
Plugin Name: Sweet Custom Menu
Plugin URL: http://remicorson.com/sweet-custom-menu
Description: A little plugin to add attributes to WordPress menus
Version: 0.1
Author: Remi Corson
Author URI: http://remicorson.com
Contributors: corsonr
Text Domain: rc_scm
Domain Path: languages
*/

class rc_sweet_custom_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'rc_scm_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'rc_scm_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'rc_scm_edit_walker'), 10, 2 );

	} // end constructor

	function rc_scm_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
	    if ( isset($_REQUEST['menu-item-icon']) && is_array( $_REQUEST['menu-item-icon']) ) {
	        $subtitle_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_icon', $subtitle_value );
	    }
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

// instantiate plugin's class
$GLOBALS['sweet_custom_menu'] = new rc_sweet_custom_menu();


include_once get_template_directory(). '/inc/plugins/sweet-custom-menu/edit_custom_walker.php';
include_once get_template_directory(). '/inc/plugins/sweet-custom-menu/custom_walker.php';