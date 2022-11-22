<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <?php $row = $dtransaksi->row_array(); ?>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>#<?php echo $row['transaksi_kode']; ?></h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <b>Informasi Penerima :</b> <br>
                                            Tanggal : <?php echo date('d-m-Y H:i', strtotime($row['transaksi_time'])); ?> <br>
                                            Nama    : <?php echo $row['transaksi_penerima']; ?> <br>
                                            Telepon : <?php echo $row['transaksi_telp']; ?> <br>
                                            Alamat  : <?php echo $row['transaksi_tujuan']; ?> <br>
                                            Note    : <?php echo $row['transaksi_note']; ?> <br>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <b>Informasi Pengiriman :</b> <br>
                                            Kurir   : <?php echo strtoupper($row['transaksi_kurir']); ?> <br>
                                            Layanan : <?php echo $row['transaksi_service']; ?> <br>
                                            Ongkir  : <?php echo number_format($row['transaksi_ongkir'],0,',','.'); ?>,- <br>
                                            Tujuan  : <?php echo $row['transaksi_kota']; ?>, <?php echo $row['transaksi_prov']; ?>, <?php echo $row['transaksi_pos']; ?> <br>
                                        </div>
                                    </div>
                                    <div class="table table-responsive mt-2">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total = 0; ?>
                                                <?php foreach($dtransaksi->result_array() as $dt): ?>
                                                    <?php $hargaasli = $dt['d_transaksi_biaya'] / $dt['d_transaksi_qty'];  ?>
                                                    <?php $total += $dt['d_transaksi_biaya']; ?>
                                                    <tr>
                                                        <td><?php echo $dt['produk_name']; ?></td>
                                                        <td><?php echo $dt['d_transaksi_qty']; ?></td>
                                                        <td><?php echo number_format($hargaasli,0,',','.'); ?></td>
                                                        <td><?php echo number_format($dt['d_transaksi_biaya'],0,',','.'); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <th colspan="3">Total</th>
                                                    <th><?php echo number_format($total,0,',','.'); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Ongkir</th>
                                                    <th><?php echo number_format($row['transaksi_ongkir'],0,',','.'); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Potongan (promo)</th>
                                                    <th>- <?php echo number_format($row['transaksi_total_potongan'],0,',','.'); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Dibayar</th>
                                                    <th><?php echo number_format($row['transaksi_total'],0,',','.'); ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-4">
                                            <h6>Input Resi</h6>
                                            <input type="text" class="form-control" id="resi" name="resi" value="<?php echo $row['transaksi_resi']; ?>" autofocus="">
                                            <small class="text-danger"><?php echo form_error('resi'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
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
        </div>
    </div>
</div>