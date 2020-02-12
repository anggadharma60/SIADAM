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
    $this->db->select('*');
    // $this->db->select('rekap_data_odp.*, sto.kodeSTO, sto.namaSTO, sto.idDatel, datel.namaDatel, datel.idWitel, witel.namaWitel, witel.idRegional, regional.namaRegional');
    $this->db->from('rekap_data_odp');
    $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
    $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
    $this->db->join('witel', 'datel.idWitel=witel.idWitel');
    $this->db->join('regional', 'witel.idRegional = regional.idRegional');
    if ($id != null) {
      $this->db->where('idODP', $id);
    }
    $query = $this->db->get();
    return $query;
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
