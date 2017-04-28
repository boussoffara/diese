<?php
require_once('contact.php');
require_once('../../../configuration/config.php');
if(isset($_POST['submit'])){/*
	if($_POST['nom']=="" || $_POST['prenom'] == ""){
		$error[] = 'nom ou prenom invalid !';
	}

		*/
	if(!isset($error)){
		echo $_POST['address1'] ;
		$new = new Entreprise($db,-1);
		$new->add($_POST['name'],$_POST['type'],$_POST['activity'],$_POST['email'],
		$_POST['phone_number'],$_POST['adress1'],$_POST['zipcode'],$_POST['city'],$_POST['comment'])	;
		header('Location: ../controller/contacts.php');
	}
}
?>