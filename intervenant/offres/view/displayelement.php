<?php 
function display_element($rub,$job){ ?>

 <div class="col-xs-12">
    <div class="panel panel-info">
        <!-- Panel Body -->
        <div class="panel-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>
                            <i class="fa fa-play text-info fa-lg"></i>&nbsp;
                            <?php echo $job->nom    ;?>                    </h4>
                    </div>
                                            <div class="col-sm-6 text-right">
                            <div class="btn-group">

                                   
                                   
                                        <?php
                                        
                                        
                                        switch ($rub) {
                                        case 0:
                                        ?>
                                         <?php if(!$job->check_applied()):?>
                                        <button type="button" class="btn btn-success text-center" data-toggle="tooltip" title="postuler" onclick="showVerification(<?php echo $job->id;?>)"><i class="fa fa-plus-circle fa-lg"></i>&nbsp;<span class="hidden-xs">Postuler</span></button>
                                        <?php endif ?>
                                        <?php
                                        break;
                                        case 1:
                                         ?>
                                        <button type="button" class="btn btn-success text-center" data-toggle="tooltip" title="postuler" onclick="javascript:document.location.href='discussion.php?id=<?php echo $job->id;?>'"><i class="fa fa-comments-o fa-lg"></i>&nbsp;<span class="hidden-xs">Conversation</span></button>
                                        <?php
                                        break;
                                        case 2:
                                         ?>
                                        <button type="button" class="btn btn-success text-center" data-toggle="tooltip" title="postuler" onclick="javascript:document.location.href='discussion.php?id=<?php echo $job->id;?>'"><i class="fa fa-comments-o fa-lg"></i>&nbsp;<span class="hidden-xs">Conversation</span></button>
                                        <?php
                                        break;
                                        case 3:
                                          ?>
                                        <?php
                                        }
                                        
                                        
                                        ?>
                                        
                                    
                                    </div>
                                         <div class="btn-group">                            <button type="button" class="btn  btn-default" data-toggle="collapse" data-target="#study-opportunity-<?php echo $job->id; ?>" onclick="return false">
                                        <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                    </button>

                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-xs-12">
                                4 avr. 2017<br />
                <i class="fa fa-refresh"data-toggle="tooltip" title="Date de mise à jour de l'opportunité d'étude"></i>&nbsp
            6 avr. 2017<br />
                <i class="fa fa-black-tie"data-toggle="tooltip" title="Chargé d'étude"></i>&nbsp
            <?php echo $job->charge_etude->nom." ".$job->charge_etude->prenom    ;?><br />
                            <i class="fa fa-envelope"data-toggle="tooltip" title="Chargé d'étude"></i>&nbsp
            <?php echo $job->charge_etude->mail    ;?><br />
                            <i class="fa fa-phone"data-toggle="tooltip" title="Chargé d'étude"></i>&nbsp
            <?php echo $job->charge_etude->phone    ;?><br />
                   </div>
                    </div>
                                                    <div class="row">
                        <div class="collapse" id="study-opportunity-<?php echo $job->id; ?>">
                            <div class="col-lg-12">

            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <u>Description</u> : 
                     <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;4 avr. 2017 </small>
                    <p>  <?php echo $job->description_public    ;?> </p>
                </div>
            </div>
        </div>
                        </div>                    </div>
                            </div>
        </div><!-- /.panel-body -->
    </div>
    </div>
</div>

<div class="modal fade" id="myModal<?php echo $job->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Formulaire de Postulation</h4>
        </div><!-- /.modal-header -->

        <div class="modal-body">
            <div></div>
            <div id="Groupe"></div>
            <div id="User"></div>
            <div id="Right"></div>
            <form action="" method="POST">
                <fieldset class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="password">
                        disponibilité&nbsp;
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8 ">
                        <input type="hidden" name="id" value="<?php  echo $job->id; ?>">
                        <input type="number" name="disponibilite" required="required" placeholder="nombres d'heures par semaine" class="default form-control" value="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="password">
                        date de debut&nbsp;
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8 ">
                        <!-- date picker-->
                        <input type="datetime" name="date_debut" required="required" 
                        step="any" data-picker_locale="fr" data-picker_format="YYYY-MM-DD" data-picker_today_button="true" 
                        data-picker_clear_button="true" data-picker_toolbar="top" data-picker_weeks="true" 
                        data-picker_step="1" data-picker_min="false" data-picker_max="false" 
                        data-picker_target_min="false" data-picker_target_max="false" data-picker_current="true"
                        data-picker_disabled="false" data-picker_enabled="false" data-picker_name="date" 
                        class="default&#x20;form-control" value="2017-04-26">
                        <!-- // date picker-->
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-sm-4 control-label" for="password">
                        JEH estimé&nbsp;
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8 ">
                         
                        <input type="number" name="jeh" required="required" placeholder="JEH estimé" class="default form-control" value="">
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-sm-4 control-label" for="password">
                        Message&nbsp;
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8 ">
                        <textarea name="message" rows="10" cols="42" class="default form-control" >Je souhaite postuler à cette offre.</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" name="inscription" class="default btn btn-success" value="Valider" onclick="">
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<script type="text/javascript">

    // Shows modal with the specified data.
    function showVerification(id) {
        myModal.modal('show');
        document.getElementById('Groupe').style.visibility='hidden';
        document.getElementById('User').style.visibility='hidden';
        document.getElementById('Right').style.visibility='hidden';
        //document.getElementById(id).style.visibility='visible';
        
    }
     function showCompetence() {
        myModal.modal('show');
        document.getElementById('Groupe').style.visibility='hidden';
        document.getElementById('User').style.visibility='hidden';
        document.getElementById('Right').style.visibility='hidden';
        //document.getElementById(id).style.visibility='visible';
        
    }
    
</script>

<?php } ?>