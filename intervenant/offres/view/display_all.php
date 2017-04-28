<?php 
require("displayelement.php");
function display_jobs($rub,$jobs){
    $count=count($jobs);
        $title        = 'Liste des appels d\'offre';
    $noneTitle   = 'Il n\'y a aucun offre défini.';
    $addTitle    = 'Ajouter un offre';
    $deleteTitle = 'Êtes-vous sûr de vouloir supprimer cet offre ?';

    $noneCompanyTitle = 'Il n\'y a aucune entreprise définie pour ce contact.';
?>
                          <form action method="POST">
    <div class="row">
            <div class="col-lg-6 btn-toolbar pull-left" style="margin-bottom: 16px" role="toolbar">
                <div class="btn-group" role="group">
                    
                    <button type="button" class="btn btn-default text-center" data-toggle="tooltip" title="Filtrer la liste" onclick="$('#search-fields').toggle('fast')"><i class="fa fa-filter fa-lg"></i>&nbsp;<span class="hidden-xs">Filtres</span></button>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 pull-right" style="margin-bottom: 16px">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    <input type="search" name="search" class="form-control" placeholder="Chercher..." value="">
                    <span class="input-group-btn">
                        <button class="btn btn-success hidden-xs" type="submit">Valider</button>
                    </span>
                </div>
            </div>
    </div>

    <div id="search-fields" style="display:none">
        <div class="row">
            <div class="col-xs-8 col-sm-3">
                <select name="state" class="default form-control" onchange="this.form.submit()">
                <option value="">Choisissez le statut ...</option>
                                </select>
            </div>
        </div>
        <br>
    </div>
</form>


<!-- Row -->
<div class="row">

    <!-- Column -->
    <div class="col-lg-12">
        <?php
        // No record defined.
        if ($count == 0): ?>

            <!-- Panel -->
            <div class="panel panel-info">

                <!-- Panel Header -->
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-users fa-fw fa-lg"></i>&nbsp;<span class="hidden-xs"><?= $title ?></span></h3>
                </div><!-- /.panel-heading -->

                <!-- Panel Body -->
                <div class="panel-body">
                    <p><?= $noneTitle ?></br><a href="<?= $addcontactURI ?>"><?= $addTitle ?></a></p>
                </div><!-- /.panel-body -->
            </div>
        <?php
        // Show defined records.
        else: ?>
        <!-- Panel -->
        <div class="panel panel-info">

            
                 <!-- Panel Header -->
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-phone fa-fw fa-lg"></i>&nbsp;<span class="hidden-xs">Liste des appels d'offre</span>
                </div><!-- /.panel-heading -->
                </div>
 <div class="row row-eq-height">
<?php foreach($jobs as $job){
    display_element($rub,$job);
}?>

</div><!-- try here-->
<?php endif ?>
</div><!-- /Panel -->
</div>      
        
    </div><!-- /Column -->
    </div><!-- /Row -->  
    
<?php  
}
?>