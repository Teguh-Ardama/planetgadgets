<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded" data-page="payment">
    <?php $this->load->view('mobile/load'); ?>
    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>
    <div class="main-container">
        <?php $this->load->view('mobile/header'); ?>
        <div class="content container-fluid">
            <!-- page content start -->
            <div class="content-container">
                <div class="row">
                    <div class="container align-self-start my-3">
                        <h1 class="text-center">Rp. <?php echo number_format($this->session->userdata('tagihan'),0,',','.'); ?>,-</h1>
                        <h6 class="small text-mute text-center"><i>Tagihan anda</i></h6>
                        <br>
                        <div class="text-center mb-3">
                            <button id="pay-button" class="btn btn-lg btn-default mb-3 mx-auto px-4">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('mobile/foot'); ?>
<script>
    Swal.fire({
        icon: 'info',
        title: 'PENTING!',
        text: 'Simpan Bukti Pembayaran Untuk Upload ke Bukti Pembayaran',
        imageUrl: 'wp-content/img/bukti-pembayaran.jpg',
        footer: 'Jangan lupa simpan bukti pembayaran ATM, Mbanking atau QRIS',
        imageHeight: 300,
        imageWidth: 300,
        imageAlt: 'Bukti Pembayaran'
    })
</script>