<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Planet Gadgets Online Shopping">
    <meta name="author" content="PlanetGadgets">
    <link rel=icon href="wp-content/img/Logo-Small-PG.svg" sizes="any">

    <title><?php echo $title; ?> - Planet Gadgets Online Shopping</title>

    <!-- material icons stylesheet -->
    <link href="wp-content/vendor/materializeicon/material-icons.css" rel="stylesheet">

    <!-- bootstrap stylesheet -->
    <link href="wp-content/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- swiper stylesheet -->
    <link href="wp-content/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- template stylesheet -->
    <link href="wp-content/css/style.css" rel="stylesheet" id="style">
    <link href="wp-content/css/mystyle.css" rel="stylesheet" id="style">
    <?php if($this->uri->segment(1) == 'checkout') { ?>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <?php } ?>
    <?php if($this->uri->segment(1) == 'metode-pembayaran') { ?>
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo $cekapi['api_mid_client']; ?>"></script>
    <?php } ?>

</head>