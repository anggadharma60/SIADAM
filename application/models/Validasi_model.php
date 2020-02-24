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
    $this->db->select('*');
    $this->db->from('rekap_data_validasi');

        if($id != null) {
            $this->db->where('id', $id);
        }
    $query = $this->db->get();
    return $query;
  }

  public function addDataValidasi($post)
    {
        $params['tanggal_pelurusan'] = html_escape($post['tanggal_pelurusan']);
        $params['ondesk'] = html_escape($post['ondesk']);
        $params['onsite'] = html_escape($post['onsite']);
        $params['namaODP'] = html_escape($post['namaODP']);
        $params['noteODP'] = html_escape($post['noteODP']);
        $params['QRODP'] = html_escape($post['QRODP']);
        $params['koordinatODP'] = html_escape($post['koordinatODP']);
        $params['hostname'] = html_escape($post['hostname']);
        $params['portOLT'] = html_escape($post['portOLT']);
        $params['totalIn'] = html_escape($post['totalIn']);
        $params['kapasitasODP'] = html_escape($post['kapasitasODP']);
        $params['portOutSplitter'] = html_escape($post('portOutSplitter'));
        $params['QROutSplitter'] = html_escape($post['QROutSplitter']);
        $params['portODP'] = html_escape($post['portODP']);
        $params['statusportODP'] = html_escape($post['statusportODP']);
        $params['ONU'] = html_escape($post['ONU']);
        $params['serialNumber'] = html_escape($post['serialNumber']);
        $params['serviceNumber'] = html_escape($post['serviceNumber']);
        $params['QRDropCore'] = html_escape($post['QRDropCore']);
        $params['noteDropcore'] = html_escape($post['noteDropcore']);
        $params['flagOLTPort'] = html_escape($post['flagOLTPort']);
        $params['ODPtoOLT'] = html_escape($post['ODPtoOLT']);
        $params['ODPtoONT'] = html_escape($post['ODPtoONT']);
        $params['RFS'] = html_escape($post['RFS']);
        $params['noteHDDaman'] = html_escape($post['noteHDDaman']);
        $params['updateDateUIM'] = html_escape($post['updateDateUIM']);
        $params['updaterUIM'] = html_escape($post['updaterUIM']);
        $params['noteQRODP'] = html_escape($post['noteQRODP']);
        $params['noteQROutSplitter'] = html_escape($post['noteQROutSplitter']);
        $params['noteQRDropCore'] = html_escape($post['noteQRDropCore']);
        $params['updaterDava'] = html_escape($post['updaterDava']);
        
        $format = "%Y-%m-%d %h:%i %A";
        $datetime = mdate($format);
        $params['updateDate'] = html_escape($datetime);
        $this->db->insert('rekap_data_validasi', $params);
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
      $this->db->where('id', $id);
      $this->db->delete('rekap_data_validasi');
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

    public function filterDate($search, $limit, $start, $order_field, $order_ascdesc, $start_date, $end_date){
      if($search !=null or $search!=""){
        $this->db->like('id', $search); // Untuk menambahkan query where LIKE
        // $this->db->or_like('tanggalPelurusan', $search); // Untuk menambahkan query where OR LIKE
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
      }
      $this->db->select('*');
     
        $this->db->where('tanggalPelurusan>=', $start_date);
        $this->db->where('tanggalPelurusan<=', $end_date);
      
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

    public function count_filterDate($search, $start_date , $end_date ){
      if($search !=null or $search!=""){
        $this->db->like('id', $search); // Untuk menambahkan query where LIKE
        // $this->db->or_like('tanggalPelurusan', $search); // Untuk menambahkan query where OR LIKE
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
      }
      
      $this->db->select('*');
    
        $this->db->where('tanggalPelurusan>=', $start_date);
        $this->db->where('tanggalPelurusan<=', $end_date);
     
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
    
    public function jumlahRekapValidasi(){
      $query = $this->db->query('SELECT s.idSTO,s.namaSTO, COUNT(s.idSTO) as total
      FROM sto s
      JOIN rekap_data_odp r
      ON s.idSTO = r.idSTO
      WHERE r.namaODP IN (SELECT DISTINCT namaODP FROM rekap_data_validasi)
      GROUP BY s.idSTO
      ORDER BY s.namaSTO');
      return $query;
    }
  
  

  // 
/* End of file ODP_model.php */
/* Location: ./application/models/ODP_model.php */

}
