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
    $this->db->from('rekap_data_olt');
    if ($id != null) {
      $this->db->where('hostname', $id);
    }
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
    $params['idSTO'] = html_escape($post['idSTO']);
    $params['idSpecOLT'] = html_escape($post['idSpecOLT']);
    $this->db->insert('rekap_data_olt', $params);
  }

  public function editDataODP($post)
  {
    $params['ipOLT'] = html_escape($post['ipOLT']);
    $params['idLogicalDevice'] = html_escape($post['idLogicalDevice']);
    $params['idSTO'] = html_escape($post['idSTO']);
    $params['idSpecOLT'] = html_escape($post['idSpecOLT']);
    $this->db->where('hostname', $post['hostname']);
    $this->db->update('rekap_data_olt', $params);
  }

  public function deleteDataOLT($id)
  {
    $this->db->where('hostname', $id);
    $this->db->delete('rekap_data_olt');
  }




  // 
  /* End of file OLT_model.php */
  /* Location: ./application/models/OLT_model.php */
}
