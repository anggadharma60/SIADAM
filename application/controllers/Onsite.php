<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require 'excel/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
// End load library phpspreadsheet
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Onsite
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Onsite extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check admin buat fungsi_helper
		check_onsite();
		// check_daman();
		// check_hddaman();
		// check_ondesk();
		// check_onsite();
		// check_dava();

		$this->load->model('Datel_model');
		$this->load->model('ODP_model');
		$this->load->model('OLT_model');
		$this->load->model('Pegawai_model');
		$this->load->model('Regional_model');
		$this->load->model('SpecOLT_model');
		$this->load->model('STO_model');
		$this->load->model('Validasi_model');
		$this->load->model('Witel_model');
		$this->load->library('form_validation');
	}

	// Halaman Awal Onsite
	public function index()
	{
		check_not_login();
		$this->template->load('template/template_Onsite', 'dashboard_home');
	}

	public function editProfile()
	{

		$id = $this->session->userdata['idPegawai'];
		$this->form_validation->set_rules('namaPegawai', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|min_length[0]|max_length[30]|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|callback_username_check|min_length[5]|max_length[20]|trim');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'alpha_numeric|min_length[5]|max_length[16]|trim');
			$this->form_validation->set_rules(
				'passconf',
				'Konfirmasi Password',
				'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules(
				'passconf',
				'Konfirmasi Password',
				'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}


		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
		$this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
		$this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->pegawai_model->getDataPegawai($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template_Onsite', 'template/edit_profile', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Onsite');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Pegawai_model->editDataPegawai($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Onsite');
		}
	}

	//Start Dashboard
	public function chart()
	{
		$data['ODP'] = $this->ODP_model->jumlahRekapODP();
		$ODP = $data['ODP'];
		$data['idSTO'][] = null;
		// $data['kodeSTO'] = null;
		$data['namaSTO'] = null;
		$data['grand_total'] = null;
		$data['totalODP'] = null;
		$data['total'] = null;
		$data['totalValidasi'] = null;

		if ($ODP != null) {
			foreach ($ODP->result() as $rekapODP) {

				$data['idSTO'][] = $rekapODP->idSTO;
				// $data['kodeSTO'][] = $rekapODP->kodeSTO;
				$data['namaSTO'][] = $rekapODP->namaSTO;
				$data['grand_total'][] = $rekapODP->grand_total;
				$data['totalODP'] += $rekapODP->grand_total;
			}
		}

		$sto = $this->STO_model->getDataSTO();
		$totalSTO = $sto->num_rows();
		if ($totalSTO != null) {
			$data['totalSTO'] = $totalSTO;
		}
		if ($sto != null) {
			foreach ($sto->result() as $sto) {
				$data['namaSTO'][] = $sto->namaSTO;
			}
		}

		// $data['totalODP'] = array_sum($data['grand_total']);
		// $data['totalSTO'] = $ODP->num_rows();


		// print_r($data['totalODP']->row());

		$data['validasi'] = $this->Validasi_model->jumlahRekapValidasi()->result();
		$validasi = $data['validasi'];
		foreach ($validasi as $rekapValidasi) {
			$data['total'][] = $rekapValidasi->total;
			$data['totalValidasi'] += $rekapValidasi->total;
		}
		// $data['totalValidasi'] = array_sum($data['total']);
		// $data['totalValidasi'] = $this->Validasi_model->jumlahRekapValidasi();
		// print_r($data['totalValidasi']->result());
		$data['chart'] = json_encode($data);
		// print_r($data['chart']);


		$this->template->load('template/template_Onsite', 'dashboard/chart', $data);

		// $this->template->load('template/template_Onsite', 'dashboard/chart');
	}

	public function filtering()
	{
		$this->template->load('template/template_Onsite', 'dashboard/filtering');
	}
	//End Dashboard

	// Start Menu Pegawai 
	public function getPegawai()
	{
		$data['row'] = $this->Pegawai_model->getDataPegawai();
		$this->template->load('template/template_Onsite', 'pegawai/pegawai_data', $data);
	}
	// End Menu Pegawai

	// Start Menu Regional
	public function getRegional()
	{
		$data['row'] = $this->Regional_model->getDataRegional();
		$this->template->load('template/template_Onsite', 'regional/regional_data', $data);
	}

	function regional_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM regional WHERE namaRegional = '$post[namaRegional]' AND idRegional != '$post[idRegional]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('regional_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	// End Menu Regional

	// Start Menu Witel 
	public function getWitel()
	{
		$data['row'] = $this->Witel_model->getDataWitel();
		$this->template->load('template/template_Onsite', 'witel/witel_data', $data);
	}
	// End Menu Witel

	// Start Menu Datel
	public function getDatel()
	{
		$data['row'] = $this->Datel_model->getDataDatel();
		$this->template->load('template/template_Onsite', 'datel/datel_data', $data);
	}

	// End Menu Datel

	// Start Menu STO
	public function getSTO()
	{
		$data['row'] = $this->STO_model->getDataSTO();
		$this->template->load('template/template_Onsite', 'sto/sto_data', $data);
	}

	function sto_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM sto WHERE kodeSTO = '$post[kodeSTO]' AND idSTO != '$post[idSTO]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('sto_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// End Menu STO

	// Start Menu Specification OLT 
	public function getSpecOLT()
	{
		$data['row'] = $this->SpecOLT_model->getDataSpecOLT();
		$this->template->load('template/template_Onsite', 'specolt/specolt_data', $data);
	}

	function spek_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM specification_olt WHERE namaSpecOLT = '$post[namaSpecOLT]' AND idSpecOLT != '$post[idSpecOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('spek_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	//End Spek OLT

	// START ODP
	public function getODP()
	{
		$data['row'] = $this->ODP_model->getDataODP();
		$this->template->load('template/template_Onsite', 'odp/odp_data', $data);
	}

	public function viewListODP()
	{
		$this->template->load('template/template_Onsite', 'odp/odp_data');
	}

	public function loadDataODP()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->ODP_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->ODP_model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->ODP_model->count_filter($search); // Panggil fungsi count_filter pada SiswaModel

		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}

	public function checkFileValidation($string)
	{
		$file_mimes = array(
			'text/x-comma-separated-values',
			'text/comma-separated-values',
			'application/octet-stream',
			'application/vnd.ms-excel',
			'application/x-csv',
			'text/x-csv',
			'text/csv',
			'application/csv',
			'application/excel',
			'application/vnd.msexcel',
			'text/plain',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		);
		if (isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
			if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
				return true;
			} else {
				$this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
				return false;
			}
		} else {
			$this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
			return false;
		}
	}

	function noss_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM specification_olt WHERE namaSpecOLT = '$post[namaSpecOLT]' AND idSpecOLT != '$post[idSpecOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('spek_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function index_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_odp WHERE indexODP= '$post[indexODP]' AND idODP != '$post[idODP]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('index_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function odp_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_odp WHERE namaODP = '$post[namaODP]' AND idODP != '$post[idODP]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('odp_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// END ODP

	// START OLT
	public function getOLT()
	{
		$data['row'] = $this->OLT_model->getDataOLT();
		$this->template->load('template/template_Onsite', 'olt/olt_data', $data);
	}

	function ipolt_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_olt WHERE ipOLT = '$post[ipOLT]' AND idOLT != '$post[idOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('ipolt_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function idlogicaldevice_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_olt WHERE idLogicalDevice = '$post[idLogicalDevice]' AND idOLT != '$post[idOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('idlogicaldevice_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}
