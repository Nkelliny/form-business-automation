<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('America/New_York');

//database credentials
define('DBHOST','hostname');
define('DBUSER','username');
define('DBPASS','password');
define('DBNAME','db_name');

//application address
define('DIR','https://yourdomain.com/directory/');
define('SITEEMAIL','contact@yourdomain.com');

try {

	//create PDO connection 
	$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
$user = new User($db); 
?>
