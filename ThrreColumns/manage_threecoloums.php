<?php 
global $wpdb;
$three_column=$wpdb->prefix."three_column";	
$flage=$_GET['flage'];	
$id = $_GET['id'];	



if (isset($_POST['save']))
{
$id = $_POST['id'];
$title = $_POST['title'];
$image = $_POST['image'];
$description = $_POST['description'];
$site_url=home_url();
	
$query= "UPDATE $three_column SET `title` =  '$title', `image` = '$image',
`description` = '$description' where id = '$id';";

//echo $query;
//exit;
mysql_query($query);
//echo "<center><h2 style='color:red'>Image data Updated succesfully</h2></center>";
?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=three-columns&flage=success_edit'</script>
<?php	
}
?>


<div class="wrap">
<?php 
if($flage=='success_edit'){
?>
<center><h2 style='color:red'>Your Column Saved Successfully</h2></center>
<?php 
}
?>

<?php 
$result = mysql_query("SELECT * FROM $three_column WHERE `id`=1");
$row = mysql_fetch_array($result);
$id_got = $row['id'];
$title_got = $row['title'];
$image_got = $row['image']; 
$description_got = $row['description'];
?>
<table height="365" style="border-color:#000">
<tr><td width="233"><strong>
<h1>Compose Thired Column</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Title</td>
<td width="470">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="title" type="text" size="50" style="border-color:#000" value="<?php echo $title_got;?>" /></td></tr>

<tr>
<td>Upload Picture</td>
<td>
<input name="image" type="file" size="50" style="border-color:#000" value="<?php echo $image_got;?>"/>
</td></tr>

<tr>
<td>Enter Description</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $description_got;?>"/>
-->
<textarea name="description" rows="20" cols="50" ><?php echo $description_got;?></textarea>
</td></tr>
<tr>


&nbsp;&nbsp;&nbsp;&nbsp;Click Save to Save email
<input name="save" type="submit" value="save" style="border-color:#000" /></td>
</tr>
</form>
</table>






<?php 
$result = mysql_query("SELECT * FROM $three_column WHERE `id`=2");
$row = mysql_fetch_array($result);
$id_got = $row['id'];
$title_got = $row['title'];
$image_got = $row['image']; 
$description_got = $row['description'];
?>
<table height="365" style="border-color:#000">
<tr><td width="233"><strong>
<h1>Compose Thired Column</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Title</td>
<td width="470">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="title" type="text" size="50" style="border-color:#000" value="<?php echo $title_got;?>" /></td></tr>

<tr>
<td>Upload Picture</td>
<td>
<input name="image" type="file" size="50" style="border-color:#000" value="<?php echo $image_got;?>"/>
</td></tr>

<tr>
<td>Enter Description</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $description_got;?>"/>
-->
<textarea name="description" rows="20" cols="50" ><?php echo $description_got;?></textarea>
</td></tr>
<tr>


&nbsp;&nbsp;&nbsp;&nbsp;Click Save to Save email
<input name="save" type="submit" value="save" style="border-color:#000" /></td>
</tr>
</form>
</table>







<?php 
$result = mysql_query("SELECT * FROM $three_column WHERE `id`=3");
$row = mysql_fetch_array($result);
$id_got = $row['id'];
$title_got = $row['title'];
$image_got = $row['image']; 
$description_got = $row['description'];

?>
<table height="365" style="border-color:#000">
<tr><td width="233"><strong>
<h1>Compose Thired Column</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Title</td>
<td width="470">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="title" type="text" size="50" style="border-color:#000" value="<?php echo $title_got;?>" /></td></tr>

<tr>
<td>Upload Picture</td>
<td>
<input name="image" type="file" size="50" style="border-color:#000" value="<?php echo $image_got;?>"/>
</td></tr>

<tr>
<td>Enter Description</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $description_got;?>"/>
-->
<textarea name="description" rows="20" cols="50" ><?php echo $description_got;?></textarea>
</td></tr>
<tr>


&nbsp;&nbsp;&nbsp;&nbsp;Click Save to Save email
<input name="save" type="submit" value="save" style="border-color:#000" /></td>
</tr>
</form>
</table>






</div>