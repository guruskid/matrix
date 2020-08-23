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
             <li class="active">Payment Setup</li>
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
                                $capital = $this->db->get_where('activated_plans', array(
                                    'deposit_status' => 1, 'status' => 1
                                ))->result_array();
                                foreach ($capital as $capital) {
                                    $plan_amount = $this->db->get_where('plans', array('encrypted_id' => $capital['plan_encrypted_id']))->result_array();
                                    foreach ($plan_amount as $plan_amount) {
                                        $total = $total + $plan_amount['amount'];
                                    }
                                }
                                echo number_format($total, 2);
                                ?>
                         </h3>
                         <p>Total Investments</p>
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
                                $total_pending = 0;
                                $pending = $this->db->get_where('earnings_withdrawals', array('status' => "Pending"))->result_array();
                                foreach ($pending as $pending) {
                                    $total_pending = $total_pending + $pending['amount'];
                                }
                                echo number_format($total_pending, 2);
                                ?>
                         </h3>
                         <p>Pending Payments</p>
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
                         <h3><?php echo $this->db->get('members')->num_rows(); ?></h3>
                         <p>User Registrations</p>
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
                         <h3><?php echo $this->db->get('plans')->num_rows(); ?></h3>
                         <p>Available Plans</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div><!-- ./col -->
         </div><!-- /.row -->
         <!-- Main row -->
         <div class="box">
             <h2 class="text-center">Crypto Matrix Payment Settings</h2>
             <hr />
             <div class="row">
                 <div class="col-lg-12">
                    <div class="box"  style="overflow-y: scroll; height:450px; overflow-x:hidden;">
                         <div class="text-center">
                             <h3>BTC Payments</h3>
                             <a class="btn btn-primary" data-toggle="modal" data-target="#createBtcPayment"> <span class="fa fa-folder"> </span> Add New Payment</a>
                             <hr />
                         </div>
                        <div class="row">
                            <?php 
                                $btc_payment = $this->db->get('btc_payment')->result_array(); 
                                foreach($btc_payment as $btc_payment):
                             ?>
                            <div class="col-lg-4">
                                <center>
                                    <img style="width:150px; height:170px" class="img-fluid" src="<?php echo $this->crud_model->get_image_url('btc', $btc_payment['id']) ?>" />
                                </center>
                                <div class="callout text-center" style="margin-bottom:0px;">
                                    <h4 style="margin-bottom:0px;">BitCoin Wallet Address</h4>
                                    <h3 style="margin-top:0px;"><strong><?php echo $btc_payment['wallet_address'] ?></strong></h3>
                                </div>
                                <div class="text-center" style="margin-top:0px;">
                                    <a href="<?php echo base_url('admin/remove_btc_details/'.$btc_payment['encrypted_id']) ?>" class="btn btn-danger"><i class="fa fa-trash"> </i> Remove Details</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                     </div>
                 </div>
             </div>
         </div>
     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->