      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $this->crud_model->get_image_url('user', $this->session->userdata('matrix_user_id')) ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('matrix_user_username') ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($page_name == "Dashboard") echo "active" ?>">
              <a href="<?php echo base_url('user/dashboard') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Deposits") echo "active" ?>">
              <a href="<?php echo base_url('user/deposits') ?>">
                <i class="fa fa-bank"></i> <span>Deposits</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Returns") echo "active" ?>">
              <a href="<?php echo base_url('user/returns') ?>">
                <i class="fa fa-usd"></i> <span>Returns</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Withdrawals") echo "active" ?>">
              <a href="<?php echo base_url('user/withdrawals') ?>">
                <i class="fa fa-money"></i> <span>Withdrawals</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Support") echo "active" ?>">
              <a href="<?php echo base_url('user/support') ?>">
                <i class="fa fa-file"></i> <span>Support Tickets</span>
              </a>
            </li>
            <li class="header">SETTINGS</li>
            <li><a href="<?php echo base_url('user/profile') ?>"><i class="fa fa-circle-o text-danger"></i>Profile</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





      <div class="modal" id="Plans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder fa-lg"></i> Select Plan to Invest</h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <?php
                $plans = $this->db->get_where('plans')->result_array();
                foreach ($plans as $plan) :
                ?>
                  <section class="col-lg-4">
                    <div class="box box-solid" style="height:320px;">
                      <div class="box-header with-border">
                      </div><!-- /.box-header -->
                      <div class="box-body text-center">
                        <h1><?php echo $plan['name'] ?></h1>

                        <h1><?php echo $plan['daily_earning'] ?>%</h1>
                        <h5>Daily Earnings</h5>

                        <p>Invesment Amount (USD): <strong>$<?php echo number_format($plan['amount'], 2) ?></strong></p>
                        <p>Maturity (Days): <strong><?php echo $plan['days'] ?> Days</strong></p>
                        <hr />
                        <a href="<?php echo base_url('user/activate_plan/' . $plan['encrypted_id']) ?>" class="btn btn-success"><i class="fa fa-pencil"> </i> Select Plan</a>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </section>
                <?php endforeach; ?>
              </div><!-- /.row (main row) -->
            </div>
          </div>
        </div>
      </div>

      <!-- Check if User Plan is Activated -->
      
      <div class="modal" id="withdrawalRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder fa-lg"></i> Select Plan to Withdraw From </h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <section class="col-lg-12">
                  <div class="row">
                    <section class="col-lg-12">
                      <h3 class="text-center">Pending Withdrawals</h3>
                      <table id="example3" class="table table-striped">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Amount</th>
                            <th>Plan</th>
                            <th>Date Due</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count = 1;
                            $this->db->order_by('id', 'desc');
                            $earnings_withdrawals = $this->db->get_where('earnings_withdrawals', array('user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'), 'status' => "Pending"))->result_array();
                            foreach ($earnings_withdrawals as $earnings_withdrawals) :
                          ?>
                              <tr>
                                <td><?php echo $count++; ?>.</td>
                                <td>$<?php echo number_format($earnings_withdrawals['amount'], 2) ?></td>
                                <td><?php
                                    $user_plan_id = $this->db->get_where('activated_plans', array('encrypted_id' => $earnings_withdrawals['plan_activation_encrypted_id']))->row()->plan_encrypted_id;
                                    echo $this->db->get_where('plans', array('encrypted_id' => $user_plan_id))->row()->name;
                                    ?></td>
                                <td><?php echo $earnings_withdrawals['date_initiated'] ?></td>
                                <td><?php echo $earnings_withdrawals['status'] ?></td>
                                <td class="text-center"><a href="<?php echo base_url('user/request_earning_withdrawal/' . $earnings_withdrawals['encrypted_id']) ?>" class="btn btn-primary">Request Withdrawal</a></td>
                              </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                    </section>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>