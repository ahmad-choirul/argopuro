<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('vendor/assetsReseller/') ?>assets/images/favicon.png">

    <title>Dropship | Dashboard</title>

    <!-- Bootstrap Core CSS -->

    <link href="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- chartist CSS -->
    <!-- 
    <link href="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">

    <link href="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">

    <link href="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet"> -->

    <!--This page css - Morris CSS -->

    <link href="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/c3-master/c3.min.css" rel="stylesheet">


    <link href="<?= base_url('vendor/assetsReseller/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('vendor/assetsReseller/') ?>css/daterangepicker.css" rel="stylesheet">


    <link href="<?= base_url('vendor/assetsReseller/') ?>css/colors/blue.css" id="theme" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>

    <style>
        .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            color: grey;
        }
    </style>
</head>

<style type="text/css">
    body {
        overflow-anchor: none;
    }
</style>

<body class="fix-header fix-sidebar card-no-border">