<?php

function display_validate_form(){
?>


 <div class="row">
                <!-- Column -->
                <div class="col-lg-12">

                    <!-- Panel -->
                    <div class="panel panel-info">

                        <!-- Panel Heading -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Devenir Intervenant</h3>
                        </div>
                        <!-- /Panel Heading -->

                        <!-- Panel Body -->
                        <div class="panel-body">
                             <form method="POST" enctype="multipart&#x2F;form-data" class="form-horizontal"><fieldset class="form-horizontal">


                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="name">Numero de securité sociale&nbsp;<span class="text-danger">*</span></label>            
                <div class="col-sm-8">
                <input type="text" name="num_secu" required="required" placeholder="Numero de secu" class="default&#x20;form-control" value="" maxlength="255">                                                
                </div>
                </div>
                
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="name">Adresse&nbsp;<span class="text-danger">*</span></label>            
                <div class="col-sm-8">
                <input type="text" name="adresse" required="required" placeholder="Adresse&#x20;" class="default&#x20;form-control" value="" maxlength="255">  
                </div>
                </div>
                 <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="name">Piece d'identité&nbsp;<span class="text-danger">*</span></label>            
                <div class="col-sm-8">
                <input type="file" name="fileToUpload" id="fileToUpload" required="required" >                                                  
                </div>
                </div>
                
                <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">

                <input type="submit" name="submit" class="default&#x20;btn&#x20;btn-success" value="Ajouter">

                <button type="button" name="cancel" class="btn" value="Annuler">Annuler</button>           
                </div>
                </div>
                
                </form>
            </div>
        </div>
           </div>
 </div>

<?php
}
?>
