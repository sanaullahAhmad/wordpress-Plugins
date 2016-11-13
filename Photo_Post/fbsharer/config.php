<?php

include_once("lib/facebook.php"); //include facebook SDK
 
######### edit details ##########
$appId = '548661088482928'; //Facebook App ID
$appSecret = 'd9263fe4963832c0d3417eafffc2ee61'; // Facebook App Secret
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions

$appUrl = "http://alpha.binarybrainz.com/Sanaullah/Photo_Post/fbsharer/";

$isFanPage = true;

//Set this to the fan page ID to post your file contents to.	
//$userPageId 	= '100003791782631';
$userPageId 	= '163691933769733';
//$userPageId 	= '163691933769733';
//$userPageId = '100002087836200';
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,
  'fileUpload' => true
));

?>