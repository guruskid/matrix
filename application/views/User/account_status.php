<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?php echo "Crypto Matrix " . $page_title ?></title>
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
        <div class="container-fluid user-auth">
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
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" >
                <div class="container-fluid" style="margin-top: 100px;">
                    <div class="row text-center">
                        <h2 class="title-head hidden-xs">your account has <span>been blocked</span></h2>
                        <p class="info-form">Contact Admin to Re-Activate Your Account</p>
                    </div>
                    <div class="row">
                <div class="col-xs-12 col-md-12 contact-form">
                    <h3 class="col-xs-12">contact admin for account re-activation</h3>
                    <p class="col-xs-12">Explain Possible Reasons why account would have been blocked. Note that 
                        Re-activation takes 24hours. In case it takes more time, use the CONTACT US Option on the Website.
                    </p>
                    <!-- Contact Form Starts -->
                    <form class="form-contact" action="<?php echo base_url('user/account_block_message') ?>" method="post">
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-12">
                            <input class="form-control" name="text" name="subject" id="subject" placeholder="SUBJECT" type="text" required>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-xs-12">
                            <textarea class="form-control" id="message" name="message" placeholder="MESSAGE" required></textarea>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group col-xs-12 col-sm-4">
                            <button class="btn btn-primary btn-contact" type="submit">send message</button>
                        </div>
                        <!-- Submit Form Button Ends -->
                        <!-- Form Submit Message Starts -->
                        <div class="col-xs-12 text-center output_message_holder d-none">
                            <p class="output_message"></p>
                        </div>
                        <!-- Form Submit Message Ends -->
                    </form>
                    <!-- Contact Form Ends -->
                </div>
              
            </div>
                </div>
            </div>
        </div>




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