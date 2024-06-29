<div class="dashboard">
  <div class="row">
    <div class="col-lg-12">
      <h2><?php echo $this->lang->line('my_account_heading'); ?></h2>
    </div>
  </div>

<div class="row">
<div class="col-lg-8">
<?php $this->load->view('includes/messages'); ?>
  <?php echo form_open('member/dashboard/editprofile', array('role' => 'form', 'method' => 'post','id' => 'imeireq' ,'name' => 'form2', 'class' => 'form-horizontal')); ?>
    <?php echo form_hidden("ID", $data[0]['ID']); ?>      
      <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_lb_first_name') ?></label>
      <div class="col-sm-9">
      <input type="text" name="FirstName"  placeholder="<?php echo $this->lang->line('my_account_lb_first_name') ?>" value="<?php echo $data[0]['FirstName']; ?>" required class="form-control" >
      </div>
    </div>
      
      <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_lb_last_name') ?></label>
      <div class="col-sm-9">
      <input type="text" name="LastName"  placeholder="<?php echo $this->lang->line('my_account_lb_last_name') ?>" value="<?php echo $data[0]['LastName']; ?>" required class="form-control" >
      </div>
    </div>
      
      <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_lb_email') ?></label>
      <div class="col-sm-9">
      <input type="email" name="Email" readonly="readonly"  placeholder="<?php echo $this->lang->line('my_account_lb_email') ?>" value="<?php echo $data[0]['Email']; ?>" required class="form-control" >
      </div>
    </div>
      
      <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_lb_current_password') ?></label>
      <div class="col-sm-9">
      <input type="password" name="CurrentPassword" placeholder="<?php echo $this->lang->line('my_account_lb_current_password') ?>" required class="form-control" >
      </div>
    </div>
      
      <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_lb_new_password') ?></label>
      <div class="col-sm-9">
      <input type="password" name="NewPassword" placeholder="<?php echo $this->lang->line('my_account_lb_new_password') ?>" class="form-control" >
      </div>
    </div>
      
    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_lb_confirm_new_password') ?></label>
      <div class="col-sm-9">
      <input type="password" name="ConfirmPassword" placeholder="<?php echo $this->lang->line('my_account_lb_confirm_new_password') ?>"  class="form-control" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_api_key') ?></label>
      <div class="col-sm-6">
      <input type="text" placeholder="<?php echo $this->lang->line('my_account_api_key') ?>" value="<?php echo set_value('ApiKey', $data[0]['ApiKey']); ?>" class="form-control" disabled="disabled" >
      </div>
      <div class="col-sm-3">
      <input type="checkbox" name="ResetApiKey" value="reset"> Reset API Key
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_server_ip') ?></label>
      <div class="col-sm-6">
      <input type="text" placeholder="<?php echo $this->lang->line('my_account_server_ip') ?>" value="<?php echo set_value('ServerIP', $data[0]['ServerIP']); ?>" class="form-control" disabled="disabled">
      </div>
      <div class="col-sm-3">
      <input type="checkbox" name="ResetServerIP" value="reset"> Reset IP Bindings
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $this->lang->line('my_account_api_status') ?></label>
      <div class="col-sm-3">
      <?php echo form_dropdown('ApiStatus', ['Enabled'=>'Enabled', 'Disabled'=>'Disabled'], set_value('ApiStatus', $data[0]['ApiStatus']), 'class="form-control"'); ?>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-warning btn-lg"><?php echo $this->lang->line('my_account_btn_update') ?></button>
      </div>
    </div>
  <?php echo form_close(); ?>

    </div>
</div>
