<?php
require_once('../configuration/config.php');
require_once('./auth/model/admin.php');
require_once('../ressource/includes/header.php');
require_once('./auth/model/signupModel.php');
require_once('./auth/view/signupForm.php');
$admin = new Admin($db);
if( ! $admin->is_logged_in() ){ header('Location: ./auth/controller/login.php'); }
else{ header('Location: ./dashboard/index.php');}
?>