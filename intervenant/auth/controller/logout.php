<?php require_once('../../../configuration/config.php');
require_once('../model/intervenant.php');
//logout
$intervenant = new Intervenant($db);
$intervenant->logout(); 

//logged in return to index page
header('Location: ../../index.php');
exit;
?>