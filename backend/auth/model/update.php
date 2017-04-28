<?php
require_once('contact.php');
require_once('../../../configuration/config.php');
function editModel($db){
	if(isset($_POST['submit'])){
		if($_POST['nom']=="" || $_POST['prenom'] == ""){
			$error[] = 'nom ou prenom invalid !';
		}
	
				if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) ){
		    $error[] = 'Imposteur! casse toi! (email diese valide requis) ';
		}

		if(!isset($error)){
			$new = new Contact($db,-1);
			if(isset($_POST['idcontact'])){
				$new->update($_POST['idcontact'],$_POST['pseudo'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['phone']);
			}
			header('Location: ../controller/contacts.php');
		}
	
	}
	return -1;
}
?>