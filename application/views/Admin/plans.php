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
         <h1 class="text-center">Crypto Matrix Plan</h1>
         <div class="text-center">
             <a class="btn btn-primary" data-toggle="modal" data-target="#createPlan"> <span class="fa fa-folder"> </span> Create New Plans</a> <hr/>
         </div>
         <div class="row">
             <?php 
                $plans = $this->db->get_where('plans')->result_array(); 
                foreach($plans as $plan):
             ?>
            <section class="col-lg-4">
              <div class="box box-solid" style="height:320px;">
                <div class="box-header with-border">
                </div><!-- /.box-header -->
                <div class="box-body text-center">
                  <h1><?php echo $plan['name'] ?></h1>
                  
                  <h1><?php echo $plan['daily_earning'] ?>%</h1>
                  <h5>Daily Earnings</h5>
                  
                    <p>Investment Amount (USD): <strong>$<?php echo number_format($plan['amount'], 2) ?></strong></p>
                    <p>Maturity (Days): <strong><?php echo $plan['days'] ?> Days</strong></p>
                  <hr/>
                  <a data-toggle="modal" data-target="#editPlan<?php echo $plan['encrypted_id']?>" class="btn btn-success"><i class="fa fa-pencil"> </i> Edit Plan</a>
                  <a href="<?php echo base_url('admin/view_users/'.$plan['encrypted_id']) ?>" class="btn btn-primary"><i class="fa fa-eye"> </i> View Users</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- Edit Plan  -->
              <div class="modal" id="editPlan<?php echo $plan['encrypted_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header text-center">
                 <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder fa-lg"></i> Update Plan</h3>
             </div>
             <div class="modal-body">
                 <form action="<?php echo base_url('admin/update_plan/'.$plan['encrypted_id']); ?>" method="post" enctype="multipart/form-data">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label>Name</label>
                                 <input required type="text" value="<?php echo $plan['name'] ?>" class="form-control" name="name">
                             </div>
                             <div class="form-group">
                                 <label>Daily Earnings</label>
                                 <input required type="number" step="any" value="<?php echo $plan['daily_earning'] ?>" class="form-control" name="daily_earning" placeholder="Daily Earnings (%)">
                             </div>
                             <div class="form-group">
                                 <label>Investment Amount</label>
                                 <input required type="number" value="<?php echo $plan['amount'] ?>" class="form-control" name="investment_amount" placeholder="USD ($)">
                             </div>
                             <div class="form-group">
                                 <label>Maturity (Days)</label>
                                 <input required type="number" class="form-control"  value="<?php echo $plan['days'] ?>" name="maturity" placeholder="Maturity (Days)">
                             </div>
                         </div>
                     </div>
                     <hr />
             </div>
             <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-recycle"> </i> Update</button>   
                <button class="btn btn-secondary" data-dismiss="modal">Close</a>
             </div>
             </form>
         </div>
     </div>
 </div>
            </section>
            <?php endforeach; ?>
         </div><!-- /.row (main row) -->
     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->