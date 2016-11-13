<?php 
global $wpdb;
$stores=$wpdb->prefix."stores";	
	
$id = $_GET['id'];	
$result = mysql_query("SELECT * FROM $stores WHERE `id`=$id");
$row = mysql_fetch_array($result);


$id_got = $row['id'];
$store_name_got = $row['store_name'];
$address_got = $row['address']; 
$zip_code_got = $row['zip_code'];
$city_got = $row['city'];
$state_got = $row['state']; 
$phone_got = $row['phone'];



if (isset($_POST['postback']))
{
$id = $_POST['id'];
$store_name = $_POST['store_name'];
$address = $_POST['address'];
$zip_code = $_POST['zip_code'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$site_url=home_url();



	
$query= "UPDATE wp_stores SET `store_name` =  '$store_name', `address` = '$address',
`zip_code` = '$zip_code', `city` = '$city' , `state`= '$state', `phone`= '$phone' where id = '$id';";

//echo $query;
//exit;
mysql_query($query);


//echo "<center><h2 style='color:red'>Image data Updated succesfully</h2></center>";
?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=optiva-stores&flage=success_edit'</script>


<?php	
}
?>





<div class="wrap">
<table height="365" style="border-color:#000">
<tr><td width="214"><strong><h1>Edit Store </strong></h1></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Name of New Company</td>
<td width="489">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="store_name" type="text" size="50" style="border-color:#000" value="<?php echo $store_name_got;?>" /></td></tr>

<tr>
<td>Enter Address for this Company</td>
<td>
<input name="address" type="text" size="50" style="border-color:#000" value="<?php echo $address_got;?>"/>
</td></tr>

<tr>
<td>Enter Zip Code</td>
<td>
<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $zip_code_got;?>"/>
</td></tr>

<tr>
<td>Enter City name</td>
<td>
<input name="city" type="text" size="50" style="border-color:#000" value="<?php echo $city_got;?>"/>
</td></tr>

<tr>
<td>Enter state name</td>
<td>
<input name="state" type="text" size="50" style="border-color:#000" value="<?php echo $state_got;?>" />
</td></tr>

<tr>
<td>Enter Phone Number</td>
<td>
<input name="phone" type="text" size="50" style="border-color:#000" value="<?php echo $phone_got;?>" />
</td></tr>

<tr>
<td>Click Submit to Add Company</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000" /></td>
</tr>

</form>
</table>
</div>