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
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" autofocus="">
                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="harga" value="<?php echo set_value('harga'); ?>">
                                        <small class="text-danger"><?php echo form_error('harga'); ?></small>
                                    </div>
                                </div>
                                <div class="row" hidden>
                                    <div class="form-group col-md-6">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="stok" value="10">
                                        <small class="text-danger"><?php echo form_error('stok'); ?></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Diskon (%)</label>
                                        <input type="number" class="form-control" name="diskon" value="<?php echo set_value('diskon'); ?>">
                                        <small class="text-danger"><?php echo form_error('diskon'); ?></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Kategori</label>
                                        <input type="text" id="txt1" class="form-control" name="kategori" value="<?php echo set_value('kategori'); ?>">
                                        <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                                        <small class="text-help">Gunakan tanda koma (,) untuk memisahkan kategori</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Atau pilih kategori ini</label><br>
                                        <?php foreach($kat as $k): ?>
                                            <input id="<?php echo $k['kategori']; ?>" type="checkbox" name="kat[]" value="<?php echo $k['kategori']; ?>" onclick="addlist(this, 'txt1')" <?php if($rk) {foreach($rk->result() as $l) {if($k['kategori'] == $l->kategori) {echo 'checked';}}} ?>> <label for="<?php echo $k['kategori']; ?>"> <?php echo $k['kategori']; ?></label>&nbsp;
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Berat (gram)</label>
                                        <input type="number" class="form-control" name="berat" value="<?php echo set_value('berat'); ?>">
                                        <small class="text-danger"><?php echo form_error('berat'); ?></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi'); ?></textarea>
                                    <small class="text-danger"><?php echo form_error('deskripsi'); ?></small>
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