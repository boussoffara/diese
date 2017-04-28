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
                <h3 class="panel-title"><h2>Information profile</h2></h3>
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
			/*	if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
			*/	?>

				<div class="form-group">
				pseudo:	<input type="text" name="userpseudo" id="userpseudo" class="form-control input-lg" placeholder="pseudo" value="<?php echo $_SESSION['user']['pseudo'] ;?>" tabindex="1">
				</div>
									<div class="form-group">
				nom: <input type="text" name="nom" id="nom" class="form-control input-lg" placeholder="phone" value="<?php  echo $_SESSION['user']['nom'];  ?>" tabindex="1">
				</div>
				<div class="form-group">
				mail:	<input type="text" name="mail" id="mail" class="form-control input-lg" placeholder="promo" value="<?php  echo $_SESSION['user']['mail'];  ?>" tabindex="1">
				</div>
				<div class="form-group">
				adresse:	<input type="email" name="adresse" id="adresse" class="form-control input-lg" placeholder="adresse mail" value="<?php  echo $_SESSION['user']['adresse'];  ?> tabindex="2">
				</div>
					<div class="form-group">
				phone	<input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="phone" value="<?php  echo $_SESSION['user']['phone'];  ?>" tabindex="1">
				</div>

			
			</form>
            </div><!-- /Panel Body -->


        </div><!-- /Panel -->

    </div><!-- /Column -->

</div><!-- /Row -->

<?php
}
?>