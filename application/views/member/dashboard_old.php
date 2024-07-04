<script>
(function(s, e, n, d, er) {
    s['Sender'] = er;
    s[er] = s[er] || function() {
        (s[er].q = s[er].q || []).push(arguments)
    }, s[er].l = 1 * new Date();
    var a = e.createElement(n),
        m = e.getElementsByTagName(n)[0];
    a.async = 1;
    a.src = d;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://cdn.sender.net/accounts_resources/universal.js', 'sender');
sender('916c529e8e8266')
</script>

<div class="dashboard">
    <div class="row">
        <div class="col-lg-2">
            <div class="user-image">
            </div>
        </div>
        <div class="col-lg-3">

            <div class="user-info">
                <ul>
                    <li class="name"><i class="glyphicon glyphicon-user"></i><span><?php echo $this->session->userdata('MemberFirstName')
." ".$this->session->userdata("MemberLastName"); ?></span></li>
                    <li><i
                            class="glyphicon glyphicon-envelope"></i><?php echo $this->session->userdata("MemberEmail"); ?>
                    </li>

                    <?php if($this->session->userdata("MemberPhone") != "" ) { ?>
                    <li><i class="glyphicon glyphicon-phone"></i><?php echo $this->session->userdata("MemberPhone"); ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div class="circles col-lg-4">
                    <input class="knob" data-fgColor="#8dc63f" data-thickness=".07" readonly
                        value="<?php echo intval($appraovedPercentage); ?>">
                    <span><?php echo $this->lang->line('circles_available'); ?></span>
                </div>
                <div class="circles col-lg-4">
                    <input class="knob" data-fgColor="#00aeef" data-thickness=".07" readonly
                        value="<?php echo intval($rejectPercentage); ?>">
                    <span><?php echo $this->lang->line('circles_rejected'); ?></span>
                </div>
                <div class="circles col-lg-4">
                    <input class="knob" data-fgColor="#ed145b" data-thickness=".07" readonly
                        value="<?php echo intval($pendingPercentage); ?>">
                    <span><?php echo $this->lang->line('circles_pending'); ?></span>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">

            <ul>
            </ul>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="order-history">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab"
                        href="#imeiorders"><?php echo $this->lang->line('tab_imei_orders'); ?></a></li>
                <li class=""><a data-toggle="tab"
                        href="#serverorders"><?php echo $this->lang->line('tab_server_orders'); ?></a></li>
                <li class=""><a data-toggle="tab" href="#latestnews"><?php echo $this->lang->line('tab_credit'); ?></a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div id="imeiorders" class="tab-pane fade active in">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table" id="TableDeferLoading">
                            <thead>
                                <tr>
                                    <th width="3%"><?php echo $this->lang->line('imei_fields_id'); ?></th>
                                    <th width="15%"><?php echo $this->lang->line('imei_fields_imei'); ?></th>
                                    <th width="30%"><?php echo $this->lang->line('imei_fields_method'); ?></th>
                                    <th width="30%"><?php echo $this->lang->line('imei_fields_code'); ?></th>
                                    <th width="5%"><?php echo $this->lang->line('imei_fields_status'); ?></th>
                                    <th width="10%"><?php echo $this->lang->line('imei_fields_datetime'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div id="pendinginvoices" class="tab-pane fade">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table" id="TableDeferLoading1">
                            <thead>
                                <tr>
                                    <th width="3%"><?php echo $this->lang->line('file_fields_id'); ?></th>
                                    <th width="15%"><?php echo $this->lang->line('file_fields_imei'); ?></th>
                                    <th width="20%"><?php echo $this->lang->line('file_fields_method'); ?></th>
                                    <th width="40%"><?php echo $this->lang->line('file_fields_code'); ?></th>
                                    <th width="7%"><?php echo $this->lang->line('file_fields_note'); ?></th>
                                    <th width="5%"><?php echo $this->lang->line('file_fields_status'); ?></th>
                                    <th width="10%"><?php echo $this->lang->line('file_fields_datetime'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div id="serverorders" class="tab-pane fade">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table" id="TableDeferLoading2">
                            <thead>
                                <tr>
                                    <th width="3%"><?php echo $this->lang->line('server_fields_id'); ?></th>
                                    <th width="20%"><?php echo $this->lang->line('server_fields_service'); ?></th>
                                    <th width="15%"><?php echo $this->lang->line('server_fields_code'); ?></th>
                                    <th width="40%"><?php echo $this->lang->line('server_fields_email'); ?></th>
                                    <th width="7%"><?php echo $this->lang->line('server_fields_note'); ?></th>
                                    <th width="5%"><?php echo $this->lang->line('server_fields_status'); ?></th>
                                    <th width="10%"><?php echo $this->lang->line('server_fields_datetime'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div id="latestnews" class="tab-pane fade">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table" id="Credit">
                            <thead>
                                <tr>
                                    <th width="3%"><?php echo $this->lang->line('credit_fields_id'); ?></th>
                                    <th width="7%"><?php echo $this->lang->line('credit_fields_code'); ?></th>
                                    <th width="5%"><?php echo $this->lang->line('credit_fields_amount'); ?></th>
                                    <th width="70%"><?php echo $this->lang->line('credit_fields_description'); ?></th>
                                    <th width="15%"><?php echo $this->lang->line('credit_fields_datetime'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<script>
$(document).ready(function() {
    $(".knob").knob({
        change: function(value) {
            //console.log("change : " + value);
        },
        release: function(value) {
            //console.log(this.$.attr('value'));
            console.log("release : " + value);
        },
        cancel: function() {
            console.log("cancel : ", this);
        },
        /*format : function (value) {
        	return value + '%';
        },*/
        draw: function() {
            $(this.i).val(this.cv + '%');
            // "tron" case
            if (this.$.data('skin') == 'tron') {

                this.cursorExt = 0.3;

                var a = this.arc(this.cv) // Arc
                    ,
                    pa // Previous arc
                    , r = 1;

                this.g.lineWidth = this.lineWidth;

                if (this.o.displayPrevious) {
                    pa = this.arc(this.v);
                    this.g.beginPath();
                    this.g.strokeStyle = this.pColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 /
                    3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });

    // Example of infinite knob, iPod click wheel
    var v, up = 0,
        down = 0,
        i = 0,
        $idir = $("div.idir"),
        $ival = $("div.ival"),
        incr = function() {
            i++;
            $idir.show().html("+").fadeOut();
            $ival.html(i);
        },
        decr = function() {
            i--;
            $idir.show().html("-").fadeOut();
            $ival.html(i);
        };
    $("input.infinite").knob({
        min: 0,
        max: 100,
        stopper: false,
        change: function() {
            if (v > this.cv) {
                if (up) {
                    decr();
                    up = 0;
                } else {
                    up = 1;
                    down = 0;
                }
            } else {
                if (v < this.cv) {
                    if (down) {
                        incr();
                        down = 0;
                    } else {
                        down = 1;
                        up = 0;
                    }
                }
            }
            v = this.cv;
        }
    });

    $('#TableDeferLoading').dataTable({
        'bProcessing': true,
        'bServerSide': true,
        'responsive': true,
        'bAutoWidth': false,
        'oLanguage': <?php echo $this->lang->line('table_language'); ?>,
        'sPaginationType': 'full_numbers',
        'sAjaxSource': '<?php echo site_url('member/dashboard/listener'); ?>',
        //'aoColumnDefs': [ { "bSortable": false, "aTargets": [ 6 ] } ],
        'aLengthMenu': [25, 50, 100, 200, 500, 1000],
        'aaSorting': [
            [0, 'desc']
        ],
        'iDisplayLength': 50,
        'sDom': 'T<"clear">lfrtip', //datatable export buttons
        'oTableTools': { //datatable export buttons
            "sSwfPath": "<?php echo $this->config->item('assets_url');?>js/plugins/dataTables/media/swf/copy_csv_xls_pdf.swf",
            "sRowSelect": "multi"
        },
        'aoColumns': [{
                'bSearchable': false,
                'bVisible': true
            },
            null,
            null,
            null,
            null,
            null,
            null
        ],
        'fnServerData': function(sSource, aoData, fnCallback) {
            <?php if($this->config->item('csrf_protection') === TRUE){	?>
            aoData.push({
                name: '<?php echo $this->config->item('csrf_token_name'); ?>',
                value: $.cookie('<?php echo $this->config->item('csrf_cookie_name'); ?>')
            });
            <?php }	?>
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
            });
        }
    });

    $('#TableDeferLoading1').dataTable({
        'bProcessing': true,
        'bServerSide': true,
        'bAutoWidth': false,
        'oLanguage': <?php echo $this->lang->line('table_language'); ?>,
        'sPaginationType': 'full_numbers',
        'sAjaxSource': '<?php echo site_url('member/dashboard/fileorder'); ?>',
        'aoColumnDefs': [{
            "bSortable": false,
            "aTargets": [6]
        }],
        'aLengthMenu': [25, 50, 100, 200, 500, 1000],
        'aaSorting': [
            [0, 'desc']
        ],
        'iDisplayLength': 50,
        'sDom': 'T<"clear">lfrtip', //datatable export buttons
        'oTableTools': { //datatable export buttons
            "sSwfPath": "<?php echo $this->config->item('assets_url');?>js/plugins/dataTables/media/swf/copy_csv_xls_pdf.swf",
            "sRowSelect": "multi"
        },
        'aoColumns': [{
                'bSearchable': false,
                'bVisible': true
            },
            null,
            null,
            null,
            null,
            null,
            null
        ],
        'fnServerData': function(sSource, aoData, fnCallback) {
            <?php				if($this->config->item('csrf_protection') === TRUE){	?>
            aoData.push({
                name: '<?php echo $this->config->item('csrf_token_name'); ?>',
                value: $.cookie('<?php echo $this->config->item('csrf_cookie_name'); ?>')
            });
            <?php				}	?>
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
            });
        }
    });

    $('#TableDeferLoading2').dataTable({
        'bProcessing': true,
        'bServerSide': true,
        'responsive': true,
        'bAutoWidth': false,
        'oLanguage': <?php echo $this->lang->line('table_language'); ?>,
        'sPaginationType': 'full_numbers',
        'sAjaxSource': '<?php echo site_url('member/dashboard/serverorder'); ?>',
        //'aoColumnDefs': [ { "bSortable": false, "aTargets": [ 6 ] } ],
        'aLengthMenu': [25, 50, 100, 200, 500, 1000],
        'aaSorting': [
            [0, 'desc']
        ],
        'iDisplayLength': 50,
        'sDom': 'T<"clear">lfrtip', //datatable export buttons
        'oTableTools': { //datatable export buttons
            "sSwfPath": "<?php echo $this->config->item('assets_url');?>js/plugins/dataTables/media/swf/copy_csv_xls_pdf.swf",
            "sRowSelect": "multi"
        },
        'aoColumns': [{
                'bSearchable': false,
                'bVisible': true
            },
            null,
            null,
            null,
            null,
            null,
            null
        ],
        'fnServerData': function(sSource, aoData, fnCallback) {
            <?php if($this->config->item('csrf_protection') === TRUE){	?>
            aoData.push({
                name: '<?php echo $this->config->item('csrf_token_name'); ?>',
                value: $.cookie('<?php echo $this->config->item('csrf_cookie_name'); ?>')
            });
            <?php }	?>
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
            });
        }
    });

    $('#Credit').dataTable({
        'bProcessing': true,
        'bServerSide': true,
        'bAutoWidth': false,
        'oLanguage': <?php echo $this->lang->line('table_language'); ?>,
        'sPaginationType': 'full_numbers',
        'sAjaxSource': '<?php echo site_url('member/dashboard/credit'); ?>',
        //'aoColumnDefs': [ { "bSortable": false, "aTargets": [ 3 ] } ],
        'aLengthMenu': [25, 50, 100, 200, 500, 1000],
        'aaSorting': [
            [0, 'desc']
        ],
        'iDisplayLength': 50,
        'sDom': 'T<"clear">lfrtip', //datatable export buttons
        'oTableTools': { //datatable export buttons
            "sSwfPath": "<?php echo $this->config->item('assets_url');?>js/plugins/dataTables/media/swf/copy_csv_xls_pdf.swf",
            "sRowSelect": "multi"
        },
        'aoColumns': [{
                'bSearchable': false,
                'bVisible': false
            },
            null,
            null,
            null,
            null

        ],
        'fnServerData': function(sSource, aoData, fnCallback) {
            <?php				if($this->config->item('csrf_protection') === TRUE){	?>
            aoData.push({
                name: '<?php echo $this->config->item('csrf_token_name'); ?>',
                value: $.cookie('<?php echo $this->config->item('csrf_cookie_name'); ?>')
            });
            <?php				}	?>
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
            });
        }
    });

});
</script>