<header class="page-header">  
              <h2>Evaluasi Pembelian Tanah</h2>
          </header>  
          <!-- start: page -->
           <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">IP Proyek - Dalam Ijin</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> -->
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <?php foreach ($perumahandalamijin as $per): ?>
            <?php 
            $dataperumahan = $this->master_model->getperumahan($per->id);
            ?>
            <section class="panel">
                <header class="panel-heading">    
                    <div class="row show-grid">
                        <div class="col-md-6" align="left"><h2 class="panel-title">Proyek <?php echo $per->nama_regional; ?> </h2></div>
                        <?php  
                        echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                        ?> 
                    </div>
                </header>
                <?php
                if ($dataperumahan!=''): ?>
                    <div class="panel-body"> 
                        <div class="table" style="overflow-x: auto;">
                            <table class="table table-responsive table-bordered table-hover table-striped" >
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
                                    <?php foreach ($dataperumahan as $value => $data): ?>
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
                                           
                                        if ($data->id_perumahan=='0') {
                                            $perumahan = 'Tidak ada';
                                        }else{
                                            $perumahan = $data->nama_regional;
                                        }
                                        ?>  
                                        <td><?= $tombol ?></td>
                                        <td><?= $perumahan ?></td>
                                        <td><?= $data->kode_item ?></td> 
                                        <td><?= $data->nama_item ?></td>  
                                        <td><?= tgl_indo($data->tanggal_pengalihan) ?></td>
                                        <td><?= $data->nama_penjual ?></td>  
                                        <td><?= $data->nama_surat_tanah ?></td>  
                                        <td><?= $data->status_surat_tanah ?></td>  
                                        <td><?= $data->no_gambar ?></td>  
                                        <td><?= $data->jumlah_bidang ?></td>  
                                        <td><?= $data->luas_surat ?></td>  
                                        <td><?= $data->luas_ukur ?></td>  
                                        <td><?= $data->no_pbb ?></td>  
                                        <td><?= $data->luas_pbb ?></td>  
                                        <td><?= $data->njop ?></td>  
                                        <td><?= rupiah($data->satuan_harga_pengalihan) ?></td>  
                                        <td><?= rupiah($data->total_harga_pengalihan) ?></td>  
                                        <td><?= $data->nama_makelar ?></td>  
                                        <td><?= rupiah($data->nilai) ?></td>  
                                        <td><?= tgl_indo($data->tanggal_pengalihan) ?></td>  
                                        <td><?= $data->akta_pengalihan ?></td>  
                                        <td><?= $data->nama_pengalihan ?></td>  
                                        <td><?= rupiah($data->pematangan) ?></td>  
                                        <td><?= rupiah($data->ganti_rugi) ?></td>  
                                        <td><?= rupiah($data->pbb) ?></td>  
                                        <td><?= rupiah($data->lain) ?></td>  
                                        <td><?= rupiah($data->harga_perm) ?></td>  
                                        <td><?= $data->keterangan ?></td>
                                    <?php endforeach ?>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
                <?php else: ?>
                    data kosong
                <?php endif ?>

            </section>
        <?php endforeach ?>
        <!-- end: page -->
    </div>
