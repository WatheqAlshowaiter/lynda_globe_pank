<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

// url encode for links (after ? wich is important)
function u($string = ""){
  return urlencode($string);
}

// url encode for links (before ? wich is less important)
function raw_u($string = ""){
  return rawurlencode($string); 
}

// excape chars 
function h($string = ""){
	return htmlspecialchars($string); 
}

function error_404(){
	header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found"); 
	exit(); 
}

function error_500(){
	header($_SERVER['SERVER_PROTOCOL'] . " 500 Internal Server Error"); 
	exit(); 
}

function redirect_to($location){
	header("Location: " . $location);
	exit; 
}

function is_post_request(){
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
	return $_SERVER['REQUEST_METHOD']== 'GET'; 
}

 

?>
