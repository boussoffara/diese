    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/index/all-contacts.php');
    require_once('../view/index/all-entreprise.php');
    require_once('../view/index/contactElement.php');
    require_once('../view/index/entrepriseElement.php');
    require_once('../model/contact.php');
    require_once('../model/entreprise.php');
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
    $ids=$contacts->get_ids();
    $links[1]['class']='active';
    }
    if(isset($_GET["show"])){
        if($_GET["show"]=='intervenant'){
            $ids=$contacts->get_intervenant_ids();
            $links[3]['class']='active';   
        }elseif($_GET["show"]=='charge'){
            $ids=$contacts->get_admin_ids();
            $links[2]['class']='active';     
        }elseif($_GET["show"]=='entreprise'){
            $entreprises= new Entreprise($db,-1);
            $ids=$entreprises->get_ids();
            $links[4]['class']='active';  
        }
    }
    if(isset($_GET["delete"])){
        $todelete= new Contact($db,$_GET["delete"]);
        $todelete->remove();
        unset($_GET["delete"]);
        header('Location: contacts.php');
       
    }
    if($_GET["show"]!='entreprise'){
        foreach($ids as $id){
            array_push ($contact_list,new Contact($db,$id));
        }
    }else{
        foreach($ids as $id){
            array_push ($contact_list,new Entreprise($db,$id));
        }        
    }
    
    set_header("Outil Commercial - Contact"); 
    display_nav_bar();
    ?>
        <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <?php display_side_bar($links); ?>
                    <div class="content">
                       <?php
                       if($_GET["show"]!='entreprise'){
                           
                           display_all_contacts($contact_list);
                           
                       }else{
                           display_all_entreprise($contact_list);
                       }
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