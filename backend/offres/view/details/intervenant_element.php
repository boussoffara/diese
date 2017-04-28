<?php function display_contactElement($contact){ ?>
                                                        
 <div class="col-xs-12">
    <div class="panel panel-info">
        <!-- Panel Body -->
        <div class="panel-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-3">
                        <h4>
                            <i class="fa fa-user text-info fa-lg"></i>&nbsp;
                                            <?php
                            $pseudo=$contact->pseudo!=""?" \"".$contact->pseudo."\" ":" ";
                            echo $contact->nom.$pseudo.$contact->prenom ; ?>              </h4>
                    </div>
                    
                    
                    <div class="col-sm-2">
                        <h4>
                          <?php
                            $cand=$contact->get_candidature($_GET['id']);
                            echo "JEH éstimé: ".$cand[jeh_estime];
                            ?>  
                            
                            
                        </h4>
                    </div>
                                        
                    <div class="col-sm-2">
                        <h4>
                          <?php
                            $cand=$contact->get_candidature($_GET['id']);
                            echo "Disponibilité: ".$cand[disponibilite]."h/semaine";
                            ?>  
                            
                            
                        </h4>
                    </div>
                                        
                    <div class="col-sm-2">
                        <h4>
                          <?php
                            $cand=$contact->get_candidature($_GET['id']);
                            echo "Date début: ".$cand[date_debut];
                            ?>  
                            
                            
                        </h4>
                    </div>
                                            <div class="col-sm-3 text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#study-opportunity-1" onclick="return false">
                                        <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                    </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='details.php?show=info&id=<?php echo $job->id; ?>'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><div class="btn-group">
                
                
                                                        <button type="button" class="btn btn-sm btn-info text-center" data-toggle="tooltip" title="postuler" onclick="javascript:document.location.href='discussion.php?id=<?php echo $_GET['id']."&&inter=".$contact->id;?>'"><i class="fa fa-comments-o fa-lg"></i>&nbsp;<span class="hidden-xs">Conversation</span></button>
                
                </div><div class="btn-group">
                    <?php if($contact->candidat_status($_GET['id'])==0){ ?>
                                                                  <button type="button" class="btn btn-sm btn-success text-center" data-toggle="tooltip" title="postuler" onclick="javascript:document.location.href='details.php?show=int&hire=<?php echo $contact->id."&id=".$_GET['id']; ?>'"><i class="fa fa-check fa-lg"></i>&nbsp;<span class="hidden-xs">Embaucher</span></button>  
                                                                  <?php }else{ ?>
                                                                                                                         <button type="button" class="btn btn-sm btn-danger text-center" data-toggle="tooltip" title="postuler" onclick="javascript:document.location.href='details.php?show=int&fire=<?php echo $contact->id."&id=".$_GET['id']; ?>'"><i class="fa fa-check fa-lg"></i>&nbsp;<span class="hidden-xs">Virer</span></button>   
                                                                                                                         
                                                                  <?php } ?>
                    
                </div>                            </div>
                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-xs-12">
                            <?php     echo " ".$job->date_debut." ";
                                                                if (is_array($contact->competences) || is_object($contact->competences)){
                                foreach($contact->competences as $comp){
                                    echo "<span class='label label-info'>".$comp."</span> ";
                                }
                                }
                            ?> 
                                
                                
                                
                                <br />
                    </div>
                    </div>
                                                    <div class="row">
                        <div class="collapse" id="study-opportunity-1">
                            <div class="col-lg-12">
<br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <u>Message</u> : 
                     <!--<small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;4 avr. 2017 </small>-->
                    <p>  <?php echo $cand[message]    ;?> </p>
                </div>
            </div>
        </div>
                        </div>                    </div>
                            </div>
        </div><!-- /.panel-body -->
    
    </div>
</div>
<?php } ?>