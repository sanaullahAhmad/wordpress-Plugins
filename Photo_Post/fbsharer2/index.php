<?php

	include_once("config.php");

	$code = $_REQUEST["code"];
	
	if ( !empty($code) ){

			$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
			    . $appId . "&redirect_uri=" . urlencode($appUrl)
			    . "&client_secret=" . $appSecret
			    . "&code=" . $code;
			$access_token = file_get_contents($token_url);

			parse_str($access_token);

			$long_token_url = "https://graph.facebook.com/oauth/access_token?client_id="
				. $appId . "&client_secret=" . $appSecret 
				. "&grant_type=fb_exchange_token&fb_exchange_token=" . $access_token;

			$token = file_get_contents($long_token_url);	//long token


			if ( $isFanPage ){ 
				$page_token_url = "https://graph.facebook.com/" . $userPageId .
				 					"?scope=publish_stream,manage_pages&fields=access_token&" . $token;
			
				$response = file_get_contents($page_token_url);

				$resp_obj = json_decode($response,true);
				$token = $resp_obj['access_token'];
				echo "Fan Page" ;
				
			}else{
				parse_str($token, $out);
				$token = $out['access_token'];
			}
			
			//echo $access_token;
			//echo "<br />";
			//echo $token;
			
			file_put_contents( 'token.txt', $token );
			echo "<br />You've authorized your account, it will now auto post to your set fan page through cron job.";
		
	}else{
	
		$loginUrl = $facebook->getLoginUrl( array('scope' => 'publish_stream,manage_pages') );
		print "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
     
	}
	
?>