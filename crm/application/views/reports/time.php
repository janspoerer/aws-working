<script src="<?php echo base_url();?>scripts/custom/get_usernames.js"></script>
<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-list-alt"></span> <?php echo lang("ctn_1141") ?></div>
    <div class="db-header-extra form-inline"> 
     
<?php echo form_open(site_url("reports/time/" . $projectid)) ?>
<div class="btn-group">
    <div class="dropdown">
  <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php echo lang("ctn_470") ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li><a href="<?php echo site_url("reports/time/0") ?>"><?php echo lang("ctn_1000") ?></a></li>
    <?php foreach($projects->result() as $r) : ?>
      <li><a href="<?php echo site_url("reports/time/" . $r->ID) ?>"><?php echo $r->name ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>
</div>
    <div class="form-group">
      <input type="text" name="username" class="input-sm form-control " placeholder="<?php echo lang("ctn_592") ?>" id="username-search" <?php if($user) : ?> value="<?php echo $user->username ?>" <?php endif; ?>>
    </div>
    <div class="form-group">
      <input type="text" name="start_date" class="input-sm form-control datepicker" value="<?php echo $range1 ?>">
    </div>
    <div class="form-group">
      <input type="text" name="end_date" class="input-sm form-control datepicker" value="<?php echo $range2 ?>">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary btn-sm" value="<?php echo lang("ctn_1153") ?>" >
    </div>
    <?php echo form_close() ?>
      
</div>
</div>

<?php if($project) : ?>
<p><?php echo lang("ctn_1171") ?> <b><?php echo $project->name ?></b></p>
<?php endif; ?>

<?php if($user) : ?>
<p><?php echo lang("ctn_1172") ?> <b><?php echo $user->username ?></b></p>
<?php endif; ?>

<hr>

<div class="panel panel-default">
<div class="panel-body">
<h4 class="home-label"><?php echo lang("ctn_1173") ?></h4>
<canvas id="myChart" class="graph-height"></canvas>
</div>
</div>

<hr>

<?php echo lang("ctn_1217") ?> <?php echo $total_time ?>

</div>
<script type="text/javascript">
var ctx = $("#myChart");
    var data = {
        labels: [<?php foreach($dates as $i) : ?>
        "<?php echo $i['date'] ?>",
        <?php endforeach; ?>],
        datasets: [
            {
                label: "<?php echo lang("ctn_278") ?>",
                fill: true,
                lineTension: 0.2,
                backgroundColor: "rgba(29,210,142,0.5)",
                borderColor: "rgba(29,210,142,0.9)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [<?php foreach($results as $i) : ?>
                    <?php echo $i['count'] ?>,
                <?php endforeach; ?>],
                spanGaps: false,
            },
        ]
    };
    Chart.defaults.global.defaultFontFamily = "'Open Sans'";
    Chart.defaults.global.defaultFontSize = 8;
    var options = { title : { text: "" }};
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItems, data) { 
                        
                        var time = get_time_string_simple(convert_simple_time(tooltipItems.yLabel));

                        return time;
                    }
                }
            },
            defaultFontSize: 8,
            responsive: true,
            hover : {
                mode : "single"
            },
            legend : {
                display : false,
                labels : {
                    boxWidth: 15,
                    padding: 10,
                    fontSize: 11,
                    usePointStyle : false
                }
            },
            animation : {
                duration: 2000,
                easing: "easeOutElastic"
            },
            scales : {
                yAxes : [{
                    display: true,
                    title : {
                        fontSize: 11
                    },
                    gridLines : {
                        display : true
                    }
                }],
                xAxes : [{
                    display : true,
                    scaleLabel : {
                        display : false
                    },
                    ticks : {
                        display : true
                    },
                    gridLines : {
                        display : true,
                        drawTicks : false,
                        tickMarkLength: 5,
                        zeroLineWidth: 0,
                    }
                }]
            }
        }
    });

    function convert_simple_time(time) 
    {
        var days = 0;
        var hours = 0;
        var mins = 0;
        var secs = 0;
        if(time <=0) {
            days = 0;
            hours = 0;
            mins = 0;
            secs = 0;
        } else {
            
            hours = parseFloat(time / 3600).toFixed(2);
            
        }
        return [
            days,
            hours, 
            mins, 
            secs,
        ];
    }

    function get_time_string_simple(time) 
    {
        if( (time[0] != undefined) && 
            (time[0] > 1 || time[0] == 0)) {
            var days = '<?php echo lang("ctn_294") ?>';
        } else {
            var days = '<?php echo lang("ctn_295") ?>';
        }
        if((time[1] != undefined) && 
            (time[1] > 1 || time[1] < 1)) {
            var hours = '<?php echo lang("ctn_296") ?>';
        } else {
            var hours = '<?php echo lang("ctn_297") ?>';
        }
        if((time[2] != undefined) && 
            (time[2] > 1 || time[2] == 0)) {
            var mins = '<?php echo lang("ctn_298") ?>';
        } else {
            var mins = '<?php echo lang("ctn_299") ?>';
        }
        if((time[3] != undefined) && 
            (time[3] > 1 || time[3] == 0)) {
            var secs = '<?php echo lang("ctn_300") ?>';
        } else {
            var secs = '<?php echo lang("ctn_301") ?>';
        }
        
        if(time[0] > 0) {
            return time[0] + " " + days + "";
        } else if(time[1] > 0) {
            return time[1] + " " + hours + "";
        } else if(time[2] > 0) {
            return time[2] + " " + mins + "";
        } else if(time[3] > 0) {
            return time[3] + " " + secs + "";
        } else {
            return "0 <?php echo lang("ctn_300") ?>";
        }
    }
</script>