<?php
require_once('../../contact/model/contact.php');
require_once('prospect.php');
function editModel($db){
	if(isset($_POST['submit'])){
		

		
		
			$new = new Contact($db,-1);
			if($_GET['id']!=-1 && $_GET['id']!=""){
				$new->update($_GET['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['phone'],$_POST['adresse']);
				$id=$_GET['id'];
			}else{
			$new->add($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['phone'],$_POST['adresse']);
			$id = $db->lastInsertId('contact_idcontact_seq');
			}
			header('Location: ../controller/new.php?id=&contact-select='.$id.'&choose-contact=Choisir');
		
	}
	if(isset($_POST['Ajouter-prospect'])){
		$new= new Prospect($db,-1);
		$new->add($_POST['id'],$_SESSION['adminid'],$_POST['entreprise-select'],$_POST['type'],$_POST['origin'],$_POST['rate'],$_POST['goals']);
		header('Location: ../controller/prospection.php?show=all');
		
	}
	if(isset($_GET['choose-contact'])&&$_GET['contact-select']!=""){
		return $_GET['contact-select'];
		
	}
	return -1;
}
?>