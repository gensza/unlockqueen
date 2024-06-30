<h2><?php echo $heading; ?></h2>
<?php $this->load->view('includes/messages'); ?>
	<?php echo form_open('register',array('role' =>'form','method' =>'post' )); ?>
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('register_lb_first_name') ?></label>
    <input type="text" name="FirstName" value="<?php echo set_value('FirstName'); ?>" class="form-control" placeholder="<?php echo $this->lang->line('register_lb_first_name') ?>" required >
  </div>
  
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('register_lb_last_name') ?></label>
    <input type="text" name="LastName" value="<?php echo set_value('LastName'); ?>" class="form-control" placeholder="<?php echo $this->lang->line('register_lb_last_name') ?>" required >
  </div>

  <div class="form-group">
    <label for=""><?php echo $this->lang->line('register_lb_email') ?></label>
    <input type="email" name="Email" value="<?php echo set_value('Email'); ?>" class="form-control" placeholder="<?php echo $this->lang->line('register_lb_email') ?>" required >
  </div>
  
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('register_lb_password') ?></label>
    <input type="password" name="Password" class="form-control" placeholder="<?php echo $this->lang->line('register_lb_password') ?>" required >
  </div>
  
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('register_lb_confirm_password') ?></label>
    <input type="password" name="CPassword" class="form-control" placeholder="<?php echo $this->lang->line('register_lb_confirm_password') ?>" required >
  </div>
  <button type="submit" class="btn btn-warning btn-lg"><?php echo $this->lang->line('register_btn_sign_up') ?></button>
  
<?php echo form_close(); ?>
