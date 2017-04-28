<?php
require_once('candidat.php');
require_once('../../../configuration/config.php');

function apply_for($db){

			$new = new Candidat($db,$_SESSION['pseudo']);
			if(isset($_POST['inscription'])){
			if($new->status == '1'){
				$new->apply_for($_POST['id'],$_POST['disponibilite'],$_POST['date_debut'],$_POST['jeh'],$_POST['message']);
			}else{
			//$new->add($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['phone'],$_POST['adresse']);
			}
			header('Location: ../controller/offres.php');
			}
		
	

}

?>