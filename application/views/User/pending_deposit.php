<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?php echo "Crypto Matrix" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/skins/orange.css">

    <!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="orange" href="<?php echo base_url(); ?>css/skins/orange.css" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="<?php echo base_url(); ?>css/skins/green.css" />
    <link rel="alternate stylesheet" type="text/css" title="blue" href="<?php echo base_url(); ?>css/skins/blue.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styleswitcher.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/neon.css" />

    <!-- Template JS Files -->
    <script src="<?php echo base_url(); ?>js/modernizr.js"></script>

</head>
<style>
    #timer {
        width: 50%;
    }

    @media (max-width: 991.98px) {
        #timer {
            width: 100%;
        }
    }

    #timer .time {
        width: 25%;
        font-size: 50px;
        font-weight: 200;
        border-left: 1px solid rgba(0, 0, 0, 0.05);
        color: #0c7a08;
    }

    #timer .time:first-child {
        border-left: transparent;
    }

    #timer .time span {
        font-size: 16px;
        display: block;
        color: #000000;
    }
    .modal-backdrop {
        z-index: -1;
    }
</style>

<body class="boxed light">

    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth" style="padding-top:30px; padding-bottom:100px;">
            <div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
                <!-- Logo Starts -->
                <a class="logo" href="<?php echo base_url(); ?>">
                    <img id="logo-user" class="img-responsive" src="<?php echo base_url(); ?>images/logo-dark.png" alt="logo">
                </a>
                <!-- Logo Ends -->
                <!-- Slider Starts -->
                <div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators Starts -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-testimonials" data-slide-to="1"></li>
                        <li data-target="#carousel-testimonials" data-slide-to="2"></li>
                    </ol>
                    <!-- Indicators Ends -->
                    <!-- Carousel Inner Starts -->
                    <div class="carousel-inner">
                        <!-- Carousel Item Starts -->
                        <div class="item active item-1">
                            <div>
                                <blockquote>
                                    <p>This is a realistic program for anyone looking for site to invest. Paid to me regularly, keep up good work!</p>
                                    <footer><span>Lucy Smith</span>, England</footer>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Item Ends -->
                        <!-- Carousel Item Starts -->
                        <div class="item item-2">
                            <div>
                                <blockquote>
                                    <p>Bitcoin doubled in 7 days. You should not expect anything more. Excellent customer service!</p>
                                    <footer><span>Slim Hamdi</span>, Tunisia</footer>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Item Ends -->
                        <!-- Carousel Item Starts -->
                        <div class="item item-3">
                            <div>
                                <blockquote>
                                    <p>My family and me want to thank you for helping us find a great opportunity to make money online. Very happy with how things are going!</p>
                                    <footer><span>Rawia Chniti</span>, Russia</footer>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Item Ends -->
                    </div>
                    <!-- Carousel Inner Ends -->
                </div>
                <!-- Slider Ends -->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                <div class="container-fluid">

                    <div class="">
                        <?php
                        $check = $this->db->get_where('activated_plans', array(
                            'user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'),
                            'status' => 1, 'deposit_status' => 0
                        ));
                        if ($check->row()->deposit_status == 0) : ?>
                            <div class="row text-center">
                                <div class="text-center">
                                    <a href="<?php echo base_url('logout') ?>" class="btn btn-primary">Logout</a>
                                </div>
                                <h2 class="title-head hidden-xs">you are yet <span>to make payment</span></h2>
                                <p class="info-form">Send payment to the wallet address below</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php
                                        $btc_payment = $this->db->get('btc_payment')->result_array();
                                        foreach ($btc_payment as $btc_payment) :
                                        ?>
                                            <div class="col-lg-12">
                                                <center>
                                                    <img style="width:150px; height:170px" class="img-fluid" src="<?php echo $this->crud_model->get_image_url('btc', $btc_payment['id']) ?>" />
                                                </center>
                                                <div class="callout  text-center" style="margin-bottom:10px;">
                                                    <h4 style="margin-bottom:0px;">BitCoin Wallet Address</h4>
                                                    <div id="div2"><h3 style="margin-top:0px;"><strong><?php echo $btc_payment['wallet_address'] ?></strong></h3></div>
                                                </div>
                                                <div class="text-center"><button id="button1" class="btn btn-secondary" onclick="CopyToClipboard('div2')">Click to Copy</button></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="text-center">
                                <h2><b>Time Left for Deposit:</b></h2>
                                <center>
                                    <div id="timer" class="text-center" style="display: flex; margin-top:40px;">
                                        <div class="time" id="days"></div>
                                        <div class="time" id="hours"></div>
                                        <div class="time" id="minutes"></div>
                                        <div class="time" id="seconds"></div>
                                    </div>
                                </center>
                                <h5 class="text-danger"><b>Your Account will be Blocked if Time Left for Deposit Reaches 0</b> <br/> It takes 2hrs to Process Payment, Please Continue checking your Email or Visit Dashboard for Details</h5>
                            </div>
                            <div class="text-center" style="margin-top:40px;">
                                <p>Already Made Payment?</p>
                                <a href="#" data-toggle="modal" data-target="#uploadPaymentProof" class="btn btn-primary">Upload Payment Proof</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="uploadPaymentProof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:2">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder fa-lg"></i> Upload Payment Proof</h3>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <form action="<?php echo base_url('user/upload_payment_proof'); ?>" method="post" enctype="multipart/form-data">
                                <input required type="hidden" class="form-control" value="<?php echo $check->row()->encrypted_id; ?>" name="plan_activation_encrypted_id">                                
                                <input required type="hidden" class="form-control" value="<?php echo $this->db->get_where('plans', array('encrypted_id' => $check->row()->plan_encrypted_id))->row()->amount; ?>" name="amount">                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date of Payment</label>
                                            <input required type="date" class="form-control" name="date_of_payment">
                                        </div>
                                    <div class="col-md-12">
                                        <center>
                                            <div class="form-group">
                                                <label for="field-1">Upload Payment Notification</label>
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
                                        <button class="btn btn-primary btn-block">Upload Proof</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.box-body -->

                    </div>
                </div>
            </div>
        </div>

        <div id="dom-target" style="display: none;">
            <?php echo date('j F Y h:i:s', strtotime($check->row()->deposit_date)) ?>
        </div>

        <script>
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
            
            function makeTimer() {

                var div = document.getElementById("dom-target");
                var myData = div.textContent;
                var endTime = myData;
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") {
                    hours = "0" + hours;
                }
                if (minutes < "10") {
                    minutes = "0" + minutes;
                }
                if (seconds < "10") {
                    seconds = "0" + seconds;
                }

                $("#days").html(days + "<span>Days</span>");
                $("#hours").html(hours + "<span>Hours</span>");
                $("#minutes").html(minutes + "<span>Minutes</span>");
                $("#seconds").html(seconds + "<span>Seconds</span>");

            }

            setInterval(function() {
                makeTimer();
            }, 1000);
        </script>


        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url() ?>assets/dashboard/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='<?php echo base_url() ?>assets/dashboard/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/dashboard/dist/js/app.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/dashboard/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url() ?>assets/dashboard/dist/js/pages/dashboard.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/dashboard/dist/js/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/toastr.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fileinput.js"></script>



        <!-- SHOW TOASTR NOTIFIVATION -->
        <?php if ($this->session->flashdata('flash_message') != "") : ?>

            <script type="text/javascript">
                toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
            </script>

        <?php endif; ?>

        <!-- SHOW TOASTR NOTIFIVATION -->
        <?php if ($this->session->flashdata('flash_error') != "") : ?>

            <script type="text/javascript">
                toastr.error('<?php echo $this->session->flashdata("flash_error"); ?>');
            </script>

        <?php endif; ?>




        


</body>

</html>