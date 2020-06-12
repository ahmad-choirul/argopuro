<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller {   
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != TRUE){    
            redirect(base_url('login'));
        }    
        $this->load->model('master_model');
        $this->load->library('form_validation');
        $this->load->helper(array('string','security','form'));
    }  
    
    public function index()
    {    
        level_user('master','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['total_penjual'] = $this->db->count_all('master_penjual'); 
        $data['total_pembeli'] = $this->db->count_all('master_pembeli'); 
        $data['total_agen'] = $this->db->count_all('master_supplier');
        $data['total_distributor'] = $this->db->count_all('master_distributor');
        $data['total_regional'] = $this->db->count_all('master_regional');
        $data['total_item'] =$this->db->count_all('master_item');
        $this->load->view('member/master/beranda',$data);
    }  
    public function absensi(){
        $data['absensi'] = $this->master_model->getdataabsensibyid($this->session->userdata('idadmin'));
        $data['listabsensi'] = $this->master_model->getlistabsensi();
        $this->load->view('member/master/absensi',$data);
    }
    public function query($value='')
    {
     echo "<pre>";
     print_r ($this->session->userdata());
     print_r ($this->session->flashdata('query'));
     echo "</pre>";
 }
 public function abseninsert()
 {
    $data['keterangan'] = $this->input->post('keterangan');
    $data['status'] = $this->input->post('status');
    $data['id_admin'] = $this->session->userdata('idadmin');
    $this->master_model->absensiinput($data);
    redirect('master/absensi','refresh');
}
public function supplier()
{   
    level_user('master','supplier',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $data['regional'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
    $data['penjual'] = $this->db->order_by("id","DESC")->get('master_penjual')->result();
    $this->load->view('member/master/supplier',$data);
}  
public function datasupplier()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_supplier_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','supplier',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','supplier',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">   
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->nama_supplier);
        $row[] = $this->security->xss_clean($r->telepon);
        $row[] = $this->security->xss_clean($r->alamat);
        $row[] = $this->security->xss_clean($r->nama_regional);
        $row[] = $this->security->xss_clean($r->nama_penjual);
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_supplier(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_supplier(),
        "data" => $data,
    ); 
    echo json_encode($result); 
}
public function suppliertambah(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulessupplier());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    if($simpan->simpandatasupplier()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";  
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }

}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function supplierdetail(){  
    cekajax(); 
    $idd = intval($this->input->get("id")); 
    $query = $this->db->get_where('master_supplier', array('id' => $idd),1);
    $result = array(  
        "nama_supplier" => $this->security->xss_clean($query->row()->nama_supplier),
        "alamat" => $this->security->xss_clean($query->row()->alamat),
        "telepon" => $this->security->xss_clean($query->row()->telepon),
        "id_regional" => $this->security->xss_clean($query->row()->id_regional),
        "id_penjual" => $this->security->xss_clean($query->row()->id_penjual),
    );    
    echo'['.json_encode($result).']';
}
public function supplieredit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulessupplier());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    if($simpan->updatedatasupplier()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }

}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function supplierhapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatasupplier()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}
public function distributor()
{   
    level_user('master','supplier',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $data['regional'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
    $data['penjual'] = $this->db->order_by("id","DESC")->get('master_penjual')->result();
    $this->load->view('member/master/distributor',$data);
}  
public function datadistributor()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_distributor_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','supplier',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','supplier',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">   
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->nama_distributor);
        $row[] = $this->security->xss_clean($r->nama_regional);
        $row[] = $this->security->xss_clean($r->telepon);
        $row[] = $this->security->xss_clean($r->alamat);
        $row[] = $this->security->xss_clean($r->nama_penjual);
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_distributor(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_distributor(),
        "data" => $data,
    ); 
    echo json_encode($result); 
}
public function distributortambah(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulesdistributor());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    if($simpan->simpandatadistributor()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";  
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }

}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function distributordetail(){  
    cekajax(); 
    $idd = intval($this->input->get("id")); 
    $query = $this->db->get_where('master_distributor', array('id' => $idd),1);
    $result = array(  
        "nama_distributor" => $this->security->xss_clean($query->row()->nama_distributor),
        "alamat" => $this->security->xss_clean($query->row()->alamat),
        "telepon" => $this->security->xss_clean($query->row()->telepon),
        "id_regional" => $this->security->xss_clean($query->row()->id_regional),
        "id_penjual" => $this->security->xss_clean($query->row()->id_penjual),
    );    
    echo'['.json_encode($result).']';
}
public function distributoredit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulesdistributor());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    if($simpan->updatedatadistributor()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }

}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function distributorhapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatadistributor()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}
public function pembeli()
{     
 $data['penjual'] = $this->db->order_by("id","DESC")->get('master_penjual')->result();

 $this->load->view('member/master/pembeli',$data); 
}  

