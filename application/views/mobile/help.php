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
          <div class="container">
            <div class="row">
              <div class="col-11 col-md-6 col-lg-4 mx-auto">
                      <h1>Bantuan</h1>
                        <div class="list-group my-3 accordion" id="accordionExample">
                            <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="list-group-item list-group-item-action">Cara belanja</a>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                <ul>
                                    <li>Silahkan bikin akun baru jika belum memiliki akun. Silahkan daftar <a href="registrasi">DISINI</a>.</li>
                                    <li>Jika sudah punya akun, silahkan login <a href="login">DISINI</a></li>
                                    <li>Setelah login, anda akan diarahkan ke halaman dashboard user. Silahkan klik icon <i class="material-icons">menu</i> lalu klik menu home untuk menuju ke halaman utama.</li>
                                    <li>Silahkan pilih item yang kamu inginkan, klik detail produknya.</li>
                                    <li>Selanjutnya klik tombol <b>Add to cart</b> untuk menambahkan item ke keranjang.</li>
                                    <li>Masukkan kode promo jika ada.</li>
                                    <li>Silahkan klik tombol <b>Checkout</b> jika item sudah sesuai.</li>
                                    <li>Selanjutnya silahkan isi kolom yang tersedia untuk memudahkan proses pengiriman barang. Pastikan informasi alamat sudah sesuai. Lalu klik tombol <b>Buat pesanan</b></li>
                                    <li>Silahkan klik tombol <b>Pilih</b> untuk memilih metode pembayaran. Dan ikuti arahan yang ada.</li>
                                    <li>Selesai</li>
                                </ul>
                              </div>
                            </div>
                            <a data-toggle="collapse" data-target="#probel1" aria-expanded="true" aria-controls="probel1" class="list-group-item list-group-item-action">Transaksi belum diproses?</a>
                            <div id="probel1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                Ada beberapa kemungkinan : <br>
                                <ul>
                                    <img src="wp-content/img/bukti-pembayaran.jpg" alt="">
                                    <li><b> Anda belum meng-upload bukti pembayaran </b></li>
                                    Silahkan ikuti petunjuk yang ada di riwayat transaksi, untuk bisa mengupload bukti pembayaran.
                                    <li>Kami sedang melakukan pengecekan bukti pembayaran anda. Mohon ketersediaannya untuk menunggu beberapa saat.</li>
                                </ul>
                              </div>
                            </div>
                            <a data-toggle="collapse" data-target="#kontaK" aria-expanded="true" aria-controls="kontaK" class="list-group-item list-group-item-action">Hubungi kami</a>
                            <div id="kontaK" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                Silahkan hubungi kami di : <br>
                                <i class="material-icons text-danger">email</i> <?php echo $profil['profil_email']; ?> <br>
                                <i class="material-icons text-warning">phone</i> <?php echo $profil['profil_telp']; ?> <br>
                                <i class="material-icons text-success">map</i> <?php echo $profil['profil_alamat']; ?> <br>
                              </div>
                            </div>
                            <!-- <a data-toggle="collapse" data-target="#lupaS" aria-expanded="true" aria-controls="lupaS" class="list-group-item list-group-item-action">Lupa password</a>
                            <div id="lupaS" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                Silahkan klik tombol <b>Lupa?</b> untuk mengatur ulang password anda.
                              </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('mobile/foot'); ?>