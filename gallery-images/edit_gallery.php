<?php 
global $wpdb;
$gallery=$wpdb->prefix."gallery";	
	
$id = $_GET['id'];	
$result = mysql_query("SELECT * FROM $gallery WHERE `id`=$id");
$row = mysql_fetch_array($result);
$id_got = $row['id'];
$position_got = $row['position'];
$image_got = $row['name'];
$keyword_got = $row['keyword']; 
$caption_got = $row['caption'];
$alt_tag_got = $row['alt_tag'];
$category_got = $row['category']; 



if (isset($_POST['postback']))
{
$id = $_POST['id'];
$position = $_POST['position'];
$keyword = $_POST['keyword'];
$caption = $_POST['caption'];
$alt_tag = $_POST['alt_tag'];
$category = $_POST['category'];
$site_url=home_url();



 	$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"];
	
	$filename =strtolower(basename($_FILES['uploaded_file']['name'])); 
	//echo $filename;
	//exit;
	///WP_optiva/wp-content/themes/Optiva_Theme/images/image-upload
	$newname = dirname(__FILE__)."/Image-upload/".$filename;
	//echo $newname;
	//exit;
		
		
    (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));
    // echo $newname;
	//exit;






///////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!$fileTmpLoc) { // if file not chosen
    $query= "UPDATE wp_gallery SET position = '$position', `keyword` = '$keyword',
`caption` = '$caption', `alt_tag` = '$alt_tag' , `category`= '$category' where id = '$id';";

//echo $query;
//exit;
mysql_query($query);
?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=admin-gallery&flage=success_edit'</script>
<?php	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
 else {
	
$query= "UPDATE wp_gallery SET `name` =  '$filename', position = '$position', `keyword` = '$keyword',
`caption` = '$caption', `alt_tag` = '$alt_tag' , `category`= '$category' where id = '$id';";

//echo $query;
//exit;
mysql_query($query);


//echo "<center><h2 style='color:red'>Image data Updated succesfully</h2></center>";
?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=admin-gallery&flage=success_edit'</script>
<?php	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
?>




<?php
//$query= "UPDATE wp_gallery SET `name` =  '$filename', `keyword` = '$keyword',`caption` = '$caption', `alt_tag` = '$alt_tag' , `category`= '$category' where id = '$id';";

//echo $query;
//exit;
//mysql_query($query);


//echo "<center><h2 style='color:red'>Image data Updated succesfully</h2></center>";
?>
<script >window.location = 'http://67.225.255.82/optivasigns/businesstheme/wp-admin/admin.php?page=admin-gallery&flage=success_edit'</script>
<?php	
}
?>





<div class="wrap">
<table height="365" style="border-color:#000">
<tr><td width="214"><strong><h1>Edit Image </strong></h1></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Select Image to Upload</td>
<td width="489">
<input name="uploaded_file" type="file" size="50" style="border-color:#000"/>
</td></tr>
<input type="hidden" name="id" value="<?php echo $id_got; ?>" />
<tr>
<td>Enter Postion for the Image</td>
<td>
<input name="position" type="text" size="50" style="border-color:#000"  value="<?php echo $position_got; ?>"/>
</td></tr>

<tr>
<td>Enter Keywords for the Images</td>
<td>
<input name="keyword" type="text" size="50" style="border-color:#000"  value="<?php echo $keyword_got; ?>"/>
</td></tr>


<tr>
<td>Enter Captions</td>
<td>
<input name="caption" type="text" size="50" style="border-color:#000" value="<?php echo $caption_got; ?>"/>
</td></tr>

<tr>
<td>Enter Alt tags</td>
<td>
<input name="alt_tag" type="text" size="50" style="border-color:#000" value="<?php echo $alt_tag_got; ?>"/>
</td></tr>

<tr>
<td>Select Category for the Image</td>
<td>
<select name="category" style="border-color:#000">
<option value="1">Open</option>
<option value="2">SpellBrite</option>
<option value="3">Custom</option>
</select>
</td></tr>

<tr>
<td>Click Submit to Upload Image</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000"/></td>
</tr>

</form>
</table>
</div>