public function datapembeli()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_pembeli_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','pembeli',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','pembeli',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu"> 
        <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->id).'">Detail</a></li>
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->nama_pembeli);
        $row[] = $this->security->xss_clean($r->alamat);
        $row[] = $this->security->xss_clean($r->hp);
        $row[] = $this->security->xss_clean($r->stok_awal);
        $row[] = $this->security->xss_clean($r->total);
        $row[] = $this->security->xss_clean($r->jenis_pembeli);
        $row[] = $this->security->xss_clean($r->luas_sawah);
        $row[] = $this->security->xss_clean($r->nama_penjual);
        $data[] = $row;
    } 
    $result = array( 
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_pembeli(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_pembeli(),
        "data" => $data,
    ); 
    echo json_encode($result); 
}

public function pembelitambah(){ 
    cekajax(); 
    $post = $this->input->post();
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulespembeli());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    $insert_id = $simpan->simpandatapembeli();
    if($insert_id > 0) { 
        $data['success']= true;
        $data['pembeli']= $post["nama_pembeli"];
        $data['id_pembeli']= $insert_id;
        $data['message']="Berhasil menyimpan data";
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }  
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
} 
public function pembelidetail(){  
    cekajax(); 
    $idd = intval($this->input->get("id"));
    $query = $this->db->select("nama_pembeli,hp,master_pembeli.alamat,stok_awal, total,jenis_pembeli,nama_penjual,luas_sawah,master_penjual.id as id_penjual")->join('master_penjual','master_pembeli.id_penjual=master_penjual.id')->get_where('master_pembeli', array('master_pembeli.id' => $idd),1);

    $result = array(  
        "nama_pembeli" => $this->security->xss_clean($query->row()->nama_pembeli),
        "alamat" => $this->security->xss_clean($query->row()->alamat),
        "hp" => $this->security->xss_clean($query->row()->hp),
        "stok_awal" => $this->security->xss_clean($query->row()->stok_awal),
        "total" => $this->security->xss_clean($query->row()->total),
        "jenis_pembeli" => $this->security->xss_clean($query->row()->jenis_pembeli),
        "luas_sawah" => $this->security->xss_clean($query->row()->luas_sawah),
        "nama_penjual" => $this->security->xss_clean($query->row()->nama_penjual),
        "id_penjual" => $this->security->xss_clean($query->row()->id_penjual),

    );    
    echo'['.json_encode($result).']';
}
public function pembeliedit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulespembeli());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    $simpan->updatedatapembeli();
    $data['success']= true;
    $data['message']="Berhasil menyimpan data";
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function pembelihapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatapembeli()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors="fail";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}

public function perumahan()
{   
    level_user('master','perumahan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
     $data['status'] = $this->db->order_by("id_status_regional","DESC")->get('master_status_regional')->result();
    $this->load->view('member/master/perumahan',$data);
}  
public function datakategori()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_kategori_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','perumahan',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','perumahan',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu"> 
        '.$tomboledit.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->id); 
        $row[] = $this->security->xss_clean($r->nama_regional); 
        $row[] = $this->security->xss_clean($r->lokasi); 
        $row[] = $this->security->xss_clean($r->nama_status); 
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_kategori(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_kategori(),
        "data" => $data,
    ); 
    echo json_encode($result); 
}
public function kategoritambah(){ 
    cekajax(); 
    $simpan = $this->master_model;

    if($simpan->simpandatakategori()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";   
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }  

    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
} 

