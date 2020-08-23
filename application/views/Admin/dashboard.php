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
         <div class="row">
             <!-- right col (We are only adding the ID to make the widgets sortable)-->
             <section class="col-lg-6">
                 <!-- Calendar -->
                 <div class="box box-solid bg-green-gradient">
                     <div class="box-header">
                         <i class="fa fa-calendar"></i>
                         <h3 class="box-title">Calendar</h3>
                         <!-- tools box -->
                         <div class="pull-right box-tools">
                             <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                             <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                         </div><!-- /. tools -->
                     </div><!-- /.box-header -->
                     <div class="box-body no-padding" style="height: 400px; color:#000; background-color:whitesmoke ">
                         <!--The calendar -->
                         <div id="calendar" style="width: 100%"></div>
                     </div><!-- /.box-body -->
                 </div><!-- /.box -->
             </section><!-- right col -->
             <section class="col-lg-6">
                 <!-- TO DO List -->
                 <div class="box box-primary">
                     <div class="box-header">
                         <i class="ion ion-clipboard"></i>
                         <h3 class="box-title">Notifications</h3>
                     </div><!-- /.box-header -->
                     <div class="box-body" style="overflow-y:scroll; height:400px">
                         <ul class="todo-list">
                             <?php
                                $this->db->order_by('id', 'desc');
                                $notifications = $this->db->get('notices')->result_array();
                                foreach ($notifications as $notification) :
                                ?>
                                 <li>
                                     <!-- drag handle -->
                                     <span class="handle">
                                         <i class="fa fa-ellipsis-v"></i>
                                         <i class="fa fa-ellipsis-v"></i>
                                     </span>
                                     <!-- checkbox -->
                                     <!-- todo text -->
                                     <span class="text"><?php echo $notification['description'] ?></span>
                                     <!-- Emphasis label -->
                                     <small class="label label-success"><i class="fa fa-clock-o"></i><?php echo $notification['date'] ?></small>
                                 </li>
                             <?php endforeach; ?>
                         </ul>
                     </div><!-- /.box-body -->
                 </div><!-- /.box -->
             </section><!-- right col -->
         </div><!-- /.row (main row) -->
     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->