    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/display_all.php');
    require_once('../view/display.php');
    require_once('../model/prospect.php');
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    $links=array(
      array('class'=>'root','target'=>'../../','icon'=>'fa fa-chevron-circle-left fa-fw fa-lg','name'=>'Accueil'),
      array('class'=>'','target'=>'?show=potentiel','icon'=>'fa fa-users fa-fw fa-lg','name'=>'Prospect potentiels '),
      array('class'=>'','target'=>'?show=signed','icon'=>'fa fa-black-tie fa-fw fa-lg','name'=>'Prospection effectuée'),
      
    );
    $contacts= new Prospect($db,-1);
    $contact_list=array();
    
    if(! isset($_GET["show"]) || $_GET["show"]=='all' ){
    $ids=$contacts->get_ids();
    $links[1]['class']='active';
    }
    if(isset($_GET["show"])){
        if($_GET["show"]=='potentiel'){
            $ids=$contacts->get_potential_ids();
            $links[1]['class']='active';   
        }elseif ($_GET["show"]=='signed'){
             $ids=$contacts->get_signed_ids();
            $links[2]['class']='active';           
        }else{
             $ids=$contacts->get_ids();
            $links[1]['class']='active';           
        }
    }
    if(isset($_GET["delete"])){
        $todelete= new Prospect($db,$_GET["delete"]);
        $todelete->remove();
        unset($_GET["delete"]);
        header('Location: prospection.php?show='.$_GET["show"]);
    }
    if(isset($_GET['set'])){
        $todelete= new Prospect($db,$_GET["id"]);
        if($_GET['set']=='signed'){
            
            $todelete->set_signed();

        }else{
            $todelete->set_unsigned();
        }
        unset($_GET["set"]);
        header('Location: prospection.php?show='.$_GET["show"]);   
    

   
    }
    foreach($ids as $id){
        array_push ($contact_list,new Prospect($db,$id));
    }
    
    set_header("Outil Commercial - Prospection"); 
    display_nav_bar();
    ?>
        <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <?php display_side_bar($links); ?>
                    <div class="content">
                       <?php display_partnerships($contact_list); ?> 
                    </div>
                <!--</div>
            </div>-->
        </div>
        <!-- /container -->
        <?php
    set_footer();
}else{
    header('Location: ../auth/controller/login.php');
}
    ?>