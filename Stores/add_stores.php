<?php 
if (isset($_POST['postback']))
{
	
	
	
	
	
$error=0;
$store_name = $_POST['store_name'];
$address = $_POST['address'];
$zip_code = $_POST['zip_code'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$site_url=home_url();




$query= "insert into wp_stores(store_name, address, zip_code, city,state,phone) values ('$store_name', '$address', '$zip_code', '$city','$state','$phone')";
//echo $query;
//exit;
mysql_query($query);

echo "<center><h2 style='color:red'>Store Added succesfully</h2></center>";
	
}
?>

<div class="wrap">
<table height="365" style="border-color:#000">
<tr><td width="214"><strong><h1>Add New Company</strong></h1></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Name of New Company</td>
<td width="489">
<input name="store_name" type="text" size="50" style="border-color:#000" /></td></tr>

<tr>
<td>Enter Address for this Company</td>
<td>
<input name="address" type="text" size="50" style="border-color:#000" />
</td></tr>

<tr>
<td>Enter Zip Code</td>
<td>
<input name="zip_code" type="text" size="50" style="border-color:#000"/>
</td></tr>

<tr>
<td>Enter City name</td>
<td>
<input name="city" type="text" size="50" style="border-color:#000"/>
</td></tr>

<tr>
<td>Enter state name</td>
<td>
<input name="state" type="text" size="50" style="border-color:#000"/>
</td></tr>

<tr>
<td>Enter Phone Number</td>
<td>
<input name="phone" type="text" size="50" style="border-color:#000"/>
</td></tr>

<tr>
<td>Click Submit to Add Company</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000"/></td>
</tr>

</form>
</table>
</div>