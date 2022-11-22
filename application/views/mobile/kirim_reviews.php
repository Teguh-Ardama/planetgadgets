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
                <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-success"><i class="material-icons">check_circle</i> <?php echo $this->session->flashdata('flash'); ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="container align-self-start my-3">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <select name="produk" class="form-control ">
                                            <option value="">-Pilih produk-</option>
                                            <?php $cekdetail = $this->db->get_where('tb_detail_transaksi',['d_transaksi_id' => $trxid['transaksi_id']])->result_array(); ?>
                                            <?php foreach($cekdetail as $tr): ?>
                                            <?php $cekproduk = $this->db->get_where('tb_produk',['produk_id' => $tr['d_transaksi_item']])->row_array(); ?>
                                            <?php $cekrev = $this->db->get_where('tb_reviews',['re_produkid' => $cekproduk['produk_id'], 're_transaksi' => $trxid['transaksi_id']])->row_array(); ?>
                                            <?php if($cekrev) { ?>
                                            <?php }else { ?>
                                                <option value="<?php echo $cekproduk['produk_id']; ?>"><?php echo $cekproduk['produk_name']; ?></option>
                                            <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label class="form-control-label">Pilih produk</label>
                                        <small class="text-danger"><?php echo form_error('produk'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="radio" name="bintang" value="1" id="1"> <label for="1"><i class="material-icons">star</i></label><br>
                                        <input type="radio" name="bintang" value="2" id="2"> <label for="2"><i class="material-icons">star</i><i class="material-icons">star</i></label><br>
                                        <input type="radio" name="bintang" value="3" id="3"> <label for="3"><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i></label><br>
                                        <input type="radio" name="bintang" value="4" id="4"> <label for="4"><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i></label><br>
                                        <input type="radio" name="bintang" value="5" id="5"> <label for="5"><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i></label>
                                        <label class="form-control-label">Bintang</label>
                                        <small class="text-danger"><?php echo form_error('bintang'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group float-label position-relative active">
                                        <input type="text" class="form-control " name="isi" value="<?php echo set_value('isi'); ?>">
                                        <label class="form-control-label">Ulasanmu</label>
                                        <small class="text-danger"><?php echo form_error('isi'); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container align-self-end mb-4 text-center">
                            <button type="submit" class="btn btn-lg btn-primary mb-3 btn-block">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>



            <!-- page content ends -->
        </div>

    </div>
<?php $this->load->view('mobile/foot'); ?>