<?php 
/*
Plugin Name: Optiva Stores
Description: This plugin will Manage the Stores for Optiva.
Version: 1.0
Author: Sanaullah Ahmad

*/	


function install_store()
{
  global $wpdb;
  $table=$wpdb->prefix."stores";
  $result = mysql_query("CREATE TABLE IF NOT EXISTS `wp_stores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `query-zip` varchar(100) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `website-address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `map-link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2805 ;"
   ) or die(mysql_error());

	

}
function store_menu()
{
    
	$siteurl = get_option('siteurl');
       $url=$siteurl.'/wp-content/plugins/gallery-images/button_purchplug__.png';
	
	
	
	add_menu_page( "Optiva Stores", "Stores Menu", "add_users", "optiva-stores", "optiva_stores", $icon_url, "101" );

    add_submenu_page("optiva-stores", "Add stores", "Add Stores", 0, "add-stores", "add_stores");
	
	
	


	
} 

function optiva_stores()
{ 
include "manage_stores.php";
}




function add_stores()
{ 
include "add_stores.php";
}






add_action('admin_menu','store_menu'); 
//add_action('init',install_db_admin, 1);
register_activation_hook(__FILE__,'install_store');
?>