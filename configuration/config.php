<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/Paris');

//database credentials
define('DBHOST','localhost');
define('DBUSER','ubuntu');
define('DBPASS','c5');
define('DBNAME','c5');


//application address
define('DIR','http://domain.com/');
define('SITEEMAIL','outil_commercial@diese.org');

try {

	//create PDO connection
	$db = new PDO("pgsql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
include('phpmailer/mail.php');
//include the user class, pass in the database connection

?>
