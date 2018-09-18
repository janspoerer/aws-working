<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-tasks"></span> <?php echo lang("ctn_820") ?></div>
    <div class="db-header-extra"> <a href="<?php echo site_url("tasks/add") ?>" class="btn btn-primary btn-sm"><?php echo lang("ctn_821") ?></a>
</div>
</div>

<p><?php echo lang("ctn_822") ?></p>

<div class="panel panel-default">
<div class="panel-body">

 <?php echo form_open(site_url("tasks/add_task_process"), array("class" => "form-horizontal")) ?>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_823") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="">
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_824") ?></label>
                    <div class="col-md-8">
                        <textarea name="description" id="task-desc"></textarea>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_825") ?></label>
                    <div class="col-md-8 ui-front">
                        <select name="projectid" class="form-control">
                        <option value="-1"><?php echo lang("ctn_826") ?></option>
                        <?php foreach($projects->result() as $r) : ?>
                        	<option value="<?php echo $r->ID ?>"><?php echo $r->name ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_827") ?></label>
                    <div class="col-md-8">
                        <input type="text" name="start_date" class="form-control datepicker" id="start_date">
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_828") ?></label>
                    <div class="col-md-8">
                        <input type="text" name="due_date" class="form-control datepicker" id="due_date">
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_829") ?></label>
                    <div class="col-md-8">
                        <select name="status" class="form-control">
                        <option value="1"><?php echo lang("ctn_830") ?></option>
                        <option value="2"><?php echo lang("ctn_831") ?></option>
                        <option value="3"><?php echo lang("ctn_832") ?></option>
                        <option value="4"><?php echo lang("ctn_833") ?></option>
                        <option value="5"><?php echo lang("ctn_834") ?></option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_835") ?></label>
                    <div class="col-md-8">
                        <input type="checkbox" name="assign" value="1" checked>
                        <span class="help-text"><?php echo lang("ctn_836") ?></span>
                    </div>
            </div>
            
            <input type="submit" class="btn btn-primary form-control" value="<?php echo lang("ctn_837") ?>" />
            <?php echo form_close() ?>
</div>
</div>

</div>
<script type="text/javascript">
CKEDITOR.replace('task-desc', { height: '100'});
</script>