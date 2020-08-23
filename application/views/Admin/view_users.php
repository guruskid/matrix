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
             <li class="active">View Users</li>
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
                         <h3>150</h3>
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
                         <h3>53<sup style="font-size: 20px">%</sup></h3>
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
                         <h3>44</h3>
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
                         <h3>65</h3>
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
         <section class="content">
             <div class="row">
                 <div class="col-xs-12">
                     <div class="box">
                         <div class="box-header">
                             <h1 class="text-center">Crypto Matrix <?php echo $plan_user['name'] ?> Users</h1>
                         </div><!-- /.box-header -->
                         <div class="box-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>S/N</th>
                                         <th>Fullname</th>
                                         <th>Email</th>
                                         <th>Date Activated</th>
                                         <th>End Date</th>
                                         <th>Action/Status</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $count = 1;
                                        $plan1 = $this->db->get_where('activated_plans', array('plan_encrypted_id' => $plan_user['encrypted_id']))->result_array();
                                        foreach ($plan1 as $plan1) :
                                        ?>
                                         <tr>
                                             <td><?php echo $count++; ?></td>
                                             <td><a href="<?php echo base_url('admin/user_profile/'.$plan1['user_encrypted_id']) ?>"><?php echo
                                                                    $this->db->get_where('members', array('encrypted_id' => $plan1['user_encrypted_id']))->row()->fullname;
                                                                ?></a></td>
                                             <td><?php echo
                                                        $this->db->get_where('members', array('encrypted_id' => $plan1['user_encrypted_id']))->row()->email;
                                                    ?></td>
                                             <td><?php echo date('F jS, Y', strtotime($plan1['date_activated'])); ?></td>
                                             <td><?php echo date('F jS, Y', strtotime($plan1['date_deactivated'])); ?></td>
                                             <?php if ($plan1['status'] == 1) : ?>
                                                 <?php if (date('Y-m-d') >= $plan1['date_deactivated']) : ?>
                                                     <td class="text-center"><a href="<?php echo base_url('admin/deactivate_user_plan/'.$plan1['encrypted_id']) ?>" class="btn btn-danger">Deactivate Plan</a></td>
                                                 <?php else : ?>
                                                     <td class="text-center"><span style="background-color: green;" class="badge badge-success">Ongoing</span></td>
                                                 <?php endif; ?>
                                             <?php else : ?>
                                                 <td class="text-center"><span style="background-color: red;" class="badge badge-danger">Deactivated</span></td>
                                             <?php endif; ?>
                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div><!-- /.box-body -->
                     </div><!-- /.box -->
                 </div>
             </div>
         </section>

 </div><!-- /.row (main row) -->
 </section><!-- /.content -->
 </div><!-- /.content-wrapper -->


 <footer class="main-footer">
     <div class="pull-right hidden-xs">
         <b>Version</b> 2.0
     </div>
     <strong>Copyright &copy; 2020 CRYPTO MATRIX</strong> All rights reserved. || <b>Developed by SoftPath Technologies</b>
 </footer>
 </div><!-- ./wrapper -->

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