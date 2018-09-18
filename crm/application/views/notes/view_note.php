<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-pencil"></span> <?php echo lang("ctn_750") ?></div>
    <div class="db-header-extra">
</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $note->title ?></h3>
  </div>
  <div class="panel-body">
    <?php echo $note->body ?>
  </div>
  <div class="panel-footer"><?php echo $this->common->get_user_display(array("avatar" => $note->avatar, "username" => $note->username, "online_timestamp" => $note->online_timestamp));?> - <?php echo lang("ctn_757") ?>: <?php echo date($this->settings->info->date_format, $note->timestamp) ?> <?php if($note->last_updated_timestamp > 0) : ?>- <?php echo lang("ctn_756") ?>: <?php echo date($this->settings->info->date_format, $note->last_updated_timestamp) ?><?php endif; ?> - <a href="<?php echo site_url("notes/edit_note/" . $note->ID) ?>" class="btn btn-warning btn-xs" title="<?php echo lang("ctn_55") ?>"><span class="glyphicon glyphicon-cog"></span></a> <a href="<?php echo site_url("notes/delete_note/" . $note->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-xs" onclick="return confirm('<?php echo lang("ctn_317") ?>')" title="<?php echo lang("ctn_57") ?>"><span class="glyphicon glyphicon-trash"></span></a></div>
</div>


</div>