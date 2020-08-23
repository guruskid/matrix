
<div class="wrapper">
    <!-- Header Starts -->
    <header class="header">
        <div class="container">
            <div class="row">
                <!-- Logo Starts -->
                <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                    <a href="<?php echo base_url(); ?>">
                        <img id="logo" class="img-responsive" src="<?php echo base_url(); ?>images/logo-dark.png" alt="logo">
                    </a>
                </div>
                <!-- Logo Ends -->
                <!-- Statistics Starts -->
                <div class="col-md-7 col-lg-7">
                    <ul class="unstyled bitcoin-stats text-center">
                        <li>
                            <h6>9,450 USD</h6><span>Last trade price</span>
                        </li>
                        <li>
                            <h6>+5.26%</h6><span>24 hour price</span>
                        </li>
                        <li>
                            <h6>12.820 BTC</h6><span>24 hour volume</span>
                        </li>
                        <li>
                            <h6>2,231,775</h6><span>active traders</span>
                        </li>
                        <li>
                            <div class="btcwdgt-price" data-bw-theme="light" data-bw-cur="usd"></div>
                            <span>Live Bitcoin price</span>
                        </li>
                    </ul>
                </div>
                <!-- Statistics Ends -->
                <!-- User Sign In/Sign Up Starts -->
                <div class="col-md-3 col-lg-3">
                    <ul class="unstyled user">
                        <li class="sign-in"><a href="<?php echo base_url(); ?>login" class="btn btn-primary"><i class="fa fa-user"></i> sign in</a></li>
                        <li class="sign-up"><a href="<?php echo base_url(); ?>register" class="btn btn-primary"><i class="fa fa-user-plus"></i> register</a></li>
                    </ul>
                </div>
                <!-- User Sign In/Sign Up Ends -->
            </div>
        </div>
        <!-- Navigation Menu Starts -->
        <?php require APPPATH . '/views/Layouts/nav.php'; ?>
        <!-- Navigation Menu Ends -->
    </header>
    <!-- Header Ends -->
    <!-- Section FAQ Starts -->
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <!-- Panel Group Starts -->
                    <div class="panel-group" id="accordion">
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        what is bitcoin ?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">Bitcoin is a form of digital currency which is based on an open source code that was created and is held electronically. Bitcoin is a decentralized form of currency, meaning that it does not belong to any form of government and is not controlled by anyone.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Who Developed Bitcoin?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">The original Bitcoin code was designed by Satoshi Nakamoto under MIT open source credentials. In 2008 Nakamoto outlined the idea behind Bitcoin in his White Paper, which scientifically described how the cryptocurrency would function. Bitcoin is the first successful digital currency designed with trust in cryptography over central authorities. Satoshi left the Bitcoin code in the hands of developers and the community in 2010. Thus far hundreds of developers have added to the core code throughout the years.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        What is Bitcoin Mining?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">Bitcoin mining is analogous to the mining of gold, but its digital form. The process involves specialized computers solving algorithmic equations or hash functions. These problems help miners to confirm blocks of transactions held within the network. Bitcoin mining provides a reward for miners by paying out in Bitcoin in turn the miners confirm transactions on the blockchain. Miners introduce new Bitcoin into the network and also secure the system with transaction confirmation. They are also rewarded network fees for when they harvest new coin and a time when the last bitcoin is found mining will continue.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Is Bitcoin Used For Illegal Activities?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">This is a yet another controversial topic. Because of the freedom and the degree of anonymity that the use of Bitcoin offers, many users who were seeking to purchase or solicit illegal goods or services initially turned to the use of Bitcoin as a method of payment.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Can Bitcoin Be Regulated In Any Way?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">Again, when a user decides to use a specific type of software for their Bitcoin wallet, they are deciding what direction the Bitcoin network is heading towards. In other words, you need the cooperation of nearly every single user in order to modify any aspect of the Bitcoin protocol.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                        Is Bitcoin anonymous?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">Participants in Bitcoin transactions are identified by public addresses – those are the long strings of around 30 characters you see in a person’s Bitcoin address, usually starting with the numerals ‘1’ or ‘3’. For every transaction, the sending and receiving addresses are publicly-viewable.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                        <!-- Panel Starts -->
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                        How Can I Sell Bitcoins?</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">Bitcoins can be sold locally using LocalBitcoins, on Bitcoin brokerages / exchanges, using two-way Bitcoin Teller Machines (BTM’s) or you can pay for a good or service with them. Bitcoins can be sold to just about anyone as long as they have a Bitcoin address, and can be sold for any fiat currency in the world or traded for a physical good. Feel free to check out our recommended list of exchanges and brokerage services to sell your bitcoins online.</div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        <!-- Panel Ends -->
                    </div>
                    <!-- Panel Group Ends -->
                </div>
                <!-- Sidebar Starts -->
                <div class="sidebar col-xs-12 col-md-4">
                    <!-- Latest Posts Widget Ends -->
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Blog Posts</h3>
                        <ul class="unstyled clearfix">
                            <!-- Recent Post Widget Starts -->
                            <li>
                                <div class="posts-thumb pull-left">
                                    <a href="blog-post.html">
                                        <img alt="img" src="<?php echo base_url(); ?>images/blog/blog-post-small-1.jpg">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4 class="entry-title">
                                        <a href="blog-post.html">Risks & Rewards Of Investing In Bitcoin</a>
                                    </h4>
                                    <p class="post-meta">
                                        <span class="post-date"><i class="fa fa-clock-o"></i> January 19, 2017</span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <!-- Recent Post Widget Ends -->
                            <!-- Recent Post Widget Starts -->
                            <li>
                                <div class="posts-thumb pull-left">
                                    <a href="blog-post-light.html">
                                        <img alt="img" src="<?php echo base_url(); ?>images/blog/blog-post-small-2.jpg">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4 class="entry-title">
                                        <a href="blog-post-light.html">Cryptocurrency - Who Are Involved With It?</a>
                                    </h4>
                                    <p class="post-meta">
                                        <span class="post-date"> August 03, 2017</span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <!-- Recent Post Widget Ends -->
                            <!-- Recent Post Widget Starts -->
                            <li>
                                <div class="posts-thumb pull-left">
                                    <a href="blog-post-light.html">
                                        <img alt="img" src="<?php echo base_url(); ?>images/blog/blog-post-small-3.jpg">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4 class="entry-title">
                                        <a href="blog-post-light.html">How Cryptocurrency Begun and Its Impact</a>
                                    </h4>
                                    <p class="post-meta">
                                        <span class="post-date"> March 27, 2017</span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <!-- Recent Post Widget Ends -->
                        </ul>
                    </div>
                    <!-- Latest Posts Widget Ends -->
                    <!-- Tags Widget Starts -->
                    <div class="widget widget-tags">
                        <h3 class="widget-title">Popular Tags </h3>
                        <ul class="unstyled clearfix">
                            <li><a href="#">currency</a></li>
                            <li><a href="#">crypto</a></li>
                            <li><a href="#">trading</a></li>
                            <li><a href="#">wallet</a></li>
                            <li><a href="#">mining</a></li>
                            <li><a href="#">transaction</a></li>
                            <li><a href="#">financial</a></li>
                            <li><a href="#">security</a></li>
                        </ul>
                    </div>
                    <!-- Tags Widget Ends -->
                </div>
                <!-- Sidebar Ends -->
            </div>
        </div>
    </section>
    <!-- Section FAQ Ends -->
   