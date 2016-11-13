<?php






if (isset($_POST['offset'])){ $offset = $_POST['offset']; } else { $offset = 0; }

$sql = mysql_query("SELECT * FROM wp_stores "); 
$total = mysql_num_rows($sql); 
if (isset($_POST['limit'])) { $limit = $_POST['limit']; } else { $limit = 10; };

$back = $offset - $limit;
$next = $offset + $limit; 
if ($back <= 0) { $back = 0; }
if ($next >= $total) { $next = $offset; }









global $wpdb;

$stores=$wpdb->prefix."stores";
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
<th colspan="7">

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
  

$result = mysql_query("SELECT * FROM $stores order by id Desc LIMIT $limit, 10") or die(mysql_error());


$k=$limit-9;
$site_url=home_url();



while($row = mysql_fetch_array($result))
	{
	  
	  	$id = $row['id'];
		$store_name = $row['store_name'];
		$address = $row['address']; 
		$zip_code = $row['zip_code'];
		$city = $row['city'];
		$state = $row['state']; 
		$phone = $row['phone']; 

		 
								 
	?>
	 <tr>
	 <td><?php echo $k;?></td>
	 <td><?php echo $store_name;?><br /></td>
     
	 <td  ><?php echo $address;?><br /></td>
     
	 <td  ><?php echo $city;?><br /></td>
     <td><?php echo $state;?><br /></td>
     <td><?php echo $zip_code;?><br /></td>
     <td><?php echo $phone;?><br /></td>
     
     
     <td><a href="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores&action=edit&id=<?php echo $id;?>"><img src="<?php echo $site_url;?>/wp-content/plugins/Stores/edit.jpeg" alt="<?php echo $alt_tag;?>" /></a><br /></td>
     
     
     <td><a href="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores&action=delete&id=<?php echo $id;?>"><img src="<?php echo $site_url;?>/wp-content/plugins/Stores/delete.jpeg" alt="<?php echo $alt_tag;?>" /></a><br /></td>
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


<div style="margin:10px 0 25px 0;" >

                     <?php /*?><div style="float:left; ">
                        <form action="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores" method="post" >
                        <input name="offset" type="hidden" value="<?php echo $back; ?>" />
                        <input name="button" type="submit" class="button" id="button" value="Back" />
                        </form></div><?php */?>
                        <div style="float:left; margin-left:4px; ">
                        <form action="<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores" method="post" >
                        <input name="offset" type="hidden" value="<?php echo $next; ?>" />
                       <?php /*?> <input name="button" type="submit" class="button" id="button" value="Next" /><?php */?>
                        
                        
                        Records  <select name="limit" class="selectRocords" id="limit" onchange="this.form.submit();">
                        <?php for($loop=10; $loop<=$total; $loop+=10) { ?>
                          <option value="<?php echo $loop;?>" <?php if ($limit == $loop) echo "selected='selected'"; ?>><?php echo $loop-9; ?>-<?php echo $loop; ?></option>
                          
                          <?php }?>
                          
                          
                          
                          <?php /*?><option value="10" <?php if ($limit == 10) echo "selected='selected'"; ?>>10</option>
                          <option value="15" <?php if ($limit == 15) echo "selected='selected'"; ?>>15</option>
                          <option value="20" <?php if ($limit == 20) echo "selected='selected'"; ?>>20</option><?php */?>
                          
                          
                          
                        </select>
                        
                        
                        </form>
                      </div>  	 


              </div>