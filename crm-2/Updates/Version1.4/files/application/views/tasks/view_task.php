<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-tasks"></span> <?php echo lang("ctn_820") ?></div>
    <div class="db-header-extra"> <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?><a href="<?php echo site_url("tasks/add") ?>" class="btn btn-primary btn-sm"><?php echo lang("ctn_821") ?></a><?php endif; ?>
</div>
</div>

</div>

<?php 
if($task->status == 1) {
$statusbtn = "btn-info";
$statusmsg = lang("ctn_830");
} elseif($task->status == 2) {
$statusbtn = "btn-primary";
$statusmsg = lang("ctn_831");
} elseif($task->status == 3) {
$statusbtn = "btn-success";
$statusmsg = lang("ctn_832");
} elseif($task->status == 4) {
$statusbtn = "btn-warning";
$statusmsg = lang("ctn_833");
} elseif($task->status == 5) {
$statusbtn = "btn-danger";
$statusmsg = lang("ctn_834");
}
?>

<input type="hidden" id="taskid" value="<?php echo $task->ID ?>" />

<div class="row content-separator">
<div class="col-md-8">

<div class="white-area-content">
<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-pushpin"></span> <?php echo $task->name ?> </div>
    <div class="db-header-extra"> <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?><button id="status-button-update" type="button" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-refresh spin"></span></button>
      <div class="btn-group">
        <div class="btn-group">
        <button type="button" class="btn <?php echo $statusbtn ?> btn-xs dropdown-toggle" data-toggle="dropdown" id="status-button">
          <?php echo $statusmsg ?> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="javascript: void(0);" onclick="changeStatus(1)"><?php echo lang("ctn_830") ?></a></li>
          <li><a href="javascript: void(0);" onclick="changeStatus(2)"><?php echo lang("ctn_831") ?></a></li>
          <li><a href="javascript: void(0);" onclick="changeStatus(3)"><?php echo lang("ctn_832") ?></a></li>
          <li><a href="javascript: void(0);" onclick="changeStatus(4)"><?php echo lang("ctn_833") ?></a></li>
          <li><a href="javascript: void(0);" onclick="changeStatus(5)"><?php echo lang("ctn_834") ?></a></li>
        </ul>
      </div>
      <a href="<?php echo site_url("tasks/edit_task/" . $task->ID) ?>" class="btn btn-primary btn-xs"><?php echo lang("ctn_851") ?></a> <a href="<?php echo site_url("tasks/delete_task/" . $task->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs" onclick="return confirm('<?php echo lang("ctn_508") ?>')"><?php echo lang("ctn_850") ?></a>
      </div>
    <?php endif; ?>
</div>
</div>

<?php echo $task->description ?>
</div>

<div class="white-area-content content-separator">

<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-list-alt"></span> <?php echo lang("ctn_852") ?></div>
    <div class="db-header-extra"> <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?><button data-toggle="modal" data-target="#addObjectiveModal" class="btn btn-primary btn-xs"><?php echo lang("ctn_853") ?></button><?php endif; ?> </div>
</div>

<?php foreach($objectives->result() as $r) : ?>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
      <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?>
  			<?php if(!$r->complete) : ?><a href="<?php echo site_url("tasks/complete_objective/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-success btn-xs"><?php echo lang("ctn_854") ?></a><?php endif; ?> <input type="button" class="btn btn-warning btn-xs" value="<?php echo lang("ctn_55") ?>" data-toggle="modal" data-target="#editSubtaskModal" onClick="editObjective(<?php echo $r->ID ?>)" /> <a href="<?php echo site_url("tasks/delete_objective/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs" onclick="return confirm('<?php echo lang("ctn_508") ?>')" ><?php echo lang("ctn_57") ?></a>
      <?php endif; ?>
			</div>
			<h4><?php echo $r->title ?> <?php if($r->complete) echo"<span class='completeText'> <span class='glyphicon glyphicon-ok'></span> ".lang("ctn_855")."</span>" ?></h4>
			<p class="small-text"><?php echo $r->description ?></p>
			<?php $users = $this->task_model->get_task_objective_members($r->ID); ?>
			<div class="task-objective-user"><b><?php echo lang("ctn_856") ?></b></div>
			<?php foreach($users->result() as $rr) : ?>
				<div class="task-objective-user">
               <?php echo	$this->common->get_user_display(array("username" => $rr->username, "avatar" => $rr->avatar, "online_timestamp" => $rr->online_timestamp)) ?>
        </div>
			<?php endforeach; ?>
			</p>
			<hr>
		</div>
</div>
<?php endforeach; ?>


</div>

<?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?>
<div class="white-area-content content-separator">