// END OLT

	// Start Menu Kelola Validasi
	public function getValidasi()
	{
		$data['row'] = $this->Validasi_model->getDataValidasi();
		$this->template->load('template/template_Onsite', 'validasi/validasi_data');
	}

	public function viewListValidasi()
	{
		$this->template->load('template/template_Onsite', 'validasi/validasi_data');
	}

	public function loadDataValidasi()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->Validasi_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->Validasi_model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->Validasi_model->count_filter($search); // Panggil fungsi count_filter pada SiswaModel

		$callback2 = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		header('Content-Type: application/json');
		echo json_encode($callback2); // Convert array $callback ke json
	}

	public function listHDDaman()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->Pegawai_model->getDataHDDaman($searchTerm)->result();
		echo json_encode($response);
	}

	public function listDava()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->Pegawai_model->getDataDava($searchTerm)->result();
		echo json_encode($response);
	}

	public function listNamaODP()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->ODP_model->getNamaODP($searchTerm)->result();
		echo json_encode($response);
	}

	public function listNamaOLT()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->OLT_model->getNamaOLT($searchTerm)->result();
		echo json_encode($response);
	}

	


	public function exportValidasi()
	{
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		$Excel_writer = new Xlsx($spreadsheet);

		foreach (range('A1', 'T1') as $test) {
			$spreadsheet->getActiveSheet()->getColumnDimension($test)->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setCellValue('A1', '');
		$activeSheet->setCellValue('A2', 'TANGGAL PELURUSAN');
		$activeSheet->setCellValue('A3', '');
		$activeSheet->mergeCells('B1:C1');
		$activeSheet->setCellValue('B1', 'AMIJA');
		$activeSheet->setCellValue('B2', 'ONDESK');
		$activeSheet->setCellValue('C2', 'ONSITE');
		$activeSheet->setCellValue('B3', 'nama ondesk');
		$activeSheet->setCellValue('C3', 'nama tim(teknisi1-teknisi2)');
		$activeSheet->setCellValue('D1', 'ODP');
		$activeSheet->setCellValue('E1', '');
		$activeSheet->setCellValue('F1', '');
		$activeSheet->setCellValue('G1', '');
		$activeSheet->setCellValue('G2', 'KOORDINAT ODP');
		$activeSheet->setCellValue('G3', 'latitude, longitude');
		$activeSheet->setCellValue('D2', 'NAMA ODP');
		$activeSheet->setCellValue('D3', 'ODP3digit');
		$activeSheet->setCellValue('E2', 'NOTE');
		$activeSheet->setCellValue('E3', 'sumber data,note kendala,beda nama dilapangan');
		$activeSheet->setCellValue('F2', 'QR ODP');
		$activeSheet->setCellValue('F3', '');
		$activeSheet->setCellValue('H1', 'OLT');
		$activeSheet->setCellValue('H2', 'NAMA OLT (IP OLT)');
		$activeSheet->setCellValue('H3', 'nama OLT (IP OLT)');
		$activeSheet->setCellValue('I1', '');
		$activeSheet->setCellValue('I2', 'PORT OLT');
		$activeSheet->setCellValue('I3', 'PORT OLT');
		$activeSheet->mergeCells('J1:K1');
		$activeSheet->setCellValue('J1', 'ODP');
		$activeSheet->setCellValue('J2', 'TOTAL IN ODP');
		$activeSheet->setCellValue('J3', 'jumlah IN');
		$activeSheet->setCellValue('K2', 'KAPASITAS ODP');
		$activeSheet->setCellValue('K3', 'kapasitas ODP');
		$activeSheet->mergeCells('L1:M1');
		$activeSheet->setCellValue('L1', 'PORT OUT SPLITTER');
		$activeSheet->setCellValue('L2', 'PORT OUT SPLITTER');
		$activeSheet->setCellValue('L3', 'ODP');
		$activeSheet->setCellValue('M2', 'QR OUT SPLITTER');
		$activeSheet->setCellValue('M3', 'QR utk port outsplitter');
		$activeSheet->setCellValue('N1', '');
		$activeSheet->setCellValue('N2', 'PORT');
		$activeSheet->setCellValue('N3', 'isi Port ODP');
		$activeSheet->setCellValue('O1', '');
		$activeSheet->setCellValue('O2', 'STATUS');
		$activeSheet->setCellValue('O3', 'ISI/NO DETECT/IDLE/KOSONG');
		$activeSheet->setCellValue('P1', '');
		$activeSheet->setCellValue('P2', 'ONU');
		$activeSheet->setCellValue('P3', 'ONU OLT');
		$activeSheet->setCellValue('Q1', '');
		$activeSheet->setCellValue('Q2', 'SN');
		$activeSheet->setCellValue('Q3', 'SN ONT yg terdeteksi');
		$activeSheet->setCellValue('R1', '');
		$activeSheet->setCellValue('R2', 'SERVICE');
		$activeSheet->setCellValue('R3', 'SERVICE NUMBER');
		$activeSheet->setCellValue('S1', '');
		$activeSheet->setCellValue('S2', 'QR DROPCORE');
		$activeSheet->setCellValue('S3', 'QR yg menempel pada cable ties dropcore');
		$activeSheet->setCellValue('T1', '');
		$activeSheet->setCellValue('T2', 'NO URUT DROPCORE');
		$activeSheet->setCellValue('T3', 'hasil urut dropcore');
		$activeSheet->setCellValue('U1', 'DASHBOARD FF');
		$activeSheet->setCellValue('U2', 'FLAG OLT & PORT');
		$activeSheet->setCellValue('U3', 'dicek oleh ondesk pelurusan');
		$activeSheet->setCellValue('V1', 'UIM (SDI)');
		$activeSheet->setCellValue('V2', 'CONNECTIVITY ODP TO OLT');
		$activeSheet->setCellValue('V3', 'dikerjakan apabila ODP ke OLT belum lurus (lihat kolom sebelah kiri)');
		$activeSheet->mergeCells('W1:AA1');
		$activeSheet->setCellValue('W1', 'UIM NON CONNECTIVITY (HD DAMAN)');
		$activeSheet->setCellValue('W2', 'ODP - ONT');
		$activeSheet->setCellValue('W3', 'data ODP: koordinat, okupansi, fttx dropcable ke ONT');
		$activeSheet->setCellValue('X2', 'RFS');
		$activeSheet->setCellValue('X3', 'STP+port,SP+port, service trail, CPE+target,vlan');
		$activeSheet->setCellValue('Y2', 'NOTE');
		$activeSheet->setCellValue('Y3', 'diisi jika ada catatan khusus/anomali');
		$activeSheet->setCellValue('Z2', 'TANGGAL UPDATE UIM');
		$activeSheet->setCellValue('Z3', 'diisi tanggal ketika HD Daman mengupdate ke UIM');
		$activeSheet->setCellValue('AA2', 'UPDATER UIM');
		$activeSheet->setCellValue('AA3', 'nama HD daman yg mengerjakan');
		$activeSheet->mergeCells('AB1:AE1');
		$activeSheet->setCellValue('AB1', 'UPDATER DAVA');
		$activeSheet->setCellValue('AB2', 'QR ODP');
		$activeSheet->setCellValue('AB3', 'inputkan QR ODP (menu resource capture)');
		$activeSheet->setCellValue('AC2', 'QR OUT SPLITTER');
		$activeSheet->setCellValue('AC3', 'inputkan QR out splitter (menu resource capture > capture > capacity > masuk ke port nya)');
		$activeSheet->setCellValue('AD2', 'QR DROPCORE');
		$activeSheet->setCellValue('AD3', 'inputkan QR dropcore (menu service capture > masuk ke nomer service-nya)');
		$activeSheet->setCellValue('AE2', 'UPDATER DAVA');
		$activeSheet->setCellValue('AE3', 'nama yang melakukan input ketiga jenis QR di 3 kolom sebelah kiri');
		$activeSheet->setCellValue('AF1', '');
		$activeSheet->setCellValue('AF2', '');
		$activeSheet->setCellValue('AF3', '');


		// $query = $db->query("SELECT * FROM rekap_data_odp ORDER BY idODP DESC");
		$query = $this->Validasi_model->getDataValidasi()->result();
		$i = 4;
		foreach ($query as $row) {
			$newDateA = date("d/m/Y", strtotime($row->tanggalPelurusan));
			$activeSheet->setCellValue('A' . $i, $newDateA);
			$activeSheet->setCellValue('B' . $i, $row->ondesk);
			$activeSheet->setCellValue('C' . $i, $row->onsite);
			$activeSheet->setCellValue('D' . $i, $row->namaODP);
			$activeSheet->setCellValue('E' . $i, $row->noteODP);
			$activeSheet->setCellValue('F' . $i, $row->QRODP);
			$activeSheet->setCellValue('G' . $i, $row->koordinatODP);
			$activeSheet->setCellValue('H' . $i, $row->hostname);
			$activeSheet->setCellValue('I' . $i, $row->portOLT);
			$activeSheet->setCellValue('J' . $i, $row->totalIN);
			$activeSheet->setCellValue('K' . $i, $row->kapasitasODP);
			$activeSheet->setCellValue('L' . $i, $row->portOutSplitter);
			$activeSheet->setCellValue('M' . $i, $row->QRPortOutSplitter);
			$activeSheet->setCellValue('N' . $i, $row->portODP);
			$activeSheet->setCellValue('O' . $i, $row->statusPortODP);
			$activeSheet->setCellValue('P' . $i, $row->ONU);
			$activeSheet->setCellValue('Q' . $i, $row->serialNumber);
			$activeSheet->setCellValue('R' . $i, $row->serviceNumber);
			$activeSheet->setCellValue('S' . $i, $row->QRDropCore);
			$activeSheet->setCellValue('T' . $i, $row->noteUrut);
			$activeSheet->setCellValue('U' . $i, $row->flagOLTPort);
			$activeSheet->setCellValue('V' . $i, $row->ODPtoOLT);
			$activeSheet->setCellValue('W' . $i, $row->ODPtoONT);
			$activeSheet->setCellValue('X' . $i, $row->RFS);
			$activeSheet->setCellValue('Y' . $i, $row->noteHDDaman);
			$newDateB = date("d/m/Y", strtotime($row->updateDateUIM));
			$activeSheet->setCellValue('Z' . $i, $newDateB);
			$activeSheet->setCellValue('AA' . $i, $row->updaterUIM);
			$activeSheet->setCellValue('AB' . $i, $row->noteQRODP);
			$activeSheet->setCellValue('AC' . $i, $row->noteQROutSplitter);
			$activeSheet->setCellValue('AD' . $i, $row->noteQRDropCore);
			$activeSheet->setCellValue('AE' . $i, $row->updaterDava);
			$i++;
		}

		$filename = 'RekapValidasi.xlsx';


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename);
		header('Cache-Control: max-age=0');
		$Excel_writer->save('php://output');
	}

	public function filterDate()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
		$input = $this->input->post(null, TRUE);
		$start_date = $input["start_date"];
		$end_date = $input["end_date"];
		// print_r($start_date);
		// print_r($end_date);

		$sql_total = $this->Validasi_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->Validasi_model->filterDate($search, $limit, $start, $order_field, $order_ascdesc, $start_date, $end_date); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->Validasi_model->count_filterDate($search, $start_date, $end_date); // Panggil fungsi count_filter pada SiswaModel
		// print_r($search);
		// print_r($sql_filter);
		$callback3 = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);


		header('Content-Type: application/json');
		echo json_encode($callback3); // Convert array $callback ke json
	}
	//End Kelola Validasi

}

/* End of file Onsite.php */
/* Location: ./application/controllers/Onsite.php */
