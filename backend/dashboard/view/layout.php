        <?php if($mobileDetect->isMobile() && isset($aclFacadeAcl)) : ?>
            <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style='padding-right:10px'>
                <div class="navbar-header" style="text-align: center;">
                            <!--                     <i class="fa fa-bars fa-fw fa-lg"></i>
                    <button type="button" class="btn btn-default navbar-btn" >Button 1</button>
                    <a><i class="fa fa-bars fa-fw fa-lg" id="menu-toggle"></i></a> -->
                    <ul class="nav navbar-nav">
                        <?php if ($this->sidebar): ?>
                            <li style="display:inline-block">
                                <a style="display:inline-block">
                                    <i class="fa fa-bars fa-fw fa-lg" id="menu-toggle"></i>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if(isset($userAcl)): ?>
                            <li style="display:inline-block">
                                <a style="display:inline-block" href="<?= $this->serverUrl($this->url('user', array('action' => 'myAccount'))) ?>">
                                    <i class="fa fa-user fa-fw fa-lg"></i>
                                </a>
                            </li>
                        <?php endif ?>
                        <li style="display:inline-block"><a style="display:inline-block" href="<?= $this->serverUrl($this->url('auth', array('action' => 'logout'))) ?>"><i class="fa fa-sign-out fa-fw fa-lg"></i></a></li>
                        <?php if($aclFacadeAcl->isAllowedRoute('Notifications_Index_index')): ?>
                            <?= $this->notificationsHelper() ?>
                        <?php endif ?>
                    </ul>
                </div>
            </nav>
        <?php endif ?>
        <div class="container-appli">
            <div class="loader"></div>
            <div class="after-loading">
            <?php

            ?>
            <?php if ($this->sidebar): ?>
            <div class="sidebar">
                <div class="sidebar-wrapper">
                    <?= $this->partial('partial/sidebar', array('sidebar' => $this->sidebar)) ?>
                </div>
            <?php endif ?>
            <?php if(isset($aclFacadeAcl)) : ?>
                <div class="sidebar-wrapper2 scrollbar-custom">
                    <?= $this->partial('partial/sidebar2', array('sidebar' => $this->sidebar)) ?>
                </div>
            <?php endif ?>
                <div class="content">
                    <a href="#" class="btn-back-to-top"><span class="fa fa-angle-up"></span></a>
                    <?= $this->widgetsHelper() ?>
                    <?= $this->navigation('navigation')->breadcrumbs()->setMinDepth(1)->setPartial('partial/breadCrumbs');?>
                    <?= $this->content ?>
                    <div class="text-center">
                        <p>&copy; 2015 - <?= date('Y') ?> by <a href="https://fr.linkedin.com/in/stéphane-chevillard-ab1229b4" target="_blank">Stéphane CHEVILLARD</a> for <a href="http://www.diese.org/" target="_blank">Dièse</a> <?php echo $this->translate('All rights reserved.') ?></p>
                    </div>
                </div>
            <?php if ($this->sidebar): ?>
            </div>
            <?php endif ?>
            </div>
        </div> <!-- /container -->
        <?php
            if(!$mobileDetect->isMobile()) {
                $this->inlineScript()->appendScript(
                    // Enable tooltips only for computer and not for mobile devices (phone and tablet).
                    '$(\'[data-toggle="tooltip"]\').tooltip({ html: true, container: \'body\'});'
                );
            }

        ?>
        <?php echo $this->inlineScript() ?>
    </body>
</html>
<script type="text/javascript">
    $(".after-loading").hide();
    // Limit navbar height to 50px.
    $('.navbar-nav').change(function() {
        var height = $(this).height();
        if( height > 50) {
            $('.navbar-collapse').collapse();
        }
    });

    // Collapse or not the sidebar.
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $(".sidebar").toggleClass("toggled");
    });

    var amountScrolled = 200;

    $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('.btn-back-to-top').fadeIn('slow');
        } else {
            $('.btn-back-to-top').fadeOut('slow');
        }
    });
    $('.btn-back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    $(window).load(function() {
        $(".loader").fadeOut("fast");
    });
    $(window).ready(function() {
        $(".after-loading").show();
    });
    $(window).load(function() {
        moment.locale('fr');
        $(".date-time").html(moment().format('ddd D MMM YYYY H:mm:ss'));
        setInterval(function() {
            $(".date-time").html(moment().format('ddd D MMM YYYY H:mm:ss'));
        }, 1000);
    });
</script>
