    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/index/recrutement.php');
    require_once('../view/index/contactElement.php');
    require_once('../model/contact.php');
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    $links=array(
      array('class'=>'root','target'=>'../../','icon'=>'fa fa-chevron-circle-left fa-fw fa-lg','name'=>'Accueil'),
      array('class'=>'','target'=>'?show=all','icon'=>'fa fa-users fa-fw fa-lg','name'=>'Tous les contacts'),
      array('class'=>'','target'=>'?show=charge','icon'=>'fa fa-black-tie fa-fw fa-lg','name'=>'Chargés d\'études'),
      array('class'=>'','target'=>'?show=intervenant','icon'=>'fa fa-users fa-fw fa-lg','name'=>'Intervenants'),
      array('class'=>'','target'=>'?show=entreprise','icon'=>'fa fa-building-o fa-fw fa-lg','name'=>'Entreprises')
      
    );
    $contacts= new Contact($db,-1);
    $contact_list=array();
    
    if(! isset($_GET["show"]) || $_GET["show"]=='all' ){
    $ids=$contacts->get_recrutement_ids();
    $links[1]['class']='active';
    }
    if(isset($_GET["activate"])){
        $todelete= new Contact($db,$_GET["activate"]);
        $todelete->activate();
        unset($_GET["activate"]);
        header('Location: recrutement.php');
       
    }
        if(isset($_GET["deactivate"])){
        $todelete= new Contact($db,$_GET["deactivate"]);
        $todelete->desactivate();
        unset($_GET["deactivate"]);
        header('Location: recrutement.php');
       
    }
    foreach($ids as $id){
        array_push ($contact_list,new Contact($db,$id));
    }
    
    set_header("Outil Commercial - Recrutement"); 
    display_nav_bar();
    ?>
        <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <?php // display_side_bar($links); ?>
                    <div class="content">
                       <?php  display_recrutement($contact_list); ?> 
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