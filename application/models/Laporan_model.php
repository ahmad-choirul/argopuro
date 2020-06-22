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

}