<script type="text/javascript">
    window.onload = function() {
        $("#update_earnings").hide();

    };

    function update_earnings() {
        $("#return_list").hide();
        $("#update_earnings_button").hide();
        $("#update_earnings").show();

    }
</script>

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
            <li class="active">Manage Daily Returns</li>
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
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h2 class="text-center">Crypto Matrix Daily Returns for <?php echo $plan['name'] ?> Users</h2>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Select Date</th>
                                            <th class="text-center">Select Month</th>
                                            <th class="text-center">Select Year</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="<?php echo base_url('admin/daily_earnings_selector'); ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="plan_id" value="<?php echo $plan['encrypted_id'] ?>" />
                                            <tr>
                                                <td class="text-center">
                                                    <select name="date" class=" form-control">
                                                        <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                            <option value="<?php echo $i; ?>" <?php if ($date == $i) echo 'selected="selected"'; ?>>
                                                                <?php echo $i; ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <select name="month" class=" form-control">
                                                        <?php
                                                        for ($i = 1; $i <= 12; $i++) :
                                                            if ($i == 1) $m = 'January';
                                                            else if ($i == 2) $m = 'February';
                                                            else if ($i == 3) $m = 'March';
                                                            else if ($i == 4) $m = 'April';
                                                            else if ($i == 5) $m = 'May';
                                                            else if ($i == 6) $m = 'June';
                                                            else if ($i == 7) $m = 'July';
                                                            else if ($i == 8) $m = 'August';
                                                            else if ($i == 9) $m = 'September';
                                                            else if ($i == 10) $m = 'October';
                                                            else if ($i == 11) $m = 'November';
                                                            else if ($i == 12) $m = 'December';
                                                        ?>
                                                            <option value="<?php echo $i; ?>" <?php if ($month == $i) echo 'selected="selected"'; ?>>
                                                                <?php echo $m; ?>
                                                            </option>
                                                        <?php
                                                        endfor;
                                                        ?>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <select name="year" class="form-control ">
                                                        <?php for ($i = 2020; $i >= 2010; $i--) : ?>
                                                            <option class="text-center" value="<?php echo $i; ?>" <?php if (isset($year) && $year == $i) echo 'selected="selected"'; ?>>
                                                                <?php echo $i; ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-inverse" type="submit"><i class="fa fa-cog"></i> Manage Daily Returns</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
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