<?php
require_once('partner.php');
require_once('../../../configuration/config.php');
function editModel($db){
	if(isset($_POST['submit'])){

			$error[] = 'nom ou prenom invalid !';
		
			$new =new Partner($db,-1);
			$new->add($_POST['name'],$_POST['origin'],$_POST['start_date'],$_POST['end_date'],$_POST['goals'],$_POST['rate'],$_POST['contact_select'],$_POST['entreprise_select']);
			
			header('Location: ../controller/partenaire.php');
		}
}
?>