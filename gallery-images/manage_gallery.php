<?php
global $wpdb;

$gallery=$wpdb->prefix."gallery";

$category_got=$_POST['category'];
$site_url=home_url();

$flage=$_GET['flage'];

?><?php
if($_GET['action']=='edit')
{
	include ('edit_gallery.php');
}
else if($_GET['action']=='delete')
{
	include ('delete_gallery.php');
}
else
{
?>
<div class="wrap">

<table class="widefat" width="100%">
<thead>
   <tr>
<th colspan="7">



<?php 
if($flage=='success'){
?>
<center><h2 style='color:red'>Image is deleted successfully</h2></center>
<?php 
}
?>



<?php 
if($flage=='success_edit'){
?>
<center><h2 style='color:red'>Image is Updated successfully</h2></center>
<?php 
}
?>

	
 <form method="post">
 
 <strong>Plugin gallery image List</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Search By Category 
 
 <select name="category" style="border-color:#000">
<option value="" <?php if($category_got==''){ ?> selected="selected" <?php } ?>>--Select--</option>
<option value="1" <?php if($category_got==1){ ?> selected="selected" <?php } ?>>Open</option>
<option value="2" <?php if($category_got==2){ ?> selected="selected" <?php } ?>>SpellBrite</option>
<option value="3" <?php if($category_got==3){ ?> selected="selected" <?php } ?>>Custom</option>
</select>
<input type="submit" value="Search" />
</form>
</th>

<th>
<a href="<?php echo $site_url;?>/wp-admin/admin.php?page=add-image">Add new Image</a>
</th>
   </tr>

   
   <tr>
	<th align="left">Position</th>
	<th align="left">image</th>
	<th align="left">Keyword</th>	
    <th align="left">Caption</th>
	<th align="left">Alt tag</th>	
    <th align="left">Category</th>
    <th align="left">Edit</th>
    <th align="left">Delete</th>
	</tr>
</thead>

<tbody>

  
  <?php
  
  if($category_got=='')
{
  
$result = mysql_query("SELECT * FROM $gallery order by id Desc") or die(mysql_error());
}
else
{
	$result = mysql_query("SELECT * FROM $gallery WHERE `category`=$category_got") or die(mysql_error());
}

$k=1;
$site_url=home_url();



while($row = mysql_fetch_array($result))
	{
	  
	  	$id = $row['id'];
		$position = $row['position'];
		$image = $row['name'];
		$keyword = $row['keyword']; 
		$caption = $row['caption'];
		$alt_tag = $row['alt_tag'];
		$category = $row['category']; 
		
if($category==1)
{
	$category_value="Open";
	}
else if($category==2)
{
	$category_value="SperllBright";
	}
else
{
	$category_value="Custom";
	}
		 
								 
	?>
	 <tr>
	 <td><?php echo $position;?></td>
	 <td><img width="125" height="130" src="<?php echo $site_url;?>/wp-content/plugins/gallery-images/Image-upload/<?php echo $image; ?>" /><br /></td>
     
	 <td  ><?php echo $keyword;?><br /></td>
     <td><?php echo $caption;?><br /></td>
	 <td  ><?php echo $alt_tag;?><br /></td>
     <td><?php echo $category_value;?><br /></td>
     
     
     <td><a href="<?php echo $site_url;?>/wp-admin/admin.php?page=admin-gallery&action=edit&id=<?php echo $id;?>"><img src="<?php echo $site_url;?>/wp-content/plugins/gallery-images/edit.jpeg" alt="<?php echo $alt_tag;?>" /></a><br /></td>
     
     
     <td><a href="<?php echo $site_url;?>/wp-admin/admin.php?page=admin-gallery&action=delete&id=<?php echo $id;?>"><img src="<?php echo $site_url;?>/wp-content/plugins/gallery-images/delete.jpeg" alt="<?php echo $alt_tag;?>" /></a><br /></td>
     </tr>		  

	<?php
	$k++;


}

///////////////////////////////////////////////////////////////////////////////////




?>
	
     
     
     
     
     
     
     
     
     	
</tbody>

</table>


</div>
<?php
}

?>