<?php $prioritys = array(1 => "<span class='label label-info'>".lang("ctn_531")."</span>", 2 => "<span class='label label-primary'>".lang("ctn_532")."</span>", 3=> "<span class='label label-warning'>".lang("ctn_533")."</span>", 4 => "<span class='label label-danger'>".lang("ctn_534")."</span>"); ?>
<div class="white-area-content">

<div class="row">

<div class="col-md-3">
<div class="dashboard-window clearfix" style="background: #62acec; border-left: 5px solid #5798d1;">
	<div class="d-w-icon">
		<span class="glyphicon glyphicon-folder-close giant-white-icon"></span>
	</div>
	<div class="d-w-text">
		 <span class="d-w-num"><?php echo $projects_count ?></span><br /><?php echo lang("ctn_535") ?>
	</div>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-window clearfix" style="background: #5cb85c; border-left: 5px solid #4f9f4f;">
	<div class="d-w-icon">
		<span class="glyphicon glyphicon-tasks giant-white-icon"></span>
	</div>
	<div class="d-w-text">
		 <span class="d-w-num"><?php echo $tasks_count ?></span><br /><?php echo lang("ctn_536") ?>
	</div>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-window clearfix" style="background: #f0ad4e; border-left: 5px solid #d89b45;">
	<div class="d-w-icon">
		<span class="glyphicon glyphicon-time giant-white-icon"></span>
	</div>
	<div class="d-w-text">
		 <span class="d-w-num"><?php echo $time_count ?></span><br /><?php echo lang("ctn_537") ?>
	</div>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-window clearfix" style="background: #d9534f; border-left: 5px solid #b94643;">
	<div class="d-w-icon">
		<span class="glyphicon glyphicon-user giant-white-icon"></span>
	</div>
	<div class="d-w-text">
		 <span class="d-w-num"><?php echo $online_count ?></span><br /><?php echo lang("ctn_139") ?>
	</div>
</div>
</div>

</div>

<hr>

<div class="row">
<div class="col-md-9">
<?php if($this->settings->info->enable_finance && $this->common->has_permissions(array("admin", "project_admin", "finance_worker", "finance_manage"), $this->user)) : ?>
<div class="block-area align-center">
<h4 class="home-label"><?php echo lang("ctn_538") ?></h4>
<div class="finance-blob">
<p class="finance-blob-unit"><?php echo $this->settings->info->fp_currency_symbol ?><span id="num1">834,394</span></p>
<?php echo lang("ctn_539") ?>
</div>
<div class="finance-blob">
<p class="finance-blob-unit"><?php echo $this->settings->info->fp_currency_symbol ?><span id="num2">34,394</span></p>
<?php echo lang("ctn_540") ?>
</div>
<div class="finance-blob">
<p class="finance-blob-unit"><?php echo $this->settings->info->fp_currency_symbol ?><span id="num3">798,394</span></p>
<?php echo lang("ctn_541") ?>
</div>
<canvas id="myChart" class="graph-height"></canvas>
</div>
<?php endif; ?>

<?php if($this->common->has_permissions(array("project_client"), $this->user)) : ?>
<div class="content-separator block-area">
<h4 class="home-label"><?php echo lang("ctn_766") ?></h4>

<?php foreach($client_projects->result() as $r) : ?>
<div class="fp-project">
	<p><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->image ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo strip_tags($r->description) ?>"></p>
	<p><?php echo $r->name ?></p>
	<div class="progress" style="height: 15px;">
	  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $r->complete ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $r->complete ?>%" title="<?php echo $r->complete ?>%" data-toggle="tooltip" data-placement="bottom">
	    <span class="sr-only"><?php echo $r->complete ?>% <?php echo lang("ctn_790") ?></span>
	  </div>
	</div>
	<?php if($this->common->has_permissions(array("project_client"), $this->user)) : ?>
		<p><a href="<?php echo site_url("tasks/client/" . $r->ID) ?>" class="btn btn-primary btn-xs"><?php echo lang("ctn_1204") ?></a></p>
	<?php endif; ?>
</div>
<?php endforeach; ?>

</div>
<?php endif; ?>

