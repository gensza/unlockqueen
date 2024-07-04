<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-2">
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-1">
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
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-1">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Available</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChartAvailable"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-1">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Rejected</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChartRejected"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-1">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Pending</div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="doughnutChartPending"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-1">
        <div class="card card-profile">
            <div class="card-header">
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
                    <div class="card-title">IMEI Orders</div>
                    <div class="card-tools">
                        <div class="dropdown">
                            <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">IMEI Orders</a>
                                <a class="dropdown-item" href="#">Server Orders</a>
                                <a class="dropdown-item" href="#">Credits</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive p-5">
                    <!-- Projects table -->
                    <table id="table_data" class="table table-sm table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>IMEI</th>
                                <th>Description</th>
                                <th>Service</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                    </table>
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