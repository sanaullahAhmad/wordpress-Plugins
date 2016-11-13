<?php 
/*
Plugin Name: Gallery Images
Description: This plugin will upload the images to show in gallery.
Version: 1.0
Author: Khurram Malik

*/	


function install_gallery()
{
  global $wpdb;
  $table=$wpdb->prefix."gallery";
  $result = mysql_query("CREATE TABLE IF NOT EXISTS `wp_gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `position` int(10) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `alt_tag` varchar(50) NOT NULL,
  `category` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;"
   ) or die(mysql_error());

	

}
function createmenu()
{
    
	
	add_menu_page( "Administrator", "Admin Gallery", "administrator", "admin-gallery", "view_gallery",$url,"100" );
	
	
    add_submenu_page("admin-gallery", "Add Image", "Add image", 0, "add-image", "add_image");
	
	//add_submenu_page("admin-gallery", "Edit Image", "Edit image", 0, "edit-image", "edit_image");
	
	
} 

function view_gallery()
{ 
include "manage_gallery.php";
}




function add_image()
{ 
include "add_gallery.php";
}

/*function edit_image()
{ 
include "edit_gallery.php";
}*/




add_action('admin_menu','createmenu'); 
//add_action('init',install_db_admin, 1);
register_activation_hook(__FILE__,'install_gallery');
?>