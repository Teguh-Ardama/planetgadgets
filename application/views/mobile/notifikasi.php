<?php $this->load->view('mobile/head'); ?>

<body class="ui-rounded">
    <?php $this->load->view('mobile/load'); ?>
<?php 
        function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
         ?>
    <div class="background reveal-background">
        <img src="wp-content/img/image7.jpg" alt="">
    </div>
    <?php $this->load->view('mobile/side_nav'); ?>
    <div class="main-container">
        <?php $this->load->view('mobile/header'); ?>
        <div class="content container-fluid px-0">
            <!-- page content start -->
            <div class="list-group list-group-flush my-0 w-100 border-top border-bottom">
                <?php if($notifikasi) { ?>
                <?php foreach($notifikasi as $not): ?>
                    <?php if($not['notif_status'] == 1) { ?>
                <div style="background-color: #e6ffe6;" class="list-group-item bg-light-warning text-dark">
                    <div class="row">
                        <a style="text-decoration: none;color: black;" href="user/notifikasi/read/<?php echo $not['notif_id']; ?>" class="col-auto">
                            <div class="avatar avatar-40 has-background">
                                <figure class="background">
                                    <i class="material-icons">notifications</i>
                                </figure>
                            </div>
                        </a>
                        <div class="col pl-0 align-self-center">
                            <a style="text-decoration: none;color: black;" href="user/notifikasi/read/<?php echo $not['notif_id']; ?>"><h6 class="mb-1 font-weight-normal"><b>Notifikasi</b> <br><?php echo $not['notif_perihal']; ?> </h6></a>
                            <p class="small text-mute"><?php echo waktu_lalu($not['notif_time']); ?></p>
                        </div>
                    </div>
                </div>
                <?php }else { ?>
                    <div class="list-group-item bg-light-warning text-dark">
                        <div class="row">
                            <a class="col-auto">
                                <div class="avatar avatar-40 has-background">
                                    <figure class="background">
                                        <i class="material-icons">notifications</i>
                                    </figure>
                                </div>
                            </a>
                            <div class="col pl-0 align-self-center">
                                <h6 class="mb-1 font-weight-normal"><b>Notifikasi</b> <?php echo $not['notif_perihal']; ?> </h6>
                                <p class="small text-mute"><?php echo waktu_lalu($not['notif_time']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php endforeach; ?>
                <?php }else { ?>
                    <div class="list-group-item bg-light-warning text-dark">
                        <div class="row">
                            <div class="col pl-0 align-self-center">
                                <h6 class="mb-1 font-weight-normal text-center"><i>Tidak ada notifikasi</i></h6>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- page content ends -->
        </div>

    </div>
    
    <!-- color settings ends -->
<?php $this->load->view('mobile/foot'); ?>