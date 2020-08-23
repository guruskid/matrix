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
            <section class="col-lg-12">
                <div class="box box-solid" style="height:560px; overflow-y:scroll; overflow-x:hidden">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body text-center">
                        <h2>Crypto Matrix Deposits</h2>
                        <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>S/N</th>
                                         <th>Name</th>
                                         <th>Active Plan</th>
                                         <th>Amount</th>
                                         <th>Payment Date</th>
                                         <th>Date Uploaded</th>
                                         <th>Status</th>
                                         <th>Acton</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php 
                                        $count = 1;
                                        $deposits = $this->db->get('deposit')->result_array();
                                        foreach($deposits as $deposits):
                                     ?>
                                     <tr>
                                         <td><?php echo $count++ ; ?></td>
                                         <td><a href="../uploads/payment_image/<?php echo $deposits['id'].'.jpg' ?>" download="Proof of Payment"><?php echo $this->db->get_where('members', array('encrypted_id' => $deposits['user_encrypted_id']))->row()->fullname; ?></a></td>
                                         <td><a href="<?php echo base_url('admin/plans') ?>"><?php 
                                                $plan_id =  $this->db->get_where('activated_plans', array('encrypted_id' => $deposits['plan_activation_encrypted_id']))->row()->plan_encrypted_id; 
                                                echo $this->db->get_where('plans', array('encrypted_id' => $plan_id))->row()->name;
                                                ?> Plan</a></td>
                                         <td>$<?php echo number_format($deposits['amount'],2) ?></td>
                                         <td><?php echo $deposits['date_of_payment'] ?></td>
                                         <td><?php echo $deposits['proof_upload_date'] ?></td>
                                         <?php if($deposits['status'] == "Pending" ): ?>
                                         <td class="badge" style="background-color: yellowgreen;"><?php echo $deposits['status'] ;?></td>
                                         <?php elseif($deposits['status'] == "Approved"): ?>
                                         <td class="badge" style="background-color: green;"><?php echo $deposits['status']; ?></td>
                                         <?php else: ?>
                                        <td class="badge" style="background-color: red;"><?php echo $deposits['status']; ?></td>
                                        <?php endif; ?>
                                        <?php  if($deposits['status'] == "Pending" ): ?>
                                        <td><a  class="btn btn-primary" href="<?php echo base_url('admin/approve_deposit/'.$deposits['encrypted_id']) ?>"><i class="fa fa-check-square-o"> </i> Approve</a> 
                                            <a class="btn btn-danger" href="<?php echo base_url('admin/decline_deposit/'.$deposits['encrypted_id']) ?>" >Decline</a>
                                        </td>
                                        <?php else: ?>
                                        <td class="text-center" ><p class="badge badge-primary">No Action Required</p></td>
                                        <?php endif; ?>
                                     </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section>
         </div>
       
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
      $(function () {
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