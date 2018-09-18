<script type="text/javascript">
$(document).ready(function() {
CKEDITOR.replace('project-description', { height: '100'});
});
</script>
<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-folder-open"></span> <?php echo lang("ctn_766") ?></div>
    <div class="db-header-extra">
</div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<?php echo form_open_multipart(site_url("projects/edit_project_pro/" . $project->ID), array("class" => "form-horizontal")) ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_767") ?></label>
        <div class="col-md-8 ui-front">
            <input type="text" class="form-control" name="name" value="<?php echo $project->name ?>">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_768") ?></label>
        <div class="col-md-8 ui-front">
        	<img src="<?php echo base_url() ?>/<?php echo $this->settings->info->upload_path_relative ?>/<?php echo $project->image ?>" class="user-icon" />
            <input type="file" class="form-control" name="userfile">
            <span class="help-block"><?php echo lang("ctn_769") ?></span>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_770") ?></label>
        <div class="col-md-8">
            <textarea name="description" id="project-description"><?php echo $project->description ?></textarea>
        </div>
</div>
<div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_771") ?></label>
                    <div class="col-md-8">
                        <input type="text" name="complete" class="form-control" value="<?php echo $project->complete ?>" >
                        <span class="help-block"><?php echo lang("ctn_772") ?></span>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_773") ?></label>
                    <div class="col-md-8">
                        <input type="checkbox" name="complete_sync" value="1" <?php if($project->complete_sync) : ?>checked<?php endif; ?> >
                        <span class="help-block"><?php echo lang("ctn_774") ?></span>
                    </div>
            </div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_775") ?></label>
        <div class="col-md-8">
            <select name="catid" class="form-control">
            <?php foreach($categories->result() as $r) : ?>
            	<option value="<?php echo $r->ID ?>" <?php if($r->ID == $project->catid) echo "selected" ?>><?php echo $r->name ?></option>
            <?php endforeach; ?>
            </select>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_776") ?></label>
        <div class="col-md-8">
            <select name="status" class="form-control">
                <option value="0"><?php echo lang("ctn_777") ?></option>
                <option value="1" <?php if($project->status == 1) echo "selected" ?>><?php echo lang("ctn_778") ?></option>
            </select>
        </div>
</div>
<h4><?php echo lang("ctn_779") ?></h4>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_780") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="calendar_id" value="<?php echo $project->calendar_id ?>">
                        <span class="help-block"><?php echo lang("ctn_781") ?></span>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_782") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control jscolor" name="calendar_color" value="<?php echo $project->calendar_color ?>">
                    </div>
            </div>
<input type="submit" class="btn btn-primary form-control" value="<?php echo lang("ctn_783") ?>">
<?php echo form_close() ?>
</div>
</div>


</div>