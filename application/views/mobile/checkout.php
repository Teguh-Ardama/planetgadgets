<?php $this->load->view('mobile/head'); ?>
<body class="ui-rounded">
<?php $this->load->view('mobile/load'); ?>
<link href="wp-content/css/style.css" rel="stylesheet" id="style">
<div class="background reveal-background">
    <img src="wp-content/img/image7.jpg" alt="">
</div>
<style>
    .product-title{
        font-size: 18px;
        color: #0c0d36;
        margin-top: 15px;
    }
    .cart-image{
        max-height: 85px; 
        border-radius: 8px;
    }
</style>
<div class="main-container">
    <?php $this->load->view('mobile/header'); ?>
    <div class="content container-fluid">
        <!-- page content start -->
        <div class="content-container">
            <form action="" method="post">
                <div class="row">
                    <div class="container align-self-start my-3">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-borderless table-cart" style="font-size: 20px;" aria-describedby="Cart">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($keranjang as $krj): ?>
                                    <tr>
                                        <td style="width: 15%;">
                                            <img class="cart-image" src="wp-content/img/product/<?php echo $krj['image']; ?>"  alt="<?php echo $krj['image']; ?>">
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title"><?php echo $krj['name']; ?></div>
                                        </td>
                                        <td style="width: 20%;">
                                            <div class="product-title">Rp <?php echo number_format($krj['price'],0,',','.'); ?></div>
                                        </td>
                                        <td style="width: 15%;">
                                            <div class="product-title" style="margin-left: 35px;"><?php echo $krj['qty']; ?></div>
                                        </td>
                                        <td style="width: 20%;">
                                            <div class="product-title">Rp <?php echo number_format($krj['subtotal'],0,',','.'); ?></div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
                        <h5 class="page-title">Informasi pengiriman</h5>
                        <br>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" class="form-control " name="nama" value="<?php echo $me['user_nama']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Telepon</label>
                                    <input type="text" class="form-control " name="telp" value="<?php echo $me['user_telp']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Alamat</label>
                                    <input type="text" class="form-control " name="alamat" id="alamat" value="<?php echo $me['user_alamat']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Provinsi</label>
                                    <select name="prov" id="prov" class="form-control " >
                                        <option value="" disabled selected>-Provinsi-</option>
                                        <?php $this->load->view('mobile/prov'); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kota / Kabupaten</label>
                                    <select name="kota" id="kota" class="form-control ">
                                        <option value="" disabled selected>-Kota / Kabupaten-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kode POS</label>
                                    <input type="text" class="form-control " name="pos" value="<?php echo $me['user_kpos']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Pengiriman</label>
                                    <select name="kurir" id="kurir" class="form-control" >
                                        <option value="pos">POS</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label"> Paket Layanan </label>
                                    <select name="layanan" id="layanan" class="form-control" >
                                        <option value="" disabled selected>-Layanan-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Catatan (optional)</label>
                                    <textarea name="note" class="form-control " id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <br>
                                    <h5 class="text-danger text-center" id="ongkir"><i>* Belum termasuk ongkir</i></h5>
                                </div>
                                <?php if($this->session->userdata('kodepromo')) { ?>
                                <h1 class="text-center">Total Tagihan</h1>
                                <h1 class="text-center text-success" id="total">Rp. <?php echo number_format($this->session->userdata('dibayar'),0,',','.'); ?>,-</h1>
                                <?php }else { ?>
                                <h1 class="text-center">Total Tagihan</h1>
                                <h1 class="text-center text-success" id="total">Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?>,-</h1>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type='checkbox' name='konfirmasi' id="konfirmasi" required/> Saya telah membaca dan menyetujui persyaratan layanan </p>
                            </div>
                        </div>
                        <input type="hidden" name="total" id="totalset">
                        <input type="hidden" name="ongkir" id="ongkirset">
                        <div class="container align-self-end mb-4 text-center">
                            <button type="submit" class="btn btn-lg btn-primary mb-3 btn-block">Buat pesanan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- page content ends -->
    </div>
</div>
<?php $this->load->view('mobile/foot'); ?>
<script>
    const konfirmasi = document.querySelector('#konfirmasi');
    konfirmasi.addEventListener('click', function(){
        Swal.fire({
        title: 'Apakah Pesanan dan Informasi Pengiriman sudah benar?',
        icon: 'question'
        })
    })
</script>