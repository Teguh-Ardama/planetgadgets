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
                                                    <div class="form-group col-md-6">
                                                        <label>Provinsi</label>
                                                        <select name="prov" id="prov" class="form-control" >
                                                          <option value="" disabled selected>-Pilih Provinsi-</option>
                                                          <?php $this->load->view('admin/prov'); ?>
                                                        </select>
                                                        <small class="text-danger"><?php echo form_error('prov'); ?></small>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Kab/Kota</label>
                                                        <select name="kota" id="kota" class="form-control" >
                                                          <option value="" disabled selected>-Kota/Kabupaten-</option>
                                                        </select>
                                                        <small class="text-danger"><?php echo form_error('kota'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" onclick="goBack();" class="btn btn-warning btn-sm">Batal</button>
                                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                </div>
                                            </form>
                                            <small class="text-help">1. Atur lokasi toko kamu untuk menentukan biaya ongkos kirim. <br>2. Lokasi toko saat ini : <?php echo $lokasi['lok_kota']; ?>, <?php echo $lokasi['lok_prov']; ?>.</small>
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