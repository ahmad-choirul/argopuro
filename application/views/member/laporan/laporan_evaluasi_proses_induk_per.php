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
      <h2>Evaluasi Proses Induk 12 </h2>
  </header>  
  <!-- start: page -->
  <div class="row">
      <section class="panel col-md-12">
        <header class="panel-heading">    
            <div class="row show-grid">
                <div class="col-md-8" align="left"><h2 class="panel-title">PROSES PENYELESAIAN INDUK</h2>
                </div>

                <form action="" method="get">
                    <div class="form-group mt-lg nama_target">
                      <div class="col-sm-5">
                        <select data-plugin-selectTwo class="form-control" onchange='this.form.submit()' required name="id_perumahan">  
                          <option value="">Pilih Lokasi</option>
                          <?php foreach ($perumahan as $aa): ?>
                            <option value="<?php echo $aa->id;?>" <?php if ($id_perumahan == $aa->id ) echo 'selected' ; ?> ><?php echo $aa->nama_regional;?></option>
                        <?php endforeach; ?>
                    </select> 
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-primary" href="<?php echo site_url('Export_excel/excellaporanbelumshgb/').$id_perumahan ?>"> cetak </a>
                </div>
                <div class="col-sm-5">
                 <?php
                 echo level_user('master','proses_induk',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6 pull-right" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                 ?>
             </div>
         </div>
     </form>
 </div>
</header>
<div id="kontendata"></div>
<!-- end: page -->
</section>
</div>
</section>

<div class="modal fade bd-example-modal-lg" id="detailtanah"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:90%">
        <div class="modal-content">
            <section class="panel panel-primary">   
                <header class="panel-heading">
                    <div class="row">
                        <div class="col-md-3 text-left"> 
                            <h2 class="panel-title">Detail Tanah</h2>  
                        </div>
                        <div class="col-md-9 text-right">
                            <a class="btn btn-success" id="linkprint" target="_blank"><i class="fa fa-print"></i> Print</a>
                            <a class="btn btn-success" id="linkpdf" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            <a class="btn btn-success" id="btnbayar" target="_blank"><i class="fa fa-money"></i> Tambah</a>
                        </div>
                    </div>
                </header>
                <div class="panel-body" id="showdetailtanah"> 
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

<div class="modal fade bd-example-modal-lg" data-keyboard="false" data-backdrop="static"  id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <section class="panel panel-primary">
                <?php echo form_open('laporan/master_proses_induktambah',' id="FormulirTambah" enctype="multipart/form-data"');?> 
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Item</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group no_surat_tanah">
                        <label class="col-sm-3 control-label">No Surat</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="no_surat_tanah" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group nama_surat_tanah">
                        <label class="col-sm-3 control-label">Nama Surat</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_surat_tanah" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group luas">
                        <label class="col-sm-3 control-label">Luas (m2)</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="luas" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group tanggal_pengalihan">
                        <label class="col-sm-3 control-label"> Detail Daftar SK </span></label>
                        <div class="col-sm-4">
                            <input type="text" name="tanggal_daftar_sk_hak" style="color: grey; text-align: center;" class="form-control tanggal" placeholder="Tanggal Daftar SK Hak" title="Tanggal Daftar SK Hak"  />
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="no_daftar_sk_hak" class="form-control" placeholder="No Daftar SK Hak"  />
                        </div>
                    </div>

                    <div class="form-group tanggal_pengalihan">
                        <label class="col-sm-3 control-label"> Detail Terbit SK </span></label>
                        <div class="col-sm-4">
                            <input type="text" name="tanggal_terbit_sk_hak" style="color: grey; text-align: center;" class="form-control tanggal" placeholder="Tanggal Terbit SK Hak" title="Tanggal Terbit SK Hak"  />
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="no_terbit_sk_hak" class="form-control" placeholder="No Terbit SK Hak"  />
                        </div>
                    </div>

                    <div class="form-group tanggal_pengalihan">
                        <label class="col-sm-3 control-label"> Detail Daftar SHGB </span></label>
                        <div class="col-sm-4">
                            <input type="text" name="tanggal_daftar_shgb" style="color: grey; text-align: center;" class="form-control tanggal" placeholder="Tanggal Daftar SHGB" title="Tanggal Daftar SHGB"  />
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="no_daftar_shgb" class="form-control" placeholder="No Daftar SHGB"  />
                        </div>
                    </div>

                    <div class="form-group tanggal_pengalihan">
                        <label class="col-sm-3 control-label"> Detail Terbit SHGB </span></label>
                        <div class="col-sm-3">
                            <input type="text" name="tanggal_terbit_shgb" style="color: grey; text-align: center;" class="form-control tanggal" placeholder="Tanggal Terbit SHGB" title="Tanggal Terbit SHGB"  />
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="no_terbit_shgb" class="form-control" placeholder="No Terbit SHGB"  />
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="masa_berlaku_shgb" style="color: grey; text-align: center;" class="form-control tanggal" placeholder="Masa Berlaku SHGB" title="Masa Berlaku SHGB"  />
                        </div>
                    </div>
                    
                    <div class="form-group luas">
                        <label class="col-sm-3 control-label">Target Penyelesaian</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="target_penyelesaian" class="form-control tanggal"  />
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

<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel panel-primary">
                <?php echo form_open('master/itemsedit',' id="FormulirEdit"  enctype="multipart/form-data"');?>  
                <input type="hidden" name="idd" id="idd">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Data Tanah/Aset</h2>
                </header>
                <div class="panel-body">

                    <div class="form-group mt-lg nama_target">
                        <label class="col-sm-3 control-label">Lokasi<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" required id="id_perumahan" name="id_perumahan">  
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($perumahan as $supp): ?>
                                    <option value="<?php echo $supp->id;?>"><?php echo $supp->nama_regional;?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group mt-lg nama_item">
                        <label class="col-sm-3 control-label">Nama tanah<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_item" id="nama_item" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group tanggal_pembelian">
                        <label class="col-sm-3 control-label">Tanggal Pembelian</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control tanggal"  />
                        </div>
                    </div>
                    <div class="form-group nama_penjual">
                        <label class="col-sm-3 control-label">Nama Penjual</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_penjual" id="nama_penjual" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group nama_surat_tanah">
                        <label class="col-sm-3 control-label">Nama Surat</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_surat_tanah" id="nama_surat_tanah" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group mt-lg nama_target">
                        <label class="col-sm-3 control-label">Sertifikat<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" required name="status_surat_tanah" id="status_surat_tanah">  
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($sertifikat_tanah as $aa): ?>
                                    <option value="<?php echo $aa->id_sertifikat_tanah;?>"><?php echo $aa->nama_sertifikat;?> / <?php echo $aa->nama_sertifikat;?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group no_gambar">
                        <label class="col-sm-3 control-label">No Gambar</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="no_gambar" id="no_gambar" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group jumlah_bidang">
                        <label class="col-sm-3 control-label">Jumlah Bidang</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="jumlah_bidang" id="jumlah_bidang" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group luas_surat">
                        <label class="col-sm-3 control-label">Luas Surat</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="luas_surat" id="luas_surat" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group luas_ukur">
                        <label class="col-sm-3 control-label">Luas Ukur</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="luas_ukur" id="luas_ukur" class="form-control"  />
                        </div>
                    </div><div class="form-group no_pbb">
                        <label class="col-sm-3 control-label">No PBB</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="no_pbb" id="no_pbb" class="form-control"  />
                        </div>
                    </div><div class="form-group luas_pbb">
                        <label class="col-sm-3 control-label">Luas PBB</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="luas_pbb" id="luas_pbb" class="form-control"  />
                        </div>
                    </div><div class="form-group njop">
                        <label class="col-sm-3 control-label">njop</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="njop" id="njop" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group total_harga_pengalihan">
                        <label class="col-sm-3 control-label">Total Harga Pengalihan</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="total_harga_pengalihan" id="total_harga_pengalihan" class="form-control"  />
                        </div>
                    </div><div class="form-group nama_makelar">
                        <label class="col-sm-3 control-label">Makelar</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_makelar" id="nama_makelar" class="form-control"  />
                        </div>
                    </div><div class="form-group nilai">
                        <label class="col-sm-3 control-label">Nilai</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nilai" id="nilai" class="form-control"  />
                        </div>
                    </div><div class="form-group tanggal_pengalihan">
                        <label class="col-sm-3 control-label">Tanggal Pengalihan</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tanggal_pengalihan" id="tanggal_pengalihan" class="form-control tanggal"  />
                        </div>
                    </div><div class="form-group akta_pengalihan">
                        <label class="col-sm-3 control-label">Akta Pengalihan</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="akta_pengalihan" id="akta_pengalihan" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group nama_pengalihan">
                        <label class="col-sm-3 control-label">Nama Pengalihan</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_pengalihan" id="nama_pengalihan" class="form-control"  />
                        </div>
                    </div><div class="form-group pematangan">
                        <label class="col-sm-3 control-label">Pematangan</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="pematangan" id="pematangan" class="form-control"  />
                        </div>
                    </div><div class="form-group ganti_rugi">
                        <label class="col-sm-3 control-label">Ganti Rugi</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="ganti_rugi" id="ganti_rugi" class="form-control"  />
                        </div>
                    </div><div class="form-group pbb">
                        <label class="col-sm-3 control-label">PBB</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="pbb" id="pbb" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group lain">
                        <label class="col-sm-3 control-label">Lain-lain</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="lain" id="lain" class="form-control"  />
                        </div>
                    </div><div class="form-group harga_perm">
                        <label class="col-sm-3 control-label"></span>Harga / M^2</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga_perm" id="harga_perm" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group keterangan">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" name="keterangan" id="keterangan"></textarea>
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
<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<script src="<?php echo base_url()?>assets/javascripts/admin.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
        refresh();
    });
  $('.tanggal').datepicker({
    format: 'yyyy-mm-dd' ,
    autoClose:true
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
         type       : 'POST',
         url        : $(this).attr('action'),
         data       : formData, 
         processData: false,
         contentType: false,
         cache: false, 
         dataType   : 'json'
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
           refresh();   
           document.getElementById("submitform").removeAttribute('disabled'); 
           $('#tambahData').modal('hide'); 
           document.getElementById("FormulirTambah").reset();  
           $('#submitform').html('Submit');   
           new PNotify({
            title: 'Notifikasi',
            text: data.message,
            type: 'success'
        });  
           refresh();    

       }
   }).fail(function(data) { 
    new PNotify({
        title: 'Notifikasi',
        text: "Request gagal, browser akan direload",
        type: 'danger'
    }); 
                    //window.settimeout(function() {  location.reload();}, 2000);
                }); 
   e.preventDefault(); 
}); 

  function detail(elem){
      var dataId = $(elem).data("id");   
      $('#detailtanah').modal();    
      $('#showdetailtanah').html('Loading...'); 
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>laporan/proses_indukdetail',
        data: 'id=' + dataId,
        dataType    : 'json',
        success: function(response) { 
          var datarow='<div class="row">';
          $.each(response.datarows, function(i, item) {
            document.getElementById('btnbayar').setAttribute('href', '<?php echo base_url()?>master/proses_induk/'+item.id_proses_induk);
            datarow+='<div class="col-md-6">';
            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
            datarow+="<tr><td>Nama Penjual</td><td>: "+item.nama_surat_tanah+"</td></tr>";
            datarow+="<tr><td>No Surat</td><td>: "+item.no_surat_tanah+"</td></tr>"; 
            datarow+="<tr><td>Luas</td><td>: "+item.luas+"</td></tr>";
            datarow+="</table>";
            datarow+='</div>';
            datarow+='<div class="col-md-6">';
            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';

            datarow+="<tr><td>Tanggal Daftar SK Hal</td><td>: "+item.tanggal_daftar_sk_haktampil+"</td></tr>";
            datarow+="<tr><td>Tanggal Terbit SK Hal</td><td>: "+item.tanggal_terbit_sk_haktampil+"</td></tr>";
            datarow+="</table>";
            datarow+='</div>';
        });
          datarow+='</div>';
          datarow+='<div class="row"><div class="col-md-12">';
          datarow+='<h3>Rincian Pembayaran</h3>';
          datarow+='<div class="table-responsive" style="max-height:420px;">';  
          datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
          datarow+="<thead><tr>";
          datarow+="<th>Id Detail Proses Induk</th>";
          datarow+="<th>ID Tanah</th>";
          datarow+="<th>Tanggal Proses</th>"; 
          datarow+="<th>Keterangan</th>"; 
          datarow+="</tr></thead>";
          datarow+="<tbody>";

          $.each(response.datasub, function(i, itemsub) {
            datarow+="<tr>";
            datarow+="<td>"+itemsub.id_dtl_proses_induk+"</td>"; 
            datarow+="<td>"+itemsub.id_master_item+"</td>"; 
            datarow+="<td>"+itemsub.tgl_proses_induk+"</td>"; 
            datarow+="<td>"+itemsub.keterangan+"</td>"; 
            datarow+="</tr>"; 
        });  
          datarow+="</tbody>";
          datarow+="</table>";
          datarow+="</div>";
          datarow+='</div></div>';
          $('#showdetailtanah').html(datarow);
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
        dataType    : 'json',
        success: function(response) {  
            $.each(response, function(i, item) { 

               document.getElementById("nama_item").setAttribute('value', item.nama_item); 
               document.getElementById("tanggal_pembelian").setAttribute('value', item.tanggal_pembelian); 
               document.getElementById("nama_penjual").setAttribute('value', item.nama_penjual); 
               document.getElementById("nama_surat_tanah").setAttribute('value', item.nama_surat_tanah);  
               document.getElementById("no_gambar").setAttribute('value', item.no_gambar); 
               document.getElementById("jumlah_bidang").setAttribute('value', item.jumlah_bidang); 
               document.getElementById("luas_surat").setAttribute('value', item.luas_surat); 
               document.getElementById("luas_ukur").setAttribute('value', item.luas_ukur); 
               document.getElementById("no_pbb").setAttribute('value', item.no_pbb); 
               document.getElementById("luas_pbb").setAttribute('value', item.luas_pbb); 
               document.getElementById("njop").setAttribute('value', item.njop); 

               document.getElementById("total_harga_pengalihan").setAttribute('value', item.total_harga_pengalihan); 
               document.getElementById("nama_makelar").setAttribute('value', item.nama_makelar); 
               document.getElementById("nilai").setAttribute('value', item.nilai); 
               document.getElementById("tanggal_pengalihan").setAttribute('value', item.tanggal_pengalihan); 
               document.getElementById("akta_pengalihan").setAttribute('value', item.akta_pengalihan); 
               document.getElementById("nama_pengalihan").setAttribute('value', item.nama_pengalihan); 
               document.getElementById("pematangan").setAttribute('value', item.pematangan); 
               document.getElementById("ganti_rugi").setAttribute('value', item.ganti_rugi); 
               document.getElementById("pbb").setAttribute('value', item.pbb); 
               document.getElementById("lain").setAttribute('value', item.lain); 
               document.getElementById("harga_perm").setAttribute('value', item.harga_perm); 
               document.getElementById("keterangan").value = item.keterangan; 
               $("#id_perumahan").select2("val", item.id_perumahan);   
               $("#status_surat_tanah").select2("val", item.status_surat_tanah);   



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
         type       : 'POST',
         url        : $(this).attr('action'),
         data       : formData, 
         processData: false,
         contentType: false,
         cache: false, 
         dataType   : 'json'
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
            refresh();    
            document.getElementById("submitformEdit").removeAttribute('disabled'); 
            $('#editData').modal('hide');        
            document.getElementById("FormulirEdit").reset();    
            $('#submitformEdit').html('Submit');   
            new PNotify({
                title: 'Notifikasi',
                text: data.message,
                type: 'success'
            });  
            refresh();    

        }
    }).fail(function(data) { 
        new PNotify({
            title: 'Notifikasi',
            text: "Request gagal, browser akan direload",
            type: 'danger'
        }); 
                    //window.settimeout(function() {  location.reload();}, 2000);
                }); 
    e.preventDefault(); 
}); 
  function hapus(elem){ 
      var dataId = $(elem).data("id");
      document.getElementById("idddelete").setAttribute('value', dataId);
      $('#modalHapus').modal();    
      refresh();    
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
         type       : 'POST',
         url        : $(this).attr('action'),
         data       : formData, 
         processData: false,
         contentType: false,
         cache: false, 
         dataType   : 'json'
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
            refresh();
            document.getElementById("submitformHapus").removeAttribute('disabled'); 
            $('#modalHapus').modal('hide');        
            document.getElementById("FormulirHapus").reset();    
            $('#submitformHapus').html('Delete'); 
            new PNotify({
                title: 'Notifikasi',
                text: data.message,
                type: 'success'
            });  
            refresh();    

        }
    }).fail(function(data) { 
        new PNotify({
            title: 'Notifikasi',
            text: "Request gagal, browser akan direload",
            type: 'danger'
        }); 
                    //window.settimeout(function() {  location.reload();}, 2000);
                }); 
    e.preventDefault(); 
}); 
  function refresh() { 

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url(); ?>laporan/pageevaluasiprosesinduk/',
        data: 'id_perumahan=<?php echo $id_perumahan ?>',
        success: function (html) { 
            $('#kontendata').html(html); 
        }
    }); 
}
</script>

</body>
</html>