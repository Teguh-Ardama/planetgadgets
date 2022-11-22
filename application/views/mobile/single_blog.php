<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded" data-page="productpage">
    <?php $this->load->view('mobile/load'); ?>

    <div class="background reveal-background">
        <img src="wp-content/img/bg-login.svg" alt="">
    </div>
    <div class="main-container">
        <div class="container">
            <br>
            <div class="row no-gutters">
                <div class="col-auto">
                    <?php if($this->uri->segment(1) == 'p' OR $this->uri->segment(1) == 'checkout' OR $this->uri->segment(3) == 'profil' OR $this->uri->segment(3) == 'password' OR $this->uri->segment(1) == 'metode-pembayaran' OR $this->uri->segment(2) == 'upload-bukti' OR $this->uri->segment(2) == 'beri-penilaian' OR $this->uri->segment(1) == 'kategori' OR $this->uri->segment(1) == 'blog') { ?>
                    <button class="btn btn-link backbtn"><i class="material-icons">arrow_back</i></button>
                    <?php }else if($this->uri->segment(1) == 'pc') { ?>
                    <button class="btn btn-link" onclick="javascript:history.go(-2)"><i class="material-icons">arrow_back</i></button>
                    <?php }else { ?>
                        <button class="btn btn-link menu-btn-left"><i class="material-icons">menu</i></button>
                    <?php } ?>
                </div>
                <div class="col">
                    <div class="logo-header">
                        <img src="wp-content/img/Logo-Small-PG.svg" alt="" class="logo-img">
                        <h5 class="logo-header-text"><span class="text-uppercase">Planet Gadgets</span><br><small>Online Shopping</small></h5>
                    </div>
                </div>
            </div>
            <br>
            <!-- Swiper -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="component-products d-block" style="margin-bottom: 20px;">
                            <div class="products-thumbnail">
                                <div class="products-image">
                                    <img class="w-100" src="wp-content/img/blog/<?php echo $detailblog['blog_gambar']; ?>" alt="<?php echo $detailblog['blog_gambar']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container">
                                <h5><?php echo $detailblog['blog_judul']; ?></h5>
                                <p class="text-mute"><?php echo $detailblog['blog_isi']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- scroll to top button -->
<button type="button" class="btn btn-default shadow scrollup bottom-right position-fixed btn-40"><i class="material-icons">expand_less</i></button>
<!-- scroll to top button ends-->
<?php $this->load->view('mobile/foot'); ?>