
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
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telp/HP</th>
                                                <th>Status</th>
                                                <th>Tgl Registrasi</th>
                                                <th>Member Sejak</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($member as $pro): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo $pro['user_nama']; ?></td>
                                                    <td><?php echo $pro['user_email']; ?></td>
                                                    <td><?php echo $pro['user_telp']; ?></td>
                                                    <td>
                                                      <?php if($pro['user_status'] == 0) { ?>
                                                        Belum Aktif
                                                      <?php }elseif($pro['user_status'] == 1) { ?>
                                                        Aktif
                                                      <?php }else { ?>
                                                        Terblokir
                                                      <?php } ?>
                                                    </td>
                                                    <td><?php echo date('d-m-Y H:i:s', strtotime($pro['user_created'])); ?></td>
                                                    <td><?php echo waktu_lalu($pro['user_created']); ?></td>
                                                    <td>
                                                        <?php if($pro['user_status'] == 0) { ?>
                                                            Belum Aktif
                                                        <?php }else if($pro['user_status'] == 1) { ?>
                                                            <a href="admin/member/blokir/<?php echo $pro['user_id']; ?>" class="btn btn-danger btn-sm">Blokir</a>
                                                        <?php }else { ?>
                                                            <a href="admin/member/aktifkan/<?php echo $pro['user_id']; ?>" class="btn btn-primary btn-sm">Aktifkan</a>
                                                        <?php } ?>
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