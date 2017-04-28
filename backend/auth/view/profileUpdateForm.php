<?php

function display_signup_form($error)
{
?>
<!-- Row -->
<div class="row">

    <!-- Column -->
    <div class="col-lg-offset-4 col-lg-4">

        <!-- Panel -->
        <div class="panel panel-default">

            <!-- Panel Heading -->
            <div class="panel-heading">
                <h3 class="panel-title"><h2>Mise à jour</h2></h3>
            </div><!-- /Panel Heading -->

            <!-- Panel Body -->
            <div class="panel-body">
			<form role="form" method="post" action="" autocomplete="off">
				

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

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="pseudo" value="<?php if(isset($error)){ echo $_POST['pseudo']; } ?>" tabindex="1">
				</div>
									<div class="form-group">
					<input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="phone" value="<?php if(isset($error)){ echo $_POST['phone']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="text" name="promo" id="promo" class="form-control input-lg" placeholder="promo" value="<?php if(isset($error)){ echo $_POST['promo']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="adresse mail" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="mot de passe" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
						</div>
					</div>
				</div>


				
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			
			</form>
            </div><!-- /Panel Body -->


        </div><!-- /Panel -->

    </div><!-- /Column -->

</div><!-- /Row -->

<?php
}
?>