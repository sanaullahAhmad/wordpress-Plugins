<?php




global $wpdb;
  $table=$wpdb->prefix."missyou_email";

if (isset($_POST['offset'])){ $offset = $_POST['offset']; } else { $offset = 0; }

$sql = mysql_query("SELECT * FROM $table "); 
$total = mysql_num_rows($sql); 
if (isset($_POST['limit'])) { $limit = $_POST['limit']; } else { $limit = 0; };

$back = $offset - $limit;
$next = $offset + $limit; 
if ($back <= 0) { $back = 0; }
if ($next >= $total) { $next = $offset; }










$site_url=home_url();
//$category_got=$_POST['category'];


$flage=$_GET['flage'];


if($_GET['action']=='edit')
{
	include ('edit_stores.php');
}
else if($_GET['action']=='delete')
{
	include ('delete_stores.php');
}
else
{
?>
<div class="wrap">

<table class="widefat" width="100%">
<thead>
   <tr>
<th colspan="8">

<h1 style='color:black'>Company List</h1>

<?php 
if($flage=='success'){
?>
<center><h2 style='color:red'>Company is deleted successfully</h2></center>
<?php 
}
?>



<?php 
if($flage=='success_edit'){
?>
<center><h2 style='color:red'>Company is Updated successfully</h2></center>
<?php 
}
?>

	
 
</th>

<th>
<a href="<?php echo $site_url;?>/wp-admin/admin.php?page=add-stores">Add new Company</a>
</th>
   </tr>

   
   <tr>
	<th align="left">Sr#</th>
	<th align="left">Company</th>
	<th align="left">Address</th>	
    
	<th align="left">City</th>	
    <th align="left">State</th>
    <th align="left">Zip</th>
     <th align="left">Phone</th>
    <th align="left">Edit</th>
    <th align="left">Delete</th>
	</tr>
</thead>

<tbody>

  
  <?php
  
global $wpdb;
  $table=$wpdb->prefix."missyou_email";
$result = mysql_query("SELECT * FROM $table order by id Desc LIMIT $limit, 10") or die(mysql_error());


$k=$limit+1;
$site_url=home_url();

$i = 1;

while($row = mysql_fetch_array($result))
	{
		
		if ($i % 2 != 0) # An odd row
    $rowColor = "#fff";
  else # An even row
    $rowColor = "#e4e4e4"; 
	  
	  	$id = $row['id'];
		$store_name = $row['store_name'];
		$address = $row['address']; 
		$zip_code = $row['zip_code'];
		$city = $row['city'];
		$state = $row['state']; 
		$phone = $row['phone']; 

		 
								 
	?>
	 <tr bgcolor="<?php echo $rowColor ;?>">
	 <td><?php echo $k;?></td>
	 <td><?php echo $store_name;?><br /></td>
     
	 <td  ><?php echo $address;?><br /></td>
     
	 <td  ><?php echo $city;?><br /></td>
     <td><?php echo $state;?><br /></td>
     <td><?php echo $zip_code;?><br /></td>
     <td><?php echo $phone;?><br /></td>
     
     
     <td><a href="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores&action=edit&id=<?php echo $id;?>"><img src="<?php echo $site_url;?>/wp-content/plugins/Stores/images/edit.png" alt="<?php echo $alt_tag;?>" /></a><br /></td>
     
     
     <td><a href="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores&action=delete&id=<?php echo $id;?>"><img src="<?php echo $site_url;?>/wp-content/plugins/Stores/images/delete.png" alt="<?php echo $alt_tag;?>" /></a><br /></td>
     </tr>		  

	<?php
	$k++;
	 $i++;


}

///////////////////////////////////////////////////////////////////////////////////




?>
	
     
     
     
     
     
     
     
     
     	
</tbody>

</table>


</div>


<!--Pagination-->
<div style="margin:10px 0 25px 0; padding-bottom: 30px;" >
  <div style="float:left; margin-left:4px; ">
  <form action="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores" method="post" >
 <input name="offset" type="hidden" value="<?php echo $next; ?>" />
 <?php /*?> <input name="button" type="submit" class="button" id="button" value="Next" /><?php */?>
 Records  <select name="limit" class="selectRocords" id="limit" onchange="this.form.submit();">
<?php for($loop=0; $loop<=$total; $loop+=10) { ?>
<option value="<?php echo $loop;?>" <?php if ($limit == $loop) echo "selected='selected'"; ?>><?php echo $loop+1; ?>-<?php echo $loop+10; ?></option>
<?php }?>
</select>
 </form>
</div>  	 
</div>




<?php
}

?>


