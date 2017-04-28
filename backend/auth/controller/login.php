<?php
//include config
require_once('../../../configuration/config.php');
require_once('../model/admin.php');
require_once('../../../ressource/includes/header.php');
require_once('../view/loginForm.php');
$admin = new Admin($db);
//check if already logged in move to home page
if( $admin->is_logged_in() ){ header('Location: ../../index.php'); }

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($admin->login($username,$password)){
		$_SESSION['username'] = $username;
		header('Location: ../../index.php');
		exit;

	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

//define page title
$title = 'Login';
set_header($title);
display_login_form ($error);
set_footer();

?>
