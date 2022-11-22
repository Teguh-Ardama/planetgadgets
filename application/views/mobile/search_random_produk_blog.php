<div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab">
    <form action="cari" method="post">
        <div class="row">
            <div class="container">
                <div class="form-group float-label position-relative">
                    <input type="text" class="form-control" name="key" required="">
                    <label class="form-control-label">Cari sesuatu</label>
                </div>
            </div>
        </div>
    </form>
    <div class="row my-3">
        <div class="container bg-default-light py-3">
            <!-- Swiper -->
            <div class="swiper-container categories2tab2 text-center">
                <div class="swiper-wrapper">
                    <?php foreach($kategori as $kat): ?>
                    <div class="swiper-slide">
                        <a href="kategori/<?php echo $kat['url']; ?>" class="btn btn-sm btn-white"><?php echo $kat['kategori']; ?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination white-pagination text-left mb-3"></div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="container">
            <div class="row">
                <?php foreach($produkbys as $pb): ?>
                    <?php $beginofd = $pb['produk_price'] * $pb['produk_diskon'] / 100; ?>
                    <?php $afterdiskon = $pb['produk_price'] - $beginofd; ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="h-150px has-background rounded mb-2">
                                <div class="top-right m-2">
                                    <button class="btn btn-sm btn-white btn-rounded"><i class="material-icons">favorite_border</i></button>
                                </div>
                                <div class="bottom-left m-2">
                                    <?php if($pb['produk_diskon']) { ?>
                                    <button class="btn btn-sm btn-warning">Off <?php echo $pb['produk_diskon']; ?>%</button>
                                    <?php }else { ?>
                                    <?php } ?>
                                </div>
                                <a href="p/<?php echo $pb['produk_id']; ?>/<?php echo $pb['url']; ?>/<?php echo $pb['produk_url']; ?>" class="background">
                                    <img src="wp-content/img/product/<?php echo $pb['produk_image']; ?>" alt="<?php echo $pb['produk_image']; ?>">
                                </a>
                            </div>
                            <div class="component-products">
                                <div class="products-text">
                                    <small class="text-mute"><?php echo $pb['kategori']; ?></small>
                                    <a href="p/<?php echo $pb['produk_id']; ?>/<?php echo $pb['url']; ?>/<?php echo $pb['produk_url']; ?>">
                                        <p class="mb-0"><?php echo word_limiter($pb['produk_name'],3); ?></p>
                                    </a>
                                </div>
                                <div class="products-price">
                                    <?php if($pb['produk_diskon']) { ?>
                                    <p class="small">Rp. <del><?php echo number_format($pb['produk_price'],0,',','.'); ?>,-</del> <?php echo number_format($afterdiskon,0,',','.'); ?>,-</p>
                                    <?php }else { ?>
                                    <p class="small">Rp. <?php echo number_format($pb['produk_price'],0,',','.'); ?>,-</p>
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
    <div class="row text-center my-3">
        <div class="col-6 mx-auto">
            <a href="produk" class="btn btn-sm btn-light btn-block">Tampilkan semua</a>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <h5 class="page-title">Blog</h5>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <?php foreach($dataartikel as $da): ?>
            <div class="media my-3 w-100">
                <div class="avatar avatar-80 mr-3 has-background rounded">
                    <figure class="background">
                        <a href="blog/<?php echo $da['blog_url'] ?>"><img src="wp-content/img/blog/<?php echo $da['blog_gambar']; ?>" class="" alt="<?php echo $da['blog_gambar']; ?>"></a>
                    </figure>
                </div>
                <div class="media-body">
                    <small class="text-mute"><?php echo date('d-m-Y', strtotime($da['blog_tgl'])); ?> | <?php echo date('H:i', strtotime($da['blog_tgl'])); ?></small>
                    <a href="blog/<?php echo $da['blog_url'] ?>"><p class="mb-1"><?php echo $da['blog_judul']; ?></p></a>
                    <p class="small text-mute">Published by Admin</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>