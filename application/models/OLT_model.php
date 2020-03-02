<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model OLT_model
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

class OLT_model extends CI_Model
{

  public function getDataOLT($id = null)
  {
    $this->db->select('*');
    $this->db->from('rekap_data_olt');
    $this->db->join('specification_olt', 'rekap_data_olt.idSpecOLT = specification_olt.idSpecOLT', 'left outer');
    $this->db->join('sto', 'rekap_data_olt.idSTO=sto.idSTO');
    if ($id != null) {
      $this->db->where('idOLT', $id);
    }
    $query = $this->db->get();
    return $query;
  }
  
  public function getNamaOLT($searchTerm=""){
    $this->db->select('hostname');
    $this->db->distinct('hostname');
    $this->db->from('rekap_data_olt');
    if ($searchTerm != null) {
      
      $this->db->where("hostname like '%".$searchTerm."%' ");
    }
    $this->db->limit(100,0); 
    $query = $this->db->get();
    return $query;
  }

  public function view()
  {
    return $this->db->get('rekap_data_olt')->result(); // Tampilkan semua data yang ada di tabel
  }

  public function addDataOLT($post)
  {
    $params['hostname'] = html_escape($post['hostname']);
    $params['ipOLT'] = html_escape($post['ipOLT']);
    $params['idLogicalDevice'] = html_escape($post['idLogicalDevice']);
    $params['idSTO'] = html_escape($post['STO']);
    $params['idSpecOLT'] = html_escape($post['SpecOLT']);
    $this->db->insert('rekap_data_olt', $params);
  }

  public function editDataOLT($post)
  { 
    $params['ipOLT'] = html_escape($post['ipOLT']);
    $params['idLogicalDevice'] = html_escape($post['idLogicalDevice']);
    // $params['idSTO'] = html_escape($post['STO']);
    $params['idSpecOLT'] = html_escape($post['SpecOLT']);
    $this->db->where('idOLT', $post['idOLT']);
    $this->db->update('rekap_data_olt', $params);
  }

  public function deleteDataOLT($id)
  {
    $this->db->where('idOLT', $id);
    $this->db->delete('rekap_data_olt');
  }

  public function deleteAllDataOLT()
  {
    $this->db->empty_table('rekap_data_olt');
  }

   //Import Excel via phpSpreadsheet
   private $varBatchImportOLT;
   public function setBatchImportOLT($batchImportOLT)
   {
     $this->varBatchImportOLT = $batchImportOLT;
   }
 
   //import data to database
   public function importDataOLT()
   {
     $data = $this->varBatchImportOLT;
     $this->db->insert_batch('rekap_data_olt', $data);
   }



  // 
  /* End of file OLT_model.php */
  /* Location: ./application/models/OLT_model.php */
}
