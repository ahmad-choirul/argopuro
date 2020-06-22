<div class="panel-body"> 
    <div class="table" style="overflow-x: auto;white-space: nowrap;">
        <table class="table table-bordered table-hover table-striped data" id="itemsdata">
            <thead>
                <tr>

                    <th rowspan="2" style="text-align: center;">NO</th>
                    <th rowspan="2"  style="text-align: center;">Aksi</th>
                    <th rowspan="2"  style="text-align: center;">Lokasi</th>
                    <th rowspan="2"  style="text-align: center;">NO GBR </th>
                    <th rowspan="2" style="text-align: center;">THN</th>
                    <th rowspan="2" style="text-align: center;">PENJUAL</th>
                    <th colspan="4" style="text-align: center;">DATA TANAH</th>
                    <th rowspan="2" style="text-align: center;">POSISI SURAT</th>
                    <th rowspan="2" style="text-align: center;">HARGA AKTA</th>
                    <th colspan="7" style="text-align: center;">PENGALIHAN HAK</th>
                    <th rowspan="2" style="text-align: center;">S TERIMA FINANCE</th>
                    <th rowspan="2" style="text-align: center;">KET</th>



                </tr>
                <tr>
                    <th  style="text-align: center;">SURAT</th>
                    <th  style="text-align: center;">ATAS NAMA</th>
                    <th style="text-align: center;">L SURAT </th>
                    <th style="text-align: center;">L UKUR </th>
                    <th style="text-align: center;">Status Order</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">JENIS</th>
                    <th style="text-align: center;">NO AKTA</th>
                    <th style="text-align: center;">TANGGAL</th>
                    <th style="text-align: center;">ATAS NAMA</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td colspan="21" align="left"> sd. Tahun <?php echo date('Y')-1 ?></td>
                </tr>
                <?php
                if ($dataperumahanseb!=''): 
                    $no=1;
                    foreach ($dataperumahanseb as $value => $data):?>
                       <tr>
                         <?php 
                         $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Edit</a></li>':'';
                         $tombol='
                         <div class="btn-group dropup">
                         <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                         <ul class="dropdown-menu" role="menu"> 
                         <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Detail</a></li> 
                         '.$tomboledit.'
                         </ul>
                         </div>
                         ';
                         if ($data->tanggal_pengalihan!=null) {
                            $tgl_pengalihan = tgl_indo($data->tanggal_pengalihan);
                        }else{
                            $tgl_pengalihan = '-';
                        }
                        if ($data->id_perumahan=='0') {
                            $perumahan = 'Tidak ada';
                        }else{
                            $perumahan = $data->nama_regional;
                        }
                        ?>
                        <td><?=$no++?></td>
                        <td><?=$tombol?></td>
                        <td><?=$perumahan?></td> 
                        <td><?=$data->no_gambar?></td> 
                        <td><?=tgl_indo($data->tanggal_pembelian)?></td>
                        <td><?=$data->nama_penjual?></td>  
                        <td><?=$data->kode_sertifikat?></td>   
                        <td><?=$data->nama_surat_tanah?></td>  
                        <td><?=$data->luas_surat?></td>  
                        <td><?=$data->luas_ukur?></td>  
                        <td><?=$data->id_posisi_surat?></td>  
                        <td></td>  
                        <td><?=$data->status_order_akta?></td>  
                        <td><?=tgl_indo($data->tanggal_proses)?></td>  
                        <td><?=$data->jenis_pengalihan_hak?></td>  
                        <td><?=$data->akta_pengalihan?></td>  
                        <td><?=$data->tanggal_pengalihan?></td>  
                        <td><?=$data->nama_pengalihan?></td>  
                        <td></td>  
                        <td><?=$data->status_teknik?></td>  
                        <td><?=$data->keterangan?></td>  
                    <?php endforeach ?>
                    <?php else: ?>
                        data kosong
                    <?php endif ?>

                    <tr>
                        <td colspan="4" align="right">Jumlah -A</td>
                        <td ></td>
                        <td ></td>
                    </tr>
                    <tr>

                        <td colspan="17" align="left"> Tahun <?php echo date('Y') ?></td>
                    </tr>
                    <?php
                    if ($dataperumahanses!=''): 
                        $no=1;
                        foreach ($dataperumahanses as $value => $data):?>
                           <tr>
                             <?php 
                             $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Hapus</a></li>':'';
                             $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Edit</a></li>':'';
                             $tombol='
                             <div class="btn-group dropup">
                             <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu"> 
                             <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Detail</a></li> 
                             '.$tomboledit.'
                             '.$tombolhapus.' 
                             </ul>
                             </div>
                             ';
                             if ($data->tanggal_pengalihan!=null) {
                                $tgl_pengalihan = tgl_indo($data->tanggal_pengalihan);
                            }else{
                                $tgl_pengalihan = '-';
                            }
                            if ($data->id_perumahan=='0') {
                                $perumahan = 'Tidak ada';
                            }else{
                                $perumahan = $data->nama_regional;
                            }
                            ?>
                            <td><?=$no++?></td>
                            <td><?=$tombol?></td>
                            <td><?=$perumahan?></td> 
                            <td><?=$data->no_gambar?></td> 
                            <td><?=tgl_indo($data->tanggal_pembelian)?></td>
                            <td><?=$data->nama_penjual?></td>  
                            <td><?=$data->kode_sertifikat?></td>   
                            <td><?=$data->nama_surat_tanah?></td>  
                            <td><?=$data->luas_surat?></td>  
                            <td><?=$data->luas_ukur?></td>  
                            <td><?=$data->id_posisi_surat?></td>  
                            <td></td>  
                            <td><?=$data->status_order_akta?></td>  
                            <td><?=tgl_indo($data->tanggal_proses)?></td>
                            <td><?=$data->jenis_pengalihan_hak?></td>  
                            <td><?=$data->akta_pengalihan?></td>  
                            <td><?=$data->tanggal_pengalihan?></td>  
                            <td><?=$data->nama_pengalihan?></td>  
                            <td></td>  
                            <td><?=$data->status_teknik?></td>  
                            <td><?=$data->keterangan?></td>  
                        <?php endforeach ?>
                        <?php else: ?>
                            data kosong
                        <?php endif ?>

                        <tr>
                            <td colspan="4" align="right">Jumlah B</td>
                            <td ></td>
                            <td ></td>
                        </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4" align="right">TOTAL </td>
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
<section class="panel">
    <header class="panel-heading">    
        <div class="row show-grid">
            <div class="col-md-6" align="left"><h2 class="panel-title">Proses SHGB</h2></div>

        </div>
    </header>
    <div class="panel-body"> 
        <div class="table" style="overflow-x: auto;white-space: nowrap;">
            <table class="table table-bordered table-hover table-striped data2" id="itemsdata2">
                <thead>
                    <tr>

                        <th rowspan="2" style="text-align: center;">NO</th>
                        <th rowspan="2"  style="text-align: center;">Aksi</th>
                        <th rowspan="2"  style="text-align: center;">Lokasi</th>
                        <th rowspan="2"  style="text-align: center;">NO GBR </th>
                        <th rowspan="2" style="text-align: center;">THN</th>
                        <th rowspan="2" style="text-align: center;">PENJUAL</th>
                        <th colspan="4" style="text-align: center;">DATA TANAH</th>
                        <th rowspan="2" style="text-align: center;">POSISI SURAT</th>
                        <th rowspan="2" style="text-align: center;">HARGA AKTA</th>
                        <th colspan="7" style="text-align: center;">PENGALIHAN HAK</th>
                        <th rowspan="2" style="text-align: center;">S TERIMA FINANCE</th>
                        <th rowspan="2" style="text-align: center;">KET</th>



                    </tr>
                    <tr>
                        <th  style="text-align: center;">SURAT</th>
                        <th  style="text-align: center;">ATAS NAMA</th>
                        <th style="text-align: center;">L SURAT </th>
                        <th style="text-align: center;">L UKUR </th>
                        <th style="text-align: center;">Status Order</th>
                        <th style="text-align: center;">Tanggal Order</th>
                        <th style="text-align: center;">JENIS</th>
                        <th style="text-align: center;">NO AKTA</th>
                        <th style="text-align: center;">TANGGAL</th>
                        <th style="text-align: center;">ATAS NAMA</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td colspan="21" align="left"> sd. Tahun <?php echo date('Y')-1 ?></td>
                    </tr>
                    <?php
                    if ($dataperumahantekseb!=''): 
                        $no=1;
                        foreach ($dataperumahantekseb as $value => $data):?>
                           <tr>
                             <?php 
                             $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Hapus</a></li>':'';
                             $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Edit</a></li>':'';
                             $tombol='
                             <div class="btn-group dropup">
                             <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu"> 
                             <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Detail</a></li> 
                             '.$tomboledit.'
                             </ul>
                             </div>
                             ';
                             if ($data->tanggal_pengalihan!=null) {
                                $tgl_pengalihan = tgl_indo($data->tanggal_pengalihan);
                            }else{
                                $tgl_pengalihan = '-';
                            }
                            if ($data->id_perumahan=='0') {
                                $perumahan = 'Tidak ada';
                            }else{
                                $perumahan = $data->nama_regional;
                            }
                            ?>
                            <td><?=$no++?></td>
                            <td><?=$tombol?></td>
                            <td><?=$perumahan?></td> 
                            <td><?=$data->no_gambar?></td> 
                            <td><?=tgl_indo($data->tanggal_pembelian)?></td>
                            <td><?=$data->nama_penjual?></td>  
                            <td><?=$data->kode_sertifikat?></td>   
                            <td><?=$data->nama_surat_tanah?></td>  
                            <td><?=$data->luas_surat?></td>  
                            <td><?=$data->luas_ukur?></td>  
                            <td><?=$data->id_posisi_surat?></td>  
                            <td></td>  
                            <td><?=$data->status_order_akta?></td>  
                            <td><?=tgl_indo($data->tanggal_proses)?></td>
                            <td><?=$data->jenis_pengalihan_hak?></td>  
                            <td><?=$data->akta_pengalihan?></td>  
                            <td><?=$data->tanggal_pengalihan?></td>  
                            <td><?=$data->nama_pengalihan?></td>  
                            <td></td>  
                            <td><?=$data->status_teknik?></td>  
                            <td><?=$data->keterangan?></td>  
                        <?php endforeach ?>
                        <?php else: ?>
                            data kosong
                        <?php endif ?>

                        <tr>
                            <td colspan="4" align="right">Jumlah -A</td>
                            <td ></td>
                            <td ></td>
                        </tr>
                        <tr>

                            <td colspan="17" align="left"> Tahun <?php echo date('Y') ?></td>
                        </tr>
                        <?php
                        if ($dataperumahantekses!=''): 
                            $no=1;
                            foreach ($dataperumahantekses as $value => $data):?>
                               <tr>
                                 <?php 
                                 $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Hapus</a></li>':'';
                                 $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Edit</a></li>':'';
                                 $tombol='
                                 <div class="btn-group dropup">
                                 <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                 <ul class="dropdown-menu" role="menu"> 
                                 <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($data->kode_item).'">Detail</a></li> 
                                 '.$tomboledit.'
                                 '.$tombolhapus.' 
                                 </ul>
                                 </div>
                                 ';
                                 if ($data->tanggal_pengalihan!=null) {
                                    $tgl_pengalihan = tgl_indo($data->tanggal_pengalihan);
                                }else{
                                    $tgl_pengalihan = '-';
                                }
                                if ($data->id_perumahan=='0') {
                                    $perumahan = 'Tidak ada';
                                }else{
                                    $perumahan = $data->nama_regional;
                                }
                                ?>
                                <td><?=$no++?></td>
                                <td><?=$tombol?></td>
                                <td><?=$perumahan?></td> 
                                <td><?=$data->no_gambar?></td> 
                                <td><?=tgl_indo($data->tanggal_pembelian)?></td>
                                <td><?=$data->nama_penjual?></td>  
                                <td><?=$data->kode_sertifikat?></td>   
                                <td><?=$data->nama_surat_tanah?></td>  
                                <td><?=$data->luas_surat?></td>  
                                <td><?=$data->luas_ukur?></td>  
                                <td><?=$data->id_posisi_surat?></td>  
                                <td></td>  
                                <td><?=$data->status_order_akta?></td>  
                                <td><?=tgl_indo($data->tanggal_proses)?></td>  
                                <td><?=$data->jenis_pengalihan_hak?></td>  
                                <td><?=$data->akta_pengalihan?></td>  
                                <td><?=$data->tanggal_pengalihan?></td>  
                                <td><?=$data->nama_pengalihan?></td>  
                                <td></td>  
                                <td><?=$data->status_teknik?></td>  
                                <td><?=$data->keterangan?></td>  
                            <?php endforeach ?>
                            <?php else: ?>
                                data kosong
                            <?php endif ?>

                            <tr>
                                <td colspan="4" align="right">Jumlah B</td>
                                <td ></td>
                                <td ></td>
                            </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="4" align="right">TOTAL </td>
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