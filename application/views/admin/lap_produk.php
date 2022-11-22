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
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5><?php echo $title; ?></h5>
                                    </div>
                                    <div class="col-md-9">
                                        <a href="admin/laporan/produk/print" target="_blank" class="btn btn-primary btn-sm float-right"><i class="fa fa-print"></i></a>
                                        <a href="admin/laporan/produk/pdf" class="btn btn-danger btn-sm float-right mr-1"><i class="fa fa-file-pdf-o"></i></a>
                                        <a href="admin/laporan/produk/excel" class="btn btn-warning btn-sm float-right mr-1"><i class="fa fa-file-excel-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Item</th>
                                                <th>Harga/Harga Diskon</th>
                                                <th>Stok</th>
                                                <th>Diskon</th>
                                                <th>Foto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($produk as $pro): ?>
                                                <?php if($pro['produk_diskon']) { ?>
                                                    <tr style="background-color: #ccf2ff;">
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $pro['produk_name']; ?></td>
                                                        <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td>
                                                        <td><?php echo $pro['produk_stok']; ?></td>
                                                        <td><?php echo $pro['produk_diskon']; ?> %</td>
                                                        <td><img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_image']; ?>"></td>
                                                    </tr>
                                                <?php }else { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $pro['produk_name']; ?></td>
                                                        <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td>
                                                        <td><?php echo $pro['produk_stok']; ?></td>
                                                        <td><?php echo $pro['produk_diskon']; ?> %</td>
                                                        <td><img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_image']; ?>"></td>
                                                    </tr>
                                                <?php } ?>
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