<?php 
function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

function signup_model($db,$admin){
if(isset($_POST['submit'])){
	print_r($_POST);
	//very basic validation
/*	if(strlen($_POST['pseudo']) < 3){
		$error[] = 'même ton penis est plus long que ton pseudo!';
	} else {*/
		$stmt = $db->prepare('SELECT pseudo FROM charge_all WHERE pseudo = :pseudo');
		$stmt->execute(array(':pseudo' => $_POST['pseudo']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['pseudo'])){
			$error[] = 'Manque de creativité ? pseudo déja existant !';
		}

//	}
	$comb=explode("@",$_POST['email'])[0];
	$nom=explode(".",$comb)[1];
	$prenom=explode(".",$comb)[0];
	if($nom=="" || $prenom == ""){
		$error[] = 'email ensiie invalid!';
	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'même ton penis est plus long que ton pass!';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'même ton penis est plus long que ton pass!';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Schizophréne ? le pass et la confirmation sont différents !';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) /*|| ! endsWith($_POST['email'],'@diese.org')*/){
	    $error[] = 'Imposteur! casse toi! (email diese valide requis) ';
	} else {
		$stmt = $db->prepare('SELECT mail FROM charge_all WHERE mail = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Imposteur ! mail déja existant.';
		}

	}


	//if no errors have been created carry on
	if(!isset($error)){
		//hash the password
		$hashedpassword = $admin->password_hash($_POST['password'], PASSWORD_BCRYPT);



		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO contact (nom,prenom,mail,phone) VALUES ( :nom, :prenom,:email, :phone)');
			$stmt->execute(array(
				':phone' => $_POST['phone'],
				':nom' => $nom,
				':prenom' => $prenom,
				':email' => $_POST['email'],
			));
			$id = $db->lastInsertId('contact_idcontact_seq');
			$stmt = $db->prepare('INSERT INTO charge_etude (idcontact,pseudo ,pass,email_valide,promo) VALUES ( :idcontact, :pseudo, :password,:active,:promo)');
			$stmt->execute(array(
				':idcontact' =>$id,
				':promo' => $_POST['promo'],
				':pseudo' => $_POST['username'],
				':password' => $hashedpassword,
				':active' => $activasion
			));

			if(isset($_POST['intervenant'])){
			$stmt = $db->prepare('INSERT INTO intervenant (idcontact,pseudo ,pass, algerian, email_valide, promo, status_intervenant) VALUES ( :idcontact, :pseudo, :password,:algerian ,:active,:promo,:status_intervenant)');
			$stmt->execute(array(
				':idcontact' =>$id,
				':promo' => $_POST['promo'],
				':pseudo' => $_POST['username'],
				':algerian' => 'FALSE',
				':password' => $hashedpassword,
				':active' => $activasion,
				':status_intervenant'=> 'TRUE'
			));
			}
			//send email
			$to = $_POST['email'];
			$subject = "Registration Confirmation";
			$body = "<p>Thank you for registering at demo site.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			<p>Regards Site Admin</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: ../controller/signup.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}
return $error;}
?>