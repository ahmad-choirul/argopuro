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
						<h2>Master Data Barang</h2>
					</header>  
					<!-- start: page -->
                    <section class="panel">
                        <header class="panel-heading">    
                            <div class="row show-grid">
                                <div class="col-md-6" align="left"><h2 class="panel-title">Data Barang </h2></div>
                                <?php  
                                echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                                ?> 
							</div>
                        </header>
                        <div class="panel-body"> 
                                <table class="table table-bordered table-hover table-striped" id="itemsdata">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Lokasi</th>
                                            <th>Kode Item </th>
                                            <th>Nama Item</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Nama Penjual</th>
                                            <th>nama Surat</th>
                                            <th>Status Surat</th>
                                            <th>No Gambar</th>
                                            <th>Jml Bidang</th>
                                            <th>Luas Surat</th>
                                            <th>Luas Ukur</th>
                                            <th>No PBB</th>
                                            <th>Luas PBB</th>
                                            <th>NJOP</th>
                                            <th>Sat Harga Pengalihan</th>
                                            <th>Tot Harga Pengalihan</th>
                                            <th>Nama Makelar</th>
                                            <th>Nilai</th>
                                            <th>Tgl Pengalihan</th>
                                            <th>Akta Pengalihan</th>
                                            <th>Nama Pengalihan</th>
                                            <th>Pematangan</th>
                                            <th>Ganti Rugi</th>
                                            <th>PBB</th>
                                            <th>Lain-lain</th>
                                            <th>Harga / M^2</th>
                                            <th>Keterangan</th>
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

		
        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('master/itemstambah',' id="FormulirTambah" enctype="multipart/form-data"');?>  
                    <header class="panel-heading">
                        <h2 class="panel-title">Tambah Item</h2>
                    </header>
                    <div class="panel-body">
                           
                            <div class="form-group mt-lg kode_item">
                                <label class="col-sm-3 control-label">Kode Item (Barcode)<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="kode_item" class="form-control" required/>
                                </div>
                            </div>
                           
                            <div class="form-group mt-lg nama_item">
                                <label class="col-sm-3 control-label">Nama Item<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_item" class="form-control" required/>
                                </div>
                            </div>
                             <div class="form-group tanggal_pembelian">
                                <label class="col-sm-3 control-label">Tanggal Pembelian</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal_pembelian" class="form-control tanggal"  />
                                </div>
                            </div>
                            <div class="form-group nama_penjual">
                                <label class="col-sm-3 control-label">Nama Penjual</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_penjual" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group nama_surat_tanah">
                                <label class="col-sm-3 control-label">Nama Surat</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_surat_tanah" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group status_surat_tanah">
                                <label class="col-sm-3 control-label">Status Surat Tanah</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="status_surat_tanah" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group no_gambar">
                                <label class="col-sm-3 control-label">No Gambar</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_gambar" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group jumlah_bidang">
                                <label class="col-sm-3 control-label">Jumlah Bidang</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="jumlah_bidang" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group luas_surat">
                                <label class="col-sm-3 control-label">Luas Surat</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="luas_surat" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group luas_ukur">
                                <label class="col-sm-3 control-label">Luas Ukur</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="luas_ukur" class="form-control"  />
                                </div>
                            </div><div class="form-group no_pbb">
                                <label class="col-sm-3 control-label">No PBB</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_pbb" class="form-control"  />
                                </div>
                            </div><div class="form-group luas_pbb">
                                <label class="col-sm-3 control-label">Luas PBB</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="luas_pbb" class="form-control"  />
                                </div>
                            </div><div class="form-group njop">
                                <label class="col-sm-3 control-label">njop</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="njop" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group satuan_harga_pengalihan">
                                <label class="col-sm-3 control-label">Satuan Harga Pengalihan</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="satuan_harga_pengalihan" class="form-control"  />
                                </div>
                            </div><div class="form-group total_harga_pengalihan">
                                <label class="col-sm-3 control-label">Total Harga Pengalihan</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="total_harga_pengalihan" class="form-control"  />
                                </div>
                            </div><div class="form-group nama_makelar">
                                <label class="col-sm-3 control-label">Makelar</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_makelar" class="form-control"  />
                                </div>
                            </div><div class="form-group nilai">
                                <label class="col-sm-3 control-label">Nilai</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nilai" class="form-control"  />
                                </div>
                            </div><div class="form-group tanggal_pengalihan">
                                <label class="col-sm-3 control-label">Tanggal Pengalihan</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal_pengalihan" class="form-control tanggal"  />
                                </div>
                            </div><div class="form-group akta_pengalihan">
                                <label class="col-sm-3 control-label">Akta Pengalihan</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="akta_pengalihan" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group nama_pengalihan">
                                <label class="col-sm-3 control-label">Nama Pengalihan</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_pengalihan" class="form-control"  />
                                </div>
                            </div><div class="form-group pematangan">
                                <label class="col-sm-3 control-label">Pematangan</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="pematangan" class="form-control"  />
                                </div>
                            </div><div class="form-group ganti_rugi">
                                <label class="col-sm-3 control-label">Ganti Rugi</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="" class="form-control"  />
                                </div>
                            </div><div class="form-group pbb">
                                <label class="col-sm-3 control-label">PBB</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="pbb" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group lain">
                                <label class="col-sm-3 control-label">Lain-lain</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="lain" class="form-control"  />
                                </div>
                            </div><div class="form-group harga_perm">
                                <label class="col-sm-3 control-label"></span>Harga / M^2</label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga_perm" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control" name="keterangan"></textarea>
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

        <div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel panel-primary">   
                    <header class="panel-heading">
                        <h2 class="panel-title">Detail Obat / Alkes</h2>
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
        
        <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('master/itemsedit',' id="FormulirEdit"  enctype="multipart/form-data"');?>  
                    <input type="hidden" name="idd" id="idd">
                    <header class="panel-heading">
                        <h2 class="panel-title">Edit Data Obat/Alkes</h2>
                    </header>
                    <div class="panel-body">
                            <div class="form-group mt-lg kode_item">
                                <label class="col-sm-3 control-label">Kode Item (Barcode)<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="kode_item" id="kode_item" class="form-control" required/>
                                </div>
                            </div>
                            
                            <div class="form-group mt-lg nama_item">
                                <label class="col-sm-3 control-label">Nama Item<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_item" id="nama_item" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group harga_jual">
                                <label class="col-sm-3 control-label">Harga Beli<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga_beli"   id="harga_beli" class="form-control mask_price" required />
                                </div>
                            </div> 
                            <div class="form-group harga_jual">
                                <label class="col-sm-3 control-label">Harga Jual 1<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga_jual1"   id="harga_jual1" class="form-control mask_price" required />
                                </div>
                            </div> 
                            <div class="form-group harga_jual">
                                <label class="col-sm-3 control-label">Harga Jual 2<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga_jual2"   id="harga_jual2" class="form-control mask_price" required />
                                </div>
                            </div> 
                            <div class="form-group harga_jual">
                                <label class="col-sm-3 control-label">Harga Jual 3<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga_jual3"   id="harga_jual3" class="form-control mask_price" required />
                                </div>
                            </div> 
                            <div class="form-group harga_jual">
                                <label class="col-sm-3 control-label">Harga Jual 4<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga_jual4"   id="harga_jual4" class="form-control mask_price" required />
                                </div>
                            </div> 
                           
                            <div class="form-group harga_jual">
                                <label class="col-sm-3 control-label">Stok Minimal</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="stok_minimal" id="stok_minimal" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group gambar">
                                <label class="col-sm-3 control-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar"   class="form-control"/><br>
                                    <img id="gambar" width="200" alt="gambar produk">
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control"  id="keterangan"   name="keterangan"></textarea>
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
                                <?php echo form_open('master/itemshapus',' id="FormulirHapus"');?>  
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
		<script src="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.js"></script>
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
                    "url": "<?php echo base_url()?>master/dataitems",
                    "type": "GET"
                }, 
                "columnDefs": [
                    { 
                        "targets": [ 0 ], 
                        "orderable": false, 
                    },
                ],  
            }); 
			
            document.getElementById("FormulirTambah").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitform").setAttribute('disabled','disabled');
			$('#submitform').html('Loading ...');
			var form = $('#FormulirTambah')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'POST',
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
                    tableitems.ajax.reload();   
                    document.getElementById("submitform").removeAttribute('disabled'); 
                    $('#tambahData').modal('hide'); 
                    document.getElementById("FormulirTambah").reset();  
                    $('#submitform').html('Submit');   
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
            function detail(elem){
		        var dataId = $(elem).data("id");   
        		$('#detailData').modal();    
                $('#showdetail').html('Loading...'); 
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>master/itemdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) { 
                        var datarow='';
                        $.each(response, function(i, item) {
                            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                            datarow+="<tr><td>Kode Item (Barcode)</td><td>: "+item.kode_item+"</td></tr>";
                           
                            datarow+="<tr><td>Nama Item</td><td>: "+item.nama_item+"</td></tr>";
                            datarow+="<tr><td>Harga Beli</td><td>: "+item.harga_beli+"</td></tr>";
                            datarow+="<tr><td>Harga Jual 1</td><td>: "+item.harga_jual1+"</td></tr>";
                            datarow+="<tr><td>Harga Jual 2</td><td>: "+item.harga_jual2+"</td></tr>";
                            datarow+="<tr><td>Harga Jual 3</td><td>: "+item.harga_jual3+"</td></tr>";
                            datarow+="<tr><td>Harga Jual 4</td><td>: "+item.harga_jual4+"</td></tr>";
                         
                            datarow+="<tr><td>Stok Minimal</td><td>: "+item.stok_minimal+"</td></tr>";
                            datarow+="<tr><td>Gambar</td><td> <img src='<?php echo base_url()?>images/"+item.gambar+"' width='200' ></td></tr>";
                            datarow+="<tr><td>Keterangan</td><td>: "+item.keterangan+"</td></tr>";
                            datarow+="</table>";
                        });
                        $('#showdetail').html(datarow);
                    }
                });  
                return false;
            }
            function edit(elem){
		        var dataId = $(elem).data("id");   
                document.getElementById("idd").setAttribute('value', dataId);
        		$('#editData').modal();        
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>master/itemdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) {  
                        $.each(response, function(i, item) { 
                        document.getElementById("kode_item").setAttribute('value', item.kode_item); 
                       
                        document.getElementById("keterangan").value = item.keterangan;
                        document.getElementById("nama_item").value = item.nama_item;
                        document.getElementById("harga_jual1").value = item.harga_jual1_edit;
                        document.getElementById("harga_beli").value = item.harga_beli_edit;
                        document.getElementById("harga_jual2").value = item.harga_jual2_edit;
                        document.getElementById("harga_jual3").value = item.harga_jual3_edit;
                        document.getElementById("harga_jual4").value = item.harga_jual4_edit;
                        document.getElementById("stok_minimal").value = item.stok_minimal;
                        document.getElementById("gambar").src = '<?php echo base_url()?>images/'+item.gambar; 
                        }); 
                    }
                });  
                return false;
            }
            document.getElementById("FormulirEdit").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformEdit").setAttribute('disabled','disabled');
			$('#submitformEdit').html('Loading ...');
			var form = $('#FormulirEdit')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'POST',
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
                    tableitems.ajax.reload();    
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
			type 		: 'POST',
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
                    tableitems.ajax.reload();
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
              
        </script>
	</body>
</html>