<nav class="site-navigation navigation" id="site-navigation">
    <div class="container">
        <div class="site-nav-inner">
            <!-- Logo For ONLY Mobile display Starts -->
            <a class="logo-mobile" href="<?php echo base_url(); ?>">
                <img id="logo-mobile" class="img-responsive" src="<?php echo base_url(); ?>images/logo-dark.png" alt="">
            </a>
            <!-- Logo For ONLY Mobile display Ends -->
            <!-- Toggle Icon for Mobile Starts -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Toggle Icon for Mobile Ends -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <!-- Main Menu Starts -->
                <?php 
                $data = [
                            'current' => 'Home'
                        ];
                ?>
                <ul class="nav navbar-nav">
                    <li <?php if ($data['current'] == 'Home') {
                        echo 'class="active"';
                    } ?> ><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li <?php if ($data['current'] == 'About') {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url(); ?>about">About Us</a></li>
                    <li <?php if ($data['current'] == 'Plan') {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url(); ?>plan">Plan</a></li>
                    <li <?php if ($data['current'] == 'FAQ') {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url(); ?>FAQ">FAQ</a></li>
                    <li <?php if ($data['current'] == 'Contact') {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                </ul>
                <!-- Main Menu Ends -->
            </div>
        </div>
    </div>
</nav>