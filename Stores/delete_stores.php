<?php
$t1=$_GET['id'];
$query="DELETE FROM wp_stores WHERE id='$t1'";
//echo $query;
//exit;
mysql_query($query);

?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores&flage=success'</script>