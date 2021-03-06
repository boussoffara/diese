<?php function display_edit($contact,$error){ ?>
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
                            <form method="GET" action="" class="form-horizontal">
                                <fieldset class="form-horizontal">

                                    <input type="hidden" name="id" value="">
                                    <fieldset id="contact-select-fieldset">
                                        <legend>Choix du contact</legend>
                                        <fieldset>
                                            	
                          <div class="form-group">
                              <label class="col-sm-4&#x20;control-label" for="contact-select-fieldset&#x5B;0&#x5D;&#x5B;id_contact&#x5D;">Choix du contact&nbsp;&nbsp;</label>
                                   <div class="col-sm-8">
                                                    
                                                    <select name="contact-select" class="default&#x20;form-control">
                                                        <option value="">Nouveau contact</option>
                                                        <?php 
                                                        $names=$contact->get_names();
                                                        foreach($names as $name){
                                                            if($name['idcontact']==$contact->id){
                                                            echo "<option  value='".$name['idcontact']."' selected>".$name['nom']." ".$name['prenom']."</option>";
                                                            }else{
                                                                echo "<option value=".$name['idcontact'].">".$name['nom']." ".$name['prenom']."</option>";
                                                            }
                                                        }
                                                        
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    <input type="submit" name="choose-contact" class="default&#x20;btn&#x20;btn-success" value="Choisir">
                                        </fieldset>
                            </form>
                            <h5>NB : Si le champs ci-dessus est laissé libre vous pourrez ajouter un nouveau contact. <br />Sinon vous aurez la possibilité de modifier les informations du contact avant de l'ajouter au carnet d'adresse.</h5>
                            <form method="POST" enctype="multipart&#x2F;form-data" class="form-horizontal">
                                <fieldset class="form-horizontal">
                                    <input type="hidden" name="security" value="3cf7dff1092f63464e756915c8e6f49a-0e20736360bfd51b584ef006c7a43473">

                                    <input type="hidden" name="id" value="<?php if($contact->id != -1){ echo $contact->id; }else{echo -1;} ?>">

                                    <fieldset id="contact-fieldset">
                                        <legend>Informations du contact</legend>
                                        <fieldset>
                                                <?php		if(isset($error)){
                                                	foreach($error as $error){
                                                		echo '<p class="bg-danger">'.$error.'</p>';
                                                	}
                                                } ?>
                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;firstname&#x5D;">Prénom&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" required="required" placeholder="Pr&#xE9;nom" class="default&#x20;form-control"  maxlength="255"> </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;lastname&#x5D;">Nom&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nom" required="required" placeholder="Nom" class="default&#x20;form-control" value="<?php if($contact->id != -1){ echo $contact->nom; } ?>" maxlength="255"> </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;mail&#x5D;">E-mail&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="email" name="mail" required="required" placeholder="E-mail" class="default&#x20;form-control" value="<?php if($contact->id != -1){ echo $contact->mail; } ?>"> </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;phone_number&#x5D;">N° de téléphone&nbsp;&nbsp;</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="text" name="phone" placeholder="N&#xB0;&#x20;de&#x20;t&#xE9;l&#xE9;phone" data-phone_number="true" class="default&#x20;form-control" value="<?php if($contact->id != -1){ echo $contact->phone; }else echo "033"; ?>"> </div>
                                                    <h6 class="help-block default">Ex : 033606060606 (pour un numéro français : 033).</span>
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