
   <div class="panel-body"> 
    <div class="table-responsive" style="white-space: nowrap;">
     <table class="table table-bordered table-hover table-striped tableitem" id="itemsdata">
      <thead style="position: sticky;">
       <tr>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">NO</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Aksi</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Pembeli</th>

         <th rowspan="2" style="text-align: center;vertical-align: middle;">BLOK</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">NIK</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Pekerjaan</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Tanggal Terima Nego</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Tanggal Penjualan</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Sistem Pembayaran</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">Harga</th>
         <th rowspan="2" style="text-align: center;vertical-align: middle;">KETERANGAN</th>
       </tr>


     </thead>
     <tbody>

      <?php $no=1; foreach ($datastok as $data){ ?>

      <?php 
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
      // $dataitem = $this->master_model->getfullstoksplit($data->id_stok_split);
      $datajual = $this->master_model->getdatapenjualan($data->id_jual);
      ?>

      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tombol; ?></td>
        <td><?php echo $datajual['nama_pembeli']; ?></td>
        <td><?php echo $data->blok; ?></td>
        <!-- <td><?php echo  $luas_teknik ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td> -->
        <td><?php echo $datajual['nik']; ?></td>
        <td><?php echo $datajual['pekerjaan']; ?></td>
        <td><?php echo tgl_indo($datajual['tgl_terima_nego']) ?></td>
        <td><?php echo tgl_indo($datajual['tgl_penjualan']) ?></td>
        <td><?php echo $datajual['sistem_pembayaran']; ?></td>
        <td><?php echo rupiah($datajual['harga']) ?></td>
        <td></td>
      </tr>
   
        <?php 
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
       </tr>
     </tfoot>
   </table> 
 </div>
</div>
</section>
