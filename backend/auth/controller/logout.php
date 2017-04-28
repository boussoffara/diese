<?php require_once('../../../configuration/config.php');
require_once('../model/admin.php');
//logout
$admin = new Admin($db);
$admin->logout(); 

//logged in return to index page
header('Location: ../../index.php');
exit;
?>