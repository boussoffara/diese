    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/display_details.php');
    require_once('../model/job.php');
    require_once('edit.php');
    require_once('ap.php');
    require_once('info.php');
    require_once('intervenants.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){

$links=array(
  array('class'=>'root','target'=>'','icon'=>'fa fa-chevron-circle-left fa-fw fa-lg','name'=>'Accueil'),
  array('class'=>'','target'=>'?show=info&id='.$_GET['id'],'icon'=>'fa fa-info-circle fa-fw fa-lg','name'=>'Opportunité d&#039;étude'),
  array('class'=>'','target'=>'?show=edit&id='.$_GET['id'],'icon'=>'fa fa-pencil-square fa-fw fa-lg','name'=>'Informations principales'),
    array('class'=>'','target'=>'?show=int&id='.$_GET['id'],'icon'=>'fa fa-users fa-fw fa-lg','name'=>'Candidats'),
  array('class'=>'','target'=>'?show=ap&id='.$_GET['id'],'icon'=>'fa fa-money fa-fw fa-lg','name'=>'Avant-projet'),
  //array('class'=>'','target'=>'?show=event&id='.$_GET['id'],'icon'=>'fa fa-calendar fa-fw fa-lg','name'=>'Evenements'),

);
    $jobs= new Job($db,-1);
    $job_list=array();
        if(! isset($_GET["show"]) || $_GET["show"]=='offre' ){
   
    $links[1]['class']='active';
    }


    
        if(isset($_GET["show"])){
        if($_GET["show"]=='info'){
            
            $links[1]['class']='active';  
            
        }elseif($_GET["show"]=='edit'){
            
            $links[2]['class']='active';
            
        }elseif($_GET["show"]=='int'){
            
            $links[3]['class']='active'; 
            
        }elseif($_GET["show"]=='ap'){
            
            $links[4]['class']='active'; 
        }elseif($_GET["show"]=='event'){
            
            $links[5]['class']='active';  
        }elseif($_GET["show"]=='task'){
            
            $links[6]['class']='active';  
        }elseif($_GET["show"]=='files'){
            
            $links[7]['class']='active';  
        }
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

                       <?php 
                       
        if(isset($_GET["show"])){
        if($_GET["show"]=='info'){
            info_controller($db);
        }elseif($_GET["show"]=='edit'){
            edit_controller($db);
            
        }elseif($_GET["show"]=='int'){
            intervenant_controller($db);
        }elseif($_GET["show"]=='ap'){
            ap_controller($db);
        }elseif($_GET["show"]=='event'){
            $links[5]['class']='active';  
        }elseif($_GET["show"]=='task'){
            
            $links[6]['class']='active';  
        }elseif($_GET["show"]=='files'){
            
            $links[7]['class']='active';  
        }
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