<?php
global $wpdb;
$emails=$wpdb->prefix."missyou_email";	
	
$t1=$_GET['id'];
$query="DELETE FROM $emails WHERE id='$t1'";
//echo $query;
//exit;
mysql_query($query);

?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=we-miss-you-email&flage=success'</script>