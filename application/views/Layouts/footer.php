<footer class="footer">
    <!-- Footer Top Area Starts -->
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Starts -->
                <div class="col-sm-4 col-md-2">
                    <h4>Our Company</h4>
                    <div class="menu">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>about">About</a></li>
                            <li><a href="<?php echo base_url(); ?>plan">Plan</a></li>
                            <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Widget Ends -->
                <!-- Footer Widget Starts -->
                <div class="col-sm-4 col-md-2">
                    <h4>Help & Support</h4>
                    <div class="menu">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>FAQ">FAQ</a></li>
                            <li><a href="<?php echo base_url(); ?>terms">Terms of Services</a></li>
                            <li><a href="<?php echo base_url(); ?>register">Register</a></li>
                            <li><a href="<?php echo base_url(); ?>login">Login</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Widget Ends -->
                <!-- Footer Widget Starts -->
                <div class="col-sm-4 col-md-3">
                    <h4>Contact Us </h4>
                    <div class="contacts">
                        <div>
                            <span>contact@website.com</span>
                        </div>
                        <div>
                            <span>00216 21 184 010</span>
                        </div>
                        <div>
                            <span>London, England</span>
                        </div>
                        <div>
                            <span>mon-sat 08am &#x21FE; 05pm</span>
                        </div>
                    </div>
                    <!-- Social Media Profiles Starts -->
                    <div class="social-footer">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- Social Media Profiles Ends -->
                </div>
                <!-- Footer Widget Ends -->
                <!-- Footer Widget Starts -->
                <div class="col-sm-12 col-md-5">
                    <!-- Facts Starts -->
                    <div class="facts-footer">
                        <div>
                            <h5>$198.76B</h5>
                            <span>Market cap</span>
                        </div>
                        <div>
                            <h5>243K</h5>
                            <span>daily transactions</span>
                        </div>
                        <div>
                            <h5>369K</h5>
                            <span>active accounts</span>
                        </div>
                        <div>
                            <h5>127</h5>
                            <span>supported countries</span>
                        </div>
                    </div>
                    <!-- Facts Ends -->
                </div>
                <!-- Footer Widget Ends -->
            </div>
        </div>
    </div>
    <!-- Footer Top Area Ends -->
    <!-- Footer Bottom Area Starts -->
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <!-- Copyright Text Starts -->
                    <p>Copyright © 2020 <a href="<?php echo base_url(); ?>">Crypto Matrix</a>. All Rights Reserved.</p>
                    <!-- Copyright Text Ends -->
                </div>
                <div class="col-xs-6 text-right">
                    <!-- Copyright Text Starts -->
                    <p><a href="<?php echo base_url(); ?>terms">Terms of Services</a> | <a href="<?php echo base_url(); ?>/pages/FAQ">FAQ</a></p>
                    <!-- Copyright Text Ends -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom Area Ends -->
</footer>
   <!-- Back To Top Starts  -->
 <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
<!-- Template JS Files -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/custom.js"></script>

<!-- Live Style Switcher JS File - only demo -->
<script src="js/styleswitcher.js"></script>

<script src="<?php echo base_url(); ?>assets/js/toastr.js"></script>


</div>
<!-- Wrapper Ends -->

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