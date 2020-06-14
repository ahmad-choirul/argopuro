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

					<!-- start: page -->
					<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
						<div class="content-with-menu-container"> 
							<menu id="content-menu" class="inner-menu" role="menu">
								<div class="nano">
									<div class="nano-content">  
										<div class="inner-menu-toggle-inside">
											<a href="#" class="inner-menu-collapse">
												<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Bar
											</a>
											<a href="#" class="inner-menu-expand" data-open="inner-menu">
												Show Bar <i class="fa fa-chevron-down"></i>
											</a>
										</div> 
										<div class="inner-menu-content">  
											<div class="sidebar-widget m-none" > 
												<div class="widget-content">
													<ul class="mg-folders" style="background-color: #003659;width: 300px; ">
                                                        <li style="">
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_pembelian" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Pembelian</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_pembelian">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_land_bank" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Land Bank Rekap</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_land_bank">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                        <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_land_bank_per" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Land Bank Perumahan</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_land_bank_per">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                        <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_belum_shgb" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Tanah Belum SHGB</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_belum_shgb">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  
                                                          <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_belum_shgb_per" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Tanah Belum SHGB Perumahan</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_belum_shgb_per">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_proses_induk" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Proses Induk</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_proses_induk">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_proses_induk_per" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Proses Induk Perumahan</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_proses_induk_per">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_penggabungan_split" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Penggabungan Split</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_penggabungan_split">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_shgb" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Tanah SHGB</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_tanah_shgb">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_splitsing" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Splitsing</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_splitsing">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                         <li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_sert_belum_split" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Sert Belum Split</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_sert_belum_split">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  
