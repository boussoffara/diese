<?php 
require_once('../../../configuration/config.php');
require_once('../../../ressource/includes/header.php');
require_once('../model/intervenant.php');
require_once('../model/resetPasswordModel.php');
require_once('../view/resetPasswordForm.php');
$intervenant = new Intervenant($db);
//if logged in redirect to members page
if( $intervenant->is_logged_in() ){ header('Location: ../../index.php'); }

resetPassword($db,$intervenant);

//define page title
$title = 'Reset Account';

set_header($title);
reset_password_form(); 
set_footer();
?>