<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-time"></span> <?php echo lang("ctn_857") ?></div>
    <div class="db-header-extra"> <a href="<?php echo site_url("time/add_timer/?timer_get=1&projectid=" . $task->projectid . "&taskid=" . $task->ID . "&rate=" . number_format($this->user->info->time_rate,2,'.','') . "&hash=" . $this->security->get_csrf_hash()) ?>" class="btn btn-primary btn-xs"><?php echo lang("ctn_858") ?></a> </div>
</div>

<canvas id="myChart" class="graph-height"></canvas>

</div>
<?php endif; ?>

<?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?>
<div class="white-area-content content-separator">

<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-comment"></span> <?php echo lang("ctn_859") ?></div>
    <div class="db-header-extra"> </div>
</div>

<?php foreach($messages->result() as $r) : ?>
<div class="media">
  <div class="media-left">
     <?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)) ?>
  </div>
  <div class="media-body">
  <div class="pull-right">
  <a href="<?php echo site_url("tasks/delete_message/" . $r->taskid . "/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs"><?php echo lang("ctn_57") ?></a>
  </div>
    <?php echo $r->message ?>
    <p class="small-text"><?php echo lang("ctn_860") ?> <?php echo date($this->settings->info->date_format, $r->timestamp) ?></p>
  </div>
</div>
<hr>
<?php endforeach; ?>
<div class="align-center"><?php echo $this->pagination->create_links() ?></div>
<hr>
<h4><?php echo lang("ctn_861") ?></h4>
<?php echo form_open(site_url("tasks/add_message/" . $task->ID), array("class" => "form-horizontal")) ?>
<div class="form-group">
                <div class="col-md-12 ui-front">
                   <textarea name="message" id="msg-area"></textarea>
                </div>
        </div>
<p><input type="submit" class="form-control btn btn-primary btn-sm" value="<?php echo lang("ctn_862") ?>" /></p>
<?php echo form_close(); ?>

</div>
<?php endif; ?>

</div>

<div class="col-md-4">

<div class="white-area-content">
<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-user"></span> <?php echo lang("ctn_863") ?></div>
    <div class="db-header-extra"> <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?><button id="updatedetails-button-update" type="button" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-refresh spin"></span></button> <button onclick="update_task()" class="btn btn-primary btn-xs"><?php echo lang("ctn_864") ?></button><?php endif; ?> </div>
</div>

<div class="form-group">
      <label for="username-in" class="col-md-5 label-heading"><?php echo lang("ctn_827") ?></label>
      <div class="col-md-7">
        <input type="text" id="start_date" class="form-control datepicker" value="<?php echo date($this->settings->info->date_picker_format,$task->start_date) ?>">
      </div>
  </div>
  <br /><br />
  <div class="form-group">
      <label for="username-in" class="col-md-5 label-heading"><?php echo lang("ctn_828") ?> <span class="text-danger"><?php if($task->due_date + (24*3600) < time() && $task->status != 3) echo lang("ctn_865") ?></span></label>
      <div class="col-md-7">
        <input type="text" id="due_date" class="form-control datepicker" value="<?php echo date($this->settings->info->date_picker_format,$task->due_date) ?>">
      </div>
  </div>
  <br /><br />
  <div class="form-group clearfix">
      <label for="username-in" class="col-md-4 label-heading"><?php echo lang("ctn_849") ?> <div id="progressamount"><?php echo $task->complete ?>%</div></label>
      <div class="col-md-8">
        <div id="progressslider"></div>
        <input type="hidden" id="progressamountval" class="form-control" value="<?php echo $task->complete ?>">
        <input type="checkbox" id="sync" value="1" <?php if($task->complete_sync) echo "checked" ?>> <?php echo lang("ctn_866") ?>
      </div>
  </div>

</div>

<div class="white-area-content content-separator">
<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-user"></span> <?php echo lang("ctn_867") ?></div>
    <div class="db-header-extra"> <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?><button data-toggle="modal" data-target="#addMemberModal" class="btn btn-primary btn-xs"><?php echo lang("ctn_868") ?></button> <?php endif; ?> </div>
</div>

<table class="table table-bordered table-hover">
<?php foreach($task_members->result() as $r) : ?>
<tr><td> <?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp, "first_name" => $r->first_name, "last_name" => $r->last_name)) ?></td><td><?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?><button id="remind-user-<?php echo $r->ID ?>" class="btn btn-info btn-xs" onclick="remind_user(<?php echo $r->ID ?>)" title="<?php echo lang("ctn_870") ?>"><span class="glyphicon glyphicon-bell"></span></button> <a href="<?php echo site_url("tasks/remove_member/" . $r->userid . "/" . $task->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a><?php endif; ?></td></tr>
<?php endforeach; ?>
</table>
</div>

<?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?>
<div class="white-area-content content-separator">
<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-file"></span> <?php echo lang("ctn_872") ?></div>
    <div class="db-header-extra"> <button data-toggle="modal" data-target="#addFileModal" class="btn btn-primary btn-xs"><?php echo lang("ctn_873") ?></button> </div>
