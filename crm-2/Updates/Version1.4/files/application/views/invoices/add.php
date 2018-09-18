<script src="<?php echo base_url();?>scripts/custom/get_usernames.js"></script>
<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-credit-card"></span> <?php echo lang("ctn_586") ?></div>
    <div class="db-header-extra"> <a href="<?php echo site_url("invoices/add") ?>" class="btn btn-primary btn-sm"><?php echo lang("ctn_587") ?></a>
</div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<?php echo form_open(site_url("invoices/add_pro"), array("class" => "form-horizontal testForm")) ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_588") ?></label>
        <div class="col-md-8 ui-front">
            <input type="text" class="form-control" name="invoice_id" value="<?php echo $invoice_id ?>">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_589") ?></label>
        <div class="col-md-8 ui-front">
            <input type="text" class="form-control" name="title" value="">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_590") ?></label>
        <div class="col-md-8">
            <textarea name="notes" id="notes"></textarea>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_591") ?></label>
        <div class="col-md-8">
            <input type="text" name="client_username" class="form-control" id="username-search" placeholder="<?php echo lang("ctn_592") ?>">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_1205") ?></label>
        <div class="col-md-8">
            <input type="text" name="guest_name" class="form-control">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_1206") ?></label>
        <div class="col-md-8">
            <input type="email" name="guest_email" class="form-control">
            <span class="help-block"><?php echo lang("ctn_1207") ?></span>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_593") ?></label>
        <div class="col-md-8">
            <select name="projectid" class="form-control">
                <option value="0"><?php echo lang("ctn_46") ?></option>
            <?php foreach($projects->result() as $r) : ?>
            	<option value="<?php echo $r->ID ?>" <?php if($r->ID == $this->user->info->active_projectid) echo "selected" ?>><?php echo $r->name ?></option>
            <?php endforeach; ?>
            </select>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_594") ?></label>
        <div class="col-md-8">
            <select name="status" class="form-control">
            <option value="1"><?php echo lang("ctn_595") ?></option>
            <option value="2"><?php echo lang("ctn_596") ?></option>
            <option value="3"><?php echo lang("ctn_597") ?></option>
            </select>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_598") ?></label>
        <div class="col-md-8">
            <select name="currencyid" class="form-control">
            <?php foreach($currencies->result() as $r) : ?>
                <option value="<?php echo $r->ID ?>"><?php echo $r->symbol ?> - <?php echo $r->name ?></option>
            <?php endforeach; ?>
            </select>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_599") ?></label>
        <div class="col-md-8">
            <input type="text" name="due_date" class="form-control datepicker">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_600") ?></label>
        <div class="col-md-8">
            <input type="checkbox" name="template" value="1">
            <span class="help-block"><?php echo lang("ctn_601") ?></span>
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_1329") ?></label>
        <div class="col-md-8">
            <select name="paying_accountid" class="form-control">
            <?php foreach($accounts->result() as $r) : ?>
                <option value="<?php echo $r->ID ?>"><?php echo $r->name ?></option>
            <?php endforeach; ?>
            </select>
            <span class="help-block"><?php echo lang("ctn_1330") ?></span>
        </div>
</div>

<hr>
<table class="table table-bordered table-hover" id="item-table">
                        <tr class="table-header"><td><?php echo lang("ctn_616") ?></td><td><?php echo lang("ctn_617") ?></td><td><?php echo lang("ctn_618") ?></td><td><?php echo lang("ctn_619") ?></td><td><?php echo lang("ctn_52") ?></td></tr>
                        <tr id="row_1"><td><input type="text" name="desc_1" class="form-control" /></td><td><input type="text" name="quantity_1" id="quantity_1" class="form-control quantitychange" value="0"></td><td><input type="text" name="amount_1" id="amount_1" class="form-control amountchange" value="0.00"></td><td><div id="total_1">0.00</div></td><td><button type="button" name="remove" class="btn btn-danger btn-xs" onclick="remove_item(1)"><span class="glyphicon glyphicon-trash"></span></button></td></tr>
                    </table>
                    <input type="hidden" name="items" id="items" value="1" />
                   <input type="button" class="btn btn-info btn-xs" value="<?php echo lang("ctn_620") ?>" onclick='add_item()' /> 
            <hr>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_621") ?></label>
        <div class="col-md-5">
            <input type="text" name="tax_name_1" id="tax_name_1" class="form-control">
        </div>
        <div class="col-md-3">
            <input type="text" name="tax_rate_1" id="tax_rate_1" class="form-control" placeholder="<?php echo lang("ctn_622") ?>">
        </div>
</div>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_623") ?></label>
        <div class="col-md-5">
            <input type="text" name="tax_name_2" id="tax_name_2" class="form-control">
        </div>
        <div class="col-md-3">
            <input type="text" name="tax_rate_2" id="tax_rate_2" class="form-control" placeholder="<?php echo lang("ctn_622") ?>">
        </div>
</div>
<div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_624") ?></label>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                        <tr><td><?php echo lang("ctn_625") ?></td><td><div id="sub_total">0.00</div></td></tr>
                        <tr><td><div id="tax_name_1_area"><?php echo lang("ctn_626") ?></div></td><td><div id="tax_amount_1">0%</div><div id="tax_total_amount_1">0.00</div></td></tr>
                        <tr><td><div id="tax_name_2_area"><?php echo lang("ctn_627") ?></div></td><td><div id="tax_amount_2">0%</div><div id="tax_total_amount_2">0.00</div></td></tr>
                        <tr><td><?php echo lang("ctn_628") ?></td><td><div id="total_payment"></div></td></tr>
                        </table>
                    </div>
            </div>


<input type="submit" class="btn btn-primary form-control" value="<?php echo lang("ctn_629") ?>">
<?php echo form_close() ?>
</div>
</div>


</div>

<script type="text/javascript">
$(document).ready(function() {
CKEDITOR.replace('notes', { height: '100'});
});

</script>
