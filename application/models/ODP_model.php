<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

class ODP_model extends CI_Model {

  public function getDataODP($id = null){
    $this->db->from('rekap_data_odp');
        if($id != null) {
            $this->db->where('idODP', $id);
        }
        $query = $this->db->get();
        return $query;
  }
  public function view(){
    return $this->db->get('rekap_data_odp')->result(); // Tampilkan semua data yang ada di tabel
  }
  //IMPORT
  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('rekap_data_odp', $data);
  }

  public function addDataODP($post)
    {
        $params['idNOSS'] = html_escape($post['idNOSS']);
        $params['indexODP'] = html_escape($post['indexODP']);
        $params['idODP'] = html_escape($post['idODP']);
        $params['ftp'] = html_escape($post['ftp']);
        $params['latitude'] = html_escape($post['latitude']);
        $params['longitude'] = html_escape($post['longitude']);
        $params['clusterName'] = html_escape($post['clusterName']);
        $params['clusterStatus'] = html_escape($post['clusterStatus']);
        $params['avai'] = html_escape($post['avai']);
        $params['used'] = html_escape($post['used']);
        $params['rsv'] = html_escape($post['rsv']);
        $params['rsk'] = html_escape($post['rsk']);
        $params['total'] = html_escape($post['total']);
        $params['idRegional'] = html_escape($post['idRegional']);
        $params['idWitel'] = html_escape($post['idWitel']);
        $params['idDatel'] = html_escape($post['idDatel']);
        $params['idSTO'] = html_escape($post['idSTO']);
        $params['infoODP'] = html_escape($post['infoODP']);
        $params['updateDate'] = html_escape($post['updateDate']);
        $this->db->insert('rekap_data_odp', $params);
    }

    public function editDataODP($post)
    {
        $params['idNOSS'] = html_escape($post['idNOSS']);
        $params['indexODP'] = html_escape($post['indexODP']);
        $params['ftp'] = html_escape($post['ftp']);
        $params['latitude'] = html_escape($post['latitude']);
        $params['longitude'] = html_escape($post['longitude']);
        $params['clusterName'] = html_escape($post['clusterName']);
        $params['clusterStatus'] = html_escape($post['clusterStatus']);
        $params['avai'] = html_escape($post['avai']);
        $params['used'] = html_escape($post['used']);
        $params['rsv'] = html_escape($post['rsv']);
        $params['rsk'] = html_escape($post['rsk']);
        $params['total'] = html_escape($post['total']);
        $params['idRegional'] = html_escape($post['idRegional']);
        $params['idWitel'] = html_escape($post['idWitel']);
        $params['idDatel'] = html_escape($post['idDatel']);
        $params['idSTO'] = html_escape($post['idSTO']);
        $params['infoODP'] = html_escape($post['infoODP']);
        $params['updateDate'] = html_escape($post['updateDate']);
        $this->db->where('idODP', $post['idODP']);
        $this->db->update('rekap_data_odp', $params);
    }

    public function deleteDataODP($id)
	{
		$this->db->where('idODP', $id);
		$this->db->delete('rekap_data_odp');
  }

  
  

  // 
/* End of file ODP_model.php */
/* Location: ./application/models/ODP_model.php */

}

?>
