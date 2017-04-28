<?php
require_once('job.php');
require_once('../../../configuration/config.php');
function apModel($db){
if(isset($_POST['submit'])){


	if(!isset($error)){
		$new = new Job($db,$_GET['id']);
		$new->set_ap($_POST['ref'],$_POST['JEH_number'],$_POST['JEH_price'],$_POST['TTC_price'],$_POST['duration'],$_POST['type'],$_POST['safety']);
		header('Location: ../controller/details.php?show=info&id='.$_GET['id']);
	}
}
}
?>