<?php

		include_once("config.php");

		if( filesize('token.txt') <= 0 ){
			echo "Please authenticate your account.";
			exit;
		}
		
		$token = file_get_contents('token.txt');
		
		$filename = "comments.txt";
		
		$file_arr = file($filename);
		$line = array_shift( $file_arr );
		file_put_contents( $filename, implode( "" , $file_arr) );
		
		$msg_body = array(
		'message' => $line,
		'access_token' => $token,
		);
	

		$post_url = '/'.$userPageId.'/feed';	
		$postResult = $facebook->api($post_url, 'post', $msg_body );
			
	//Show sucess message
	if($postResult)
	 {
		 echo "Application posted single line to your fan page, successfully!";
	 }

?>