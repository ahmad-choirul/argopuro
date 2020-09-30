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
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #ECF0F1;
    }
  </style>
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
         <div class="container-fluid" id="codelatte">
    <nav class="navbar mb-3">
      <h3 class="mx-auto">Portal Info Halaman CODELATTE</h3>
    </nav>
    <div class="row justify-content-center text-center" style="margin-top: 3%;">
      <div class="card float-left col-md-3 mr-3" style="width: 20%;">
        <div class="card-body">
          <h2 class="card-title">Judul Halaman</h2>
          <img class="img-fluid mb-3" src="images/pic.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <p class="card-text">Lorem ipsum dolor sit amet.</p> <a href="#" class="btn btn-primary"><i class="fa fa-sign-in"></i> Kunjungi Halaman</a>
        </div>
      </div>
      <div class="card float-left col-md-3 mr-3" style="width: 20%;">
        <div class="card-body">
          <h2 class="card-title">Judul Halaman</h2>
          <img class="img-fluid mb-3" src="images/pic2.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <p class="card-text">Lorem ipsum dolor sit amet.</p> <a href="#" class="btn btn-primary"><i class="fa fa-sign-in"></i> Kunjungi Halaman</a>
        </div>
      </div>
      <div class="card float-left col-md-3 mr-3" style="width: 20%;">
        <div class="card-body">
          <h2 class="card-title">Judul Halaman</h2>
          <img class="img-fluid mb-3" src="images/pic3.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <p class="card-text">Lorem ipsum dolor sit amet.</p> <a href="#" class="btn btn-primary"><i class="fa fa-sign-in"></i> Kunjungi Halaman</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-3 text-center">
      <div class="card float-left col-md-3 mr-3" style="width: 20%;">
        <div class="card-body">
          <h2 class="card-title">Judul Halaman</h2>
          <img class="img-fluid mb-3" src="images/pic4.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <p class="card-text">Lorem ipsum dolor sit amet.</p> <a href="#" class="btn btn-primary"><i class="fa fa-sign-in"></i> Kunjungi Halaman</a>
        </div>
      </div>
      <div class="card float-left col-md-3 mr-3" style="width: 20%;">
        <div class="card-body">
          <h2 class="card-title">Judul Halaman</h2>
          <img class="img-fluid mb-3" src="images/pic5.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <p class="card-text">Lorem ipsum dolor sit amet.</p> <a href="#" class="btn btn-primary"><i class="fa fa-sign-in"></i> Kunjungi Halaman</a>
        </div>
      </div>
      <div class="card float-left col-md-3 mr-3" style="width: 20%;">
        <div class="card-body">
          <h2 class="card-title">Judul Halaman</h2>
          <img class="img-fluid mb-3" src="images/pic6.png" alt="Card image cap" style="height: 150px; widht: 150px;">
          <p class="card-text">Lorem ipsum dolor sit amet.</p> <a href="#" class="btn btn-primary"><i class="fa fa-sign-in"></i> Kunjungi Halaman</a>
        </div>
      </div>
    </div>
  </div>
  <p class="text-center" style="margin-top: 3%;">Copyright <i class="fa fa-copyright"></i> <a href="https://codelatte.org/">Codelatte</a> 2018 . All Rights Reserved.</p>
  <script>
    function changeWide(){
                  document.getElementById("codelatte").className = "container-fluid";
                }
                  function changeBoxed(){
                  document.getElementById("codelatte").className = "container ";
                }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
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