<?php
require_once('../../contact/model/contact.php');
require_once('../../../configuration/config.php');
require_once('../model/admin.php');

function editModel($db){
	
	$admin = new Admin($db);
	
	if(isset($_POST['submit'])){
		if($_POST['nom']=="" || $_POST['prenom'] == ""){
			$error[] = 'nom ou prenom invalid !';
		}
	
				if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) ){
		    $error[] = 'Imposteur! casse toi! (email diese valide requis) ';
		}
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$pseudo =$_POST['pseudo'];


		if(!isset($error)){
			// print_r($_SESSION);
			// echo $_SESSION['user']['idcontact'];
				$stmt = $db->prepare('UPDATE contact SET  nom=:nom,prenom=:prenom,mail=:mail,phone=:phone where idcontact=:id');
				// $stmt = $db->prepare("UPDATE contact SET nom=".$nom.",prenom=".$pr Where idcontact=:id");
			$stmt->execute(array(':id' => $_SESSION['user']['idcontact'], ':nom' => $nom,':prenom' => $prenom,':mail' => $mail,':phone' => $phone));
			
		// $tab = $admin->get_user($pseudo);
		// print_r($admin);
		// echo '<br>0<br>';
		// print_r($tab);
		// echo '<br>1<br>';
		// $_SESSION['user'] = $tab;
		// echo '<br>2<br>';
		// print_r($_SESSION);
		
		// exit();
			/*$stmt = prepare('UPDATE  charge_etude SET  pseudo=:pseudo');
			$stmt->execute(array(
				':pseudo' => $pseudo


			));*/
			}
			header('Location: profil.php');
		}
	
	
	return -1;
}
?>