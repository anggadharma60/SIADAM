<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Import_ODP extends CI_Controller {
  private $filename = "import_data"; // Kita tentukan nama filenya
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('Import_ODP_model');
  }
  
  public function index(){
    $data['rekap_data_odp'] = $this->Import_ODP_model->view();
    $this->load->view('form', $data);
  }
  
  public function form(){
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->Import_ODP_model->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'libraries/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
		// $this->template->load('template/template_Admin', 'form', $data);
    $this->load->view('form', $data);
  }
  
  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'libraries/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
            // Kita push (add) array data ke variabel data
            array_push($data, array(
                'idNOSS'            =>  $row['A'],
                'indexODP'          =>  $row['B'],
                'idODP'             =>  $row['C'],
                'ftp'               =>  $row['E'],
                'latitude'          =>  $row['F'],
                'longitude'         =>  $row['G'],
                'clusterName'       =>  $row['H'],
                'clusterStatus'     =>  $row['I'],
                'avai'              =>  $row['J'],
                'used'              =>  $row['K'],
                'rsv'               =>  $row['L'],
                'rsk'               =>  $row['M'],
                'total'             =>  $row['N'],
                'idRegional'        =>  $row['O'],
                'idWitel'           =>  $row['P'],
                'idDatel'           =>  $row['Q'],
                'idSTO'             =>  $row['R'],
                'infoODP'           =>  $row['T'],
                'updateDate'        =>  $row['U']
            ));
        }
      
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->Import_ODP_model->insert_multiple($data);
    
    redirect("Admin/getODP"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
}

?>