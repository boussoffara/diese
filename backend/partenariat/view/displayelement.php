<?php 
function display_element($job){ ?>

 <div class="col-xs-12">
    <div class="panel panel-info">
        <!-- Panel Body -->
        <div class="panel-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>
                            <i class="fa fa-check  text-info fa-lg"></i>&nbsp;
                            <?php echo $job->name    ;?>                    </h4>
                    </div>
                                            <div class="col-sm-6 text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#<?php echo $job->id ;?>" onclick="return false">
                                        <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                    </button><div class="btn-group"><button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"> <?php echo $job->lock ==1 ?"Signé":"En négociation";  ?>&nbsp;<b class="caret"></b></button>
                <ul class="dropdown-menu" role="menu">
                    <li class="">
                        <a onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/updateState/122/2'">
                            <i class="fa fa-check"></i>&nbsp Signé
                        </a>
                    </li>
                
                    <li class="">
                        <a onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/updateState/122/3'">
                            <i class="fa fa-comments"></i>&nbsp En négociation
                        </a>
                    </li>
                </ul></div><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunity/122/details'">
                    <span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('<?php echo $job->name   ;?>','partenaire.php?delete=<?php echo $job->id;?>')">
                        <span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button><div class="btn-group">
</div>                            </div>
                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-xs-12">
                                <?php echo $job->start_date   ;?>    <br />
                <i class="fa fa-refresh"data-toggle="tooltip" title="Date de mise à jour de l'opportunité d'étude"></i>&nbsp
             <?php echo $job->update_date   ;?><br />
                <i class="fa fa-black-tie"data-toggle="tooltip" title="Chargé d'étude"></i>&nbsp
                  <?php echo $job->id_charge->nom." ".$job->id_charge->prenom   ;?> 
          <br />
                <i class="fa fa-building"data-toggle="tooltip" title="Entreprise cliente"></i>&nbsp
          <?php echo $job->id_company->nom  ;?> <br />                        </div>
                    </div>
                                                    <div class="row">
                        <div class="collapse" id="<?php echo $job->id ;?>">
                            <div class="col-lg-12">
                <i class="fa fa-briefcase"data-toggle="tooltip" title="Contact client"></i>&nbsp
            <?php echo $job->id_contact->nom." ".$job->id_contact->prenom  ;?><br />
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <u>Objectifs:</u> : 
                    <!-- <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;4 avr. 2017 </small>-->
                    <p> <?php echo $job->goals   ;?> </p>
                </div>
            </div>
        </div>
                        </div>                    </div>
                            </div>
        </div><!-- /.panel-body -->
    
    </div>
</div>
<?php } ?>