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
            </div>
            <!-- page content ends -->
        </div>

    </div>

<?php $this->load->view('mobile/foot'); ?>