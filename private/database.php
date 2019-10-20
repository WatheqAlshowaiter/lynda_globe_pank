<?php require_once('db_credintials.php'); ?> 
<?php

function db_connect()
{
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	confirm_db_connect();
	return $connection;
}

function db_disconnect($connection)
{
	if (isset($connection)) {
		mysqli_close($connection);
	}
}

/**
 * this function handle errors when connection 
 *  with db  filed
 *
 * @return void
 */
function confirm_db_connect()
{
	if (mysqli_connect_errno()) {
		$msg = "Database connection failed. ";
		$msg .= mysqli_connect_error();
		$msg .= "( Error number:" . mysqli_connect_errno() . " )";
		exit($msg);
	}
}
/**
 * this function handle it when result set query failed
 *	
 * @param  mixed $result_set
 * @return void
 */
function confirm_result_set($result_set)
{
	if (!$result_set) {
		exit("<p>Database Query Failed.</p>");
	}
}
?> 