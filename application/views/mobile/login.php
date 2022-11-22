<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded">
    <?php $this->load->view('mobile/load'); ?>
    

    <!-- page content starts -->
    <div class="has-background bg-default">
        <figure class="background opacity-30">
            <img src="wp-content/img/bg-login.svg" alt="">
        </figure>

        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-12 align-self-start header">
                    <div class="row">
                        <div class="col">
                            <div class="logo-header">
                                <img src="wp-content/img/Logo-Small-PG.svg" alt="" class="logo-img">
                                <h5 class="logo-header-text">Planet Gadgets<br><small>Online Shopping</small></h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="" class="btn text-white">Home</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 align-self-center">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-3">
                            <h1 class="text-center font-weight-normal mb-5"><?php echo $title; ?></h1>
                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger text-white bg-transparent"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('flash')): ?>
                            <div class="alert alert-success text-success bg-transparent"><?php echo $this->session->flashdata('flash'); ?></div>
                            <?php endif; ?>
                            <form action="" method="post">
                                <?php if($this->uri->segment(1) == 'login') { ?>
                                <div class="form-group float-label style-light active">
                                    <input type="text" class="form-control " name="email">
                                    <label class="form-control-label">Email</label>
                                    <small class="text-white"><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="form-group float-label style-light position-relative">
                                    <!-- <div class="bottom-right mb-2   ">
                                        <a href="lupa-password" class="text-white">Lupa?</a>
                                    </div> -->
                                    <input type="password" class="form-control " name="password">
                                    <label class="form-control-label">Password</label>
                                    <small class="text-white"><?php echo form_error('password'); ?></small>
                                </div>
                                <button type="submit" class="btn btn-lg btn-white btn-block my-4">Sign in</button>
                                <?php }else if($this->uri->segment(1) == 'lupa-password') { ?>
                                    <div class="form-group float-label style-light active">
                                        <input type="text" class="form-control " name="email">
                                        <label class="form-control-label">Email</label>
                                        <small class="text-white"><?php echo form_error('email'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-white btn-block my-4">Lanjut</button>
                                <?php }else { ?>
                                    <div class="form-group float-label style-light position-relative">
                                        <input type="password" class="form-control " name="password1">
                                        <label class="form-control-label">Password baru</label>
                                        <small class="text-white"><?php echo form_error('password1'); ?></small>
                                    </div>
                                    <div class="form-group float-label style-light position-relative">
                                        <input type="password" class="form-control " name="password2">
                                        <label class="form-control-label">Konfirmasi password baru</label>
                                        <small class="text-white"><?php echo form_error('password2'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-white btn-block my-4">Reset</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 align-self-end mb-4 text-center">
                    Belum punya akun?<br><a href="registrasi" class="text-white font-weight-bold">daftar</a> disini.
                </div>
            </div>
        </div>
    </div>
    <!-- page content ends -->
<?php $this->load->view('mobile/foot'); ?>