<h2><?php echo $heading; ?></h2>
<?php $this->load->view('includes/messages'); ?>
	<?php echo form_open('forgot_password', array('role' =>'form','method' =>'post' )); ?>
  <div class="form-group">
    <label for=""><?php echo $this->lang->line('forgot_password_lb_email') ?></label>
    <input type="email" name="Email" class="form-control" value="" placeholder="<?php echo $this->lang->line('forgot_password_lb_email') ?>">
  </div>
  <button type="submit" class="btn btn-warning btn-lg"><?php echo $this->lang->line('forgot_password_btn_submit') ?></button>
<?php echo form_close(); ?>
