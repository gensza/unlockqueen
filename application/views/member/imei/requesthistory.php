<style>
    @media screen and (max-width: 767px) {
    .main-panel .page-header .breadcrumbs {
        margin-left: 0;
        padding-top: 5px;
        padding-left: 5px;
        padding-bottom: 0;
        border-left: 0;
    }
}
</style>
<div class="page-header">
    <div class="d-flex justify-content-between">
        <h3 class="fw-bold">IMEI Orders</h3>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">IMEI Orders </a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">IMEI Order History</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive p-0">
                        <!-- Projects table -->
                        <table id="table_data_imei" class="table table-sm table-striped table-hover" style="width:100%;font-size:32px">
                            <thead>
                                <tr>
                                    <th width="0%">No</th>
                                    <th width="0%">Detail</th>
                                    <th>IMEI</th>
                                    <!-- <th>Description</th> -->
                                    <!-- <th>Price</th> -->
                                    <!-- <th>Service</th> -->
                                    <!-- <th>Code</th> -->
                                    <th>Status</th>
                                    <!-- <th>Created at</th> -->
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailImeiOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail IMEI Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-action mb-4">
                    <div class="collapse show">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">TITLE </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="titleModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">IMEI </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="imeiModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">PRICE </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="priceModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">DELIVERY TIME </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="deliveryModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">STATUS </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="statusModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">CODE </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="codeModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">COMMENTS </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="commentsModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">NOTE </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="noteModal" style="padding-left: 0px !important;"></td>
                                </tr>
                                <tr>
                                    <th style="width: 160px;padding-right: 0px !important;">CREATED AT </th>
                                    <td class="text-center" style="width: 0px;padding-left: 0px !important;">:</td>
                                    <td id="createdAtModal" style="padding-left: 0px !important;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</style>
<!-- Select2 -->
<script type="text/javascript">
var base_url = "<?= base_url() ?>";
$(document).ready(function() {

    const windowWidth = window.innerWidth;
    if(windowWidth > 500){
        $('.table-responsive').removeClass('p-0');
    }

    $("#table_data_imei").DataTable().destroy();
    new DataTable('#table_data_imei', {

        ajax: {
            url: base_url + "member/dashboard/listener_new",
            type: 'POST',
            "data": {}
        },
        columns: [
            { data: "no" },
            { data: "detail" },
            { data: "imei" },
            // { data: "description" },
            // { data: "price" },
            // { data: "service" },
            // { data: "code" },
            { data: "status" },
            // { data: "created_at" },
        ],

        pagingType: "input",
        "processing": true,
        "serverSide": true,
        bInfo: false,
        ordering: false,
        deferRender: true,
        searching: true,
    });
});
</script>