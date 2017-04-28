<?php
function reset_model($db){
if(isset($_POST['submit'])){

	//mail validation
	if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid mail address';
	} else {
		$stmt = $db->prepare('SELECT mail FROM intervenant_all WHERE mail = :mail');
		$stmt->execute(array(':mail' => $_POST['mail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['mail'])){
			$error[] = 'mail provided is not on recognised.';
		}

	}

	//if no errors have been created carry on
	if(!isset($error)){

		//create the activasion code
		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE intervenant_all SET reset_token = :token, reset_complete='No' WHERE mail = :mail");
			$stmt->execute(array(
				':mail' => $row['mail'],
				':token' => $token
			));

			//send mail
			$to = $row['mail'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this mail and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(SITEmail);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: login.php?action=reset');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}
return $error;
}
?>