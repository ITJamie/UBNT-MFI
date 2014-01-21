<?php

/*
Written by Jamie Murphy - jamiemurphyit@gmail.com
Released under GNU V3 
Version v0.1


Expected Input:

$inputarray['expectedpage'] =  'https://IP:6443/manage';  
$inputarray['loginurl'] =  'https://IP:6443/login'; 	 
$inputarray['username']	= 'admin';
$inputarray['password']	= 'admin';
$inputarray['cookiefile'] = '/path/to/cookiess.txt';

$pages[0]['page-name'] = 'device';
$pages[0]['page-url'] = 'https://IP:6443/api/v1.0/stat/device';

$pages[1]['page-name'] = 'sensors';
$pages[1]['page-url'] = 'https://IP:6443/api/v1.0/list/sensors';

etc

*/

function get_pages_from_ubnt_mfi_server($inputarray, $pages){



	$sessioncreate = curl_init();
	curl_setopt($sessioncreate, CURLOPT_URL, $inputarray['loginurl']);
	curl_setopt($sessioncreate, CURLOPT_COOKIEFILE, $inputarray['cookiefile']);
	curl_setopt($sessioncreate, CURLOPT_COOKIEJAR, $inputarray['cookiefile']);
	curl_setopt($sessioncreate, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($sessioncreate, CURLOPT_CONNECTTIMEOUT ,3); 
	curl_setopt($sessioncreate, CURLOPT_TIMEOUT, 3); //timeout in seconds
	curl_setopt($sessioncreate, CURLOPT_SSL_VERIFYPEER, FALSE);     
	curl_setopt($sessioncreate, CURLOPT_SSL_VERIFYHOST, 2); 
	curl_setopt($sessioncreate, CURLOPT_RETURNTRANSFER, 1);
	
	$result1 = curl_exec($sessioncreate);
	curl_close($sessioncreate);
	

	$crl = curl_init();
	curl_setopt($crl, CURLOPT_URL, $inputarray['loginurl']);
	curl_setopt($crl, CURLOPT_COOKIEFILE, $inputarray['cookiefile']);
	curl_setopt($crl, CURLOPT_COOKIEJAR, $inputarray['cookiefile']);
	curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);    
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT ,3); 
	curl_setopt($crl, CURLOPT_TIMEOUT, 3); //timeout in seconds
	curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2); 
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_POST, 1);
	
	$postdata = array(
		"username" => $inputarray['username'],
		"password" => $inputarray['password'],
		"login" => 'Login'

	);
	//print_r($postdata);
	curl_setopt($crl, CURLOPT_POSTFIELDS, http_build_query($postdata));
	
	$result2 = curl_exec($crl);
	$headers = curl_getinfo($crl);
	curl_close($crl);



	if ($headers['url'] == $inputarray['expectedpage']) {
			$reply['auth'] = 'true';
			$reply['url'] = $headers['url'];
			
	} else if ($headers['url'] == $inputarray['loginurl']) {
			$reply['auth'] = 'false';
			$reply['url'] = $headers['url'];
			$reply['page'] = $result2;
			return $reply;
			
	} else {
			$reply['auth'] = 'debug';
			$reply['url'] = $headers['url'];
			$reply['page'] = $result2;
			return $reply;
	}


	if(!empty($pages)){
		foreach($pages as $page){
		
			$cfg = curl_init();
			curl_setopt($cfg, CURLOPT_URL, $page['page-url']);
			curl_setopt($cfg, CURLOPT_COOKIEFILE, $inputarray['cookiefile']);
			curl_setopt($cfg, CURLOPT_COOKIEJAR, $inputarray['cookiefile']);
			curl_setopt($cfg, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($cfg, CURLOPT_SSL_VERIFYPEER, FALSE);    
			curl_setopt($cfg, CURLOPT_CONNECTTIMEOUT ,3); 
			curl_setopt($cfg, CURLOPT_TIMEOUT, 3); //timeout in seconds
			curl_setopt($cfg, CURLOPT_SSL_VERIFYHOST, 2); 
			curl_setopt($cfg, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($cfg, CURLOPT_POST, 1);
			$pagename = 'page-'.$page['page-name'];
			$reply[$pagename] = curl_exec($cfg);
			
			curl_close($cfg);
		}

	}


	return $reply;
}

?>
