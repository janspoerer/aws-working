<div class="white-area-content">
<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-user"></span> <?php echo lang("ctn_1") ?></div>
    <div class="db-header-extra"><input type="button" class="btn btn-primary btn-sm" value="<?php echo lang("ctn_319") ?>" data-toggle="modal" data-target="#memberModal" />
</div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo site_url() ?>"><?php echo lang("ctn_2") ?></a></li>
  <li><a href="<?php echo site_url("admin") ?>"><?php echo lang("ctn_1") ?></a></li>
  <li class="active"><?php echo lang("ctn_316") ?></li>
</ol>

<p><?php echo lang("ctn_318") ?></p>


<table class="table table-bordered">
<tr class="table-header"><td><?php echo lang("ctn_320") ?></td><td><?php echo lang("ctn_307") ?></td><td><?php echo lang("ctn_52") ?></td></tr>
<?php foreach($roles->result() as $r) : ?>
<tr><td><?php echo $r->name ?></td>
<td>
  <?php if($r->admin) : ?><span class="user_role_button admin" title="<?php echo lang("ctn_312") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_308") ?></span><?php endif; ?>
  <?php if($r->admin_settings) : ?><span class="user_role_button admin" title="<?php echo lang("ctn_313") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_309") ?></span><?php endif; ?>
  <?php if($r->admin_members) : ?><span class="user_role_button admin" title="<?php echo lang("ctn_314") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_310") ?></span><?php endif; ?>
  <?php if($r->admin_payment) : ?><span class="user_role_button admin" title="<?php echo lang("ctn_315") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_311") ?></span><?php endif; ?>
  <?php if($r->project_admin) : ?><span class="user_role_button project" title="<?php echo lang("ctn_384") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_362") ?></span><?php endif; ?>
  <?php if($r->team_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_386") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_363") ?></span><?php endif; ?>
  <?php if($r->time_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_387") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_364") ?></span><?php endif; ?>
  <?php if($r->team_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_388") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_365") ?></span><?php endif; ?>
  <?php if($r->time_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_389") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_366") ?></span><?php endif; ?>
  <?php if($r->project_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_385") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_367") ?></span><?php endif; ?>
  <?php if($r->file_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_391") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_368") ?></span><?php endif; ?>
  <?php if($r->file_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_390") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_369") ?></span><?php endif; ?>
  <?php if($r->task_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_393") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_370") ?></span><?php endif; ?>
  <?php if($r->task_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_392") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_371") ?></span><?php endif; ?>
  <?php if($r->calendar_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_394") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_372") ?></span><?php endif; ?>
  <?php if($r->calendar_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_395") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_373") ?></span><?php endif; ?>
  <?php if($r->ticket_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_396") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_374") ?></span><?php endif; ?>
  <?php if($r->ticket_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_397") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_375") ?></span><?php endif; ?>
  <?php if($r->finance_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_398") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_376") ?></span><?php endif; ?>
  <?php if($r->finance_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_399") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_377") ?></span><?php endif; ?>
  <?php if($r->invoice_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_400") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_378") ?></span><?php endif; ?>
  <?php if($r->invoice_client) : ?><span class="user_role_button client" title="<?php echo lang("ctn_401") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_379") ?></span><?php endif; ?>
  <?php if($r->ticket_client) : ?><span class="user_role_button client" title="<?php echo lang("ctn_402") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_380") ?></span><?php endif; ?>
  <?php if($r->notes_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_403") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_381") ?></span><?php endif; ?>
  <?php if($r->notes_worker) : ?><span class="user_role_button project" title="<?php echo lang("ctn_404") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_382") ?></span><?php endif; ?>
  <?php if($r->quote_manage) : ?><span class="user_role_button project" title="<?php echo lang("ctn_405") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_383") ?></span><?php endif; ?>
  <?php if($r->banned) : ?><span class="user_role_button banned" title="<?php echo lang("ctn_1115") ?>" data-placement="bottom" data-toggle="tooltip"><?php echo lang("ctn_33") ?></span><?php endif; ?>

</td>
<td><a href="<?php echo site_url("admin/edit_user_role/" . $r->ID) ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-warning btn-xs" title="<?php echo lang("ctn_55") ?>"><span class="glyphicon glyphicon-cog"></span></a> <a href="<?php echo site_url("admin/delete_user_role/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" onclick="return confirm('Are you sure you want to delete this?')" title="<?php echo lang("ctn_57") ?>"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
<?php endforeach; ?>
</table>

<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang("ctn_319") ?></h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("admin/add_user_role_pro"), array("class" => "form-horizontal")) ?>
            <div class="form-group">
                    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_320") ?></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="email-in" name="name">
                    </div>
            </div>
            <hr>
            <h4><?php echo lang("ctn_307") ?></h4>
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_308") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_312") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_309") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_313") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin_settings" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_310") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_314") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin_members" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_311") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_315") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin_payment" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_362") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_384") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="project_admin" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_367") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_385") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="project_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_363") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_386") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="team_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_364") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_387") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="time_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_365") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_388") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="team_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_366") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_389") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="time_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_369") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_390") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="file_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_368") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_391") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="file_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_371") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_392") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="task_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_370") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_393") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="task_manage" value="1">
                        </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_372") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_394") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="calendar_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_373") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_395") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="calendar_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_374") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_396") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="ticket_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_375") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_397") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="ticket_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_376") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_398") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="finance_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_377") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_399") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="finance_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_378") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_400") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="invoice_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_379") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_401") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="invoice_client" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_380") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_402") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="ticket_client" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_381") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_403") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="notes_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_382") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_404") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="notes_worker" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_383") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_405") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="quote_manage" value="1">
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_33") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_1115") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="banned" value="1">
                        </div>
            </div>
            </div>
            </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang("ctn_60") ?></button>
        <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_61") ?>" />
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
</div>