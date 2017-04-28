<?php

function display_ap($job,$entreprise,$contact,$error){
    ?>
<!-- Row -->
<div class="row">

    <!-- Column -->
    <div class="col-lg-12">

        <!-- Panel -->
        <div class="panel panel-info">

            <!-- Panel Heading -->
            <div class="panel-heading">
                <h3 class="panel-title">Menu interactif pour borne de commande</h3>
            </div><!-- /Panel Heading -->

            <!-- Panel Body -->
            <div class="panel-body">

                <form method="POST" enctype="multipart&#x2F;form-data" class="form-horizontal"><fieldset class="form-horizontal">
        <input type="hidden" name="security" value="9a6abe3b3748edcfc1252ffc4fbe4e8a-f28d47ecbdebb04da8b019b0d206bb16">

        <input type="hidden" name="id" value="95">

                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="ref">Référence&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <input type="text" name="ref" required="required" placeholder="R&#xE9;f&#xE9;rence" class="default&#x20;form-control" value="" maxlength="255">                                                    <h6 class="help-block default">Pour le moment elle est toujours donnée par le SI.</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="JEH_number">Nombre de JEH&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="JEH_number" placeholder="Nombre&#x20;de&#x20;JEH" step="1" class="default&#x20;form-control" value="">                                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="JEH_price">Prix de la JEH&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="JEH_price" placeholder="Prix&#x20;de&#x20;la&#x20;JEH" step="10" min="80" max="340" class="default&#x20;form-control" value="">                                                    <h6 class="help-block default">Indiquer le prix Hors Taxes</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="TTC_price">Prix TTC&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="TTC_price" placeholder="Prix&#x20;TTC" step="1" class="default&#x20;form-control" value="">                                                    <h6 class="help-block default">Indiquer le prix TTC avec les frais forfaitaires</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="duration">Durée du projet (semaine)&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="duration" placeholder="Dur&#xE9;e&#x20;du&#x20;projet&#x20;&#x28;semaine&#x29;" step="1" class="default&#x20;form-control" value="">                                                                                                            </div>
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
            <label class="col-sm-4&#x20;control-label" for="safety">Indice de confiance /10&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="safety" placeholder="Indice&#x20;de&#x20;confiance&#x20;&#x2F;10" step="1" min="0" max="10" class="default&#x20;form-control" value="6">                                                    <h6 class="help-block default">Indiquer votre degré d'optimisme pour sur la signature (entre 1 et 10)</span>
                                                                                            </div>
        </div>

    
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <input type="submit" name="submit" class="default&#x20;btn&#x20;btn-success" value="Modifier">

                <button type="button" name="cancel" class="btn" value="Annuler">Annuler</button>            </div>
        </div>

</fieldset></form>
            </div><!-- /Panel Body -->

        </div><!-- /Panel -->

    </div><!-- /Column -->

</div><!-- /Row -->




<?php
}
?>