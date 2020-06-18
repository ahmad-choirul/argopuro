<?php
class Master_model extends CI_Model{   
public function getdatatanah($kode_item)
{
    $this->db->select('a.*,b.nama_regional,c.*');
   $this->db->from('master_item a'); 
   $this->db->where('a.kode_item', $kode_item);
   $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
   $this->db->join('tbl_sertifikat_tanah c', 'c.id_sertifikat_tanah = a.status_surat_tanah','left');
   return $this->db->get()->result();
}
    public function getdataabsensibyid($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_absensi');
        $this->db->where('id_admin', $id);  
        $this->db->where("waktu BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'");
        $hasil = $this->db->get();
        if ($hasil->num_rows()>0) {
         return $hasil->result_array()[0];
     }else{
        $hasil = array('status' =>'' ,
            'keterangan' =>'' );
        return $hasil;
    }
}

public function absensiinput($data)
{
    if ($data['status']!='') {
        $this->db->select('status,waktu,id_admin,keterangan');
        $this->db->from('tbl_absensi');
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->where("waktu BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'");
        $hasil = $this->db->get();
        if ($hasil->num_rows()>0) {
          $this->db->where("waktu BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'");
          $this->db->update('tbl_absensi', $data);
      }else{
       $this->db->insert('tbl_absensi', $data);
   }
}
}
public function getlistabsensi($id='')
{
    if (isset($id)) {
        $query = "SELECT * FROM tbl_absensi WHERE MONTH(waktu) = MONTH(CURDATE())";
    }else{
       $query = "SELECT * FROM tbl_absensi WHERE MONTH(waktu) = MONTH(CURDATE()) and id_admin='".$id."'";
   }
   $hasil = $this->db->query($query)->result();
   $this->session->set_flashdata('query', $this->db->last_query());
   return $hasil;
}

