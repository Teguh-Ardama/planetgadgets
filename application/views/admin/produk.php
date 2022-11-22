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
                                <a href="admin/master/produk/new" class="btn btn-primary btn-sm float-right">New data</a>
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
                                                <th>Nama Item</th>
                                                <th>Harga</th>
                                                <!-- <th>Stok</th> -->
                                                <!-- <th>Diskon</th> -->
                                                <th>Foto</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($produk as $pro): ?>
                                                <?php if($pro['produk_diskon']) { ?>
                                                    <tr style="background-color: #ccf2ff;">
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $pro['produk_name']; ?></td>
                                                        <td><?php echo number_format($pro['produk_price'],0,',','.'); ?></td>
                                                        <!-- <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td> -->
                                                        <!-- <td><?php echo $pro['produk_stok']; ?></td> -->
                                                        <!-- <td><?php echo $pro['produk_diskon']; ?> %</td> -->
                                                        <td><img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_image']; ?>"></td>
                                                        <td>
                                                          <a href="admin/master/produk/edit/<?php echo $pro['produk_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                          <a href="admin/master/produk/hapus/<?php echo $pro['produk_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                          <a href="admin/master/produk/image/<?php echo $pro['produk_id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-image"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }else { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $pro['produk_name']; ?></td>
                                                        <td><?php echo number_format($pro['produk_price'],0,',','.'); ?></td>
                                                        <!-- <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td> -->
                                                        <!-- <td><?php echo $pro['produk_stok']; ?></td> -->
                                                        <!-- <td><?php echo $pro['produk_diskon']; ?> %</td> -->
                                                        <td><img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_image']; ?>"></td>
                                                        <td>
                                                          <a href="admin/master/produk/edit/<?php echo $pro['produk_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                          <a href="admin/master/produk/hapus/<?php echo $pro['produk_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                          <a href="admin/master/produk/image/<?php echo $pro['produk_id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-image"></i></a>
                                                        </td>
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