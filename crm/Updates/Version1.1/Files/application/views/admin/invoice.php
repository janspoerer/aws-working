<div class="white-area-content">
<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-user"></span> <?php echo lang("ctn_1") ?></div>
    <div class="db-header-extra"> 
</div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo site_url() ?>"><?php echo lang("ctn_2") ?></a></li>
  <li><a href="<?php echo site_url("admin") ?>"><?php echo lang("ctn_1") ?></a></li>
  <li class="active"><?php echo lang("ctn_424") ?></li>
</ol>


<hr>

<div class="panel panel-default">
<div class="panel-body">
<?php echo form_open_multipart(site_url("admin/invoice_pro"), array("class" => "form-horizontal")) ?>
<div class="form-group">
    <label for="image-in" class="col-sm-2 control-label"><?php echo lang("ctn_425") ?></label>
    <div class="col-sm-10">
        <?php if(!empty($invoice->image)) : ?>
            <p><img src='<?php echo base_url().$this->settings->info->upload_path_relative . "/" . $invoice->image ?>'></p>
        <?php endif; ?>
        <input type="file" name="userfile" size="20" />
        <span class="help-block"><?php echo lang("ctn_426") ?></span>
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_427") ?></label>
    <div class="col-sm-10">
        <input type="text" name="first_name" class="form-control" value="<?php echo $invoice->first_name ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_428") ?></label>
    <div class="col-sm-10">
        <input type="text" name="last_name" class="form-control" value="<?php echo $invoice->last_name ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_429") ?></label>
    <div class="col-sm-10">
        <input type="text" name="address_1" class="form-control" value="<?php echo $invoice->address_1 ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_430") ?></label>
    <div class="col-sm-10">
        <input type="text" name="address_2" class="form-control" value="<?php echo $invoice->address_2 ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_431") ?></label>
    <div class="col-sm-10">
        <input type="text" name="city" class="form-control" value="<?php echo $invoice->city ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_432") ?></label>
    <div class="col-sm-10">
        <input type="text" name="state" class="form-control" value="<?php echo $invoice->state ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_433") ?></label>
    <div class="col-sm-10">
        <input type="text" name="zipcode" class="form-control" value="<?php echo $invoice->zipcode ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_434") ?></label>
    <div class="col-sm-10">
        <input type="text" name="country" class="form-control" value="<?php echo $invoice->country ?>" />
    </div>
</div>
<h3><?php echo lang("ctn_1111") ?></h3>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_1112") ?></label>
    <div class="col-sm-10">
        <input type="text" name="stripe_secret_key" class="form-control" value="<?php echo $invoice->stripe_secret_key ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_1113") ?></label>
    <div class="col-sm-10">
        <input type="text" name="stripe_publish_key" class="form-control" value="<?php echo $invoice->stripe_publish_key ?>" />
    </div>
</div>
<input type="submit" class="btn btn-primary form-control" value="<?php echo lang("ctn_13") ?>" />
<?php echo form_close() ?>
</div>
</div>
</div>