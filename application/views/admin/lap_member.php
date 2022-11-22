
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
                                        <a href="admin/laporan/member/print" target="_blank" class="btn btn-primary btn-sm float-right"><i class="fa fa-print"></i></a>
                                        <a href="admin/laporan/member/pdf" class="btn btn-danger btn-sm float-right mr-1"><i class="fa fa-file-pdf-o"></i></a>
                                        <a href="admin/laporan/member/excel" class="btn btn-warning btn-sm float-right mr-1"><i class="fa fa-file-excel-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-header">
                                <div class="collapse" id="collapseExample">
                                  <div class="card card-body">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                  </div>
                                </div>
                            </div> -->
                            <div class="card-block table-border-style">
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