public function kategoridetail(){  
    cekajax(); 
    $this->db->join('master_status_regional', 'master_regional.status_regional = master_status_regional.id_status_regional', 'left');
    $query = $this->db->get_where('master_regional', array('id' => $this->input->get("id")),1);
    $result = array(  
        "id" => $this->security->xss_clean($query->row()->id), 
        "nama_regional" => $this->security->xss_clean($query->row()->nama_regional), 
        "lokasi" => $this->security->xss_clean($query->row()->lokasi), 
        "nama_status" => $this->security->xss_clean($query->row()->nama_status), 
        "status_regional" => $this->security->xss_clean($query->row()->status_regional), 
    );    
    echo'['.json_encode($result).']';
} 
public function kategoriedit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $post = $this->input->post();
    if($post["id"] != $post["id"]){  
        $data['success']= true;
        $data['message']="Data tidak berubah";  
    }else{          
        $validation = $this->form_validation; 
        $validation->set_rules($simpan->ruleskategori());
        if ($this->form_validation->run() == FALSE){
            $errors = $this->form_validation->error_array();
            $data['errors'] = $errors;
        }else{    
            if($simpan->updatedatakategori()){
                $data['success']= true;
                $data['message']="Berhasil menyimpan data";   
            }else{
                $errors['fail'] = "gagal melakukan update data";
                $data['errors'] = $errors;
            }  
        }
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}

public function kategorihapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatakategori()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}  
public function satuan() 
{   
    level_user('master','satuan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $this->load->view('member/master/satuan');
}  
public function datasatuan()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_satuan_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','satuan',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','satuan',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu"> 
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->id);
        $row[] = $this->security->xss_clean($r->isi_persatuan);
        $row[] = $this->security->xss_clean($r->satuan_besar); 
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_satuan(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_satuan(),
        "data" => $data,
    ); 
    echo json_encode($result);  
}
public function satuantambah(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulessatuan());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{     
       if($simpan->simpandatasatuan()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";   
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }			
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
} 

public function satuanedit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $post = $this->input->post();
    if($post["satuan_besar"] == $post["idd"]){  
        $data['success']= true;
        $data['message']="Data satuan besar tidak boleh sama";  
    }else{          
        $validation = $this->form_validation; 
        $validation->set_rules('isi_persatuan','Jumlah','required');
        if ($this->form_validation->run() == FALSE){
            $errors = $this->form_validation->error_array();
            $data['errors'] = $errors;
        }else{     
            if($simpan->updatedatasatuan()){
             $data['success']= true;
             $data['message']="Berhasil menyimpan data";   
         }else{
             $errors['fail'] = "gagal melakukan update data";
             $data['errors'] = $errors;
         }						
     }
 }
 $data['token'] = $this->security->get_csrf_hash();
 echo json_encode($data); 
}

public function satuanhapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatasatuan()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}  

public function merk()
{   
    level_user('master','merk',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $this->load->view('member/master/merk');
}
public function datamerk()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_merk_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','satuan',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','satuan',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu"> 
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->id); 
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_merk(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_merk(),
        "data" => $data,
    ); 
    echo json_encode($result);  
}

public function merktambah(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulesmerk());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{      			
       if($simpan->simpandatamerk()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";   
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }  
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}

public function merkdetail(){  
    cekajax(); 
    $query = $this->db->get_where('master_merk', array('id' => $this->input->get("id")),1);
    $result = array(  
        "namamerk" => $this->security->xss_clean($query->row()->id), 
    );    
    echo'['.json_encode($result).']';
} 

public function merkedit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $post = $this->input->post();
    if($post["id"] == $post["idd"]){  
        $data['success']= true;
        $data['message']="Data tidak berubah";  
    }else{          
        $validation = $this->form_validation; 
        $validation->set_rules($simpan->rulesmerk());
        if ($this->form_validation->run() == FALSE){
            $errors = $this->form_validation->error_array();
            $data['errors'] = $errors;
        }else{      
            if($simpan->updatedatamerk()){
                $data['success']= true;
                $data['message']="Berhasil menyimpan data";   
            }else{
                $errors['fail'] = "gagal melakukan update data";
                $data['errors'] = $errors;
            }  
        }
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}
public function merkhapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatamerk()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}

