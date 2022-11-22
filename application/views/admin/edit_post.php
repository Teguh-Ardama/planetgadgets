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
                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul" value="<?php echo $artikelid['blog_judul']; ?>" autofocus="">
                                        <small class="text-danger"><?php echo form_error('judul'); ?></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="gambar">
                                        <input type="hidden" name="gambar_old" value="<?php echo $artikelid['blog_gambar']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="isi" class="form-control" id="deskripsi"><?php echo $artikelid['blog_isi']; ?></textarea>
                                    <small class="text-danger"><?php echo form_error('isi'); ?></small>
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
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'deskripsi' );
</script>