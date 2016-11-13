<?php

		include_once("config.php");

		if( filesize('token.txt') <= 0 ){
			echo "Please authenticate your account.";
			exit;
		}

		if( filesize('comments.txt') <= 0 ){
			echo "The comment file is empty, please add more comments to it.";
			exit;
		}
		
		$token = file_get_contents('token.txt');
		//$filename = "comments.txt";
		//$file_arr = file($filename);
		//$line = array_shift( $file_arr );
		
		
		$file = fopen("comments.txt", "r");
		$members = array();
		while (!feof($file)) {
	    $members[] = fgets($file);
		}
		fclose($file);
   		$line = $members[array_rand($members)];
   		 //echo $line;
		

	try {

					$handle = opendir(dirname(__FILE__)."/photos/");

   					 while (false !== ($entry = readdir($handle))) {
						//echo $entry . "<br />";
						if( $entry != "." && $entry != "..")
							$filelist[] = $entry;
							
   					 }
					 
					closedir($handle);
					
					asort($filelist);
					
					$file = array_shift($filelist);
					
					$exp = explode(".", strtolower($file) );
					$ext = end($exp);
			
					if ( $ext == "jpg" || $ext == "png" || $ext == "gif" || $ext == "jpeg" ){
				

						$msg_body = array(
						 'message' =>  $line ,
						 'source' => '@' . realpath("photos/".$file),
						 'access_token' => $token
						);

						$post_url = '/'.$userPageId.'/photos';
						$postResult = $facebook->api($post_url, 'post', $msg_body );

						unlink(dirname(__FILE__)."/photos/".$file);
					}

      } catch(FacebookApiException $e) {
		//print_r($e);
      }
      
	if($postResult){
	 	echo $line;
	 	echo "<br />";
		echo "<b>Application posted above comment to your page!</b>";
	 }

?>