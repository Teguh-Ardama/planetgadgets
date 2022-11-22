
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- order-card start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Transaksi</h6>
                                    <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span><?php echo $totaltrx; ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Produk</h6>
                                    <h2 class="text-right"><i class="ti-tag f-left"></i><span><?php echo $totalproduk; ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Pelanggan</h6>
                                    <h2 class="text-right"><i class="ti-user f-left"></i><span><?php echo $totaluser; ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Profit</h6>
                                    <h2 class="text-right"><i class="ti-wallet f-left"></i><span><?php echo number_format($profit,0,',','.') ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- order-card end -->

                        <!-- statustic and process start -->
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Statistik transaksi</h5>
                                </div>
                                <div class="card-block">
                                    <div id="graph" height="200"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Status Transaksi</h5>
                                </div>
                                <div class="card-block">
                                    <canvas id="myChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- statustic and process end -->
                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block p-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#trx" role="tab"><i class="fa fa-shopping-cart"></i>Transaksi</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-money"></i>Terlaris</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-edit"></i>Registrasi terakhir</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="trx" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal</th>
                                                        <th>Tujuan</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    <?php foreach($transaksi as $pro): ?>
                                                    <tr>
                                                        <td><?php echo $pro['transaksi_kode']; ?></td>
                                                        <td><?php echo $pro['user_nama']; ?></td>
                                                        <td><?php echo date('d-m-Y H:i', strtotime($pro['transaksi_time'])); ?></td>
                                                        <td><?php echo $pro['transaksi_tujuan']; ?></td>
                                                        <td>
                                                            <?php if($pro['transaksi_status'] == 'belum') { ?>
                                                                <span class="label label-warning">Belum</span>
                                                            <?php }else { ?>
                                                                <span class="label label-success">Diproses</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <a href="admin/transaksi" class="btn btn-outline-primary btn-round btn-sm">Lainnya</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Foto</th>
                                                        <th>Nama</th>
                                                        <th>Harga</th>
                                                        <th>Terjual</th>
                                                    </tr>
                                                    <?php foreach($prolar as $pl): ?>
                                                    <tr>
                                                        <td><img src="wp-content/img/product/<?php echo $pl['fotoproduk']; ?>" alt="prod img" width="50" class="img-circle"></td>
                                                        <td><?php echo $pl['namaproduk']; ?></td>
                                                        <td><?php echo number_format($pl['diskonproduk'],0,',','.'); ?></td>
                                                        <td><span class="label label-success"><?php echo $pl['jumlah'] ?></span></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="messages3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Telp/HP</th>
                                                        <th>Status</th>
                                                        <th>Registrasi</th>
                                                    </tr>
                                                    <?php foreach($listmember as $pro): ?>
                                                        <tr>
                                                            <td><?php echo $pro['user_nama']; ?></td>
                                                            <td><?php echo $pro['user_email']; ?></td>
                                                            <td><?php echo $pro['user_telp']; ?></td>
                                                            <td>
                                                                <?php if($pro['user_status'] == 0) { ?>
                                                                <span class="label label-warning">Belum Aktif</span>
                                                                <?php }elseif($pro['user_status'] == 1) { ?>
                                                                <span class="label label-success">Aktif</span>
                                                                <?php }else { ?>
                                                                <span class="label label-danger">Terblokir</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo waktu_lalu($pro['user_created']); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <a href="admin/member" class="btn btn-outline-primary btn-round btn-sm">Lihat semua</a>
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
    </div>
</div>