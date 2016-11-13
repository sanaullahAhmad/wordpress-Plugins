<?php
include_once"../../../wp_load.php";
global $wpdb;
$emails=$wpdb->prefix."missyou_email";	

$res2=mysql_query("SELECT wp_users.user_email, wp_usermeta.meta_value
FROM wp_users
INNER JOIN wp_usermeta
ON wp_users.ID=wp_usermeta.user_id WHERE wp_usermeta.meta_key LIKE 'my_last_login'
ORDER BY wp_users.user_email");

while($row2=mysql_fetch_array($res2))
{
$last_login=$row2['meta_value'];
$numMonths = abs(time() - $last_login)/60/60/24/30;

if($numMonths<10)
{
	$result3 = mysql_query("SELECT * FROM $emails WHERE `id`=1");
$row3 = mysql_fetch_array($result);

$subject = $row3['subject'];
$body = $row3['body'];

$to = $row2['user_email'];
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: $email \r\n";
$headers.="Return-Path: $email \r\n";
mail($to, $subject, $body, $headers);	
}


else if($numMonths<8)
{
	$result4 = mysql_query("SELECT * FROM $emails WHERE `id`=2");
$row4 = mysql_fetch_array($result);

$subject = $row4['subject'];
$body = $row4['body'];

$to = $row2['user_email'];
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: $email \r\n";
$headers.="Return-Path: $email \r\n";
mail($to, $subject, $body, $headers);	
}




else if($numMonths<6)
{
	$result5 = mysql_query("SELECT * FROM $emails WHERE `id`=3");
$row5 = mysql_fetch_array($result);

$subject = $row5['subject'];
$body = $row5['body'];

$to = $row2['user_email'];
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: $email \r\n";
$headers.="Return-Path: $email \r\n";
mail($to, $subject, $body, $headers);	
}


}
?>