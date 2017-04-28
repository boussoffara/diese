<?php 
    require_once('../../contact/model/contact.php');
function display_edit($entreprise,$contact,$error){ ?>
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
            <label class="col-sm-4&#x20;control-label" for="name">Nom du partenariat&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <input type="text" name="name" required="required" placeholder="Nom&#x20;du&#x20;partenariat" class="default&#x20;form-control" value="" maxlength="255">                                                    <h6 class="help-block default">Le nom est de la forme : "Nom de l'entreprise - année de signature ".</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="origin">Origine&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <select name="origin" required="required" class="default&#x20;form-control"><option value="13">CNJE</option>
<option value="14">Relation</option>
<option value="15">Prospection</option>
<option value="16">Ancien client</option>
<option value="17">Contact direct</option>
<option value="18">Autre</option></select>                                                                                                                                                </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="start_date">Date de signature du partenariat&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                                        <input type="datetime" name="start_date" required="required" 
                        step="any" data-picker_locale="fr" data-picker_format="YYYY-MM-DD" data-picker_today_button="true" 
                        data-picker_clear_button="true" data-picker_toolbar="top" data-picker_weeks="true" 
                        data-picker_step="1" data-picker_min="false" data-picker_max="false" 
                        data-picker_target_min="false" data-picker_target_max="false" data-picker_current="true"
                        data-picker_disabled="false" data-picker_enabled="false" data-picker_name="date" 
                        class="default&#x20;form-control" value="2017-04-26">                                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="end_date">Date de fin du partenariat&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                                        <input type="datetime" name="end_date" required="required" 
                        step="any" data-picker_locale="fr" data-picker_format="YYYY-MM-DD" data-picker_today_button="true" 
                        data-picker_clear_button="true" data-picker_toolbar="top" data-picker_weeks="true" 
                        data-picker_step="1" data-picker_min="false" data-picker_max="false" 
                        data-picker_target_min="false" data-picker_target_max="false" data-picker_current="true"
                        data-picker_disabled="false" data-picker_enabled="false" data-picker_name="date" 
                        class="default&#x20;form-control" value="2017-04-26">                                                                                                           </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="goals">Objectifs principaux du partenariat&nbsp;<span class="text-danger">*</span></label>            <div class="col-sm-8">
                                                <textarea name="goals" required="required" placeholder="Objectifs&#x20;principaux&#x20;du&#x20;partenariat" class="default&#x20;form-control"></textarea>                                                    <h6 class="help-block default">Reprendre les points principaux de la convention : événements, communication, formations, subvention ...</span>
                                                                                            </div>
        </div>

    
                <div class="form-group">
            <label class="col-sm-4&#x20;control-label" for="rate">Indice de satisfaction /10&nbsp;&nbsp;</label>            <div class="col-sm-8">
                                                <input type="number" name="rate" placeholder="Indice&#x20;de&#x20;satisfaction&#x20;&#x2F;10" step="1" min="0" max="10" class="default&#x20;form-control" value="">                                                    <h6 class="help-block default">Indiquer votre degré de staisfaction du partenariat (entre 1 et 10)</span>
                                                                                            </div>
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
                                                 <h6 class="help-block default">Indiquer votre client</span>   
                                                </div></div>
                                                
                                                <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-select-fieldset&#x5B;0&#x5D;&#x5B;id_contact&#x5D;">Entreprise&nbsp;&nbsp;</label>
                                                <div class="col-sm-8">
                                                    
                                                    <select name="entreprise_select" class="default&#x20;form-control">
                                                        <?php 
                                                        $names=$entreprise->get_names();
                                                        foreach($names as $name){
                                                            if($name['idcontact']==$contact->id){
                                                            echo "<option  value=".$name['id']." selected>".$name['nom']." ".$name['prenom']."</option>";
                                                            }else{
                                                                echo "<option value=".$name['id'].">".$name['nom']." ".$name['prenom']."</option>";
                                                            }
                                                        }
                                                        
                                                        ?>

                                                    </select>
                                                    <h6 class="help-block default">Indiquer votre Entreprise</span>
                                                </div>
                                            </div>
            <div class="col-sm-8">
                                                
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
    <script type="text/javascript" src="/ressource/js/select2.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/select.js"></script>
<script type="text/javascript" src="/ressource/js/inputmask.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/phonenumber.js"></script>

<?php } ?>