<?php if($this->settings->info->enable_invoices && $this->common->has_permissions(array("admin", "project_admin", "invoice_manage"), $this->user)) : ?>
<div class="content-separator block-area">
<h4 class="home-label"><?php echo lang("ctn_542") ?></h4>
<div class="table-responsive">
<table class="table small-text table-bordered table-striped table-hover">
<tr class="table-header"><td><?php echo lang("ctn_543") ?></td><td width="60"><?php echo lang("ctn_544") ?></td><td width="60"><?php echo lang("ctn_545") ?></td><td width="40"><?php echo lang("ctn_546") ?></td><td><?php echo lang("ctn_547") ?></td></tr>
<?php foreach($invoices->result() as $r) : ?>
	<?php
	if($r->status == 1) {
		$status = "<label class='label label-danger'>".lang("ctn_548")."</label>";
	} elseif($r->status == 2) {
		$status = "<label class='label label-success'>".lang("ctn_549")."</label>";
	} elseif($r->status == 3) {
		$status = "<label class='label label-default'>".lang("ctn_550")."</label>";
	}
	?>
<tr><td><a href="<?php echo site_url("invoices/view/" . $r->ID . "/" . $r->hash) ?>"><?php echo $r->title ?></a></td><td><?php echo $r->symbol ?><?php echo number_format($r->total, 2) ?></td><td><?php echo $status ?></td><td> <?php echo $this->common->get_user_display(array("username" => $r->client_username, "avatar" => $r->client_avatar, "online_timestamp" => $r->client_online_timestamp)) ?></td><td><?php echo date($this->settings->info->date_format, $r->due_date) ?></td></tr>
<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<?php if($this->settings->info->enable_invoices && $this->common->has_permissions(array("invoice_client"), $this->user)) : ?>
<div class="content-separator block-area">
<h4 class="home-label"><?php echo lang("ctn_551") ?></h4>
<div class="table-responsive">
<table class="table small-text table-bordered table-striped table-hover">
<tr class="table-header"><td><?php echo lang("ctn_543") ?></td><td width="60"><?php echo lang("ctn_544") ?></td><td width="60"><?php echo lang("ctn_545") ?></td><td width="40"><?php echo lang("ctn_546") ?></td><td><?php echo lang("ctn_547") ?></td></tr>
<?php foreach($client_invoices->result() as $r) : ?>
	<?php
	if($r->status == 1) {
		$status = "<label class='label label-danger'>".lang("ctn_548")."</label>";
	} elseif($r->status == 2) {
		$status = "<label class='label label-success'>".lang("ctn_549")."</label>";
	} elseif($r->status == 3) {
		$status = "<label class='label label-default'>".lang("ctn_550")."</label>";
	}
	?>
<tr><td><a href="<?php echo site_url("invoices/view/" . $r->ID . "/" . $r->hash) ?>"><?php echo $r->title ?></a></td><td><?php echo $r->symbol ?><?php echo number_format($r->total, 2) ?></td><td><?php echo $status ?></td><td> <?php echo $this->common->get_user_display(array("username" => $r->client_username, "avatar" => $r->client_avatar, "online_timestamp" => $r->client_online_timestamp)) ?></td><td><?php echo date($this->settings->info->date_format, $r->due_date) ?></td></tr>
<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<?php if($this->settings->info->enable_tickets && $this->common->has_permissions(array("ticket_client"), $this->user)) : ?>
<div class="content-separator block-area">
<h4 class="home-label"><?php echo lang("ctn_552") ?></h4>
<div class="table-responsive">
<table class="table small-text table-bordered table-striped table-hover">
<tr class="table-header"><td><?php echo lang("ctn_543") ?></td><td><?php echo lang("ctn_553") ?></td><td><?php echo lang("ctn_545") ?></td><td><?php echo lang("ctn_554") ?></td><td><?php echo lang("ctn_555") ?></td></tr>
<?php $statuses = array(1=>lang("ctn_556"), 2 => lang("ctn_557"), 3 => lang("ctn_558"));?>
<?php foreach($client_tickets->result() as $r) : ?>
<tr><td><?php echo $r->title ?></td><td><?php echo $prioritys[$r->priority] ?></td><td><?php echo $statuses[$r->status] ?></td><td><?php echo date($this->settings->info->date_format, $r->last_reply_timestamp) ?></td><td><a href="<?php echo site_url("tickets/view/" . $r->ID) ?>" class="btn btn-primary btn-xs"><?php echo lang("ctn_555") ?></a></td></tr>
<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<div class="content-separator block-area">
<h4 class="home-label"><?php echo lang("ctn_559") ?></h4>
<div class="table-responsive">
<table class="table small-text table-bordered table-striped table-hover">
<tr class="table-header"><td width="30"><?php echo lang("ctn_560") ?></td><td><?php echo lang("ctn_543") ?></td><td><?php echo lang("ctn_561") ?></td><td><?php echo lang("ctn_555") ?></td></tr>
<?php foreach($notifications->result() as $r) : ?>
<tr><td> <?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)) ?></td><td><a href="<?php echo site_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a> <?php echo $r->message ?></td><td><?php echo date($this->settings->info->date_format, $r->timestamp) ?></td><td><a href="<?php echo site_url("home/load_notification/" . $r->ID) ?>" class="btn btn-primary btn-xs"><?php echo lang("ctn_555") ?></a></td></tr>
<?php endforeach; ?>
</table>
</div>
</div>

