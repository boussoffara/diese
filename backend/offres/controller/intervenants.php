    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/details/display_intervenants.php');
    require_once('../view/details/intervenant_element.php');
    require_once('../model/job.php');
    
    


function intervenant_controller($db){
    $jobs= new Job($db,$_GET['id']);
    $job_list=array();
    $job_list=$jobs->candidats;

    
        if(isset($_GET["hire"])){
        $jobs->hireFire($_GET['hire'],1);
        unset($_GET["hire"]);
        header('Location: details.php?show=int&id='.$_GET['id']);
    }
    
     
        if(isset($_GET["fire"])){
        $jobs->hireFire($_GET['fire'],0);
        unset($_GET["fire"]);
        header('Location: details.php?show=int&id='.$_GET['id']);
    }
       

           
 display_jobs($job_list) ; }?>
