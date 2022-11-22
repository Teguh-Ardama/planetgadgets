<?php if($this->session->userdata('userid')) { ?>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
        <div class="container-fluid px-0">
            <div class="has-background h-200px">
                <div class="background">
                    <!-- <img src="wp-content/img/image8.jpg" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-11 col-md-6 col-lg-4 mx-auto">
            <figure class="avatar avatar-150 rounded-circle has-background mx-auto username top-75">
                <div class="background">
                    <img src="wp-content/img/<?php echo $me['user_foto']; ?>" alt="<?php echo $me['user_foto']; ?>">
                </div>
            </figure>
            <h5 class="text-center mb-0 username-text"><?php echo $me['user_nama']; ?></h5>
            <p class="text-center small text-mute username-text"><?php echo $me['user_email']; ?></p>
            <?php if($this->session->flashdata('flash')): ?>
            <div class="alert alert-success"><i class="material-icons">check_circle</i> <?php echo $this->session->flashdata('flash'); ?></div>
            <?php endif; ?>
            <div class="list-group my-3">
                <a href="user/akun/profil" class="list-group-item list-group-item-action">Profil <i class="material-icons float-right text-mute h6 my-0">keyboard_arrow_right</i></a>
                <a href="user/akun/password" class="list-group-item list-group-item-action">Passwords <i class="material-icons float-right text-mute h6 my-0">keyboard_arrow_right</i></a>
                <a href="user/logout" class="list-group-item list-group-item-action">Logout <i class="material-icons float-right text-mute h6 my-0">keyboard_arrow_right</i></a>
            </div>
        </div>
    </div>
</div>
<?php }else { ?>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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