    <?php 
    require_once('../../../ressource/includes/header.php');
    require_once('../../../configuration/config.php');
    require_once('../../auth/model/admin.php');
    require_once('../../dashboard/view/navBar.php');
    require_once('../../dashboard/view/sideBar.php');
    require_once('../view/piechart.php');
    require_once('../view/barchart.php');
    require_once('../model/stat.php');
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    $links=array(
      array('class'=>'root','target'=>'../../','icon'=>'fa fa-chevron-circle-left fa-fw fa-lg','name'=>'Accueil'),
    );
    set_header("Outil Commercial - Contact"); 
    display_nav_bar();
    ?>
</div><script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
        <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
                <div class="sidebar">
                    <?php display_side_bar($links); ?>
                    <div class="content">
                        <?php
                        $stat= new Stat($db);
                        display_chart('la répartition des personnes prospectées',$stat->propects_type(),1) ;
                        display_chart('les moyens utilisés pour prospecter',$stat->propects_origin(),2) ;
                        display_barchart($title,$data,$id);
                        
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