<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require('./phpspreadsheet/vendor/autoload.php'); 
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

class Export_excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
	}

    function excel_laporan2rekap($id_perumahan=''){       

        $spreadsheet = new Spreadsheet();
        $datarumah['id_perumahan'] = $id_perumahan;
        $datarumah['dataperumahanseb'] = $this->master_model->getperumahanarray($datarumah['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31');
        $datarumah['dataperumahanses'] = $this->master_model->getperumahanarray($datarumah['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31');
        $datarumah['dataperumahantekseb'] = $this->master_model->getperumahanarray($datarumah['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31','sudah');
        $datarumah['dataperumahantekses'] = $this->master_model->getperumahanarray($datarumah['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31','sudah');
        $datarumah['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(__DIR__ . '/file/evaluasi_land_bank_per.xlsx');
        $i=12;

        $nama_perumahan = '';
        $no=1;
        foreach($datarumah['dataperumahanseb'] as $data) { 
          if ($data['tanggal_pengalihan']!=null) {
            $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
        }else{
            $tgl_pengalihan = '-';
        }
        if ($data['id_perumahan']=='0') {
            $perumahan = 'Tidak ada';
        }else{
            $perumahan = $data['nama_regional'];
        }
        $nama_perumahan = $perumahan;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $no++.'')
        ->setCellValue('B'.$i, $perumahan)
        ->setCellValue('C'.$i, $data['no_gambar'])
        ->setCellValue('D'.$i, tgl_indo($data['tanggal_pembelian']))
        ->setCellValue('E'.$i, $data['nama_penjual'])
        ->setCellValue('F'.$i, $data['kode_sertifikat'])
        ->setCellValue('G'.$i, $data['nama_surat_tanah'])
        ->setCellValue('H'.$i, $data['luas_surat'])
        ->setCellValue('I'.$i, $data['luas_ukur'])
        ->setCellValue('J'.$i, $data['id_posisi_surat'])
        ->setCellValue('K'.$i, '')
        ->setCellValue('L'.$i, $data['status_order_akta'])
        ->setCellValue('M'.$i, $data['jenis_pengalihan_hak'])
        ->setCellValue('N'.$i, $data['akta_pengalihan'])
        ->setCellValue('O'.$i, $tgl_pengalihan)
        ->setCellValue('P'.$i, $data['nama_pengalihan'])
        ->setCellValue('Q'.$i, $data['status_teknik'])
        ->setCellValue('R'.$i, $data['keterangan']);
        $i++;
        $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
    }
    $i+=3;

    $nama_perumahan = '';
    $no=1;
    foreach($datarumah['dataperumahanses'] as $data) { 
      if ($data['tanggal_pengalihan']!=null) {
        $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
    }else{
        $tgl_pengalihan = '-';
    }
    if ($data['id_perumahan']=='0') {
        $perumahan = 'Tidak ada';
    }else{
        $perumahan = $data['nama_regional'];
    }
    $nama_perumahan = $perumahan;
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$i, $no)
    ->setCellValue('B'.$i, $perumahan)
    ->setCellValue('C'.$i, $data['no_gambar'])
    ->setCellValue('D'.$i, tgl_indo($data['tanggal_pembelian']))
    ->setCellValue('E'.$i, $data['nama_penjual'])
    ->setCellValue('F'.$i, $data['kode_sertifikat'])
    ->setCellValue('G'.$i, $data['nama_surat_tanah'])
    ->setCellValue('H'.$i, $data['luas_surat'])
    ->setCellValue('I'.$i, $data['luas_ukur'])
    ->setCellValue('J'.$i, $data['id_posisi_surat'])
    ->setCellValue('K'.$i, '')
    ->setCellValue('L'.$i, $data['status_order_akta'])
    ->setCellValue('M'.$i, $data['jenis_pengalihan_hak'])
    ->setCellValue('N'.$i, $data['akta_pengalihan'])
    ->setCellValue('O'.$i, $tgl_pengalihan)
    ->setCellValue('P'.$i, $data['nama_pengalihan'])
    ->setCellValue('Q'.$i, $data['status_teknik'])
    ->setCellValue('R'.$i, $data['keterangan']);
    $i++;
    $no++;
    $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}

$i+=10 ;

$nama_perumahan = '';
$no=1;
foreach($datarumah['dataperumahantekseb'] as $data) { 
  if ($data['tanggal_pengalihan']!=null) {
    $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
}else{
    $tgl_pengalihan = '-';
}
if ($data['id_perumahan']=='0') {
    $perumahan = 'Tidak ada';
}else{
    $perumahan = $data['nama_regional'];
}
$nama_perumahan = $perumahan;
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A'.$i, $no++.'')
->setCellValue('B'.$i, $perumahan)
->setCellValue('C'.$i, $data['no_gambar'])
->setCellValue('D'.$i, tgl_indo($data['tanggal_pembelian']))
->setCellValue('E'.$i, $data['nama_penjual'])
->setCellValue('F'.$i, $data['kode_sertifikat'])
->setCellValue('G'.$i, $data['nama_surat_tanah'])
->setCellValue('H'.$i, $data['luas_surat'])
->setCellValue('I'.$i, $data['luas_ukur'])
->setCellValue('J'.$i, $data['id_posisi_surat'])
->setCellValue('K'.$i, '')
->setCellValue('L'.$i, $data['status_order_akta'])
->setCellValue('M'.$i, $data['jenis_pengalihan_hak'])
->setCellValue('N'.$i, $data['akta_pengalihan'])
->setCellValue('O'.$i, $tgl_pengalihan)
->setCellValue('P'.$i, $data['nama_pengalihan'])
->setCellValue('Q'.$i, $data['status_teknik'])
->setCellValue('R'.$i, $data['keterangan']);
$i++;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
$i+=3;

$nama_perumahan = '';
$no=1;
$nama_perumahan = '';
$no=1;
foreach($datarumah['dataperumahantekses'] as $data) { 
  if ($data['tanggal_pengalihan']!=null) {
    $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
}else{
    $tgl_pengalihan = '-';
}
if ($data['id_perumahan']=='0') {
    $perumahan = 'Tidak ada';
}else{
    $perumahan = $data['nama_regional'];
}
$nama_perumahan = $perumahan;
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A'.$i, $no++.'')
->setCellValue('B'.$i, $perumahan)
->setCellValue('C'.$i, $data['no_gambar'])
->setCellValue('D'.$i, tgl_indo($data['tanggal_pembelian']))
->setCellValue('E'.$i, $data['nama_penjual'])
->setCellValue('F'.$i, $data['kode_sertifikat'])
->setCellValue('G'.$i, $data['nama_surat_tanah'])
->setCellValue('H'.$i, $data['luas_surat'])
->setCellValue('I'.$i, $data['luas_ukur'])
->setCellValue('J'.$i, $data['id_posisi_surat'])
->setCellValue('K'.$i, '')
->setCellValue('L'.$i, $data['status_order_akta'])
->setCellValue('M'.$i, $data['jenis_pengalihan_hak'])
->setCellValue('N'.$i, $data['akta_pengalihan'])
->setCellValue('O'.$i, $tgl_pengalihan)
->setCellValue('P'.$i, $data['nama_pengalihan'])
->setCellValue('Q'.$i, $data['status_teknik'])
->setCellValue('R'.$i, $data['keterangan']);
$i++;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
        // Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Laporan '.$nama_perumahan);
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Land bank.xlsx"');
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

    function excel_laporan1_evaluasi_pembelian_detail($firstdate='',$lastdate=''){       

        $spreadsheet = new Spreadsheet();
        $data['firstdate'] =$firstdate;
        $data['lastdate'] = $lastdate;
        $datarumah['perumahandalamijin'] = $this->db->order_by("id","DESC")->where('status_regional','1')->get('master_regional')->result();
        $datarumah['perumahanluarijin'] = $this->db->order_by("id","DESC")->where('status_regional','2')->get('master_regional')->result();
        $datarumah['perumahanlokasi'] = $this->db->order_by("id","DESC")->where('status_regional','3')->get('master_regional')->result();
        $datrumah['perumahan2'] = $this->db->order_by("id","DESC")->get('master_regional')->result();
        $datarumah['sertifikat_tanah'] = $this->db->order_by("id_sertifikat_tanah","DESC")->get('tbl_sertifikat_tanah')->result();

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(__DIR__ . '/file/laporan_evaluasi_pembelian.xlsx');
        $i=9;
        $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
        $stylefont = array('font' => array('bold' => true ));
        foreach ($datarumah['perumahandalamijin'] as $per){
            $dataperumahan = $this->master_model->getperumahan($per->id,$firstdate,$lastdate);
            if ($dataperumahan!=null){
                $totalbidang=0;
                $totalluassurat=0;
                $totalluasukur=0;
                $totalhargasatuan=0;
                $totalnilaimakelar=0;
                $totalhargatotal=0;
                $totalhargabiaya=0;
                $totalhargam=0;
                $totalgantirugi =0;
                $totalpbb =0;
                $totallain=0;
                $totalakhirbiayalain=0;
                $no=1;
                $nama_perumahan='';
                foreach ($dataperumahan as $value => $data){

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
                if ($data->total_harga_pengalihan==0) {
                    $total_harga_pengalihan=0;
                    $harga_satuan = 0;
                }else{
                    $harga_satuan = $data->total_harga_pengalihan/$data->luas_surat;            
                    $total_harga_pengalihan=$data->total_harga_pengalihan;                
                }

                if ($data->lain=='') {
                    $data->lain=0;
                }if ($data->pbb=='') {
                    $data->pbb=0;
                }if ($data->ganti_rugi=='') {
                    $data->ganti_rugi=0;
                }
                if ($data->nilai=='') {
                    $data->nilai=0;
                }                 
                if ($data->lain=='') {
                    $data->lain=0;
                }if ($data->pbb=='') {
                    $data->pbb=0;
                }if ($data->ganti_rugi=='') {
                    $data->ganti_rugi=0;
                }
                if ($data->nilai=='') {
                    $data->nilai=0;
                }                 
                $totalbiayalain = $data->lain+$data->pbb+$data->ganti_rugi;
                $totalharga_biaya = $total_harga_pengalihan+$data->nilai+$totalbiayalain;
                if ($totalharga_biaya==0) {
                    $harga_perm=0;
                }else{
                    $harga_perm = $totalharga_biaya/$data->luas_surat;

                }
                $totalbidang+=$data->jumlah_bidang;
                $totalluassurat+=$data->luas_surat;
                $totalluasukur+=$data->luas_ukur;
                $totalhargasatuan+=$harga_satuan;
                $totalhargatotal+=$total_harga_pengalihan;
                $totalnilaimakelar+=$data->nilai;
                $totalhargabiaya+=$totalharga_biaya;
                $totalhargam+=$harga_perm;
                $totalgantirugi +=$data->ganti_rugi;
                $totalpbb +=$data->pbb;
                $totallain+=$data->lain;
                $totalakhirbiayalain +=$totalbiayalain;

                if ($nama_perumahan!=$perumahan) {
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B'.$i, 'A' )
                    ->setCellValue('C'.$i, 'PROYEK '.$perumahan );
                    $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($stylefont);
                    $i++;
                    $nama_perumahan=$perumahan;
                }

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i, $no++.'' )
                ->setCellValue('C'.$i,tgl_indo($data->tanggal_pembelian))
                ->setCellValue('D'.$i,$data->nama_penjual)  
                ->setCellValue('E'.$i,$data->nama_surat_tanah)  
                ->setCellValue('F'.$i,$data->kode_sertifikat)  
                ->setCellValue('G'.$i,$data->no_gambar)  
                ->setCellValue('H'.$i,$data->jumlah_bidang)  
                ->setCellValue('I'.$i,$data->luas_surat)  
                ->setCellValue('J'.$i,$data->luas_ukur)  
                ->setCellValue('K'.$i,$data->no_pbb)  
                ->setCellValue('L'.$i,$data->luas_pbb_bangunan)  
                ->setCellValue('M'.$i,$data->njop_bangunan)  
                ->setCellValue('N'.$i,rupiah($harga_satuan))  
                ->setCellValue('O'.$i,rupiah($data->total_harga_pengalihan))  
                ->setCellValue('P'.$i,$data->nama_makelar)  
                ->setCellValue('Q'.$i,rupiah($data->nilai))  
                ->setCellValue('R'.$i,$tgl_pengalihan)  
                ->setCellValue('S'.$i,$data->akta_pengalihan)  
                ->setCellValue('T'.$i,$data->nama_pengalihan)  
                ->setCellValue('U'.$i,rupiah($data->ganti_rugi))  
                ->setCellValue('V'.$i,rupiah($data->pbb))  
                ->setCellValue('W'.$i,rupiah($data->lain))  
                ->setCellValue('X'.$i,rupiah($totalbiayalain))  
                ->setCellValue('Y'.$i,rupiah($totalharga_biaya))  
                ->setCellValue('Z'.$i,rupiah($harga_perm))  
                ->setCellValue('AA'.$i,$data->keterangan);
                $i++;
                $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
            }
            if ($dataperumahan!=null){
                $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('C'.$i, 'TOTAL' );
                $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
                $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($stylefont);
                $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
                $i+=2;
            }
        }
    }

    $i+=8;
    $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
    $stylefont = array('font' => array('bold' => true ));
    foreach ($datarumah['perumahanluarijin'] as $per){
        $dataperumahan = $this->master_model->getperumahan($per->id,$firstdate,$lastdate);
        if ($dataperumahan!=null){
            $totalbidang=0;
            $totalluassurat=0;
            $totalluasukur=0;
            $totalhargasatuan=0;
            $totalnilaimakelar=0;
            $totalhargatotal=0;
            $totalhargabiaya=0;
            $totalhargam=0;
            $totalgantirugi =0;
            $totalpbb =0;
            $totallain=0;
            $totalakhirbiayalain=0;
            $no=1;
            $nama_perumahan='';
            foreach ($dataperumahan as $value => $data){

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
            if ($data->total_harga_pengalihan==0) {
                $harga_satuan = 0;
            }else{
                $harga_satuan = $data->total_harga_pengalihan/$data->luas_surat;            
            }

            if ($data->lain=='') {
                $data->lain=0;
            }if ($data->pbb=='') {
                $data->pbb=0;
            }if ($data->ganti_rugi=='') {
                $data->ganti_rugi=0;
            }
            if ($data->nilai=='') {
                $data->nilai=0;
            }                 
            if ($data->lain=='') {
                $data->lain=0;
            }if ($data->pbb=='') {
                $data->pbb=0;
            }if ($data->ganti_rugi=='') {
                $data->ganti_rugi=0;
            }
            if ($data->nilai=='') {
                $data->nilai=0;
            }                 
            $totalbiayalain = $data->lain+$data->pbb+$data->ganti_rugi;
            $totalharga_biaya = $data->total_harga_pengalihan+$data->nilai+$totalbiayalain;
            if ($totalharga_biaya==0) {
                $harga_perm=0;
            }else{
                $harga_perm = $totalharga_biaya/$data->luas_surat;

            }
            $totalbidang+=$data->jumlah_bidang;
            $totalluassurat+=$data->luas_surat;
            $totalluasukur+=$data->luas_ukur;
            $totalhargasatuan+=$harga_satuan;
            $totalhargatotal+=$data->total_harga_pengalihan;
            $totalnilaimakelar+=$data->nilai;
            $totalhargabiaya+=$totalharga_biaya;
            $totalhargam+=$harga_perm;
            $totalgantirugi +=$data->ganti_rugi;
            $totalpbb +=$data->pbb;
            $totallain+=$data->lain;
            $totalakhirbiayalain +=$totalbiayalain;

            if ($nama_perumahan!=$perumahan) {
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i, 'A' )
                ->setCellValue('C'.$i, 'PROYEK '.$perumahan );
                $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
                $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($stylefont);
                $i++;
                $nama_perumahan=$perumahan;
            }

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $no++.'' )
            ->setCellValue('C'.$i,tgl_indo($data->tanggal_pembelian))
            ->setCellValue('D'.$i,$data->nama_penjual)  
            ->setCellValue('E'.$i,$data->nama_surat_tanah)  
            ->setCellValue('F'.$i,$data->kode_sertifikat)  
            ->setCellValue('G'.$i,$data->no_gambar)  
            ->setCellValue('H'.$i,$data->jumlah_bidang)  
            ->setCellValue('I'.$i,$data->luas_surat)  
            ->setCellValue('J'.$i,$data->luas_ukur)  
            ->setCellValue('K'.$i,$data->no_pbb)  
            ->setCellValue('L'.$i,$data->luas_pbb_bangunan)  
            ->setCellValue('M'.$i,$data->njop_bangunan)  
            ->setCellValue('N'.$i,rupiah($harga_satuan))  
            ->setCellValue('O'.$i,rupiah($data->total_harga_pengalihan))  
            ->setCellValue('P'.$i,$data->nama_makelar)  
            ->setCellValue('Q'.$i,rupiah($data->nilai))  
            ->setCellValue('R'.$i,$tgl_pengalihan)  
            ->setCellValue('S'.$i,$data->akta_pengalihan)  
            ->setCellValue('T'.$i,$data->nama_pengalihan)  
            ->setCellValue('U'.$i,rupiah($data->ganti_rugi))  
            ->setCellValue('V'.$i,rupiah($data->pbb))  
            ->setCellValue('W'.$i,rupiah($data->lain))  
            ->setCellValue('X'.$i,rupiah($totalbiayalain))  
            ->setCellValue('Y'.$i,rupiah($totalharga_biaya))  
            ->setCellValue('Z'.$i,rupiah($harga_perm))  
            ->setCellValue('AA'.$i,$data->keterangan);
            $i++;
            $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
        }
        if ($dataperumahan!=null){
            $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C'.$i, 'TOTAL' );
            $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
            $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($stylefont);
            $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
            $i+=2;
        }
    }
}


$i+=9;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
$stylefont = array('font' => array('bold' => true ));
foreach ($datarumah['perumahanlokasi'] as $per){
    $dataperumahan = $this->master_model->getperumahan($per->id,$firstdate,$lastdate);
    if ($dataperumahan!=null){
        $totalbidang=0;
        $totalluassurat=0;
        $totalluasukur=0;
        $totalhargasatuan=0;
        $totalnilaimakelar=0;
        $totalhargatotal=0;
        $totalhargabiaya=0;
        $totalhargam=0;
        $totalgantirugi =0;
        $totalpbb =0;
        $totallain=0;
        $totalakhirbiayalain=0;
        $no=1;
        $nama_perumahan='';
        foreach ($dataperumahan as $value => $data){

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
        if ($data->total_harga_pengalihan==0) {
            $harga_satuan = 0;
        }else{
            $harga_satuan = $data->total_harga_pengalihan/$data->luas_surat;            
        }

        if ($data->lain=='') {
            $data->lain=0;
        }if ($data->pbb=='') {
            $data->pbb=0;
        }if ($data->ganti_rugi=='') {
            $data->ganti_rugi=0;
        }
        if ($data->nilai=='') {
            $data->nilai=0;
        }                 
        if ($data->lain=='') {
            $data->lain=0;
        }if ($data->pbb=='') {
            $data->pbb=0;
        }if ($data->ganti_rugi=='') {
            $data->ganti_rugi=0;
        }
        if ($data->nilai=='') {
            $data->nilai=0;
        }                 
        $totalbiayalain = $data->lain+$data->pbb+$data->ganti_rugi;
        $totalharga_biaya = $data->total_harga_pengalihan+$data->nilai+$totalbiayalain;
        if ($totalharga_biaya==0) {
            $harga_perm=0;
        }else{
            $harga_perm = $totalharga_biaya/$data->luas_surat;

        }
        $totalbidang+=$data->jumlah_bidang;
        $totalluassurat+=$data->luas_surat;
        $totalluasukur+=$data->luas_ukur;
        $totalhargasatuan+=$harga_satuan;
        $totalhargatotal+=$data->total_harga_pengalihan;
        $totalnilaimakelar+=$data->nilai;
        $totalhargabiaya+=$totalharga_biaya;
        $totalhargam+=$harga_perm;
        $totalgantirugi +=$data->ganti_rugi;
        $totalpbb +=$data->pbb;
        $totallain+=$data->lain;
        $totalakhirbiayalain +=$totalbiayalain;

        if ($nama_perumahan!=$perumahan) {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, 'A' )
            ->setCellValue('C'.$i, 'PROYEK '.$perumahan );
            $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
            $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($stylefont);
            $i++;
            $nama_perumahan=$perumahan;
        }

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, $no++.'' )
        ->setCellValue('C'.$i,tgl_indo($data->tanggal_pembelian))
        ->setCellValue('D'.$i,$data->nama_penjual)  
        ->setCellValue('E'.$i,$data->nama_surat_tanah)  
        ->setCellValue('F'.$i,$data->kode_sertifikat)  
        ->setCellValue('G'.$i,$data->no_gambar)  
        ->setCellValue('H'.$i,$data->jumlah_bidang)  
        ->setCellValue('I'.$i,$data->luas_surat)  
        ->setCellValue('J'.$i,$data->luas_ukur)  
        ->setCellValue('K'.$i,$data->no_pbb)  
        ->setCellValue('L'.$i,$data->luas_pbb_bangunan)  
        ->setCellValue('M'.$i,$data->njop_bangunan)  
        ->setCellValue('N'.$i,rupiah($harga_satuan))  
        ->setCellValue('O'.$i,rupiah($data->total_harga_pengalihan))  
        ->setCellValue('P'.$i,$data->nama_makelar)  
        ->setCellValue('Q'.$i,rupiah($data->nilai))  
        ->setCellValue('R'.$i,$tgl_pengalihan)  
        ->setCellValue('S'.$i,$data->akta_pengalihan)  
        ->setCellValue('T'.$i,$data->nama_pengalihan)   
        ->setCellValue('U'.$i,rupiah($data->ganti_rugi))  
        ->setCellValue('V'.$i,rupiah($data->pbb))  
        ->setCellValue('W'.$i,rupiah($data->lain))  
        ->setCellValue('X'.$i,rupiah($totalbiayalain))  
        ->setCellValue('Y'.$i,rupiah($totalharga_biaya))  
        ->setCellValue('Z'.$i,rupiah($harga_perm))  
        ->setCellValue('AA'.$i,$data->keterangan);
        $i++;
        $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
    }
    if ($dataperumahan!=null){
        $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('C'.$i, 'TOTAL' );
        $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
        $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($stylefont);
        $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
        $i+=2;
    }
}
}

   // Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Laporan '.$perumahan);
   // Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
   // Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Land bank.xlsx"');
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

public function excellaporanbelumshgb($id='')
{
    $spreadsheet = new Spreadsheet();

    $data['id_perumahan'] = $this->input->get('id_perumahan',true);
    $datarumah['dataperumahanseb'] = $this->master_model->getshgbperumahanarray($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31');
    $datarumah['dataperumahanses'] = $this->master_model->getshgbperumahanarray($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31');
    $datarumah['dataperumahantekseb'] = $this->master_model->getshgbperumahanarray($data['id_perumahan'],'1970-01-01',(date('Y')-1).'-12-31','selesai');
    $datarumah['dataperumahantekses'] = $this->master_model->getshgbperumahanarray($data['id_perumahan'],date('Y'.'-01-01'),date('Y').'-12-31','selesai');
    $datarumah['perumahan'] = $this->db->order_by("id","DESC")->get('master_regional')->result();

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(__DIR__ . '/file/laporan_evaluasi_belum_shgb_per.xlsx');
    $i=12;

    $nama_perumahan = '';
    $no=1;
    foreach($datarumah['dataperumahanseb'] as $data) { 
      if ($data['tanggal_pengalihan']!=null) {
        $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
    }else{
        $tgl_pengalihan = '-';
    }
    if ($data['id_perumahan']=='0') {
        $perumahan = 'Tidak ada';
    }else{
        $perumahan = $data['nama_regional'];
    }
    $nama_perumahan = $perumahan;
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('B'.$i, $no++.'')
    ->setCellValue('C'.$i, $perumahan)
    ->setCellValue('D'.$i, $data['no_gambar'])
    ->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
    ->setCellValue('F'.$i, $data['nama_penjual'])
    ->setCellValue('G'.$i, $data['kode_sertifikat'])
    ->setCellValue('H'.$i, $data['nama_surat_tanah'])
    ->setCellValue('I'.$i, $data['luas_surat'])
    ->setCellValue('J'.$i, $data['luas_ukur'])
    ->setCellValue('K'.$i, $data['id_posisi_surat'])
    ->setCellValue('L'.$i, '')
    ->setCellValue('M'.$i, $data['status_order_akta'])
    ->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
    ->setCellValue('O'.$i, $data['akta_pengalihan'])
    ->setCellValue('P'.$i, $tgl_pengalihan)
    ->setCellValue('Q'.$i, $data['nama_pengalihan'])
    ->setCellValue('R'.$i, $data['terima_finance'])
    ->setCellValue('S'.$i, $data['keterangan']);
    $i++;
    $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
$i+=3;

$nama_perumahan = '';
$no=1;
$nama_perumahan = '';
$no=1;
foreach($datarumah['dataperumahanses'] as $data) { 
  if ($data['tanggal_pengalihan']!=null) {
    $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
}else{
    $tgl_pengalihan = '-';
}
if ($data['id_perumahan']=='0') {
    $perumahan = 'Tidak ada';
}else{
    $perumahan = $data['nama_regional'];
}
$nama_perumahan = $perumahan;
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('B'.$i, $no++.'')
->setCellValue('C'.$i, $perumahan)
->setCellValue('D'.$i, $data['no_gambar'])
->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
->setCellValue('F'.$i, $data['nama_penjual'])
->setCellValue('G'.$i, $data['kode_sertifikat'])
->setCellValue('H'.$i, $data['nama_surat_tanah'])
->setCellValue('I'.$i, $data['luas_surat'])
->setCellValue('J'.$i, $data['luas_ukur'])
->setCellValue('K'.$i, $data['id_posisi_surat'])
->setCellValue('L'.$i, '')
->setCellValue('M'.$i, $data['status_order_akta'])
->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
->setCellValue('O'.$i, $data['akta_pengalihan'])
->setCellValue('P'.$i, $tgl_pengalihan)
->setCellValue('Q'.$i, $data['nama_pengalihan'])
->setCellValue('R'.$i, $data['terima_finance'])
->setCellValue('S'.$i, $data['keterangan']);
$i++;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}

$i+=10 ;

$nama_perumahan = '';
$no=1;
foreach($datarumah['dataperumahantekseb'] as $data) { 
  if ($data['tanggal_pengalihan']!=null) {
    $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
}else{
    $tgl_pengalihan = '-';
}
if ($data['id_perumahan']=='0') {
    $perumahan = 'Tidak ada';
}else{
    $perumahan = $data['nama_regional'];
}
$nama_perumahan = $perumahan;
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('B'.$i, $no++.'')
->setCellValue('C'.$i, $perumahan)
->setCellValue('D'.$i, $data['no_gambar'])
->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
->setCellValue('F'.$i, $data['nama_penjual'])
->setCellValue('G'.$i, $data['kode_sertifikat'])
->setCellValue('H'.$i, $data['nama_surat_tanah'])
->setCellValue('I'.$i, $data['luas_surat'])
->setCellValue('J'.$i, $data['luas_ukur'])
->setCellValue('K'.$i, $data['id_posisi_surat'])
->setCellValue('L'.$i, '')
->setCellValue('M'.$i, $data['status_order_akta'])
->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
->setCellValue('O'.$i, $data['akta_pengalihan'])
->setCellValue('P'.$i, $tgl_pengalihan)
->setCellValue('Q'.$i, $data['nama_pengalihan'])
->setCellValue('R'.$i, $data['terima_finance'])
->setCellValue('S'.$i, $data['keterangan']);
$i++;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
$i+=3;

$nama_perumahan = '';
$no=1;
$nama_perumahan = '';
$no=1;
foreach($datarumah['dataperumahantekses'] as $data) { 
  if ($data['tanggal_pengalihan']!=null) {
    $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
}else{
    $tgl_pengalihan = '-';
}
if ($data['id_perumahan']=='0') {
    $perumahan = 'Tidak ada';
}else{
    $perumahan = $data['nama_regional'];
}
$nama_perumahan = $perumahan;
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('B'.$i, $no++.'')
->setCellValue('C'.$i, $perumahan)
->setCellValue('D'.$i, $data['no_gambar'])
->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
->setCellValue('F'.$i, $data['nama_penjual'])
->setCellValue('G'.$i, $data['kode_sertifikat'])
->setCellValue('H'.$i, $data['nama_surat_tanah'])
->setCellValue('I'.$i, $data['luas_surat'])
->setCellValue('J'.$i, $data['luas_ukur'])
->setCellValue('K'.$i, $data['id_posisi_surat'])
->setCellValue('L'.$i, '')
->setCellValue('M'.$i, $data['status_order_akta'])
->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
->setCellValue('O'.$i, $data['akta_pengalihan'])
->setCellValue('P'.$i, $tgl_pengalihan)
->setCellValue('Q'.$i, $data['nama_pengalihan'])
->setCellValue('R'.$i, $data['terima_finance'])
->setCellValue('S'.$i, $data['keterangan']);
$i++;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
        // Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Laporan '.$nama_perumahan);
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Land bank.xlsx"');
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

    public function excellaporanprosesinduk($id='')
    {
        $spreadsheet = new Spreadsheet();

    // $data['id_perumahan'] = $this->input->get('id_perumahan',true);
        $datarumah['prosesindukseb'] = $this->master_model->getmaster_prosesinduk($id,date('Y'.'-01-01'),date('Y').'-12-31');
        $datarumah['prosesindukses'] = $this->master_model->getmaster_prosesinduk($id,'1970-01-01',(date('Y')-1).'-12-31');
        $datarumah['terbitindukseb'] = $this->master_model->getmaster_prosesinduk($id,date('Y'.'-01-01'),date('Y').'-12-31','terbit');
        $datarumah['terbitindukses'] = $this->master_model->getmaster_prosesinduk($id,'1970-01-01',(date('Y')-1).'-12-31','terbit');


        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(__DIR__ . '/file/laporan_evaluasi_proses_induk.xlsx');
        $i=9;

        $nama_perumahan = '';
        $no=1;
        foreach($datarumah['prosesindukseb'] as $data) { 
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $data['id_proses_induk'])
            ->setCellValue('C'.$i, $data['no_gambar'])
            ->setCellValue('D'.$i, $data['no_surat_tanah'])
            ->setCellValue('E'.$i, $data['nama_surat_tanah'])
            ->setCellValue('F'.$i, $data['luas'])
            ->setCellValue('G'.$i, $data['luas_daftar'])
            ->setCellValue('H'.$i, $data['luas_terbit'])
            ->setCellValue('I'.$i, $data['luas_daftar']-$data['luas_terbit'])
            ->setCellValue('K'.$i, tgl_indo($data['tanggal_daftar_sk_hak']))
            ->setCellValue('L'.$i, $data['no_daftar_sk_hak'])
            ->setCellValue('M'.$i, tgl_indo($data['tanggal_terbit_sk_hak']))
            ->setCellValue('N'.$i, $data['no_terbit_sk_hak'])
            ->setCellValue('O'.$i, tgl_indo($data['tanggal_daftar_shgb']))
            ->setCellValue('P'.$i, $data['no_daftar_shgb'])
            ->setCellValue('Q'.$i, tgl_indo($data['tanggal_terbit_shgb']))
            ->setCellValue('R'.$i, $data['no_terbit_shgb'])
            ->setCellValue('S'.$i, tgl_indo($data['masa_berlaku_shgb']))
            ->setCellValue('T'.$i, tgl_indo($data['target_penyelesaian']))
            ->setCellValue('U'.$i, $data['keterangan']);
            $i++;
            $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
            //INSERT DETAIL PROSES INDUK
            $dataitem = $this->master_model->getprosesinduk($data['id_proses_induk']);

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, '')
            ->setCellValue('C'.$i, $data['no_gambar'])
            ->setCellValue('D'.$i, $data['no_surat_tanah'])
            ->setCellValue('E'.$i, $data['nama_surat_tanah'])
            ->setCellValue('F'.$i, $data['luas'])
            ->setCellValue('G'.$i, $data['luas_daftar'])
            ->setCellValue('H'.$i, $data['luas_terbit'])
            ->setCellValue('I'.$i, $data['luas_daftar']-$data['luas_terbit'])
            ->setCellValue('K'.$i, tgl_indo($data['tanggal_daftar_sk_hak']))
            ->setCellValue('L'.$i, $data['no_daftar_sk_hak'])
            ->setCellValue('M'.$i, tgl_indo($data['tanggal_terbit_sk_hak']))
            ->setCellValue('N'.$i, $data['no_terbit_sk_hak'])
            ->setCellValue('O'.$i, tgl_indo($data['tanggal_daftar_shgb']))
            ->setCellValue('P'.$i, $data['no_daftar_shgb'])
            ->setCellValue('Q'.$i, tgl_indo($data['tanggal_terbit_shgb']))
            ->setCellValue('R'.$i, $data['no_terbit_shgb'])
            ->setCellValue('S'.$i, tgl_indo($data['masa_berlaku_shgb']))
            ->setCellValue('T'.$i, tgl_indo($data['target_penyelesaian']))
            ->setCellValue('U'.$i, $data['keterangan']);
            $i++;
            $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
        }
        $i+=3;

        $nama_perumahan = '';
        $no=1;
        $nama_perumahan = '';
        $no=1;
        foreach($datarumah['dataperumahanses'] as $data) { 
          if ($data['tanggal_pengalihan']!=null) {
            $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
        }else{
            $tgl_pengalihan = '-';
        }
        if ($data['id_perumahan']=='0') {
            $perumahan = 'Tidak ada';
        }else{
            $perumahan = $data['nama_regional'];
        }
        $nama_perumahan = $perumahan;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B'.$i, $no++.'')
        ->setCellValue('C'.$i, $perumahan)
        ->setCellValue('D'.$i, $data['no_gambar'])
        ->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
        ->setCellValue('F'.$i, $data['nama_penjual'])
        ->setCellValue('G'.$i, $data['kode_sertifikat'])
        ->setCellValue('H'.$i, $data['nama_surat_tanah'])
        ->setCellValue('I'.$i, $data['luas_surat'])
        ->setCellValue('J'.$i, $data['luas_ukur'])
        ->setCellValue('K'.$i, $data['id_posisi_surat'])
        ->setCellValue('L'.$i, '')
        ->setCellValue('M'.$i, $data['status_order_akta'])
        ->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
        ->setCellValue('O'.$i, $data['akta_pengalihan'])
        ->setCellValue('P'.$i, $tgl_pengalihan)
        ->setCellValue('Q'.$i, $data['nama_pengalihan'])
        ->setCellValue('R'.$i, $data['terima_finance'])
        ->setCellValue('S'.$i, $data['keterangan']);
        $i++;
        $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
    }

    $i+=10 ;

    $nama_perumahan = '';
    $no=1;
    foreach($datarumah['dataperumahantekseb'] as $data) { 
      if ($data['tanggal_pengalihan']!=null) {
        $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
    }else{
        $tgl_pengalihan = '-';
    }
    if ($data['id_perumahan']=='0') {
        $perumahan = 'Tidak ada';
    }else{
        $perumahan = $data['nama_regional'];
    }
    $nama_perumahan = $perumahan;
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('B'.$i, $no++.'')
    ->setCellValue('C'.$i, $perumahan)
    ->setCellValue('D'.$i, $data['no_gambar'])
    ->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
    ->setCellValue('F'.$i, $data['nama_penjual'])
    ->setCellValue('G'.$i, $data['kode_sertifikat'])
    ->setCellValue('H'.$i, $data['nama_surat_tanah'])
    ->setCellValue('I'.$i, $data['luas_surat'])
    ->setCellValue('J'.$i, $data['luas_ukur'])
    ->setCellValue('K'.$i, $data['id_posisi_surat'])
    ->setCellValue('L'.$i, '')
    ->setCellValue('M'.$i, $data['status_order_akta'])
    ->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
    ->setCellValue('O'.$i, $data['akta_pengalihan'])
    ->setCellValue('P'.$i, $tgl_pengalihan)
    ->setCellValue('Q'.$i, $data['nama_pengalihan'])
    ->setCellValue('R'.$i, $data['terima_finance'])
    ->setCellValue('S'.$i, $data['keterangan']);
    $i++;
    $spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
$i+=3;

$nama_perumahan = '';
$no=1;
$nama_perumahan = '';
$no=1;
foreach($datarumah['dataperumahantekses'] as $data) { 
  if ($data['tanggal_pengalihan']!=null) {
    $tgl_pengalihan = tgl_indo($data['tanggal_pengalihan']);
}else{
    $tgl_pengalihan = '-';
}
if ($data['id_perumahan']=='0') {
    $perumahan = 'Tidak ada';
}else{
    $perumahan = $data['nama_regional'];
}
$nama_perumahan = $perumahan;
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('B'.$i, $no++.'')
->setCellValue('C'.$i, $perumahan)
->setCellValue('D'.$i, $data['no_gambar'])
->setCellValue('E'.$i, tgl_indo($data['tanggal_pembelian']))
->setCellValue('F'.$i, $data['nama_penjual'])
->setCellValue('G'.$i, $data['kode_sertifikat'])
->setCellValue('H'.$i, $data['nama_surat_tanah'])
->setCellValue('I'.$i, $data['luas_surat'])
->setCellValue('J'.$i, $data['luas_ukur'])
->setCellValue('K'.$i, $data['id_posisi_surat'])
->setCellValue('L'.$i, '')
->setCellValue('M'.$i, $data['status_order_akta'])
->setCellValue('N'.$i, $data['jenis_pengalihan_hak'])
->setCellValue('O'.$i, $data['akta_pengalihan'])
->setCellValue('P'.$i, $tgl_pengalihan)
->setCellValue('Q'.$i, $data['nama_pengalihan'])
->setCellValue('R'.$i, $data['terima_finance'])
->setCellValue('S'.$i, $data['keterangan']);
$i++;
$spreadsheet->getActiveSheet()->insertNewRowBefore($i, 1);
}
        // Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Laporan '.$nama_perumahan);
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Land bank.xlsx"');
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

/* End of file  */
/* Location: ./application/controllers/ */