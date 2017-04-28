 <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/intervenant.php');
    require_once('../../dashboard/view/navBar.php');
    //require_once('../../dashboard/view/sideBar.php');
    require_once('../view/competences.php');
    require_once('../model/job.php');
    require_once('../model/candidat.php');
    require_once('../model/competences.php');
    
    $intervenant = new Intervenant($db);
if(  $intervenant->is_logged_in() ){
    $jobs= new Job($db,-1);
    $candidat = new Candidat($db,$_SESSION['pseudo']);
    //apply_for($db);
    $job_list=array();
    $ids=$jobs->get_rub_ids(1);
        foreach($ids as $id){
        array_push ($job_list,new Job($db,$id));
    }
    
    set_header("Competences"); 
    display_nav_bar();
    ?>
        <div class="container-appli"> 
            <!--<div class="loader"></div>-->
            <div class="after-loading">
                <!--<div class="sidebar"> -->
                    <?php //display_side_bar($links); ?>
                    <div class="content">

                       <?php display_competences_form($candidat);?>
                    </div>
                <!--</div>-->
            </div>
        </div>
        <!-- /container -->
        <?php

    
    
    set_footer();
}else{
    header('Location: ../../auth/controller/login.php');
}
    ?>
    
