<?php 
require_once('../../../configuration/config.php');
require_once('../model/intervenant.php');
require_once('../../../ressource/includes/header.php');
require_once('../model/signupModel.php');
require_once('../view/profileUpdateForm.php');
require_once('../../dashboard/view/navBar.php');
$intervenant = new Intervenant($db);
//if logged in redirect to members page
if(! $intervenant->is_logged_in() ){ header('Location: ../../index.php'); }
//if form has been submitted process it
$error=signup_model($db,$intervenant);
//define page title
$title = 'Inscription';
set_header($title);
display_nav_bar();
display_signup_form($error);
set_footer();
?>
