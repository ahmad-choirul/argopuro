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
        <div class="col-sm-6">
        <a class="btn btn-primary">jumlah penjualan <div id="total_penjualan"></div></a>
        <a class="btn btn-primary">jumlah sertifikat <div id="total_sertifikat"></div></a>
      </div>
     </form>
   </header>
   <div class="panel-body"> 
    <div class="table-responsive" style="white-space: nowrap;">
     <table class="table table-bordered table-hover table-striped tableitem" id="itemsdata">
      <thead style="position: sticky;">
       <tr>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">NO</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Aksi</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Pembeli</th>

         <th rowspan="2" style="text-align: center;vertical-align: middle;">BLOK</th>
         <th colspan="3" rowspan="1" style="text-align: center;vertical-align: middle;">L. TANAH</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">NO INDUK</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">NO SERT </th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">TGL DAFTAR</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">TGL TERBIT</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">BATAS WAKTU HGB</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">NIK</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Pekerjaan</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Tanggal Terima Nego</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Tanggal Penjualan</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Sistem Pembayaran</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Harga</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">KETERANGAN</th>
       </tr>
       <tr>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">TECHNIC</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">SERT</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">SELISIH</th>
       </tr>


     </thead>
     <tbody>

      <?php $total_sertifikat=0;$total_penjualan=0;; $no=1; foreach ($datastok as $data){ ?>

      <?php 
      $total_penjualan++;
      $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($data->id_jual).'">Hapus</a></li>':'';
      $tombol='
      <div class="btn-group dropup">
      <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action</button>
      <ul class="dropdown-menu" role="menu"> 
      '.$tombolhapus.'
      </ul>
      </div>
      ';
      $luas_teknik = $data->luas_teknik;
      $dataitem = $this->master_model->getfullstoksplit($data->id_stok_split);
      $datajual = $this->master_model->getdatapenjualan($data->id_jual);
      ?>
<?php $kolomjual=' 
      <tr>
        <td>'.$no++.'</td>
        <td>'.$tombol.'</td>
        <td>'.$datajual['nama_pembeli'].'</td>
        <td>'.$data->blok.'</td>
        <td>'. $luas_teknik.'</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>'.$datajual['nik'].'</td>
        <td>'.$datajual['pekerjaan'].'</td>
        <td>'.tgl_indo($datajual['tgl_terima_nego']).'</td>
        <td>'.tgl_indo($datajual['tgl_penjualan']).'</td>
        <td>'.$datajual['sistem_pembayaran'].'</td>
        <td>'.rupiah($datajual['harga']).'</td>
        <td></td>
      </tr>';
   ?>
        <?php 
        echo $kolomjual;
         foreach ($dataitem as $key => $value){ 
        $kolom = '';
        $stat = '';

        ?>

        <?php if ($value['tgl_terbit_blok']=='0000-00-00') {
          if ($value['tgl_daftar_blok']=='0000-00-00'){
            $stat = 'belum';
            $kolom.='<tr style="background-color:#ffbaba">';
          }
          else{
            $stat = 'proses';
            $kolom.='<tr style="background-color:#ffd56b">';
          }
        }
        else{ 
          $stat = 'terbit';
          $kolom.='<tr style="background-color:#c0ffba">';
        }
        $kolom.='<td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>'. $luas_teknik.'</td>
        <td>'.$value["luas_terbit_blok"].'</td>';
        $luas_teknik -= $value['luas_terbit_blok'];
        $kolom.='<td>'. $luas_teknik.'</td>
        <td>'. $value["no_terbit_shgb"].'</td>
        <td>'. $value["no_shgb_blok"].'</td>
        <td>'. tgl_indo($value["tgl_daftar_blok"]).'</td>
        <td>'. tgl_indo($value["tgl_terbit_blok"]).'</td>
         <td>ini dapat darimana</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
        <td>'. $value['keterangan'].'</td>
        </tr>';
         if ($stat!='terbit') {
          $total_sertifikat++;
          echo $kolom;
        }
      }
    } ?>
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
       </tr>
     </tfoot>
   </table> 
 </div>
</div>
</section>
<script type="text/javascript">
    $('#total_penjualan').html("<?php echo $total_penjualan ?>");
    $('#total_sertifikat').html("<?php echo $total_sertifikat ?>");
</script>
