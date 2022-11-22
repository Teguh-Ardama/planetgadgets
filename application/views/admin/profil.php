<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo $title; ?></h5>
                        </div>
                        <div class="card-block">
                            <?php if($this->session->flashdata('flash')): ?>
                            <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('flash'); ?></div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <form action="" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $profilid['profil_nama']; ?>" autofocus="">
                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $profilid['profil_email']; ?>">
                                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Telepon</label>
                                        <input type="number" class="form-control" name="telp" value="<?php echo $profilid['profil_telp']; ?>">
                                        <small class="text-danger"><?php echo form_error('telp'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?php echo $profilid['profil_alamat']; ?>">
                                    <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                                </div>
                                <div class="form-group">
                                    <button type="button" onclick="goBack();" class="btn btn-warning btn-sm">Batal</button>
                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>