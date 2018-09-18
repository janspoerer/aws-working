<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->settings->info->site_name ?></title>         
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

         <!-- Styles -->
        <link href="<?php echo base_url();?>styles/invoice.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

        <!-- SCRIPTS -->
        <script type="text/javascript">
        var global_base_url = "<?php echo base_url() ?>";
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        

        <!-- CODE INCLUDES -->
    </head>
    <body>
    <div class="container">
    	<div class="row">
    	<div class="col-md-12 document">

        <div class="clearfix">
    	<div class="pull-left"><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $settings->image ?>" width="250">
        </div>
        <div class="pull-right small-text">
        <table class="table"><tr>
        <td>
            <?php if($invoice->status == 1) : ?>
            <?php if($settings->enable_paypal && !empty($paypal_email)) : ?>
                <form method="post" action="https://www.paypal.com/cgi-bin/webscr" accept-charset="UTF-8">
                    <input type="hidden" name="charset" value="utf-8" />
                    <input type="hidden" name="cmd" value="_xclick" />
                    <input type="hidden" name="item_number" value="<?php echo $invoice->ID ?>" />
                    <input type="hidden" name="item_name" value="Invoice #<?php echo $invoice->invoice_id ?> for <?php echo $invoice->client_username ?> <?php echo $invoice->client_first_name ?> <?php echo $invoice->client_last_name ?>" />
                    <input type="hidden" name="amount" value="<?php echo $invoice->total ?>" />
                    <input type="hidden" name="quantity" value="1" />
                    <input type="hidden" name="custom" value="<?php echo $invoice->hash ?>" />
                    <input type="hidden" name="business" value="<?php echo $paypal_email ?>" />
                    <input type="hidden" name="currency_code" value="<?php echo $invoice->code ?>" />
                    <input type="hidden" name="notify_url" value="<?php echo site_url("IPN/process") ?>" />
                    <input type="hidden" name="return" value="<?php echo site_url("invoices/view/" . $invoice->ID . "/" . $invoice->hash) ?>" />
                    <input type="hidden" name="cancel_return" value="<?php echo site_url("invoices/view/" . $invoice->ID . "/" . $invoice->hash) ?>" />
                    <input type="hidden" name="no_shipping" value="1" />
                    <input type="hidden" name="no_note" value="1" />
                    <input type="submit" name="button" value="<?php echo lang("ctn_662") ?>" class="btn btn-success" />
                </form>

                <hr>
            <?php endif; ?>

            <?php if($settings->enable_stripe && $stripe !==null) : ?>
                <form action="<?php echo site_url("IPN/stripe/" . $invoice->ID . "/" . $invoice->hash) ?>" method="post">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                          data-key="<?php echo $stripe['publishable_key']; ?>"
                          data-description="Invoice #<?php echo $invoice->invoice_id ?> @ <?php echo $this->settings->info->site_name ?>"
                          data-amount="<?php echo str_replace(".","", $invoice->total) ?>"
                          data-currency="<?php echo $invoice->code ?>"
                          data-locale="auto"></script>
                </form>
                <hr>
            <?php endif; ?>
            <?php if($settings->enable_checkout2 && !empty($checkout2['accountno'])) : ?>
                <h4>2CHECKOUT</h4>
            <img src="https://www.2checkout.com/upload/images/paymentlogoshorizontal.png" alt="2Checkout.com is a worldwide leader in online payment services" />
                <form action='https://www.2checkout.com/checkout/purchase' method='post'>
                <input type='hidden' name='sid' value='<?php echo $checkout2['accountno'] ?>' />
                <input type='hidden' name='mode' value='2CO' />
                <input type='hidden' name='li_0_type' value='product' />
                <input type='hidden' name='li_0_name' value='Invoice #<?php echo $invoice->invoice_id ?> for <?php echo $invoice->client_username ?> <?php echo $invoice->client_first_name ?> <?php echo $invoice->client_last_name ?>' />
                <input type='hidden' name='li_0_price' value='<?php echo $invoice->total ?>' />
                <input type='hidden' name='x_receipt_link_url' value="<?php echo site_url("IPN/checkout2") ?>">
                <input type="hidden" name="titan_invoice_hash" value="<?php echo $invoice->hash ?>" />
                <input type="hidden" name="titan_invoiceid" value="<?php echo $invoice->ID ?>" />
                <input type="hidden" name="currency_code" value="<?php echo $invoice->code ?>" />
                <input name='submit' type='submit' value='<?php echo lang("ctn_1214") ?>' />
                </form>
            <?php endif; ?>
        <?php elseif($invoice->status == 2) : ?>
            <h2 class="paid"><?php echo lang("ctn_651") ?></h2>
        <?php endif; ?>
        </td>
        <td>
         <p class="small-text">
        <?php if(!empty($invoice->first_name)) : ?><strong><?php echo $invoice->first_name ?> <?php echo $invoice->last_name ?></strong><br /><?php endif; ?>
        <?php if(!empty($invoice->address_1)) : ?><?php echo $invoice->address_1 ?><br /><?php endif; ?>
        <?php if(!empty($invoice->address_2)) : ?><?php echo $invoice->address_2 ?><br /><?php endif; ?>
        <?php if(!empty($invoice->city)) : ?><?php echo $invoice->city ?><br /><?php endif; ?>
        <?php if(!empty($invoice->state)) : ?><?php echo $invoice->state ?><br /><?php endif; ?>
        <?php if(!empty($invoice->zipcode)) : ?><?php echo $invoice->zipcode ?><br /><?php endif; ?>
        <?php if(!empty($invoice->country)) : ?><?php echo $invoice->country ?><?php endif; ?>
            </p>
            </td><td>
                <p class="small-text">
        <?php if(!empty($invoice->client_first_name)) : ?><strong><?php echo $invoice->client_first_name ?> <?php echo $invoice->client_last_name ?></strong><br /><?php endif; ?>
        <?php if(!empty($invoice->client_address_1)) : ?><?php echo $invoice->client_address_1 ?><br /><?php endif; ?>
        <?php if(!empty($invoice->client_address_2)) : ?><?php echo $invoice->client_address_2 ?><br /><?php endif; ?>
        <?php if(!empty($invoice->client_city)) : ?><?php echo $invoice->client_city ?><br /><?php endif; ?>
        <?php if(!empty($invoice->client_state)) : ?><?php echo $invoice->client_state ?><br /><?php endif; ?>
        <?php if(!empty($invoice->client_zipcode)) : ?><?php echo $invoice->client_zipcode ?><br /><?php endif; ?>
        <?php if(!empty($invoice->client_country)) : ?><?php echo $invoice->client_country ?><?php endif; ?>
            </p>
            </td>
            </tr>
            </table>

        </div>
        </div>

        <?php if(!empty($invoice->notes)) : ?>
            <div class="row">
            <div class="col-md-12">
            <?php echo $invoice->notes ?>
            </div>
            </div>
        <?php endif; ?>

    	<div class="row">
    	<div class="col-md-6">
    	<h4><?php echo lang("ctn_652") ?></h4>
    	<table class="table table-bordered">
    	<tr><td><?php echo lang("ctn_588") ?></td><td><b><?php echo $invoice->invoice_id ?></b></td></tr>
    	<tr><td><?php echo lang("ctn_653") ?></td><td><?php echo date($this->settings->info->date_format, $invoice->timestamp) ?></td></tr>
    	<tr><td><?php echo lang("ctn_599") ?></td><td><?php echo date($this->settings->info->date_format, $invoice->due_date) ?>
        <?php if($invoice->due_date < time() && $invoice->status == 1) {
            echo"<span class='overdue'>".lang("ctn_654")."</span>";
        }
        ?>
        </td></tr>
    	<tr><td>Status</td><td> <?php 
    		if($invoice->status == 1) {
              $status = "<span class='label label-danger'>".lang("ctn_595")."</span>";
          } elseif($invoice->status == 2) {
              $status = "<span class='label label-success'>".lang("ctn_596")."</span>";
          } elseif($invoice->status == 3) {
              $status = "<span class='label label-default'>".lang("ctn_597")."</span>";
          }
           	echo $status;
          ?> </td></tr>
    	</table>
    	</div>
    	<div class="col-md-6">
    	<h4><?php echo lang("ctn_655") ?></h4>
    	<table class="table table-bordered">
    	<tr><td><?php echo lang("ctn_656") ?></td><td><b><?php echo $invoice->paypal_email ?> - <?php echo $invoice->acc_username ?> - <?php echo $invoice->first_name ?> <?php echo $invoice->last_name ?></b></td></tr>
    	<tr><td><?php echo lang("ctn_657") ?></td><td><b> <?php echo $invoice->client_email ?> - <?php echo $invoice->client_username ?> - <?php echo $invoice->client_first_name ?> <?php echo $invoice->client_last_name ?></b></td></tr>
    	<tr><td><?php echo lang("ctn_589") ?></td><td> <?php echo $invoice->title ?></td></tr>
    	<tr><td><?php echo lang("ctn_663") ?></td><td> <?php if($invoice->date_paid) echo date($this->settings->info->date_format . " h:i:s", $invoice->date_paid) ?> <?php if(!empty($invoice->paid_by)) : ?><?php echo $invoice->paid_by ?><?php endif; ?></td></tr>
    	</table>
    	</div>
    	</div>

    	<div class="row">
    	<div class="col-md-12">
    	<table class="table">
    		<thead><tr><th><?php echo lang("ctn_616") ?></th><th><?php echo lang("ctn_617") ?></th><th><?php echo lang("ctn_618") ?></th><th class="align-right"><?php echo lang("ctn_619") ?></th></tr></thead>
    		<?php $sub_total = 0; ?>
    		<?php foreach($items->result() as $r) : ?>
    			<?php $total = number_format($r->quantity*$r->amount,2);
    			$sub_total += $r->amount*$r->quantity; ?>
    			<tr><td><?php echo $r->name ?></td><td><?php echo $r->quantity ?></td><td><?php echo $r->amount ?></td><td class="align-right"><?php echo $total ?></td></tr>
    		<?php endforeach; ?>

    		<tr class="warning align-right"><td colspan="4"><?php echo lang("ctn_625") ?>: <?php echo number_format($sub_total,2) ?>
    		<?php $total = $sub_total; ?>
    		<br /><?php if(!empty($invoice->tax_name_1)) : ?>
    		<?php
    		$tax_addon = abs($sub_total/100*$invoice->tax_rate_1);
			$total += $tax_addon;
    		?>
    		<?php echo lang("ctn_658") ?> (<?php echo $invoice->tax_name_1 ?>) @ <?php echo $invoice->tax_rate_1 ?>% : <?php echo number_format($tax_addon,2) ?><br />
    		<?php endif; ?>
    		<br /><?php if(!empty($invoice->tax_name_2)) : ?>
    		<?php
    		$tax_addon = abs($sub_total/100*$invoice->tax_rate_2);
			$total += $tax_addon;
    		?>
            <?php echo lang("ctn_658") ?> (<?php echo $invoice->tax_name_2 ?>) @ <?php echo $invoice->tax_rate_2 ?>% : <?php echo number_format($tax_addon,2) ?><br />
    		<?php endif; ?>
    		<b><?php echo lang("ctn_628") ?>: <?php echo $invoice->symbol ?><?php echo number_format($total,2) ?></b>
    		</td></tr>
    	</table>
    	</div></div>

        <a href="javascript:window.print()"><?php echo lang("ctn_664") ?></a>

    	</div>
    	</div>
    </div>
    </body>
</html>