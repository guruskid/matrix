
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
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <!-- Logo Starts -->
            <a class="visible-xs" href="<?php echo base_url(); ?>">
                <img id="logo" class="img-responsive mobile-logo" src="<?php echo base_url(); ?>/images/logo-dark.png" alt="logo">
            </a>
            <!-- Logo Ends -->
            <div class="form-container">
                <div>
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <h2 class="title-head hidden-xs">member <span>login</span></h2>
                        <p class="info-form">Send, receive and securely store your coins in your wallet</p>
                    </div>
                    <!-- Section Title Ends -->
                    <!-- Form Starts -->
                    <form method="post" action="<?php echo base_url('login/auth'); ?>">
                        <!-- Input Field Starts -->
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group">
                            <input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
                        </div>
                        
                        <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">login</button>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <input type="checkbox" name="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                                <div class="col-md-6 col-xs-6"><a href="<?php echo base_url(); ?>pages/forget">I forgot my password</a></div>
                            </div>
                            <p class="text-center">don't have an account ? <a href="<?php echo base_url(); ?>register">register now</a>
                        </div>
                        <!-- Submit Form Button Ends -->
                    </form>
                    <!-- Form Ends -->
                </div>
            </div>
        </div>
    </div>
  