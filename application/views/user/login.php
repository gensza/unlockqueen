<marquee behavior="scroll" direction="left">iCloud MEID / GSM BYPASS WITH SIGNAL SERVICE ON </marquee>

<h2><?php echo $heading; ?></h2>
<?php $this->load->view('includes/messages'); ?>
	<?php echo form_open('login',array('role' =>'form','method' =>'post' )); ?>
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('login_lb_email') ?></label>
    <input type="email" name="Email" value="<?php echo set_value('Email'); ?>" class="form-control" placeholder="<?php echo $this->lang->line('login_lb_email') ?>" required="">
  </div>
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('login_lb_password') ?></label>
    <input type="password" name="Password" class="form-control" placeholder="<?php echo $this->lang->line('login_lb_password') ?>" required="">
  </div>
  <button type="submit" class="btn btn-warning btn-lg"><?php echo $this->lang->line('login_btn_login') ?></button>

<?php echo form_close(); ?>