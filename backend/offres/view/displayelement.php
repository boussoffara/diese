<?php 
function display_element($job){ ?>
                                   
<?php


switch ($job->rubrique) {
case 0:
$state='<a>
        <i class="fa fa-comments-o"></i>&nbsp Appel d\'offre
        </a>';
$icon="fa fa-comments-o";
break;
case 1:
$state='<a>
        <i class="fa fa-black-tie"></i>&nbsp Opprotunité
        </a>';
$icon="fa fa-black-tie";
break;
case 2:
$state='<a>
        <i class="fa fa-play"></i>&nbsp En cours
        </a>';
$icon="fa fa-play";
break;
case 3:
$state='<a>
        <i class="fa fa-check-square"></i>&nbsp signée
        </a>';
$icon="fa fa-check-square";
break;
case 4:
$state='<a>
        <i class="fa fa-archive"></i>&nbsp Archive
        </a>';
$icon="fa fa-archive";
break;
}


?>

 <div class="col-xs-12">
    <div class="panel panel-info">
        <!-- Panel Body -->
        <div class="panel-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>
                            <i class="<?php echo $icon; ?> text-info fa-lg"></i>&nbsp;
                            <?php echo $job->nom    ;?>                    </h4>
                    </div>
                                            <div class="col-sm-6 text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#study-opportunity-<?php echo $job->id;?>" onclick="return false">
                                        <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                    </button><div class="btn-group"><button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"> <?php echo $state ; ?> &nbsp;<b class="caret"></b></button>
                <ul class="dropdown-menu" role="menu">
                    
        <li class="">          
        <a onclick="javascript:document.location.href='offres.php?show=<?php echo $_GET['show']."&set=0&id=".$job->id ; ?>'">
        <i class="fa fa-comments-o"></i>&nbsp Appel d'offre
        </a>
        </li>
        <li class="">
        <a onclick="javascript:document.location.href='offres.php?show=<?php echo $_GET['show']."&set=1&id=".$job->id ; ?>'" >
        <i class="fa fa-black-tie"></i>&nbsp Opprotunité
        </a>
        </li>
        <li class="">
        <a onclick="javascript:document.location.href='offres.php?show=<?php echo $_GET['show']."&set=2&id=".$job->id ; ?>'" >
        <i class="fa fa-play"></i>&nbsp En cours
        </a>
        </li>
        <li class="">
        <a onclick="javascript:document.location.href='offres.php?show=<?php echo $_GET['show']."&set=3&id=".$job->id ; ?>'" >
        <i class="fa fa-check-square"></i>&nbsp signée
        </a>
        </li>
        <li class="">
        <a onclick="javascript:document.location.href='offres.php?show=<?php echo $_GET['show']."&set=4&id=".$job->id ; ?>'" >
        <i class="fa fa-archive"></i>&nbsp Archive
        </a> 
        </li>
                    
                    
                    
                    
                    
                    
                </ul></div><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='details.php?show=info&id=<?php echo $job->id; ?>'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button>
                <button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('<?php echo $job->nom;?>','offres.php?delete=<?php echo $job->id; ?>')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>
                           </div>
                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-xs-12">
                            <?php     echo " ".$job->date_debut." ";
                               
                                                                if (is_array($job->competences) || is_object($job->competences)){
                                foreach($job->competences as $comp){
                                    echo "<span class='label label-info'>".$comp."</span> ";
                                }
                                }
                            ?> 
                                
                                
                                
                                <br />
                <i class="fa fa-refresh"data-toggle="tooltip" title="Date de mise à jour de l'opportunité d'étude"></i>&nbsp
            <?php echo $job->date_mise_jour; ?><br />
                <i class="fa fa-black-tie"data-toggle="tooltip" title="Chargé d'étude"></i>&nbsp
            <?php echo $job->charge_etude->nom." ".$job->charge_etude->prenom    ;?><br />
                <i class="fa fa-building"data-toggle="tooltip" title="Entreprise cliente"></i>&nbsp
            <?php echo $job->entreprise->nom    ;?><br />                        </div>
                    </div>
                                                    <div class="row">
                        <div class="collapse" id="study-opportunity-<?php echo $job->id;?>">
                            <div class="col-lg-12">
                <i class="fa fa-briefcase"data-toggle="tooltip" title="Contact client"></i>&nbsp
            <?php echo $job->client->nom." ".$job->client->prenom    ;?> <br />
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <u>Description</u> : 
                     <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;4 avr. 2017 </small>
                    <p>  <?php echo $job->description_privee    ;?> </p>
                </div>
            </div>
        </div>
                        </div>                    </div>
                            </div>
        </div><!-- /.panel-body -->
    
    </div>
</div>
<?php } ?>