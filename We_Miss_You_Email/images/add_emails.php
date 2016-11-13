<?php 
if (isset($_POST['postback']))
{
	
	
	
	
	
$error=0;
$subject = $_POST['subject'];
$email = $_POST['email'];
$body = $_POST['body'];

$site_url=home_url();




$query= "insert into $table(subject, email, body) values ('$subject', '$email', '$body')";
//echo $query;
//exit;
mysql_query($query);

echo "<center><h2 style='color:red'>Email Added succesfully</h2></center>";
	
}
?>

<div class="wrap">




<table height="365" style="border-color:#000">
<tr><td width="231" colspan="2"><strong>
<h1>First Email</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Subject</td>
<td width="472">
<input name="subject" type="text" size="50" style="border-color:#000" /></td></tr>

<tr>
<td>Enter Email</td>
<td>
<input name="email" type="text" size="50" style="border-color:#000" />
</td></tr>

<tr>
<td>Enter Body</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000"/>-->
<textarea name="body" rows="20" cols="50"></textarea>
</td></tr>


<tr>
<td>Click Submit to Add Email</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000"/></td>
</tr>

</form>
</table>









<table height="365" style="border-color:#000">
<tr><td width="231" colspan="2"><strong>
<h1>Second Email</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Subject</td>
<td width="472">
<input name="subject" type="text" size="50" style="border-color:#000" /></td></tr>

<tr>
<td>Enter Email</td>
<td>
<input name="email" type="text" size="50" style="border-color:#000" />
</td></tr>

<tr>
<td>Enter Body</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000"/>-->
<textarea name="body" rows="20" cols="50"></textarea>
</td></tr>


<tr>
<td>Click Submit to Add Email</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000"/></td>
</tr>

</form>
</table>











<table height="365" style="border-color:#000">
<tr><td width="231" colspan="2"><strong>
<h1>Thired Email</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Subject</td>
<td width="472">
<input name="subject" type="text" size="50" style="border-color:#000" /></td></tr>

<tr>
<td>Enter Email</td>
<td>
<input name="email" type="text" size="50" style="border-color:#000" />
</td></tr>

<tr>
<td>Enter Body</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000"/>-->
<textarea name="body" rows="20" cols="50"></textarea>
</td></tr>


<tr>
<td>Click Submit to Add Email</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000"/></td>
</tr>

</form>
</table>













</div>