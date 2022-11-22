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
                                <a href="admin/master/kategori/new" class="btn btn-primary btn-sm float-right">New data</a>
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
                                                <th>Kategori</th>
                                                <th>Url</th>
                                                <th>Foto</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($kategori as $pro): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo $pro['kategori']; ?></td>
                                                    <td><?php echo $pro['url']; ?></td>
                                                    <td><img src="wp-content/img/category/<?php echo $pro['kat_image']; ?>" width="50" alt="<?php echo $pro['kat_image']; ?>"></td>
                                                    <td>
                                                      <a href="admin/master/kategori/edit/<?php echo $pro['id_kategori']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                      <a href="admin/master/kategori/hapus/<?php echo $pro['id_kategori']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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