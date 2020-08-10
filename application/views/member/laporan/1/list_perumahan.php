<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>  
  <meta charset="UTF-8"> 
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/fav.png" type="image/ico">   
  <title>PT Argopuro</title>    
  <meta name="author" content="Paber">   
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap/css/bootstrap.css" />
  <?php $this->load->view('komponen/css'); ?>
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/magnific-popup/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/select2/select2.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/skins/default.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme-custom.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/admin.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.css" />


  <!-- Head Libs -->
  <script src="<?php echo base_url()?>/assets/vendor/modernizr/modernizr.js"></script>
</head>
<body class="bgbody">
  <section class="body">

   <?php $this->load->view("komponen/header.php") ?>
   <div class="inner-wrapper"> 
    <?php $this->load->view("komponen/sidebar.php") ?>
    <section role="main" class="content-body">
     <header class="page-header">  
      <h2>Rekap Proses Ijin Lokasi</h2>  
  </header> 
  <!-- start: page -->
  <section class="panel">
    <header class="panel-heading">    
        <div class="row show-grid">
            <div class="col-md-6" align="left"><h2 class="panel-title">Data Perijinan</h2></div>
           
        </div>
    </header>
    <div class="panel-body"> 
        <table class="table table-bordered table-hover table-striped" id="kategoridata">
            <thead>
                <tr>
                    <th rowspan="3" style="text-align: center;">no</th>
                    <th rowspan="3" style="text-align: center;">Nama Proyek</th>
                    <th rowspan="3">Lokasi</th>
                    <th colspan="6" style="text-align: center;">Proses Ijin Lokasi</th>  
                    <th rowspan="2" colspan="3" style="text-align: center;">Terbit Tahun 2020</th>  
                    <th rowspan="2" colspan="2" style="text-align: center;">Sisa Belum Terbit sd 2019</th>  
                    <th rowspan="3" style="text-align: center;">Keterangan</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center;">SISA sd TAHUN 2019</th>
                    <th colspan="2" style="text-align: center;">TAHUN 2020</th>
                    <th colspan="2" style="text-align: center;">TOTAL</th>
                </tr>
                <tr>
                    <th>JML</th>
                    <th>Luas</th>
                    <th>JML</th>
                    <th>Luas</th>
                    <th>JML</th>
                    <th>Luas</th>
                    <th>JML</th>
                    <th>Luas</th>
                    <th>L Terbit</th>
                    <th>JML</th>
                    <th>Luas</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> 
    </div>
</section>
<!-- end: page -->
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
<script src="<?php echo base_url()?>assets/vendor/select2/select2.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/admin.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script> 
<script type="text/javascript"> 
    var tablekategori = $('#kategoridata').DataTable({  
        "serverSide": true, 
        "order": [], 
        "ajax": {
            "url": "<?php echo base_url()?>laporan/datarekap_proses_ijin",
            "type": "GET"
        }, 
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ],  
    }); 
   
</script>
</body>
</html>