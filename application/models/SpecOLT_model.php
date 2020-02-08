<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model SpecOLT_model
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

class SpecOLT_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function getDataSpecOLT($id = null){
    $this->db->from('specification_olt');
        if($id != null) {
            $this->db->where('idSpecOLT', $id);
        }
        $query = $this->db->get();
        return $query;
  }

  public function addDataSpecOLT($post)
    {
        $params['namaSpecOLT'] = html_escape($post['namaSpecOLT']);
        $params['merekOLT'] = html_escape($post['merekOLT']);
        $params['typeOLT'] = html_escape($post['typeOLT']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $this->db->insert('specification_olt', $params);
    }

    public function editDataSpecOLT($post)
    {
        $params['namaSpecOLT'] = html_escape($post['namaSpecOLT']);
        $params['merekOLT'] = html_escape($post['merekOLT']);
        $params['typeOLT'] = html_escape($post['typeOLT']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $this->db->where('idSpecOLT', $post['idSpecOLT']);
        $this->db->update('specification_olt', $params);
    }

    public function deleteDataSpecOLT($id)
	{
		$this->db->where('idSpecOLT', $id);
		$this->db->delete('specification_olt');
	}

  // ------------------------------------------------------------------------

}

/* End of file SpecOLT_model.php */
/* Location: ./application/models/SpecOLT_model.php */