public function items()
{  
    level_user('master','items',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
     $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
     $data['perumahan2'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
     $data['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();

    $this->load->view('member/master/master_item',$data);
} 
public function pageitem()
 {
     $data['perumahandalamijin'] = $this->db->order_by("id","DESC")->where('status_regional','1')->get('master_regional')->result();
     $data['perumahanluarijin'] = $this->db->order_by("id","DESC")->where('status_regional','2')->get('master_regional')->result();
     $data['perumahanlokasi'] = $this->db->order_by("id","DESC")->where('status_regional','3')->get('master_regional')->result();
     $data['perumahan2'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
     $data['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();

    $this->load->view('member/master/items_view',$data);
 } 

public function dataitems()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_item_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','items',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','items',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Edit</a></li>':'';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu"> 
        <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Detail</a></li> 
        '.$tomboledit.'
        '.$tombolhapus.' 
        </ul>
        </div>
        ';
        if ($r->tanggal_pengalihan!=null) {
            $tgl_pengalihan = tgl_indo($r->tanggal_pengalihan);
        }else{
            $tgl_pengalihan = '-';
        }
        if ($r->id_perumahan=='0') {
            $perumahan = 'Tidak ada';
        }else{
            $perumahan = $r->nama_regional;
        }

        $row[] = $this->security->xss_clean($perumahan);
        $row[] = $this->security->xss_clean($r->kode_item); 
        $row[] = $this->security->xss_clean($r->nama_item);  
        $row[] = $this->security->xss_clean(tgl_indo($r->tanggal_pembelian));
        $row[] = $this->security->xss_clean($r->nama_penjual);  
        $row[] = $this->security->xss_clean($r->nama_surat_tanah);  
        $row[] = $this->security->xss_clean($r->kode_sertifikat);  
        $row[] = $this->security->xss_clean($r->no_gambar);  
        $row[] = $this->security->xss_clean($r->jumlah_bidang);  
        $row[] = $this->security->xss_clean($r->luas_surat);  
        $row[] = $this->security->xss_clean($r->luas_ukur);  
        $row[] = $this->security->xss_clean($r->no_pbb);  
        $row[] = $this->security->xss_clean($r->luas_pbb);  
        $row[] = $this->security->xss_clean($r->njop);  
        $row[] = $this->security->xss_clean(rupiah($r->satuan_harga_pengalihan));  
        $row[] = $this->security->xss_clean(rupiah($r->total_harga_pengalihan));  
        $row[] = $this->security->xss_clean($r->nama_makelar);  
        $row[] = $this->security->xss_clean(rupiah($r->nilai));  
        $row[] = $this->security->xss_clean($tgl_pengalihan);  
        $row[] = $this->security->xss_clean($r->akta_pengalihan);  
        $row[] = $this->security->xss_clean($r->nama_pengalihan);  
        $row[] = $this->security->xss_clean(rupiah($r->pematangan));  
        $row[] = $this->security->xss_clean(rupiah($r->ganti_rugi));  
        $row[] = $this->security->xss_clean(rupiah($r->pbb));  
        $row[] = $this->security->xss_clean(rupiah($r->lain));  
        $row[] = $this->security->xss_clean(rupiah($r->harga_perm));  
        $row[] = $this->security->xss_clean($r->keterangan);
        $data[] = $row;
    }
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_item(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_item(),
        "data" => $data,
    ); 
    echo json_encode($result);  
}  
public function itemstambah(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulesitems());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{      			
       if($simpan->simpandataitems()){
        $data['success']= true;
        $data['message']="Berhasil menyimpan data";   
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }  
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}

public function itemdetail(){  
    cekajax(); 
    $idd = $this->input->get("id"); 
    $this->db->join('master_regional', 'master_item.id_perumahan = master_regional.id', 'left');
    $this->db->join('tbl_sertifikat_tanah', 'master_item.status_surat_tanah = tbl_sertifikat_tanah.id_sertifikat_tanah', 'left');
    $query = $this->db->get_where('master_item', array('kode_item' => $idd),1);
    $result = array(  
       "kode_item" => $this->security->xss_clean($query->row()->kode_item),
       "nama_item" => $this->security->xss_clean($query->row()->nama_item),
       "tanggal_pembelian" => $this->security->xss_clean($query->row()->tanggal_pembelian),
       "nama_penjual" => $this->security->xss_clean($query->row()->nama_penjual),
       "nama_surat_tanah" => $this->security->xss_clean($query->row()->nama_surat_tanah),
       "status_surat_tanah" => $this->security->xss_clean($query->row()->status_surat_tanah),
       "nama_status_surat_tanah" => $this->security->xss_clean($query->row()->nama_sertifikat),
       "no_gambar" => $this->security->xss_clean($query->row()->no_gambar),
       "jumlah_bidang" => $this->security->xss_clean($query->row()->jumlah_bidang),
       "luas_surat" => $this->security->xss_clean($query->row()->luas_surat),
       "luas_ukur" => $this->security->xss_clean($query->row()->luas_ukur),
       "no_pbb" => $this->security->xss_clean($query->row()->no_pbb),
       "luas_pbb" => $this->security->xss_clean($query->row()->luas_pbb),
       "njop" => $this->security->xss_clean($query->row()->njop),
       "satuan_harga_pengalihantampil" => $this->security->xss_clean(rupiah($query->row()->satuan_harga_pengalihan)),
       "satuan_harga_pengalihan" => $this->security->xss_clean($query->row()->satuan_harga_pengalihan),
       "total_harga_pengalihantampil" => $this->security->xss_clean(rupiah($query->row()->total_harga_pengalihan)),
       "total_harga_pengalihan" => $this->security->xss_clean($query->row()->total_harga_pengalihan),
       "nama_makelar" => $this->security->xss_clean($query->row()->nama_makelar),
       "nilaitampil" => $this->security->xss_clean(rupiah($query->row()->nilai)),
       "nilai" => $this->security->xss_clean($query->row()->nilai),
       "tanggal_pengalihan" => $this->security->xss_clean($query->row()->tanggal_pengalihan),
       "akta_pengalihan" => $this->security->xss_clean($query->row()->akta_pengalihan),
       "nama_pengalihan" => $this->security->xss_clean($query->row()->nama_pengalihan),
       "pematangantampil" => $this->security->xss_clean(rupiah($query->row()->pematangan)),
       "pematangan" => $this->security->xss_clean($query->row()->pematangan),
       "ganti_rugitampil" => $this->security->xss_clean(rupiah($query->row()->ganti_rugi)),
       "ganti_rugi" => $this->security->xss_clean($query->row()->ganti_rugi),
       "pbbtampil" => $this->security->xss_clean(rupiah($query->row()->pbb)),
       "pbb" => $this->security->xss_clean($query->row()->pbb),
       "laintampil" => $this->security->xss_clean(rupiah($query->row()->lain)),
       "lain" => $this->security->xss_clean($query->row()->lain),
       "harga_permtampil" => $this->security->xss_clean(rupiah($query->row()->harga_perm)),
       "harga_perm" => $this->security->xss_clean($query->row()->harga_perm),
       "keterangan" => $this->security->xss_clean($query->row()->keterangan),
       "id_perumahan" => $this->security->xss_clean($query->row()->id_perumahan),
       "nama_regional" => $this->security->xss_clean($query->row()->nama_regional),
   );    
    echo'['.json_encode($result).']';
}

public function itemsedit(){ 
    cekajax(); 
    $simpan = $this->master_model; 
    $post = $this->input->post();
    if($post["kode_item"] == $post["idd"]){  
        $validation = $this->form_validation; 
        $validation->set_rules($simpan->rulesitemsedit());
        if ($this->form_validation->run() == FALSE){
            $errors = $this->form_validation->error_array();
            $data['errors'] = $errors;
        }else{       
            if($simpan->updatedataitems()){
                $data['success']= true;
                $data['message']="Berhasil menyimpan data";   
            }else{
                $errors['fail'] = "gagal melakukan update data";
                $data['errors'] = $errors;
            }  				
        }
    }else{          
        $validation = $this->form_validation; 
        $validation->set_rules($simpan->rulesitems());
        if ($this->form_validation->run() == FALSE){
            $errors = $this->form_validation->error_array();
            $data['errors'] = $errors;
        }else{          
            if($simpan->updatedataitems()){
                $data['success']= true;
                $data['message']="Berhasil menyimpan data";   
            }else{
                $errors['fail'] = "gagal melakukan update data";
                $data['errors'] = $errors;
            }  
        }
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}

public function itemshapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdataitem()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}

public function racikan()
{    
    level_user('master','racikan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $data['itemobat'] = $this->db->get_where('master_item', array('jenis' => 'obat'))->result();
    $data['kategori'] = $this->db->get('master_regional')->result(); 
    $this->load->view('member/master/racikan',$data);
}  

public function dataracikan()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_dataracikan_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tombolhapus = level_user('master','racikan',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','racikan',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Edit</a></li>':'';
        $row[] = ' <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
        <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->kode_item).'">Detail</a></li> 
        '.$tomboledit.'
        '.$tombolhapus.' 
        </ul>
        </div>
        '; 
        $row[] = $this->security->xss_clean($r->kode_item); 
        $row[] = $this->security->xss_clean($r->nama_item); 
        $row[] = $this->security->xss_clean(rupiah($r->harga_jual));   
        $row[] = $this->security->xss_clean(rupiah($r->upah_peracik));  
        $row[] = $this->security->xss_clean($r->aturan_pakai); 
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_dataracikan(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_dataracikan(),
        "data" => $data,
    ); 
    echo json_encode($result);  
}  
public function racikandetail(){  
    cekajax(); 
    $idd = $this->input->get("id");
    $query = $this->db->get_where('master_item', array('kode_item' => $idd),1);
    $result = array(  
        "kode_item" => $this->security->xss_clean($query->row()->kode_item),
        "jenis" => $this->security->xss_clean($query->row()->jenis),
        "kategori" => $this->security->xss_clean($query->row()->kategori),
        "satuan" => $this->security->xss_clean($query->row()->satuan),
        "nama_item" => $this->security->xss_clean($query->row()->nama_item),
        "keterangan" => $this->security->xss_clean($query->row()->keterangan), 
        "lokasi" => $this->security->xss_clean($query->row()->lokasi), 
        "harga_jual" => $this->security->xss_clean(rupiah($query->row()->harga_jual)), 
        "harga_jual_edit" => $this->security->xss_clean($query->row()->harga_jual), 
        "aturan_pakai" => $this->security->xss_clean($query->row()->aturan_pakai), 
        "upah_peracik" => $this->security->xss_clean(rupiah($query->row()->upah_peracik)), 
        "upah_peracik_edit" => $this->security->xss_clean($query->row()->upah_peracik), 
        "gambar" => $this->security->xss_clean($query->row()->gambar), 
    );     

    $subitem= $this->master_model->get_dataracikan($idd); 
    foreach($subitem as $r) {   
       $subArray['kode_item']=$r->kode_obat;
       $subArray['nama_item']=$r->nama_item;  
       $subArray['jumlah_obat_dibuat']=$r->jumlah_obat_dibuat;   
       $subArray['jumlah_obat_dipakai']=$r->jumlah_obat_dipakai;     
       $arraysub[] =  $subArray ; 
   }  
   $datasub = $arraysub;
   $array[] =  $result ; 
   echo'{"datarows":'.json_encode($array).',"datasub":'.json_encode($datasub).'}';
} 

public function pilihanobat()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_pilihanobat_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $row[] = $this->security->xss_clean($r->kode_item); 
        $row[] = $this->security->xss_clean($r->nama_item); 
        $row[] = $this->security->xss_clean($r->kategori);   
        $row[] = ' 
        <a onclick="pilihobat(this)"  data-namaitem="'.$r->nama_item.'" data-id="'.$r->kode_item.'" class="mt-xs mr-xs btn btn-info datarowobat" role="button"><i class="fa fa-check-square-o"></i></a>
        '; 
        $data[] = $row;
    } 
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_pilihanobat(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_pilihanobat(),
        "data" => $data,
    ); 
    echo json_encode($result);  
}  
public function racikantambah(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulesitems());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{            
    $kode_obat = $this->input->post("kode_obat");   
    if(isset($kode_obat) === TRUE AND $kode_obat[0]!='')
    {  
        if($simpan->simpandataracikan()){
            $data['success']= true;
            $data['message']="Berhasil menyimpan data";   
        }else{
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        } 
    }
    else{ 
        $errors['jumlah_obat'] = "Mohon pilih obat yang ingin diracik";
        $data['errors'] = $errors;
    }
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function racikanhapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdataracikan()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors['fail'] = "gagal menghapus data";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
} 
public function racikanedit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulesitemsedit());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{            
    $kode_obat = $this->input->post("kode_obat");   
    if(isset($kode_obat) === TRUE AND $kode_obat[0]!='')
    {  
        if($simpan->updatedataracikan()){
            $data['success']= true;
            $data['message']="Berhasil menyimpan data";   
        }else{
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        } 
    }
    else{ 
        $errors['jumlah_obat'] = "Mohon pilih obat yang ingin diracik";
        $data['errors'] = $errors;
    }
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}

    // penjual
