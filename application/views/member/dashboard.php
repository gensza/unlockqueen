<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-2">
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Balance</p>
                            <h4 class="card-title"><?= number_format($credit, 2) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-md-auto">
        <a href="#" class="btn btn-primary btn-round"> + Add Fund</a>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Available</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChartAvailable" style="margin-top: -30px;margin-bottom: -20px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Rejected</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChartRejected" style="margin-top: -30px;margin-bottom: -20px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Pending</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChartPending" style="margin-top: -30px;margin-bottom: -20px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
        <div class="card card-profile">
            <div class="card-header" style="height: 62px">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="<?= base_url() ?>assets/img/profile/profile.jpg" alt="..."
                            class="avatar-img rounded-circle" />
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name">
                        <?= $this->session->userdata('MemberFirstName') . " " . $this->session->userdata("MemberLastName");?>
                    </div>
                    <div class="job"><?php echo $this->session->userdata("MemberEmail"); ?></div>
                    <div class="desc">I knew that you would do this!</div>
                    <div class="social-media">
                        <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                            <span class="btn-label just-icon"><i class="icon-social-twitter"></i>
                            </span>
                        </a>
                        <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                            <span class="btn-label just-icon"><i class="icon-social-facebook"></i>
                            </span>
                        </a>
                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                            <span class="btn-label just-icon"><i class="icon-social-instagram"></i>
                            </span>
                        </a>
                    </div>
                    <div class="view-profile">
                        <a href="#" class="btn btn-secondary w-100">View Full Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <div class="card-title"><span id="titleOrderHistory">IMEI
                            Orders</span></div>
                    <div class="card-tools">
                        <div class="dropdown">
                            <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button class="dropdown-item" onclick="historyOrderTable('IMEI Orders')">IMEI
                                    Orders</button>
                                <button class="dropdown-item" onclick="historyOrderTable('Server Orders')">Server
                                    Orders</button>
                                <button class="dropdown-item" onclick="historyOrderTable('Credits')">Credits</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- data table for IMEI -->
            <div class="card-body p-0" id="tableDataImei">
                <div class="table-responsive p-5">
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

            <!-- data table for Server -->
            <div class="card-body p-0" id="tableDataServer">
                <div class="table-responsive p-5">
                    <!-- Projects table -->
                    <table id="table_data_server" class="table table-sm table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Service</th>
                                <th>Code</th>
                                <th>Email</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- data table for Credits -->
            <div class="card-body p-0" id="tableDataCredit">
                <div class="table-responsive p-5">
                    <!-- Projects table -->
                    <table id="table_data_credit" class="table table-sm table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                    </table>
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
<script>
var appraovedPercentage = <?= $appraovedPercentage ?>;
var rejectPercentage = <?= $rejectPercentage ?>;
var pendingPercentage = <?= $pendingPercentage ?>;
var base_url = "<?= base_url() ?>";
</script>