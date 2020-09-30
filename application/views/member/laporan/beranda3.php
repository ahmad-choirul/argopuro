<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>  
  <meta charset="UTF-8"> 
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/fav.png" type="image/ico">   
  <title>PT Argopuro</title>    
  <meta name="author" content="Paber"> 
  <!-- Mobile Metas -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/beranda/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/beranda/assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>https://fonts.googleapis.com/css?family=Roboto" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme.css" /> 
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/skins/default.css" /> 
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme-custom.css"> 
  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/morris/morris.css" />
  <script src="<?php echo base_url()?>assets/vendor/modernizr/modernizr.js"></script>  
</head>
<body class="bgbody">
  <section class="body">

   <!-- start: header -->
   <?php $this->load->view("komponen/header.php") ?>
   <!-- end: header -->

   <div class="inner-wrapper">
    <!-- start: sidebar -->
    <?php $this->load->view("komponen/sidebar.php") ?>
    <!-- end: sidebar -->

    <section role="main" class="content-body">
     <header class="page-header">  
      <h2>Laporan</h2>  
    </header>  


    <div class="inner-body mg-main" style="margin-left: 0px;">  

     <div class="row">
      <div class="col-md-3 card justify-content-center text-center" style="margin-right: 2%;">
        <div class="card-body">
          <h3 class="card-title">Evaluasi proses dan Ijin Lokasi Tanah</h3>
          <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/beranda/images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <a href="<?php echo base_url()?>laporan/rekap_proses_ijin_lokasi" class="btn btn-primary col-md-12"><i class="fa fa-sign-in"></i> Rekap Proses Ijin Lokasi</a>
          <a href="<?php echo base_url()?>laporan/list_ijin" class="btn " class="btn  col-md-12"><i class="fa fa-sign-in"></i> Rincian Ijin Lokasi</a>
        </div>
      </div>
      <div class="col-md-3 card justify-content-center text-center" style="margin-right: 2%;">
        <div class="card-body">
          <h3 class="card-title">Evaluasi Pembelian Tanah</h3><br>
          <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/beranda/images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_pembelian_detail" class="btn btn-primary col-md-12"><i class="fa fa-sign-in"></i> Detail Evaluasi Pembelian</a>
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_pembelian" class="btn  col-md-12"><i class="fa fa-sign-in"></i> Rekap Evaluasi Pembelian</a>
        </div>
      </div>
      <div class="col-md-3 card justify-content-center text-center" >
        <div class="card-body">
          <h3 class="card-title">Evaluasi Land Bank</h3><br>
          <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/beranda/images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_land_banK" class="btn btn-primary"><i class="fa fa-sign-in"></i> Land Bank Rekap</a><br>
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_land_bank_per" class="btn "><i class="fa fa-sign-in"></i> Land Bank Perumahan</a>
        </div>
      </div>

    </div>
    <br>
    <div class="row">
      <div class="col-md-3 card justify-content-center text-center" style="margin-right: 2%;">
        <div class="card-body">
          <h3 class="card-title">Evaluasi Tanah Proyek Belum SHGB</h3>
          <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/beranda/images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_belum_shgb" class="btn btn-primary col-md-12"><i class="fa fa-sign-in"></i> Rekap Tanah Belum SHGB</a>
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_belum_shgb_per" class="btn  col-md-12"><i class="fa fa-sign-in"></i> Tanah Belum SHGB Perumahan</a>
        </div>
      </div>
      <div class="col-md-3 card justify-content-center text-center" style="margin-right: 2%;">
        <div class="card-body">
          <h3 class="card-title">Evaluasi Proses Induk</h3><br>
          <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/beranda/images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_proses_induk" class="btn btn-primary col-md-12"><i class="fa fa-sign-in"></i>Rekap Penyelesaian Induk</a>
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_proses_induk_per" class="btn  col-md-12"><i class="fa fa-sign-in"></i>Penyelesaian Induk Perumahan</a>
        </div>
      </div>
      <div class="col-md-3 card justify-content-center text-center" >
        <div class="card-body">
          <h3 class="card-title">Evaluasi Penggabungan dan revisi Split</h3>
          <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/beranda/images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_penggabungan_split" class="btn btn-primary"><i class="fa fa-sign-in"></i> Rekap Penggabungan</a><br>
          <a href="<?php echo base_url()?>laporan/laporan_evaluasi_penggabungan_split" class="btn "><i class="fa fa-sign-in"></i> Penggabungan Perumahan</a>
        </div>
      </div>
      
    </div>
  </div>
</section>
</div>

</section>


<!-- Vendor -->
<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>  
<script src="<?php echo base_url()?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/admin.min.js"></script> 
<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script>   
<script src="<?php echo base_url()?>assets/vendor/raphael/raphael.js"></script>
<script src="<?php echo base_url()?>assets/vendor/morris/morris.js"></script>
<script> 




</script>

</body>
</html>