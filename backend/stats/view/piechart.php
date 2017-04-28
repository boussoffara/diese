 
 
 <?php function display_chart($title,$data,$id){ ?>
 <div id="container<?php echo $id;?>" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
 <script>       
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container<?php echo $id;?>', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<?php echo $title ?>'
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
            name: 'Brands',
            colorByPoint: true,
            
            data: [
                <?php 
                $last_key = end(array_keys($data));
                foreach($data as $key => $value){
                    
                    echo '{name: \''.$value[0].'\',y:'.$value[1].'}';
                    if($key!=$last_key){
                        echo ',';
                    }
                }
               ?>
                ]
        }]
    });
});



</script>

<?php } ?>