</div>



 <!-- start: page -->
           <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">IP Proyek - Luar Ijin</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> -->
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <?php foreach ($perumahanluarijin as $per): ?>
            <?php 
            $dataperumahan = $this->master_model->getperumahan($per->id);
            ?>
            <section class="panel">
                <header class="panel-heading">    
                    <div class="row show-grid">
                        <div class="col-md-6" align="left"><h2 class="panel-title">Proyek <?php echo $per->nama_regional; ?> </h2></div>
                        <?php  
                        echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                        ?> 
                    </div>
                </header>
                <?php
                if ($dataperumahan!=''): ?>
                    <div class="panel-body"> 
                        <div class="table" style="overflow-x: auto;">
                            <table class="table table-responsive table-bordered table-hover table-striped" >
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
                                    <?php foreach ($dataperumahan as $value => $data): ?>
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
                                           
                                        if ($data->id_perumahan=='0') {
                                            $perumahan = 'Tidak ada';
                                        }else{
                                            $perumahan = $data->nama_regional;
                                        }
                                        ?>  
                                        <td><?= $tombol ?></td>
                                        <td><?= $perumahan ?></td>
                                        <td><?= $data->kode_item ?></td> 
                                        <td><?= $data->nama_item ?></td>  
                                        <td><?= tgl_indo($data->tanggal_pengalihan) ?></td>
                                        <td><?= $data->nama_penjual ?></td>  
                                        <td><?= $data->nama_surat_tanah ?></td>  
                                        <td><?= $data->status_surat_tanah ?></td>  
                                        <td><?= $data->no_gambar ?></td>  
                                        <td><?= $data->jumlah_bidang ?></td>  
                                        <td><?= $data->luas_surat ?></td>  
                                        <td><?= $data->luas_ukur ?></td>  
                                        <td><?= $data->no_pbb ?></td>  
                                        <td><?= $data->luas_pbb ?></td>  
                                        <td><?= $data->njop ?></td>  
                                        <td><?= rupiah($data->satuan_harga_pengalihan) ?></td>  
                                        <td><?= rupiah($data->total_harga_pengalihan) ?></td>  
                                        <td><?= $data->nama_makelar ?></td>  
                                        <td><?= rupiah($data->nilai) ?></td>  
                                        <td><?= tgl_indo($data->tanggal_pengalihan) ?></td>  
                                        <td><?= $data->akta_pengalihan ?></td>  
                                        <td><?= $data->nama_pengalihan ?></td>  
                                        <td><?= rupiah($data->pematangan) ?></td>  
                                        <td><?= rupiah($data->ganti_rugi) ?></td>  
                                        <td><?= rupiah($data->pbb) ?></td>  
                                        <td><?= rupiah($data->lain) ?></td>  
                                        <td><?= rupiah($data->harga_perm) ?></td>  
                                        <td><?= $data->keterangan ?></td>
                                    <?php endforeach ?>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
                <?php else: ?>
                    data kosong
                <?php endif ?>

            </section>
        <?php endforeach ?>
        <!-- end: page -->
    </div>
</div>



 <!-- start: page -->
           <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">IP Proyek - Lokasi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> -->
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <?php foreach ($perumahanlokasi as $per): ?>
            <?php 
            $dataperumahan = $this->master_model->getperumahan($per->id);
            ?>
            <section class="panel">
                <header class="panel-heading">    
                    <div class="row show-grid">
                        <div class="col-md-6" align="left"><h2 class="panel-title">Proyek <?php echo $per->nama_regional; ?> </h2></div>
                        <?php  
                        echo level_user('master','items',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                        ?> 
                    </div>
                </header>
                <?php
                if ($dataperumahan!=''): ?>
                    <div class="panel-body"> 
                        <div class="table" style="overflow-x: auto;">
                            <table class="table table-responsive table-bordered table-hover table-striped" >
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
                                    <?php foreach ($dataperumahan as $value => $data): ?>
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
                                           
                                        if ($data->id_perumahan=='0') {
                                            $perumahan = 'Tidak ada';
                                        }else{
                                            $perumahan = $data->nama_regional;
                                        }
                                        ?>  
                                        <td><?= $tombol ?></td>
                                        <td><?= $perumahan ?></td>
                                        <td><?= $data->kode_item ?></td> 
                                        <td><?= $data->nama_item ?></td>  
                                        <td><?= tgl_indo($data->tanggal_pengalihan) ?></td>
                                        <td><?= $data->nama_penjual ?></td>  
                                        <td><?= $data->nama_surat_tanah ?></td>  
                                        <td><?= $data->status_surat_tanah ?></td>  
                                        <td><?= $data->no_gambar ?></td>  
                                        <td><?= $data->jumlah_bidang ?></td>  
                                        <td><?= $data->luas_surat ?></td>  
                                        <td><?= $data->luas_ukur ?></td>  
                                        <td><?= $data->no_pbb ?></td>  
                                        <td><?= $data->luas_pbb ?></td>  
                                        <td><?= $data->njop ?></td>  
                                        <td><?= rupiah($data->satuan_harga_pengalihan) ?></td>  
                                        <td><?= rupiah($data->total_harga_pengalihan) ?></td>  
                                        <td><?= $data->nama_makelar ?></td>  
                                        <td><?= rupiah($data->nilai) ?></td>  
                                        <td><?= tgl_indo($data->tanggal_pengalihan) ?></td>  
                                        <td><?= $data->akta_pengalihan ?></td>  
                                        <td><?= $data->nama_pengalihan ?></td>  
                                        <td><?= rupiah($data->pematangan) ?></td>  
                                        <td><?= rupiah($data->ganti_rugi) ?></td>  
                                        <td><?= rupiah($data->pbb) ?></td>  
                                        <td><?= rupiah($data->lain) ?></td>  
                                        <td><?= rupiah($data->harga_perm) ?></td>  
                                        <td><?= $data->keterangan ?></td>
                                    <?php endforeach ?>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
                <?php else: ?>
                    data kosong
                <?php endif ?>

            </section>
        <?php endforeach ?>
        <!-- end: page -->
    </div>
</div>