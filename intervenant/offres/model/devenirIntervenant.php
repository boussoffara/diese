<?php

require_once('candidat.php');
require_once('../../../configuration/config.php');


if(isset($_POST['submit']))
{
	
		$new = new Candidat($db,$_SESSION['pseudo']);
		$new->add_secu($_POST['num_secu']);
		$new->add_address($_POST['adresse']);
		$new->validate_account();
	//header('Location: ../controller/offres.php');
	
}

?>