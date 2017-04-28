    <?php
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/display_all.php');
    require_once('../model/job.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){

$links=array(
  array('class'=>'root','target'=>'','icon'=>'fa fa-chevron-circle-left fa-fw fa-lg','name'=>'Accueil'),
  array('class'=>'','target'=>'?show=offre','icon'=>'fa fa-comments-o fa-fw fa-lg','name'=>'Liste des Appels d\'offre'),
  array('class'=>'','target'=>'?show=mesoe','icon'=>'fa fa-suitcase fa-fw fa-lg','name'=>'Mes études'),
  array('class'=>'','target'=>'?show=oe','icon'=>'fa fa-black-tie fa-fw fa-lg','name'=>'Liste des Opportunités d&#039;étude'),
  array('class'=>'','target'=>'?show=ee','icon'=>'fa fa-play fa-fw fa-lg','name'=>'Liste des études en cours'),
  array('class'=>'','target'=>'?show=es','icon'=>'fa fa-check-square  fa-fw fa-lg','name'=>'Liste des études signées'),
  array('class'=>'','target'=>'?show=archive','icon'=>'fa fa-archive fa-fw fa-lg','name'=>'Archive'),
);
    $jobs= new Job($db,-1);
    $job_list=array();

    if(isset($_GET["show"])){
        if($_GET["show"]=='mesoe'){
            $ids=$jobs->get_my_ids();
            $links[2]['class']='active';   
        }elseif($_GET["show"]=='oe'){
            $ids=$jobs->get_rub_ids(1);
            $links[3]['class']='active'; 
        }elseif($_GET["show"]=='ee'){
            $ids=$jobs->get_rub_ids(2);
            $links[4]['class']='active'; 
        }elseif($_GET["show"]=='es'){
            $ids=$jobs->get_rub_ids(3);
            $links[5]['class']='active';  
        }elseif($_GET["show"]=='archive'){
            $ids=$jobs->get_rub_ids(4);
            $links[6]['class']='active';  
        }else{
                $ids=$jobs->get_rub_ids(0);
                $links[1]['class']='active';
        }
    }else{
                $ids=$jobs->get_rub_ids(0);
                $links[1]['class']='active';
        }
    
        foreach($ids as $id){
        array_push ($job_list,new Job($db,$id));
    }
    
        if(isset($_GET["delete"])){
        $todelete= new Job($db,$_GET["delete"]);
        $todelete->remove();
        unset($_GET["delete"]);
        header('Location: offres.php?show='.$_GET["show"]);
    }
            if(isset($_GET["set"])){
        $todelete= new Job($db,$_GET["id"]);
        $todelete->set_rubrique($_GET["set"]);
        unset($_GET["set"]);
        unset($_GET["id"]);
        header('Location: offres.php?show='.$_GET["show"]);
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

                       <?php display_jobs($job_list) ; ?>
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