<li>
                                                            <a href="<?php echo base_url()?>laporan/laporan_evaluasi_stok_split" class="menu-item"  style="color: white"><i class="fa fa-folder"></i> Evaluasi Stok Split</a>
                                                            <div class="item-options">
                                                                <a href="<?php echo base_url()?>laporan/laporan_evaluasi_stok_split">
                                                                    <i class="fa fa-arrow-circle-o-left"></i>
                                                                </a> 
                                                            </div>
                                                        </li>  

                                                       
                                                    </ul>
													</ul>
												</div>
											</div> 
										</div>
									</div>
								</div>
							</menu>
							<div class="inner-body mg-main">  
                                <div class="row" style="margin-top:-30px;">  

                                    <div class="col-md-12"> 
                                        <section class="panel">
                                            <header class="panel-heading"> 
                                                <h2 class="panel-title"></h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                   <!--  <table class="table table-bordered table-striped table-condensed mb-none" id="produk_terlaris">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Item</th>
                                                                <th>Nama Produk</th>
                                                                <th>Total Terjual</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                        </tbody>
                                                    </table> -->
                                                </div>
                                            </div>
                                        </section>
                    
                                        <section class="panel"> 
                                            <div class="panel-body">     
                                                <div class="row"> 
                                                    <div class="col-md-9 col-lg-12 col-xl-4">
                                                        <div class="row">
                                                            <div class="col-md-12 col-xl-12">
                                                                <section class="panel"> 
                                                                    <header class="panel-heading">  
                                                                        <h2 class="panel-title"></h2>
                                                                    </header>
                                                                    <div class="panel-body">  
                                                                        <div class="chart chart-md" id="GrafikPenjualan"></div> 
                                                                    </div>
                                                                </section>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </section>

                                        <section class="panel">
                                            <header class="panel-heading"> 
                                                <h2 class="panel-title"></h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                   <!--  <table class="table table-bordered table-striped table-condensed mb-none" id="kadaluarsa">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Item</th>
                                                                <th>Nama Produk</th>
                                                                <th>Tanggal Kadaluarsa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                        </tbody>
                                                    </table> -->
                                                </div>
                                            </div>
                                        </section> 
                                    </div> 

                                </div>
                              <!--   <section class="panel" style="margin-top:-30px;"> 
                                    <div class="panel-body">   
                                        <div class="row"> 
                                            <div class="col-md-12 col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-xl-12">
                                                        <section class="panel">
                                                            <div class="panel-body bg-primary">
                                                                <div class="widget-summary"> 
                                                                    <div class="widget-summary-col">
                                                                        <div class="summary">
                                                                            <h4 class="title">Total Hutang Belum Dibayar</h4>
                                                                            <div class="info">
                                                                                <strong class="amount" id="total_hutang_belum_bayar"></strong>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div> 
                                                    <div class="col-md-6 col-xl-12">
                                                        <section class="panel">
                                                            <div class="panel-body bg-primary">
                                                                <div class="widget-summary"> 
                                                                    <div class="widget-summary-col">
                                                                        <div class="summary">
                                                                            <h4 class="title">Hutang Akan Jatuh Tempo</h4>
                                                                            <div class="info">
                                                                                <strong class="amount" id="akan_jatuh_tempo"></strong>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div> 
                                                    <div class="col-md-6 col-xl-12">
                                                        <section class="panel">
                                                            <div class="panel-body bg-primary">
                                                                <div class="widget-summary"> 
                                                                    <div class="widget-summary-col">
                                                                        <div class="summary">
                                                                            <h4 class="title">Hutang Sudah Jatuh Tempo</h4>
                                                                            <div class="info">
                                                                                <strong class="amount" id="sudah_jatuh_tempo"></strong>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div> 
                                                    <div class="col-md-6 col-xl-12">
                                                        <section class="panel">
                                                            <div class="panel-body bg-primary">
                                                                <div class="widget-summary"> 
                                                                    <div class="widget-summary-col">
                                                                        <div class="summary">
                                                                            <h4 class="title">Sudah Dibayar Minggu Ini</h4>
                                                                            <div class="info">
                                                                                <strong class="amount" id="dibayar_minggu_ini"></strong>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </section>  -->
                               <!--  <section class="panel"> 
                                    <div class="panel-body">     
                                        <div class="row"> 
                                            <div class="col-md-9 col-lg-12 col-xl-4">
                                                <div class="row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <section class="panel"> 
                                                            <header class="panel-heading">  
                                                                <h2 class="panel-title">Pemasukan dan Pengeluaran 2 Minggu Terakhir</h2>
                                                            </header>
                                                            <div class="panel-body">  
                                                                <div class="chart chart-md" id="GrafikCash"></div> 
                                                            </div>
                                                        </section>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </section> -->
							</div>
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
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/admin.min.js"></script> 
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script>   
		<script src="<?php echo base_url()?>assets/vendor/raphael/raphael.js"></script>
        <script src="<?php echo base_url()?>assets/vendor/morris/morris.js"></script>
        <script> 

 

	$.ajax({
        url: '<?php echo base_url()?>dashboard/cash_2_minggu', // getchart.php
        dataType: 'JSON',
        type: 'GET', 
        success: function(response) {

			Morris.Line({
				resize: true,
				element: 'GrafikCash',
				data: response,
				xkey: 'tanggal',
				ykeys: ['masuk','keluar'],
				labels: ['Uang Masuk (Rp) ','Uang Keluar (Rp) '],
				hideHover: true,
				lineColors: ['#0088cc', '#734ba9'],
				xLabelFormat: function (d) {
				    return ("0" + d.getDate()).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d.getFullYear();
				},
				xLabelAngle: 45,
			});
        }
    });


	$.ajax({
        url: '<?php echo base_url()?>dashboard/laporan_ringkas', // getchart.php
        dataType: 'JSON',
        type: 'GET', 
        success: function(response) {
            $.each(response, function(i, item) {  
            $('#akan_jatuh_tempo').html(item.akan_jatuh_tempo);  
            $('#dibayar_minggu_ini').html(item.dibayar_minggu);  
            $('#total_hutang_belum_bayar').html(item.total_hutang_belum_bayar);   
            $('#sudah_jatuh_tempo').html(item.sudah_jatuh_tempo);  
            }); 
        }
    });
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>dashboard/produk_kadaluarsa', 
        dataType 	: 'json',
        success: function(response) { 
            var i = 0; 
            var datarow =''; 
            $.each(response.datasub, function(i, itemsub) {
                i = i + 1;
                datarow+="<tr><td>"+i+"</td>"; 
                datarow+="<td>"+itemsub.kode_item+"</td>"; 
                datarow+="<td>"+itemsub.nama_item+"</td>"; 
                datarow+="<td>"+itemsub.tgl_expired+"</td>";   
                datarow+="</tr>"; 
            });   
            if(datarow == '' ){ 
                $('#kadaluarsa').append('<tr><td colspan="4" align="center"> Tidak ada produk akan kadaluarsa</td></tr>');
            }else{
                $('#kadaluarsa').append(datarow);
            }
        }
    }); 

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>dashboard/produk_terlaris', 
        dataType 	: 'json',
        success: function(response) { 
            var i = 0; 
            var datarow =''; 
            $.each(response.datasub, function(i, itemsub) {
                i = i + 1;
                datarow+="<tr><td>"+i+"</td>"; 
                datarow+="<td>"+itemsub.kode_item+"</td>"; 
                datarow+="<td>"+itemsub.nama_item+"</td>"; 
                datarow+="<td>"+itemsub.total+"</td>";   
                datarow+="</tr>"; 
            });   
            if(datarow == '' ){ 
                $('#produk_terlaris').append('<tr><td colspan="4" align="center"> Tidak ada produk data</td></tr>');
            }else{
                $('#produk_terlaris').append(datarow);
            }
        }
    }); 

	$.ajax({
        url: '<?php echo base_url()?>dashboard/penjualan_2_minggu', // getchart.php
        dataType: 'JSON',
        type: 'GET',
        data: {get_values: true},
        success: function(response) { 
			Morris.Line({
				resize: true,
				element: 'GrafikPenjualan',
				data: response,
				xkey: 'tanggal',
				ykeys: ['jumlah'],
				labels: ['Jumlah Transaksi'],
				hideHover: true,
				lineColors: ['#0088cc'],
				xLabelFormat: function (d) {
				    return ("0" + d.getDate()).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d.getFullYear();
				},
				xLabelAngle: 45,
			});
        }
    });
	</script>

	</body>
</html>