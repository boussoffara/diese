<?php
require_once('job.php');
require_once('../../../configuration/config.php');
function newModel($db){
if(isset($_POST['submit'])){


	if(!isset($error)){
		$new = new Job($db,-1);
		$new->add($_POST['name'],$_POST['end_date'],$_POST['type'],$_POST['origine'],$_POST['contact_select'],
		$_POST['entreprise_select'],$_POST['safety'],$_POST['private'],$_POST['public']);
		$id=$db->lastInsertId('appel_offre_id_seq');
		foreach($_POST['comp'] as $competence){
			        $stmt = $db->prepare('INSERT INTO competence_offre (id,competence) VALUES (:id,:nom)');
			        $stmt->execute(array(
			        	':id'=>$id,
			        	':nom'=>$competence));
		}
		header('Location: ../controller/offres.php');
	}
}
}
?>