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
                            <h1 class="text-center font-weight-normal mb-5">Buat akun baru</h1>
                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger text-white bg-transparent"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('flash')): ?>
                            <div class="alert alert-success text-white bg-transparent"><?php echo $this->session->flashdata('flash'); ?></div>
                            <?php endif; ?>
                            <form action="" method="post">
                                <div class="form-group float-label style-light active">
                                    <input type="text" class="form-control " name="nama" value="<?php echo set_value('nama'); ?>">
                                    <label class="form-control-label">Nama</label>
                                    <small class="text-white"><?php echo form_error('nama'); ?></small>
                                </div>
                                <div class="form-group float-label style-light active">
                                    <input type="text" class="form-control " name="telp" value="<?php echo set_value('telp'); ?>">
                                    <label class="form-control-label">No telepon</label>
                                    <small class="text-white"><?php echo form_error('telp'); ?></small>
                                </div>
                                <div class="form-group float-label style-light active">
                                    <input type="text" class="form-control " name="email">
                                    <label class="form-control-label">Email</label>
                                    <small class="text-white"><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="form-group float-label style-light position-relative">
                                    <input type="password" class="form-control " name="password1">
                                    <label class="form-control-label">Password</label>
                                    <small class="text-white"><?php echo form_error('password1'); ?></small>
                                </div>
                                <div class="form-group float-label style-light position-relative">
                                    <input type="password" class="form-control " name="password2">
                                    <label class="form-control-label">Konfirmasi Password</label>
                                    <small class="text-white"><?php echo form_error('password2'); ?></small>
                                </div>
                                <button type="submit" class="btn btn-lg btn-white btn-block my-4">Sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 align-self-end mb-4 text-center">
                    Sudah punya akun?<br><a href="login" class="text-white font-weight-bold">login</a> disini.
                </div>
            </div>
        </div>
    </div>
    <!-- page content ends -->
<?php $this->load->view('mobile/foot'); ?>