    <?php require_once('../../ressource/includes/header.php');
    require_once('../../configuration/config.php');
    require_once('../auth/model/admin.php');
    require_once('../dashboard/view/navBar.php');
    require_once('../dashboard/view/sideBar.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    set_header("Contact"); 
    display_nav_bar();
    set_footer();
}else{
    header('Location: ../auth/controller/login.php');
}
    ?>