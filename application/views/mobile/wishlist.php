<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded">
    <?php $this->load->view('mobile/load'); ?>

    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>
    <?php $this->load->view('mobile/side_nav'); ?>
    <div class="main-container">
        <?php $this->load->view('mobile/header'); ?>
        <div class="content container-fluid">
            <!-- page content start -->
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h5 class="page-title"><?php echo $title; ?></h5>
                                </div>
                                <div class="col-auto align-self-end">
                                    <ul class="nav nav-pills tabs-small" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="listview-tab" data-toggle="tab" href="#listview" role="tab" aria-controls="listview" aria-selected="false"><i class="material-icons">view_list</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="thumbnails-tab" data-toggle="tab" href="#thumbnails" role="tab" aria-controls="thumbnails" aria-selected="true"><i class="material-icons">view_module</i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="tabproductd">
                        <div class="tab-pane fade" id="listview" role="tabpanel" aria-labelledby="listview-tab">
                            <div class="row">
                                <div class="container">
                                    <?php foreach($wishlist as $wis): ?>
                                    <div class="media my-3 w-100">
                                        <div class="avatar avatar-60 mr-3 has-background rounded">
                                            <figure class="background">
                                                <img src="wp-content/img/product/<?php echo $wis['produk_image']; ?>" class="" alt="<?php echo $wis['produk_image']; ?>">
                                            </figure>
                                        </div>
                                        <div class="media-body">
                                            <small class="text-mute">Diskon <?php echo $wis['produk_diskon']; ?>%</small>
                                            <p class="mb-1"><?php echo word_limiter($wis['produk_name'],3); ?></p>
                                            <?php if($wis['produk_diskon']) { ?>
                                            <p class="small">Rp. <del><?php echo number_format($wis['produk_price'],0,',','.'); ?>,-</del> <?php echo number_format($wis['produk_price_diskon'],0,',','.'); ?>,-</p>
                                            <?php }else { ?>
                                            <p class="small">Rp. <?php echo number_format($wis['produk_price_diskon'],0,',','.'); ?>,-</p>
                                            <?php } ?>
                                        </div>
                                        <div class="align-self-center">
                                            <a href="wishlist/hapus/<?php echo $wis['list_id']; ?>" class="btn btn-white text-danger btn-rounded btn-40"><i class="material-icons ">delete</i></a>
                                            <a href="cart/add/<?php echo $wis['produk_id']; ?>" class="btn btn-white text-primary btn-rounded btn-40"><i class="material-icons ">local_mall</i></a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="thumbnails" role="tabpanel" aria-labelledby="thumbnails-tab">
                            <div class="row my-3">
                                <div class="container">
                                    <div class="row">
                                        <?php foreach($wishlist as $wis): ?>
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="card border-0 mb-4">
                                                <div class="card-body p-0">
                                                    <div class="h-150px has-background rounded mb-2">
                                                        <div class="top-right m-2">
                                                            <a href="cart/add/<?php echo $wis['produk_id']; ?>" class="btn btn-sm btn-white btn-rounded text-primary"><i class="material-icons ">local_mall</i></a>
                                                        </div>
                                                        <div class="bottom-left m-2">
                                                            <?php if($wis['produk_diskon']) { ?>
                                                            <button class="btn btn-sm btn-warning">Off <?php echo $wis['produk_diskon']; ?>%</button>
                                                            <?php }else { ?>
                                                            <?php } ?>
                                                        </div>
                                                        <a href="p/<?php echo $wis['produk_id']; ?>/<?php echo $wis['url']; ?>/<?php echo $wis['produk_url']; ?>">
                                                        <figure class="background" style="background-image: url(wp-content/img/product/<?php echo $wis['produk_image']; ?>);">
                                                            
                                                                <img src="wp-content/img/product/<?php echo $wis['produk_image']; ?>" alt="<?php echo $wis['produk_image']; ?>" style="display: none;">
                                                        </figure>
                                                        </a>
                                                    </div>
                                                    <div class="component-products">
                                                        <div class="products-text">
                                                            <small class="text-mute"><?php echo $wis['kategori']; ?></small>
                                                            <a href="p/<?php echo $wis['produk_id']; ?>/<?php echo $wis['url']; ?>/<?php echo $wis['produk_url']; ?>">
                                                                <p class="mb-0"><?php echo word_limiter($wis['produk_name'],3); ?></p>
                                                            </a>
                                                        </div>
                                                        <div class="products-price">
                                                            <?php if($wis['produk_diskon']) { ?>
                                                            <p class="small">Rp. <del><?php echo number_format($wis['produk_price'],0,',','.'); ?>,-</del> <?php echo number_format($wis['produk_price_diskon'],0,',','.'); ?>,-</p>
                                                            <?php }else { ?>
                                                            <p class="small">Rp. <?php echo number_format($wis['produk_price_diskon'],0,',','.'); ?>,-</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page content ends -->
        </div>

    </div>
<?php $this->load->view('mobile/foot'); ?>