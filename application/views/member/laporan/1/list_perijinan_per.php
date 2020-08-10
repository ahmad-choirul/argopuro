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
              <h2>Master Data Tanah</h2>
          </header>  
          <!-- start: page -->
          <section class="panel">
            <header class="panel-heading">    
                <div class="row show-grid">
                    <div class="col-md-6" align="left"><h2 class="panel-title">Data Tanah </h2></div>
                    <?php  
                    echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                    ?> 
                </div>
            </header>
            <div class="panel-body"> 
              <div >
                  <table class="table table-bordered table-hover table-striped data" style="overflow-x: auto;white-space: nowrap;" id="itemsdata">
                    <thead>
                        <tr>
                            <th rowspan="3" style="text-align: center;"></th>
                            <th rowspan="3" style="text-align: center;">Nama</th>
                            <th rowspan="1" colspan="4" style="text-align: center;">Data Ijin Lokasi </th>
                            <th rowspan="3" style="text-align: center;">Daftar Online OSS</th>
                            <th colspan ="4" style="text-align: center;">Daftar Pertimbangan Teknis</th>
                            <th colspan="3" style="text-align: center;">Daftar Informasi Tata Ruang</th>
                            <th colspan="4" style="text-align: center;">Daftar Ijin Lokasi</th>
                            <th rowspan ="3" style="text-align: center;">Keterangan</th>

                        </tr>
                        <tr>
                            <th rowspan="2"style="text-align: center;">Letak Titik Koordinat</th>
                            <th colspan="3" style="text-align: center;">luas (m2)</th>
                            <th rowspan="2"style="text-align: center;">Tanggal Daftar</th>
                            <th rowspan="2"style="text-align: center;">No Berkas</th>
                            <th rowspan="2"style="text-align: center;">Tanggal Terbit</th>
                            <th rowspan="2"style="text-align: center;">No SK</th>
                            <th rowspan="2"style="text-align: center;">Tanggal Daftar</th>
                            <th rowspan="2"style="text-align: center;">Tanggal Terbit</th>
                            <th rowspan="2"style="text-align: center;">No Surat</th>
                            <th rowspan="2"style="text-align: center;">Tanggal Daftar</th>
                            <th rowspan="2"style="text-align: center;">Tanggal Terbit</th>
                            <th rowspan="2"style="text-align: center;">No Ijin</th>
                            <th rowspan="2"style="text-align: center;">Masa Berlaku</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">Daftar</th>
                            <th style="text-align: center;">Terbit</th>
                            <th style="text-align: center;">Selisih</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> 
            </div></div>
        </section>
        <!-- end: page -->
    </section>
</div>
</section>



