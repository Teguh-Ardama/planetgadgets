<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded">
    <?php $this->load->view('mobile/load'); ?>

    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>
    <?php $this->load->view('mobile/side_nav'); ?>
    <div class="main-container">
        <?php $this->load->view('mobile/header'); ?>
        <div class="content container-fluid">
            <!-- page content start -->
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <h5 class="page-title">Riwayat transaksi</h5>
                        </div>
                    </div>
                    <?php if($this->session->flashdata('flash')): ?>
                    <div class="alert alert-success"><i class="material-icons">check_circle</i> <?php echo $this->session->flashdata('flash'); ?></div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><i class="material-icons">highlight_off</i> <?php echo $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>
                    <div class="row my-3">
                        <?php foreach($transaksi->result_array() as $trx): ?>
                            <?php $cekdetail = $this->db->get_where('tb_detail_transaksi',['d_transaksi_id' => $trx['transaksi_id']])->result_array(); ?>
                        <div class="col-12 col-md-6">
                            <div class="card mb-3">
                                <?php if(!$trx['transaksi_bukti']) { ?>
                                <a href="user/upload-bukti/<?php echo $trx['transaksi_id']; ?>" class="card-header bg-none">
                                <?php }else { ?>
                                <a class="card-header bg-none">
                                <?php } ?>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-mute">#<?php echo $trx['transaksi_kode']; ?> | <?php echo date('d/m/Y', strtotime($trx['transaksi_tgl_pesan'])); ?></p>
                                        </div>
                                        <div class="col-auto pr-1">
                                            <?php if($trx['transaksi_status'] == 'belum') { ?>
                                                <div class="badge badge-secondary"><?php echo ucwords($trx['transaksi_status']); ?></div>
                                            <?php }else if($trx['transaksi_status'] == 'dibayar') { ?>
                                                <div class="badge badge-primary"><?php echo ucwords($trx['transaksi_status']); ?></div>
                                            <?php }else { ?>
                                                <div class="badge badge-success"><?php echo ucwords($trx['transaksi_status']); ?></div>
                                            <?php } ?>
                                            <i class="material-icons">keyboard_arrow_right</i>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body" data-toggle="modal" data-target="#trx<?php echo $trx['transaksi_id']; ?>">
                                    <?php foreach($cekdetail as $cekde): ?>
                            <?php $cekproduk = $this->db->get_where('tb_produk',['produk_id' => $cekde['d_transaksi_item']])->row_array(); ?>
                            <?php $prcdetail = $cekde['d_transaksi_biaya'] / $cekde['d_transaksi_qty']; ?>
                                    <div class="media">
                                        <div class="icon icon-60 mr-3 has-background">
                                            <figure class="background">
                                                <img src="wp-content/img/product/<?php echo $cekproduk['produk_image']; ?>" alt="<?php echo $cekproduk['produk_image']; ?>">
                                            </figure>
                                        </div>
                                        <div class="media-body">
                                            <small class="text-mute">Subtotal : <?php echo number_format($cekde['d_transaksi_biaya'],0,',','.'); ?></small>
                                            <p class="mb-1"><?php echo $cekproduk['produk_name']; ?></p>
                                            <p><?php echo number_format($prcdetail,0,',','.'); ?> x <?php echo $cekde['d_transaksi_qty']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php endforeach; ?>
                                    <?php if(!$trx['transaksi_bukti']) { ?>
                                        <small class="text-danger">* Silahkan upload bukti pembayaran anda dengan mengklik tanda <i class="material-icons">keyboard_arrow_right</i> atau <i class="material-icons">file_upload</i></small>
                                    <?php } ?>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-1">Rp. <?php echo number_format($trx['transaksi_total'],0,',','.'); ?></h6>
                                            <p class="small text-mute">Termasuk ongkir (Rp. <?php echo number_format($trx['transaksi_ongkir'],0,',','.'); ?>)</p>
                                        </div>
                                        <div class="col-auto">
                                            <?php if(!$trx['transaksi_bukti']) { ?>
                                            <a href="user/upload-bukti/<?php echo $trx['transaksi_id']; ?>" class="btn btn-default btn-40 text-white"><i class="material-icons">file_upload</i></a>
                                            <?php }else { ?>
                                            <?php $cekreview = $this->db->get_where('tb_reviews',['re_produkid' => $cekproduk['produk_id'], 're_transaksi' => $trx['transaksi_id']])->result_array(); ?>
                                            <?php if($cekreview) { ?>
                                            <?php }else { ?>
                                            <a href="user/beri-penilaian/<?php echo $trx['transaksi_id']; ?>" class="btn btn-warning btn-40 ml-2 text-white"><i class="material-icons">star</i></a>
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- page content ends -->
        </div>

    </div>
    <?php foreach($transaksi->result_array() as $trx): ?>
    <div class="modal fade" id="trx<?php echo $trx['transaksi_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ID <?php echo $trx['transaksi_kode']; ?></h5>
      </div>
      <div class="modal-body">
        <h6><b>Informasi penerima</b></h6>
        Nama : <?php echo $trx['transaksi_penerima']; ?> <br>
        HP/TELP : <?php echo $trx['transaksi_telp']; ?> <br>
        Tujuan : <?php echo $trx['transaksi_tujuan']; ?> <?php echo $trx['transaksi_pos']; ?> <br><br>
        <h6><b>Informasi pengiriman</b></h6>
        Kurir : <?php echo strtoupper($trx['transaksi_kurir']); ?> <br>
        Layanan : <?php echo $trx['transaksi_service']; ?> <br>
        Ongkir : <?php echo number_format($trx['transaksi_ongkir'],0,',','.'); ?>,- <br><br>
        <h6><b>Informasi promo</b></h6>
        Kode promo : <?php echo strtoupper($trx['transaksi_kode_promo']); ?> <br>
        Promo (%) : <?php echo $trx['transaksi_persen_promo']; ?>% <br>
        Potongan : <?php echo number_format($trx['transaksi_total_potongan'],0,',','.'); ?>,- <br><br>
        <h6><b>Catatan pembeli</b></h6>
        <?php echo $trx['transaksi_note']; ?> <br><br>
        <h6><b>Resi</b> (<a href="https://cekresi.com/">Cek Resi</a>)</h6>
        <?php echo $trx['transaksi_resi']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php $this->load->view('mobile/foot'); ?>