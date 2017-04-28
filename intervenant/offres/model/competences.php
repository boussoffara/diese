<?php

require_once('candidat.php');
require_once('../../../configuration/config.php');


if(isset($_POST['submit']))
{
	
		$new = new Candidat($db,$_SESSION['pseudo']);
		$new->delete_competences_condidat($_SESSION['idcontact']);
		foreach($_POST['comp'] as $competence){
			        $stmt = $db->prepare('INSERT INTO competence_intervenant (nom,idcontact) VALUES (:nom,:id)');
			        $stmt->execute(array(
			        	':id'=>$_SESSION['idcontact'],
			        	':nom'=>$competence));
		}
	//header('Location: ../controller/offres.php');
	
}

?>