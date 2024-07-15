<?php if(!empty($Price)): ?>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_fields_price') ?></label>
    <div class="col-sm-9 text"><?php echo $Price; ?> <?php echo $this->lang->line('header_credits') ?></div>
</div>
<?php endif; ?>

<?php if(!empty($Delivery_time)) : ?>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_fields_delivery_time') ?></label>
    <div class="col-sm-9 text"><?php echo $Delivery_time; ?></div>
</div>
<?php endif; ?>

<?php if(!empty($Description) ): ?>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('imei_fields_description') ?></label>
    <div class="col-sm-9 text"><?php echo nl2br($Description); ?>
    </div>
</div>
<?php endif; ?>

<?php 
if( !empty($services) ):
?>
<div class="form-group">
    <label class="col-sm-3 control-label">Service Type</label>
    <div class="col-sm-6">
        <select name="RequiredFields[service_type_id]" class="form-control" required>
            <?php foreach ($services as $s): ?>
            <option value="<?php echo $s['id']; ?>"><?php echo $s['name']; ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<?php
endif; 
?>

<?php 
if($RequiredFields): 
  $fields = explode('|', $RequiredFields);
  foreach($fields as $field):
?>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo ucwords(strtolower($field)); ?></label>
    <div class="col-sm-6">
        <input type="text" value="<?php echo set_value($field); ?>" name="RequiredFields[<?php echo $field ?>]"
            placeholder="<?php echo ucwords(strtolower($field)) ?>" class="form-control">
    </div>
</div>
<?php 
  endforeach;
endif; 
?>