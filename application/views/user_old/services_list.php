<?php $services_model = ''; ?>
<h2><?php echo $heading; ?></h2>
<?php if( count($imei_services) > 0 ): ?>
<ul class="list-group">
    <?php foreach ($imei_services as $v): ?>
    <?php if( isset($v['methods']) && count($v['methods']) > 0 ): ?>
    <li class="list-group-item"><a href="#"><?php echo $v['Title']; ?></a>
        <ul class="sub-menu">
        <?php foreach ($v['methods'] as $method): ?>
       
            
                 <li style="background:black;color:red;">
                <a data-toggle="modal" href="#method<?php echo $method['ID']; ?>"><?php echo $method['Title'] ?></a> <span class="badge"><?php echo $method['DeliveryTime'] ?></span>&nbsp;<span class="badge"><?php echo $method['Price'] ?> <?php echo $this->lang->line('services_credits') ?></span>
                <?php $services_model .= $this->load->view('includes/services_modal', $method, true); ?>
            
            </li>
              
        <?php endforeach ?>
        </ul>
    </li>
  
    <?php endif ?>
    <?php endforeach ?>
</ul>
<?php echo (isset($services_model)? $services_model: '') ?>
<?php else: ?>
<p><?php echo $this->lang->line('services_not_found') ?></p>
<?php endif ?>