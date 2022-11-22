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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="container align-self-start my-3">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="text" class="form-control " name="nama" value="<?php echo $me['user_nama']; ?>">
                                        <label class="form-control-label">Nama</label>
                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="text" class="form-control " name="telp" value="<?php echo $me['user_telp']; ?>">
                                        <label class="form-control-label">No telepon</label>
                                        <small class="text-danger"><?php echo form_error('telp'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="text" class="form-control " name="email" value="<?php echo $me['user_email']; ?>">
                                        <label class="form-control-label">Email</label>
                                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="textarea" class="form-control " name="alamat" value="<?php echo $me['user_alamat']; ?>">
                                        <label class="form-control-label">Alamat</label>
                                        <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="text" class="form-control " name="kpos" value="<?php echo $me['user_kpos']; ?>">
                                        <label class="form-control-label">Kode Pos</label>
                                        <small class="text-danger"><?php echo form_error('kpos'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="file" class="form-control " name="gambar">
                                        <input type="hidden" name="gambar_old" value="<?php echo $me['user_foto']; ?>">
                                        <label class="form-control-label">Foto profil</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="password" class="form-control " name="password">
                                        <label class="form-control-label">Konfirmasi password</label>
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