<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded" data-page="homepage">
    <?php $this->load->view('mobile/load'); ?>

    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>

    <!-- sidebar left -->
    <?php $this->load->view('mobile/side_nav'); ?>
    <!-- sidebar left -->

    <!-- main container -->
    <div class="main-container">
        <?php $this->load->view('mobile/header'); ?>
        <div class="content container-fluid">
            <!-- page content start -->

            <div class="tab-content" id="maintabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row my-3">
                        <div class="container">
                            <div class="row">
                                <?php foreach($produk as $pro): ?>
                                    <?php $cekwis = $this->db->get_where('tb_wishlist',['list_proid' => $pro['produk_id'], 'list_userid' => $this->session->userdata('userid')])->row_array(); ?>
                                    <?php $beginofd = $pro['produk_price'] * $pro['produk_diskon'] / 100; ?>
                                    <?php $afterdiskon = $pro['produk_price'] - $beginofd; ?>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="card border-0 mb-4">
                                            <div class="card-body p-0">
                                                <div class="h-150px has-background rounded mb-2">
                                                    <div class="top-right m-2">
                                                        <?php if($cekwis) { ?>
                                                        <a class="btn btn-sm btn-white text-danger btn-rounded"><i class="material-icons">favorite</i></a>
                                                        <?php }else { ?>
                                                        <a href="wishlist/<?php echo $pro['produk_id']; ?>" class="btn btn-sm btn-white btn-rounded"><i class="material-icons">favorite_border</i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="bottom-left m-2">
                                                        <?php if($pro['produk_diskon']) { ?>
                                                        <button class="btn btn-sm btn-warning">Off <?php echo $pro['produk_diskon']; ?>%</button>
                                                        <?php }else { ?>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>" class="background">
                                                        <img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" alt="<?php echo $pro['produk_image']; ?>">
                                                    </a>
                                                </div>
                                                <div class="component-products">
                                                    <div class="products-text">
                                                        <small class="text-mute ml-2"><?php echo $pro['kategori']; ?></small>
                                                        <a href="p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>">
                                                            <p class="ml-2"><?php echo word_limiter($pro['produk_name'],3); ?></p>
                                                        </a>
                                                    </div>
                                                    <div class="products-price">
                                                        <?php if($pro['produk_diskon']) { ?>
                                                        <p class="small ml-2">Rp. <del><?php echo number_format($pro['produk_price'],0,',','.'); ?>,-</del> <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?>,-</p>
                                                        <?php }else { ?>
                                                        <p class="small ml-2">Rp. <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?>,-</p>
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
                <?php $this->load->view('mobile/search_random_produk_blog'); ?>
                <?php $this->load->view('mobile/cart_tab'); ?>
                <div class="tab-pane fade" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h5 class="page-title">Wishlist</h5>
                                </div>
                                <?php if($this->session->userdata('userid')) { ?>
                                    <?php $this->load->view('mobile/wl_tab'); ?>
                                <?php }else { ?>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="container">
                                <div class="card alert-danger">
                                    <div class="card-body p-1">
                                        <div class="media">
                                            <div class="icon icon-50 bg-danger text-white mr-2"><i class="material-icons">account_circle</i></div>
                                            <div class="media-inner">
                                                <h5 class="mb-0 font-weight-normal">
                                                    Anda belum login<br>
                                                    <small class="text-mute">Silahkan login <a href="login">DISINI</a></small>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php } ?>
                <?php $this->load->view('mobile/profil_tab'); ?>
            </div>

            <!-- page content ends -->
        </div>
        <?php $this->load->view('mobile/navigasi_bawah'); ?>
    </div>
    <!-- main container -->

    <!-- sidebar right -->
    <?php $this->load->view('mobile/filter'); ?>
    <!-- sidebar right -->

    <!-- scroll to top button -->
    <button type="button" class="btn btn-default shadow scrollup bottom-right position-fixed btn-40"><i class="material-icons">expand_less</i></button>
    <!-- scroll to top button ends-->
<?php $this->load->view('mobile/foot'); ?>