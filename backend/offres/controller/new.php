    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../../contact/model/contact.php');
    require_once('../../contact/model/entreprise.php');
    require_once('../view/new.php');
    require_once('../model/job.php');
    require_once('../model/newModel.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    $contact=new Contact($db,-1);
    $entreprise=new Entreprise($db,-1);
    $job=new Job($db,-1);
    newModel($db);
    set_header("Outil Commercial"); 
    display_nav_bar();
    ?>      <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <div class="content">
                        <?php display_edit($job,$entreprise,$contact,$error); ?>
                    </div>
                <!--</div>
            </div>-->
        </div>
        <!-- /container -->
        <?php
    set_footer();
}else{
    header('Location: ../../auth/controller/login.php');
}
    ?>