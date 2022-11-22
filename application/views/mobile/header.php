<header class="header">
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
        <div class="col-auto">
            <a href="user/wishlist" class="btn btn-link"><i class="material-icons">favorite_border</i></a>
            <?php if($this->session->userdata('userid')) { ?>
                <?php if($notifikasi) { ?>
            <a href="user/notifikasi" class="btn btn-link">
                <i class="material-icons">notifications_none</i>
                <span class="notification-point"></span>
            </a>
            <?php }else { ?>
                <a href="user/notifikasi" class="btn btn-link">
                    <i class="material-icons">notifications_none</i>
                </a>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</header>