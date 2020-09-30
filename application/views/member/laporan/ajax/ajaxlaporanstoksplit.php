
<div class="panel-body"> 
  <div class="table" style="white-space: nowrap;">
   <table class="table table-bordered table-hover table-striped tableitem" id="itemsdata">
    <thead style="position: sticky;">
     <tr>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">NO</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">Aksi</th>
       <th rowspan="2" style="text-align: center;vertical-align: middle;">Jual</th>
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

    <?php $no=1; foreach ($datastok as $data){ ?>

      <?php 
      $tomboljual = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<a href="#" class="mb-xs mt-xs mr-xs btn btn-success" onclick="jual(this)" data-id="'.$this->security->xss_clean($data->id_stok_split).'" data-blok_jual="'.$this->security->xss_clean($data->blok).'">Jual</a>':'';
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
      <?php

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
          $stat = 'selesai';
          $kolom.='<tr style="background-color:#c0ffba">';
        }
        $kolom.='<td></td>
        <td></td>
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
        <td>'. $value['keterangan'].'</td>
        </tr>';
        if ($status_surat=='semua') {
          echo $kolom;
        }else{
          if ($status_surat==$stat) {
            echo $kolom;
          }
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