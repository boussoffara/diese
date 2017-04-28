<?php
function display_competences_form($candidat){
?>

            <form action="" method="POST">
                <fieldset class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4&#x20;control-label" for="project">Compétences&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                    <select class="js-example-basic-multiple" name="comp[]"  style="width: 100%" multiple="multiple">
                    <?php 
                    $names=$candidat->get_competences();
                    foreach($names as $name){
                        if(in_array($name, $candidat->get_competences_intervenant())){
                            echo "<option value=".$name." selected>".$name."</option>";
                        }else{
                            echo "<option value=".$name.">".$name."</option>";
                        }
                    
                    }?>
                    </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success text-center" name="submit" data-toggle="tooltip" title="Enregistrer" onclick=""><i class="fa fa-check">
                       
                    </i>&nbsp;<span class="hidden-xs">Enregistrer</span></button>
                </div>
                </fieldset>
            </form>

<script type="text/javascript">

var myModal = $('#myModal<?php echo $job->id; ?>');
    $(".js-example-basic-multiple").select2();

    
</script>

<?php } ?>