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
      <h2>Evaluasi Stok Split </h2>
    </header>  
    <!-- start: page -->
    <div id="tampilstok">

    </div>

    <!-- end: page -->
  </section>
</div>
</section>


<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
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
                <?php foreach ($perumahan as $supp): ?>
                  <option value="<?php echo $aa->id;?>"><?php echo $aa->nama_regional;?> ( <?php echo $aa->nama_status;?> )</option>
                <?php endforeach; ?>
              </select> 
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
          <div class="form-group mt-lg nama_target">
            <label class="col-sm-3 control-label">Sertifikat<span class="required">*</span></label>
            <div class="col-sm-9">
              <select data-plugin-selectTwo class="form-control" required name="status_surat_tanah">  
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
          </div><div class="form-group luas_pbb_bangunan">
            <label class="col-sm-3 control-label">Luas PBB</span></label>
            <div class="col-sm-9">
              <input type="text" name="luas_pbb_bangunan" class="form-control"  />
            </div>
          </div><div class="form-group njop_bangunan">
            <label class="col-sm-3 control-label">njop_bangunan</span></label>
            <div class="col-sm-9">
              <input type="text" name="njop_bangunan" class="form-control"  />
            </div>
          </div>
          <div class="form-group total_harga_pengalihan">
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
              <input type="text" name="ganti_rugi" class="form-control"  />
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

<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="detailData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <section class="panel panel-primary">   
        <header class="panel-heading">
          <h2 class="panel-title">Detail Stok Split</h2>
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

