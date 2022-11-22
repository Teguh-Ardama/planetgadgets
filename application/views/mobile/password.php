<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded">
    <?php $this->load->view('mobile/load'); ?>
    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>
    <div class="main-container">
        <?php $this->load->view('mobile/header'); ?>
        <div class="content container-fluid">
            <!-- page content start -->
            <div class="content-container">
                <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><i class="material-icons">highlight_off</i> <?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="container align-self-start my-3">
                            <div class="row">
                                
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="password" class="form-control " name="password1">
                                        <label class="form-control-label">Password baru</label>
                                        <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="password" class="form-control " name="password2">
                                        <label class="form-control-label">Konfirmasi password baru</label>
                                        <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="password" class="form-control " name="password">
                                        <label class="form-control-label">Konfirmasi password lama</label>
                                        <small class="text-danger"><?php echo form_error('password'); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container align-self-end mb-4 text-center">
                            <button type="submit" class="btn btn-lg btn-primary mb-3 btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>



            <!-- page content ends -->
        </div>

    </div>
<?php $this->load->view('mobile/foot'); ?>