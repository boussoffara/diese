<?php function display_edit($contact_list,$error){ ?>
            <!-- new -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12">

                    <!-- Panel -->
                    <div class="panel panel-info">

                        <!-- Panel Heading -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Ajout Contact</h3>
                        </div>
                        <!-- /Panel Heading -->

                        <!-- Panel Body -->
                        <div class="panel-body">
                    <form method="POST" enctype="multipart&#x2F;form-data" class="form-horizontal"><fieldset class="form-horizontal">
        <input type="hidden" name="security" value="aaee40f51cfb8a69a221740a7ffdeb68-e4cd82bfc928e21912ca89c3e2ed2e9d">

        <input type="hidden" name="id" value="">
<fieldset id="company-fieldset"><legend>Informations de l&#039;entreprise</legend><fieldset>
        <input type="hidden" name="id_company" value="0">

                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="name">Nom&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <input type="text" name="name" required="required" placeholder="Nom" class="default&#x20;form-control" value="" maxlength="255">                                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="type">Type d'entreprise&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <select name="type" required="required" class="default&#x20;form-control"><option value="">Choisissez...</option>
<?php 
$types=$contact_list[0]->get_types();
foreach($types as $type){
    echo "<option value='".$type."'>".$type."</option>";
}

?>
</select>                                                                                                                                                </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="activity">Domaine d'activités&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <select name="activity" required="required" class="default&#x20;form-control"><option value="">Choisissez...</option>
<?php 
$types=$contact_list[0]->get_domaines();
foreach($types as $type){
    echo "<option value='".$type."'>".$type."</option>";
}

?></select>                                                                                                                                                </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="mail">E-mail&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                    <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input class="default&#x20;form-control" type="email" name="email" value="">                                            </div>
                                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="phone_number">N° de téléphone&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                    <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input type="text" name="phone_number" placeholder="N&#xB0;&#x20;de&#x20;t&#xE9;l&#xE9;phone" data-phone_number="true" class="default&#x20;form-control" value="">                                            </div>
                                                    <h6 class="help-block default">Ex : 033606060606 (pour un numéro français : 033).</span>
                                                                                                                                </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="adress1">Adresse&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="text" name="adress1" placeholder="Adresse" class="default&#x20;form-control" value="">                                                    <h6 class="help-block default">Indiquer la rue et son n°</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="adress2">Complément d'adresse&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="text" name="adress2" placeholder="Compl&#xE9;ment&#x20;d&#x27;adresse" class="default&#x20;form-control" value="">                                                    <h6 class="help-block default">Indiquer le complément d'adresse : immeuble, lieu-dit ...</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="zipcode">Code postal&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="zipcode" placeholder="Code&#x20;postal" step="1" class="default&#x20;form-control" value="">                                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="city">Ville&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="text" name="city" placeholder="Ville" class="default&#x20;form-control" value="">                                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="comment">Commentaires&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <textarea name="comment" placeholder="Commentaires" class="default&#x20;form-control"></textarea>                                                    <h6 class="help-block default">Indiquer s'il a quelquechose de particulier à savoir sur cette entreprise</span>
                                                                                            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <input type="submit" name="submit" class="default&#x20;btn&#x20;btn-success" value="Ajouter">

                <button type="button" name="cancel" class="btn" value="Annuler">Annuler</button>            </div>
        </div>

</fieldset></form>
            </div><!-- /Panel Body -->

        </div><!-- /Panel -->
    <script type="text/javascript" src="/ressource/js/select2.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/select.js"></script>
<script type="text/javascript" src="/ressource/js/inputmask.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/phonenumber.js"></script>
    </div><!-- /Column -->

<?php } ?>