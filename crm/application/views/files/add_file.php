<script type="text/javascript">
$(document).ready(function() {
	$('#project-select').change(function() {
		var projectid = $('#project-select').val();
		$.ajax({
			url: global_base_url + 'files/get_folders_for_project/',
			type: 'GET',
			data: {
				projectid : projectid
			},
			success: function(msg) {
				$('#folder-area').html(msg);
			}
		});
	});

    var default_projectid = <?php echo $default_projectid ?>;
    var folderid = <?php echo $folderid ?>;

    if(default_projectid) {
        get_projects(default_projectid, folderid);
    }

    function get_projects(projectid, nfolderid) 
    {
        $.ajax({
            url: global_base_url + 'files/get_folders_for_project/',
            type: 'GET',
            data: {
                projectid : projectid,
                folderid : nfolderid
            },
            success: function(msg) {
                $('#folder-area').html(msg);
            }
        });
    }
});
</script>
<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-file"></span> <?php echo lang("ctn_463") ?></div>
    <div class="db-header-extra"> 
</div>
</div>


<div class="panel panel-default">
<div class="panel-body">

 <?php echo form_open_multipart(site_url("files/add_file_process"), array("class" => "form-horizontal")) ?>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_464") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="">
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_465") ?></label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="userfile">
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_466") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="file_url">
                        <span class="help-block"><?php echo lang("ctn_467") ?></span>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_468") ?></label>
                    <div class="col-md-8">
                        <textarea name="note" id="file_note"></textarea>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_469") ?></label>
                    <div class="col-md-8 ui-front">
                        <select name="projectid" class="form-control" id="project-select">
                        <option value="-1"><?php echo lang("ctn_470") ?></option>
                        <option value="0"><?php echo lang("ctn_471") ?></option>
                        <?php foreach($projects->result() as $r) : ?>
                        	<option value="<?php echo $r->ID ?>" <?php if($default_projectid == $r->ID) echo "selected" ?>><?php echo $r->name ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="form-group" id="folder-area">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_472") ?></label>
                    <div class="col-md-8">
                        <select name="folderid" class="form-control">
                        <option value="-1"><?php echo lang("ctn_473") ?></option>
                        </select>
                        <span class="help-block"><?php echo lang("ctn_474") ?></span>
                    </div>
            </div>
            <hr>
            <b><?php echo lang("ctn_475") ?></b>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_476") ?></label>
                    <div class="col-md-8">
                        <input type="checkbox" name="folder_flag" value="1">
                        <span class="help-block"><?php echo lang("ctn_477") ?></span>
                    </div>
            </div>
            <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_478") ?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="folder_name" value="">
                    </div>
            </div>
            <input type="submit" class="btn btn-primary form-control" value="<?php echo lang("ctn_465") ?>" />
            <?php echo form_close() ?>
</div>
</div>

</div>
<script type="text/javascript">
CKEDITOR.replace('file_note', { height: '100'});
</script>