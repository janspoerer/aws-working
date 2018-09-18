<div class="white-area-content">
<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-user"></span> <?php echo lang("ctn_1") ?></div>
    <div class="db-header-extra">
</div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo site_url() ?>"><?php echo lang("ctn_1") ?></a></li>
  <li><a href="<?php echo site_url("admin") ?>"><?php echo lang("ctn_1") ?></a></li>
  <li><a href="<?php echo site_url("admin/user_roles") ?>"><?php echo lang("ctn_316") ?></a></li>
  <li class="active"><?php echo lang("ctn_321") ?></li>
</ol>


<hr>

<div class="panel panel-default">
<div class="panel-body">
<?php echo form_open(site_url("admin/edit_user_role_pro/" . $role->ID), array("class" => "form-horizontal")) ?>

<div class="form-group">
        <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_320") ?></label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="email-in" name="name" value="<?php echo $role->name ?>">
        </div>
</div>
<hr>
            <h4><?php echo lang("ctn_307") ?></h4>
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_308") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_312") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin" value="1" <?php if($role->admin) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_309") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_313") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin_settings" value="1" <?php if($role->admin_settings) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_310") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_314") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin_members" value="1" <?php if($role->admin_members) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_311") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_315") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="admin_payment" value="1" <?php if($role->admin_payment) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_362") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_384") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="project_admin" value="1" <?php if($role->project_admin) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_367") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_385") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="project_worker" value="1" <?php if($role->project_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_363") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_386") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="team_manage" value="1" <?php if($role->team_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_364") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_387") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="time_manage" value="1" <?php if($role->time_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_365") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_388") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="team_worker" value="1" <?php if($role->team_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_366") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_389") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="time_worker" value="1" <?php if($role->time_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_369") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_390") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="file_worker" value="1" <?php if($role->file_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_368") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_391") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="file_manage" value="1" <?php if($role->file_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_371") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_392") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="task_worker" value="1" <?php if($role->task_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_370") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_393") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="task_manage" value="1" <?php if($role->task_manage) echo "checked" ?>>
                        </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_372") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_394") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="calendar_manage" value="1" <?php if($role->calendar_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_373") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_395") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="calendar_worker" value="1" <?php if($role->calendar_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_374") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_396") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="ticket_manage" value="1" <?php if($role->ticket_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_375") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_397") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="ticket_worker" value="1" <?php if($role->ticket_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_376") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_398") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="finance_manage" value="1" <?php if($role->finance_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_377") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_399") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="finance_worker" value="1" <?php if($role->finance_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_378") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_400") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="invoice_manage" value="1" <?php if($role->invoice_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_379") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_401") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="invoice_client" value="1" <?php if($role->invoice_client) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_380") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_402") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="ticket_client" value="1" <?php if($role->ticket_client) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_381") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_403") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="notes_manage" value="1" <?php if($role->notes_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_382") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_404") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="notes_worker" value="1" <?php if($role->notes_worker) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_383") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_405") ?>." data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="quote_manage" value="1" <?php if($role->quote_manage) echo "checked" ?>>
                        </div>
            </div>
            <div class="form-group">
                        <label for="username-in" class="col-md-8 label-heading"><?php echo lang("ctn_33") ?> <span class="glyphicon glyphicon-question-sign" title="<?php echo lang("ctn_1115") ?>" data-toggle="tooltip" data-placement="bottom"></span></label>
                        <div class="col-md-4">
                            <input type="checkbox" name="banned" value="1" <?php if($role->banned) echo "checked" ?>>
                        </div>
            </div>
            </div>
            </div>

            <hr>

<input type="submit" class="form-control btn btn-primary" value="<?php echo lang("ctn_13") ?>" />
<?php echo form_close() ?>
</div>
</div>
</div>