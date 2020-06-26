<?php
class Laporan_model extends CI_Model{   

    function getrowspo($params = array()){ 
        $this->db->select("a.nomor_po, a.tgl_po, a.termin,
         a.pembayaran, a.target, a.total, a.keterangan, b.nama_target");
        $this->db->from("purchase_order a");
        $this->db->join('tbl_target b', 'b.id = a.target');   
        if(!empty($params['search']['target'])){
            $this->db->where('a.target',$params['search']['target']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tgl_po BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tgl_po','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }
    
    function getrowspembelian($params = array()){ 
        $this->db->select("a.nomor_faktur, a.tgl_pembelian, a.termin,
         a.pembayaran, a.target, a.total, a.keterangan, b.nama_target");
        $this->db->from("pembelian_langsung a");
        $this->db->join('tbl_target b', 'b.id = a.target');   
        if(!empty($params['search']['target'])){
            $this->db->where('a.target',$params['search']['target']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tgl_pembelian BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tgl_pembelian','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    } 
    function getrowspenerima($params = array()){ 
        $this->db->select("*");
        $this->db->from("penerimaan_barang"); 
        if(!empty($params['search']['penerima'])){
            $this->db->where('penerima',$params['search']['penerima']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('tanggal_penerimaan BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('tanggal_penerimaan','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }


    function getrowsstok($params = array()){ 
        $this->db->select("a.kode_item, a.tanggal, a.jumlah_masuk, a.jenis_transaksi,
         a.jumlah_keluar, a.satuan_kecil, a.tgl_expired, b.nama_item");
        $this->db->from("kartu_stok a");
        $this->db->join('master_item b', 'b.kode_item = a.kode_item');    
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tanggal BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tanggal','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }
    
    function getrowspenjualan($params = array(),$status=''){ 
        $this->db->select("a.total_upah_peracik, c.harga,c.kuantiti, a.total_harga_item, c.total,
            a.tanggal, a.id, d.nama_item,d.harga_beli, c.stok_sisa,b.nama_admin");
        $this->db->from("penjualan a");
        // $this->db->join('master_penjual b', 'b.id = a.id_penjual');   
        $this->db->join('master_admin b', 'a.id_admin = b.id');  
        $this->db->join('penjualan_detail c', 'c.id_penjualan = a.id');  
        $this->db->join('master_item d', 'd.kode_item = c.kode_item');  
        if ($status!='') {
            $this->db->where('a.status_penjualan', $status);
        }
        if(!empty($params['search']['kasir'])){
            $this->db->where('a.id_admin',$params['search']['kasir']);
        } 
        if(!empty($params['search']['obat'])){
            $this->db->where('c.kode_item',$params['search']['obat']);
        } 
        if(!empty($params['search']['costumer'])){
            $this->db->where('a.id_pembeli',$params['search']['costumer']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tanggal BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tanggal_jam','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    } 


    function getrowskeuangan($params = array()){ 
        $this->db->select("a.kode_rekening, a.tanggal, a.masuk, a.keluar,
         a.keterangan, b.nama_rekening ");
        $this->db->from("cash_in_out a");
        $this->db->join('rekening_kode b', 'b.kode_rekening = a.kode_rekening');    
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tanggal BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tanggal','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }


    function getrowpenjual($params = array()){ 
        $this->db->select("a.id_komisi, a.id_penjualan, a.tgl_transaksi,
         b.nama_penjual, a.total, b.kontak, c.komisi, c.jumlah, d.nama_item");
        $this->db->from("master_komisi a");
        $this->db->join('master_penjual b','a.id_komisi = b.id'); 
        $this->db->join('komisi_detail c','a.id_komisi = c.id_komisi');
        $this->db->join('master_item d','c.id_barang = d.kode_item');   
        if(!empty($params['search']['penjual'])){
            $this->db->where('a.id_penjual',$params['search']['penjual']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tgl_transaksi BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tgl_transaksi','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    } 


    // datatable purchase order start
    function getallsplitsing(){   
        $tombolhapus = level_user('pembelian','splitsing',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="$2">Hapus</a></li>':'';
        $tomboledit = level_user('pembelian','splitsing',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="$2">Edit</a></li>':'';

        $this->datatables->select('nomor_splitsing,tgl_splitsing,pembayaran,
          termin,id,nama_supplier');
        $this->datatables->from('purchase_order');
        $this->datatables->join('master_supplier', 'supplier=id');
        $this->datatables->add_column('tombol', 
          ' <div class="btn-group dropup">
          <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu">
          <li><a href="#" onclick="detail(this)"  data-id="$2">Detail</a></li>
          '.$tomboledit.'
          '.$tombolhapus.'
          </ul>
          </div>
          ','tgl_splitsing,nomor_splitsing,pembayaran,nama_supplier,termin'); 
        $this->datatables->edit_column('tgl_splitsing','$1', 'tgl_indo(tgl_splitsing)'); 
        return $this->datatables->generate();
    }  
    // datatable purchase order end 

    // CRUD purchase order start 
    public function get_splitsing($idd){ 
        $this->db->select("a.nomor_splitsing, a.tgl_splitsing, a.total, a.termin, a.pembayaran, a.supplier, a.keterangan, b.nama_supplier, b.telesplitsingn, b.alamat");
        $this->db->from("purchase_order a");
        $this->db->join('master_supplier b', 'a.supplier = b.id'); 
        $this->db->where('a.nomor_splitsing', $idd,'1'); 
        return $this->db->get()->result_array();
    }  

    private function _kode_splitsing()
    { 
        $jumlah = $this->db->select('*')->from('purchase_order')->get()->num_rows();
        $jml_baru = $jumlah + 1; 
        $kode = sprintf("%04s", $jml_baru);
        $kode = "splitsing".date('dmy').$kode;
        $cek_ada = $this->db->select('*')->from('purchase_order')->where('nomor_splitsing ="'. $kode.'"')->get()->num_rows();
        if($cek_ada > 0){
            return $this->_kode_splitsing();
        }else{
            return $kode ;
        } 
    }

    public function detail_splitsing($idd){ 
        return $this->db->get_where('purchase_order_detail', array('nomor_splitsing' => $idd)); 
    } 
    public function data_profil(){ 
        return $this->db->get_where('profil_asplitsingtek', array('id' => '1')); 
    }  
    public function rulessplitsing()
    {
        return [
            [
                'field' => 'tgl_splitsing',
                'label' => 'Tanggal splitsing',
                'rules' => 'required',
            ] ,
            [
                'field' => 'termin',
                'label' => 'Termin',
                'rules' => 'required',
            ] 
        ];
    } 

    function splitsingvalid($nomor_splitsing){   
        return  $this->db->get_where(
            'purchase_order',array(
                'nomor_splitsing' => $nomor_splitsing, 
            )
        ); 
    }   

    function simpandatasplitsing(){   
        $post = $this->input->post();
        $this->db->trans_start();
        $array = array(
           'no_surat_tanah'=>$post["no_surat_tanah"],
           'nama_surat_tanah'=>$post["nama_surat_tanah"],
           'luas'=>$post["luas"],
           'tanggal_daftar_sk_hak'=>$post["tanggal_daftar_sk_hak"],
           'no_daftar_sk_hak'=>$post["no_daftar_sk_hak"],
           'tanggal_terbit_sk_hak'=>$post["tanggal_terbit_sk_hak"],
           'no_terbit_sk_hak'=>$post["no_terbit_sk_hak"],
           'tanggal_daftar_shgb'=>$post["tanggal_daftar_shgb"],
           'no_daftar_shgb'=>$post["no_daftar_shgb"],
           'tanggal_terbit_shgb'=>$post["tanggal_terbit_shgb"],
           'no_terbit_shgb'=>$post["no_terbit_shgb"],
           'masa_berlaku_shgb'=>$post["masa_berlaku_shgb"],
           'target_penyelesaian'=>$post["target_penyelesaian"],
           'status'=>$post["status"],
           'keterangan'=>$post["keterangan"],
       );
        $this->db->insert("master_proses_induk", $array);
        $id_proses_induk =  $this->db->insert_id();
        $kode_item = $this->input->post("kode_item");    
        $tgl_proses_induk = $this->input->post("tgl_proses_induk");    
        $keterangandetail = $this->input->post("keterangandetail");    
        $total = 0;
        $detail = array();
        for($i = 0; $i < count($kode_item); $i++){    
            $listitem = array(
                'id_proses_induk'=>$id_proses_induk,  
                'id_master_item'=>$kode_item[$i],  
                'tgl_proses_induk'=>$tgl_proses_induk[$i],  
                'keterangan'=>$keterangandetail[$i],
            );  
            $detail[] = $listitem;
            $this->db->insert("tbl_dtl_proses_induk", $listitem);  
        } 
        if($this->db->trans_status() === FALSE){
            return false;
         $this->db->trans_rollback();
     }else{
         $this->db->trans_complete();
         return true;
     }
 }    

 public function updatedatasplitsing()
 {
    $post = $this->input->post();   
    if($post['termin'] < 1 || $post["pembayaran"] == 'cash'){
        $post['termin'] = 0; $post["pembayaran"] = 'cash';
    }
    if($post['termin'] > 0 && $post["pembayaran"] == 'cash'){
        $post["pembayaran"] = 'hutang';
    }
    $this->nomor_splitsing = $post["nomor_splitsing"]; 
    $this->tgl_splitsing = $post["tgl_splitsing"];
    $this->termin = $post["termin"]; 
    $this->pembayaran = $post["pembayaran"]; 
    $this->supplier = $post["supplier"];    
    $this->keterangan = $post["keterangan"];      
    $this->termin = $post["termin"];         
    $this->db->update("purchase_order", $this, array('nomor_splitsing' => $post['idd']));
    $this->db->where('nomor_splitsing', $post['idd'])->delete('purchase_order_detail');  
    $nomor_splitsing = $this->input->post("nomor_splitsing");   
    $kode_item = $this->input->post("kode_item");    
    $sku = $this->input->post("sku");    
    $nama_item = $this->input->post("nama_item");   
    $satuan_besar = $this->input->post("satuan_besar");    
    $kuantiti = bilanganbulat($this->input->post("kuantiti"));    
    $total = 0;
    for($i = 0; $i < count($kode_item); $i++){       
        $listitem = array(
            'nomor_splitsing'=>$nomor_splitsing,  
            'kode_item'=>$kode_item[$i],  
            'sku'=>$sku[$i],  
            'nama_item'=>$nama_item[$i], 
            'satuan_besar'=>$satuan_besar[$i],  
            'kuantiti'=>$kuantiti[$i],  
        );  
        $this->db->insert("purchase_order_detail", $listitem);  
    } 
    $this->total = $total;
    $this->db->update("purchase_order", $this, array('nomor_splitsing' => $post['nomor_splitsing']));
    return TRUE;
}

public function hapusdatasplitsing()
{
    $post = $this->input->post();  
    $this->db->where('nomor_splitsing', $post['idd']);
    return $this->db->delete('purchase_order');  
}
    // CRUD purchase order end

    //datatable pembelian start
function getallpembelian(){   
    $tombolhapus = level_user('pembelian','langsung',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="$2">Hapus</a></li>':'';
    $tomboledit = level_user('pembelian','langsung',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="$2">Edit</a></li>':'';
    $this->datatables->select('nomor_faktur,tgl_pembelian,pembayaran,
      termin,id,nama_supplier');
    $this->datatables->from('pembelian_langsung');
    $this->datatables->join('master_supplier', 'supplier=id');
    $this->datatables->add_column('tombol', 
      ' <div class="btn-group dropup">
      <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
      <li><a href="#" onclick="detail(this)"  data-id="$2">Detail</a></li>
      '.$tombolhapus.'
      </ul>
      </div>
      ','tgl_pembelian,nomor_faktur,pembayaran,nama_supplier,termin'); 
    $this->datatables->edit_column('tgl_pembelian','$1', 'tgl_indo(tgl_pembelian)'); 
    return $this->datatables->generate();
}   
    //datatable pembelian end

}