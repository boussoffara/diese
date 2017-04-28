    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../view/details/chat_all.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../model/job.php');
    
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){

$links=array(
  array('class'=>'root','target'=>'details.php?show=int&id='.$_GET['id'],'icon'=>'fa fa-chevron-circle-left fa-fw fa-lg','name'=>'Retour'),
);
    $jobs= new Job($db,$_GET['id']);

        
    $ids=$jobs->get_discussion($_GET['inter']);
if(isset($_POST['inscription'])){
    $jobs->message($_POST['text'],$_GET['inter']);
    header('Location: ../controller/discussion.php?id='.$_GET['id']."&&inter=".$_GET['inter']);
}
    
    set_header("Contact"); 
    display_nav_bar();
    ?>
        <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <?php display_side_bar($links); ?>
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