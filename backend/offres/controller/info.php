    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/display_details.php');
    require_once('../model/job.php');
    

function info_controller($db){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }

                       $job=new Job($db,$id);
                       display_details($job) ;
                       
}
                       ?>
