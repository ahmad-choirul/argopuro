 <section class="panel">
  <header class="panel-heading">    
    <form action="" method="get">
      <div class="row show-grid">
        <div class="col-md-2" align="left"><h2 class="panel-title">Nama Perumahan </h2></div>
        <div class="col-sm-3">
          <select data-plugin-selectTwo class="form-control" onchange='this.form.submit()' required name="id_perumahan">  
            <option value="">Pilih Lokasi</option>
            <?php foreach ($perumahan as $aa): ?>
             <option value="<?php echo $aa->id;?>" <?php if ($id_perumahan == $aa->id ) echo 'selected' ; ?> ><?php echo $aa->nama_regional;?> ( <?php echo $aa->nama_status;?> )</option>
           <?php endforeach; ?>
         </select> 
       </div>

       <div class="col-sm-2">
        <select data-plugin-selectTwo class="form-control" onchange='this.form.submit()' required name="status_surat">  
          <option value="">Semua</option>
          <option value="">Belum</option>
          <option value="">Proses</option>
          <option value="">Terbit</option>
        </select> 
      </div>
      <div class="col-sm-1">
        <a class="btn btn-primary" href="<?php echo site_url('Export_excel/excellaporanprosesinduk  /').$id_perumahan ?>"> cetak </a>
      </div>
      <?php  
      echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-2" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
      echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-2" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#uploaddata"><i class="fa fa-plus"></i> Upload Data</a></div>':'';
      ?> 
    </div>
  </form>
</header>
<div class="panel-body"> 
  <div class="table" style="white-space: nowrap;">
   <table class="table table-bordered table-hover table-striped tableitem" id="itemsdata">
    <thead style="position: sticky;">
     <tr>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">NO</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">Aksi</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">BLOK</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">JML KAV</th>
       <th colspan="3" rowspan="1" style="text-align: center;vertical-align: middle;">L. TANAH</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">NO INDUK</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">NO SERT </th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">TGL DAFTAR</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">TGL TERBIT</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">BATAS WAKTU HGB</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">KETERANGAN</th>
     </tr>
     <tr>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">TECHNIC</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">SERT</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">SELISIH</th>
     </tr>


   </thead>
   <tbody>

    <?php $no=1; foreach ($datastok as $data): ?>

    <?php 
     $tomboljual = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<a href="#" class="mb-xs mt-xs mr-xs btn btn-success" onclick="jual(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'">Jual</a>':'';
    $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'">Edit</a></li>':'';
    $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'">Hapus</a></li>':'';
    $tombol='
    <div class="btn-group dropup">
    <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action</button>
    <ul class="dropdown-menu" role="menu"> 
    <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'">Detail</a></li> 
    '.$tomboledit.'
    '.$tombolhapus.'
    </ul>
    </div>
    ';
    $luas_teknik = $data->luas_teknik;
    $dataitem = $this->master_model->getfullstoksplit($data->id_stok_split);

    ?>

    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $tombol; ?></td>
      <td><?php echo $tomboljual; ?></td>
      <td><?php echo $data->blok; ?></td>
      <td><?php echo $data->jml_kvl; ?></td>
      <td><?php echo  $luas_teknik ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php foreach ($dataitem as $key => $value): ?>

      <?php if ($value['tgl_terbit_blok']=='0000-00-00'): ?>
        <tr style="background-color:#ffbaba">
          <?php else: ?>
            <tr style="background-color:#c0ffba">
            <?php endif ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $luas_teknik ?></td>
            <td><?php echo $value['luas_terbit_blok']; ?></td>
            <td><?php echo $luas_teknik -= $value['luas_terbit_blok']; ?></td>
            <td><?php echo $value['no_terbit_shgb']; ?></td>
            <td><?php echo $value['no_shgb_blok']; ?></td>
            <td><?php echo tgl_indo($value['tgl_daftar_blok']); ?></td>
            <td><?php echo tgl_indo($value['tgl_terbit_blok']); ?></td>
            <td>ini dapat darimana</td>
            <td></td>
          </tr>
        <?php endforeach ?>
      <?php endforeach ?>
    </tbody>
    <tfoot>
     <tr>
       <td colspan="2">TOTAL </td>

       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
     </tr>
   </tfoot>
 </table> 
</div>
</div>
</section>
<script type="text/javascript">
  var tableitems = $('#itemsdata').DataTable({  
    "serverSide": false, 
    "order": [], 

    "columnDefs": [
    { 
      "targets": [0], 
      "orderable": false, 
    },
    ],  
  }); 
</script>