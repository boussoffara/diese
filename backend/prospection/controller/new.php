    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../../contact/model/contact.php');
    require_once('../model/newmodel.php');
    require_once('../view/new.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    
    set_header("Outil Commercial"); 
    display_nav_bar();
    ?>      <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <div class="content">
                        
                        <?php
                        $id=editModel($db);
                        $contact=new Contact($db,$id);
                        $entreprise=new Entreprise($db,$id);
                        display_edit($entreprise,$contact,$error);
                        ?>
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