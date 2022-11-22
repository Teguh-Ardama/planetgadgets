<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded" data-page="productpage">
    <?php $this->load->view('mobile/load'); ?>

    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>
    <div class="main-container">
        <div class="container">
            <?php $this->load->view('mobile/header'); ?>
            <div class="content container-fluid">
                <!-- Main Gallery -->
                <div class="swiper-container gallery-top col-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide has-background">
                            <div class="background" style="border-radius: 10px;">
                                <img class="w-100" src="wp-content/img/product/<?php echo $detail['produk_image']; ?>" alt="<?php echo $detail['produk_image']; ?>">
                            </div>
                        </div>
                        <?php foreach($imglain as $il): ?>
                        <div class="swiper-slide has-background">
                            <div class="background">
                                <img src="wp-content/img/product/<?php echo $il['fr_nama']; ?>" alt="<?php echo $il['fr_nama']; ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next swiper-button-black"></div>
                    <div class="swiper-button-prev swiper-button-black"></div>
                </div>
                <!-- Gallery Thumbs -->
                <div class="swiper-container gallery-thumbs col-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide has-background">
                            <div class="background">
                                <img src="wp-content/img/product/<?php echo $detail['produk_image']; ?>" alt="<?php echo $detail['produk_image']; ?>">
                            </div>
                        </div>
                        <?php foreach($imglain as $il): ?>
                        <div class="swiper-slide has-background">
                            <div class="background">
                                <img src="wp-content/img/product/<?php echo $il['fr_nama']; ?>" alt="<?php echo $il['fr_nama']; ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="container">
                        <p class="text-mute mb-1"><?php echo $detail['kategori']; ?></p>
                        <h5><?php echo $detail['produk_name']; ?></h5>
                        <?php if($detail['produk_diskon']) { ?>
                        <h5 class="text-success">Rp. <del><?php echo number_format($detail['produk_price'],0,',','.'); ?>,-</del> <?php echo number_format($detail['produk_price_diskon'],0,',','.'); ?>,- </h5>
                        <?php }else { ?>
                        <h5 class="text-success">Rp. <?php echo number_format($detail['produk_price_diskon'],0,',','.'); ?>,-</h5>
                        <?php } ?>
                        <hr>
                        <form action="cart/add_cart" method="post">
                            <input type="hidden" name="id" value="<?php echo $detail['produk_id']; ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group cart-count cart-count-lg">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-outline-secondary" onclick="decrement()">-</button>
                                        </div>
                                        <input type="number" class="form-control" id="qty" name="quantity" min="1" max="<?php echo $detail['produk_stok']; ?>" value="1" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="increment()">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-default"><i class="material-icons">local_mall</i> Add to Cart</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <p class="text-mute"><?php echo $detail['produk_description']; ?></p>
                        <br>

                        <h6 class="page-title">Ulasan pembeli</h6>
                        <?php if($ulasan) { ?>
                        <?php foreach($ulasan as $uls): ?>
                            <?php $ceklok = $this->db->get_where('tb_transaksi',['transaksi_userid' => $uls['re_userid']])->row_array(); ?>
                        <div class="card my-3">
                            <div class="card-body border-0">
                                <h6>"<?php echo $uls['re_isi']; ?>"</h6>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <div class="avatar avatar-40 mr-2 has-background">
                                        <figure class="background">
                                            <img src="wp-content/img/<?php echo $uls['user_foto']; ?>" alt="<?php echo $uls['user_foto']; ?>">
                                        </figure>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-1"><?php echo $uls['user_nama']; ?></h6>
                                        <p class="text-mute small">
                                            <?php echo $ceklok['transaksi_kota']; ?>, <?php echo $ceklok['transaksi_prov']; ?> | <span class="text-warning material-icons h6 my-0">star</span> <?php echo $uls['re_bintang']; ?>.0 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php }else { ?>
                            <div class="card my-3">
                                <div class="card-body border-0">
                                    <h6><i>Belum ada ulasan untuk produk ini</i></h6>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- page content ends -->
            </div>
        </div>
    </div>

    <!-- scroll to top button -->
    <button type="button" class="btn btn-default shadow scrollup bottom-right position-fixed btn-40"><i class="material-icons">expand_less</i></button>
    <!-- scroll to top button ends-->
    <?php $this->load->view('mobile/foot'); ?>