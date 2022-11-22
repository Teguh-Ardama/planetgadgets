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
                                                <th>Dari</th>
                                                <th>Produk</th>
                                                <th>Ulasan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($komentar as $pro): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo date('d-m-Y H:i', strtotime($pro['re_time'])); ?></td>
                                                    <td><?php echo $pro['user_nama']; ?></td>
                                                    <td><?php echo $pro['produk_name']; ?></td>
                                                    <td><?php echo $pro['re_isi']; ?></td>
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