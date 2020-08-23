      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $this->crud_model->get_image_url('admin', $this->session->userdata('matrix_admin_id')) ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('matrix_admin_username') ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($page_name == "Dashboard") echo "active" ?>">
              <a href="<?php echo base_url('admin/dashboard') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="<?php if ($page_name == "Users") echo "active" ?>">
              <a href="<?php echo base_url('admin/users') ?>">
                <i class="fa fa-users"></i> <span>Users</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Plans") echo "active" ?>">
              <a href="<?php echo base_url('admin/plans') ?>">
                <i class="fa fa-list"></i> <span>Plans</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Deposits") echo "active" ?>">
              <a href="<?php echo base_url('admin/deposits') ?>">
                <i class="fa fa-bank"></i> <span>Deposits</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Returns") echo "active" ?>">
              <a href="<?php echo base_url('admin/returns') ?>">
                <i class="fa fa-usd"></i> <span>Returns</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Withdrawals") echo "active" ?>">
              <a href="<?php echo base_url('admin/withdrawal_requests') ?>">
                <i class="fa fa-money"></i> <span>Withdrawals</span>
              </a>
            </li>
            <li class="<?php if ($page_name == "Mails") echo "active" ?>">
              <a href="https://cryptomatrix.co:2096/" target="_blank">
                <i class="fa fa-envelope"></i> <span>Mail</span>
              </a>
            </li>
           
            <li class="header">SETTINGS</li>
            <li class="<?php if ($page_name == "Payment") echo "active" ?>"><a href="<?php echo base_url('admin/payment') ?>"><i class="fa fa-circle-o text-warning"></i> Payment</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>




      <div class="modal" id="createPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder fa-lg"></i> Create Plan</h3>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('admin/add_plan'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Name</label>
                      <input required type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                      <label>Daily Earnings</label>
                      <input required type="number" step="any" class="form-control" name="daily_earning" placeholder="Daily Earnings (%)">
                    </div>
                    <div class="form-group">
                      <label>Investment Amount</label>
                      <input required type="number" class="form-control" name="investment_amount" placeholder="USD ($)">
                    </div>
                    <div class="form-group">
                      <label>Maturity (Days)</label>
                      <input required type="number" class="form-control" name="maturity" placeholder="Maturity (Days)">
                    </div>
                  </div>
                </div>
                <hr />
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-plus-circle"></i> Create</button>
              <button class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal" id="createBtcPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-btc fa-lg"></i> Create BTC Payment</h3>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('admin/create_btc_payment'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <div class="form-group">
                        <label for="field-1">Upload Bitcoin Scan Code</label>
                        <div class="col-sm-12">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px"></div>
                            <div>
                              <span class="btn btn-success btn-file">
                                <span class="fileinput-new">Select File</span>
                                <span class="fileinput-exists">Change</span>
                                <input required type="file" name="userfile" accept="image/*">
                              </span>
                              <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </center>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Wallet Address</label>
                      <input required type="text" class="form-control" name="wallet_address" placeholder="xxxxxxxxxxxxxxxxxxxxxxx">
                    </div>
                  </div>
                </div>
                <hr />
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-plus-circle"></i> Create</button>
              <button class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
            </form>
          </div>
        </div>
      </div>


