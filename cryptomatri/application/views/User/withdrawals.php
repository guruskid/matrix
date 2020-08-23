<style>
    #timer {
        width: 50%;
    }

    @media (max-width: 991.98px) {
        #timer {
            width: 100%;
        }
    }

    #timer .time {
        width: 25%;
        font-size: 38px;
        font-weight: 200;
        border-left: 1px solid rgba(0, 0, 0, 0.05);
        color: #0c7a08;
    }

    #timer .time:first-child {
        border-left: transparent;
    }

    #timer .time span {
        font-size: 16px;
        display: block;
        color: #000000;
    }
</style>
<!-- Right side column. Contains the navbar and content of the page -->
 <!-- Check if User Plan is Activated -->
 <?php
        $check = $this->db->get_where('activated_plans', array(
            'user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'),
            'status' => 1)); 
        $check2 = $this->db->get_where('activated_plans', array(
            'user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'))); 
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Withdrawals</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>$<?php echo  number_format($this->db->get_where('members', array('encrypted_id' => $this->session->userdata('matrix_user_encrypted_id')))->row()->capital, 2); ?></h3>
                        <p>Capitals</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>$53</h3>
                        <p>Earned</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>$44</h3>
                        <p>Referral Bonus</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>$65</h3>
                        <p>Withdrawn</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- Main row -->

        <div class="text-center">
            <h1 class="text-center">Crypto Matrix :: Withdrawals</h1>
            <p>Note: <b>At the Expiration of your Activated Plan, Withdrawal Notice will be sent to your mail please do well to visit your dashboard and make request for withdrawal.<br /> 
                It takes 24hrs to Process Withdrawal Request</b></p>
        </div>
        <!-- Check if User Plan is Activated -->
        <?php
        $check = $this->db->get_where('activated_plans', array(
            'user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'),
            'status' => 1
        ));
        if ($check->num_rows() > 0) :
        ?>
            <div class="box box-header with-border text-center">
                <h3 style="margin-bottom:0!important;">Current Plan</h3>
                <?php
                $user_plan = $this->db->get_where('plans', array('encrypted_id' => $check->row()->plan_encrypted_id));
                $current_plan = $this->db->get_where('plans', array('encrypted_id' => $check->row()->plan_encrypted_id))->result_array();
                foreach ($current_plan as $current_plan) :
                ?>
                    <h1 class="btn btn-info btn-block" style="margin-top: 1 !important; margin-bottom:2px; font-size:40px"><?php echo $current_plan['name'] . '(' . $current_plan['daily_earning'] . '%)'; ?></h1>
                    <span>Date Activated: <b><?php echo date('F jS, Y', strtotime($check->row()->date_activated)); ?></b> || </span>
                    <span>Due for Withdrawal: <b><?php echo date('F jS, Y', strtotime($check->row()->date_deactivated)); ?></b></span>
                <?php endforeach; ?>
                <h3>Make Deposit to the Following</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <?php
                            $btc_payment = $this->db->get('btc_payment')->result_array();
                            foreach ($btc_payment as $btc_payment) :
                            ?>
                                <div class="col-lg-12">
                                    <div class="callout callout-success text-center" style="margin-bottom:10px;">
                                        <h4 style="margin-bottom:0px;">BitCoin Wallet Address</h4>
                                        <h3 style="margin-top:0px;"><strong><?php echo $btc_payment['wallet_address'] ?></strong></h3>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <?php if ($check->row()->deposit_status == 0) : ?>
                    <h3 class="text-white badge" style="background-color:red"><b>"You are Yet to Make Deposit"</b></h3>
                    <hr />
                    <div class="text-center">
                        <h4><b>Time Left for Deposit:</b></h4>
                        <div id="timer" class="text-center" style="display: flex;">
                            <div class="time" id="days"></div>
                            <div class="time" id="hours"></div>
                            <div class="time" id="minutes"></div>
                            <div class="time" id="seconds"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div class="callout callout-danger text-center">
                <h3>Current Plan</h3>
                <p>No Current Plan Activated</p>
            </div>
        <?php endif; ?>
        <div class="row">
            <section class="col-lg-6">
                <div class="box box-solid" style="height:560px; overflow-y:scroll; overflow-x:hidden">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body text-center">
                        <h3>Previous Withdrawals</h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $deposits = $this->db->get_where('deposit', array('user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id')))->result_array();
                                foreach ($deposits as $deposits) :
                                ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>$<?php echo number_format($deposits['amount'], 2) ?></td>
                                        <td><?php echo $deposits['payment_type'] ?></td>
                                        <td><?php echo $deposits['proof_upload_date'] ?></td>
                                        <?php if ($deposits['status'] == "Pending") : ?>
                                            <td class="badge" style="background-color: yellowgreen;"><?php echo $deposits['status']; ?></td>
                                        <?php elseif ($deposits['status'] == "Approved") : ?>
                                            <td class="badge" style="background-color: green;"><?php echo $deposits['status']; ?></td>
                                        <?php else : ?>
                                            <td class="badge" style="background-color: red;"><?php echo $deposits['status']; ?></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section>
            <section class="col-lg-6">
                <div class="row">
                    <section class="col-lg-12">
                        <h3 class="text-center">Pending Withdrawals</h3>
                            <table id="example3" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Amount</th>
                                        <th>Plan</th>
                                        <th>Date Due</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $count = 1;
                                        $check_latest_earnings_withdrawal = $this->db->get_where('earnings_withdrawals', array('plan_activation_encrypted_id'=>$check2->row()->encrypted_id));
                                        if($check_latest_earnings_withdrawal->num_rows() > 0):
                                            $this->db->order_by('id', 'desc');
                                            $earnings_withdrawals = $this->db->get_where('earnings_withdrawals', array('plan_activation_encrypted_id'=>$check2->row()->encrypted_id , 'status'=>""))->result_array();
                                            foreach($earnings_withdrawals as $earnings_withdrawals):
                                    ?>
                                    <tr>
                                        <td><?php echo $count++; ?>.</td>
                                        <td>$<?php echo number_format($earnings_withdrawals['amount'],2) ?></td>
                                        <td><?php 
                                            $user_plan_id = $this->db->get_where('activated_plans', array('encrypted_id' => $earnings_withdrawals['plan_activation_encrypted_id']))->row()->plan_encrypted_id;
                                            echo $this->db->get_where('plans', array('encrypted_id' => $user_plan_id))->row()->name;
                                            ?></td>
                                        <td><?php echo $earnings_withdrawals['date_initiated'] ?></td>
                                        <td class="text-center"><a href="<?php echo base_url('user/request_earning_withdrawal/'.$earnings_withdrawals['encrypted_id']) ?>" class="btn btn-primary">Request Withdrawl</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                    </section>
                </div>
            </section>
        </div><!-- /.row (main row) -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->





<div id="dom-target" style="display: none;">
    <?php echo date('j F Y h:i:s', strtotime($check->row()->deposit_date)) ?>
</div>

<script>
    function makeTimer() {

        var div = document.getElementById("dom-target");
        var myData = div.textContent;
        var endTime = myData;
        endTime = (Date.parse(endTime) / 1000);

        var now = new Date();
        now = (Date.parse(now) / 1000);

        var timeLeft = endTime - now;

        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }

        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");

    }

    setInterval(function() {
        makeTimer();
    }, 1000);
</script>



<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url() ?>assets/dashboard/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url() ?>assets/dashboard/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url() ?>assets/dashboard/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/dashboard/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url() ?>assets/dashboard/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dashboard/dist/js/app.min.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $("#example3").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>

</html>