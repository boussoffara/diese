<?php

function reset_form ($error) {
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
                <h3 class="panel-title"><h2>Reset Password</h2></h3>
            </div><!-- /Panel Heading -->

            <!-- Panel Body -->
            <div class="panel-body">
			<form role="form" method="post" action="" autocomplete="off">
				
				<p><a href='login.php'>Back to login page</a></p>
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
					}
				}
				?>
<fieldset id="contact-fieldset">
                                      <div class="form-group">
                                                <label class="col-sm-4&#x20;control-label" for="contact-fieldset&#x5B;0&#x5D;&#x5B;mail&#x5D;">E-mail&nbsp;<span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="email" name="mail" id="mail" required="required" placeholder="E-mail" class="default&#x20;form-control" value="<?php if(isset($error)){ echo $_POST['email']; } ?>"> </div>
                                                </div>
                                            </div>

				<hr>
				</fieldset>
       <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <input type="submit" name="submit" class="default&#x20;btn&#x20;btn-success" value="Ajouter">
                </div>
                </div>
			</form>
            </div><!-- /Panel Body -->


        </div><!-- /Panel -->

    </div><!-- /Column -->

</div><!-- /Row -->
</body>

<?php
}
?>