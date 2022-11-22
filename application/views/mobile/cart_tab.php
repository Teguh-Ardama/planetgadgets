<div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart-tab">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="page-title">Keranjang Belanja</h5>
                </div>
                <div class="col-auto align-self-end">
                    <h5 class="page-title small text-success">Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?>,-</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <?php foreach($keranjang as $krj): ?>
            <div class="media my-3 w-100">
                <div class="avatar avatar-60 mr-3 has-background rounded">
                    <a href="#" class="background">
                        <img src="wp-content/img/product/<?php echo $krj['image']; ?>" class="" alt="<?php echo $krj['image']; ?>">
                    </a>
                </div>
                <div class="media-body">
                    <small class="text-mute"><?php echo number_format($krj['subtotal'],0,',','.'); ?></small>
                    <a class="text-primary">
                        <p class="mb-1"><?php echo $krj['name']; ?></p>
                    </a>
                    <p><span class="text-success"><?php echo $krj['qty']; ?> x <?php echo number_format($krj['price'],0,',','.'); ?></span></p>
                </div>
                <div class="align-self-center">
                    <a class="btn btn-outline-secondary" href="cart/delete/<?php echo $krj['rowid']; ?>"><i class="material-icons">delete</i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($keranjang) { ?>
        <form action="applypromo-kode" method="post">
        <?php if($this->session->flashdata('errorkodepromo')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('errorkodepromo'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('flashkodepromo')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('flashkodepromo'); ?></div>
        <?php endif; ?>
    <div class="row my-3">
            <div class="container">
                <div class="form-group float-label position-relative active mb-0">
                    <div class="bottom-right mb-1">
                        <button type="submit" class="btn btn-sm btn-success">Apply</button>
                    </div>
                    <input type="text" class="form-control" name="kodepromo" required="">
                    <label class="form-control-label">Masukan kode promo jika ada</label>
                </div>
            </div>
    </div>
        </form>
    <?php if($this->session->userdata('kodepromo')) { ?>
    <div class="row my-3">
        <div class="container">
            <div class="card alert-success">
                <div class="card-body p-1">
                    <div class="media">
                        <div class="icon icon-50 bg-white text-success mr-2"><i class="material-icons">local_offer</i></div>
                        <div class="media-inner">
                            <h5 class="mb-0 font-weight-normal">
                                <b><?php echo $this->session->userdata('potonganprc'); ?>%</b> <?php echo $this->session->userdata('potongantitle'); ?><br>
                                <small class="text-mute">Anda mendapat potongan <b><?php echo number_format($this->session->userdata('potongan'),0,',','.'); ?>,-</b></small>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }else { ?>
    <?php } ?>
    <?php }else { ?>
    <?php } ?>
    <?php if($keranjang) { ?>
    <div class="row my-3">
        <div class="container">
            <div class="row my-3 h6 font-weight-normal">
                <div class="col">Total</div>
                <div class="col text-right text-mute">Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?>,-</div>
            </div>
            <?php if($this->session->userdata('kodepromo')) { ?>
                <div class="row my-3 h6 font-weight-normal">
                    <div class="col">Potongan</div>
                    <div class="col text-right text-mute">- <?php echo number_format($this->session->userdata('potongan'),0,',','.'); ?>,-</div>
                </div>
                <hr>
                <div class="row h6 font-weight-bold">
                    <div class="col">Harus di bayar <br><small class="text-danger"><i>Belum termasuk ongkir</i></small></div>
                    <div class="col text-right text-mute">Rp. <?php echo number_format($this->session->userdata('dibayar'),0,',','.'); ?>,-</div>
                </div>
            <?php }else { ?>
            <hr>
            <div class="row h6 font-weight-bold">
                <div class="col">Harus di bayar</div>
                <div class="col text-right text-mute">Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?>,-</div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="row my-3">
        <div class="container">
            <button type="submit" class="btn btn-lg btn-default btn-block my-4" onclick="konfirmasi()"> Checkout </button>
        </div>
    </div>
    <?php }else { ?>
        <img src="wp-content/img/kosong.jpg" alt="kosong.jpg" class="img-fluid rounded mx-auto d-block">
    <?php } ?>
</div>
<script>
    function konfirmasi() {
    var yakin = confirm("Apakah kamu yakin akan melanjutkan checkout?");
    if (yakin) {
        window.location = "checkout";
    } else {
    }
}
</script>