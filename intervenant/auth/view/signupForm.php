<?php

function display_signup_form($error)
{
?>
<body class="login-view">
<!-- Row -->
<div class="row">

    <!-- Column -->
    <div class="col-lg-offset-4 col-lg-4">

        <!-- Panel -->
        <div class="panel panel-default">


            <!-- Panel Heading -->
            <div class="panel-heading">
            	<legend>Informations du contact</legend>
            </div><!-- /Panel Heading -->

            <!-- Panel Body -->
            <div class="panel-body">
                            <form method="POST" enctype="multipart&#x2F;form-data" class="form-horizontal">
                                <fieldset class="form-horizontal">

						                                    				<?php
										//check for any errors
										if(isset($error)){
											foreach($error as $error){
												echo '<p class="bg-danger">'.$error.'</p>';
											}
										}
						
										//if action is joined show sucess
										if(isset($_GET['action']) && $_GET['action'] == 'joined'){
											echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
										}
										?>

                                    <input type="hidden" name="returnURI" value="">
                                    <fieldset id="contact-fieldset">
 
                                        <fieldset>
                                            <input type="hidden" name="contact-fieldset&#x5B;0&#x5D;&#x5B;id_contact&#x5D;" value="0">

                                                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;firstname&#x5D;">Pseudo&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="username" id="username" required="required" placeholder="ton pseudo" class="default&#x20;form-control" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" maxlength="255"> </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;mail&#x5D;">E-mail&nbsp;<span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="email" name="email" id="email" required="required" placeholder="E-mail" class="default&#x20;form-control" value="<?php if(isset($error)){ echo $_POST['email']; } ?>"> </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;phone_number&#x5D;">N° de téléphone&nbsp;&nbsp;</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="text" name="phone" placeholder="N&#xB0;&#x20;de&#x20;t&#xE9;l&#xE9;phone" data-phone_number="true" class="default&#x20;form-control" value="033"> </div>
                                                    <h6 class="help-block default">Ex : 033606060606 (pour un numéro français : 033).</span>
                                                                                                                                </div>
        </div>
                                                                                    <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;firstname&#x5D;">Promo&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="promo" id="promo" required="required" placeholder="ta promo" class="default&#x20;form-control" value="<?php if(isset($error)){ echo $_POST['promo']; } ?>" maxlength="255"> </div>
                                            </div>


                                                <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;firstname&#x5D;">Mot de passe&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password" id="password"  required="required" placeholder="ton plat préféré" class="default&#x20;form-control" value="" maxlength="255"> </div>
                                            </div>
                                                                                            <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;firstname&#x5D;">Mot de passe&nbsp;<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="passwordConfirm" id="passwordConfirm" required="required" placeholder="ton plat préféré" class="default&#x20;form-control" value="" maxlength="255"> </div>

                                                </div>


                                                                                        <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;mail&#x5D;">vous  êtes Algerian ? &nbsp;<span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-8">
                                                    <div class="input-group">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name ="algerian" class="styled" id="inlineCheckbox2" value="1" checked>
                        <label for="inlineCheckbox2"> Oui </label>
                    </div>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            
       <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <input type="submit" name="submit" class="default&#x20;btn&#x20;btn-success" value="Ajouter">

                <button type="button" name="cancel" class="btn" value="Annuler" onclick="location.href='login.php'" >Annuler</button>            </div>
        </div>

</fieldset></form>
            </div><!-- /Panel Body -->


        </div><!-- /Panel -->

    </div><!-- /Column -->

</div><!-- /Row -->
    <script type="text/javascript" src="/ressource/js/select2.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/select.js"></script>
<script type="text/javascript" src="/ressource/js/inputmask.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/phonenumber.js"></script>
</body>
<?php
}
?>