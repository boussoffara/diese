<?php 
require("display.php");
function display_partnerships($jobs){
    $count=count($jobs);
        $title        = 'Liste des prospections';
    $noneTitle   = 'Il n\'y a aucune prospections défini.';
    $addTitle    = 'Ajouter une prospections';
    $deleteTitle = 'Êtes-vous sûr de vouloir supprimer cette prospections ?';

    $noneCompanyTitle = 'Il n\'y a aucune entreprise définie pour ce contact.';
?>
                          <form action method="POST">
    <div class="row">
            <div class="col-lg-6 btn-toolbar pull-left" style="margin-bottom: 16px" role="toolbar">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success text-center" data-toggle="tooltip" title="Ajouter une prospection" onclick="location.href='/backend/prospection/controller/new.php'"><i class="fa fa-plus-circle fa-lg"></i>&nbsp;<span class="hidden-xs">Nouveau</span></button>
                    <button type="button" class="btn btn-default text-center" data-toggle="tooltip" title="Filtrer la liste" onclick="$('#search-fields').toggle('fast')"><i class="fa fa-filter fa-lg"></i>&nbsp;<span class="hidden-xs">Filtres</span></button>
                    <button class="btn btn-primary hidden-xs" type="submit" value='1' name="excel" data-toggle="tooltip" title="Exporter vers Excel"><i class="fa fa-file-excel-o fa-lg"></i>&nbsp;<span class="hidden-xs">Exportation</span></button>
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
                    <h3 class="panel-title"><i class="fa fa-users fa-fw fa-lg"></i>&nbsp;<span class="hidden-xs"><?= $title ?></span></h3>
                </div><!-- /.panel-heading -->

                <!-- Panel Body -->

            </div>
        <!-- Panel -->
       
 <div class="row row-eq-height">
<?php foreach($jobs as $job){
    display_element($job);
}?>

</div><!-- try here-->
<?php endif ?>
</div><!-- /Panel -->
</div>      
        
    </div><!-- /Column -->
    </div><!-- /Row -->  
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
    <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Confirmer la suppression</h4>
        </div><!-- /.modal-header -->

        <div class="modal-body">
            <div>Êtes-vous sûr de vouloir supprimer ce prospect ?</div>
            <div id="Group"></div>
            <div id="User"></div>
            <div id="Right"></div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="myModalYes">Oui</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
        </div><!-- /.modal-footer -->

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
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
<?php  
}
?>