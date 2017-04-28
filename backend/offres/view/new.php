<?php function display_edit($job,$entreprise,$contact,$error){ ?>
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


                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="name">Nom de l'opportunité d'étude&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <input type="text" name="name" required="required" placeholder="Nom&#x20;de&#x20;l&#x27;opportunit&#xE9;&#x20;d&#x27;&#xE9;tude" class="default&#x20;form-control" value="" maxlength="255">                                                    <h6 class="help-block default">Ce nom est utilisé pour tous les documents émis</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="end_date">Date de début&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                                        <input type="datetime" name="end_date" required="required" 
                        step="any" data-picker_locale="fr" data-picker_format="YYYY-MM-DD" data-picker_today_button="true" 
                        data-picker_clear_button="true" data-picker_toolbar="top" data-picker_weeks="true" 
                        data-picker_step="1" data-picker_min="false" data-picker_max="false" 
                        data-picker_target_min="false" data-picker_target_max="false" data-picker_current="true"
                        data-picker_disabled="false" data-picker_enabled="false" data-picker_name="date" 
                        class="default&#x20;form-control" value="2017-04-26">                                                                                                           </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="type">Type d'étude&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <select name="type" required="required" class="default&#x20;form-control"><option value="">Choisissez...</option>
<?php 
$types=$job->get_types();
foreach($types as $type){
    echo "<option value='".$type."'>".$type."</option>";
}

?>
</select>                                                                                                                                                </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="activity">Origine &nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <select name="origine" required="required" class="default&#x20;form-control"><option value="">Choisissez...</option>
<?php 
$types=$job->get_origines();
foreach($types as $type){
    echo "<option value='".$type."'>".$type."</option>";
}

?></select>                                                                                                                                                </div>
        </div>


     <div class="form-group">
           <label class="col-sm-4&#x20;control-label" for="contact-select-fieldset&#x5B;0&#x5D;&#x5B;id_contact&#x5D;">Client &nbsp;&nbsp;</label>
                                                <div class="col-sm-8">
                                                    
                                                    <select name="contact_select" class="default&#x20;form-control">
                                                        <?php 
                                                        $names=$contact->get_names();
                                                        foreach($names as $name){
                                                            if($name['idcontact']==$contact->id){
                                                            echo "<option  value=".$name['idcontact']." selected>".$name['nom']." ".$name['prenom']."</option>";
                                                            }else{
                                                                echo "<option value=".$name['idcontact'].">".$name['nom']." ".$name['prenom']."</option>";
                                                            }
                                                        }
                                                        
                                                        ?>

                                                    </select>
                                                </div></div>




    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="id_company">Entreprise&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                                                                <select name="entreprise_select" class="default&#x20;form-control">
                                                        <?php 
                                                        $names=$entreprise->get_names();
                                                        foreach($names as $name){
                                                            if($name['idcontact']==$contact->id){
                                                            echo "<option  value='".$name['id']."' selected>".$name['nom']."</option>";
                                                            }else{
                                                                echo "<option value=".$name['id'].">".$name['nom']."</option>";
                                                            }
                                                        }
                                                        
                                                        ?>

                                                    </select>                                                                                                                                             </div>
        </div>

    


    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="safety">Indice de confiance /10&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="safety" placeholder="Indice&#x20;de&#x20;confiance&#x20;&#x2F;10" step="1" min="0" max="10" class="default&#x20;form-control" value="">                                                    <h6 class="help-block default">Indiquer votre degré d'optimisme pour sur la signature (entre 1 et 10)</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="project">Description privée&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <textarea name="private"  placeholder="Projet" class="default&#x20;form-control"></textarea>                                                    <h6 class="help-block default">Dites-en plus sur ce que souhaite le client</span>
                                                                                            </div>
        </div>
        
        
                        <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="project">Description publique&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <textarea name="public"  placeholder="Projet" class="default&#x20;form-control"></textarea>                                                    <h6 class="help-block default">Dites-en plus sur ce que souhaite le client</span>
                                                                                            </div>
        </div>
        
        
        
                                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="project">Compétences&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">




<select class="js-example-basic-multiple" name="comp[]"  style="width: 100%" multiple="multiple">
<?php 
$names=$job->get_competences();
foreach($names as $name){
    echo "<option value=".$name.">".$name."</option>";
    
}

?>
</select>
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

    </div><!-- /Column -->

<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
<?php } ?>