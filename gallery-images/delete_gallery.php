<?php
$t1=$_GET['id'];
$query="DELETE FROM wp_gallery WHERE id='$t1'";
//echo $query;
//exit;
mysql_query($query);


/*$result = mysql_query("SELECT * FROM $gallery WHERE `id`=$t1");
$row = mysql_fetch_array($result);
$image = $row['name'];
$site_url=home_url();
$filename = $site_url."/wp-content/plugins/gallery-images/Image-upload/".$image;
unlink($filename);*/
//delete($filename);


?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=admin-gallery&flage=success'</script>