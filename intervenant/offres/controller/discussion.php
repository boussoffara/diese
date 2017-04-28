    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/intervenant.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../view/chat_all.php');
    //require_once('../../dashboard/view/sideBar.php');
    require_once('../model/job.php');
    
    $intervenant = new Intervenant($db);
if(  $intervenant->is_logged_in() ){
    $jobs= new Job($db,$_GET['id']);

        
    $ids=$jobs->get_discussion();
if(isset($_POST['inscription'])){
    $jobs->message($_POST['text']);
    header('Location: ../controller/discussion.php?id='.$_GET['id']);
}
    
    set_header("Contact"); 
    display_nav_bar();
    ?>
        <div class="container-appli"> 
            <!--<div class="loader"></div>-->
            <div class="after-loading">

                    <div class="content">

                       <?php display_chat($ids); ; ?>
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