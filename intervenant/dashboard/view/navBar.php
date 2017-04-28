 <?php 
 function display_nav_bar(){ ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style='padding-right:10px'>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/intervenant/dashboard/index.php">
                        <img alt="" src="/ressource/img/dieselogo.png"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" style='display:inline-block,max-height:50px,width:auto,'>
                    
                    <ul class="nav navbar-nav">
                                <li>
                                <a href="/intervenant/offres/controller/offres.php"><span class="fa fa-suitcase"></span>&nbsp;<span class='hidden-sm hidden-md'>Appel d'offre</span></a>
                            </li>                    
                        
                            <li>
                                <a href="/intervenant/offres/controller/mes_candidature.php"><span class="fa fa-user"></span>&nbsp;<span class='hidden-sm hidden-md'>Mes candidatures</span></a>
                            </li>
                        
                            </li>
                            <li>
                                <a href="/intervenant/offres/controller/etudes_encours.php"><span class="fa fa-paper-plane"></span>&nbsp;<span class='hidden-sm hidden-md'>Mes etudes en cours </span></a>
                            </li>  
                            <li>
                                <a href="/intervenant/offres/controller/historique.php"><span class="fa fa-history"></span>&nbsp;<span class='hidden-sm hidden-md'>Historique</span></a>
                            </li> 
                            <li>
                                <a href="/intervenant/offres/controller/competences.php"><span class="fa fa-history"></span>&nbsp;<span class='hidden-sm hidden-md'>Competences</span></a>
                            </li>
                            <li>
                                <a href="/intervenant/offres/controller/devenirIntervenant.php"><span class="fa fa-check-circle-o"></span>&nbsp;<span class='hidden-sm hidden-md'>Devenir Intervenant</span></a>
                            </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right"><!--
                        <? //php if($aclFacadeAcl->isAllowedRoute('Notifications_Index_index') && !$mobileDetect->isMobile()): ?>
                            <? //= $this->notificationsHelper() ?>
                        <? //php endif?>
                        <? //php if(isset($userAcl)): ?>-->
                        <li class="dropdown hidden-xs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class='visible-inline-lg'><?php echo $_SESSION['pseudo']; ?> </span>
                                <span class="fa fa-sliders"></span>&nbsp;<span class='hidden-sm hidden-md'></span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/intervenant/auth/controller/profileUpdate.php">Mon profil</a></li>
                                <li><a href="/intervenant/auth/controller/profileUpdate.php">Mon compte</a></li>
                                <li><a href="/intervenant/auth/controller/logout.php">Deconnexion</a></li>
                            </ul>
                        </li>
                        <? //php endif?>
                    </ul>
                    <? //php endif?>
                </div><!--/.nav-collapse -->
        </nav>
        
        <?php 
        
        
        } ?>