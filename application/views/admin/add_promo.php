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
                                                        <input type="text" class="form-control" name="judul" value="<?php echo set_value('judul'); ?>" autofocus="">
                                                        <small class="text-danger"><?php echo form_error('judul'); ?></small>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Kode</label>
                                                        <input type="text" class="form-control" name="kode" value="<?php echo set_value('kode'); ?>">
                                                        <small class="text-danger"><?php echo form_error('kode'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Diskon (%)</label>
                                                        <input type="number" min="1" max="100" class="form-control" name="persen" value="<?php echo set_value('persen'); ?>">
                                                        <small class="text-danger"><?php echo form_error('persen'); ?></small>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Masa berlaku</label>
                                                        <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="masa" value="<?php echo set_value('masa'); ?>">
                                                        <small class="text-danger"><?php echo form_error('masa'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" onclick="goBack();" class="btn btn-warning btn-sm">Batal</button>
                                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
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