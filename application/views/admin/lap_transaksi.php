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
                                        <?php if($awal == '' AND $akhir == '') { ?>
                                            <a href="admin/laporan/transaksi/print" target="_blank" class="btn btn-primary btn-sm float-right"><i class="fa fa-print"></i></a>
                                            <a href="admin/laporan/transaksi/pdf" class="btn btn-danger btn-sm float-right mr-1"><i class="fa fa-file-pdf-o"></i></a>
                                            <a href="admin/laporan/transaksi/excel" class="btn btn-warning btn-sm float-right mr-1"><i class="fa fa-file-excel-o"></i></a>
                                        <?php }else { ?>
                                            <a href="admin/laporan/transaksi/print/<?php echo $awal; ?>/<?php echo $akhir; ?>" target="_blank" class="btn btn-primary btn-sm float-right"><i class="fa fa-print"></i></a>
                                            <a href="admin/laporan/transaksi/pdf/<?php echo $awal; ?>/<?php echo $akhir; ?>" class="btn btn-danger btn-sm float-right mr-1"><i class="fa fa-file-pdf-o"></i></a>
                                            <a href="admin/laporan/transaksi/excel/<?php echo $awal; ?>/<?php echo $akhir; ?>" class="btn btn-warning btn-sm float-right mr-1"><i class="fa fa-file-excel-o"></i></a>
                                        <?php } ?>
                                        <button type="button" class="btn btn-success btn-sm float-right mr-1" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i></button>
                                    </div>
                                </div>
                                <div class="collapse mt-1" id="collapseExample">
                                  <div class="card card-body">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label>Dari</label>
                                                <input type="date" class="form-control form-control-sm" name="start" value="<?php echo $awal; ?>" required="">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Sampai</label>
                                                <input type="date" class="form-control form-control-sm" name="end" value="<?php echo $akhir; ?>" required="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label></label><br>
                                                <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </form>
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
                                                <th>Tgl</th>
                                                <th>Kode</th>
                                                <th>Dari</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($transaksi as $pro): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></td>
                                                    <td><?php echo $pro['transaksi_kode']; ?></td>
                                                    <td><?php echo $pro['user_nama']; ?></td>
                                                    <td><?php echo number_format($pro['transaksi_total'],0,',','.'); ?></td>
                                                    <td>
                                                        <?php if($pro['transaksi_status'] == 'belum') { ?>
                                                            <span class="label label-warning">Belum</span>
                                                        <?php }else if($pro['transaksi_status'] == 'dibayar') { ?>
                                                            <span class="label label-primary">Dibayar</span>
                                                        <?php }else { ?>
                                                            <span class="label label-success">Diproses</span>
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