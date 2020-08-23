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
             <li class="active">Dashboard</li>
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
         <div class="row">
            <div class="col-lg-6 col-xs-6">
                <a class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#Plans">Invest</a>
            </div>
            <div class="col-lg-6 col-xs-6 my-3">
                <a class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#withdrawalRequest">Withdraw</a>
            </div>
         </div><!-- /.row (main row) -->
     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->