</div>
<div class="col-md-3">
<?php if($this->settings->info->enable_tasks && $this->common->has_permissions(array("admin", "project_admin", "task_worker", "task_manage"), $this->user)) : ?>
<div class="panel panel-default">
<div class="panel-body">
<h4 class="home-label"><?php echo lang("ctn_562") ?></h4>

<div class="task-blob">
<table class="table">
<?php foreach($tasks->result() as $r) : ?>
<tr><td width="30">
<a href="<?php echo site_url("tasks/view/" . $r->ID) ?>"><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->image ?>" class="task-icon" data-toggle="tooltip" data-placement="left" title="<?php echo $r->project_name ?>"></a>
</td><td><p class="task-blob-title"><?php echo $r->name ?></p>
<div class="progress" style="margin-bottom: 0px !important;">
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $r->complete ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $r->complete ?>%;">
    <?php echo $r->complete ?>%
  </div>
</div>
</td></tr>
<?php endforeach; ?>
</table>
<div class="align-center">
<a href="<?php echo site_url("tasks") ?>" class="btn btn-primary btn-xs"><?php echo lang("ctn_562") ?></a>
</div>
</div>


</div>
</div>
<?php endif; ?>

<?php if($this->settings->info->enable_tickets && $this->common->has_permissions(array("admin", "project_admin", "ticket_worker", "ticket_manage"), $this->user)) : ?>
<div class="panel panel-default">
<div class="panel-body">
<h4 class="home-label"><?php echo lang("ctn_563") ?></h4>
<table class="table">
<?php foreach($tickets->result() as $r) : ?>
<tr><td width="30">
<?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)) ?>
</td><td><p class="task-blob-title"><a href="<?php echo site_url("tickets/view/" . $r->ID) ?>"><?php echo $r->title ?></a></p>
<p><?php echo $prioritys[$r->priority] ?> <label class="label label-primary label-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("ctn_564") ?> <?php echo date($this->settings->info->date_format, $r->last_reply_timestamp) ?>"><span class="glyphicon glyphicon-time"></span></label></p>
</td></tr>
<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<?php if($this->settings->info->enable_time && $this->common->has_permissions(array("admin", "project_admin", "time_worker", "time_manage"), $this->user)) : ?>
<div class="panel panel-default">
<div class="panel-body" id="projectTypesChartArea">
<h4 class="home-label"><?php echo lang("ctn_565") ?></h4>
<canvas id="projectTypesChart"></canvas>
</div>
</div>
<?php endif; ?>

<div class="panel panel-default">
<div class="panel-body" id="projectTypesChartArea">
<h4 class="home-label"><?php echo lang("ctn_566") ?></h4>
<table class="table">
<?php foreach($activity->result() as $r) : ?>
<tr><td width="30">
<?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)) ?>
</td><td><p class="task-blob-title"><a href="<?php echo site_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a> <?php echo $r->message ?></p>
<p class="task-blob-date"><?php echo date($this->settings->info->date_format, $r->timestamp) ?></p>
</td></tr>
<?php endforeach; ?>
</table>
</div>
</div>

