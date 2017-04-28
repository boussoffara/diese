<?php function display_entrepriseElement($contact){ ?>
                                                        
                        <div class="col-lg-6">
    <div class="panel panel-default">
        <!-- Panel Body -->
        <div class="panel-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4 col-sm-4" align="center">
                        <?php if(file_exists("../../../ressource/img/profiles/".$contact->prenom.".".$contact->nom.".jpg")){
                        $pic= "/ressource/img/profiles/".$contact->prenom.".".$contact->nom.".jpg";
                        }else{
                            $pic="/ressource/img/profile_picture.jpg";
                        }
                        ?>
                        <img alt="User Pic" src="<?php echo $pic; ?>" class="img-responsive img-thumbnail" onclick="" data-toggle="tooltip" title="Editer l'image" style="image-orientation: from-image" ;>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h4>
                            
                            <?php
                            $pseudo=$contact->pseudo!=""?" \"".$contact->pseudo."\" ":" ";
                            echo $contact->nom.$pseudo.$contact->prenom ; ?>       </h4>
                        <div>

                            <i class="fa fa-envelope" data-toggle="tooltip" title="Addresse e-mail"></i>&nbsp <?php echo $contact->mail ;?>
                            <br />
                            <i class="fa fa-phone" data-toggle="tooltip" title="N° de téléphone"></i>&nbsp <?php echo $contact->phone ;?>
                            <br />
                            <i class="fa fa-building" data-toggle="tooltip" title="Travaille dans 1 entreprise(s)"></i>&nbsp
                            <a href="http://outil-commercial.com/contact/110/companies">1 entreprise(s)</a>
                            <br />
                            <div><span class="label label-info"> Diése <?php $contact->role ;?></span> </div>
                            <br /> </div>
                    </div>
                </div>
                <div class="collapse" id="<?php echo $contact->id; ?>">
                    <div class="col-lg-12">

                        <br />
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <small class="pull-right"><i class="fa fa-clock-o"></i>&nbsp;mis à jour : 12/06/2016 16:53 </small>
                                <p>Promo: <?php echo $contact->promo; ?> </p>
                                <p>N° Sécu Sociale : <?php echo $contact->secu; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer text-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#<?php echo $contact->id; ?>" onclick="return false">
                    <span class="fa fa-info" data-toggle="tooltip" title="Détails"></span>
                </button>
                <button type="button" class="btn btn-sm btn-default " onclick="javascript:document.location.href='http://outil-commercial.com/contact/110/companies'"><span class="fa fa-building" data-toggle="tooltip" title="Gérer les entreprises"></span>
                </button>
                <button type="button" class="btn btn-sm btn-default " onclick="javascript:document.location.href='http://outil-commercial.com/contacts/edit/110'"><span class="fa fa-pencil-square-o" data-toggle="tooltip" title="Editer"></span>
                </button>
                <button type="button" class="btn btn-sm btn-default " onclick="javascript:document.location.href='http://outil-commercial.com/user/viewProfile/110'"><span class="fa fa-user" data-toggle="tooltip" title="Voir le profil"></span>
                </button>
                <button type="button" class="btn btn-sm btn-danger " onclick="javascript:showConfirm('<?php echo $contact->nom." ".$contact->prenom ; ?>','?delete=<?php echo $contact->id ?>')"><span class="fa fa-times" data-toggle="tooltip" title="Supprimer"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php } ?>