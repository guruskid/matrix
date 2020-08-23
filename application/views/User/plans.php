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
            <h1 class="text-center">Crypto Matrix Plan</h1>
            <p>Note: <b>You can only activate 1 Plan at a time.</b></p>
         </div>
         <!-- Check if User Plan is Activated -->
        <?php 
            $check = $this->db->get_where('activated_plans', array(
                'user_encrypted_id'=>$this->session->userdata('matrix_user_encrypted_id'), 
                'status' => 1
            )); 
            if($check->num_rows() > 0):
        ?>
         <div class="box box-header with-border text-center">
            <h3 style="margin-bottom:0!important;">Current Plan</h3>
            <?php 
                $current_plan = $this->db->get_where('plans', array('encrypted_id'=>$check->row()->plan_encrypted_id))->result_array(); 
                foreach($current_plan as $current_plan):
            ?>
            <h1 class="btn btn-info btn-block" style="margin-top: 1 !important; margin-bottom:2px; font-size:40px"><?php echo $current_plan['name'].'('.$current_plan['daily_earning'].'%)'; ?></h1>
            <span>Date Activated: <b><?php echo date('F jS, Y',strtotime($check->row()->date_activated)); ?></b> || </span>
            <span>Due for Withdrawal: <b><?php echo date('F jS, Y',strtotime($check->row()->date_deactivated)); ?></b></span>
            <?php endforeach; ?>
            <?php if($check->row()->deposit_status == 0): ?>
            <h3 class="text-white badge" style="background-color:red" ><b>"You are Yet to Make Deposit"</b></h3>
            <?php endif; ?>
         </div>
         <?php else: ?>
         <div class="callout callout-danger text-center">
            <h3>Current Plan</h3>
            <p>No Current Plan Activated</p>
         </div>
         <?php endif; ?>
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
                  
                  <p>Minimum Investment (USD): <strong>$<?php echo number_format($plan['min_investment'], 2) ?></strong></p>
                  <p>Maximum Investment (USD): <strong>$<?php echo number_format($plan['max_investment'], 2) ?></strong></p>
                  <hr/>
                  <a href="<?php echo base_url('user/activate_plan/'.$plan['encrypted_id']) ?>" class="btn btn-success"><i class="fa fa-pencil"> </i> Activate Plan</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section>
            <?php endforeach; ?>
         </div><!-- /.row (main row) -->
     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->