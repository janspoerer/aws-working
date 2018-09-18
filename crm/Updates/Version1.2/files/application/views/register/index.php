<div class="container">
    <div class="row">
    <div class="col-md-5 center-block-e">

<div class="login-page-header">
 <?php echo lang("ctn_212") ?> <?php echo $this->settings->info->site_name ?>

</div>
<div class="login-page">
    		<?php if(!empty($fail)) : ?>
				<div class="alert alert-danger"><?php echo $fail ?></div>
			<?php endif; ?>

    		<?php echo form_open(site_url("register"), array("class" => "form-horizontal")) ?>
				<div class="form-group">

					    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_214") ?></label>
					    <div class="col-md-9">
					    	<input type="email" class="form-control" id="email-in" name="email" value="<?php if(isset($email)) echo $email; ?>">
					    </div>
			  	</div>

			  	<div class="form-group">

					    <label for="username-in" class="col-md-3 label-heading"><?php echo lang("ctn_215") ?></label>
					    <div class="col-md-6">
					    	<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($username)) echo $username; ?>">
					    	<div id="username_check"></div>
					    </div>
					    <div class="col-md-3">
					    	<input type="button" class="btn btn-default" value="<?php echo lang("ctn_210") ?>" onclick="checkUsername()" />
					    </div>
			  	</div>

			  	<div class="form-group">

					    <label for="password-in" class="col-md-3 label-heading"><?php echo lang("ctn_216") ?></label>
					    <div class="col-md-9">
					    	<input type="password" class="form-control" id="password-in" name="password" value="">
					    </div>
			  	</div>

			  	<div class="form-group">

					    <label for="cpassword-in" class="col-md-3 label-heading"><?php echo lang("ctn_217") ?></label>
					    <div class="col-md-9">
					    	<input type="password" class="form-control" id="cpassword-in" name="password2" value="">
					    </div>
			  	</div>

			  	<div class="form-group">

					    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_218") ?></label>
					    <div class="col-md-9">
					    	<input type="text" class="form-control" id="name-in" name="first_name" value="<?php if(isset($first_name)) echo $first_name ?>">
					    </div>
			  	</div>
			  	<div class="form-group">

					    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_219") ?></label>
					    <div class="col-md-9">
					    	<input type="text" class="form-control" id="name-in" name="last_name" value="<?php if(isset($last_name)) echo $last_name ?>">
					    </div>
			  	</div>

			  	<?php if(!$this->settings->info->disable_captcha) : ?>
		  		<div class="form-group">

				    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_220") ?></label>
				    <div class="col-md-9">
				    	<p><?php echo $cap['image'] ?></p>
						<input type="text" class="form-control" id="captcha-in" name="captcha" placeholder="<?php echo lang("ctn_306") ?>" value="">
				    </div>
		  		</div>
		  		<?php endif; ?>
		  		<?php if($this->settings->info->google_recaptcha) : ?>
		  			<div class="form-group">

				    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_220") ?></label>
				    <div class="col-md-9">
				    	<div class="g-recaptcha" data-sitekey="<?php echo $this->settings->info->google_recaptcha_key ?>"></div>
				    </div>
		  		</div>
		  		<?php endif ?>


		  		<input type="submit" name="s" class="btn btn-primary form-control" value="<?php echo lang("ctn_221") ?>" />

		  		<hr>

		  		<p><?php echo lang("ctn_222") ?></p>

		  		          <?php if(!$this->settings->info->disable_social_login) : ?>
<div class="text-center decent-margin-top">
<div class="btn-group">
  <a href="<?php echo site_url("login/twitter_login") ?>" class="btn btn-default" >
    <img src="<?php echo base_url() ?>images/social/twitter.png" height="20" class='social-icon' />
   Twitter</a>
</div>

<div class="btn-group">
  <a href="<?php echo site_url("login/facebook_login") ?>" class="btn btn-default" >
    <img src="<?php echo base_url() ?>images/social/facebook.png" height="20" class='social-icon' />
   Facebook</a>
</div>

<div class="btn-group">
  <a href="<?php echo site_url("login/google_login") ?>" class="btn btn-default" >
    <img src="<?php echo base_url() ?>images/social/google.png" height="20" class='social-icon' />
   Google</a>
</div>
</div>
<?php endif; ?>

		  		<p class="decent-margin"><a href="<?php echo site_url("login") ?>" class="btn btn-success form-control" ><?php echo lang("ctn_223") ?></a></p>

		  	<?php echo form_close() ?>
</div>

</div>
</div>
</div>