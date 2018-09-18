<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-pencil"></span> <?php echo lang("ctn_750") ?></div>
    <div class="db-header-extra"> 
</div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<div id="saving"></div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_1150") ?></label>
        <div class="col-md-8 ui-front">
            <input type="checkbox" name="enable_autosave" id="autosave" value="1" checked>
            <span class="help-block"><?php echo lang("ctn_1151") ?></span>
        </div>
</div>
<?php echo form_open(site_url("notes/edit_note_pro/" . $note->ID), array("class" => "form-horizontal")) ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_751") ?></label>
        <div class="col-md-8 ui-front">
            <input type="text" class="form-control" name="title" value="<?php echo $note->title ?>" id="title">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_752") ?></label>
        <div class="col-md-8 ui-front">
           <textarea name="note" id="notearea"><?php echo $note->body ?></textarea>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_753") ?></label>
        <div class="col-md-8 ui-front">
            <select name="projectid" class="form-control" id="projectid">
            <?php foreach($projects->result() as $r) : ?>
            	<option value="<?php echo $r->ID ?>" <?php if($r->ID == $note->projectid) echo "selected" ?>><?php echo $r->name ?></option>
            <?php endforeach; ?>
            </select>
        </div>
</div> 


<input type="submit" class="btn btn-primary form-control" value="<?php echo lang("ctn_754") ?>">
<?php echo form_close() ?>
</div>
</div>

</div>

<script type="text/javascript">
$(document).ready(function() {
    function autosave() 
    {
        var autosave = $('#autosave').prop("checked");
        if(autosave) {
            $.ajax({
            url: global_base_url + "notes/edit_note_ajax/<?php echo $note->ID ?>",
            type: "POST",
            data: {
                csrf_test_name : global_hash,
                title : $("#title").val(),
                note : CKEDITOR.instances.notearea.getData(),
                projectid : $('#projectid').val()
            },
            success: function(msg) {
                $('#saving').html("<?php echo lang("ctn_1152") ?>");
                console.log("autosave");
            }
        });
            
        }
    }

    setInterval(function() {
        autosave();
    }, 1000 *30);
CKEDITOR.replace('notearea', { height: '350'});
});
</script>