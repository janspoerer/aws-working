<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-time"></span> <?php echo lang("ctn_987") ?></div>
    <div class="db-header-extra"> 
          <div class="btn-group">
    <div class="dropdown">
  <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php echo lang("ctn_448") ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li><a href="<?php echo site_url("time/" . $page) ?>"><?php echo lang("ctn_449") ?></a></li>
    <?php foreach($projects->result() as $r) : ?>
      <li><a href="<?php echo site_url("time/".$page."/" . $r->ID) ?>"><?php echo $r->name ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>
</div>
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><?php echo lang("ctn_996") ?></button>
</div>
</div>

<p><?php echo lang("ctn_997") ?></p>

<?php if($page == "all") : ?>
<hr>
<?php echo form_open(site_url("time/search"), array("class" => "form-inline")) ?>
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3"><?php echo lang("ctn_998") ?></label>
    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="<?php echo lang("ctn_999") ?>" name="search" <?php if(isset($search)) : ?> value="<?php echo $search ?>" <?php endif; ?>>
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3"><?php echo lang("ctn_469") ?></label>
    <select name="projectid" class="form-control">
    <option value="0"><?php echo lang("ctn_990") ?></option>
    <option value="-1" <?php if(isset($projectid) && $projectid == -1) echo "selected" ?>><?php echo lang("ctn_1000") ?></option>
    <?php foreach($projects->result() as $r) : ?>
      <option value="<?php echo $r->ID ?>" <?php if(isset($projectid) && $r->ID == $projectid) : ?>selected<?php endif;?>><?php echo $r->name ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_76") ?>" />
<?php echo form_close() ?>
<?php endif; ?>

<hr>

<div class="timer-wrapper">

<?php foreach($timers->result() as $r) : ?>
  <?php
    if($r->end_time > 0) {
      $time_data = $this->common->convert_time_raw($r->end_time - $r->start_time);
      $time = $this->common->get_time_string($time_data);
      $rate = $time_data['days'] * (24 * $r->rate);
      $rate += $time_data['hours'] * $r->rate;
      $rate += $time_data['mins']  * ($r->rate/60);
      $rate += $time_data['secs'] * (($r->rate/60)/60);
      $rate = round($rate,2);
    } else {
      $time_data = $this->common->convert_simple_time($r->start_time);
      $time = $this->common->get_time_string($time_data);
      $rate = $time_data['days'] * (24 * $r->rate);
      $rate += $time_data['hours'] * $r->rate;
      $rate += $time_data['mins']  * ($r->rate/60);
      $rate += $time_data['secs'] * (($r->rate/60)/60);
      $rate = round($rate,2);
    }

    if($time_data['days'] > 0) {
      $big = $time_data['days'];
      $big .= lang("ctn_1001");
      unset($time_data['days']);
      $after = $this->common->get_time_string($time_data);
    } elseif($time_data['hours'] > 0) {
      $big = $time_data['hours'];
      $big .= lang("ctn_1002");
      unset($time_data['days'], $time_data['hours']);
      $after = $this->common->get_time_string($time_data);
    } elseif($time_data['mins'] > 0) {
      $big = $time_data['mins'];
      $big .= lang("ctn_1003");
      unset($time_data['days'], $time_data['hours'], $time_data['mins']);
      $after = $this->common->get_time_string($time_data);
    } elseif($time_data['secs'] > 0) {
      $big = $time_data['secs'];
      $big .= lang("ctn_1004");
      $time_data['secs'] = 0;
      unset($time_data['days'], $time_data['hours'], $time_data['mins'], $time_data['secs']);
      $after = $this->common->get_time_string($time_data);
    }
  ?>
<div class="timer-area-wrapper timer-flip click">
  <div class="timer-area front <?php if($r->end_time == 0) : ?>live-timer<?php endif; ?>">
  
  <div class="timer-user">
  <?php echo $this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)) ?>
  </div>
  <div class="timer-details">
  <p class="timer-details-large"><?php echo $big ?></p>
  <p><?php echo $after ?></p>
  <p><?php if($r->end_time ==0) : ?><a href="<?php echo site_url("time/stop_timer/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs"><?php echo lang("ctn_1005") ?></a><?php endif; ?> <?php if($r->end_time > 0) : ?> <a href="<?php echo site_url("time/start_timer/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-success btn-xs"><?php echo lang("ctn_1006") ?></a> <a href="<?php echo site_url("time/edit_timer/" . $r->ID) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("ctn_55") ?>"><span class="glyphicon glyphicon-cog"></span></a> <?php endif; ?> <a href="<?php echo site_url("time/delete_timer/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("ctn_57") ?>"><span class="glyphicon glyphicon-trash"></span></a></p>
  </div>
  </div>
  <div class="timer-area back">
    <div class="timer-small-details">
  $<?php echo number_format($rate,2) ?> Earnings <?php if(isset($r->name)) : ?>- <a href="<?php echo site_url("time/index/" . $r->projectid) ?>"><?php echo $r->name ?></a><?php endif; ?> - <a href="<?php echo site_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a> - <?php echo date($this->settings->info->date_format, $r->added) ?>
  </div>
  <hr>
  <?php if($r->end_time ==0) : ?><a href="<?php echo site_url("time/stop_timer/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs"><?php echo lang("ctn_1005") ?></a><?php endif; ?> <?php if($r->end_time > 0) : ?> <a href="<?php echo site_url("time/start_timer/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-success btn-xs"><?php echo lang("ctn_1006") ?></a> <a href="<?php echo site_url("time/edit_timer/" . $r->ID) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("ctn_55") ?>"><span class="glyphicon glyphicon-cog"></span></a> <?php endif; ?> <a href="<?php echo site_url("time/delete_timer/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("ctn_57") ?>"><span class="glyphicon glyphicon-trash"></span></a>
  </div>
</div>
<?php endforeach; ?>

</div>

<div class="align-center">
<?php echo $this->pagination->create_links() ?>
</div>

</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-folder-open"></span> <?php echo lang("ctn_996") ?></h4>
      </div>
      <div class="modal-body ui-front">
         <?php echo form_open(site_url("time/add_timer"), array("class" => "form-horizontal")) ?>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_988") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="note" value="">
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_456") ?></label>
                    <div class="col-md-8 ui-front">
                        <select name="projectid" class="form-control" id="project-select">
                        <option value="0"><?php echo lang("ctn_990") ?></option>
                        <?php foreach($projects->result() as $r) : ?>
                        	<option value="<?php echo $r->ID ?>"><?php echo $r->name ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_989") ?></label>
                    <div class="col-md-8 ui-front" id="task-area">
                        <select name="taskid" class="form-control"><option value="0"><?php echo lang("ctn_990") ?></option>

                        </select>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_991") ?></label>
                    <div class="col-md-8 ui-front">
                        <input type="text" class="form-control" name="rate" value="<?php echo number_format($this->user->info->time_rate,2,'.','') ?>">
                        <span class="help-text"><?php echo lang("ctn_992") ?></span>
                    </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang("ctn_60") ?></button>
        <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_1006") ?>">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#project-select').change(function() {
    var projectid = $('#project-select').val();
    $.ajax({
      url: global_base_url + 'time/get_tasks_for_project/',
      type: 'GET',
      data: {
        projectid : projectid
      },
      success: function(msg) {
        $('#task-area').html(msg);
      }
    });
  });

  $(".timer-flip").flip();

});

  </script>