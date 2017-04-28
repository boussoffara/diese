<?php
require_once('../../../configuration/config.php');
require_once('../model/intervenant.php');
$intervenant = new Intervenant($db);
//collect values from the url
$memberID = trim($_GET['x']);
$active = trim($_GET['y']);

//if the row was updated redirect the user
if($intervenant->activate($memberID,$active)){

	//redirect to login page
	header('Location: login.php?action=active');
	exit;

} else {
	echo "Your account could not be activated.";
}

?>
