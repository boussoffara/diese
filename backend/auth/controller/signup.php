<?php 
require_once('../../../configuration/config.php');
require_once('../model/admin.php');
require_once('../../../ressource/includes/header.php');
require_once('../model/signupModel.php');
require_once('../view/signupForm.php');
$admin = new Admin($db);
//if logged in redirect to members page
if( $admin->is_logged_in() ){ header('Location: ../../index.php'); }
//if form has been submitted process it
$error=signup_model($db,$admin);
//define page title
$title = 'Inscription';
set_header($title);
display_signup_form($error);
set_footer();
?>
