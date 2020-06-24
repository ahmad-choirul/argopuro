<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./phpspreadsheet/vendor/autoload.php'); 
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

class Laporan extends CI_Controller {   
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != TRUE){    
            redirect(base_url('login'));
        }    
        $this->load->model('master_model');
        $this->load->model('laporan_model');
        $this->load->library('form_validation');
        $this->load->helper(array('string','security','form'));
        $this->load->library('Ajax_pagination');
        $this->perPage = 100;
    } 
    public function index()
    {   
        level_user('laporan','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/laporan/beranda');
    }

    public function master_proses_induktambah(){
        cekajax(); 
        $simpan = $this->master_model;
        if($simpan->simpandatamasterproses_induk()){
            $data['success']= true;
            $data['message']="Berhasil menyimpan data";   
        }else{
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }   
    public function master_proses_indukedit(){ 
        cekajax(); 
        $simpan = $this->master_model;            
        $kode_obat = $this->input->post("kode_obat");    
        if($simpan->updatedatamasterproses_induk()){
            $data['success']= true;
            $data['message']="Berhasil menyimpan data";   
        }else{
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        } 

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    }
    public function laba_rugi()
    {     
        level_user('laporan','penjualan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->model('Master_model');

        $firstdate = $this->input->get('firstdate');
        $lastdate = $this->input->get('lastdate'); 
        $conditions['search']['firstdate'] = $firstdate;
        $conditions['search']['lastdate'] = $lastdate;
        $this->load->model('Keuangan_model');
        $data['data_hutang'] = $this->Keuangan_model->gethutangarray();
        $data['data_penjualan'] = $this->laporan_model->getrowspenjualan($conditions);
        $data['data_proses_induk'] = $this->Master_model->getproses_indukarray($conditions);
        $this->load->view('member/laporan/laba_rugi',$data);
    }   


    public function pembayaran($kode_item='')
    {  
        level_user('master','items',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();

        $data['firstdate'] = $this->input->get('firstdate',true);
        $data['lastdate'] = $this->input->get('lastdate',true);
        $data['kode_item'] = $kode_item;
        $data['list'] = $this->keuangan_model->getpembayaran($kode_item);
        $this->load->view('member/master/items',$data);
    }  
    public function laporan_evaluasi_pembelian_detail()
    {  
        level_user('master','items',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();

        $data['firstdate'] = $this->input->get('firstdate',true);
        $data['lastdate'] = $this->input->get('lastdate',true);
        $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
        $data['perumahan2'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
        $data['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();
        $this->load->view('member/master/items',$data);
    }  

    public function laporan_evaluasi_land_bank()
    {
        level_user('master','items',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
        $data['perumahan2'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
        $data['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();
        $data['list'] = $this->dataevaluasilandbank();
        $this->load->view('member/laporan/evaluasi_land_bank',$data);
    }
    public function dataevaluasilandbank()
    {
        $data['perumahandalamijin'] = $this->db->order_by("id","DESC")->where('status_regional','1')->get('master_regional')->result();
        $data['perumahanluarijin'] = $this->db->order_by("id","DESC")->where('status_regional','2')->get('master_regional')->result();
        $data['perumahanlokasi'] = $this->db->order_by("id","DESC")->where('status_regional','3')->get('master_regional')->result();
        $data1 = array(); 
        $data2 = array(); 
        $data3 = array(); 
        $no=1;
        if ($data['perumahandalamijin']!=null) {
         foreach ($data['perumahandalamijin'] as $key => $value) {
            $list1 = $this->master_model->get_rekaplandbank($value->id,'1970-01-01',(date('Y')-1).'-12-31');
            $list2 = $this->master_model->get_rekaplandbank($value->id,date('Y'.'-01-01'),date('Y').'-12-31');
            $list3 = $this->master_model->get_rekaplandbank($value->id);
            $list4 = $this->master_model->get_rekaplandbank($value->id,'','','sudah');
            $row = array();

            $row[] = $this->security->xss_clean($no++);
            $row[] = $this->security->xss_clean($value->nama_regional); 

            $row[] = $this->security->xss_clean($list1['bid']);
            $row[] = $this->security->xss_clean($list1['surat']); 
            $row[] = $this->security->xss_clean($list1['ukur']);  

            $row[] = $this->security->xss_clean($list2['bid']);
            $row[] = $this->security->xss_clean($list2['surat']); 
            $row[] = $this->security->xss_clean($list2['ukur']);  

            $row[] = $this->security->xss_clean($list3['bid']);
            $row[] = $this->security->xss_clean($list3['surat']); 
            $row[] = $this->security->xss_clean($list3['ukur']);

            $row[] = $this->security->xss_clean($list4['bid']);
            $row[] = $this->security->xss_clean($list4['surat']); 
            $row[] = $this->security->xss_clean($list4['ukur']);  

            $row[] = $this->security->xss_clean($list3['bid']-$list4['bid']);
            $row[] = $this->security->xss_clean($list3['surat']-$list4['surat']); 
            $row[] = $this->security->xss_clean($list3['ukur']-$list4['ukur']); 

            $row[] = $this->security->xss_clean($list4['bid']);
            $row[] = $this->security->xss_clean($list4['surat']); 
            $row[] = $this->security->xss_clean($list4['ukur']);  

            $row[] = $this->security->xss_clean($list4['bid']);
            $row[] = $this->security->xss_clean($list4['surat']);
            $data1[] = $row;
        }
    }

    if ($data['perumahanluarijin']!=null) {
     foreach ($data['perumahanluarijin'] as $key => $value) {
        $list1 = $this->master_model->get_rekaplandbank($value->id,'1970-01-01',(date('Y')-1).'-12-31');
        $list2 = $this->master_model->get_rekaplandbank($value->id,date('Y'.'-01-01'),date('Y').'-12-31');
        $list3 = $this->master_model->get_rekaplandbank($value->id);
        $list4 = $this->master_model->get_rekaplandbank($value->id,'','','sudah');
        $row = array();

        $row[] = $this->security->xss_clean($no++);
        $row[] = $this->security->xss_clean($value->nama_regional); 

        $row[] = $this->security->xss_clean($list1['bid']);
        $row[] = $this->security->xss_clean($list1['surat']); 
        $row[] = $this->security->xss_clean($list1['ukur']);  

        $row[] = $this->security->xss_clean($list2['bid']);
        $row[] = $this->security->xss_clean($list2['surat']); 
        $row[] = $this->security->xss_clean($list2['ukur']);  

        $row[] = $this->security->xss_clean($list3['bid']);
        $row[] = $this->security->xss_clean($list3['surat']); 
        $row[] = $this->security->xss_clean($list3['ukur']);

        $row[] = $this->security->xss_clean($list4['bid']);
        $row[] = $this->security->xss_clean($list4['surat']); 
        $row[] = $this->security->xss_clean($list4['ukur']);  

        $row[] = $this->security->xss_clean($list3['bid']-$list4['bid']);
        $row[] = $this->security->xss_clean($list3['surat']-$list4['surat']); 
        $row[] = $this->security->xss_clean($list3['ukur']-$list4['ukur']); 

        $row[] = $this->security->xss_clean($list4['bid']);
        $row[] = $this->security->xss_clean($list4['surat']); 
        $row[] = $this->security->xss_clean($list4['ukur']);  

        $row[] = $this->security->xss_clean($list4['bid']);
        $row[] = $this->security->xss_clean($list4['surat']);
        $data2[] = $row;
    }
}

if ($data['perumahanlokasi']!=null) {
 foreach ($data['perumahanlokasi'] as $key => $value) {
    $list1 = $this->master_model->get_rekaplandbank($value->id,'1970-01-01',(date('Y')-1).'-12-31');
    $list2 = $this->master_model->get_rekaplandbank($value->id,date('Y'.'-01-01'),date('Y').'-12-31');
    $list3 = $this->master_model->get_rekaplandbank($value->id);
    $list4 = $this->master_model->get_rekaplandbank($value->id,'','','sudah');
    $row = array();

    $row[] = $this->security->xss_clean($no++);
    $row[] = $this->security->xss_clean($value->nama_regional); 

    $row[] = $this->security->xss_clean($list1['bid']);
    $row[] = $this->security->xss_clean($list1['surat']); 
    $row[] = $this->security->xss_clean($list1['ukur']);  

    $row[] = $this->security->xss_clean($list2['bid']);
    $row[] = $this->security->xss_clean($list2['surat']); 
    $row[] = $this->security->xss_clean($list2['ukur']);  

    $row[] = $this->security->xss_clean($list3['bid']);
    $row[] = $this->security->xss_clean($list3['surat']); 
    $row[] = $this->security->xss_clean($list3['ukur']);

    $row[] = $this->security->xss_clean($list4['bid']);
    $row[] = $this->security->xss_clean($list4['surat']); 
    $row[] = $this->security->xss_clean($list4['ukur']);  

    $row[] = $this->security->xss_clean($list3['bid']-$list4['bid']);
    $row[] = $this->security->xss_clean($list3['surat']-$list4['surat']); 
    $row[] = $this->security->xss_clean($list3['ukur']-$list4['ukur']); 

    $row[] = $this->security->xss_clean($list4['bid']);
    $row[] = $this->security->xss_clean($list4['surat']); 
    $row[] = $this->security->xss_clean($list4['ukur']);  

    $row[] = $this->security->xss_clean($list4['bid']);
    $row[] = $this->security->xss_clean($list4['surat']);
    $data3[] = $row;
}
}
return array('dalamijin' =>$data1 ,'luarijin' =>$data2 ,'lokasi' =>$data3  );
}

public function dataevaliasishgb()
{
    $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
    $data2 = array(); 
    $no=1;
    if ($data['perumahan']!=null) {
     foreach ($data['perumahan'] as $key => $value) {
        $list1 = $this->master_model->get_rekapshgb($value->id,'1970-01-01',(date('Y')-1).'-12-31');
        $list2 = $this->master_model->get_rekapshgb($value->id,date('Y'.'-01-01'),date('Y').'-12-31');
        $list3 = $this->master_model->get_rekapshgb($value->id);
        $list4 = $this->master_model->get_rekapshgb($value->id,'','','3');
        $row = array();

        $row[] = $this->security->xss_clean($no++);
        $row[] = $this->security->xss_clean($value->nama_regional); 

        $row[] = $this->security->xss_clean($list1['bid']);
        $row[] = $this->security->xss_clean($list1['surat']); 
        $row[] = $this->security->xss_clean($list1['ukur']);  

        $row[] = $this->security->xss_clean($list2['bid']);
        $row[] = $this->security->xss_clean($list2['surat']); 
        $row[] = $this->security->xss_clean($list2['ukur']);  

        $row[] = $this->security->xss_clean($list3['bid']);
        $row[] = $this->security->xss_clean($list3['surat']); 
        $row[] = $this->security->xss_clean($list3['ukur']);

        $row[] = $this->security->xss_clean($list4['bid']);
        $row[] = $this->security->xss_clean($list4['surat']); 
        $row[] = $this->security->xss_clean($list4['ukur']);  

        $row[] = $this->security->xss_clean($list3['bid']-$list4['bid']);
        $row[] = $this->security->xss_clean($list3['surat']-$list4['surat']); 
        $row[] = $this->security->xss_clean($list3['ukur']-$list4['ukur']); 

        $row[] = $this->security->xss_clean($list4['bid']);
        $row[] = $this->security->xss_clean($list4['surat']); 
        $row[] = $this->security->xss_clean($list4['ukur']);  

        $row[] = $this->security->xss_clean($list4['bid']);
        $row[] = $this->security->xss_clean($list4['surat']);
        $data2[] = $row;
    }
}
return $data2;
}

public function laporan_evaluasi_land_bank_per()
{
    $data['id_perumahan'] = $this->input->get('id_perumahan',true);
    $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
    $data['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();
    $this->load->view('member/laporan/evaluasi_land_bank_per',$data);
}  
public function pageevaluasilandbankper()
{
 $data['id_perumahan'] = $this->input->get('id_perumahan',true);
 $data['dataperumahanseb'] = $this->master_model->getperumahan($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31');
 $data['dataperumahanses'] = $this->master_model->getperumahan($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31');
 $data['dataperumahantekseb'] = $this->master_model->getperumahan($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31','sudah');
 $data['dataperumahantekses'] = $this->master_model->getperumahan($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31','sudah');
 $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
 $this->load->view('member/laporan/ajax/ajaxevaluasilandbankper',$data);
}

public function pageevaluasishgbper()
{
 $data['id_perumahan'] = $this->input->get('id_perumahan',true);
 $data['dataperumahanseb'] = $this->master_model->getshgbperumahan($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31');
 $data['dataperumahanses'] = $this->master_model->getshgbperumahan($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31');
 $data['dataperumahantekseb'] = $this->master_model->getshgbperumahan($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31','proses');
 $data['dataperumahantekses'] = $this->master_model->getshgbperumahan($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31','proses');
 $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
 $this->load->view('member/laporan/ajax/ajaxevaluasishgbper',$data);
}

public function pageevaluasiprosesinduk()
{
 // $data['id_perumahan'] = $this->input->get('id_perumahan',true);
   $data['prosesshgbses'] = $this->master_model->getmaster_prosesinduk(date('Y'.'-01-01'),date('Y').'-12-31');
 // $data['prosesshgbseb'] = $this->master_model->getmaster_prosesinduk('1970-01-01',(date('Y')-1).'-12-31');
 // $data['dataperumahanses'] = $this->master_model->getshgbperumahan($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31');
 // $data['dataperumahantekseb'] = $this->master_model->getshgbperumahan($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31','proses');
 // $data['dataperumahantekses'] = $this->master_model->getshgbperumahan($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31','proses');
 // $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
   $this->load->view('member/laporan/ajax/ajaxpenyelesaianinduk',$data);
}


public function proses_indukdetail()
{
    cekajax(); 
    $kode_item = $this->input->get('id');
    $datapembayaran = $this->master_model->getdetailprosesinduk($kode_item);
    $dataitem = $this->master_model->getprosesinduk($kode_item);
    $arraysub = array();
    foreach ($datapembayaran as $po_data) {
        $subArray = array(  
         "id_dtl_proses_induk" => $this->security->xss_clean($po_data['id_dtl_proses_induk']),
         "id_master_item" => $this->security->xss_clean($po_data['id_master_item']),
         "tgl_proses_induk" => $this->security->xss_clean(tgl_indo($po_data['tgl_proses_induk'])),
         "keterangan" => $this->security->xss_clean($po_data['keterangan'])
     );
        $arraysub[] =  $subArray ; 

    }

    foreach($dataitem as $po_data) {

        $result = array(  
           "id_proses_induk" => $this->security->xss_clean($po_data['id_proses_induk']),
           "no_surat_tanah" => $this->security->xss_clean($po_data['no_surat_tanah']),
           "nama_surat_tanah" => $this->security->xss_clean($po_data['nama_surat_tanah']),
           "luas" => $this->security->xss_clean($po_data['luas']),
           "tanggal_daftar_sk_hak" => $this->security->xss_clean($po_data['tanggal_daftar_sk_hak']),
           "tanggal_daftar_sk_haktampil" => $this->security->xss_clean(tgl_indo($po_data['tanggal_daftar_sk_hak'])),
           "no_daftar_sk_hak" => $this->security->xss_clean($po_data['no_daftar_sk_hak']),
           "tanggal_terbit_sk_hak" => $this->security->xss_clean($po_data['tanggal_terbit_sk_hak']),
           "tanggal_terbit_sk_haktampil" => $this->security->xss_clean(tgl_indo($po_data['tanggal_terbit_sk_hak'])),
           "no_terbit_sk_hak" => $this->security->xss_clean($po_data['no_terbit_sk_hak']),
           "tanggal_daftar_shgb" => $this->security->xss_clean($po_data['tanggal_daftar_shgb']),
           "tanggal_daftar_shgbtampil" => $this->security->xss_clean(tgl_indo($po_data['tanggal_daftar_shgb'])),
           "no_daftar_shgb" => $this->security->xss_clean($po_data['no_daftar_shgb']),
           "tanggal_terbit_shgb" => $this->security->xss_clean($po_data['tanggal_terbit_shgb']),
           "tanggal_terbit_shgbtampil" => $this->security->xss_clean(tgl_indo($po_data['tanggal_terbit_shgb'])),
           "no_terbit_shgb" => $this->security->xss_clean($po_data['no_terbit_shgb']),
           "masa_berlaku_shgb" => $this->security->xss_clean($po_data['masa_berlaku_shgb']),
           "masa_berlaku_shgbtampil" => $this->security->xss_clean(tgl_indo($po_data['masa_berlaku_shgb'])),
           "target_penyelesaian" => $this->security->xss_clean($po_data['target_penyelesaian']),
           "target_penyelesaiantampil" => $this->security->xss_clean(tgl_indo($po_data['target_penyelesaian'])),
           "keterangan" => $this->security->xss_clean($po_data['keterangan']),
       ); 

    }  
    $datasub = $arraysub;
    $array[] =  $result ; 
    echo'{"datarows":'.json_encode($array).',"datasub":'.json_encode($datasub).'}';

}
public function laporan_evaluasi_tanah_belum_shgb()
{
   $data['list'] = $this->dataevaliasishgb();
   $this->load->view('member/laporan/laporan_evaluasi_tanah_belum_shgb',$data);
}  

public function laporan_evaluasi_tanah_belum_shgb_per()
{
 $data['id_perumahan'] = $this->input->get('id_perumahan',true);
 $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
 $data['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();
 $this->load->view('member/laporan/laporan_evaluasi_tanah_belum_shgb_per',$data);
}  
public function laporan_evaluasi_proses_induk()
{
 $this->load->view('member/laporan/laporan_evaluasi_proses_induk');
}  
public function laporan_evaluasi_proses_induk_per()
{
  $data['id_perumahan'] = $this->input->get('id_perumahan',true);
  $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
  $this->load->view('member/laporan/laporan_evaluasi_proses_induk_per',$data);
}  
public function laporan_evaluasi_penggabungan_split()
{
 $this->load->view('member/laporan/laporan_evaluasi_penggabungan_split');
}  
public function laporan_evaluasi_penggabungan_split_per()
{
 $this->load->view('member/laporan/laporan_evaluasi_penggabungan_split_per');
}  
public function laporan_evaluasi_tanah_shgb()
{
 $this->load->view('member/laporan/laporan_evaluasi_tanah_shgb');
}  
public function laporan_evaluasi_tanah_shgb_per()
{
 $this->load->view('member/laporan/laporan_evaluasi_tanah_shgb_perumahan');
}  
public function laporan_evaluasi_splitsing()
{
 $this->load->view('member/laporan/laporan_evaluasi_splitsing');
}  
public function laporan_evaluasi_splitsing_per()
{
 $this->load->view('member/laporan/laporan_evaluasi_splitsing_per');
}  

public function laporan_evaluasi_sert_belum_split()
{
 $this->load->view('member/laporan/laporan_evaluasi_sert_belum_split');
}  
public function laporan_evaluasi_sert_belum_split_per()
{
 $this->load->view('member/laporan/laporan_evaluasi_sert_belum_split_per');
}  

public function laporan_evaluasi_stok_split()
{
 $this->load->view('member/laporan/laporan_evaluasi_stok_split');
}  
public function laporan_evaluasi_stok_split_per()
{
 $this->load->view('member/laporan/laporan_evaluasi_stok_split_per');
}  


public function po()
{    
    level_user('laporan','po',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $data['target'] = $this->db->get('tbl_target')->result(); 
    $this->load->view('member/laporan/po',$data);
}   
public function laporanpo()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $target = $this->input->get('target');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['target'] = $target;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
        //total rows count
    $totalRec = count($this->laporan_model->getrowspo($conditions)); 

        //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpo';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

        //set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

        //get posts data
    $data['posts'] = $this->laporan_model->getrowspo($conditions);

        //load the view
    $this->load->view('member/laporan/po_view', $data, false);
}   

public function cekcetak($id_perumahan)
{
    $data['id_perumahan'] = $id_perumahan;
    $data['dataperumahanseb'] = $this->master_model->getperumahanarray($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31');
    $data['dataperumahanses'] = $this->master_model->getperumahanarray($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31');
    $data['dataperumahantekseb'] = $this->master_model->getperumahanarray($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31','sudah');
    $data['dataperumahantekses'] = $this->master_model->getperumahanarray($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31','sudah');
    $data['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
    echo "<pre>";
    print_r ($data);
    echo "</pre>";
}



public function pembelian()
{    
    level_user('laporan','pembelian',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $conditions['target'] = '*';
    $timestamp    = strtotime(date('F Y'));
    $conditions['search']['firstdate'] = date('Y-m-01', $timestamp);
    $conditions['search']['lastdate'] = date('Y-m-t', $timestamp);

    //set start and limit
    $conditions['limit'] = '10';

    //get posts data
    $data['posts'] = $this->laporan_model->getrowspembelian($conditions);
    $data['target'] = $this->db->get('tbl_target')->result(); 
    $this->load->view('member/laporan/pembelian',$data);
}   
public function laporanpembelian()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $target = $this->input->get('target');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['target'] = $target;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowspembelian($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpembelian';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowspembelian($conditions);

//load the view
    $this->load->view('member/laporan/pembelian_view', $data, false);
}   

function excel_pembelian(){       

    $spreadsheet = new Spreadsheet();
    $target = $this->input->get('target');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['target'] = $target;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowspembelian($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nomor Faktur')
    ->setCellValue('B1', 'Tanggal Pembelian')
    ->setCellValue('C1', 'Kode target')
    ->setCellValue('D1', 'Nama target')
    ->setCellValue('E1', 'Total')
    ->setCellValue('F1', 'Pembayaran')
    ->setCellValue('G1', 'Termin')
    ->setCellValue('H1', 'Keterangan')
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tgl_pembelian']);
        $total = rupiah($post['total']);
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $post['nomor_faktur'])
        ->setCellValue('B'.$i, $tgl)
        ->setCellValue('C'.$i, $post['target'])
        ->setCellValue('D'.$i, $post['nama_target'])
        ->setCellValue('E'.$i, $total)
        ->setCellValue('F'.$i, $post['pembayaran'])
        ->setCellValue('G'.$i, $post['termin']." Hari")
        ->setCellValue('H'.$i, $post['keterangan']);
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Pembelian');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Pembelian.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}

public function penerimaan()
{    
    $data['penerima'] = $this->db->select('penerima')->group_by('penerima')->from('penerimaan_barang')->get()->result(); 
    $this->load->view('member/laporan/penerimaan',$data);
}   

public function laporanpenerimaan()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $penerima = $this->input->get('penerima');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['penerima'] = $penerima;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowspenerima($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpenerimaan';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowspenerima($conditions);

//load the view
    $this->load->view('member/laporan/penerima_view', $data, false);
}   

function excel_penerimaan(){       

    $spreadsheet = new Spreadsheet();
    $penerima = $this->input->get('penerima');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['penerima'] = $penerima;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowspenerima($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nomor Referensi')
    ->setCellValue('B1', 'Tanggal Penerimaan')
    ->setCellValue('C1', 'Nomor Faktur')
    ->setCellValue('D1', 'Nomor PO')
    ->setCellValue('E1', 'Penerima')
    ->setCellValue('F1', 'Keterangan') 
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tanggal_penerimaan']); 
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $post['nomor_rec'])
        ->setCellValue('B'.$i, $tgl)
        ->setCellValue('C'.$i, $post['nomor_faktur'])
        ->setCellValue('D'.$i, $post['nomor_po'])
        ->setCellValue('E'.$i, $post['penerima'])
        ->setCellValue('F'.$i, $post['keterangan']);
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Penerimaan');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Penerimaan.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}

public function stok()
{    
    level_user('laporan','stok',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();

    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }
    $timestamp    = strtotime(date('F Y'));
    $conditions['search']['firstdate'] = date('Y-m-01', $timestamp);
    $conditions['search']['lastdate'] = date('Y-m-t', $timestamp);
//total rows count
    $totalRec = count($this->laporan_model->getrowsstok($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/stok';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowsstok($conditions);
    $this->load->view('member/laporan/stok', $data);
}   

public function laporanstok()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');  
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowsstok($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanstok';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowsstok($conditions);

//load the view
    $this->load->view('member/laporan/stok_view', $data, false);
}   

function excel_stok(){       

    $spreadsheet = new Spreadsheet(); 
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');  
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowsstok($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tanggal')
    ->setCellValue('B1', 'Kode Item')
    ->setCellValue('C1', 'Nama Item')
    ->setCellValue('D1', 'Tanggal Expired')
    ->setCellValue('E1', 'Transaksi')
    ->setCellValue('F1', 'Masuk')
    ->setCellValue('G1', 'Keluar')
    ->setCellValue('H1', 'Satuan')
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tanggal']);
        $expired = tgl_indo($post['tgl_expired']); 
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $tgl)
        ->setCellValue('B'.$i, $post['kode_item'])
        ->setCellValue('C'.$i, $post['nama_item'])
        ->setCellValue('D'.$i, $expired)
        ->setCellValue('E'.$i, $post['jenis_transaksi'])
        ->setCellValue('F'.$i, $post['jumlah_masuk']) 
        ->setCellValue('G'.$i, $post['jumlah_keluar']) 
        ->setCellValue('H'.$i, $post['satuan_kecil']);
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Purchase Order');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Stok.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}

public function penjualan()
{     
    level_user('laporan','penjualan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $data['penjual'] = $this->db->get('master_penjual')->result(); 
    $data['costumer'] = $this->db->get('master_pembeli')->result(); 
    $data['obat'] = $this->db->get('master_item')->result();
    $this->load->view('member/laporan/penjualan',$data);
}   
public function penjualan_approve()
{     
    level_user('laporan','penjualan',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $data['penjual'] = $this->db->get('master_penjual')->result(); 
    $data['costumer'] = $this->db->get('master_pembeli')->result(); 
    $data['obat'] = $this->db->get('master_item')->result();
    $this->load->view('member/laporan/penjualan_approve',$data);
}   

public function laporanpenjualan()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $kasir = $this->input->get('kasir');
    $obat = $this->input->get('obat');
    $costumer = $this->input->get('costumer');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['kasir'] = $kasir;
    $conditions['search']['obat'] = $obat;
    $conditions['search']['costumer'] = $costumer;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowspenjualan($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpenjualan';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowspenjualan($conditions);

//load the view
    $this->load->view('member/laporan/penjualan_view', $data, false);
}   

public function laporanpenjualan_approve()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $kasir = $this->input->get('kasir');
    $obat = $this->input->get('obat');
    $costumer = $this->input->get('costumer');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['kasir'] = $kasir;
    $conditions['search']['obat'] = $obat;
    $conditions['search']['costumer'] = $costumer;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowspenjualan($conditions,'0')); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpenjualan_approve';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowspenjualan($conditions,'0');

//load the view
    $this->load->view('member/laporan/penjualan_view_approve', $data, false);
}
function excel_penjualan(){       

    $spreadsheet = new Spreadsheet();
    $kasir = $this->input->get('kasir');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['kasir'] = $kasir;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowspenjualan($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tanggal')
    ->setCellValue('B1', 'Kasir')
    ->setCellValue('C1', 'Upah Peracik')
    ->setCellValue('D1', 'Harga Item')
    ->setCellValue('E1', 'Total Harga') 
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tanggal']);
        $total_upah_peracik = rupiah($post['total_upah_peracik']);
        $total_harga_item = rupiah($post['total_harga_item']);
        $total = rupiah($post['total']);
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $tgl)
        ->setCellValue('B'.$i, $post['nama_admin'])
        ->setCellValue('C'.$i, $total_upah_peracik)
        ->setCellValue('D'.$i, $total_harga_item)
        ->setCellValue('E'.$i, $total)
        ;
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Laporan Penjualan');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Penjualan.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}


public function keuangan()
{    
    $this->load->view('member/laporan/keuangan');
}   

public function laporankeuangan()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');  
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowskeuangan($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporankeuangan';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowskeuangan($conditions);

//load the view
    $this->load->view('member/laporan/keuangan_view', $data, false);
}   

function excel_keuangan(){       

    $spreadsheet = new Spreadsheet(); 
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate');  
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowskeuangan($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tanggal')
    ->setCellValue('B1', 'Kode Rekening')
    ->setCellValue('C1', 'Nama Rekening')
    ->setCellValue('D1', 'Masuk')
    ->setCellValue('E1', 'Keluar')
    ->setCellValue('F1', 'Keterangan') 
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tanggal']);
        $masuk = rupiah($post['masuk']); 
        $keluar = rupiah($post['keluar']); 
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $tgl)
        ->setCellValue('B'.$i, $post['kode_rekening'])
        ->setCellValue('C'.$i, $post['nama_rekening'])
        ->setCellValue('D'.$i, $masuk)
        ->setCellValue('E'.$i, $keluar)
        ->setCellValue('F'.$i, $post['keterangan']) ;
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Keuangan');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Keuangan.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}

// penjual
public function penjual()
{    
    level_user('laporan','penjual',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
    $conditions['penjual'] = '*';
    $timestamp    = strtotime(date('F Y'));
    $conditions['search']['firstdate'] = date('Y-m-01', $timestamp);
    $conditions['search']['lastdate'] = date('Y-m-t', $timestamp);

    //set start and limit
    $conditions['limit'] = '10';

    //get posts data
    $data['posts'] = $this->laporan_model->getrowpenjual($conditions);
    $data['penjual'] = $this->db->get('master_penjual a')->result(); 
    $this->load->view('member/laporan/penjual',$data);
}   
public function laporanpenjual()
{   
    $conditions = array(); 
    $page = $this->input->get('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    $penjual = $this->input->get('penjual');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['penjual'] = $penjual;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
//total rows count
    $totalRec = count($this->laporan_model->getrowpenjual($conditions)); 

//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'laporan/laporanpenjual';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);

//set start and limit
    $conditions['start'] = $offset;
    $conditions['limit'] = $this->perPage;

//get posts data
    $data['posts'] = $this->laporan_model->getrowpenjual($conditions);

//load the view
    $this->load->view('member/laporan/penjual_view', $data, false);
}   

function excel_penjual(){       

    $spreadsheet = new Spreadsheet();
    $target = $this->input->get('target');
    $firstdate = $this->input->get('firstdate');
    $lastdate = $this->input->get('lastdate'); 
    $conditions['search']['target'] = $target;
    $conditions['search']['firstdate'] = $firstdate;
    $conditions['search']['lastdate'] = $lastdate;
    $conditions['kategori']['excel'] = "excel"; 
    $postdata = $this->laporan_model->getrowspembelian($conditions); 

    $spreadsheet->getProperties()->setCreator('Paber Panjaitan')
    ->setLastModifiedBy('Paber Panjaitan')
    ->setTitle('Laporan Format Excel')
    ->setSubject('Laporan Format Excel');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nomor Faktur')
    ->setCellValue('B1', 'Tanggal Pembelian')
    ->setCellValue('C1', 'Kode target')
    ->setCellValue('D1', 'Nama target')
    ->setCellValue('E1', 'Total')
    ->setCellValue('F1', 'Pembayaran')
    ->setCellValue('G1', 'Termin')
    ->setCellValue('H1', 'Keterangan')
    ;

    $i=2; 
    foreach($postdata as $post) { 
        $tgl = tgl_indo($post['tgl_pembelian']);
        $total = rupiah($post['total']);
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $post['nomor_faktur'])
        ->setCellValue('B'.$i, $tgl)
        ->setCellValue('C'.$i, $post['target'])
        ->setCellValue('D'.$i, $post['nama_target'])
        ->setCellValue('E'.$i, $total)
        ->setCellValue('F'.$i, $post['pembayaran'])
        ->setCellValue('G'.$i, $post['termin']." Hari")
        ->setCellValue('H'.$i, $post['keterangan']);
        $i++;
    }

// Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Pembelian');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Pembelian.xlsx"');
    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;  
}
} 