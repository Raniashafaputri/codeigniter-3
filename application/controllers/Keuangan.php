<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class Keuangan extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->model('m_model');
  $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true && $this->session->userdata('role') != 'keuangan') {
           redirect(base_url() . 'auth');
        }
 }

 public function index()
 {
  $this->load->view('keuangan/index');
 }

    // untuk pembayaran
    public function pembayaran()
    {
        $data['pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $this->load->view('keuangan/pembayaran', $data);
    }

    // untuk tambah pembayaran
    public function tambah_pembayaran() {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/tambah_pembayaran', $data);
    }
    public function  export(){ 
        $spreadsheet = new Spreadsheet(); 
        $sheet = $spreadsheet->getActiveSheet(); 
          
        $style_col = [ 
            'font'=> ['bold' => true], 
            'alignment'=> [ 
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER, 
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER 
            ], 
            'borders'=> [ 
                'top'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN], 
                'right'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN], 
                'bottom'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN], 
                'left'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN] 
            ], 
            ]; 
        $style_row = [ 
             
            'alignment'=> [ 
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER 
            ], 
            'borders'=> [ 
                'top'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN], 
                'right'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN], 
                'bottom'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN], 
                'left'=> ['borderstyle'=> \PhpOffice\PhpSpreadsheet\Style\Border ::BORDER_THIN] 
            ], 
            ]; 
    // Head 
            $sheet->setCellValue('A1','DATA PEMBAYARAN'); 
            $sheet->mergeCells('A1:E1'); 
            $sheet->getStyle('A1')->getFont()->setBold(true); 
     
            $sheet->setCellValue('A3','ID'); 
            $sheet->setCellValue('B3','JENIS PEMBAYARAN'); 
            $sheet->setCellValue('C3','TOTAL PEMBAYARAN'); 
     
            $sheet->getStyle('A3')->applyFromArray($style_col); 
            $sheet->getStyle('B3')->applyFromArray($style_col); 
            $sheet->getStyle('C3')->applyFromArray($style_col); 
    // get data dari database 
            $data_pembayaran = $this->m_model->get_data('pembayaran')->result(); 
    // isi 
            $no=1; 
            $numrow=4; 
            foreach ($data_pembayaran as $data) { 
            $sheet->setCellValue('A'.$numrow,$data->id); 
            $sheet->setCellValue('B'.$numrow,$data->jenis_pembayaran); 
            $sheet->setCellValue('C'.$numrow,$data->total_pembayaran); 
     
    $sheet->getStyle('A'.$numrow)->applyFromArray($style_row); 
    $sheet->getStyle('B'.$numrow)->applyFromArray($style_row); 
    $sheet->getStyle('C'.$numrow)->applyFromArray($style_row); 
     
    $no++; 
    $numrow++; 
    } 
     
     
            $sheet->getColumnDimension('A')->setWidth(5); 
            $sheet->getColumnDimension('B')->setWidth(25); 
            $sheet->getColumnDimension('C')->setWidth(25); 
            $sheet->getColumnDimension('D')->setWidth(20); 
            $sheet->getColumnDimension('E')->setWidth(30); 
     
            $sheet->getDefaultRowDimension()->setRowHeight(-1); 
     
            $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE); 
     
            $sheet->setTitle("LAPORAN DATA PEMBAYARAN"); 
     
     
            header('Content-Type: aplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
            header('Content-Disposition: attachment; filename="Pembayaran.xslx"'); 
            header('cache-Control: max-age=0'); 
     
            $writer =new Xlsx($spreadsheet); 
            $writer->save('php://output'); 
        }

        public function import()
        {
          if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
              $highestRow = $worksheet->getHighestRow();
              $highestColumn = $worksheet->getHighestColumn();
              for($row=2; $row<=$highestRow; $row++) {
                $jenis_pembayaran = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $total_pembayaran = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $nisn = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
      
                $get_id_by_nisn = $this->m_model->get_by_nisn($nisn);
                $data = array(
                  'jenis_pembayaran' => $jenis_pembayaran,
                  'total_pembayaran' => $total_pembayaran,
                  'id_siswa' => $get_id_by_nisn
                );
                $this->m_model->tambah_data('pembayaran', $data);
              }
            }
            redirect(base_url('keuangan/pembayaran'));
          } else {
            echo 'Invalid File';
          }
        }
      
    public function aksi_tambah_pembayaran() {
        $id_siswa = $this->input->post('id_siswa');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $total_pembayaran = $this->input->post('total_pembayaran');
    
        // Validasi data
        if (empty($id_siswa) || empty($jenis_pembayaran) || empty($total_pembayaran)) {
            // Tampilkan pesan kesalahan atau lakukan tindakan sesuai kebijakan aplikasi Anda.
            // Misalnya, redirect kembali ke halaman form dengan pesan kesalahan.
            redirect(base_url('keuangan/form_pembayaran?error=Data tidak valid'));
            return;
        }
    
        $data = [
            'id_siswa' => $id_siswa,
            'jenis_pembayaran' => $jenis_pembayaran,
            'total_pembayaran' => $total_pembayaran,
        ];
    
        // Menyimpan data ke database
        $insert_result = $this->m_model->tambah_data('pembayaran', $data);
    
        if ($insert_result) {
            // Jika penyimpanan berhasil, redirect ke halaman pembayaran
            redirect(base_url('keuangan/pembayaran'));
        } else {
            // Jika terjadi kesalahan saat menyimpan data ke database, tangani kesalahan sesuai kebijakan aplikasi Anda.
            // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman kesalahan.
            redirect(base_url('keuangan/form_pembayaran?error=Gagal menyimpan data'));
        }
    }
     
    
    
    

    
    public function update_pembayaran($id){
        $data['pembayaran']=$this->m_model->get_by_id('pembayaran', 'id', $id)->result();
        $data['siswa']=$this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/update_pembayaran', $data);
    }

    public function aksi_update_pembayaran()
    {
        $data = array (
            'id_siswa' => $this->input->post('id_siswa'),
			'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
			'total_pembayaran' => $this->input->post('total_pembayaran'),
        );
        $eksekusi=$this->m_model->ubah_data
        ('pembayaran', $data, array('id'=>$this->input->post('id')));
        if($eksekusi)
        {
            redirect(base_url('keuangan/pembayaran'));
        }
        else
        {
            redirect(base_url('keuangan/update_pembayaran/'.$this->input->post('id')));
        }
    }

    // untuk hapus 
    public function hapus_data($id)
    {
        $this->m_model->delete('pembayaran', 'id', $id);
        redirect(base_url('keuangan/pembayaran'));
    }
    
}
?>
