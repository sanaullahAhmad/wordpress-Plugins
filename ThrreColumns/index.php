<?php 
/*
Plugin Name: Home Page 3 colums
Description: This plugin will Manage the the three columns in home page .
Version: 1.0
Author: Sanaullah Ahmad

*/	


function install_threecloums()
{
  global $wpdb;
  $table=$wpdb->prefix."three_column";
  $result = mysql_query("CREATE TABLE IF NOT EXISTS $table (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"
   ) or die(mysql_error());
   
   $result2 = mysql_query("INSERT INTO $table (`id`, `title`, `image`, `description`) VALUES
(1, 'dsad', 'asdasd', 'asdasd'),
(2, 'sadas', 'asd', 'sdsa'),
(3, 'sdds', 'sad', 'asd');");

	

}
function threecolumn_menu()
{  
	$siteurl = get_option('siteurl');
       $url=$siteurl.'/wp-content/plugins/gallery-images/button_purchplug__.png';
add_menu_page( "Three Columns", "Three Columns", "three_columns", "three-columns", "three_columns", $icon_url, "101" );	
} 

function three_columns()
{ 
include "../ThrreColumns/manage_threecoloums.php";
}


add_action('admin_menu','threecolumn_menu'); 
//add_action('init',install_db_admin, 1);
register_activation_hook(__FILE__,'install_threecloums');
?>