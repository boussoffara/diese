    <?php 
    require_once('../../ressource/includes/header.php');
    require_once('../../configuration/config.php');
    require_once('../auth/model/intervenant.php');
    require_once('./view/navBar.php');
   // require_once('./view/sideBar.php');
    //require_once('../contact/view/index/all-contacts.php');
   $intervenant = new intervenant($db);
    
    
if(  $intervenant->is_logged_in() ){
    header('Location: ../offres/controller/offres.php');

}else{
    header('Location: ../auth/controller/login.php');
}
    ?>