</div>

<table class="table table-bordered table-hover">
<tr class="table-header"><td><?php echo lang("ctn_874") ?></td><td><?php echo lang("ctn_875") ?></td><td><?php echo lang("ctn_52") ?></td></tr>
<?php foreach($files->result() as $r) : ?>
<tr><td><a href="<?php echo site_url("files/view_file/" . $r->fileid) ?>"><?php echo $r->file_name ?><?php echo $r->extension ?></a></td><td><?php echo $r->file_type ?></td><td><a href="<?php echo site_url("tasks/remove_file/" . $r->taskid . "/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs"><?php echo lang("ctn_871") ?></a></td></tr>
<?php endforeach; ?>
</table>

</div>
<?php endif; ?>

<?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?>
<div class="white-area-content content-separator">
<div class="db-header clearfix">
    <div class="task-header-title"> <span class="glyphicon glyphicon-file"></span> <?php echo lang("ctn_876") ?></div>
    <div class="db-header-extra">  <a href="<?php echo site_url("tasks/view_activity/" . $task->ID) ?>" class="btn btn-info btn-xs"><?php echo lang("ctn_877") ?></a></div>
</div>

<table class="table table-bordered table-hover">
<tr class="table-header"><td><?php echo lang("ctn_878") ?></td><td><?php echo lang("ctn_879") ?></td></tr>
<?php foreach($actions->result() as $r) : ?>
<tr><td> <?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)) ?></td><td><a href="<?php echo site_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a> <?php echo $r->message ?><p class="small-text"><a href="<?php site_url($r->url) ?>"><?php echo lang("ctn_880") ?></a> - <?php echo date($this->settings->info->date_format, $r->timestamp) ?></p></td></tr>
<?php endforeach; ?>
</table>

</div>
<?php endif; ?>

</div>

</div>


<!-- Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang("ctn_881") ?></h4>
      </div>
      <div class="modal-body">
       <?php echo form_open(site_url("tasks/add_task_member/" . $task->ID), array("class" => "form-horizontal")) ?>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_882") ?></label>
                <div class="col-md-8 ui-front">
                    <select class="form-control" name="userid">
                    <?php foreach($members->result() as $r) : ?>
                    	<option value="<?php echo $r->userid ?>"><?php echo $r->username ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang("ctn_60") ?></button>
        <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_881") ?>">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addObjectiveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang("ctn_853") ?></h4>
      </div>
      <div class="modal-body">
       <?php echo form_open(site_url("tasks/add_task_objective/" . $task->ID), array("class" => "form-horizontal")) ?>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_839") ?></label>
                <div class="col-md-8 ui-front">
                   <input type="text" class="form-control" name="title" />
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_840") ?></label>
                <div class="col-md-8 ui-front">
                   <textarea name="description" id="objective-area"></textarea>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_841") ?></label>
                <div class="col-md-8 ui-front">
                   <?php foreach($task_members->result() as $r) : ?>
                   	<div class="task-objective-user">
                   	<img src="<?php echo base_url() ?>/<?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->avatar ?>" class="user-icon" /> <a href="<?php echo site_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a>
                   	<input type="checkbox" name="user_<?php echo $r->ID ?>" value="1">
                   	</div>
                   <?php endforeach; ?>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang("ctn_60") ?></button>
        <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_853") ?>">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editSubtaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="editObjective">
     <span class="glyphicon glyphicon-refresh spin"></span>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang("ctn_873") ?></h4>
      </div>
      <div class="modal-body">
       <?php echo form_open(site_url("tasks/add_file/" . $task->ID), array("class" => "form-horizontal")) ?>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_883") ?></label>
                <div class="col-md-6 ui-front">
                    <input type="text" name="file_search" id="file-search">
                    <input type="hidden" name="file_search_id" id="file-search-hidden">
                    <span class="help-block"><?php echo lang("ctn_884") ?></span>
                </div>
                <div class="col-md-2" id="file-link">

                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang("ctn_60") ?></button>
        <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_873") ?>">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
CKEDITOR.replace('objective-area', { height: '100'});
CKEDITOR.replace('msg-area', { height: '100'});

$(document).ready(function() {
    var myChart = new Chart($("#myChart"), {
      type: 'line',
      data: {
          labels: [
          <?php foreach($last_dates as $d) : ?>
          "<?php echo $d['date'] ?>",
          <?php endforeach; ?>
          ],
          datasets: [{
              label: "Time Logged For Task",
              lineTension: 0.1,
              backgroundColor: "rgba(75,192,192,0.4)",
              borderColor: "rgba(75,192,192,1)",
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
              data: [
              <?php foreach($last_dates as $d) : ?>
              <?php echo $d['hours'] ?>,
              <?php endforeach; ?>
              ]
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });

});
</script>