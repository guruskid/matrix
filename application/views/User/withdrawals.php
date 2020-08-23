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
 <!-- Check if User Plan is Activated -->

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>$
                            <?php 
                               $total = 0; 
                               $capital = $this->db->get_where('activated_plans', array('user_encrypted_id' => 
                                $this->session->userdata('matrix_user_encrypted_id'), 'deposit_status' => 1, 'status' => 1))->result_array(); 
                                foreach($capital as $capital){
                                  $plan_amount = $this->db->get_where('plans', array('encrypted_id' => $capital['plan_encrypted_id']))->result_array(); 
                                  foreach($plan_amount as $plan_amount){
                                      $total = $total + $plan_amount['amount']; 
                                  }
                                }
                                echo number_format($total, 2);
                            ?>
                        </h3>
                        <p>Current Capitals</p>
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
                        <h3>$
                            <?php 
                               $return_total = 0; 
                               $topup_total = 0; 
                               
                               $active_plans = $this->db->get_where('activated_plans', array('user_encrypted_id' => 
                               $this->session->userdata('matrix_user_encrypted_id'), 'deposit_status' => 1, 'status' => 1))->result_array(); 
                               foreach($active_plans as $active_plans){
                                   $returns = $this->db->get_where('returns', array('plan_activation_encrypted_id' => $active_plans['encrypted_id']))->result_array(); 
                                   foreach($returns as $returns){
                                       $return_total = $return_total + $returns['daily_earning'];
                                   }
                               }

                               $active_plans2 = $this->db->get_where('activated_plans', array('user_encrypted_id' => 
                               $this->session->userdata('matrix_user_encrypted_id'), 'deposit_status' => 1, 'status' => 1))->result_array(); 
                               foreach($active_plans2 as $active_plans2){
                                   $topup = $this->db->get_where('topup', array('plan_activation_encrypted_id' => $active_plans2['encrypted_id']))->result_array(); 
                                   foreach($topup as $topup){
                                       $topup_total = $topup_total + $topup['amount'];
                                   }
                               }
                                echo number_format($return_total + $topup_total , 2); 
                            ?>
                        </h3>
                        <p>Current Earnings</p>
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
                        <h3>$0.00</h3>
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
                        <h3>$
                            <?php 
                                $total_withdrawal = 0; 
                                $withdrawals = $this->db->get_where('earnings_withdrawals', array('user_encrypted_id' => 
                                $this->session->userdata('matrix_user_encrypted_id'), 'status' => 'Approved'))->result_array(); 
                                foreach($withdrawals as $withdrawals){
                                    $total_withdrawal = $total_withdrawal =+ $withdrawals['amount']; 
                                }
                                echo number_format($total_withdrawal, 2);
                            ?>
                        </h3>
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
       
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-solid" style="height:560px; overflow-y:scroll; overflow-x:hidden">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body text-center">
                        <h3>Previous Withdrawals</h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Date Due</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 1; 
                                    $this->db->order_by('id', 'desc');
                                    $withdrawals = $this->db->get_where('earnings_withdrawals', array('user_encrypted_id' => 
                                    $this->session->userdata('matrix_user_encrypted_id'), 'status !=' => "Pending"))->result_array(); 
                                    foreach($withdrawals as $withdrawals):
                                ?>
                                <tr>
                                    <td><?php echo $count++ ;?></td>
                                    <td><?php 
                                        $plan_id = $this->db->get_where('activated_plans', array('encrypted_id' => 
                                        $withdrawals['plan_activation_encrypted_id']))->row()->plan_encrypted_id;
                                        echo $this->db->get_where('plans', array('encrypted_id' => $plan_id))->row()->name;
                                    ?></td>
                                    <td>$<?php echo $withdrawals['amount'] ?></td>
                                    <td><?php echo $withdrawals['type'] ?></td>
                                    <td><?php echo $withdrawals['date_initiated'] ?></td>
                                    <td><?php echo $withdrawals['user_request_date'] ?></td>
                                    <td><span class="badge badge-primary"><?php echo $withdrawals['status'] ?></span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section>
        </div><!-- /.row (main row) -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




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