<?php
	global $wpdb;
    $emails=$wpdb->prefix."missyou_email";
	
	$sql = "DROP TABLE $emails";
	$wpdb->query($sql);

?>