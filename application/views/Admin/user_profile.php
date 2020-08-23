 <!-- Right side column. Contains the navbar and content of the page -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             User Profile
             <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">User Profile</li>
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
         <div class="text-center">
             <h2>User Profile</h2>
         </div>
         <div class="row">
             <section class="col-lg-4">
                 <div class="box">
                     <div class="box-header">
                         <h4 class="text-center">Profile Photo</h4>
                     </div><!-- /.box-header -->
                     <div class="box-body">
                         <center><img style="width:200px; height:200px" src="<?php echo $this->crud_model->get_image_url('user', $user['id']) ?>" class="img-circle" alt="User Image" /></center>
                         <div class="text-center">
                             <h2><?php echo $user['fullname'] ?></h2>
                             <h4>Date Joined: <b><?php echo $user['date_joined'] ?></b></h4>
                         </div>
                     </div>
                 </div>
             </section>
             <section class="col-lg-8">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box box-solid" style="height:375px; overflow-y:scroll; overflow-x:hidden">
                             <div class="box-header with-border">
                             </div><!-- /.box-header -->
                             <div class="box-body text-center">
                                 <h3>User Available Plans</h3>
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>S/N</th>
                                             <th>Plan</th>
                                             <th>Date Activated</th>
                                             <th>Withdrawal Due</th>
                                             <th>Earned</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $count = 1;
                                            $plans = $this->db->get_where('activated_plans', array('user_encrypted_id' => $user['encrypted_id']))->result_array();
                                            foreach ($plans as $plans) :
                                            ?>
                                             <tr>
                                                 <td><?php echo $count++; ?></td>
                                                 <td><?php echo $this->db->get_where('plans', array('encrypted_id' => $plans['plan_encrypted_id']))->row()->name; ?></td>
                                                 <?php if($plans['date_activated'] == ""): ?>
                                                 <td><span class="badge bg-success">No Date Yet</span></td>
                                                 <?php else: ?>
                                                 <td><?php echo date('F jS, Y', strtotime($plans['date_activated'])) ?></td>
                                                 <?php endif; ?>
                                                 <?php if($plans['date_activated'] == ""): ?>
                                                 <td><span class="badge bg-success">No Date Yet</span></td>
                                                 <?php else: ?>
                                                 <td><?php echo date('F jS, Y', strtotime($plans['date_deactivated'])) ?></td>
                                                 <?php endif; ?>
                                                 <td>$
                                                     <?php
                                                        $return_total = 0;
                                                        $topup_total  = 0;
                                                        $returns = $this->db->get_where('returns', array('plan_activation_encrypted_id' => $plans['encrypted_id']))->result_array();
                                                        foreach ($returns as $returns) {
                                                            $return_total = $return_total + $returns['daily_earning'];
                                                        }

                                                        $topup = $this->db->get_where('topup', array('plan_activation_encrypted_id' => $plans['encrypted_id']))->result_array();
                                                        foreach ($topup as $topup) {
                                                            $topup_total = $topup_total + $topup['amount'];
                                                        }
                                                        echo number_format($return_total + $topup_total, 2);
                                                        ?>

                                                 </td>
                                                 <?php if ($plans['status'] == 1 && $plans['deposit_status'] == 1) : ?>
                                                     <td class="badge" style="background-color: yellowgreen;">Ongoing</td>
                                                 <?php elseif($plans['status'] == 1 && $plans['deposit_status'] == 0): ?>
                                                    <td class="badge bg-warning">No Deposit</td>
                                                 <?php else : ?>
                                                     <td class="badge" style="background-color: red;">Terminated</td>
                                                 <?php endif; ?>
                                                 <?php if ($plans['status'] == 1 && $plans['deposit_status'] == 1) : ?>
                                                 <td><a data-toggle="modal" data-target="#topUp<?php echo $plans['encrypted_id'] ?>" class="btn btn-primary">Top Up</a></td>
                                                 <?php elseif($plans['status'] == 1 && $plans['deposit_status'] == 0 && date('Y-m-d H:i:s') > $plans['deposit_date']): ?>
                                                 <td><a href="<?php echo base_url('admin/restart_payment_counter/'.$plans['encrypted_id'].'/'.$user['encrypted_id']) ?>" class="btn btn-sm btn-warning">Restart Payment Counter</a></td>
                                                 <?php else: ?>
                                                 <td><span class="badge text-center"> No Action Required</span></td>
                                                 <?php endif ; ?>
                                                 <div class="modal" id="topUp<?php echo $plans['encrypted_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog modal-sm" role="document">
                                                         <div class="modal-content">
                                                             <div class="modal-header text-center">
                                                                 <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-btc fa-lg"></i> Top Up User Account</h3>
                                                             </div>
                                                             <div class="modal-body">
                                                                 <form action="<?php echo base_url('admin/topup/' . $plans['encrypted_id'] . '/' . $user['encrypted_id']); ?>" method="post" enctype="multipart/form-data">
                                                                     <div class="row">
                                                                         <div class="col-md-12">
                                                                             <div class="form-group">
                                                                                 <label>Amount to Top-Up</label>
                                                                                 <input required type="number" class="form-control" name="amount" placeholder="Amount in USD ($)">
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <hr />
                                                             </div>
                                                             <div class="modal-footer">
                                                                 <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-plus-circle"></i> Confirm</button>
                                                                 <button class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                             </div>
                                                             </form>
                                                         </div>
                                                     </div>
                                                 </div>
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
         <div class="row">
             <section class="col-lg-6">
                 <div class="box">
                     <div class="box-header">
                         <h3 class="text-center">All Withdrawals</h3>
                     </div><!-- /.box-header -->
                     <div class="box-body">
                         <table id="example3" class="table table-bordered table-striped">
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
                                    $user['encrypted_id'], 'status !=' => "Pending"))->result_array();
                                    foreach ($withdrawals as $withdrawals) :
                                    ?>
                                     <tr>
                                         <td><?php echo $count++; ?></td>
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
                     </div>
                 </div>
             </section>
             <section class="col-lg-6">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box box-solid" style="height:220px;">
                             <div class="box-body">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <!-- Info Boxes Style 2 -->
                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <div class="info-box bg-yellow">
                                                     <span class="info-box-icon"><i class="fa fa-usd"></i></span>
                                                     <div class="info-box-content">
                                                         <span class="info-box-text">Capital</span>
                                                         <h2 class=""><b>$5,200</b></h2>
                                                     </div><!-- /.info-box-content -->
                                                 </div><!-- /.info-box -->
                                             </div>
                                             <div class="col-lg-6">
                                                 <div class="info-box bg-red">
                                                     <span class="info-box-icon"><i class="fa fa-usd"></i></span>
                                                     <div class="info-box-content">
                                                         <span class="info-box-text">Earned</span>
                                                         <h2 class=""><b>$5,200</b></h2>
                                                     </div><!-- /.info-box-content -->
                                                 </div><!-- /.info-box -->
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <div class="info-box bg-green">
                                                     <span class="info-box-icon"><i class="fa fa-users"></i></span>
                                                     <div class="info-box-content">
                                                         <span class="info-box-text">Referral</span>
                                                         <h2 class=""><b>$200</b></h2>
                                                     </div><!-- /.info-box-content -->
                                                 </div><!-- /.info-box -->
                                             </div>
                                             <div class="col-lg-6">
                                                 <div class="info-box bg-blue">
                                                     <span class="info-box-icon"><i class="fa fa-usd"></i></span>
                                                     <div class="info-box-content">
                                                         <span class="info-box-text">Active Plans</span>
                                                         <h2 class=""><b>4</b></h2>
                                                     </div><!-- /.info-box-content -->
                                                 </div><!-- /.info-box -->
                                             </div>
                                         </div>
                                     </div><!-- /.col -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box box-solid" style="height:70px;">
                             <div class="box-body">
                                 <div class="text-center" style="display:flex; justify-content:center">
                                     <a data-target="#paymentDetails" data-toggle="modal" class="btn btn-success btn-lg btn-block"><i class="fa fa-btc"> </i> View Payment Details</a>
                                 </div>
                             </div>
                         </div><!-- /.box -->
                     </div>
                     <?php if($user['account_status'] == 0):?>
                     <div class="col-lg-12">
                         <div class="box box-solid" style="height:70px;">
                             <div class="box-body">
                                 <div class="text-center" style="display:flex; justify-content:center">
                                     <a href="<?php echo base_url('admin/unblock_user/'.$user['encrypted_id']) ?>" class="btn btn-warning btn-lg btn-block"><i class="fa fa-key"> </i> Unblock Account</a>
                                 </div>
                             </div>
                         </div><!-- /.box -->
                     </div>
                     <?php else: ?>
                        <div class="col-lg-12">
                         <div class="box box-solid" style="height:70px;">
                             <div class="box-body">
                                 <div class="text-center" style="display:flex; justify-content:center">
                                     <a href="<?php echo base_url('admin/block_user/'.$user['encrypted_id']) ?>" class="btn btn-danger btn-lg btn-block"><i class="fa fa-key"> </i> Block Account</a>
                                 </div>
                             </div>
                         </div><!-- /.box -->
                        </div>
                     <?php endif; ?>
                 </div>
             </section>
         </div><!-- /.row (main row) -->
     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->

 <div class="modal" id="paymentDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header text-center">
                 <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-btc fa-lg"></i> <?php echo $user['fullname'] ?>'s Payment Details</h3>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-lg-12">
                        <center><img class="profile-user-img img-responsive " style="width:150px; height:150px" src="<?php echo $this->crud_model->get_image_url('user_payment', $user['id']) ?>" alt="User profile picture"></center>
                        <div class="text-center">
                            <label>Wallet Address</label>
                            <h3 id="div1" style="word-wrap: break-word;"><?php echo $user['wallet_address'] ?></h3>
                            <div class="text-center"><button id="button1" class="btn btn-secondary" onclick="CopyToClipboard('div1')">Click to Copy</button></div>
                        </div> 
                     </div>
                 </div>
             </div>
             <hr />
             <div class="modal-footer">
                 <button class="btn btn-secondary" data-dismiss="modal">Close</a>
             </div>
         </div>
     </div>
     </div>

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
        function CopyToClipboard(containerid) {
                if (document.selection) {
                    var range = document.body.createTextRange();
                    range.moveToElementText(document.getElementById(containerid));
                    range.select().createTextRange();
                    document.execCommand("copy");
                } else if (window.getSelection) {
                    var range = document.createRange();
                    range.selectNode(document.getElementById(containerid));
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    alert("BitCoin Address Copied Successfully")
                }
            }

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