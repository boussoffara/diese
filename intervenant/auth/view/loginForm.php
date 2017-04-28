<?php function display_login_form ($error) { ?>

<body class="login-view">
    <div id="auth" class="text-center" style="padding: 10px 0">


        <div class="logo">
            <img alt="" src="/ressource/img/dieselogo.png" style="width: 100%;max-width: 400px;" />
            <div class="text-login">Espace intervenant</div>
            <span class="text-login"><?= $title; ?></span>
        </div>
        <form role="form" class="form-horizontal" method="post" action="" autocomplete="off">



            <div class="login-form-1">
                <div class="main-login-form">
                    <div class="login-group">
                    	            <?php //check for any errors 
            if(isset($error)){ 
            foreach($error as $errors){ ?>
					    <div class="alert alert-dismissable alert-warning">
					    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					    <?php echo($errors) ; ?>
					</div>
					<?php
            	
            	
            } } 
            if(isset($_GET['action'])){ //check the action
            switch ($_GET[ 'action']) 
            { case 'active':
            	echo "<h2 class='bg-success'>Ton compte est activé tu peux te connecter.</h2>";
            break;
            case 'reset': 
            	echo "<h2 class='bg-success'>Verifie ta boite mail! </h2>"; break; 
            case 'resetAccount': 
            	echo "<h2 class='bg-success'>tu peux te connecter maintenant.</h2>"; break;
            	} } ?>
                        <div class="form-group">
                        	
                            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Ton pseudo" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Ton plat préféré" tabindex="3">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="login-button" value="login">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
    


    <div class="etc-login-form">
        <p class="text-login">
                    
                    Pas de compte ? <a href='../controller/signup.php'>inscription</a>
                    <br/>
                    <a href='../controller/reset.php' style="cursor: pointer;"><i class="fa fa-exclamation-triangle"></i> Mot de passe oublié ? <i class="fa fa-exclamation-triangle"></i></a>
                    </p>
                
            
    </div>
    <p class="text-login">
    	<p class="text-login">
    	© 2015 - 2017  Dièse Tous droits réservés.
    	</p>
    	</div>
    </div>
    </div>

    </form>

    </div>
    </div>
</body>
<?php } ?>