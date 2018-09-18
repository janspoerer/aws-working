<?php echo form_open(site_url("tasks/edit_objective_pro/" . $objective->ID), array("class" => "form-horizontal")) ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?php echo lang("ctn_838") ?></h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
            <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_839") ?></label>
            <div class="col-md-8 ui-front">
               <input type="text" class="form-control" name="title" value="<?php echo $objective->title ?>" />
            </div>
    </div>
    <div class="form-group">
            <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_840") ?></label>
            <div class="col-md-8 ui-front">
               <textarea name="description" id="objective-area-e"><?php echo $objective->description ?></textarea>
            </div>
    </div>
    <div class="form-group">
            <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_841") ?></label>
            <div class="col-md-8 ui-front">
               <?php foreach($task_members->result() as $r) : ?>
               	<div class="task-objective-user">
               	<img src="<?php echo base_url() ?>/<?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->avatar ?>" class="user-icon" /> <a href="<?php echo site_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a>
               	<input type="checkbox" name="user_<?php echo $r->ID ?>" value="1" <?php if(in_array($r->userid, $objective_members_ids)) : ?> checked<?php endif; ?>>
               	</div>
               <?php endforeach; ?>
            </div>
    </div>
    <div class="form-group">
            <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_842") ?></label>
            <div class="col-md-8 ui-front">
               <input type="checkbox" name="complete" value="1" <?php if($objective->complete) : ?>checked<?php endif; ?> />
            </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang("ctn_60") ?></button>
    <input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_838") ?>">
    <?php echo form_close() ?>
  </div>
  </div>

  <script type="text/javascript">
CKEDITOR.replace('objective-area-e', { height: '100'});
</script>