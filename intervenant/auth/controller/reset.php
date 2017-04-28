<?php 
require_once('../../../configuration/config.php');
require_once('../../../ressource/includes/header.php');
require_once('../model/intervenant.php');
require_once('../model/resetModel.php');
require_once('../view/resetForm.php');
$intervenant = new Intervenant($db);
//if logged in redirect to members page
if( $intervenant->is_logged_in() ){ header('Location: ../../index.php'); }

//if form has been submitted process it

$error=reset_model($db);
//define page title
$title = 'Reset Account';

//include header template
set_header($title);

reset_form($error);

set_footer();
?>
