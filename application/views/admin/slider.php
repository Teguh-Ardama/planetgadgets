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
                                <a href="admin/master/slider/new" class="btn btn-primary btn-sm float-right">New data</a>
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
                                                <th>Teks 1</th>
                                                <th>Teks 2</th>
                                                <th>Teks 3</th>
                                                <th>Link</th>
                                                <th>Foto</th>
                                                <th>Urutan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($slider as $pro): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo $pro['slider_text_1']; ?></td>
                                                    <td><?php echo $pro['slider_text_2']; ?></td>
                                                    <td><?php echo $pro['slider_text_3']; ?></td>
                                                    <td><?php echo $pro['slider_link']; ?></td>
                                                    <td><img src="wp-content/img/slider/<?php echo $pro['slider_gambar']; ?>" width="40" alt="<?php echo $pro['slider_gambar']; ?>"></td>
                                                    <td><?php echo $pro['slider_urutan']; ?></td>
                                                    <td>
                                                      <a href="admin/master/slider/edit/<?php echo $pro['slider_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                      <a href="admin/master/slider/hapus/<?php echo $pro['slider_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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