<?php

include_once("lib/facebook.php"); //include facebook SDK
 
######### edit details ##########

$appId = '548661088482928'; //Facebook App ID
$appSecret = 'd9263fe4963832c0d3417eafffc2ee61'; // Facebook App Secret
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions

//Set this to the fan page ID to post your file contents to.	
$userPageId 	= '163691933769733';
		
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

?>