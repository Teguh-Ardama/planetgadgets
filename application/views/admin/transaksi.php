<div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        
                    <!-- Page-body start -->
                    <div class="page-body">
                        
                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="card-block table-border-style">
                                <?php if($this->session->flashdata('flash')): ?>
                                <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('flash'); ?></div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tgl</th>
                                                <th>Kode</th>
                                                <th>Dari</th>
                                                <th>Total</th>
                                                <th>Tujuan</th>
                                                <th>Bukti</th>
                                                <th>Status</th>
                                                <th>Konfirmasi</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($transaksi as $pro): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo date('d-m-Y H:i', strtotime($pro['transaksi_time'])); ?></td>
                                                    <td><?php echo $pro['transaksi_kode']; ?></td>
                                                    <td><?php echo $pro['user_nama']; ?></td>
                                                    <td><?php echo number_format($pro['transaksi_total'],0,',','.'); ?></td>
                                                    <td><?php echo $pro['transaksi_tujuan']; ?></td>
                                                    <td><a target="_blank" href="wp-admin/images/bukti/<?php echo $pro['transaksi_bukti']; ?>"><img src="wp-admin/images/bukti/<?php echo $pro['transaksi_bukti']; ?>" alt="<?php echo $pro['transaksi_bukti']; ?>" width="50"></a></td>
                                                    <td>
                                                        <?php if($pro['transaksi_status'] == 'belum') { ?>
                                                            <span class="label label-warning">Belum</span>
                                                        <?php }else if($pro['transaksi_status'] == 'dibayar') { ?>
                                                            <span class="label label-primary">Dibayar</span>
                                                        <?php }else { ?>
                                                            <span class="label label-success">Diproses</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($pro['transaksi_status'] == 'belum') { ?>
                                                            <a href="admin/transaksi/ok/<?php echo $pro['transaksi_id']; ?>" title="Klik untuk mengkonfirmasi" class="btn btn-warning btn-sm"><i class="ti-reload"></i></a>
                                                        <?php }else if($pro['transaksi_status'] == 'dibayar') { ?>
                                                            <a href="admin/transaksi/proses/<?php echo $pro['transaksi_id']; ?>" title="Klik untuk memproses" class="btn btn-primary btn-sm"><i class="ti-reload"></i></a>
                                                        <?php }else { ?>
                                                            <button class="btn btn-success btn-sm"><i class="ti-check-box"></i></button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="admin/transaksi/show/<?php echo $pro['transaksi_id']; ?>" class="btn btn-info btn-sm"><i class="ti-zoom-in"></i></a>
                                                    </td>
                                                </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Hover table card end -->
                        
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