<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <section class="panel panel-primary">
                <?php echo form_open('master/itemstambah',' id="FormulirTambah" enctype="multipart/form-data"');?>  
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Item</h2>
                </header>
                <div class="panel-body">


                    <div class="form-group mt-lg nama_target">
                        <label class="col-sm-3 control-label">Lokasi<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" required name="id_perumahan">  
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($perumahan2 as $aa): ?>
                                    <option value="<?php echo $aa->id;?>" <?php echo ($id_perumahan == $aa->id) ? 'selected' : ''; ?>><?php echo $aa->nama_regional;?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group mt-lg titik_koordinat">
                        <label class="col-sm-3 control-label">Titik Koordinat<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="titik_koordinat" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group luas_daftar">
                        <label class="col-sm-3 control-label">Luas (m2)</span></label>
                        <div class="col-sm-5">
                            <input type="number" name="luas_daftar" class="form-control" placeholder="Luas daftar"  />
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="luas_terbit" class="form-control"  placeholder="Luas terbit" />
                        </div>
                    </div>
                    <div class="form-group daftar_online_oss">
                        <label class="col-sm-3 control-label">Tanggal Daftar OSS</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="daftar_online_oss" class="form-control tanggal" placeholder="Tanggal Daftar OSS" />
                        </div>
                    </div>
                    <div class="form-group tgl_daftar_pertimbangan">
                        <label class="col-sm-3 control-label">Daftar Pertimbangan</span></label>
                        <div class="col-sm-2">
                            <input type="text" name="tgl_daftar_pertimbangan" class="form-control tanggal" placeholder="Tanggal Daftar"  />
                        </div>
                        <div class="col-sm-3">
                             <input type="text" name="no_berkas_pertimbangan" class="form-control" placeholder="No Berkas Pertimbangan"  />
                        </div>
                        <div class="col-sm-2">
                             <input type="text" name="tgl_terbit_pertimbangan" class="form-control tanggal" placeholder="tgl terbit Pertimbangan"  />
                        </div>
                        <div class="col-sm-2">
                             <input type="text" name="nomor_sk_pertimbangan" class="form-control" placeholder="no Sk Pertimbangan"  />
                        </div>
                    </div>

                      <div class="form-group tgl_daftar_tata_ruang">
                        <label class="col-sm-3 control-label">Daftar Informasi Tata RUang</span></label>
                        <div class="col-sm-3">
                           <input type="text" name="tgl_daftar_tata_ruang" class="form-control tanggal" placeholder="Tanggal daftar tata ruang" />
                        </div>
                        <div class="col-sm-3">
                           <input type="text" name="tgl_terbit_tata_ruang" class="form-control tanggal" placeholder="tanggal terbit tata ruang" />
                        </div>
                        <div class="col-sm-3">
                             <input type="text" name="nomor_surat_tata_ruang" class="form-control" placeholder="nomor surat tata ruang" />
                        </div>
                    </div>
                    <div class="form-group tgl_daftar_ijin">
                        <label class="col-sm-3 control-label">Ijin Lokasi</span></label>
                        <div class="col-sm-2">
                            <input type="text" name="tgl_daftar_ijin" class="form-control tanggal" placeholder="Tanggal Daftar"  />
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="tgl_terbit_ijin" class="form-control tanggal" placeholder="Tanggal Terbit"  />
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="nomor_ijin" class="form-control" placeholder="nomor ijin" />
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="masa_berlaku_ijin" class="form-control tanggal" placeholder="masa berlaku ijin" />
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
<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="detailData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class="form-group mt-lg titik_koordinat">
                        <label class="col-sm-3 control-label">Nama tanah<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="titik_koordinat" id="titik_koordinat" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group daftar_online_oss">
                        <label class="col-sm-3 control-label">Tanggal Pembelian</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="daftar_online_oss" id="daftar_online_oss" class="form-control tanggal"  />
                        </div>
                    </div>
                    <div class="form-group tgl_daftar_pertimbangan">
                        <label class="col-sm-3 control-label">Nama Penjual</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_daftar_pertimbangan" id="tgl_daftar_pertimbangan" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group tgl_daftar_tata_ruang">
                        <label class="col-sm-3 control-label">Nama Surat</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_daftar_tata_ruang" id="tgl_daftar_tata_ruang" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group mt-lg nama_target">
                        <label class="col-sm-3 control-label">Sertifikat<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select data-plugin-selectTwo class="form-control" required name="no_berkas_pertimbangan" id="no_berkas_pertimbangan">  
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($sertifikat_tanah as $aa): ?>
                                    <option value="<?php echo $aa->id_sertifikat_tanah;?>"><?php echo $aa->nama_sertifikat;?> / <?php echo $aa->nama_sertifikat;?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group tgl_terbit_tata_ruang">
                        <label class="col-sm-3 control-label">No Gambar</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_terbit_tata_ruang" id="tgl_terbit_tata_ruang" class="form-control"  />
                        </div>
                    </div>
                    <div class="form-group nomor_surat_tata_ruang">
                        <label class="col-sm-3 control-label">Jumlah Bidang</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nomor_surat_tata_ruang" id="nomor_surat_tata_ruang" class="form-control"  />
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
                    </div><div class="form-group tgl_terbit_ijin">
                        <label class="col-sm-3 control-label">Luas PBB</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="tgl_terbit_ijin" id="tgl_terbit_ijin" class="form-control"  />
                        </div>
                    </div><div class="form-group nomor_ijin">
                        <label class="col-sm-3 control-label">nomor_ijin</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nomor_ijin" id="nomor_ijin" class="form-control"  />
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
 $('.tanggal').datepicker({
    format: 'yyyy-mm-dd' 
});   
 var tableitems = $('#itemsdata').DataTable({  
    "serverSide": true, 
    "order": [], 
    "ajax": {
        "url": "<?php echo base_url()?>Laporan/data_perijinan/<?php echo $id_perumahan ?>",
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
                    //window.settimeout(function() {  location.reload();}, 2000);
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

            datarow+="<tr><td>kode_item</td><td>: "+item.kode_item+"</td></tr>";
            datarow+="<tr><td>titik_koordinat</td><td>: "+item.titik_koordinat+"</td></tr>";
            datarow+="<tr><td>daftar_online_oss</td><td>: "+item.daftar_online_oss+"</td></tr>";
            datarow+="<tr><td>tgl_daftar_pertimbangan</td><td>: "+item.tgl_daftar_pertimbangan+"</td></tr>";
            datarow+="<tr><td>tgl_daftar_tata_ruang</td><td>: "+item.tgl_daftar_tata_ruang+"</td></tr>";
            datarow+="<tr><td>no_berkas_pertimbangan</td><td>: "+item.nama_no_berkas_pertimbangan+"</td></tr>";
            datarow+="<tr><td>tgl_terbit_tata_ruang</td><td>: "+item.tgl_terbit_tata_ruang+"</td></tr>";
            datarow+="<tr><td>nomor_surat_tata_ruang</td><td>: "+item.nomor_surat_tata_ruang+"</td></tr>";
            datarow+="<tr><td>luas_surat</td><td>: "+item.luas_surat+"</td></tr>";
            datarow+="<tr><td>luas_ukur</td><td>: "+item.luas_ukur+"</td></tr>";
            datarow+="<tr><td>no_pbb</td><td>: "+item.no_pbb+"</td></tr>";
            datarow+="<tr><td>tgl_terbit_ijin</td><td>: "+item.tgl_terbit_ijin+"</td></tr>";
            datarow+="<tr><td>nomor_ijin</td><td>: "+item.nomor_ijin+"</td></tr>";
            datarow+="<tr><td>satuan_harga_pengalihan</td><td>: "+item.satuan_harga_pengalihantampil+"</td></tr>";
            datarow+="<tr><td>total_harga_pengalihan</td><td>: "+item.total_harga_pengalihantampil+"</td></tr>";
            datarow+="<tr><td>nama_makelar</td><td>: "+item.nama_makelar+"</td></tr>";
            datarow+="<tr><td>nilai</td><td>: "+item.nilaitampil+"</td></tr>";
            datarow+="<tr><td>tanggal_pengalihan</td><td>: "+item.tanggal_pengalihan+"</td></tr>";
            datarow+="<tr><td>akta_pengalihan</td><td>: "+item.akta_pengalihan+"</td></tr>";
            datarow+="<tr><td>nama_pengalihan</td><td>: "+item.nama_pengalihan+"</td></tr>";
            datarow+="<tr><td>pematangan</td><td>: "+item.pematangantampil+"</td></tr>";
            datarow+="<tr><td>ganti_rugi</td><td>: "+item.ganti_rugitampil+"</td></tr>";
            datarow+="<tr><td>pbb</td><td>: "+item.pbb+"</td></tr>";
            datarow+="<tr><td>lain</td><td>: "+item.laintampil+"</td></tr>";
            datarow+="<tr><td>harga_perm</td><td>: "+item.harga_permtampil+"</td></tr>";
            datarow+="<tr><td>keterangan</td><td>: "+item.keterangan+"</td></tr>";
            datarow+="<tr><td>Lokasi</td><td>: "+item.nama_regional+"</td></tr>";
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

           document.getElementById("titik_koordinat").setAttribute('value', item.titik_koordinat); 
           document.getElementById("daftar_online_oss").setAttribute('value', item.daftar_online_oss); 
           document.getElementById("tgl_daftar_pertimbangan").setAttribute('value', item.tgl_daftar_pertimbangan); 
           document.getElementById("tgl_daftar_tata_ruang").setAttribute('value', item.tgl_daftar_tata_ruang); 
           document.getElementById("tgl_terbit_tata_ruang").setAttribute('value', item.tgl_terbit_tata_ruang); 
           document.getElementById("nomor_surat_tata_ruang").setAttribute('value', item.nomor_surat_tata_ruang); 
           document.getElementById("luas_surat").setAttribute('value', item.luas_surat); 
           document.getElementById("luas_ukur").setAttribute('value', item.luas_ukur); 
           document.getElementById("no_pbb").setAttribute('value', item.no_pbb); 
           document.getElementById("tgl_terbit_ijin").setAttribute('value', item.tgl_terbit_ijin); 
           document.getElementById("nomor_ijin").setAttribute('value', item.nomor_ijin); 

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
           $("#no_berkas_pertimbangan").select2("val", item.no_berkas_pertimbangan);   

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
                    //window.settimeout(function() {  location.reload();}, 2000);
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
                    //window.settimeout(function() {  location.reload();}, 2000);
                }); 
e.preventDefault(); 
}); 

</script>
</body>
</html>