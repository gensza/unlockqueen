<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Bulk File Order Request
				</div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <?php echo form_open('admin/fileorder/bulk_operation',array('method' => 'post','id'=>'form')); ?>
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Refund<input type="checkbox" name="checkall" id="checkAll"/></th>
                                <th width="5%">ID</th>
                                <th width="15%">File</th>
                                <th width="35%">Service</th>
                                <th width="20%"><?php echo form_input(array('id'=> 'code', 'placeholder' => 'Code', 'class' => "form-control")); ?></th>                    
                                <th width="20%"><?php echo form_input(array('id'=> 'comments', 'placeholder' => 'Comments', 'class' => "form-control")); ?></th>                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $value): ?>
                        <?php $id = $value['ID']; ?>
                            <tr>
                                <td><input type="checkbox" name="refund[<?php echo $id; ?>]" class="checkbox" value="<?php echo $value['ID']; ?>"/></td> 
                                <td><?php echo $id; ?></td>
                                <td><a href="<?php echo $this->config->item('fileservice_url').$value['FileName']; ?>"><?php echo $value['FileName']; ?></a></td>
                                <td><?php echo $value['Title']; ?></td>
                                <td><input type="text" name="Code[<?php echo $id; ?>]" class="codes form-control" /></td>
                                <td><input type="text" name="Comments[<?php echo $id; ?>]" class="comments form-control" /></td>
                            </tr>
                        <?php endforeach; ?>                                                             
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-info">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    $("#code").keyup(function(){
        var val = $(this).val();
        $(":input[class ^=codes ]").val(val);
    });
    $("#comments").keyup(function(){
        var val = $(this).val();
        $(":input[class ^=comments ]").val(val);
    });
    $('#checkAll').click(function () {    
        var check = $(this).prop('checked');
        if(check == true) {
            $('.checker').find('span').addClass('checked');
            $('.checkbox').prop('checked', true);
        } else {
            $('.checker').find('span').removeClass('checked');
            $('.checkbox').prop('checked', false);
        }
    });
});
</script>