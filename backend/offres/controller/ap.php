    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/details/display_ap.php');
    require_once('../../contact/model/contact.php');
    require_once('../../contact/model/entreprise.php');
    require_once('../model/job.php');
    require_once('../model/apModel.php');
    

function ap_controller($db){
    apModel($db);
    $contact=new Contact($db,-1);
    $entreprise=new Entreprise($db,-1);
    $job=new Job($db,-1);
    display_ap($job,$entreprise,$contact,$error);

                       
}
                       ?>
