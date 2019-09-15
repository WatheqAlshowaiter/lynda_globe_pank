<?php require_once('db_credintials.php'); ?> 

<?
	function db_connect(){
		return  mysqli_connect(DB_HOST, DB_USER,DB_PASS, DB_NAME);
	}

	function db_disconnect($connection){
		if(isset($connection)){
			mysqli_close($connection); 
		}
	}
?> 