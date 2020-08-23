  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
             Dashboard
             <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">Profile</li>
         </ol>
     </section>
      <!-- Main content -->
      <section class="content">
      <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>$
                            <?php 
                               $total = 0; 
                               $capital = $this->db->get_where('activated_plans', array('user_encrypted_id' => 
                                $this->session->userdata('matrix_user_encrypted_id'), 'deposit_status' => 1, 'status' => 1))->result_array(); 
                                foreach($capital as $capital){
                                  $plan_amount = $this->db->get_where('plans', array('encrypted_id' => $capital['plan_encrypted_id']))->result_array(); 
                                  foreach($plan_amount as $plan_amount){
                                      $total = $total + $plan_amount['amount']; 
                                  }
                                }
                                echo number_format($total, 2);
                            ?>
                        </h3>
                        <p>Current Capitals</p>
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
                               $return_total = 0; 
                               $topup_total = 0; 
                               
                               $active_plans = $this->db->get_where('activated_plans', array('user_encrypted_id' => 
                               $this->session->userdata('matrix_user_encrypted_id'), 'deposit_status' => 1, 'status' => 1))->result_array(); 
                               foreach($active_plans as $active_plans){
                                   $returns = $this->db->get_where('returns', array('plan_activation_encrypted_id' => $active_plans['encrypted_id']))->result_array(); 
                                   foreach($returns as $returns){
                                       $return_total = $return_total + $returns['daily_earning'];
                                   }
                               }

                               $active_plans2 = $this->db->get_where('activated_plans', array('user_encrypted_id' => 
                               $this->session->userdata('matrix_user_encrypted_id'), 'deposit_status' => 1, 'status' => 1))->result_array(); 
                               foreach($active_plans2 as $active_plans2){
                                   $topup = $this->db->get_where('topup', array('plan_activation_encrypted_id' => $active_plans2['encrypted_id']))->result_array(); 
                                   foreach($topup as $topup){
                                       $topup_total = $topup_total + $topup['amount'];
                                   }
                               }
                                echo number_format($return_total + $topup_total , 2); 
                            ?>
                        </h3>
                        <p>Current Earnings</p>
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
                        <h3>$0.00</h3>
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
                        <h3>$
                            <?php 
                                $total_withdrawal = 0; 
                                $withdrawals = $this->db->get_where('earnings_withdrawals', array('user_encrypted_id' => 
                                $this->session->userdata('matrix_user_encrypted_id'), 'status' => 'Approved'))->result_array(); 
                                foreach($withdrawals as $withdrawals){
                                    $total_withdrawal = $total_withdrawal =+ $withdrawals['amount']; 
                                }
                                echo number_format($total_withdrawal, 2);
                            ?>
                        </h3>
                        <p>Withdrawn</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <div class="text-center">
            <h1 class="text-center">Crypto Matrix :: Profile and Settings</h1>
            <p>Note: <b>Make Sure to Payment Details are Correct as CRYPTO Matrix will not be held 
                responsible if payment is made to another Bitcoin Wallet.</b></p>
        </div>
          <div class="row">
              <div class="col-md-3" >
                  <!-- Profile Image -->
                  <div class="box box-primary">
                      <div class="box-body box-profile" style="height:420px; justify-content:center" >
                            <?php
                                $photo_upload = $this->db->get_where('members', array('encrypted_id' =>
                                $this->session->userdata('matrix_user_encrypted_id')))->row()->photo_upload;
                                if ($photo_upload == 0) :
                            ?>
                            <form action="<?php echo base_url('user/upload_profile_photo'); ?>" method="post" enctype="multipart/form-data">
                              <center>
                                  <div class="form-group">
                                      <label for="field-1">Upload Profile Photo </label>
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
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block"><b>Upload Photo</b></button>
                            </div>
                            </form>
                          <?php else : ?>
                                <center><img class="profile-user-img img-responsive" style="width:250px; height:300px" src="<?php echo $this->crud_model->get_image_url('user', $this->session->userdata('matrix_user_id')) ?>" alt="User profile picture"></center>
                          <?php endif; ?>
                          <h3 class="profile-username text-center"><?php echo $this->session->userdata('matrix_user_username') ?></h3>
                          <p class="text-muted text-center"><?php echo $this->db->get_where('members', array('encrypted_id' =>
                                                            $this->session->userdata('matrix_user_encrypted_id')))->row()->date_joined; ?></p>
                      </div>
                      <!-- /.box-body -->
                  </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                          <li class="active"><a href="#activity" data-toggle="tab">Activations</a></li>
                          <li><a href="#timeline" data-toggle="tab">Notifications</a></li>
                      </ul>
                      <div class="tab-content">
                          <div class="active tab-pane" style="height:360px;"  id="activity">
                              <div class="row form-horizontal" style="display: flex; justify-content:center">
                                  <div class="col-lg-6">
                                  
                                          <?php
                                                $email_verify = $this->db->get_where('members', array('encrypted_id' =>
                                                $this->session->userdata('matrix_user_encrypted_id')))->row()->email_verification;
                                                $email = $this->db->get_where('members', array('encrypted_id' =>
                                                $this->session->userdata('matrix_user_encrypted_id')))->row()->email;
                                                if ($email_verify == 0) :
                                            ?>
                                            <h3 class="text-center">Email Verification</h3>
                                            <form action="<?php echo base_url('user/email_verification'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" disabled class="form-control" value="<?php echo $email ?>" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-2 control-label">Code</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" required name="code" class="form-control" placeholder="CRYPTO-MATRIX-XXXXXX">
                                                    </div>
                                                </div>
                                                <center><div class="row">
                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-success btn-block"> Verify Email</button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="<?php echo base_url('user/resend_verification_code') ?>" class="btn btn-warning btn-block"> Resend Verification Code</a>
                                                    </div>
                                                </div></center>
                                                
                                            </form>
                                            <?php else: ?>
                                                <div class="box box-primary" style="justify-content:center">
                                                    <h3 class="text-center">Email Verification</h3>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <input type="email" disabled class="form-control" value="<?php echo $email ?>" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="text-center">
                                                                <span class="badge bg-green">Email Address Verified</span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="box box-primary">
                                        <div class="box-body box-profile">
                                                <?php
                                                    $payment_settings = $this->db->get_where('members', array('encrypted_id' =>
                                                    $this->session->userdata('matrix_user_encrypted_id')))->row()->payment_settings;
                                                    if ($payment_settings== 0) :
                                                ?>
                                                <form action="<?php echo base_url('user/upload_payment_details'); ?>" method="post" enctype="multipart/form-data">
                                                <center>
                                                    <div class="form-group">
                                                        <label for="field-1">Upload Wallet SR Code </label>
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
                                                <div class="form-group text-center">
                                                    <label>Bitcoin Wallet Address</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" required name="address" class="form-control" placeholder="XXXXXXXXXXXXXXXXXXXXXXXXXXXX">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary"><b>Update Payment Details</b></button>
                                                </div>
                                                </form>
                                            <?php else : ?>
                                                <h3 class="text-center">Payment Details</h3>
                                                <center><img class="profile-user-img img-responsive " style="width:150px; height:150px" src="<?php echo $this->crud_model->get_image_url('user_payment', $this->session->userdata('matrix_user_id')) ?>" alt="User profile picture"></center>
                                                <div class="text-center">
                                                    <p><b>My Wallet Address</b></p>
                                                    <h4 class="text-center"><?php echo $this->db->get_where('members', array('encrypted_id'=>$this->session->userdata('matrix_user_encrypted_id')))->row()->wallet_address; ?></h4>
                                                </div>
                                                
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                  </div>
                              </div>
                              

                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" style="height:360px;" id="timeline">
                              <!-- The timeline -->
                              <div class="card">
                                  <div class="card-body" style="height:360px; overflow-y:scroll">
                                    <ul class="timeline timeline-inverse">
                                        <?php 
                                            $this->db->order_by('id', 'desc');
                                            $this->db->where('user_encrypted_id', $this->session->userdata('matrix_user_encrypted_id'));
                                            $notifications = $this->db->get_where('notices')->result_array();
                                            foreach($notifications as $notification):
                                        ?>
                                        <li class="time-label">
                                            <span class="bg-green">
                                                <?php echo $notification['date'] ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope bg-blue"></i>
                                            <div class="timeline-item">
                                                <div class="timeline-body">
                                                    <?php echo $notification['description'] ?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                              
                          </div>
                          <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->