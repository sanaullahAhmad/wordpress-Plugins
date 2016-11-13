<?php 
/*
Plugin Name: We Miss You Email
Description: This plugin will Send Email to Youser Not loged in for six Monts.
Version: 1.0
Author: Sanaullah Ahmad

*/	


function install_store()
{
  global $wpdb;
  $table=$wpdb->prefix."missyou_email";
  $result = mysql_query("CREATE TABLE IF NOT EXISTS `$table` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;") or die(mysql_error());

$sql = mysql_query("SELECT * FROM $table "); 
$total = mysql_num_rows($sql); 
if($total<1)
{
$second = mysql_query("INSERT INTO `$table`(`subject`, `title`, `body`) VALUES
('First Email subject', 'first email title', 'first email body'),
('Second Email subject', 'Second email title', 'Second email body'),
('Thired Email subject', 'Thired email title', 'Thired email body') ;");
}

}
function email_menu()
{
    
	
	
	 $url=home_url()."/wp-content/plugins/We_Miss_You_Email/images/store_icon.png";
	
	add_menu_page( "We Miss You Email", "Email Menu", "add_users", "we-miss-you-email", "we_miss_you_email", $url, "107" );

    //add_submenu_page("we-miss-you-email", "Add Email", "Add Email", 0, "add-Email", "add_email");
	
	
	


	
} 

function we_miss_you_email()
{ 
include "emails.php";
}




/*function add_email()
{ 
include "add_emails.php";
}*/
function my_last_login($login) {
    global $user_ID;
    $user = get_userdatabylogin($login);
    update_usermeta( $user->ID, 'my_last_login', time() );
  }



add_action('wp_login','my_last_login');

add_action('admin_menu','email_menu'); 
//add_action('init',install_db_admin, 1);
register_activation_hook(__FILE__,'install_store');
?>