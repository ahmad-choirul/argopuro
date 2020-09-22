 <section class="panel">
  <header class="panel-heading">    
                        <form action="" method="get">
    <div class="row show-grid">
      <div class="col-md-2" align="left"><h2 class="panel-title">Nama Perumahan </h2></div>
      <div class="col-sm-4">
        <select data-plugin-selectTwo class="form-control" onchange='this.form.submit()' required name="id_perumahan">  
          <option value="">Pilih Lokasi</option>
          <?php foreach ($perumahan as $aa): ?>
             <option value="<?php echo $aa->id;?>" <?php if ($id_perumahan == $aa->id ) echo 'selected' ; ?> ><?php echo $aa->nama_regional;?> ( <?php echo $aa->nama_status;?> )</option>
          <?php endforeach; ?>
        </select> 
      </div>
      <div class="col-sm-2">
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
         <th rowspan="4" style="text-align: center;vertical-align: middle;">NO</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">Aksi</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">BLOK</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">JML KAV</th>
         <th colspan="3" rowspan="2" style="text-align: center;vertical-align: middle;">L. TANAH</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">NO INDUK</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">NO SERT </th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">TGL DAFTAR</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">TGL TERBIT</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">BATAS WAKTU HGB</th>
         <th colspan="6" rowspan="2" style="text-align: center;vertical-align: middle;">BELUM TERBIT SPLIT</th>
         <th colspan="6" rowspan="2" style="text-align: center;vertical-align: middle;">TERBIT STOK</th>
         <th colspan="12" style="text-align: center;vertical-align: middle;">PENJUALAN 2020</th>
         <th rowspan="4" style="text-align: center;vertical-align: middle;">KETERANGAN</th>

       </tr>
       <tr>
         <th colspan="6"  style="text-align: center;vertical-align: middle;">STOCK</th>
         <th colspan="6" style="text-align: center;vertical-align: middle;">BELUM TERBIT SPLIT</th>
       </tr>
       <tr>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">TECHNIC</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">SERT</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">SELISIH</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">BELUM PROSES</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">PROSES</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">TOTAL</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">sd 2019</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">2020L</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">TOTAL</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">sd 2019</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">2020L</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">TOTAL</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">BELUM PROSES</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">PROSESL</th>
         <th colspan="2" style="text-align: center;vertical-align: middle;">TOTAL</th>


       </tr>
       <tr>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>
         <th style="text-align: center;vertical-align: middle;">KAV</th>
         <th style="text-align: center;vertical-align: middle;">SERT</th>


       </tr>


     </thead>
     <tbody>

      <?php $no=1; foreach ($datastok as $data): ?>

      <?php 
      $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'">Edit</a></li>':'';
      $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'">Hapus</a></li>':'';
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
      ?>

      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tombol; ?></td>
        <td><?php echo $data->blok; ?></td>
        <td><?php echo $data->jml_kvl; ?></td>
        <td><?php echo $data->luas_teknik; ?></td>
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>
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