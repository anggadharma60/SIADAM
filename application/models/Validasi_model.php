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

class Validasi_model extends CI_Model {

  public function getDataValidasi($id = null){
    // $this->db->select('*');
    // // $this->db->select('rekap_data_odp.*, sto.kodeSTO, sto.namaSTO, sto.idDatel, datel.namaDatel, datel.idWitel, witel.namaWitel, witel.idRegional, regional.namaRegional');
    // $this->db->from('rekap_data_odp');
    // $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
    // $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
    // $this->db->join('witel', 'datel.idWitel=witel.idWitel');
    // $this->db->join('regional', 'witel.idRegional = regional.idRegional');
    //     if($id != null) {
    //         $this->db->where('idODP', $id);
    //     }
    // $query = $this->db->get();
    // return $query;
  }

  public function addDataValidasi($post)
    {
        // $params['idNOSS'] = html_escape($post['idNOSS']);
        // $params['indexODP'] = html_escape($post['indexODP']);
        // $params['namaODP'] = html_escape($post['namaODP']);
        // $params['ftp'] = html_escape($post['ftp']);
        // $params['latitude'] = html_escape($post['latitude']);
        // $params['longitude'] = html_escape($post['longitude']);
        // $params['clusterName'] = html_escape($post['clusterName']);
        // $params['clusterStatus'] = html_escape($post['clusterStatus']);
        // $params['avai'] = html_escape($post['avai']);
        // $params['used'] = html_escape($post['used']);
        // $params['rsv'] = html_escape($post['rsv']);
        // $params['rsk'] = html_escape($post['rsk']);
        // $total = $params['avai'] + $params['used'] + $params['rsv'] + $params['rsk'];
        // $params['total'] = html_escape($total);
        // $params['idSTO'] = html_escape($post['STO']);
        // $params['infoODP'] = html_escape($post['infoODP']);
        // $format = "%Y-%m-%d %h:%i %A";
        // $datetime = mdate($format);
        // $params['updateDate'] = html_escape($datetime);
        // $this->db->insert('rekap_data_odp', $params);
    }

    public function editDataValidasi($post)
    {
        // // $params['idNOSS'] = html_escape($post['idNOSS']);
        // // $params['indexODP'] = html_escape($post['indexODP']);
        // // $params['namaODP'] = html_escape($post['namaODP']);
        // $params['ftp'] = html_escape($post['ftp']);
        // $params['latitude'] = html_escape($post['latitude']);
        // $params['longitude'] = html_escape($post['longitude']);
        // $params['clusterName'] = html_escape($post['clusterName']);
        // $params['clusterStatus'] = html_escape($post['clusterStatus']);
        // $params['avai'] = html_escape($post['avai']);
        // $params['used'] = html_escape($post['used']);
        // $params['rsv'] = html_escape($post['rsv']);
        // $params['rsk'] = html_escape($post['rsk']);
        // $params['avai'] = html_escape($post['avai']);
        // $params['used'] = html_escape($post['used']);
        // $params['rsv'] = html_escape($post['rsv']);
        // $params['rsk'] = html_escape($post['rsk']);
        // $total = $params['avai'] + $params['used'] + $params['rsv'] + $params['rsk'];
        // $params['total'] = html_escape($total);
        // // $params['idSTO'] = html_escape($post['idSTO']);
        // $params['infoODP'] = html_escape($post['infoODP']);
        // $format = "%Y-%m-%d %h:%i %A";
        // $datetime = mdate($format);
        // $params['updateDate'] = html_escape($datetime);
        // $this->db->where('idODP', $post['idODP']);
        // $this->db->update('rekap_data_odp', $params);
    }

    public function deleteAllDataValidasi($table)
    {
      $this->db->empty_table($table);
    }
    
    public function deleteDataValidasi($id)
    {
      // $this->db->where('idODP', $id);
      // $this->db->delete('rekap_data_odp');
    }

    public function filter($search, $limit, $start, $order_field, $order_ascdesc){
      $this->db->like('id', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('tanggalPelurusan', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ondesk', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('onsite', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('namaODP', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('noteODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('QRODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('koordinatODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('hostname', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('portOLT', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('totalIN', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('kapasitasODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('portOutSplitter', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('QRPortOutSplitter', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('portODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('statusPortODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ONU', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('serialNumber', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('serviceNumber', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('QRDropCore', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteUrut', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('flagOLTPort', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ODPtoOLT', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ODPtoONT', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('RFS', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteHDDaman', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('updateDateUIM', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('updaterUIM', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteQRODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteQROutSplitter', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteQRDropCore', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('updaterDava', $search); // Untuk menambahkan query where OR LIKE
      $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
      $this->db->select('*');
      $this->db->from('rekap_data_validasi');
      $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    
      return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
    }
    
    public function count_all(){
      return $this->db->count_all('rekap_data_validasi'); // Untuk menghitung semua data siswa
    }
    
    public function count_filter($search){
      $this->db->like('id', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('tanggalPelurusan', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ondesk', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('onsite', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('namaODP', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('noteODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('QRODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('koordinatODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('hostname', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('portOLT', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('totalIN', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('kapasitasODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('portOutSplitter', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('QRPortOutSplitter', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('portODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('statusPortODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ONU', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('serialNumber', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('serviceNumber', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('QRDropCore', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteUrut', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('flagOLTPort', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ODPtoOLT', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('ODPtoONT', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('RFS', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteHDDaman', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('updateDateUIM', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('updaterUIM', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteQRODP', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteQROutSplitter', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('noteQRDropCore', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('updaterDava', $search); // Untuk menambahkan query where OR LIKE
      $this->db->select('*');
      $this->db->from('rekap_data_validasi');
      return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
    }

    private $varBatchImportValidasi;
    public function setBatchImportValidasi($batchImportValidasi)
    {
      $this->varBatchImportValidasi = $batchImportValidasi;
    }

    //import data to database
    public function importDataValidasi()
    {
      $data = $this->varBatchImportValidasi;
      $this->db->insert_batch('rekap_data_validasi', $data);
    }
  
  

  // 
/* End of file ODP_model.php */
/* Location: ./application/models/ODP_model.php */

}
