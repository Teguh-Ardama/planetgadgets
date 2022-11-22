<?php 
$menu        = strtolower($this->uri->segment(1));
$sub_menu    = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
 ?>
<div class="sidebar sidebar-left overlay-sidebar">
    <?php if($this->session->userdata('userid')) { ?>
        <div class="content">
            <figure class="avatar avatar-100 rounded-circle has-background mx-auto username">
                <div class="background">
                    <img src="wp-content/img/<?php echo $me['user_foto']; ?>" alt="<?php echo $me['user_foto']; ?>">
                </div>
            </figure>
            <h5 class="text-center mb-0 username-text"><?php echo $me['user_nama']; ?></h5>
            <p class="text-center small text-mute username-text"><?php echo $me['user_email']; ?></p>

            <div class="list-group list-group-flush nav-list">
                <a href="" class="list-group-item list-group-item-action <?php if($menu == ''){echo 'active';} ?>"><i class="material-icons">store</i> <span class="text-link">Home</span></a>
                <a href="user/panel" class="list-group-item list-group-item-action <?php if($menu == 'user' AND $sub_menu == 'panel'){echo 'active';} ?>"><i class="material-icons">view_carousel</i> <span class="text-link">Transaksi</span></a>
                <a href="user/notifikasi" class="list-group-item list-group-item-action <?php if($menu == 'user' AND $sub_menu == 'notifikasi'){echo 'active';} ?>"><i class="material-icons">notifications</i> <span class="text-link">Notifications</span></a>
                <a href="user/akun" class="list-group-item list-group-item-action <?php if($menu == 'user' AND $sub_menu == 'akun'){echo 'active';} ?>"><i class="material-icons">memory</i> <span class="text-link">Akun</span></a>
                <a href="user/wishlist" class="list-group-item list-group-item-action <?php if($menu == 'user' AND $sub_menu == 'wishlist'){echo 'active';} ?>"><i class="material-icons"><?php if($menu == 'user' AND $sub_menu == 'wishlist'){echo 'favorite';}else { ?>favorite_border<?php } ?></i> <span class="text-link">Wishlist</span></a>
                <a href="bantuan" class="list-group-item list-group-item-action <?php if($menu == 'bantuan'){echo 'active';} ?>"><i class="material-icons">help</i> <span class="text-link">Bantuan</span></a>
                <a href="user/logout" class="list-group-item text-danger"><i class="material-icons">exit_to_app</i> <span class="text-link">Logout</span></a>
            </div>
        </div>
    <?php }else { ?>
        <div class="content">
            <figure class="avatar avatar-100 rounded-circle has-background mx-auto username">
                <div class="background">
                    <img src="wp-content/img/user-2.png" class="img-fluid" alt="login">
                </div>
            </figure>
            <h5 class="text-center mb-0 username-text"><a class="btn btn-primary btn-sm" href="login">Login</a></h5>
            <div class="list-group list-group-flush nav-list">
                <a href="" class="list-group-item list-group-item-action <?php if($menu == ''){echo 'active';} ?>"><i class="material-icons">store</i> <span class="text-link">Home</span></a>
                <a href="bantuan" class="list-group-item list-group-item-action <?php if($menu == 'bantuan'){echo 'active';} ?>"><i class="material-icons">help</i> <span class="text-link">Bantuan</span></a>
            </div>
        </div>
    <?php } ?>
    </div>