public function penjual()
{     
 $data['regional'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
 $this->load->view('member/master/penjual',$data); 
}  

public function datapenjual()
{   
    cekajax(); 
    $get = $this->input->get();
    $list = $this->master_model->get_penjual_datatable();
    $data = array(); 
    foreach ($list as $r) { 
        $row = array(); 
        $tomboldaftar='';
        if ($r->id_admin=='0') {
            $tomboldaftar = 
            ' 
            <div class="btn-group dropup">
            <a class="mb-xs mt-xs mr-xs btn btn-primary href="#" onclick="daftar_akun(this)" data-id_penjual="'.$this->security->xss_clean($r->id).'" data-nama_penjual="'.$this->security->xss_clean($r->nama_penjual).'">Daftar</a>
            </div>
            ';
        }
        $tombolhapus = '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>';
        $tomboledit = '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>';
        $row[] = ' 
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu"> 
        <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->id).'">Detail</a></li>
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean($r->nama_penjual);
        $row[] = $this->security->xss_clean($r->nik);
        $row[] = $this->security->xss_clean($r->target);
        $row[] = $this->security->xss_clean($r->nama_regional);
        $row[] = $this->security->xss_clean($r->alamat);
        $row[] = $this->security->xss_clean($r->kontak);
        $row[] = $tomboldaftar;
        $data[] = $row;
    } 
    $result = array( 
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_penjual(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_penjual(),
        "data" => $data,
    ); 
    echo json_encode($result); 
}

public function penjualtambah(){ 
    cekajax(); 
    $post = $this->input->post();
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulespenjual());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    $insert_id = $simpan->simpandatapenjual();
    if($insert_id > 0) { 
        $data['success']= true;
        $data['penjual']= $post["nama_penjual"];
        $data['id_penjual']= $insert_id;
        $data['message']="Berhasil menyimpan data";
    }else{
        $errors['fail'] = "gagal melakukan update data";
        $data['errors'] = $errors;
    }  
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
} 
public function penjualdetail(){  
    cekajax(); 
    $idd = intval($this->input->get("id")); 
    $query = $this->db->select("master_penjual.id as id_penjual,nama_penjual, kontak, alamat, nik,nama_regional,regional,target")->join('master_regional','master_regional.id=master_penjual.regional')->get_where('master_penjual', array('master_penjual.id' => $idd),1);

    $result = array(  
        "id_penjual" => $this->security->xss_clean($query->row()->id_penjual),
        "nama_penjual" => $this->security->xss_clean($query->row()->nama_penjual),
        "alamat" => $this->security->xss_clean($query->row()->alamat),
        "kontak" => $this->security->xss_clean($query->row()->kontak),
        "nama_regional" => $this->security->xss_clean($query->row()->nama_regional),
        "regional" => $this->security->xss_clean($query->row()->regional),
        "nik" => $this->security->xss_clean($query->row()->nik),
        "target" => $this->security->xss_clean($query->row()->target),
    );    
    echo'['.json_encode($result).']';
}
public function penjualedit(){ 
    cekajax(); 
    $simpan = $this->master_model;
    $validation = $this->form_validation; 
    $validation->set_rules($simpan->rulespenjual());
    if ($this->form_validation->run() == FALSE){
       $errors = $this->form_validation->error_array();
       $data['errors'] = $errors;
   }else{    
    $simpan->updatedatapenjual();
    $data['success']= true;
    $data['message']="Berhasil menyimpan data";
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data); 
}
public function penjualhapus(){ 
    cekajax(); 
    $hapus = $this->master_model;
    if($hapus->hapusdatapenjual()){ 
        $data['success']= true;
        $data['message']="Berhasil menghapus data"; 
    }else{    
        $errors="fail";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data); 
}
// serah_terima
public function serah_terima()
{
    level_user('master','serah_terima',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $this->load->view('member/master/serah_terima');
}

public function dataserah_terima()
{
    cekajax();
    $get = $this->input->get();
    $list = $this->master_model->get_serah_terima_datatable();
    $data = array();
    foreach ($list as $r) {
        $row = array();
        $tombolhapus = level_user('master','serah_terima',$this->session->userdata('kategori'),'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="'.$this->security->xss_clean($r->id).'">Hapus</a></li>':'';
        $tomboledit = level_user('master','serah_terima',$this->session->userdata('kategori'),'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="'.$this->security->xss_clean($r->id).'">Edit</a></li>':'';
        $row[] = '
        <div class="btn-group dropup">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
        <li><a href="#" onclick="detail(this)" data-id="'.$this->security->xss_clean($r->id).'">Detail</a></li>
        '.$tomboledit.'
        '.$tombolhapus.'
        </ul>
        </div>
        ';
        $row[] = $this->security->xss_clean(tgl_indo($r->tgl_serah_terima));
        $row[] = $this->security->xss_clean($r->id_master_item);
        $row[] = $this->security->xss_clean($r->luas_surat);
        $row[] = $this->security->xss_clean($r->luas_ukur);
        $row[] = $this->security->xss_clean($r->keterangan);
        $data[] = $row;
    }
    $result = array(
        "draw" => $get['draw'],
        "recordsTotal" => $this->master_model->count_all_datatable_serah_terima(),
        "recordsFiltered" => $this->master_model->count_filtered_datatable_serah_terima(),
        "data" => $data,
    );
    echo json_encode($result);
}

public function serah_terimatambah(){
    cekajax();
    $post = $this->input->post();
    $simpan = $this->master_model;
    $validation = $this->form_validation;
    $validation->set_rules($simpan->rulesserah_terima());
    if ($this->form_validation->run() == FALSE){
        $errors = $this->form_validation->error_array();
        $data['errors'] = $errors;
    }else{
        $insert_id = $simpan->simpandataserah_terima();
        if($insert_id > 0) {
            $data['success']= true;
            $data['serah_terima']= $post["keterangan"];
            $data['id_serah_terima']= $insert_id;
            $data['message']="Berhasil menyimpan data";
        }else{
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        }
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data);
}
public function serah_terimadetail(){
    cekajax();
    $idd = intval($this->input->get("id"));
    $query = $this->db->select("tgl_serah_terima, keterangan, jumlah, editor")->get_where('master_serah_terima', array('id' => $idd),1);

    $result = array(
        "idd" => $this->security->xss_clean($idd),
        "tgl_serah_terima" => $this->security->xss_clean($query->row()->tgl_serah_terima),
        "tgl_serah_terima_indo" => $this->security->xss_clean(tgl_indo($query->row()->tgl_serah_terima)),
        "keterangan" => $this->security->xss_clean($query->row()->keterangan),
        "jumlah" => $this->security->xss_clean($query->row()->jumlah),
        "jumlahrp" => $this->security->xss_clean(rupiah($query->row()->jumlah)),
        "editor" => $this->security->xss_clean($query->row()->editor),
    );
    echo'['.json_encode($result).']';
}
public function serah_terimaedit(){
    cekajax();
    $simpan = $this->master_model;
    $validation = $this->form_validation;
    $validation->set_rules($simpan->rulesserah_terima());
    if ($this->form_validation->run() == FALSE){
      $errors = $this->form_validation->error_array();
      $data['errors'] = $errors;
  }else{
    $simpan->updatedataserah_terima();
    $data['success']= true;
    $data['message']="Berhasil menyimpan data";
}
$data['token'] = $this->security->get_csrf_hash();
echo json_encode($data);
}
public function serah_terimahapus(){
    cekajax();
    $hapus = $this->master_model;
    if($hapus->hapusdataserah_terima()){
        $data['success']= true;
        $data['message']="Berhasil menghapus data";
    }else{
        $errors="fail";
        $data['errors'] = $errors;
    }
    $data['token'] = $this->security->get_csrf_hash();
    echo json_encode($data);
}
}
