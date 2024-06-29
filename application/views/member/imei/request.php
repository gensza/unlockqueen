<div class="dashboard">
<div class="row">
  <div class="col-lg-12">
  <h2><?php echo $this->lang->line('imei_fields_request_title') ?></h2>
  </div>
</div>

<div class="row">
<div class="col-lg-12">
<?php $this->load->view('includes/messages'); ?>
<?php echo form_open('member/imeirequest/insert', array('role' => 'form', 'method' => 'post','id' => 'imeireq' ,'name' => 'form2', 'class' => 'form-horizontal')); ?>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_fields_method') ?></label>
    <div class="col-sm-8">
    <select name="MethodID" id="MethodID" class="form-control" required >
    	<option value="" ><?php echo $this->lang->line('imei_fields_select') ?></option>
    	<?php foreach($imeimethods as $network): ?>
            <?php if(!empty($network['methods'])): ?>
        <optgroup label="<?php echo $network['Title'] ?>">
                <?php foreach($network['methods'] as $method): ?>
			<option value="<?php echo $method['ID'] ?>" <?php echo set_select('MethodID', $method['ID']); ?>><?php echo $method['Title'].'- Only '.$method['Price'].' credit required'; ?></option>
                <?php endforeach; ?>
        </optgroup>
            <?php endif; ?>    
		<?php endforeach; ?>
    </select>
    </div>
    
    </div>
    <div id="load-field" ></div>
    
    <div class="form-group">
	    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_fields_imei_sr') ?></label>
	    <div class="col-sm-4">
	    	<textarea name="IMEI" id="IMEI" placeholder="<?php echo $this->lang->line('imei_fields_imei_sr') ?>" class="form-control" minlength="12" required><?php echo set_value('IMEI'); ?></textarea>
	    </div>
  	</div>
    
    <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_fields_email') ?></label>
    <div class="col-sm-4">
    <input type="email" name="Email"  placeholder="<?php echo $this->lang->line('imei_fields_email') ?>" class="form-control" value="<?php echo set_value('Email'); ?>">
    </div>
  </div>
  
  <div class="form-group">
	    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_request_note') ?></label>
	    <div class="col-sm-6">
	    	<textarea name="Note" placeholder="<?php echo $this->lang->line('imei_request_note') ?>" class="form-control"><?php echo set_value('Note'); ?></textarea>
	    </div>
  	</div>
  </div>
   
   
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
  <button type="submit" class="btn btn-warning btn-lg"><?php echo $this->lang->line('imei_fields_submit') ?></button>
  </div>
  </div>
<?php echo form_close(); ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var id = $("#MethodID").val();
    if(id != "")
    {
        var data = $("#imeireq").serialize();
        $.ajax({
            type: "post",
            url: "<?php echo site_url('member/imeirequest/formfields'); ?>",
            data: data,
            cache: false,
            success: function(data)
            {
                $("#load-field").html('');
                $("#load-field").html(data);
            }
        });		
    }	    
    $("#MethodID").change(function(){
        var id = $("#MethodID").val();
        if(id != "")
        {
            var data = $("#imeireq").serialize();
            $.ajax({
                type: "post",
                url: "<?php echo site_url('member/imeirequest/formfields'); ?>",
                data: data,
                cache: false,
                success: function(data)
                {
                    $("#load-field").html('');
                    $("#load-field").html(data);
                }
            });		
        }	
        else
        {
            $("#load-field").html('');
        }
    });
    $('#MethodID').select2();	
});
</script>