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
      <h2>Laporan 2</h2>
  </header>  
  <!-- start: page -->
  <div class="row">
      <section class="panel col-md-12">
        <header class="panel-heading">    
            <div class="row show-grid">
                <div class="col-md-8" align="left"><h2 class="panel-title"></h2></div> 
            </div>
        </header>
        <div class="panel-body"> 
            <div class="table" style="overflow-x: auto;">
                <table class="table table-bordered table-hover table-striped data" id="itemsdata">
                    <thead>
                        <tr>
                            <th colspan="2"></th>
                            <th colspan="3" style="text-align: center; color: black;">LAND BANK s/d 2019</th>
                            <th colspan="3" style="text-align: center;color: black;">LAND BANK s/d 2020 </th>
                            <th colspan="3" style="text-align: center;color: black;">TOTAL LAND BANK</th>
                            <th colspan="3" style="text-align: center;color: black;">SERAH TERIMA TECHNIC</th>
                            <th colspan="3" style="text-align: center;color: black;">SISA LAND BANK</th>
                            <th colspan="3" style="text-align: center; background-color: green; color: white;">PROSES PERALIHAN BANK</th>
                            <th colspan="2" style="text-align: center;background-color: green; color: white;">S TERIMA FINANCE </th>
                        </tr>
                        <tr>
                            <th rowspan="3">No</th>
                            <th rowspan="3">Lokasi</th>
                            <th  rowspan="2" style="text-align: center;">BID</th>
                            <th colspan="2" style="text-align: center;">LUAS m<sup>2</sup></th>
                            <th  rowspan="2" style="text-align: center;">BID</th>
                            <th colspan="2" style="text-align: center;">LUAS m<sup>2</sup></th>
                            <th  rowspan="2" style="text-align: center;">BID</th>
                            <th colspan="2" style="text-align: center;">LUAS m<sup>2</sup></th>
                            <th  rowspan="2" style="text-align: center;">BID</th>
                            <th colspan="2" style="text-align: center;">LUAS m<sup>2</sup></th>                        
                            <th  rowspan="2" style="text-align: center;">BID</th>
                            <th colspan="2" style="text-align: center;">LUAS m<sup>2</sup></th>
                            <th rowspan="2" style="text-align: center;">ORDER </th>
                            <th rowspan="2" style="text-align: center;">TERBIT </th>
                            <th rowspan="2" style="text-align: center;">TOTAL </th>
                            <th rowspan="2" style="text-align: center;">SUDAH </th>
                            <th rowspan="2" style="text-align: center;">BELUM </th>
                        </tr>
                        <tr>
                            <th   style="text-align: center;">SURAT</th>
                            <th   style="text-align: center;">UKUR</th>
                            <th   style="text-align: center;">SURAT</th>
                            <th   style="text-align: center;">UKUR</th>
                            <th   style="text-align: center;">SURAT</th>
                            <th   style="text-align: center;">UKUR</th>
                            <th   style="text-align: center;">SURAT</th>
                            <th   style="text-align: center;">UKUR</th>
                            <th   style="text-align: center;">SURAT</th>
                            <th   style="text-align: center;">UKUR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="20">IP Proyek - DALAM IJIN</td>
                        </tr>
                        <?php for ($i=0; $i <sizeof($list['dalamijin']); $i++) { 
                          ?>
                          <tr>
                            <?php for ($j=0; $j <sizeof($list['dalamijin'][$i]) ; $j++) { 
                              ?>  
                              <td><?php echo $list['dalamijin'][$i][$j] ?></td>
                              <?php
                          } ?>
                      </tr>
                      <?php
                  } ?>
                   <tr>
                            <td colspan="20">IP Proyek - Luar IJIN</td>
                        </tr>
                        <?php for ($i=0; $i <sizeof($list['luarijin']); $i++) { 
                          ?>
                          <tr>
                            <?php for ($j=0; $j <sizeof($list['luarijin'][$i]) ; $j++) { 
                              ?>  
                              <td><?php echo $list['luarijin'][$i][$j] ?></td>
                              <?php
                          } ?>
                      </tr>
                      <?php
                  } ?>
                   <tr>
                            <td colspan="20">IP Proyek - Lokasi</td>
                        </tr>
                        <?php for ($i=0; $i <sizeof($list['lokasi']); $i++) { 
                          ?>
                          <tr>
                            <?php for ($j=0; $j <sizeof($list['lokasi'][$i]) ; $j++) { 
                              ?>  
                              <td><?php echo $list['lokasi'][$i][$j] ?></td>
                              <?php
                          } ?>
                      </tr>
                      <?php
                  } ?>
              </tbody>
          </table> 
      </div>
  </div>
</section>

</div>

<!-- end: page -->
</section>
</div>
</section>

</div>  

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
  var tableitems = $('#itemsdata').DataTable({  
    "serverSide": false, 
    "order": []
}); 
</script>
</body>
</html>