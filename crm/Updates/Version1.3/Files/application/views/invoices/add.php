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
<?php if($settings->enable_paypal) : ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_602") ?></label>
        <div class="col-md-8">
            <select name="paypal" class="form-control">
            <option value="0"><?php echo lang("ctn_1208") ?></option>
            <option value="1"><?php echo lang("ctn_1209") ?></option>
            </select>
            <span class="help-block"><?php echo lang("ctn_603") ?>. <?php echo lang("ctn_1213") ?></span>
        </div>
</div>
<?php endif; ?>
<?php if($settings->enable_stripe) : ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_1121") ?></label>
        <div class="col-md-8">
            <select name="stripe" class="form-control">
            <option value="0"><?php echo lang("ctn_1122") ?></option>
            <option value="1"><?php echo lang("ctn_1123") ?></option>
            </select>
            <span class="help-block"><?php echo lang("ctn_1124") ?></span>
        </div>
</div>
<?php endif; ?>
<?php if($settings->enable_checkout2) : ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_1181") ?></label>
        <div class="col-md-8">
            <select name="checkout2" class="form-control">
            <option value="0"><?php echo lang("ctn_1210") ?></option>
            <option value="1"><?php echo lang("ctn_1211") ?></option>
            </select>
            <span class="help-block"><?php echo lang("ctn_1212") ?></span>
        </div>
</div>
<?php endif; ?>
<div class="form-group">
        <label for="p-in" class="col-md-4 label-heading"><?php echo lang("ctn_604") ?></label>
        <div class="col-md-8">
            <select name="address_settings" class="form-control" id="address_settings">
            <option value="0"><?php echo lang("ctn_605") ?></option>
            <option value="1"><?php echo lang("ctn_606") ?></option>
            </select>
            <span class="help-block"><?php echo lang("ctn_607") ?></span>
        </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_608") ?></label>
    <div class="col-sm-10">
        <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $settings->first_name ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_609") ?></label>
    <div class="col-sm-10">
        <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $settings->last_name ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_610") ?></label>
    <div class="col-sm-10">
        <input type="text" name="address_1" class="form-control" id="address_1" value="<?php echo $settings->address_1 ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_611") ?></label>
    <div class="col-sm-10">
        <input type="text" name="address_2" class="form-control" id="address_2" value="<?php echo $settings->address_2 ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_612") ?></label>
    <div class="col-sm-10">
        <input type="text" name="city" class="form-control" id="city" value="<?php echo $settings->city ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_613") ?></label>
    <div class="col-sm-10">
        <input type="text" name="state" class="form-control" id="state" value="<?php echo $settings->state ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_614") ?></label>
    <div class="col-sm-10">
        <input type="text" name="zipcode" class="form-control" id="zipcode" value="<?php echo $settings->zipcode ?>" />
    </div>
</div>
<div class="form-group">
    <label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_615") ?></label>
    <div class="col-sm-10">
        <input type="text" name="country" class="form-control" id="country" value="<?php echo $settings->country ?>" />
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
$('#address_settings').change(function() {
    var val = $('#address_settings').val();
    change_address(val);
});
});

function change_address(id) 
{
    if(id == 0) {
        $('#first_name').val("<?php echo $settings->first_name ?>");
        $('#last_name').val("<?php echo $settings->last_name ?>");
        $('#address_1').val("<?php echo $settings->address_1 ?>");
        $('#address_2').val("<?php echo $settings->address_2 ?>");
        $('#city').val("<?php echo $settings->city ?>");
        $('#state').val("<?php echo $settings->state ?>");
        $('#zipcode').val("<?php echo $settings->zipcode ?>");
        $('#country').val("<?php echo $settings->country ?>");
    } else if(id == 1) {
        $('#first_name').val("<?php echo $this->user->info->first_name ?>");
        $('#last_name').val("<?php echo $this->user->info->last_name ?>");
        $('#address_1').val("<?php echo $this->user->info->address_1 ?>");
        $('#address_2').val("<?php echo $this->user->info->address_2 ?>");
        $('#city').val("<?php echo $this->user->info->city ?>");
        $('#state').val("<?php echo $this->user->info->state ?>");
        $('#zipcode').val("<?php echo $this->user->info->zipcode ?>");
        $('#country').val("<?php echo $this->user->info->country ?>");
    }
}
</script>
