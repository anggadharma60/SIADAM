<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model ODP_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class ODP_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getDataODP($id = null)
  {
    $this->db->select('rekap_data_odp.*, sto.kodeSTO,  sto.namaSTO, sto.idDatel, datel.namaDatel, datel.idWitel, witel.namaWitel, witel.idRegional, regional.namaRegional');
    $this->db->from('rekap_data_odp');
    $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
    $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
    $this->db->join('witel', 'datel.idWitel=witel.idWitel');
    $this->db->join('regional', 'witel.idRegional = regional.idRegional');
    $this->db->order_by('idODP ASC');
    if ($id != null) {
      $this->db->where('idODP', $id);
    }
    $query = $this->db->get();
    return $query;
  }

//   function viewODP($postData=null){

//     $response = array();

//     ## Read value
//     $draw = $postData['draw'];
//     $start = $postData['start'];
//     $rowperpage = $postData['length']; // Rows display per page
//     $columnIndex = $postData['order'][0]['column']; // Column index
//     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
//     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
//     $searchValue = $postData['search']['value']; // Search value
  
//     ## Search 
//     $searchQuery = "";
//     if($searchValue != ''){
//         $searchQuery = " (idODP like '%".$searchValue."%' or 
//               idNOSS like '%".$searchValue."%' or 
//               indexODP like'%".$searchValue."%' or
//               namaODP like'%".$searchValue."%' or
//               ftp like'%".$searchValue."%' or
//               latitude like'%".$searchValue."%' or
//               longitude like'%".$searchValue."%' or
//               clusterName like'%".$searchValue."%' or
//               clusterStatus like'%".$searchValue."%' or
//               avai like'%".$searchValue."%' or
//               used like'%".$searchValue."%' or
//               rsv like'%".$searchValue."%' or
//               rsk like'%".$searchValue."%' or
//               total like'%".$searchValue."%' or
             
//               infoODP like'%".$searchValue."%' or
//               updateDate like'%".$searchValue."%' 
//               ) ";
//     }


//     ## Total number of records without filtering
//     $this->db->select('count(*) as allcount');
//     $records = $this->db->get('rekap_data_odp')->result();
//     $totalRecords = $records[0]->allcount;

//     ## Total number of record with filtering
//     $this->db->select('count(*) as allcount');
//     if($searchQuery != '')
//     $this->db->where($searchQuery);
//     $records = $this->db->get('rekap_data_odp')->result();
//     $totalRecordwithFilter = $records[0]->allcount;

    
//     ## Fetch records
//   //   $this->db->select('rekap_data_odp.*, sto.kodeSTO,  sto.namaSTO, sto.idDatel, datel.namaDatel, datel.idWitel, witel.namaWitel, witel.idRegional, regional.namaRegional');
//     $this->db->select('*');
//   //   $this->db->from('rekap_data_odp');
//   //   $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
//   //   $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
//   //   $this->db->join('witel', 'datel.idWitel=witel.idWitel');
//   //   $this->db->join('regional', 'witel.idRegional = regional.idRegional');
//   //   $this->db->order_by('idODP ASC');
//     if($searchQuery != '')
//       $this->db->where($searchQuery);
//     $this->db->order_by($columnName, $columnSortOrder);
//     $this->db->limit($rowperpage, $start);
//     $records = $this->db->get('rekap_data_odp')->result();
    
//     $data = array();

//     foreach($records as $record ){
       
//         $data[] = array( 
//           "idODP"=>$record->idODP,
//           "idNOSS"=>$record->idNOSS,
//           "indexODP"=>$record->indexODP,
//           "namaODP"=>$record->namaODP,
//           "ftp"=>$record->ftp,
//           "latitude"=>$record->latitude,
//           "longitude"=>$record->longitude,
//           "clusterName"=>$record->clusterName,
//           "clusterStatus"=>$record->clusterStatus,
//           "avai"=>$record->avai,
//           "used"=>$record->used,
//           "rsv"=>$record->rsv,
//           "rsk"=>$record->rsk,
//           "total"=>$record->total,
//           // // "namaRegional"=>$record->namaRegional,
//           // // "namaWitel"=>$record->namaWitel,
//           // // "namaDatel"=>$record->namaDatel,
//           // // "namaSTO"=>$record->namaSTO,
//           "infoODP"=>$record->infoODP,
//           "updateDate"=>$record->updateDate
//         ); 
//     }

//     ## Response
//     $response = array(
//         // "draw" => intval($draw),
//         // "iTotalRecords" => $totalRecords,
//         // "iTotalDisplayRecords" => $totalRecordwithFilter,
//         "aaData" => $data
//     );

//     return $response; 
// }

public function filter($search, $limit, $start, $order_field, $order_ascdesc){
  // $this->db->like('nis', $search); // Untuk menambahkan query where LIKE
  // $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
  // $this->db->or_like('telp', $search); // Untuk menambahkan query where OR LIKE
  // $this->db->or_like('alamat', $search); // Untuk menambahkan query where OR LIKE
  // $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
  $this->db->select('*');
  $this->db->from('rekap_data_odp');
  $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
  $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
  $this->db->join('witel', 'witel.idWitel=datel.idWitel');
  $this->db->join('regional', 'regional.idRegional = witel.idRegional ');
  $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

  return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
}

