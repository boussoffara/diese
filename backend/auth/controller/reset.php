<?php 
require_once('../../../configuration/config.php');
require_once('../../../ressource/includes/header.php');
require_once('../model/admin.php');
require_once('../model/resetModel.php');
require_once('../view/resetForm.php');
$admin = new Admin($db);
//if logged in redirect to members page
if( $admin->is_logged_in() ){ header('Location: ./../index.php'); }

//if form has been submitted process it

$error=reset_model($db);
//define page title
$title = 'Reset Account';

//include header template
set_header($title);

reset_form($error);

set_footer();
?>
