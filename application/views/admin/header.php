<?php 
$menu        = strtolower($this->uri->segment(1));
$sub_menu    = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?> - Planet Gadgets Online Shopping</title>
    <base href="<?php echo base_url(); ?>"/>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Planet Gadgets Online Shopping" />
    <meta name="keywords" content="Planet Gadgets Online Shopping" />
    <meta name="author" content="Planet Gadgets">
    <!-- Favicon icon -->
    <link rel="icon" href="wp-admin/images/Logo-Small-PG.svg" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="wp-admin/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="wp-admin/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="wp-admin/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="wp-admin/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="wp-admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="wp-admin/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
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
    <!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0);">
                        <i class="ti-menu"></i>
                    </a>
                    <a href="admin/dashboard">
                        <img style="width: 130px;" class="img-fluid" src="wp-admin/images/Logo-PG.svg" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <a href="javascript:void(0);">
                                <i class="ti-bell"></i>
                                <?php if($notifikasi) { ?>
                                    <span class="badge bg-c-pink"></span>
                                <?php }else { ?>
                                <?php } ?>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6>Notifications</h6>
                                    <?php if($notifikasi) { ?>
                                        <label class="label label-danger">New</label>
                                    <?php }else { ?>
                                    <?php } ?>
                                </li>
                                <?php if($notifikasi) { ?>
                                <?php foreach($notifikasi as $not): ?>
                                    <?php $cekus = $this->db->get_where('tb_users',['user_id' => $not['ns_dari']])->row_array(); ?>
                                <li><a href="admin/notifikasi/read/<?php echo $not['ns_id']; ?>">
                                    <div class="media">
                                        <img class="d-flex align-self-center img-radius" src="wp-content/img/<?php echo $cekus['user_foto']; ?>" alt="<?php echo $cekus['user_foto']; ?>">
                                        <div class="media-body">
                                            <h5 class="notification-user"><?php echo $cekus['user_nama']; ?></h5>
                                            <p class="notification-msg"><?php echo $not['ns_perihal']; ?></p>
                                            <span class="notification-time"><?php echo waktu_lalu($not['ns_time']); ?></span>
                                        </div>
                                    </div></a>
                                </li>
                                <?php endforeach; ?>
                                <?php }else { ?>
                                <li>
                                    <i>Tidak ada notifikasi baru</i>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li class="user-profile header-notification">
                            <a href="javascript:void(0);">
                                <img src="wp-admin/images/<?php echo $me['admin_foto']; ?>" class="img-radius" alt="<?php echo $me['admin_foto']; ?>">
                                <span><?php echo $me['admin_nama']; ?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="admin/profil">
                                        <i class="ti-user"></i> Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/password">
                                        <i class="ti-key"></i> Password
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/logout">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Main</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php if($menu == 'admin' AND $sub_menu == 'dashboard'){echo 'active';} ?>">
                                    <a href="admin/dashboard">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu <?php if($menu == 'admin' AND $sub_menu == 'master'){echo 'active pcoded-trigger';} ?>">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Master</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'produk'){echo 'active';} ?>">
                                            <a href="admin/master/produk">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Produk</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'kategori'){echo 'active';} ?>">
                                            <a href="admin/master/kategori">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Kategori</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'slider'){echo 'active';} ?>">
                                            <a href="admin/master/slider">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Slider</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'profil'){echo 'active';} ?>">
                                            <a href="admin/master/profil">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Profil</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'email'){echo 'active';} ?>">
                                            <a href="admin/master/email">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Email</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'lokasi'){echo 'active';} ?>">
                                            <a href="admin/master/lokasi">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Lokasi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'promo'){echo 'active';} ?>">
                                            <a href="admin/master/promo">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Promo</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu <?php if($menu == 'admin' AND $sub_menu == 'api'){echo 'active pcoded-trigger';} ?>">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-server"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">API</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'api' AND $sub_menu3 == 'ongkir'){echo 'active';} ?>">
                                            <a href="admin/api/ongkir">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Raja Ongkir</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'api' AND $sub_menu3 == 'midtrans'){echo 'active';} ?>">
                                            <a href="admin/api/midtrans">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Midtrans</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="<?php if($menu == 'admin' AND $sub_menu == 'transaksi'){echo 'active';} ?>">
                                    <a href="admin/transaksi">
                                        <span class="pcoded-micon"><i class="ti-shopping-cart-full"></i><b>T</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Transaksi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($menu == 'admin' AND $sub_menu == 'artikel'){echo 'active';} ?>">
                                    <a href="admin/artikel">
                                        <span class="pcoded-micon"><i class="ti-receipt"></i><b>A</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Artikel</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($menu == 'admin' AND $sub_menu == 'member'){echo 'active';} ?>">
                                    <a href="admin/member">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Member</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($menu == 'admin' AND $sub_menu == 'komentar'){echo 'active';} ?>">
                                    <a href="admin/komentar">
                                        <span class="pcoded-micon"><i class="ti-comments"></i><b>K</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Komentar</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu <?php if($menu == 'admin' AND $sub_menu == 'laporan'){echo 'active pcoded-trigger';} ?>">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-files"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Laporan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'member'){echo 'active';} ?>">
                                            <a href="admin/laporan/member">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Member</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'transaksi'){echo 'active';} ?>">
                                            <a href="admin/laporan/transaksi">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Transaksi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'produk'){echo 'active';} ?>">
                                            <a href="admin/laporan/produk">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Produk</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>
                    
                