<?php 
if (isset($_POST['postback']))
{
	
	
	
	
	
$error=0;
$position = $_POST['position'];
$keyword = $_POST['keyword'];
$caption = $_POST['caption'];
$alt_tag = $_POST['alt_tag'];
$category = $_POST['category'];
$site_url=home_url();










//move_uploaded_file($_FILES["image"]["tmp_name"],$site_url."/wp-content/plugins/gallery-images/Image-upload/" .$_FILES["image"]["name"]);



 
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
		





$query= "insert into wp_gallery(position, name, keyword, caption, alt_tag,category) values ('$position','$filename', '$keyword', '$caption', '$alt_tag','$category')";
//echo $query;
//exit;
mysql_query($query);

echo "<center><h2 style='color:red'>Image uploaded succesfully</h2></center>";
	
}
?>

<div class="wrap">
<table height="365" style="border-color:#000">
<tr><td width="214"><strong><h1>Upload Image </strong></h1></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Select Image to Upload</td>
<td width="489">
<input name="uploaded_file" type="file" size="50" style="border-color:#000" />
</td></tr>


<tr>
<td>Enter Position of this Image</td>
<td>
<input name="position" type="text" size="50" style="border-color:#000" />
</td></tr>

<tr>
<td>Enter Keywords for the Images</td>
<td>
<input name="keyword" type="text" size="50" style="border-color:#000" />
</td></tr>

<tr>
<td>Enter Captions</td>
<td>
<input name="caption" type="text" size="50" style="border-color:#000"/>
</td></tr>

<tr>
<td>Enter Alt tags</td>
<td>
<input name="alt_tag" type="text" size="50" style="border-color:#000"/>
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