    // datatable supplier start
var $column_search_supplier = array('nama_supplier','telepon','alamat','nama_regional'); 
var $column_order_supplier = array(null, 'nama_supplier','telepon','alamat','nama_regional');
var $order_supplier = array('master_supplier.waktu_update' => 'DESC');
private function _get_query_supplier()
{ 
    $get = $this->input->get();
    $this->db->from('master_supplier'); 
    $this->db->join('master_regional', 'master_regional.id = master_supplier.id_regional');
    $this->db->join('master_penjual', 'master_penjual.id = master_supplier.id_penjual');
    $i = 0; 
    foreach ($this->column_search_supplier as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_supplier) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_supplier[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_supplier))
    {
        $order = $this->order_supplier;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_supplier_datatable()
{
    $get = $this->input->get();
    $this->_get_query_supplier();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_supplier()
{
    $this->_get_query_supplier();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_supplier()
{
    $this->db->from('master_supplier');
    return $this->db->count_all_results();
} 
    //datatable supplier end

		// CRUD supplier start
public function rulessupplier()
{
    return [
        [
            'field' => 'nama_supplier',
            'label' => 'Nama supplier',
            'rules' => 'required',
        ] 
    ];
} 
function simpandatasupplier(){   
    $post = $this->input->post();   
    $array = array(
        'nama_supplier' =>$post["nama_supplier"],
        'alamat'        =>$post["alamat"], 
        'telepon'       =>$post["telepon"], 
        'id_regional'      =>$post["id_regional"], 
        'id_penjual'      =>$post["id_penjual"], 
    );
    return $this->db->insert("master_supplier", $array);   
} 
public function updatedatasupplier()
{
    $post = $this->input->post();
    $this->nama_supplier    = $post["nama_supplier"];
    $this->alamat           = $post["alamat"];
    $this->telepon          = $post["telepon"];
    $this->id_regional         = $post["id_regional"];
    $this->id_penjual         = $post["id_penjual"];
    return $this->db->update("master_supplier", $this, array('id' => $post['idd']));
}
public function hapusdatasupplier()
{
    $post = $this->input->post();
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_supplier');
}
        // CRUD supplier end

    // datatable distributor start
var $column_search_distributor = array('nama_distributor','telepon','alamat','nama_regional'); 
var $column_order_distributor = array(null, 'nama_distributor','telepon','alamat','nama_regional');
var $order_distributor = array('master_distributor.waktu_update' => 'DESC');
private function _get_query_distributor()
{ 
    $get = $this->input->get();
    $this->db->select('master_distributor.*,master_regional.nama_regional,master_penjual.nama_penjual');
    $this->db->from('master_distributor'); 
    $this->db->join('master_regional', 'master_regional.id = master_distributor.id_regional');
    $this->db->join('master_penjual', 'master_penjual.id = master_distributor.id_penjual');
    $i = 0; 
    foreach ($this->column_search_distributor as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_distributor) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_distributor[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_distributor))
    {
        $order = $this->order_distributor;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}
public function getserah_terimaarray()
{

    $this->db->from('master_serah_terima');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');
    if($firstdate!='' AND $lastdate!=''){
        $this->db->where('tgl_serah_terima BETWEEN "'.$firstdate. '" and "'. $lastdate.'"');
    }
    $hasil = $this->db->get();
    if ($hasil->num_rows()>0) {
        return $hasil->result_array();
    }else{
        return null;
    }
}
function get_distributor_datatable()
{
    $get = $this->input->get();
    $this->_get_query_distributor();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_distributor()
{
    $this->_get_query_distributor();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_distributor()
{
    $this->db->from('master_distributor');
    return $this->db->count_all_results();
} 
    //datatable distributor end
        // CRUD distributor start
public function rulesdistributor()
{
    return [
        [
            'field' => 'nama_distributor',
            'label' => 'Nama distributor',
            'rules' => 'required',
        ] 
    ];
} 
function simpandatadistributor(){   
    $post = $this->input->post();   
    $array = array(
        'nama_distributor' =>$post["nama_distributor"],
        'alamat'        =>$post["alamat"], 
        'telepon'       =>$post["telepon"], 
        'id_regional'      =>$post["id_regional"], 
        'id_penjual'      =>$this->session->userdata('idadmin'), 
    );
    return $this->db->insert("master_distributor", $array);   
} 
public function updatedatadistributor()
{
    $post = $this->input->post();
    $this->nama_distributor    = $post["nama_distributor"];
    $this->alamat           = $post["alamat"];
    $this->telepon          = $post["telepon"];
    $this->id_regional         = $post["id_regional"];
    $this->id_penjual         = $post["id_penjual"];
    return $this->db->update("master_distributor", $this, array('id' => $post['idd']));
}
public function hapusdatadistributor()
{
    $post = $this->input->post();
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_distributor');
}
        // CRUD distributor end
    // datatable pembeli start
var $column_search_pembeli = array('nama_pembeli','jenis_kelamin','handphone','email'); 
var $column_order_pembeli = array(null, 'nama_pembeli','jenis_kelamin','handphone','email');
var $order_pembeli = array('master_pembeli.waktu_update' => 'DESC');
private function _get_query_pembeli()
{ 
    $get = $this->input->get();
    $this->db->from('master_pembeli'); 
    $this->db->join('master_penjual', 'master_penjual.id = master_pembeli.id_penjual');
    $i = 0; 
    foreach ($this->column_search_pembeli as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_pembeli) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_pembeli[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_pembeli))
    {
        $order = $this->order_pembeli;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_pembeli_datatable($jenis='')
{
    $get = $this->input->get();
    $this->_get_query_pembeli();
    if ($jenis!='') {
        $this->db->where('jenis_pembeli',$jenis);

    }
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_pembeli()
{
    $this->_get_query_pembeli();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_pembeli()
{
    $this->db->from('master_pembeli');
    return $this->db->count_all_results();
} 
    //datatable pembeli end

    //CRUD pembeli start 
public function rulespembeli()
{
    return [
        [
            'field' => 'nama_pembeli',
            'label' => 'Nama pembeli',
            'rules' => 'required',
        ] 
    ];
} 
function simpandatapembeli(){   
    $post = $this->input->post();
    $array = array(
        'nama_pembeli'=>$post["nama_pembeli"],
        'alamat'=>$post["alamat"],  
        'hp'=>$post["hp"], 
        'stok_awal'=>$post["stok_awal"], 
        'total'=>$post["total"], 
        'jenis_pembeli'=>$post["jenis_pembeli"], 
        'luas_sawah'=>$post["luas_sawah"], 
        'id_penjual'=>$this->session->userdata('idadmin'), 

    );
    $this->db->insert("master_pembeli", $array);  
    return $this->db->insert_id();
} 
public function updatedatapembeli()
{
    $post = $this->input->post();
    $this->nama_pembeli = $post["nama_pembeli"];
    $this->alamat = $post["alamat"];
    $this->hp = $post["hp"];
    $this->stok_awal = $post["stok_awal"];
    $this->total = $post["total"];
    $this->id_penjual = $post["id_penjual"];
    $this->luas_sawah = $post["luas_sawah"];
    $this->jenis_pembeli = $post["jenis_pembeli"];

    return $this->db->update("master_pembeli", $this, array('id' => $post['idd']));
} 
public function hapusdatapembeli()
{
    $post = $this->input->post(); 
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_pembeli');  
}
    //CRUD pembeli end 


    // datatable kategori start
var $column_search_kategori = array('id'); 
var $column_order_kategori = array(null, 'id');
var $order_kategori = array('waktu_update' => 'DESC');
private function _get_query_kategori()
{ 
    $get = $this->input->get();
    $this->db->from('master_regional'); 
    $this->db->join('master_status_regional', 'master_regional.status_regional = master_status_regional.id_status_regional', 'left');
    $i = 0; 
    foreach ($this->column_search_kategori as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_kategori) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_kategori[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_kategori))
    {
        $order = $this->order_kategori;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_kategori_datatable()
{
    $get = $this->input->get();
    $this->_get_query_kategori();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_kategori()
{
    $this->_get_query_kategori();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_kategori()
{
    $this->db->from('master_regional');
    return $this->db->count_all_results();
} 
    //datatable kategori end

    //CRUD kategori start
public function ruleskategori()
{
    return [
        [
            'field' => 'id',
            'label' => 'Nama kategori',
            'rules' => 'required',
        ] 
    ];
} 
function simpandatakategori(){   
    $post = $this->input->post();   
    $array = array(
        'nama_regional'=>$post["nama_regional"], 
        'lokasi'=>$post["lokasi"], 
        'status_regional'=>$post["status_regional"], 
    );
    return $this->db->insert("master_regional", $array);   
} 
public function updatedatakategori()
{
    $post = $this->input->post();
    $this->nama_regional = $post["nama_regional"]; 
    $this->lokasi = $post["lokasi"]; 
    $this->status_regional = $post["status_regional"]; 
    return $this->db->update("master_regional", $this, array('id' => $post['id']));
} 
public function hapusdatakategori()
{
    $post = $this->input->post(); 
    $this->db->where('id', $post['id']);
    return $this->db->delete('master_regional');  
}
    //CRUD kategori end


function get_satuan_datatable() 
{
    $get = $this->input->get();
    $this->_get_query_satuan();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_satuan()
{
    $this->_get_query_satuan();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_satuan()
{
    $this->db->from('master_satuan');
    return $this->db->count_all_results();
} 
    //datatable satuan end

	//CRUD satuan start
public function rulessatuan()
{
    return [
        [
            'field' => 'id',
            'label' => 'Nama satuan',
            'rules' => 'is_unique[master_satuan.id]|required',
        ] 
    ];
} 
function simpandatasatuan(){   
    $post = $this->input->post();   
    $array = array(
        'id'=>$post["id"],
        'isi_persatuan'=>$post["isi_persatuan"],
        'satuan_besar'=>$post["satuan_besar"], 
    );
    return $this->db->insert("master_satuan", $array); 
} 
public function updatedatasatuan()
{
    $post = $this->input->post();
    $this->id = $post["id"]; 
    $this->isi_persatuan = $post["isi_persatuan"]; 
    $this->satuan_besar = $post["satuan_besar"]; 
    return $this->db->update("master_satuan", $this, array('id' => $post['idd']));
} 
public function hapusdatasatuan()
{
    $post = $this->input->post(); 
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_satuan');  
}
    //CRUD satuan end

    // datatable merk start
var $column_search_merk = array('id'); 
var $column_order_merk = array(null, 'id');
var $order_merk = array('waktu_update' => 'DESC');
private function _get_query_merk()
{ 
    $get = $this->input->get();
    $this->db->from('master_merk'); 
    $i = 0; 
    foreach ($this->column_search_merk as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_merk) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_merk[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_merk))
    {
        $order = $this->order_merk;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_merk_datatable()
{
    $get = $this->input->get();
    $this->_get_query_merk();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_merk()
{
    $this->_get_query_merk();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_merk()
{
    $this->db->from('master_merk');
    return $this->db->count_all_results();
} 
    //datatable merk end

	//CRUD merk start
public function rulesmerk()
{
    return [
        [
            'field' => 'nama_status_tanah',
            'label' => 'Nama Satus Tanah',
            'rules' => 'is_unique[master_status_tanah.nama_status_tanah]|required',
        ] 
    ];
}  
function simpandatamerk(){   
    $post = $this->input->post();   
    $array = array(
        'id'=>$post["id"], 
    );
    return $this->db->insert("master_merk", $array);   
} 

public function hapusdatamerk()
{
    $post = $this->input->post(); 
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_merk');  
}
public function updatedatamerk()
{
    $post = $this->input->post();
    $this->id = $post["id"]; 
    return $this->db->update("master_merk", $this, array('id' => $post['idd']));
} 
public function get_rekaplandbank($id='',$firstdate='',$lastdate='',$teknik='')
{
    $this->db->select('sum(jumlah_bidang) as bid,sum(luas_surat) as surat,sum(luas_ukur) as ukur');
    $this->db->from('master_item a'); 
    $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
    $this->db->join('tbl_sertifikat_tanah c', 'c.id_sertifikat_tanah = a.status_surat_tanah','left');
    if(!empty($firstdate) AND !empty($lastdate)){
        $this->db->where('a.tanggal_pembelian BETWEEN "'.$firstdate. '" and "'. $lastdate.'"');
    }
    if (!empty($id)) {
        $this->db->where('id_perumahan', $id);
    }

    if (!empty($teknik)) {
        $this->db->where('status_teknik', $teknik);
    }
    $hasil = $this->db->get()->result_array()[0];
    if ($hasil['bid']!='') {
       return $hasil;
   }else{
    return array('bid' => '0','ukur' => '0','surat' => '0' );
}
}

public function get_rekapshgb($id='',$firstdate='',$lastdate='',$shgb='')
{
    $this->db->select('sum(jumlah_bidang) as bid,sum(luas_surat) as surat,sum(luas_ukur) as ukur');
    $this->db->from('master_item a'); 
    $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
    $this->db->join('tbl_sertifikat_tanah c', 'c.id_sertifikat_tanah = a.status_surat_tanah','left');
    if(!empty($firstdate) AND !empty($lastdate)){
        $this->db->where('a.tanggal_pembelian BETWEEN "'.$firstdate. '" and "'. $lastdate.'"');
    }
    if (!empty($id)) {
        $this->db->where('id_perumahan', $id);
    }

    if (!empty($teknik)) {
        $this->db->where('a.status_surat_tanah', $shgb);
    }
    $hasil = $this->db->get()->result_array()[0];
    if ($hasil['bid']!='') {
       return $hasil;
   }else{
    return array('bid' => '0','ukur' => '0','surat' => '0' );
}
}
	//CRUD merk end
public function getperumahan($id='',$firstdate='',$lastdate='',$teknik='')
{
   $this->db->select('a.*,b.nama_regional,c.*');
   $this->db->from('master_item a'); 
   $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
   $this->db->join('tbl_sertifikat_tanah c', 'c.id_sertifikat_tanah = a.status_surat_tanah','left');
   if(!empty($firstdate) AND !empty($lastdate)){
    $this->db->where('a.tanggal_pembelian BETWEEN "'.$firstdate. '" and "'. $lastdate.'"');
}
if (!empty($id)) {
    $this->db->where('id_perumahan', $id);
}

if (!empty($teknik)) {
    $this->db->where('status_teknik', 'sudah');
}

return $this->db->get()->result();
}
public function updatemasteritem($data)
{
    $this->db->where('kode_item', $data['kode_item']);
    return $this->db->update('master_item', $data);
}
public function getshgbperumahan($id='',$firstdate='',$lastdate='',$shgb='')
{
   $this->db->select('a.*,b.nama_regional,c.*');
   $this->db->from('master_item a'); 
   $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
   $this->db->join('tbl_sertifikat_tanah c', 'c.id_sertifikat_tanah = a.status_surat_tanah','left');
   if(!empty($firstdate) AND !empty($lastdate)){
    $this->db->where('a.tanggal_pembelian BETWEEN "'.$firstdate. '" and "'. $lastdate.'"');
}
if (!empty($id)) {
    $this->db->where('id_perumahan', $id);
}

if (!empty($shgb)) {
    $this->db->where('status_order_akta', 'proses');
}

return $this->db->get()->result();
}
	// datatable item start
var $column_search_item = array('kode_item','nama_item','nama_penjual','nama_surat_tanah','nama_makelar'); 
var $column_order_item = array(null, 'kode_item','nama_item','nama_penjual','nama_surat_tanah','nama_makelar');
var $order_item = array('waktu_update' => 'DESC');
private function _get_query_item()
{ 
    $get = $this->input->get();
    $this->db->select('a.*,b.nama_regional,c.*');
    $this->db->from('master_item a'); 
    $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
    $this->db->join('tbl_sertifikat_tanah c', 'c.id_sertifikat_tanah = a.status_surat_tanah','left');
    $i = 0; 
    foreach ($this->column_search_item as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_item) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_item[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_item))
    {
        $order = $this->order_item;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_item_datatable()
{
    $get = $this->input->get();
    $this->_get_query_item();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_item()
{
    $this->_get_query_item();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_item()
{
    $this->db->from('master_item');
    return $this->db->count_all_results();
} 
    //datatable item end

	//CRUD item start
public function rulesitems()
{
    return [
        [
            'field' => 'nama_item',
            'label' => 'Nama Item',
            'rules' => 'required',
        ], 
    ];
} 
public function rulesitemsedit()
{
    return [
        [
            'field' => 'nama_item',
            'label' => 'Nama Item',
            'rules' => 'required',
        ], 
    ];
} 
function simpandataitems(){   
    $post = $this->input->post();   
    $array = array(
        'nama_item'=>$post["nama_item"], 
        'tanggal_pembelian'=>$post["tanggal_pembelian"], 
        'nama_penjual'=>$post["nama_penjual"],  
        'nama_surat_tanah'=>$post["nama_surat_tanah"],  
        'status_surat_tanah'=>$post["status_surat_tanah"],  
        'no_gambar'=>$post["no_gambar"],  
        'jumlah_bidang'=>$post["jumlah_bidang"],  
        'luas_surat'=>$post["luas_surat"],  
        'luas_ukur'=>$post["luas_ukur"],  
        'no_pbb'=>$post["no_pbb"],  
        'luas_pbb'=>$post["luas_pbb"],  
        'njop'=>$post["njop"],    
        'total_harga_pengalihan'=>$post["total_harga_pengalihan"],  
        'nama_makelar'=>$post["nama_makelar"],  
        'nilai'=>$post["nilai"],  
        'tanggal_pengalihan'=>$post["tanggal_pengalihan"],  
        'akta_pengalihan'=>$post["akta_pengalihan"],  
        'nama_pengalihan'=>$post["nama_pengalihan"],  
        'pematangan'=>$post["pematangan"],  
        'ganti_rugi'=>$post["ganti_rugi"],  
        'pbb'=>$post["pbb"],  
        'lain'=>$post["lain"],
        'keterangan'=>$post["keterangan"],  
        'id_perumahan'=>$post["id_perumahan"]  
    );
    return $this->db->insert("master_item", $array);  
}    

public function updatedataitems()
{
    $post = $this->input->post();
    $this->nama_item = ($post["nama_item"]); 
    $this->tanggal_pembelian = ($post["tanggal_pembelian"]); 
    $this->nama_penjual = ($post["nama_penjual"]); 
    $this->nama_surat_tanah = ($post["nama_surat_tanah"]); 
    $this->status_surat_tanah = ($post["status_surat_tanah"]); 
    $this->no_gambar = ($post["no_gambar"]); 
    $this->jumlah_bidang = bilanganbulat($post["jumlah_bidang"]); 
    $this->luas_surat = bilanganbulat($post["luas_surat"]); 
    $this->luas_ukur = bilanganbulat($post["luas_ukur"]); 
    $this->no_pbb = ($post["no_pbb"]); 
    $this->luas_pbb = bilanganbulat($post["luas_pbb"]); 
    $this->njop = ($post["njop"]); 
    $this->total_harga_pengalihan = bilanganbulat($post["total_harga_pengalihan"]); 
    $this->nama_makelar = ($post["nama_makelar"]); 
    $this->nilai = bilanganbulat($post["nilai"]); 
    $this->tanggal_pengalihan = ($post["tanggal_pengalihan"]); 
    $this->akta_pengalihan = ($post["akta_pengalihan"]); 
    $this->nama_pengalihan = ($post["nama_pengalihan"]); 
    $this->pematangan = bilanganbulat($post["pematangan"]); 
    $this->ganti_rugi = bilanganbulat($post["ganti_rugi"]); 
    $this->pbb = bilanganbulat($post["pbb"]); 
    $this->lain = bilanganbulat($post["lain"]);
    $this->keterangan = ($post["keterangan"]); 
    $this->id_perumahan = ($post["id_perumahan"]); 
    return $this->db->update("master_item", $this, array('kode_item' => $post['idd']));
}

public function updatedatalandbank()
{
    $post = $this->input->post();
    $this->nama_item = ($post["nama_item"]); 
    $this->tanggal_pembelian = ($post["tanggal_pembelian"]); 
    $this->status_surat_tanah = ($post["status_surat_tanah"]); 
    $this->total_harga_pengalihan = bilanganbulat($post["total_harga_pengalihan"]); 
    $this->nama_makelar = ($post["nama_makelar"]); 
    $this->nilai = bilanganbulat($post["nilai"]); 
    $this->tanggal_pengalihan = ($post["tanggal_pengalihan"]); 
    $this->akta_pengalihan = ($post["akta_pengalihan"]); 
    $this->nama_pengalihan = ($post["nama_pengalihan"]); 
    $this->pematangan = bilanganbulat($post["pematangan"]); 
    $this->ganti_rugi = bilanganbulat($post["ganti_rugi"]); 
    $this->pbb = bilanganbulat($post["pbb"]); 
    $this->lain = bilanganbulat($post["lain"]);
    $this->keterangan = ($post["keterangan"]); 
    $this->id_posisi_surat = ($post["id_posisi_surat"]); 
    $this->status_order_akta = ($post["status_order_akta"]); 
    $this->jenis_pengalihan_hak = ($post["jenis_pengalihan_hak"]); 
    $this->status_teknik = ($post["status_teknik"]); 
    return $this->db->update("master_item", $this, array('kode_item' => $post['idd']));
}
private function _uploadGambarProduk()
{
    $post = $this->input->post();
    $config['upload_path']          = './images/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $post["kode_item"];
    $config['overwrite']			= true;
    $config['max_size']             = 1024;  
    $this->load->library('upload', $config); 
    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    } 
    return "default.jpg";
} 
private function _hapusGambarProduk($id)
{
    $product = $this->_namagambar($id);
    if ($product->gambar != "default.jpg") {
        $filename = explode(".", $product->gambar)[0];
        return array_map('unlink', glob(FCPATH."images/$filename.*"));
    }
}
private function _namagambar($id)
{
    return $this->db->get_where('master_item', ["kode_item" => $id])->row();
}
public function hapusdataitem()
{
    $post = $this->input->post(); 
    $this->db->where('kode_item', $post['idd']);
    return $this->db->delete('master_item');  
} 
    //CRUD item end
     // datatable pilihan obat start
var $column_search_pilihanobat = array('kode_item','nama_item','nama_regional'); 
var $column_order_pilihanobat = array(null, 'kode_item','nama_item','nama_regional');
var $order_pilihanobat = array('a.waktu_update' => 'DESC');
private function _get_query_pilihanitem()
{ 
 $get = $this->input->get();
 $this->db->from('master_item a');
 $this->db->join('master_regional b', 'a.id_perumahan = b.id', 'left');
 $i = 0; 
 foreach ($this->column_search_pilihanobat as $item)
 {
     if($get['search']['value'])
     { 
         if($i===0) 
         {
             $this->db->group_start(); 
             $this->db->like($item, $get['search']['value']);
         }
         else
         {
             $this->db->or_like($item, $get['search']['value']);
         }

         if(count($this->column_search_pilihanobat) - 1 == $i) 
             $this->db->group_end(); 
     }
     $i++;
 } 
 if(isset($get['order'])) 
 {
     $this->db->order_by($this->column_order_pilihanobat[$get['order']['0']['column']], $get['order']['0']['dir']);
 } 
 else if(isset($this->order_pilihanobat))
 {
     $order = $this->order_pilihanobat;
     $this->db->order_by(key($order), $order[key($order)]);
 }
}

function get_pilihanitem_datatable()
{
 $get = $this->input->get();
 $this->_get_query_pilihanitem();
 if($get['length'] != -1)
     $this->db->limit($get['length'], $get['start']);
 $query = $this->db->get();
 return $query->result();
}

function count_filtered_datatable_pilihanitem()
{
 $this->_get_query_pilihanitem();
 $query = $this->db->get();
 return $query->num_rows();
}

public function count_all_datatable_pilihanitem()
{
 $this->db->from('master_item');
 return $this->db->count_all_results();
} 
     //datatable pilihan obat end

      // datatable racikan start
var $column_search_dataracikan = array('kode_item','nama_item','harga_jual','upah_peracik','aturan_pakai'); 
var $column_order_dataracikan = array(null, 'kode_item','nama_item','harga_jual','upah_peracik','aturan_pakai');
var $order_dataracikan = array('waktu_update' => 'DESC');
private function _get_query_dataracikan()
{ 
    $get = $this->input->get();
    $this->db->where('jenis','racikan'); 
    $this->db->from('master_item'); 
    $i = 0; 
    foreach ($this->column_search_dataracikan as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_dataracikan) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_dataracikan[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_dataracikan))
    {
        $order = $this->order_dataracikan;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_dataracikan_datatable()
{
    $get = $this->input->get();
    $this->_get_query_dataracikan();
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_dataracikan()
{
    $this->_get_query_dataracikan();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_dataracikan()
{
    $this->db->where('jenis','racikan'); 
    $this->db->from('master_item');
    return $this->db->count_all_results();
} 
    //datatable racikan end

    //CRUD racikan start
public function get_dataracikan($idd){ 
    $this->db->select("a.kode_obat, a.jumlah_obat_dibuat, a.jumlah_obat_dipakai, b.nama_item");
    $this->db->from("master_racikan a");
    $this->db->join('master_item b', 'a.kode_obat = b.kode_item AND a.kode_racikan="'.$idd.'"');  
    return $this->db->get()->result();
}

function simpandataracikan(){   
    $post = $this->input->post();   
    $array = array(
        'kode_item'=>$post["kode_item"], 
        'jenis'=>'racikan', 
        'kategori'=>$post["kategori"],  
        'satuan'=>$post["satuan"], 
        'nama_item'=>$post["nama_item"], 
        'upah_peracik'=>bilanganbulat($post["upah_peracik"]), 
        'aturan_pakai'=>$post["aturan_pakai"], 
        'keterangan'=>$post["keterangan"],  
        'gambar'=>$this->_uploadGambarProduk(),  
        'harga_jual'=>bilanganbulat($post["harga_jual"]), 
    ); 

    $this->db->insert("master_item", $array);  
    $kode_item = $this->input->post("kode_item");   
    $kode_obat = $this->input->post("kode_obat");   
    $jumlah_obat_dibuat = $this->input->post("jumlah_obat_dibuat"); 
    $jumlah_obat_dipakai = $this->input->post("jumlah_obat_dipakai"); 
    for($i = 0; $i < count($kode_obat); $i++){         
        $listobat = array(
            'kode_racikan'=>$kode_item,  
            'kode_obat'=>$kode_obat[$i],  
            'jumlah_obat_dibuat'=>$jumlah_obat_dibuat[$i],  
            'jumlah_obat_dipakai'=>$jumlah_obat_dipakai[$i],  
        );   
        $this->db->insert("master_racikan", $listobat);  
    }
    return TRUE;
}    
public function hapusdataracikan()
{
    $post = $this->input->post(); 
    $this->_hapusGambarProduk($post['idd']);
    $this->db->where('kode_item', $post['idd']);
    return $this->db->delete('master_item');  
}
public function updatedataracikan()
{
    $post = $this->input->post();
    $this->kode_item = $post["kode_item"]; 
    $this->kategori = $post["kategori"];
    $this->satuan = $post["satuan"]; 
    $this->nama_item = $post["nama_item"]; 
    $this->upah_peracik = bilanganbulat($post["upah_peracik"]);  
    $this->aturan_pakai = $post["aturan_pakai"];    
    $this->keterangan = $post["keterangan"];    
    $this->harga_jual = bilanganbulat($post["harga_jual"]);            
    if (!empty($_FILES["gambar"]["name"])) {
        $this->gambar = $this->_uploadGambarProduk();
    }   
    $this->db->update("master_item", $this, array('kode_item' => $post['idd']));
    $this->db->where('kode_racikan', $post['idd'])->delete('master_racikan'); 
    $kode_item = $this->input->post("kode_item");   
    $kode_obat = $this->input->post("kode_obat");   
    $jumlah_obat_dibuat = $this->input->post("jumlah_obat_dibuat"); 
    $jumlah_obat_dipakai = $this->input->post("jumlah_obat_dipakai"); 
    for($i = 0; $i < count($kode_obat); $i++){         
        $listobat = array(
            'kode_racikan'=>$kode_item,  
            'kode_obat'=>$kode_obat[$i],  
            'jumlah_obat_dibuat'=>$jumlah_obat_dibuat[$i],  
            'jumlah_obat_dipakai'=>$jumlah_obat_dipakai[$i],  
        );   
        $this->db->insert("master_racikan", $listobat);  
    }
    return TRUE;
}  

    // datatable penjual start
var $column_search_penjual = array('nama_penjual','kontak','alamat'); 
var $column_order_penjual = array(null, 'nama_penjual','kontak','alamat');
var $order_penjual = array('master_penjual.waktu_update' => 'DESC');
private function _get_query_penjual()
{ 
    $get = $this->input->get();
    $this->db->select('master_penjual.*,master_regional.id as id_regional,master_regional.nama_regional');
    $this->db->from('master_penjual'); 
    $this->db->join('master_regional', 'master_regional.id = master_penjual.regional');
    $i = 0; 
    foreach ($this->column_search_penjual as $item)
    {
        if($get['search']['value'])
        { 
            if($i===0) 
            {
                $this->db->group_start(); 
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_penjual) - 1 == $i) 
                $this->db->group_end(); 
        }
        $i++;
    } 
    if(isset($get['order'])) 
    {
        $this->db->order_by($this->column_order_penjual[$get['order']['0']['column']], $get['order']['0']['dir']);
    } 
    else if(isset($this->order_penjual))
    {
        $order = $this->order_penjual;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_penjual_datatable()
{
    $get = $this->input->get();
    $this->_get_query_penjual();
        // $this->db->where('jenis_pembeli','2');
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_penjual()
{
    $this->_get_query_penjual();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_penjual()
{
    $this->db->from('master_penjual');
    return $this->db->count_all_results();
} 
    //datatable penjual end

    //CRUD penjual start 
public function rulespenjual()
{
    return [
        [
            'field' => 'nama_penjual',
            'label' => 'Nama penjual',
            'rules' => 'required',
        ] 
    ];
} 
function simpandatapenjual(){   
    $post = $this->input->post();   
    $array = array(
        'alamat'=>$post["alamat"],  
        'nama_penjual'=>$post["nama_penjual"], 
        'kontak'=>$post["kontak"], 
        'regional'=>$post["regional"], 
        'nik'=>$post["nik"], 
        'target'=>$post["target"], 
    );
    $this->db->insert("master_penjual", $array);  
    return $this->db->insert_id();
} 
public function updatedatapenjual()
{
    $post = $this->input->post();
    $this->nama_penjual = $post["nama_penjual"];
    $this->alamat = $post["alamat"];
    $this->kontak = $post["kontak"];
    $this->regional = $post["regional"];
    $this->nik = $post["nik"];
    $this->target = $post["target"];
    return $this->db->update("master_penjual", $this, array('id' => $post['idd']));
} 
public function hapusdatapenjual()
{
    $post = $this->input->post(); 
    $this->db->where('id', $post['idd']);
    return $this->db->delete('master_penjual');  
}
    //CRUD penjual end 

// datatable serah_terima start
var $column_search_serah_terima = array('tgl_serah_terima','id_master_item','keterangan');
var $column_order_serah_terima = array(null, 'tgl_serah_terima','keterangan');
var $order_serah_terima = array('a.waktu_update' => 'DESC');
private function _get_query_serah_terima()
{
    $this->db->select('a.*,b.luas_surat,b.luas_ukur,c.nama_regional');
    $this->db->from('master_serah_terima a');
    $this->db->join('master_item b', 'b.kode_item = a.id_master_item', 'left');
    $this->db->join('master_regional c', 'b.id_perumahan = c.id', 'left');
    $get = $this->input->get();
    $i = 0;
    foreach ($this->column_search_serah_terima as $item)
    {
        if($get['search']['value'])
        {
            if($i===0)
            {
                $this->db->group_start();
                $this->db->like($item, $get['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $get['search']['value']);
            }

            if(count($this->column_search_serah_terima) - 1 == $i)
                $this->db->group_end();
        }
        $i++;
    }
    if(isset($get['order']))
    {
        $this->db->order_by($this->column_order_serah_terima[$get['order']['0']['column']], $get['order']['0']['dir']);
    }
    else if(isset($this->order_serah_terima))
    {
        $order = $this->order_serah_terima;
        $this->db->order_by(key($order), $order[key($order)]);
    }
}

function get_serah_terima_datatable()
{
    $get = $this->input->get();
    $this->_get_query_serah_terima();
    // $this->db->where('jenis_pembeli','2');
    if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_datatable_serah_terima()
{
    $this->_get_query_serah_terima();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all_datatable_serah_terima()
{
    $this->db->from('master_serah_terima');
    return $this->db->count_all_results();
}
//datatable serah_terima end

//CRUD serah_terima start
public function rulesserah_terima()
{
    return [
        [
            'field' => 'tgl_serah_terima',
            'label' => 'Tanggal serah_terima',
            'rules' => 'required',
        ]
    ];
}
function simpandataserah_terima(){
    $post = $this->input->post();
    $array = array(
        'tgl_serah_terima'=>$post["tgl_serah_terima"],
        'keterangan'=>$post["keterangan"],
        'id_master_item'=>$post["id_master_item"],
    );
    $this->db->insert("master_serah_terima", $array);
    return $this->db->insert_id();
}
public function updatedataserah_terima()
{
    $post = $this->input->post();
    $this->tgl_serah_terima = $post["tgl_serah_terima"];
    $this->keterangan = $post["keterangan"];
    return $this->db->update("master_serah_terima", $this, array('id_serah_terima' => $post['idd']));
}
public function hapusdataserah_terima()
{
    $post = $this->input->post();
    $this->db->where('id_serah_terima', $post['idd']);
    return $this->db->delete('master_serah_terima');
}
//CRUD serah_terima end

}
