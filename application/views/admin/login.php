<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?> - Planet Gadgets Online Shopping</title>
    <base href="<?php echo base_url(); ?>"/>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Planet Gadgets Online Shopping" />
    <meta name="keywords" content="Planet Gadgets Online Shopping" />
    <meta name="author" content="Planet Gadgets">
    <!-- Favicon icon -->
    <link rel="icon" href="wp-admin/images/Logo-Small-PG.svg" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="wp-admin/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="wp-admin/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="wp-admin/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="wp-admin/css/style.css">
</head>

<body class="fix-menu">
        <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="text-center">
                                <img style="width: 250px; margin-bottom: -70px;" src="wp-admin/images/Logo-PG.svg" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger">
                                        <strong><i class="ti-na"></i></strong> <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('flash')): ?>
                                    <div class="alert alert-success">
                                        <strong><i class="ti-check"></i></strong> <?php echo $this->session->flashdata('flash'); ?>
                                    </div>
                                <?php endif; ?>
                                <hr/>
                                <?php if($this->uri->segment(1) == 'auth') { ?>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" value="admin@planetgadgets.com" placeholder="Your Email Address">
                                    <span class="md-line"></span>
                                </div>
                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="sandi" value="admin" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>
                                <small class="text-danger"><?php echo form_error('sandi'); ?></small>
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-5 col-xs-12">
                                    </div>
                                    <div class="col-sm-7 col-xs-12 forgot-phone text-right">
                                        <a href="auth-reset-password" class="text-right f-w-600 text-inverse"> Lupa Password?</a>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                    </div>
                                </div>
                                <?php }else if($this->uri->segment(1) == 'auth-reset-password') { ?>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email Address">
                                        <span class="md-line"></span>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('email'); ?></small>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-sm-5 col-xs-12">
                                        </div>
                                        <div class="col-sm-7 col-xs-12 forgot-phone text-right">
                                            <a href="auth" class="text-right f-w-600 text-inverse"> Ingat Password?</a>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Lanjut</button>
                                        </div>
                                    </div>
                                <?php }else { ?>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password1" placeholder="Password baru">
                                        <span class="md-line"></span>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password2" placeholder="Konfirmasi password baru">
                                        <span class="md-line"></span>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-sm-5 col-xs-12">
                                        </div>
                                        <div class="col-sm-7 col-xs-12 forgot-phone text-right">
                                            <a href="auth" class="text-right f-w-600 text-inverse"> Ingat Password?</a>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset</button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="wp-admin/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="wp-admin/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="wp-admin/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="wp-admin/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="wp-admin/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="wp-admin/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="wp-admin/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="wp-admin/js/common-pages.js"></script>
</body>

</html>
