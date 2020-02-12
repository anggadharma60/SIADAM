<?php

require 'excel/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Laporan extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->model('ODP_model');
}
public function export()
{
// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
// Set document properties
$spreadsheet->getProperties()
    ->setCreator('SIADAM - Telkom Witel')
    ->setLastModifiedBy('SIADAM - Telkom Witel')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

$spreadsheet->getActiveSheet(0)
->setCellValue('A1', 'ID ODP')
->setCellValue('B1', 'ID NOSS')
->setCellValue('C1', 'index ODP')
->setCellValue('D1', 'Nama ODP')
->setCellValue('E1', 'ftp')
->setCellValue('F1', 'Latitude')
->setCellValue('G1', 'Longitude')
->setCellValue('H1', 'Cluster Name')
->setCellValue('I1', 'Cluster Status')
->setCellValue('J1', 'Available')
->setCellValue('K1', 'Used')
->setCellValue('L1', 'RSV')
->setCellValue('M1', 'RSK')
->setCellValue('N1', 'Total')
->setCellValue('O1', 'Regional')
->setCellValue('P1', 'Witel')
->setCellValue('Q1', 'Datel')
->setCellValue('R1', 'STO')
->setCellValue('S1', 'Info ODP')
->setCellValue('T1', 'Update Date')
;


$i=4; 
$query = $this->ODP_model->getDataODP();
print_r($query);
//  {
//     $rowNum= $n  + 1;
//     $spreadsheet->setActiveSheetIndex(0)
// 	->setCellValue('A'.$i, $row['idODP'])
// 	->setCellValue('B'.$i, $row['idNOSS'])
// 	->setCellValue('C'.$i, $row['indexODP'])
// 	->setCellValue('D'.$i, $row['namaODP'])
// 	->setCellValue('E'.$i, $row['ftp'])
// 	->setCellValue('F'.$i, $row['latitude'])
// 	->setCellValue('G'.$i, $row['longitude'])
// 	->setCellValue('H'.$i, $row['clusterName'])
// 	->setCellValue('I'.$i, $row['clusterStatus'])
// 	->setCellValue('J'.$i, $row['avai'])
// 	->setCellValue('K'.$i, $row['used'])
// 	->setCellValue('L'.$i, $row['rsv'])
// 	->setCellValue('M'.$i, $row['rsk'])
// 	->setCellValue('N'.$i, $row['total'])
// 	->setCellValue('O'.$i, $row['namaRegional'])
// 	->setCellValue('P'.$i, $row['namaWitel'])
// 	->setCellValue('Q'.$i, $row['namaDatel'])
// 	->setCellValue('R'.$i, $row['namaSTO'])
// 	->setCellValue('S'.$i, $row['infoODP'])
// 	->setCellValue('T'.$i, $row['updateDate']);
// 	$i++;
// }
}
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// // print_r($result->result());
// $filename = 'sample-'.time().'.xlsx';
// ob_clean();
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment;filename="'.$filename. '"');
// header('Cache-Control: max-age=0');
// //if use IE 9
// header('Cache-Control: max-age=1');

// // If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
}