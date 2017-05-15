<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Julius Palcong
 * @copyright   Copyright (c) 2017, Cagayan Provincial Capitol.
 * @license     
 * @link        http://www.cagayan.gov.ph
 * @since       Version 1.0
 * @filesource
 */

class Exports {

	public function excel( $data ) {

		require (APPPATH . 'third_party/Classes/PHPExcel.php');
		require (APPPATH . 'third_party/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator();
		$objPHPExcel->getProperties()->setTitle();
		$objPHPExcel->getProperties()->setSubject();
		$objPHPExcel->getProperties()->setDescription();

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ITEM ID');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'ITEM CODE');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'ITEM NAME');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ITEM DESCIPRTION');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ITEM DATE CREATED');

		// start with row number 2(Not in array type that starts with the number 0)
		$rowIndex = 2;

		foreach ($data as $row) {
				
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowIndex, $row['id']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowIndex, $row['code']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowIndex, $row['name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowIndex, $row['description']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowIndex, date( "Y-m-d h:i:s A", strtotime($row['date']) ) );

			$rowIndex++;
		}
		$directory = "/Libraries/Videos/";
		$fileName = "Consigment-Export-" . date('Y-m-d-H-i-s') . ".xlsx";

		$objPHPExcel->getActiveSheet()->setTitle("Exported Items");

		// Set password against the spreadsheet file
		$objPHPExcel->getSecurity()->setLockWindows(true);
		$objPHPExcel->getSecurity()->setLockStructure(true);
		$objPHPExcel->getSecurity()->setWorkbookPassword('123');

		$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

		$objPHPExcel->getActiveSheet()->getProtection()->setPassword('123');

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $fileName . '"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');
		exit;

	}

}