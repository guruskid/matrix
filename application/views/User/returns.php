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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Daily Earnings and Returns</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
            <h1 class="text-center">Crypto Matrix :: Daily Earnings</h1>
            <p>Note: <b>Make Sure to Login and Access your Daily Returns in Case of Corrections.<br /> Withdrawal Notice for
                    Daily Earnings and Returns Will be Sent at the Expiration of your current Plan</b></p>
        </div>

        <div class="row">
            <section class="col-lg-12">
                <div class="box box-solid" style="height:400px; overflow-y:scroll; overflow-x:hidden">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body text-center">
                        <h3>My Daily Earnings</h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">S/N</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Plan</th>
                                    <th class="text-center">Capital</th>
                                    <th class="text-center">Date Activated</th>
                                    <th class="text-center">Today's Earning</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;

                                $activated_plans = $this->db->get_where('activated_plans',  array('user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id')))->result_array();
                                foreach ($activated_plans as $activated_plans) :
                                    $daily_earnings = $this->db->get_where('returns', array('plan_activation_encrypted_id' => $activated_plans['encrypted_id']))->result_array();
                                    foreach ($daily_earnings as $daily_earnings) :
                                ?>
                                        <tr>
                                            <td><?php echo $count++; ?>.</td>
                                            <td><?php echo date('F jS, Y', strtotime($daily_earnings['date'])); ?></td>
                                            <td><?php
                                                //Get Plan Cost 
                                                $plan_name = $this->db->get_where('plans', array('encrypted_id' => $activated_plans['plan_encrypted_id']))->row()->name;
                                                echo $plan_name; ?> Plan
                                            </td>
                                            <td>$<?php
                                                //Get Plan Cost 
                                                $capital = $this->db->get_where('plans', array('encrypted_id' => $activated_plans['plan_encrypted_id']))->row()->amount;
                                                echo number_format($capital, 2); ?>
                                            </td>
                                            <td><?php
                                                    echo date('F jS, Y',strtotime($activated_plans['date_activated']));
                                                 ?>
                                            </td>
                                            <td>$<?php echo number_format($daily_earnings['daily_earning'], 2) ?></td>
                                            <?php if ($daily_earnings['status'] == "Pending") : ?>
                                                <td class="badge" style="background-color: yellowgreen;"><?php echo $daily_earnings['status']; ?></td>
                                            <?php elseif ($daily_earnings['status'] == "Processed") : ?>
                                                <td class="badge" style="background-color: green;"><?php echo $daily_earnings['status']; ?></td>
                                            <?php else : ?>
                                                <td class="badge" style="background-color: red;"><?php echo $daily_earnings['status']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
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