<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo $title; ?></h5>
                        </div>
                        <div class="card-block">
                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="id" value="<?php echo rand(); ?>">
                                
                                <div id="konten-photo">
                                    <div id="photo1">
                                        <b>#1</b> <a id="1" class="btn btn-danger btn-mini btn_remove text-white">Hapus</a>
                                        <div class="row"> 
                                            <div class="form-group col-md-12">
                                                <label>Foto</label>
                                                <input type="file" class="form-control" name="files[]" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="photo2">
                                        <b>#2</b> <a id="2" class="btn btn-danger btn-mini btn_remove text-white">Hapus</a>
                                        <div class="row"> 
                                            <div class="form-group col-md-12">
                                                <label>Foto</label>
                                                <input type="file" class="form-control" name="files[]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" onclick="goBack();" class="btn btn-warning btn-sm">Batal</button>
                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    <a id="addKolom" class="btn btn-primary btn-sm text-white float-right">Tambah Kolom</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>