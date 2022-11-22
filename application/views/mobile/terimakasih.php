<?php $this->load->view('mobile/head'); ?>

<body class="ui-rounded" data-page="thankyou">
    <?php $this->load->view('mobile/load'); ?>


    <!-- page content start -->
    <div class="login-container">
        <div class="row">
            <div class="col-9 col-md-6 col-lg-4 align-self-center text-center my-3 mx-auto">
                <div class="icon icon-120 bg-success text-white rounded-circle mb-3">
                    <i class="material-icons display-4">redeem</i>
                </div>
                <h2>Yay!</h2>
                <h6 class="text-mute mb-3"><?php echo $this->session->flashdata('flash'); ?> </h6>
                <p class="text-mute">Terima kasih telah melakukan transaksi, pesanan Anda akan segera dikirimkan dan kami akan segera memberi tahu Anda melalui alamat email atau nomor telepon Anda yang terdaftar.</p>
            </div>
        </div>
    </div>
    <!-- page content ends -->

    
<?php $this->load->view('mobile/foot'); ?>