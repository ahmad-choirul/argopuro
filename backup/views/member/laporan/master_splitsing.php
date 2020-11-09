<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>   
		<meta charset="UTF-8"> 
		<link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.png" type="image/ico">   
		<title>PT Airlangga sentral internasional</title>    
		<meta name="author" content="Paber">  
        <meta name="viewsplitsingrt" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/magnific-splitsingpup/magnific-splitsingpup.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/skins/default.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme-custom.css">
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
						<h2>Purchase Order</h2>
					</header>  
					<!-- start: page -->
                    
                    <section class="panel"> 
                        <div class="panel-body">       

                            <div class="row"> 
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="row">
                                    <div class="col-md-4 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Jumlah Purchase Order Hari Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="splitsing_hari_ini"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-4 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Jumlah Purchase Order Minggu Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="splitsing_minggu_ini"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-4 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Jumlah Purchase Order Bulan Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="splitsing_bulan_ini"></strong>
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
                    </section>
                    <section class="panel">
                        <header class="panel-heading">    
                            <div class="row show-grid">
                                <div class="col-md-6" align="left"><h2 class="panel-title">Data splitsing</h2></div>
                                <?php  
                                echo level_user('laporan','splitsing',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                                ?> 
							</div>
                        </header>
                        <div class="panel-body"> 
                                <table class="table table-bordered table-hover table-striped" id="splitsingdata">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Tanggal splitsing</th>
                                            <th>Nomor splitsing</th>   
                                            <th>Pembayaran</th> 
                                            <th>Supplier</th> 
                                            <th>Termin</th>  
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

		
        <div class="modal fade bd-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('laporan/splitsingtambah',' id="FormulirTambah" enctype="multipart/form-data"');?>  
                    <header class="panel-heading">
                        <h2 class="panel-title">Buat splitsing Baru</h2>
                    </header>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="form-group mt-lg nomor_splitsing">
                                <label class="col-sm-3 control-label">Nomor splitsing<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nomor_splitsing" class="form-control" value="splitsing" required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg tgl_splitsing">
                                <label class="col-sm-3 control-label">Tanggal splitsing<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tgl_splitsing" class="form-control tanggal" data-plugin-datepicker required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg satuan">
                                <label class="col-sm-3 control-label">Jenis Pembayaran<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control" name="pembayaran" required>  
    									 <option value="cash">cash</option>
                                    	 <option value="hutang">hutang</option> 
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group termin">
                                <label class="col-sm-3 control-label">Termin (hari)<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="termin" class="form-control" required />
                                </div>
                            </div>     
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-lg supplier">
                                <label class="col-sm-3 control-label">Pilih Supplier<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control" name="supplier" required>  
    									<?php foreach ($supplier as $supp): ?>
                                        <option value="<?php echo $supp->id;?>"><?php echo $supp->nama_supplier;?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control"   name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row" style="overflow-x: auto;white-space: nowrap;"> 
                        <div class="col-md-12">
                            <h3>Rincian Item Yang Dibeli</h3> 
                            <a type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="tambahItem"><i class="fa fa-plus"></i> Tambah Item</a> 
                            <div class="table-ressplitsingnsive" style="max-height:420px;"> 
                                <table class="table table-bordered table-hover table-striped dataTable no-footer listitem">
                                <thead>
                                    <tr>
                                        <th style="min-width:200px;">Kode Item (Barcode)</th>
                                        <th style="min-width:200px;">Nomor SKU</th>
                                        <th style="min-width:400px;">Nama Item</th>
                                        <th style="min-width:100px;">Satuan Besar</th>
                                        <th style="min-width:100px;">Kuantiti</th> 
                                    </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" type="submit" id="submitform">Submit</button>
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer>
                    </form>
                </section>
                </div>
            </div>
        </div> 
        <div class="modal fade bd-example-modal-lg" id="detailData"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">   
                    <header class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 text-left"> 
                            <h2 class="panel-title">Purchase Order</h2>  
                            </div>
                            <div class="col-md-9 text-right">
                                <a class="btn btn-success" id="linkprint" target="_blank"><i class="fa fa-print"></i> Print</a>
                                <a class="btn btn-success" id="linkpdf" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            </div>
                        </div>
                    </header>
                    <div class="panel-body" id="showdetail"> 
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer> 
                </section>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('laporan/splitsingedit',' id="FormulirEdit" enctype="multipart/form-data"');?>  
                    <input type="hidden" name="idd" id="idd">
                    <header class="panel-heading">
                        <h2 class="panel-title">Edit splitsing</h2>
                    </header>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-lg nomor_splitsing">
                                <label class="col-sm-3 control-label">Nomor splitsing<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="nomor_splitsing_view"  class="form-control" readonly/>
                                    <input type="hidden" name="nomor_splitsing" id="nomor_splitsing" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg tgl_splitsing">
                                <label class="col-sm-3 control-label">Tanggal splitsing<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tgl_splitsing" id="tgl_splitsing" class="form-control tanggal" data-plugin-datepicker required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg pembayaran">
                                <label class="col-sm-3 control-label">Jenis Pembayaran<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control" id="pembayaran" name="pembayaran" required>  
    									 <option value="cash">cash</option>
                                    	 <option value="hutang">hutang</option> 
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group termin">
                                <label class="col-sm-3 control-label">Termin (hari)<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="termin" id="termin" class="form-control" required />
                                </div>
                            </div>     
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-lg supplier">
                                <label class="col-sm-3 control-label">Pilih Supplier<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control" name="supplier" id="supplier" required>  
    									<?php foreach ($supplier as $supp): ?>
                                        <option value="<?php echo $supp->id;?>"><?php echo $supp->nama_supplier;?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control"  id="keterangan"   name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row" style="overflow-x: auto;white-space: nowrap;"> 
                        <div class="col-md-12">
                            <h3>Rincian Item Yang Dibeli</h3> 
                            <a type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="tambahItemedit"><i class="fa fa-plus"></i> Tambah Item</a> 
                            <div class="table-ressplitsingnsive" style="max-height:420px;"> 
                                <table class="table table-bordered table-hover table-striped dataTable no-footer listitemedit">
                                <thead>
                                    <tr>
                                        <th style="min-width:200px;">Kode Item (Barcode)</th>
                                        <th style="min-width:200px;">Nomor SKU</th>
                                        <th style="min-width:400px;">Nama Item</th>
                                        <th style="min-width:100px;">Satuan Besar</th>
                                        <th style="min-width:100px;">Kuantiti</th> 
                                    </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" type="submit" id="submitformEdit">Submit</button>
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer>
                    </form>
                </section>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modal-listitems"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <section class="panel panel-primary">   
                    <header class="panel-heading">
                        <h2 class="panel-title">Data Produk</h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped" id="itemsdata">
                            <thead>
                                <tr>
                                    <th>Kode Item</th>
                                    <th>Nama Item</th> 
                                    <th>Kategori</th> 
                                    <th>Satuan Kecil</th>  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> 
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer> 
                </section>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel  panel-danger">
                    <header class="panel-heading">
                        <h2 class="panel-title">Konfirmasi Hapus Data</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-icon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                            <div class="modal-text">
                                <h4>Yakin ingin menghapus data ini ?</h4> 
                            </div>
                        </div>
					</div>
                    <footer class="panel-footer"> 
                        <div class="row">
                            <div class="col-md-12 text-right"> 
                                <?php echo form_open('laporan/splitsinghapus',' id="FormulirHapus"');?>  
                                <input type="hidden" name="idd" id="idddelete">
                                <button type="submit" class="btn btn-danger" id="submitformHapus">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </footer>
                </section>
                </div>
            </div>
        </div>  

        <!-- Vendor -->
		<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/magnific-splitsingpup/magnific-splitsingpup.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/select2/select2.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script> 
		<script type="text/javascript">
            $('.tanggal').datepicker({
                format: 'yyyy-mm-dd' 
            }); 
			
        var tableitems = $('#itemsdata').DataTable({  
			"serverSide": true, 
			"order": [], 
			"ajax": {
				"url": "<?php echo base_url()?>laporan/pilihanitem",
				"type": "GET"
			}, 
			"columnDefs": [
				{ 
					"targets": [ 3 ], 
					"orderable": false, 
				},
			],  
        });  
		     
        var tablesplitsing = $("#splitsingdata").dataTable({ 
            serverSide: true,
            ajax: {
                "url": "<?php echo base_url()?>laporan/datasplitsing",
                "type": "post"
            },
            columns: [
                {"data": "tombol"},
                {"data": "tgl_splitsing"},
                {"data": "nomor_splitsing"}, 
                {"data": "pembayaran"}, 
                {"data": "nama_supplier"},
                {"data": "termin"}
            ],
            "columnDefs": [
                { 
                    "targets": [ 0 ], 
                    "orderable": false, 
                },
            ], 
            order: [[2, 'DESC']],  
        });
			 			
		function lasplitsingran_ringkas(){   
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>laporan/splitsing_data', 
				dataType    : 'json',
				success: function(response) {  
					$.each(response, function(i, item) {  
					$('#splitsing_bulan_ini').html(item.splitsing_bulan);  
					$('#splitsing_minggu_ini').html(item.splitsing_minggu);  
					$('#splitsing_hari_ini').html(item.splitsing_hari);   
					}); 
				}
			});  
			return false;
		}
		lasplitsingran_ringkas(); 
        function detail(elem){
            var dataId = $(elem).data("id");   
            $('#detailData').modal();    
            $('#showdetail').html('Loading...'); 
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url()?>laporan/splitsingdetail',
                data: 'id=' + dataId,
                dataType 	: 'json',
                success: function(response) { 
                    var datarow='<div class="row">';
                    $.each(response.datarows, function(i, item) {
                        document.getElementById('linkprint').setAttribute('href', '<?php echo base_url()?>laporan/printsplitsing/'+item.nomor_splitsing);
                        document.getElementById('linkpdf').setAttribute('href', '<?php echo base_url()?>laporan/pdfsplitsing/'+item.nomor_splitsing);
                        
                        datarow+='<div class="col-md-6">';
                        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                        datarow+="<tr><td>Nomor splitsing</td><td>: "+item.nomor_splitsing+"</td></tr>";
                        datarow+="<tr><td>Tanggal splitsing</td><td>: "+item.tgl_splitsing+"</td></tr>";
                        datarow+="<tr><td>Total </td><td>: "+item.totalbiaya+"</td></tr>";
                        datarow+="<tr><td>Pembayaran</td><td>: "+item.pembayaran+"</td></tr>";
                        datarow+="<tr><td>Termin</td><td>: "+item.termin+"</td></tr>"; 
                        datarow+="</table>";
                        datarow+='</div>';
                        datarow+='<div class="col-md-6">';
                        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                        datarow+="<tr><td>Kode Supplier</td><td>: "+item.kode_supplier+"</td></tr>";
                        datarow+="<tr><td>Supplier</td><td>: "+item.supplier+"</td></tr>";
                        datarow+="<tr><td>Keterangan</td><td>: "+item.keterangan+"</td></tr>";
                        datarow+="</table>";
                        datarow+='</div>';
                    });
                    datarow+='</div>';
                    datarow+='<div class="row"><div class="col-md-12">';
                    datarow+='<h3>Rincian</h3>';
                    datarow+='<div class="table-ressplitsingnsive" style="max-height:420px;">';  
                    datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                    datarow+="<thead><tr>";
                    datarow+="<th>No SKU</th>";
                    datarow+="<th>Nama Item</th>";
                    datarow+="<th>Satuan Besar</th>";
                    datarow+="<th>Kuantiti</th>";
                    datarow+="</tr></thead>";
                    datarow+="<tbody>";
                    
                    $.each(response.datasub, function(i, itemsub) {
                        datarow+="<tr>";
                        datarow+="<td>"+itemsub.kode_item+"</td>"; 
                        datarow+="<td>"+itemsub.nama_item+"</td>";
                        datarow+="<td>"+itemsub.satuan_besar+"</td>"; 
                        datarow+="<td>"+itemsub.kuantiti+"</td>"; 
                        datarow+="</tr>"; 
                    });  
                    datarow+="</tbody>";
                    datarow+="</table>";
                    datarow+="</div>";
                    datarow+='</div></div>';
                    $('#showdetail').html(datarow);
                }
            });  
            return false;
        }
        
        $(document).on('shown.bs.modal','#modal-listitems', function (e) {
            var urutan = $(e.relatedTarget).data('urutan');  
            createCookie("urutan-row-item", urutan, 30);
        }); 
        function pilihitem(elem){ 
            urutan = readCookie("urutan-row-item");
            var namaitem = $(elem).data("namaitem"); 
            var satuan = $(elem).data("satuan"); 
            var id = $(elem).data("id");  
            $('.kode-item'+urutan).val(id);
            $('.sku'+urutan).val(id);
            $('.nama-item'+urutan).val(namaitem);   
            $('.satuan-kecil'+urutan).val(satuan);    
            $('#modal-listitems').modal('hide');  
            eraseCookie("urutan-row-item"); 
        }
        
        document.getElementById("FormulirTambah").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitform").setAttribute('disabled','disabled');
			$('#submitform').html('Loading ...');
			var form = $('#FormulirTambah')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'post',
			url 		: $(this).attr('action'),
			data 		: formData, 
			processData: false,
			contentType: false,
			cache: false, 
			dataType 	: 'json'
			}).done(function(data) { 
			if ( ! data.success) {	 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    document.getElementById("submitform").removeAttribute('disabled');  
                    $('#submitform').html('Submit');    
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) { 
                            var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                            $('.'+key).addClass('has-error');
                            $('input[name="' + key + '"]').after(msg);  
                            $('textarea[name="' + key + '"]').after(msg);  
                        }  
						if(key == 'jumlah_obat'){
							alert(data.errors[key]);
						}
                        if (key == 'fail') {   
                            new PNotify({
                                title: 'Notifikasi',
                                text: data.errors[key],
                                type: 'danger'
                            }); 
                        }
                    }     
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll(); 
					$('#splitsingdata').dataTable().api().ajax.reload();
					lasplitsingran_ringkas();			
                    document.getElementById("submitform").removeAttribute('disabled'); 
                    document.getElementById("FormulirTambah").reset();  
                    $('#submitform').html('Submit');  
                    new PNotify({
                        title: 'Notifikasi',
                        text: data.message,
                        type: 'success'
                    });  
                    $('#tambahData').modal('hide');  
                }
                }).fail(function(data) {  
                    new PNotify({
                        title: 'Notifikasi',
                        text: "Request gagal, browser akan direload",
                        type: 'danger'
                    }); 
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            });
               
        var max_fields      = 1000;
        var wrapperItem     = $(".listitem");
        var add_button_mg   = $("#tambahItem");
        var x = 0;  
        $(add_button_mg).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x=x+1;       
                var formtambah='<tr>';
                formtambah+='<td><div class="input-group input-group-icon" style="width:150px;"><input type="text" data-urutan="'+x+'" data-toggle="modal" data-target="#modal-listitems"  class="form-control kode-item'+x+'" placeholder="Pilih Item"><span class="input-group-addon"><span class="icon"><i class="fa fa-search"></i></span></span></div></td>';
                formtambah+='<td><input type="hidden" class="kode-item'+x+'" name="kode_item[]"><input type="hidden" class="nama-item'+x+'" name="nama_item[]">';
                formtambah+=' <input type="text" name="sku[]" class="form-control sku'+x+'"></td>';
                formtambah+='<td><input type="text"  class="form-control nama-item'+x+'"></td>';
                formtambah+='<td><input type="text" name="satuan_besar[]" size="3" class="form-control satuan-besar'+x+'"></td>';
                formtambah+='<td><input type="number" name="kuantiti[]" class="form-control"></td>';
               formtambah+='<td><a href="javascript:void(0);" class="mb-xs mt-xs mr-xs btn btn-danger deleterow"><i class="fa fa-trash-o"></i></a></td></tr>'; 
                $(wrapperItem).append(formtambah);  
                $('.tgl_expired').datepicker({
                    format: 'yyyy-mm-dd' 
                });
                $('.mask_price'+x).maskMoney();
            }
            else
            { 
			document.getElementById("tambahItem").setAttribute('disabled','disabled'); 
            alert('Maksimal '+max_fields+' form')
            }
        });    
        $(wrapperItem).on("click",".deleterow", function(e){
            e.preventDefault(); $(this).parent().parent().remove();
            document.getElementById("tambahItem").removeAttribute('disabled');  
        }) 
            
        var x = 0; 
        function edit(elem){
		        var dataId = $(elem).data("id");   
                document.getElementById("idd").setAttribute('value', dataId);
                $(".listitemedit").find("tr:not(:first)").remove();
                $('#editData').modal();        
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>laporan/splitsingdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) {  
                        $.each(response.datarows, function(i, item) {                 
                            $("#pembayaran").select2("val", item.pembayaran); 
                            $("#supplier").select2("val", item.kode_supplier);                
                            document.getElementById("nomor_splitsing").value = item.nomor_splitsing;       
                            document.getElementById("nomor_splitsing_view").value = item.nomor_splitsing;
                            document.getElementById("tgl_splitsing").value = item.tgl_splitsing_ymd;    
                            document.getElementById("termin").value = item.termin;    
                            document.getElementById("keterangan").value = item.keterangan;  
                        });  

                        var datarow='';
                        $.each(response.datasub, function(i, itemsub) {
                            x= x + 1;
                            datarow+='<tr><td><div class="input-group input-group-icon" style="width:150px;"><input type="text" data-urutan="'+x+'" data-toggle="modal" data-target="#modal-listitems" value="'+itemsub.kode_item+'"  class="form-control kode-item'+x+'" placeholder="Pilih Item"><span class="input-group-addon"><span class="icon"><i class="fa fa-search"></i></span></span></div></td>';
                            datarow+='<td><input type="hidden" value="'+itemsub.kode_item+'" class="kode-item'+x+'" name="kode_item[]"><input type="hidden" class="nama-item'+x+'"  value="'+itemsub.nama_item+'" name="nama_item[]">';
                            datarow+=' <input type="text" value="'+itemsub.sku+'" name="sku[]" class="form-control sku'+x+'"></td>';
                            datarow+='<td><input type="text" value="'+itemsub.nama_item+'"  class="form-control nama-item'+x+'"></td>';
                            datarow+='<td><input type="text"  value="'+itemsub.satuan_besar+'"  name="satuan_besar[]" size="3" class="form-control satuan-besar'+x+'"></td>';
                            datarow+='<td><input type="number"  value="'+itemsub.kuantiti+'"  name="kuantiti[]" class="form-control"></td>';
                            datarow+='<td><a href="javascript:void(0);" class="mb-xs mt-xs mr-xs btn btn-danger deleterowedit"><i class="fa fa-trash-o"></i></a></td></tr>';   
                        });
                        $('.listitemedit').append(datarow);    
                        $('.mask_priceedit').maskMoney();
                        $('.tgl_expirededit').datepicker({
                            format: 'yyyy-mm-dd' 
                        });

                    }
                });   
                return false;
            }

        var max_fieldsEdit      = 1000;
        var wrapperItemEdit     = $(".listitemedit");
        var add_button_mgEdit   = $("#tambahItemedit");
        var x = 0;  
        $(add_button_mgEdit).click(function(e){
            e.preventDefault();
            if(x < max_fieldsEdit){
                x=x+1;       
                var formtambah='<tr>';
                formtambah+='<td><div class="input-group input-group-icon" style="width:150px;"><input type="text" data-urutan="'+x+'" data-toggle="modal" data-target="#modal-listitems"  class="form-control kode-item'+x+'" placeholder="Pilih Item"><span class="input-group-addon"><span class="icon"><i class="fa fa-search"></i></span></span></div></td>';
                formtambah+='<td><input type="hidden" class="kode-item'+x+'" name="kode_item[]"><input type="hidden" class="nama-item'+x+'" name="nama_item[]">';
                formtambah+=' <input type="text" name="sku[]" class="form-control sku'+x+'"></td>';
                formtambah+='<td><input type="text"  class="form-control nama-item'+x+'"></td>';
                formtambah+='<td><input type="text" name="satuan_besar[]" size="3" class="form-control satuan-besar'+x+'"></td>';
                formtambah+='<td><input type="number" name="kuantiti[]" class="form-control"></td>';
                formtambah+='<td><a href="javascript:void(0);" class="mb-xs mt-xs mr-xs btn btn-danger deleterowedit"><i class="fa fa-trash-o"></i></a></td></tr>'; 
                $(wrapperItemEdit).append(formtambah);  
                $('.tgl_expired').datepicker({
                    format: 'yyyy-mm-dd' 
                });
                $('.mask_price'+x).maskMoney();
            }
            else
            { 
			document.getElementById("tambahItemedit").setAttribute('disabled','disabled'); 
            alert('Maksimal '+max_fields+' form')
            }
        });    
        $(wrapperItemEdit).on("click",".deleterowedit", function(e){
            e.preventDefault(); $(this).parent().parent().remove();
            document.getElementById("tambahItemedit").removeAttribute('disabled');  
        }) 
        document.getElementById("FormulirEdit").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformEdit").setAttribute('disabled','disabled');
			$('#submitformEdit').html('Loading ...');
			var form = $('#FormulirEdit')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'post',
			url 		: $(this).attr('action'),
			data 		: formData, 
			processData: false,
			contentType: false,
			cache: false, 
			dataType 	: 'json'
			}).done(function(data) { 
			if ( ! data.success) {			 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    document.getElementById("submitformEdit").removeAttribute('disabled');  
                    $('#submitformEdit').html('Submit');    
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) { 
                            var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                            $('.'+key).addClass('has-error');
                            $('input[name="' + key + '"]').after(msg);  
                        }
						if(key == 'jumlah_obat'){
							alert(data.errors[key]);
						}
                        if (key == 'fail') {   
                            new PNotify({
                                title: 'Notifikasi',
                                text: data.errors[key],
                                type: 'danger'
                            }); 
                        }
                    }      
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll();
					$('#splitsingdata').dataTable().api().ajax.reload();
					lasplitsingran_ringkas();				 
                    document.getElementById("submitformEdit").removeAttribute('disabled'); 
                    $('#editData').modal('hide');        
                    document.getElementById("FormulirEdit").reset();    
                    $('#submitformEdit').html('Submit');   
                    new PNotify({
                        title: 'Notifikasi',
                        text: data.message,
                        type: 'success'
                    });    
                }
                }).fail(function(data) { 
                    new PNotify({
                        title: 'Notifikasi',
                        text: "Request gagal, browser akan direload",
                        type: 'danger'
                    }); 
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            });

            function hapus(elem){ 
		        var dataId = $(elem).data("id");
                document.getElementById("idddelete").setAttribute('value', dataId);
        		$('#modalHapus').modal();        
            }
            document.getElementById("FormulirHapus").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformHapus").setAttribute('disabled','disabled');
			$('#submitformHapus').html('Loading ...');
			var form = $('#FormulirHapus')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'post',
			url 		: $(this).attr('action'),
			data 		: formData, 
			processData: false,
			contentType: false,
			cache: false, 
			dataType 	: 'json'
			}).done(function(data) { 
			if ( ! data.success) {		
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    document.getElementById("submitformHapus").removeAttribute('disabled');  
                    $('#submitformHapus').html('Delete');     
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) { 
                        if (key == 'fail') {   
                            new PNotify({
                                title: 'Notifikasi',
                                text: data.errors[key],
                                type: 'danger'
                            }); 
                        }
                    }      
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll();   
					$('#splitsingdata').dataTable().api().ajax.reload();
					lasplitsingran_ringkas();			
                    document.getElementById("submitformHapus").removeAttribute('disabled'); 
                    $('#modalHapus').modal('hide');        
                    document.getElementById("FormulirHapus").reset();    
                    $('#submitformHapus').html('Delete'); 
                    new PNotify({
                        title: 'Notifikasi',
                        text: data.message,
                        type: 'success'
                    });   
                }
                }).fail(function(data) {   
                    new PNotify({
                        title: 'Notifikasi',
                        text: "Request gagal, browser akan direload",
                        type: 'danger'
                    }); 
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            }); 
            

        $(document).on('hidden.bs.modal', '.modal', function () {
            $('.modal:visible').length && $(document.body).addClass('modal-open');
        });
        </script>
	</body>
</html>