<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="uploaddata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <section class="panel panel-primary">
        <header class="panel-heading">
          <h2 class="panel-title">Upload Stok Split Format Excel</h2>
        </header>         
        <?php  
        if(level_user('tools','import_item',$this->session->userdata('kategori'),'add') > 0){
          ?>  
          <?php echo form_open('tools/view_upload',' id="uploadform" enctype="multipart/form-data"');?>  
        <?php } ?>
        <div class="panel-body">  
          <div class="form-group excelfile">
            <label class="col-sm-3 control-label">Upload File Excel</label>
            <div class="col-sm-9">
              <input type="file" name="excelfile" class="form-control" required/>
              <input type="hidden" name="id_perumahan" value="<?php echo $id_perumahan ?>" class="form-control" required/>
            </div>
          </div> 
          <div class="form-group"> 
            <div class="col-sm-9"> 
              Catatan : 
            </div>
          </div>  
        </div>  
        <footer class="panel-footer">
          <div class="row">
            <div class="col-md-12 text-right">    
              <?php  
              if(level_user('tools','import_item',$this->session->userdata('kategori'),'add') > 0){
                ?>  
                <button class="btn btn-primary modal-confirm" type="submit" id="submitform"><i class="fa fa-upload"></i>Upload</button>
              <?php } ?>
              <a class="btn btn-warning" href="<?php echo base_url()?>excel/formatupload.xlsx" target="_blank"><i class="fa fa-download"></i> Download Format</a>
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
                  <option value="<?php echo $aa->id;?>"><?php echo $aa->nama_regional;?> ( <?php echo $aa->nama_status;?> )</option>
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
          </div><div class="form-group luas_pbb_bangunan">
            <label class="col-sm-3 control-label">Luas PBB</span></label>
            <div class="col-sm-9">
              <input type="text" name="luas_pbb_bangunan" id="luas_pbb_bangunan" class="form-control"  />
            </div>
          </div><div class="form-group njop_bangunan">
            <label class="col-sm-3 control-label">njop_bangunan</span></label>
            <div class="col-sm-9">
              <input type="text" name="njop_bangunan" id="njop_bangunan" class="form-control"  />
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
</script>
<?php  
if(level_user('tools','import_item',$this->session->userdata('kategori'),'add') > 0){
  ?>  
  <script>


  function edit(elem){
    var dataId = $(elem).data("id");
    document.getElementById("id").setAttribute('value', dataId);
    $('#editData').modal();        
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url()?>master/kategoridetail',
      data: 'id=' + dataId,
      dataType  : 'json',
      success: function(response) {  
        $.each(response, function(i, item) { 
          document.getElementById("id").setAttribute('value', item.id);
          document.getElementById("nama_regional").setAttribute('value', item.nama_regional);
                // document.getElementById("status_kategori").setAttribute('value', item.status_kategori); 
                $("#status_regional").val(item.status_regional);
                $("#kabupatenedit").val(item.id_kabupaten);
                $("#kecamatanedit").append(new Option(item.nama_kecamatan, item.id_kecamatan));  
                $("#lokasi").append(new Option(item.nama_desa, item.lokasi));  
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
     type     : 'POST',
     url    : $(this).attr('action'),
     data     : formData, 
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
      tablekategori.ajax.reload();    
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
    //window.setTimeout(function() {  location.reload();}, 2000);
  }); 
  e.preventDefault(); 
}); 
  function hapus(elem){ 
    var dataId = $(elem).data("id");
    document.getElementById("idelete").setAttribute('value', dataId);
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
     type     : 'POST',
     url    : $(this).attr('action'),
     data     : formData, 
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
      tablekategori.ajax.reload();
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
    //window.setTimeout(function() {  location.reload();}, 2000);
  }); 
  e.preventDefault(); 
}); 

    function detail(elem){
      var dataId = $(elem).data("id");   
      $('#detailData').modal();    
      $('#showdetail').html('Loading...'); 
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>laporan/stoksplitdetail',
        data: 'id=' + dataId,
        dataType    : 'json',
        success: function(response) { 
          var datarow='<div class="row">';
          $.each(response.datarows, function(i, item) {
            // document.getElementById('linkprint').setAttribute('href', '<?php echo base_url()?>pembelian/printpo/'+item.nomor_po);
            // document.getElementById('linkpdf').setAttribute('href', '<?php echo base_url()?>pembelian/pdfpo/'+item.nomor_po);
            datarow+='<div class="col-md-6">';
            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
            datarow+="<tr><td>Lokasi</td><td>: "+item.nama_regional+"</td></tr>";
            datarow+="<tr><td>Blok</td><td>: "+item.blok+"</td></tr>";
            datarow+="<tr><td>Jumlah Kavling </td><td>: "+item.jml_kvl+"</td></tr>";
            datarow+="</table>";
            datarow+='</div>';
            datarow+='<div class="col-md-6">';
            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
            datarow+="<tr><td>Luas Teknik</td><td>: "+item.luas_teknik+"</td></tr>";
            datarow+="<tr><td>luas Stok / Terbit</td><td>: "+item.luas_stok+"</td></tr>"; 
            datarow+="<tr><td>luas Sisa</td><td>: "+item.sisa_luas+"</td></tr>"; 
            datarow+="</table>";
            datarow+='</div>';
          });
          datarow+='</div>';
          datarow+='<div class="row"><div class="col-md-12">';
          datarow+='<h3>Rincian</h3>';
          datarow+='<div class="table-responsive" style="max-height:420px;">';  
          datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
          datarow+="<thead><tr>";
          datarow+="<th>Blok</th>";
          datarow+="<th>Panjang Daftar</th>";
          datarow+="<th>Lebar Daftar</th>";
          datarow+="<th>Luas Daftar</th>";
          datarow+="<th>Luas Terbit</th>";
          datarow+="<th>Sisa Luas</th>";
          datarow+="<th>No SHGB</th>";
          datarow+="<th>Masa Berlaku</th>";
          datarow+="<th>No Daftar</th>";
          datarow+="<th>Tgl Daftar</th>";
          datarow+="<th>Tgl Terbit</th>";
          datarow+="<th>Keterangan</th>";
          datarow+="</tr></thead>";
          datarow+="<tbody>";

          $.each(response.datasub, function(i, itemsub) {
            datarow+="<tr>";
            datarow+="<td>"+itemsub.blok+"</td>"; 
            datarow+="<td>"+itemsub.panjang_daftar_blok+"</td>";
            datarow+="<td>"+itemsub.lebar_daftar_blok+"</td>";
            datarow+="<td>"+itemsub.luas_daftar_blok+"</td>";
            datarow+="<td>"+itemsub.luas_terbit_blok+"</td>"; 
            datarow+="<td>"+itemsub.sisa_luas+"</td>"; 
            datarow+="<td>"+itemsub.no_shgb_blok+"</td>"; 
            datarow+="<td>"+itemsub.masa_berlaku_bloktampil+"</td>"; 
            datarow+="<td>"+itemsub.no_daftar_blok+"</td>"; 
            datarow+="<td>"+itemsub.tgl_daftar_bloktampil+"</td>"; 
            datarow+="<td>"+itemsub.tgl_terbit_bloktampil+"</td>"; 
            datarow+="<td>"+itemsub.keterangan+"</td>"; 
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

    document.getElementById("uploadform").addEventListener("submit", function (e) {  
      blurForm();       
      PNotify.removeAll();   
      $('.help-block').hide();
      $('.form-group').removeClass('has-error');
      document.getElementById("submitform").setAttribute('disabled','disabled');
      $('#submitform').html('Loading ...');
      var form = $('#uploadform')[0];
      var formData = new FormData(form);
      var xhrAjax = $.ajax({
        type    : 'POST',
        url     : $(this).attr('action'),
        data    : formData, 
        processData: false,
        contentType: false,
        cache: false, 
        dataType  : 'json'
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
                text: 'gagal mengupload semua data, pastikan data terisi dengan benar dan sudah memilih lokasi',
                type: 'danger'
              }); 
            }
          }
        } else { 
          $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
          document.getElementById("submitform").removeAttribute('disabled'); 
          $('#uploaddata').modal('hide'); 
          document.getElementById("uploadform").reset();  
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
        // window.setTimeout(function() {  location.reload();}, 2000);
      }); 
      e.preventDefault(); 
    }); 
    
  </script>
<?php } ?>
<script type="text/javascript">
  function refresh() { 
    var id_perumahan = '<?php echo $id_perumahan ?>';

    $.ajax({
      type: 'GET',
      url: '<?php echo base_url(); ?>laporan/ajaxstoksplit/',
      data: 'id_perumahan='+id_perumahan,
      success: function (html) { 
        $('#tampilstok').html(html); 
      }
    }); 
  }
</script>
</body>
</html>