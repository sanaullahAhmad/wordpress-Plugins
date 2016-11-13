<?php 
global $wpdb;
$emails=$wpdb->prefix."missyou_email";	
$flage=$_GET['flage'];	
$id = $_GET['id'];	




if (isset($_POST['send']))
{
$id = $_POST['id'];
$subject = $_POST['subject'];
$title = $_POST['title'];
$body = $_POST['body'];
$users=$wpdb->prefix."users";	

$res=mysql_query("SELECT `user_email` FROM `$users`");
//SELECT * FROM `wp_usermeta` WHERE `meta_key` = 'my_last_login'
while($email_row=mysql_fetch_array($res))
{
$to = $email_row['user_email'];
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: $email \r\n";
$headers.="Return-Path: $email \r\n";
		
		//mail($to, $subject, $body, $headers);
}
}













if (isset($_POST['save']))
{
$id = $_POST['id'];
$subject = $_POST['subject'];
$title = $_POST['title'];
$body = $_POST['body'];
$site_url=home_url();
	
$query= "UPDATE $emails SET `subject` =  '$subject', `title` = '$title',
`body` = '$body' where id = '$id';";

//echo $query;
//exit;
mysql_query($query);
//echo "<center><h2 style='color:red'>Image data Updated succesfully</h2></center>";
?>
<script >window.location = '<?php echo $site_url;?>/wp-admin/admin.php?page=we-miss-you-email&flage=success_edit'</script>
<?php	
}
?>





<div class="wrap">



<?php 
if($flage=='success_edit'){
?>
<center><h2 style='color:red'>Your Email Saved Successfully</h2></center>
<?php 
}
?>

<?php 
$result = mysql_query("SELECT * FROM $emails WHERE `id`=1");
$row = mysql_fetch_array($result);


$id_got = $row['id'];
$subject_got = $row['subject'];
$title_got = $row['title']; 
$body_got = $row['body'];

?>

<table height="365" style="border-color:#000">
<tr><td width="225"><strong>
<h1>Compose Mail 1</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Title</td>
<td width="478">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="title" type="text" size="50" style="border-color:#000" value="<?php echo $title_got;?>" /></td></tr>

<tr>
<td>Enter Email Subject</td>
<td>
<input name="subject" type="text" size="50" style="border-color:#000" value="<?php echo $subject_got;?>"/>
</td></tr>

<tr>
<td>Enter Body</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $body_got;?>"/>
-->
<textarea name="body" rows="20" cols="50" ><?php echo $body_got;?></textarea>
</td></tr>


<tr>
<td>Click send to send email</td>
<td><input name="send" type="submit" value="send" style="border-color:#000" />

&nbsp;&nbsp;&nbsp;&nbsp;Click Save to Save email
<input name="save" type="submit" value="save" style="border-color:#000" /></td>
</tr>

</form>
</table>






<?php 
$result = mysql_query("SELECT * FROM $emails WHERE `id`=2");
$row = mysql_fetch_array($result);


$id_got = $row['id'];
$subject_got = $row['subject'];
$title_got = $row['title']; 
$body_got = $row['body'];

?>
<table height="365" style="border-color:#000">
<tr><td width="226"><strong>
<h1>Compose Mail 2</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Title</td>
<td width="477">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="title" type="text" size="50" style="border-color:#000" value="<?php echo $title_got;?>" /></td></tr>

<tr>
<td>Enter Email Subject</td>
<td>
<input name="subject" type="text" size="50" style="border-color:#000" value="<?php echo $subject_got;?>"/>
</td></tr>

<tr>
<td>Enter Body</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $body_got;?>"/>
-->
<textarea name="body" rows="20" cols="50" ><?php echo $body_got;?></textarea>
</td></tr>



<tr>
<td>Click send to send email</td>
<td><input name="send" type="submit" value="send" style="border-color:#000" />

&nbsp;&nbsp;&nbsp;&nbsp;Click Save to Save email
<input name="save" type="submit" value="save" style="border-color:#000" /></td>

</tr>

</form>
</table>







<?php 
$result = mysql_query("SELECT * FROM $emails WHERE `id`=3");
$row = mysql_fetch_array($result);


$id_got = $row['id'];
$subject_got = $row['subject'];
$title_got = $row['title']; 
$body_got = $row['body'];

?>
<table height="365" style="border-color:#000">
<tr><td width="233"><strong>
<h1>Compose Mail 3</h1></strong></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Enter the Title</td>
<td width="470">

<input type="hidden" name="id" value="<?php echo $id_got; ?>" />

<input name="title" type="text" size="50" style="border-color:#000" value="<?php echo $title_got;?>" /></td></tr>

<tr>
<td>Enter Email Subject</td>
<td>
<input name="subject" type="text" size="50" style="border-color:#000" value="<?php echo $subject_got;?>"/>
</td></tr>

<tr>
<td>Enter Body</td>
<td>
<!--<input name="zip_code" type="text" size="50" style="border-color:#000" value="<?php echo $body_got;?>"/>
-->
<textarea name="body" rows="20" cols="50" ><?php echo $body_got;?></textarea>
</td></tr>



<tr>
<td>Click send to send email</td>
<td><input name="send" type="submit" value="send" style="border-color:#000" />

&nbsp;&nbsp;&nbsp;&nbsp;Click Save to Save email
<input name="save" type="submit" value="save" style="border-color:#000" /></td>

</tr>

</form>
</table>






</div>