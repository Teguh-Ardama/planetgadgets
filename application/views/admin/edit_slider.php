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
                                                    <div class="form-group col-md-4">
                                                        <label>Teks 1</label>
                                                        <input type="text" class="form-control" name="teks1" value="<?php echo $slideid['slider_text_1']; ?>" autofocus="">
                                                        <small class="text-danger"><?php echo form_error('teks1'); ?></small>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Teks 2</label>
                                                        <input type="text" class="form-control" name="teks2" value="<?php echo $slideid['slider_text_2']; ?>">
                                                        <small class="text-danger"><?php echo form_error('teks2'); ?></small>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Teks 3</label>
                                                        <input type="text" class="form-control" name="teks3" value="<?php echo $slideid['slider_text_3']; ?>">
                                                        <small class="text-danger"><?php echo form_error('teks3'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label>Url</label>
                                                        <input type="text" class="form-control" name="url" value="<?php echo $slideid['slider_link']; ?>">
                                                        <small class="text-danger"><?php echo form_error('url'); ?></small>
                                                        <small class="text-help">Url tujuan. Misal, /shop</small>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Urutan</label>
                                                        <input type="number" min="1" class="form-control" name="urutan" value="<?php echo $slideid['slider_urutan']; ?>">
                                                        <small class="text-danger"><?php echo form_error('urutan'); ?></small>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Foto</label>
                                                        <input type="file" class="form-control" name="gambar">
                                                        <input type="hidden" name="gambar_old" value="<?php echo $slideid['slider_gambar']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" onclick="goBack();" class="btn btn-warning btn-sm">Batal</button>
                                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Contoh slider</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Basic table card end -->
                                    <!-- Inverse table card start -->
                                    
                                    <!-- Background Utilities table end -->
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->

                        <div id="styleSelector">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contoh slider</h5>
                  </div>
                  <div class="modal-body">
                    <img src="wp-admin/images/slider-contoh.png" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>