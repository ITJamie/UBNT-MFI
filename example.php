<?php
require('mfi-function.php');


$inputarray['expectedpage'] =  'https://IP:6443/manage';  
$inputarray['loginurl'] =  'https://IP:6443/login'; 	 
$inputarray['username']	= 'admin';
$inputarray['password']	= 'adminpassword';
$inputarray['cookiefile'] = '/path/to/cookies.txt';

	
// Add a line for every page you want to pull, readme will contain more information on potential pull addresses
$pages[0]['page-name'] = 'device';
$pages[0]['page-url'] = 'https://IP:6443/api/v1.0/stat/device';

$pages[1]['page-name'] = 'sensors';
$pages[1]['page-url'] = 'https://IP:6443/api/v1.0/list/sensors';



$reply = get_pages_from_ubnt_mfi_server($inputarray, $pages);
print_r($reply);