public function count_all(){
  $this->db->from('rekap_data_odp');
  $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
  $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
  $this->db->join('witel', 'witel.idWitel=datel.idWitel');
  $this->db->join('regional', 'regional.idRegional = witel.idRegional ');
  return $this->db->count_all('rekap_data_odp'); // Untuk menghitung semua data siswa
}

public function count_filter($search){
  // $this->db->like('nis', $search); // Untuk menambahkan query where LIKE
  // $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE
  // $this->db->or_like('telp', $search); // Untuk menambahkan query where OR LIKE
  // $this->db->or_like('alamat', $search); // Untuk menambahkan query where OR LIKE
  $this->db->select('*');
  $this->db->from('rekap_data_odp');
  $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
  $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
  $this->db->join('witel', 'witel.idWitel=datel.idWitel');
  $this->db->join('regional', 'regional.idRegional = witel.idRegional ');
  return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
}
  public function addDataODP($post)
  {
    $params['idNOSS'] = html_escape($post['idNOSS']);
    $params['indexODP'] = html_escape($post['indexODP']);
    $params['namaODP'] = html_escape($post['namaODP']);
    $params['ftp'] = html_escape($post['ftp']);
    $params['latitude'] = html_escape($post['latitude']);
    $params['longitude'] = html_escape($post['longitude']);
    $params['clusterName'] = html_escape($post['clusterName']);
    $params['clusterStatus'] = html_escape($post['clusterStatus']);
    $params['avai'] = html_escape($post['avai']);
    $params['used'] = html_escape($post['used']);
    $params['rsv'] = html_escape($post['rsv']);
    $params['rsk'] = html_escape($post['rsk']);
    $total = $params['avai'] + $params['used'] + $params['rsv'] + $params['rsk'];
    $params['total'] = html_escape($total);
    $params['idSTO'] = html_escape($post['STO']);
    $params['infoODP'] = html_escape($post['infoODP']);
    $format = "%Y-%m-%d %h:%i %A";
    $datetime = mdate($format);
    $params['updateDate'] = html_escape($datetime);
    $this->db->insert('rekap_data_odp', $params);
  }

  public function editDataODP($post)
  {
    // $params['idNOSS'] = html_escape($post['idNOSS']);
    // $params['indexODP'] = html_escape($post['indexODP']);
    // $params['namaODP'] = html_escape($post['namaODP']);
    $params['ftp'] = html_escape($post['ftp']);
    $params['latitude'] = html_escape($post['latitude']);
    $params['longitude'] = html_escape($post['longitude']);
    $params['clusterName'] = html_escape($post['clusterName']);
    $params['clusterStatus'] = html_escape($post['clusterStatus']);
    $params['avai'] = html_escape($post['avai']);
    $params['used'] = html_escape($post['used']);
    $params['rsv'] = html_escape($post['rsv']);
    $params['rsk'] = html_escape($post['rsk']);
    $params['avai'] = html_escape($post['avai']);
    $params['used'] = html_escape($post['used']);
    $params['rsv'] = html_escape($post['rsv']);
    $params['rsk'] = html_escape($post['rsk']);
    $total = $params['avai'] + $params['used'] + $params['rsv'] + $params['rsk'];
    $params['total'] = html_escape($total);
    // $params['idSTO'] = html_escape($post['idSTO']);
    $params['infoODP'] = html_escape($post['infoODP']);
    $format = "%Y-%m-%d %h:%i %A";
    $datetime = mdate($format);
    $params['updateDate'] = html_escape($datetime);
    $this->db->where('idODP', $post['idODP']);
    $this->db->update('rekap_data_odp', $params);
  }

  public function deleteDataODP($id)
  {
    $this->db->where('idODP', $id);
    $this->db->delete('rekap_data_odp');
  }

  public function deleteAllDataODP($table)
  {
    $this->db->empty_table($table);
  }

  //   //IMPORT
  //   // Fungsi untuk melakukan proses upload file
  //   public function upload_file($filename){
  //     $this->load->library('upload'); // Load librari upload

  //     $config['upload_path'] = './excel/';
  //     $config['allowed_types'] = 'xlsx';
  //     $config['max_size']  = '2048';
  //     $config['overwrite'] = true;
  //     $config['file_name'] = $filename;

  //     $this->upload->initialize($config); // Load konfigurasi uploadnya
  //     if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
  //       // Jika berhasil :
  //       $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
  //       return $return;
  //     }else{
  //       // Jika gagal :
  //       $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
  //       return $return;
  //     }
  // }

  //   // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  //   public function insert_multiple($data){
  //     $this->db->insert_batch('rekap_data_odp', $data);
  //   }

  //Import Excel via phpSpreadsheet
  private $varBatchImportODP;
  public function setBatchImportODP($batchImportODP)
  {
    $this->varBatchImportODP = $batchImportODP;
  }

  //import data to database
  public function importDataODP()
  {
    $data = $this->varBatchImportODP;
    $this->db->insert_batch('rekap_data_odp', $data);
  }

  // Listing export
  // public function listing()
  // {
  //   $this->db->select('*');
  //   $this->db->from('rekap_data_odp');
  //   $this->db->order_by('idODP', 'ASC');
  //   $query = $this->db->get();
  //   return $query->result();
  //   // $query = $this->db->get();
  //   // return $query;
  // }




  // 
  /* End of file ODP_model.php */
  /* Location: ./application/models/ODP_model.php */
}
