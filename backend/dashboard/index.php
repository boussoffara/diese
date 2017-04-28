    <?php require_once('../../ressource/includes/header.php');
    require_once('../../configuration/config.php');
    require_once('../auth/model/admin.php');
    require_once('./view/navBar.php');
    require_once('./view/sideBar.php');
    require_once('../contact/view/index/all-contacts.php');
    
    $admin = new Admin($db);
if(  $admin->is_logged_in() ){
    set_header("Contact"); 
    display_nav_bar();
    ?>
            <div class="container-appli">
            <!--<div class="loader"></div>
            <div class="after-loading">-->
     
                    
                    <div class="content">
    <div class="row">
    <div class="col-lg-8 col-md-12" >
        <div class="row hidden-xs">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading" onclick="javascript:document.location.href=''" style="cursor: pointer;">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-black-tie fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= count($studyOpportunities) ?></div>
                                <div>Opportunités d'étude</div>
                            </div>
                        </div>
                    </div>
                    <a href="#studyOpportunityTab" data-toggle="tab">
                        <div class="panel-footer">
                            <span class="pull-left">Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading" onclick="javascript:document.location.href=''" style="cursor: pointer;">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-phone fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= count($prospections) ?></div>
                                <div>Prospections</div>
                            </div>
                        </div>
                    </div>
                    <a href="#prospectionTab" data-toggle="tab">
                        <div class="panel-footer">
                            <span class="pull-left">Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading" onclick="javascript:document.location.href=''" style="cursor: pointer;">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-briefcase fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Partenariats</div>
                            </div>
                        </div>
                    </div>
                    <a href="#partnerTab" data-toggle="tab">
                        <div class="panel-footer">
                            <span class="pull-left">Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading" onclick="javascript:document.location.href=''" style="cursor: pointer;">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-pencil fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= count($studies) ?></div>
                                <div>Etudes</div>
                            </div>
                        </div>
                    </div>
                    <a href="#studyTab" data-toggle="tab">
                        <div class="panel-footer">
                            <span class="pull-left">Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>


        </div>
</div><script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                            
                <!--</div>
            </div>-->
        </div>
        <!-- /container -->
<script>Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Average fruit consumption during one week'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Fruit units'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'John',
        data: [3, 4, 3, 5, 4, 10, 12]
    }, {
        name: 'Jane',
        data: [1, 3, 4, 3, 3, 5, 4]
    }]
});

$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'personnes prospectées',
            colorByPoint: true,
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33
            }, {
                name: 'Chrome',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Firefox',
                y: 10.38
            }, {
                name: 'Safari',
                y: 4.77
            }, {
                name: 'Opera',
                y: 0.91
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2
            }]
        }]
    });
});



</script>
    <?php
    set_footer();
}else{
    header('Location: ../auth/controller/login.php');
}
    ?>