<?php 
$title = basename($_SERVER['SCRIPT_FILENAME'],'.php');
$title = str_replace('_', ' ', $title);
if(strtolower($title)=='index'){
	$title = 'home';
}
$title = ucwords($title); 
//$title = ucfirst($title);