</div>
</div>


</div>

<script type="text/javascript">
	var ctx = $("#myChart");
	var data = {
	    labels: ["<?php lang("ctn_567") ?>", "<?php lang("ctn_568") ?>", "<?php lang("ctn_569") ?>", "<?php lang("ctn_570") ?>", "<?php lang("ctn_571") ?>", "<?php lang("ctn_572") ?>", "<?php lang("ctn_573") ?>", "<?php lang("ctn_574") ?>", "<?php lang("ctn_575") ?>", "<?php lang("ctn_576") ?>", "<?php lang("ctn_577") ?>", "<?php lang("ctn_578") ?>"],
	    datasets: [
	    	{
	            label: "<?php echo lang("ctn_579") ?>",
	            fill: true,
	            lineTension: 0.2,
	            backgroundColor: "rgba(32,113,210,0.4)",
	            borderColor: "rgba(32,113,210,0.9)",
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
	            data: [<?php foreach($expense as $i) : ?>
	            	<?php echo $i['count'] ?>,
	            <?php endforeach; ?>],
	            spanGaps: false,
	        },
	        {
	            label: "<?php echo lang("ctn_580") ?>",
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
	            data: [<?php foreach($income as $i) : ?>
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

	    var data = {
    labels: [
       <?php foreach($time_projects as $project) : ?>
        "<?php echo $project['title'] ?>",
        <?php endforeach; ?>
    ],
    datasets: [
        {
            data: [
            <?php 
                $max = 0;
                $max_title = "";
            ?>
            <?php foreach($time_projects as $project) : ?>
            <?php if($project['hours'] > $max) {
                $max = $project['hours'];
                $max_title = $project['title'];
            }
            ?>
            <?php echo round($project['hours'],2) ?>,
            <?php endforeach; ?>
            ],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#55f225",
                "#f24c25",
                "#f225b1",
                "#8125f2",
                "#39ded8",
                "#4e7f39",
                "#7f3941",
                "#7f3965",
                "#62397f",
                "#39507f",
                "#397f6f",
                "#397f44",
                "#607f39",
                "#7f6c39",
                "#7f3939",
                "#321a20",
                "#3c3a3c",
                "#7e777d",
                "#b5ba9e",
                "#84d588",
                "#84ced5",
                "#2c57b9",
                "#dbc6ec",
                "#ecc6eb",
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#55f225",
                "#f24c25",
                "#f225b1",
                "#8125f2",
                "#39ded8",
                "#4e7f39",
                "#7f3941",
                "#7f3965",
                "#62397f",
                "#39507f",
                "#397f6f",
                "#397f44",
                "#607f39",
                "#7f6c39",
                "#7f3939",
                "#321a20",
                "#3c3a3c",
                "#7e777d",
                "#b5ba9e",
                "#84d588",
                "#84ced5",
                "#2c57b9",
                "#dbc6ec",
                "#ecc6eb",
            ]
        }]
};
	
var myPieChart = new Chart($("#projectTypesChart"),{
    type: 'pie',
    data: data,
    options : {
    	responsive: true,
    	legend : {
	    		display : false,
	    		labels : {
	    			boxWidth: 15,
	    			padding: 10,
	    			fontSize: 11,
	    			usePointStyle : false
	    		}
	    	},
    }
});

	$(document).ready(function() {
		var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
		$('#num1').animateNumber(
		  {
		    number: <?php echo $total_revenue ?>,
		    easing: 'easeInQuad', // require jquery.easing
		    numberStep: comma_separator_number_step
		  },
		  1500
		);
		$('#num2').animateNumber(
		  {
		    number: <?php echo $total_expense ?>,
		    easing: 'easeInQuad', // require jquery.easing
		    numberStep: comma_separator_number_step
		  },
		  1500
		);
		$('#num3').animateNumber(
		  {
		    number: <?php echo $profit ?>,
		    easing: 'easeInQuad', // require jquery.easing
		    numberStep: comma_separator_number_step
		  },
		  1500
		);
	});
</script>