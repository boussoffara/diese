<?php 
function display_element($prospection){ ?>
<?php 
    if(isset($_GET['show']))
    {
        $redirect='&show='.$_GET['show'];
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
                            <i class="fa <?php echo $prospection->lock ==1 ? 'fa fa-check':'fa-comments';  ?>  text-info fa-lg"></i>&nbsp;
                            <?php echo $prospection->id_contact->nom." ".$prospection->id_contact->prenom   ;?>                 
  </h4> </div>
                    
                    
                    
                                            <div class="col-sm-6 text-right">
                                                
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#<?php echo $prospection->id ;?>" onclick="return false">
                                        <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                    </button><div class="btn-group"><button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"> <?php echo $prospection->lock ==1 ? '<i class="fa fa-check"></i> Effectuée':' <i class="fa fa-comments"></i>&nbsp En cours';  ?>&nbsp;<b class="caret"></b></button>
                <ul class="dropdown-menu" role="menu">
                    <li class="">
                        <a onclick="javascript:document.location.href='prospection.php?set=signed&id=<?php echo $prospection->id.$redirect ;?>'">
                            <i class="fa fa-check"></i>&nbsp Effectuée
                        </a>
                    </li>
                
                    <li class="">
                        <a onclick="javascript:document.location.href='prospection.php?set=unsigned&id=<?php echo $prospection->id.$redirect ;?>'">
                            <i class="fa fa-comments"></i>&nbsp En cours
                        </a>
                    </li>
                </ul></div><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='prospect.php?delete=<?php echo $prospection->id.$redirect ;?>'">
                    <span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button>
                    <button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('<?php echo $prospection->id_contact->nom." ".$prospection->id_contact->prenom   ;?>     ','prospection.php?delete=<?php echo $prospection->id.$redirect ;?>')">
                        <span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button><div class="btn-group">
</div>                            </div>
                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-xs-12">
                                <?php echo $prospection->start_date   ;?>   
                                <?php 
                                $type=$prospection->type=='Nouveau Client'?'success':'info';
                                    echo "<span class='label label-".$type."'>".$prospection->type."</span>";

                            ?> <br />
                <i class="fa fa-refresh"data-toggle="tooltip" title="Date de mise à jour de l'opportunité d'étude"></i>&nbsp
             <?php echo $prospection->update_date   ;?><br />
                <i class="fa fa-black-tie"data-toggle="tooltip" title="Chargé d'étude"></i>&nbsp
                  <?php echo $prospection->id_charge->nom." ".$prospection->id_charge->prenom   ;?> 
          <br />
                <i class="fa fa-building"data-toggle="tooltip" title="Entreprise cliente"></i>&nbsp
          <?php echo $prospection->id_company->nom  ;?> <br />                        </div>
                    </div>
                                                    <div class="row">
                        <div class="collapse" id="<?php echo $prospection->id ;?>">
                            <div class="col-lg-12">

            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <u>Objectifs:</u> : 
                    <!-- <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;4 avr. 2017 </small>-->
                    <p> <?php echo $prospection->goals   ;?> </p>
                </div>
            </div>
        </div>
                        </div>                    </div>
                            </div>
        </div><!-- /.panel-body -->
    
    </div>
</div>
<?php } ?>