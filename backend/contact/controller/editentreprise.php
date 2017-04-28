    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/index/editentreprise.php');
    require_once('../model/entreprise.php');
    require_once('../model/editentrepriseModel.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    $entreprises= new Entreprise($db,-1);
    $contact_list=array();
    $ids=$entreprises->get_ids();
            foreach($ids as $id){
            array_push ($contact_list,new Entreprise($db,$id));
    } 
    if(count($contact_list)==0){
        array_push($contact_list,$entreprises);
    }
    set_header("Outil Commercial"); 
    display_nav_bar();
    ?>      <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <div class="content">
                        <?php display_edit($contact_list,$error); ?>
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