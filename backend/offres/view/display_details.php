<?php 
require("displayelement.php");
function display_details($job){
?>

                 
<style>
 .fa.success {
     color: #5cb85c;
 }
 .fa.failure {
     color: #d9534f;
 }
</style>


<div class="row">
 <div class="col-lg-9 col-lg-offset-1">
     <div class="panel with-nav-tabs panel-info">
         <div class="panel-heading">
                 <ul class="nav nav-tabs text-info">
                     <li class="active">
                         <a href="#infoTab" data-toggle="tab">
                             <i class="fa fa-info-circle fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Général</span>
                         </a>
                     </li>
                     <li>
                         <a href="#detailsTab" data-toggle="tab">
                             <i class=" fa fa-list fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Details</span>
                         </a>
                     </li>
                     <li><a href="#administratorTab" data-toggle="tab"><i class="fa fa-briefcase fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Chargé d'étude</span></a></li>
                     <li><a href="#contactTab" data-toggle="tab"><i class="fa fa-phone fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Contact</span></a></li>
                     <li class=""><a href="#companyTab" data-toggle="tab"><i class="fa fa-building fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Entreprise</span></a></li>
                     <li class=""><a href="#intervenantTab" data-toggle="tab"><i class="fa fa-user fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Intervenant</span></a></li>
<!--                         <li class="dropdown">
                         <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                             <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                         </ul>
                     </li> -->
                 </ul>
         </div>
         <div class="panel-body">
             <div class="tab-content">
                 <div class="tab-pane fade in active" id="infoTab">
                                             <div class="row">
                         <div class="col-lg-6">
                             <p class='text-center'>
                                 <span class='fa fa-pie-chart fa-lg' id="generalStatsAction">
                                     <i class="fa fa-angle-down text-info" data-toggle="tooltip" title="Afficher les Stats..."></i>
                                 </span>
                             </p>
                             <dl class="dl-horizontal" id="generalStats1">
                                 <div class="text-center">
                                     <h1 class="rating-num">
                                         6.0</h1>
                                     <input value="3" class="rating-loading">
                                 </div>
                             </dl>
                             <div class="row">

                             </div>
                             <dl class="dl-horizontal" id="generalStats2">
                                 <dt>Durée de l'opportunité d'étude</dt>
                                 <dd>23 jours</dd>
                                 </br>
                                 <dt>Nombre d'appel</dt>
                                 <dd>N/A Appel</dd>
                                 <dt>Dernier Appel</dt>
                                 <dd>N/A</dd>
                                 </br>
                                 <dt>Nombre de RDV</dt>
                                 <dd>N/A RDV</dd>
                                 <dt>Dernier RDV</dt>
                                 <dd>N/A</dd>
                             </dl>
                         </div>
                         <div class="col-lg-6">
                             <div class="panel panel-danger">
                                 <div class="panel-body">
                                     <p>
                                         <p>Opportunité d&#39;étude enregistré le 2017-01-12 17:04:55</p>

<p>AP en relecture et va être envoyé ce Jeudi.</p>

<p>&nbsp;</p>                                        </p>
                                                                                 <button type="button" class="btn btn-xs btn-default pull-right" autocomplete="off" data-toggle="tooltip" title="éditer" onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunity/95/details/editSummary'"><i class="fa fa-pencil-square-o"></i> </button><br />
                                                                             <h6 class='text-right'>
                                     commentaire mis à jour le : lundi 3 avril 2017                                        </h6>
                                 </div>
                                                                     <div class="panel-footer">
                                     <div class="panel-title text-right">
                                         <i class="fa fa-exclamation-triangle failure" data-toggle="tooltip" title="La dernière mise à jour date de plus d'une semaine"></i>
                                         <span class='text-danger'>Pas à jour !!!</span>
                                     </div>
                                 </div>
                                                                 </div>
                         </div>
                     </div>
                     <div class="col-lg-12">
                         <span class="pull-left">
                             <div class="btn-group ">
                                <button type="button" class="btn btn-xs btn-default" title="En cours">
                                     <i class="fa fa-play"></i>
                                     <span class="hidden-xs">En cours</span>
                                 </button>
                                                                         <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                         <span class="caret"></span>
                                     </button>

                                     <ul class="dropdown-menu" role="menu">
                                                                                 <li><a href="http://outil-commercial.com/studyOpportunity/95/details/updateState/2"><i class="fa fa-pause"></i>&nbsp;En pause</a></li>
                                                                                 <li><a href="http://outil-commercial.com/studyOpportunity/95/details/updateState/3"><i class="fa fa-comments"></i>&nbsp;En négociation</a></li>
                                                                             </ul>
                                                                 </div>
                                                                 <button type="button" class="btn btn-xs btn-warning" autocomplete="off" data-toggle="tooltip" title=" Cloturer l'opportunité d'étude" onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunity/95/details/finalSummary'"><i class="fa fa-archive"></i> Cloturer</button>
                                                         </span>
                         <button type="button" class="btn btn-xs btn-default pull-right" autocomplete="off" data-toggle="tooltip" title="éditer" onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunity/95/details/edit'"><i class="fa fa-pencil-square-o"></i><span class="hidden-xs">Modifier les informations</span></button>
                     </div>
                 </div>



                 <div class="tab-pane fade" id="detailsTab">
                                             <div class="col-lg-6">
                         <dl class="dl-horizontal">
                             <dt>Date de dépot</dt>
                             <dd><?php echo $job->date_debut ;?></dd>
                             <dt>Origine</dt>
                             <dd><?php echo $job->origin ;?></dd>
                             <dt>Type d'étude</dt>
                             <dd><?php echo $job->type ;?></dd>
                             <dt>Technologies</dt>
                             <dd></dd>
                         </dl>
                     </div>
                     <div class="col-lg-6">
                         <dl class="dl-horizontal">
                             <dt>Nombre de JEH</dt>
                             <dd><?php echo $job->nombre_jeh ;?> JEH</dd>
                             <dt>Prix de la JEH</dt>
                             <dd><?php echo $job->prix_jeh ;?> € HT</dd>
                             <dt>Prix de l'étude</dt>
                             <dd> <?php echo $job->prix_ttc ;?> € TTC</dd>
                             <dt>Durée du projet</dt>
                             <dd> <?php echo $job->duree ;?> semaine(s)</dd>
                             <dd></dd>
                         </dl>
                     </div>
                     <div class="col-lg-10 col-lg-offset-1">
                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <dl class="dl-horizontal">
                                     <dt>Description privée</dt>
                                     <dd><dl class="dl-horizontal">
<dd>
<p><?php echo $job->description_privee ;?></p>
</dd>
</dl></dd>
                                 </dl>
                             </div>
                         </div>
                     </div>
                 </div>




                 <div class="tab-pane fade" id="administratorTab">
                                                                         <dl class="dl-horizontal">
                             <dt>Nom</dt>
                             <dd><?php echo $job->charge_etude->nom ;?></dd>
                             <dt>Prénom</dt>
                             <dd><?php echo $job->charge_etude->prenom ;?></dd>
                             <dt>Téléphone</dt>
                             <dd><?php echo $job->charge_etude->phone ;?></dd>
                             <dt>Mail</dt>
                             <dd><?php echo $job->charge_etude->mail ;?></dd>
                         </dl>
                         <button type="button" class="btn btn-xs btn-default pull-right" autocomplete="off" data-toggle="tooltip" title="éditer" onclick="javascript:document.location.href='http://outil-commercial.com/administrators/edit/166'"><i class="fa fa-pencil-square-o"></i> Modifier les informations</button>
                                         </div>






                 <div class="tab-pane fade" id="contactTab">
                                                                                        <dl class="dl-horizontal">
                             <dt>Nom</dt>
                             <dd><?php echo $job->client->nom ;?></dd>
                             <dt>Prénom</dt>
                             <dd><?php echo $job->client->prenom ;?></dd>
                             <dt>Téléphone</dt>
                             <dd><?php echo $job->client->phone ;?></dd>
                             <dt>Mail</dt>
                             <dd><?php echo $job->client->mail ;?></dd>
                         </dl>
                         <button type="button" class="btn btn-xs btn-default pull-right" autocomplete="off" data-toggle="tooltip" title="éditer" onclick="javascript:document.location.href='http://outil-commercial.com/administrators/edit/166'"><i class="fa fa-pencil-square-o"></i> Modifier les informations</button>
                                 </div>






                 <div class="tab-pane fade" id="companyTab">
                     
                                                         <dl class="dl-horizontal">
                                 <dt>Nom</dt>
                                 <dd><?php echo $job->entreprise->nom ;?></dd>
                                 <dt>Type de société</dt>
                                 <dd><?php echo $job->entreprise->type ;?></dd>
                                 <dt>Domaine d'activité</dt>
                                 <dd><?php echo $job->entreprise->domaine ;?></dd>
                                 <dt>Adresse</dt>
                                 <dd><?php echo $job->entreprise->adresse ;?></dd>
                                 <dd></dd>
                             </dl>
                             <button type="button" class="btn btn-xs btn-default pull-right" autocomplete="off" data-toggle="tooltip" title="éditer" onclick="javascript:document.location.href='http://outil-commercial.com/companies/edit/86'"><i class="fa fa-pencil-square-o"></i> Modifier les informations</button>
                                             </div>
 
 
                  <div class="tab-pane fade" id="intervenantTab">
                     
                                                         <dl class="dl-horizontal">
                                                             
                                                                                         <?php     
                                                                if (is_array($job->hired) || is_object($job->hired)){
                                foreach($job->hired as $comp){
                            ?> <dt>Nom</dt>
                             <dd><?php echo $comp->nom ;?></dd>
                             <dt>Prénom</dt>
                             <dd><?php echo $comp->prenom ;?></dd>
                             <dt>Téléphone</dt>
                             <dd><?php echo $compt->phone ;?></dd>
                             <dt>Mail</dt>
                             <dd><?php $comp->mail ;?></dd>
                                    <?php
                                }
                                }else{
                                    echo "<p>Pas d'intervenant</p>";
                                }if(count($job->hired)==0){
                                    echo "<p>Pas d'intervenant</p></br>";
                                }
                            ?> 

                                 <dd></dd>
                             </dl>
                                             </div>                                            

             </div>
             </div>
         </div>
     </div>
 </div>
</div>

<div class="row">
     <div class="col-lg-6 col-lg-offset-3" id="progessBar">
     <div class="progress"  data-toggle="tooltip" title="Cliquez pour afficher les détails">
         <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
             70% Complete
         </div>
     </div>
 </div>
 <div class="col-lg-12" id="monitoringDetails">
     <!-- Panel -->
     <div class="panel panel-info">
         <div class="panel-heading">
             <h3 class="panel-title"><i class="fa fa-black-tie fa-fw fa-lg"></i>&nbsp;Suivi</h3>
         </div><!-- /.panel-heading -->

         <!-- Table -->
         <div class="table-responsive">
             <table class="table table-condensed">
                 <thead>
                     <tr>
                                                     <th class="text-center">
                         1er contact                            </th>
                                                 <th class="text-center">
                         Recrutement intervenant                            </th>
                                                 <th class="text-center">
                         Solution technique                            </th>
                                                 <th class="text-center">
                         Etude de réalisation                            </th>
                                                 <th class="text-center">
                         Rendez-vous                            </th>
                                                 <th class="text-center">
                         Compte-rendu de RDV                            </th>
                                                 <th class="text-center">
                         Cahier des charges                            </th>
                                                 <th class="text-center">
                         Avant-Projet                            </th>
                                                 <th class="text-center">
                         Convention client                            </th>
                                             </tr>
                 </thead>
                 <tbody>
                     <tr>
                                                     <th class="text-center">
                             <i class="fa fa-check-circle success"></i>
                         </br>
                         19/01/2017                            </th>
                                                 <th class="text-center">
                             <i class="fa fa-check-circle success"></i>
                         </br>
                         15/02/2017                            </th>
                                                 <th class="text-center">
                             <i class="fa  fa fa-times-circle failure"></i>
                         </br>
                                                     </th>
                                                 <th class="text-center">
                             <i class="fa  fa fa-times-circle failure"></i>
                         </br>
                                                     </th>
                                                 <th class="text-center">
                             <i class="fa fa-check-circle success"></i>
                         </br>
                         01/03/2017                            </th>
                                                 <th class="text-center">
                             <i class="fa  fa fa-times-circle failure"></i>
                         </br>
                                                     </th>
                                                 <th class="text-center">
                             <i class="fa fa-check-circle success"></i>
                         </br>
                         18/01/2017                            </th>
                                                 <th class="text-center">
                             <i class="fa  fa fa-times-circle failure"></i>
                         </br>
                                                     </th>
                                                 <th class="text-center">
                             <i class="fa  fa fa-times-circle failure"></i>
                         </br>
                                                     </th>
                                             </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
</div>

<div class="row">
 <div class="col-lg-12">
     <div class="panel with-nav-tabs panel-info">
         <div class="panel-heading">
                 <ul class="nav nav-tabs">
                     <li class="active"><a href="#factTab" data-toggle="tab"><i class="fa fa-calendar fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Liste des Evénements</span>&nbsp;<span class="pull-right badge">6</span></a></li>
                     <li><a href="#commentTab" data-toggle="tab"><i class="fa fa-comments fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Liste des Commentaires</span>&nbsp;<span class="pull-right badge">0</span></a></li>
                     <li><a href="#taskTab" data-toggle="tab"><i class="fa fa-tasks fa-fw fa-lg text-info"></i>&nbsp;<span class="visible-lg-inline text-info">Liste des tâches</span>&nbsp;<span class="pull-right badge">0</span></a></li>
                 </ul>
         </div>
         <div class="panel-body"> <!-- style="max-height:750px; overflow-y: auto" -->
             <div class="tab-content" >


                 <div class="tab-pane fade in active" id="factTab">
                                   <div class="row"><div class="col-lg-12">
             <button type="button" class="btn btn-success text-center" data-toggle="tooltip" title="Ajouter un Evenement" onclick="location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit'"><i class="fa fa-plus-circle fa-lg"></i>&nbsp;<span class="hidden-xs">Nouveau</span></button>
           </div></div>
           <br />
                                                                     
             <div class="col-xs-12">
 <div class="panel panel-default">
     <!-- Panel Body -->
     <div class="panel-body">
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-sm-6">
                     <h4>
                         <i class="fa fa-coffee text-info fa-lg"></i>&nbsp;
                         Rendez vous avec le client et l&#039;intervenant                        </h4>
                 </div>
                                         <div class="col-sm-6 text-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#facts-1" onclick="return false">
                                     <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                 </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit/227'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('Rendez\x20vous\x20avec\x20le\x20client\x20et\x20l\x27intervenant','http://outil-commercial.com/studyOpportunities/95/facts/delete/227')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>                            </div>
                     </div>
                                 </div>
                                 <div class="row">
                     <div class="col-xs-12">
                             
             <i class="fa fa-calendar"data-toggle="tooltip" title="Date de l'événement"></i>&nbsp
         2 mars 2017<br />
             <i class="fa fa-tags"data-toggle="tooltip" title="Type d'événement"></i>&nbsp
         Rendez-vous ( Premier contact )<br />                        </div>
                 </div>
                                                 <div class="row">
                     <div class="collapse" id="facts-1">
                         <div class="col-lg-12">
         <br />
         <div class="panel panel-default">
             <div class="panel-body">
                 <u>Commentaires</u> : 
                  <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;2 mars 2017 </small>
                 <p> Ce rendez-vous a permis de discuter sur la projet et mieux cerner les besoins du client. Avec Malik, on a compris son projet. Le problème est de faire communiquer la borne de commande avec les logiciels de caisse. Du coup, on va faire une phase d'analyse ou Malik va étudier des logiciels de caisse pour voir s'ils communiquent avec un API. </p>
             </div>
         </div>
     </div>
                     </div>                    </div>
                         </div>
     </div><!-- /.panel-body -->
 </div>
</div>
                                         
             <div class="col-xs-12">
 <div class="panel panel-default">
     <!-- Panel Body -->
     <div class="panel-body">
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-sm-6">
                     <h4>
                         <i class="fa fa-phone text-primary fa-lg"></i>&nbsp;
                         Rappel du client                        </h4>
                 </div>
                                         <div class="col-sm-6 text-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#facts-2" onclick="return false">
                                     <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                 </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit/226'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('Rappel\x20du\x20client','http://outil-commercial.com/studyOpportunities/95/facts/delete/226')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>                            </div>
                     </div>
                                 </div>
                                 <div class="row">
                     <div class="col-xs-12">
                             
             <i class="fa fa-calendar"data-toggle="tooltip" title="Date de l'événement"></i>&nbsp
         1 mars 2017<br />
             <i class="fa fa-tags"data-toggle="tooltip" title="Type d'événement"></i>&nbsp
         Appel ( Point client )<br />                        </div>
                 </div>
                                                 <div class="row">
                     <div class="collapse" id="facts-2">
                         <div class="col-lg-12">
         <br />
         <div class="panel panel-default">
             <div class="panel-body">
                 <u>Commentaires</u> : 
                  <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;1 mars 2017 </small>
                 <p> J'ai rappelé le client pour savoir si c'était toujours bon pour le rendez vous de demain. Il  m'a un peu pris de haut en me disant: "j'ai pas envie de venir dans votre école si c'est pour que ça débouche sur rien". Il m'a dit qu'il est aller voir des SS2I et qu'il butait sur son projet. Il est quand meme partant pour le rendez vous de demain. </p>
             </div>
         </div>
     </div>
                     </div>                    </div>
                         </div>
     </div><!-- /.panel-body -->
 </div>
</div>
                                         
             <div class="col-xs-12">
 <div class="panel panel-default">
     <!-- Panel Body -->
     <div class="panel-body">
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-sm-6">
                     <h4>
                         <i class="fa fa-phone text-primary fa-lg"></i>&nbsp;
                         Rappel du client                        </h4>
                 </div>
                                         <div class="col-sm-6 text-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#facts-3" onclick="return false">
                                     <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                 </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit/221'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('Rappel\x20du\x20client','http://outil-commercial.com/studyOpportunities/95/facts/delete/221')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>                            </div>
                     </div>
                                 </div>
                                 <div class="row">
                     <div class="col-xs-12">
                             
             <i class="fa fa-calendar"data-toggle="tooltip" title="Date de l'événement"></i>&nbsp
         20 févr. 2017<br />
             <i class="fa fa-tags"data-toggle="tooltip" title="Type d'événement"></i>&nbsp
         Appel ( Premier contact )<br />                        </div>
                 </div>
                                                 <div class="row">
                     <div class="collapse" id="facts-3">
                         <div class="col-lg-12">
         <br />
         <div class="panel panel-default">
             <div class="panel-body">
                 <u>Commentaires</u> : 
                  <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;20 févr. 2017 </small>
                 <p> J'ai rappelé le client pour lui dire que j'avais trouvé un intervenant. Je lui ai demandé qu'on se rencontre avec Malik le Jeudi 2 Mars à 15h au sein de l'école pour qu'on discute de la faisabilité du projet. Il est d'accord. </p>
             </div>
         </div>
     </div>
                     </div>                    </div>
                         </div>
     </div><!-- /.panel-body -->
 </div>
</div>
                                         
             <div class="col-xs-12">
 <div class="panel panel-default">
     <!-- Panel Body -->
     <div class="panel-body">
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-sm-6">
                     <h4>
                         <i class="fa fa-coffee text-info fa-lg"></i>&nbsp;
                         Recrutement intervenant                        </h4>
                 </div>
                                         <div class="col-sm-6 text-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#facts-4" onclick="return false">
                                     <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                 </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit/219'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('Recrutement\x20intervenant','http://outil-commercial.com/studyOpportunities/95/facts/delete/219')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>                            </div>
                     </div>
                                 </div>
                                 <div class="row">
                     <div class="col-xs-12">
                             
             <i class="fa fa-calendar"data-toggle="tooltip" title="Date de l'événement"></i>&nbsp
         15 févr. 2017<br />
             <i class="fa fa-tags"data-toggle="tooltip" title="Type d'événement"></i>&nbsp
         Rendez-vous ( Recrutement intervenant )<br />                        </div>
                 </div>
                                                 <div class="row">
                     <div class="collapse" id="facts-4">
                         <div class="col-lg-12">
         <br />
         <div class="panel panel-default">
             <div class="panel-body">
                 <u>Commentaires</u> : 
                  <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;15 févr. 2017 </small>
                 <p> Malik Zouhiri est venu me voir pour me dire que le projet pouvait l’intéresser, je lui ai donc envoyé le cahier des charges et les documents annexes du projet. 
Il m'a dit que le cahier des charges n'était pas détaillé, j'attends plus de précisions de sa part! </p>
             </div>
         </div>
     </div>
                     </div>                    </div>
                         </div>
     </div><!-- /.panel-body -->
 </div>
</div>
                                         
             <div class="col-xs-12">
 <div class="panel panel-default">
     <!-- Panel Body -->
     <div class="panel-body">
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-sm-6">
                     <h4>
                         <i class="fa fa-phone text-primary fa-lg"></i>&nbsp;
                         Premier contact pour en savoir plus sur le projet du client.                        </h4>
                 </div>
                                         <div class="col-sm-6 text-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#facts-5" onclick="return false">
                                     <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                 </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit/218'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('Premier\x20contact\x20pour\x20en\x20savoir\x20plus\x20sur\x20le\x20projet\x20du\x20client.','http://outil-commercial.com/studyOpportunities/95/facts/delete/218')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>                            </div>
                     </div>
                                 </div>
                                 <div class="row">
                     <div class="col-xs-12">
                             
             <i class="fa fa-calendar"data-toggle="tooltip" title="Date de l'événement"></i>&nbsp
         19 janv. 2017<br />
             <i class="fa fa-tags"data-toggle="tooltip" title="Type d'événement"></i>&nbsp
         Appel ( Premier contact )<br />                        </div>
                 </div>
                                                 <div class="row">
                     <div class="collapse" id="facts-5">
                         <div class="col-lg-12">
         <br />
         <div class="panel panel-default">
             <div class="panel-body">
                 <u>Commentaires</u> : 
                  <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;19 janv. 2017 </small>
                 <p> Le client est très pressé </p>
             </div>
         </div>
     </div>
                     </div>                    </div>
                         </div>
     </div><!-- /.panel-body -->
 </div>
</div>
                                         
             <div class="col-xs-12">
 <div class="panel panel-default">
     <!-- Panel Body -->
     <div class="panel-body">
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-sm-6">
                     <h4>
                         <i class="fa fa-file text-warning fa-lg"></i>&nbsp;
                         Cahier des charges                        </h4>
                 </div>
                                         <div class="col-sm-6 text-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#facts-6" onclick="return false">
                                     <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                                 </button><button type="button" class="btn btn-sm btn-default "onclick="javascript:document.location.href='http://outil-commercial.com/studyOpportunities/95/facts/edit/251'"><span class="fa fa-pencil-square-o"data-toggle="tooltip" title="Editer"></span></button><button type="button" class="btn btn-sm btn-danger "onclick="javascript:showConfirm('Cahier\x20des\x20charges','http://outil-commercial.com/studyOpportunities/95/facts/delete/251')"><span class="fa fa-times"data-toggle="tooltip" title="Supprimer"></span></button>                            </div>
                     </div>
                                 </div>
                                 <div class="row">
                     <div class="col-xs-12">
                             
             <i class="fa fa-calendar"data-toggle="tooltip" title="Date de l'événement"></i>&nbsp
         18 janv. 2017<br />
             <i class="fa fa-tags"data-toggle="tooltip" title="Type d'événement"></i>&nbsp
         Document ( Cahier des charges )<br />                        </div>
                 </div>
                                                 <div class="row">
                     <div class="collapse" id="facts-6">
                         <div class="col-lg-12">
         <br />
         <div class="panel panel-default">
             <div class="panel-body">
                 <u>Commentaires</u> : 
                  <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;18 janv. 2017 </small>
                 <p> Reception du cahier des charges </p>
             </div>
         </div>
     </div>
                     </div>                    </div>
                         </div>
     </div><!-- /.panel-body -->
 </div>
</div>
                                                                     </div>

                 <div class="tab-pane fade" id="commentTab">
                                                          <p>Il n'y a aucun Commentaire de défini.</br><a href="http://outil-commercial.com/studyOpportunities/95/comments/edit">Ajouter un Commentaire</a></p>
                                             </div>
                 <div class="tab-pane fade" id="taskTab">
                                                     <p>Il n'y a aucune Tâche de défini.</br><a href="http://outil-commercial.com/studyOpportunity/95/tasks/edit">Ajouter une Tâche</a></p>
                     
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
<script type="text/javascript">
    var myModal = $('#myModal');

    // Shows modal with the specified data.
    function showConfirm(name, url, id) {
        $('#myModalLabel').text(name);
        myModal.data('url', url);
        myModal.modal('show');
        document.getElementById('Group').style.visibility='hidden';
        document.getElementById('User').style.visibility='hidden';
        document.getElementById('Right').style.visibility='hidden';
        document.getElementById(id).style.visibility='visible';
    }

    // Adds confirmation.
    $('#myModalYes').click(function() {
        var url = myModal.data('url');
        myModal.modal('hide');
        document.location.href = url;
    });
</script>
<script src="/ressource/js/star-rating.min.js"></script>
<script type="text/javascript">


    //$('#monitoringDetails').hide();
    $('#generalStats2').hide();

    $('#progessBar').click(function() {
        if ($('#monitoringDetails').is(":visible")){
            $('#monitoringDetails').hide("slow");
        }
        else $('#monitoringDetails').show("slow");
    });

    $('#generalStatsAction').click(function() {
        if ($('#generalStats2').is(":visible")){
            $('#generalStats2').hide("slow");
            $('#generalStats1').show("slow");
        }
        else {
            $('#generalStats1').hide("slow");
            $('#generalStats2').show("slow");
        }
    });

    $('.rating-loading').rating({
        min: 0,
        max: 5,
        step: 0.5,
        size: 'xs',
        showClear: false,
        showCaption:false
    });

    $('.rating-container input').change(function() {
        var safety = $(this).val() * 2;
        $.post('/studyOpportunity/95/details/updateSafety' + '/' + safety , function(data) {
            var safety = data['safety'];
            var rate = $('.rating-num');
            rate.html(safety + '.0');
        },'json');
    });
</script>
 
                </div>
                        </div>
                        </div>
        </div> <!-- /container -->
                <script type="text/javascript">
    //<!--
    

	$('.notification-dropdown').click(function(e){
        e.preventDefault();
        $('.sidebar-wrapper2').toggleClass('toggled');
		$.post('http://outil-commercial.com/notifications/resetNotificationCount', function(data) {
            if (data['success'] == 1){
            	$('.notification-count').html(0);
            }
        }, 'json');
	});
    
    //-->
</script>
<script type="text/javascript">
    //<!--
    
	$(document).ready(function () {
	    $('.collapse-notification').hide();
	});
	$('.view-more').click(
		function() {
			$('.collapse-notification').show();
			$(this).hide();
		}
	);
	$(window).load(function() {
        PNotify.removeAll();
        $.post('http://outil-commercial.com/notifications/checkNews', function(data) {
            if (data['success'] == 1){
                var messages = data['messages']; // Gets ajax messages.
                PNotify.desktop.permission();
                var link = '#';
                messages.forEach(function(element) {
                    if (element.link)
                        link = 'http://outil-commercial.com' + element.link;
                    new PNotify({
                        title: element.name,
                        text: element.description,
                        type: element.type,
                        styling: 'bootstrap3',
                        icon: 'fa ' + element.icon,
                        desktop: {
                            desktop: true,
                            icon: 'http://outil-commercial.com' + '/img/page-loader.gif',
                        }
                    });
                });
            }
        }, 'json');
        moment.locale('fr');
        $('.notification-date').each(function() {$(this).html(moment.unix($(this).data('unixtime')).fromNow())});
        setInterval(function() {
            $.post('http://outil-commercial.com/notifications/checkNews', function(data) {
                if (data['success'] == 1){
                    var messages = data['messages']; // Gets ajax messages.
                    PNotify.desktop.permission();
                    messages.forEach(function(element, index) {
                        var link = '#';
                        if (element.link)
                            link = 'http://outil-commercial.com' + element.link;
                        new PNotify({
                            title: element.name,
                            text: element.description,
                            type: element.type,
                            styling: 'bootstrap3',
                            icon: 'fa ' + element.icon,
                            desktop: {
                                desktop: true,
                                icon: 'http://outil-commercial.com' + '/img/page-loader.gif',
                            }
                        });
                        $( '.notification-sidebar' ).prepend("<li><a href='"+ link +"'><span class='text-"+ element.type +"'><i class='fa "+ element.icon +" fa-fw'></i>&nbsp;"+ element.name +" </span><br /><span>"+ element.description +"</span> <br /><span><em class='notification-date' data-unixtime='"+moment().unix()+"'>"+ moment().fromNow() +"</em></span></a></li>");
                        var notificationCount = parseInt($('.notification-count').text());
                        notificationCount = notificationCount +1;
                        if (notificationCount > 100){
                            notificationCount = 100 + '+';
                        }
                        $('.notification-count').html(notificationCount);

                    });
                }
            }, 'json');
            $('.notification-date').each(function() {$(this).html(moment.unix($(this).data('unixtime')).fromNow())});
        }, 10000);
    });
    
    //-->
</script>
<script type="text/javascript">
    //<!--
    
	    $('.btn-sidebar2').click(function(e){
	        $('.sidebar-wrapper2').toggleClass('toggled');
			$.post('http://outil-commercial.com/notifications/resetNotificationCount', function(data) {
	            if (data['success'] == 1){
	            	$('.notification-count').html(0);
	            }
	        }, 'json');
		});
	
    //-->
</script>
<script type="text/javascript">
    //<!--
    $('[data-toggle="tooltip"]').tooltip({ html: true, container: 'body'});
    //-->
</script>    </body>
</html>
<script type="text/javascript">
    $(".after-loading").hide();
    // Limit navbar height to 50px.
    $('.navbar-nav').change(function() {
        var height = $(this).height();
        if( height > 50) {
            $('.navbar-collapse').collapse();
        }
    });

    // Collapse or not the sidebar.
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $(".sidebar").toggleClass("toggled");
    });

    var amountScrolled = 200;

    $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('.btn-back-to-top').fadeIn('slow');
        } else {
            $('.btn-back-to-top').fadeOut('slow');
        }
    });
    $('.btn-back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    $(window).load(function() {
        $(".loader").fadeOut("fast");
    });
    $(window).ready(function() {
        $(".after-loading").show();
    });
    $(window).load(function() {
        moment.locale('fr');
        $(".date-time").html(moment().format('ddd D MMM YYYY H:mm:ss'));
        setInterval(function() {
            $(".date-time").html(moment().format('ddd D MMM YYYY H:mm:ss'));
        }, 1000);
    });
</script>
<?php  
}
?>