 <?php function display_nav_bar(){ ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style='padding-right:10px'>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/backend/dashboard/index.php">
                        <img alt="" src="/ressource/img/dieselogo.png"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" style='display:inline-block,max-height:50px,width:auto,'>
                    
                    <ul class="nav navbar-nav">
                                <li>
                                <a href="/backend/stats/controller/stats.php"><span class="fa fa-line-chart"></span>&nbsp;<span class='hidden-sm hidden-md'>Stats</span></a>
                            </li>                    
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-black-tie"></span>&nbsp;<span class='hidden-sm hidden-md'>Etudes</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   
                                        <li><a href="/backend/offres/controller/offres.php?show=offre">Appels d'offre</a></li>
                                        <li><a href="/backend/offres/controller/offres.php?show=oe">Opportunités d'étude</a></li>
                                        <li><a href="/backend/offres/controller/offres.php?show=ee">Etudes en cours</a></li>
                                        <li><a href="/backend/offres/controller/offres.php?show=es">Etudes signés</a></li>
                                        <li><a href="/backend/offres/controller/offres.php?show=archive">Archive</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="/backend/prospection/controller/prospection.php"><span class="fa fa-phone"></span>&nbsp;<span class='hidden-sm hidden-md'>Prospection</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-briefcase"></span>&nbsp;<span class='hidden-sm hidden-md'>Partenariats</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/backend/partenariat/controller/partenaire.php?show=potentiel">Opportunités de partenariats</a></li>
                                    <li><a href="/backend/partenariat/controller/partenaire.php?show=signed">Partenariats</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-users"></span>&nbsp;<span class='hidden-sm hidden-md'>Acteurs</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                        <li><a href="/backend/contact/controller/contacts.php?show=all">Contacts</a></li>
                                        <li><a href="/backend/contact/controller/contacts.php?show=charge">Chargés d'études</a></li>
                                        <li><a href="/backend/contact/controller/contacts.php?show=intervenant">Intervenants</a></li>
                                        <li><a href="/backend/contact/controller/contacts.php?show=entreprise">Entreprises</a></li>
                                        
                                </ul>
                            </li>
                                                            <li>
                                <a href="/backend/contact/controller/recrutement.php"><span class="fa fa-user-plus"></span>&nbsp;<span class='hidden-sm hidden-md'>Recrutement</span></a>
                            </li>  
                            <!--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span>&nbsp;<span class='hidden-sm hidden-md'></span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <? //php if($aclFacadeAcl->isAllowedRoute('Scheduler_SchedulerJob_index')): ?>
                                    <li><a href="<? //= $this->serverUrl($this->url('modules')) ?>"><? //= $this->translate('Gestion des modules') ?></a></li>
                                    <? //php endif?>
                                    <? //php if($aclFacadeAcl->isAllowedRoute('Modules_Index_index')): ?>
                                    <li><a href="<? //= $this->serverUrl($this->url('scheduler-job')) ?>"><? //= $this->translate('Planification des tâches') ?></a></li>
                                    <? //php endif?>
                                    <? //php if($aclFacadeAcl->isAllowedRoute('Auth_Group_index')): ?>
                                    <li><a href="<? //= $this->serverUrl($this->url('group')) ?>"><? //= $this->translate('Gestion des droits') ?></a></li>
                                    <? //php endif?>
                                    <? //php if($aclFacadeAcl->isAllowedRoute('Tags_Index_index')): ?>
                                    <li><a href="<? //= $this->serverUrl($this->url('tagcategories')) ?>"><? //= $this->translate('Gestion des tags') ?></a></li>
                                    <? //php endif?>
                                    <? //php if($aclFacadeAcl->isAllowedRoute('Templates_Index_index')): ?>
                                    <li><a href="<? //= $this->serverUrl($this->url('templates')) ?>"><? //= $this->translate('Gestion des templates') ?></a></li>
                                    <? //php endif?>
                                    <? //php if($aclFacadeAcl->isAllowedRoute('Front_FrontAbilities_index')): ?>
                                    <li><a href="<? //= $this->serverUrl($this->url('front-abilities', array('action' => 'index'))) ?>"><? //= $this->translate('Gestion du site vitrine') ?></a></li>
                                    <? //php endif?>
                                </ul>
                            </li> -->
                        <? //php endif?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right"><!--
                        <? //php if($aclFacadeAcl->isAllowedRoute('Notifications_Index_index') && !$mobileDetect->isMobile()): ?>
                            <? //= $this->notificationsHelper() ?>
                        <? //php endif?>
                        <? //php if(isset($userAcl)): ?>-->
                        <li class="dropdown hidden-xs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class='visible-inline-lg'><?php echo $_SESSION['adminpseudo']; ?> </span>
                                <span class="fa fa-sliders"></span>&nbsp;<span class='hidden-sm hidden-md'></span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/backend/auth/controller/profil.php">Mon profil</a></li>
                                <li><a href="/backend/auth/controller/profileUpdate.php">Edit compte</a></li>
                                <li><a href="/backend/auth/controller/logout.php">Deconnexion</a></li>
                            </ul>
                        </li>
                        <? //php endif?>
                    </ul>
                    <? //php endif?>
                </div><!--/.nav-collapse -->
        </nav>
        <?php } ?>