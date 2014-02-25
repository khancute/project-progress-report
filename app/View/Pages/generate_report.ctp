<?php

$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 10);

$PHPExcelObject = $this->PhpExcel->xls;
$sheet = $PHPExcelObject->getActiveSheet();
$sheet->setCellValue("A1", "No");
$sheet->mergeCells("A1:A2");
$sheet->setCellValue("B1", "Site ID NE");
$sheet->mergeCells("B1:B2");
$sheet->setCellValue("C1", "Site Name");
$sheet->mergeCells("C1:C2");
$sheet->setCellValue("D1", "Site ID FE");
$sheet->mergeCells("D1:D2");
$sheet->setCellValue("E1", "Site Name");
$sheet->mergeCells("E1:E2");
$sheet->setCellValue("F1", "NE-FE");
$sheet->mergeCells("F1:F2");
$sheet->setCellValue("G1", "SOW");
$sheet->mergeCells("G1:G2");
$sheet->setCellValue("H1", "PO Detail SOW");
$sheet->mergeCells("H1:H2");
$sheet->setCellValue("I1", "Project");
$sheet->mergeCells("I1:I2");
$sheet->setCellValue("J1", "PO Number Released");
$sheet->mergeCells("J1:J2");
$sheet->setCellValue("K1", "MOS");
$sheet->mergeCells("K1:M1");
$sheet->setCellValue("K2", "Status");
$sheet->setCellValue("L2", "Date");
$sheet->setCellValue("M2", "Team");
$sheet->setCellValue("N1", "Install");
$sheet->mergeCells("N1:P1");
$sheet->setCellValue("N2", "Status");
$sheet->setCellValue("O2", "Date");
$sheet->setCellValue("P2", "Team");
$sheet->setCellValue("Q1", "OA RFS");
$sheet->mergeCells("Q1:S1");
$sheet->setCellValue("Q2", "Status");
$sheet->setCellValue("R2", "Date");
$sheet->setCellValue("S2", "Team");
$sheet->setCellValue("T1", "Cross Connect");
$sheet->mergeCells("T1:U1");
$sheet->setCellValue("T2", "Status");
$sheet->setCellValue("U2", "Engineer");

$sheet->setCellValue("V1", "Swap");
$sheet->mergeCells("V1:X1");
$sheet->setCellValue("V2", "Status");
$sheet->setCellValue("W2", "Date");
$sheet->setCellValue("X2", "Team");

$sheet->setCellValue("Y1", "BBU Quantity");
$sheet->mergeCells("Y1:Y2");
$sheet->setCellValue("Z1", "Antenna & Hybrid Installation");
$sheet->mergeCells("Z1:Z2");

$sheet->setCellValue("AA1", "Dismantle");
$sheet->mergeCells("AA1:AC1");
$sheet->setCellValue("AA2", "Status");
$sheet->setCellValue("AB2", "Date");
$sheet->setCellValue("AC2", "Team");

$sheet->setCellValue("AD1", "Return Back");
$sheet->mergeCells("AD1:AF1");
$sheet->setCellValue("AD2", "Status");
$sheet->setCellValue("AE2", "Date");
$sheet->setCellValue("AF2", "Team");

$sheet->setCellValue("AG1", "Survey");
$sheet->mergeCells("AG1:AI1");
$sheet->setCellValue("AG2", "Status");
$sheet->setCellValue("AH2", "Date");
$sheet->setCellValue("AI2", "Team");

$sheet->setCellValue("AJ1", "LMD");
$sheet->mergeCells("AJ1:AL1");
$sheet->setCellValue("AJ2", "Status");
$sheet->setCellValue("AK2", "Finished Date");
$sheet->setCellValue("AL2", "Team");

$sheet->setCellValue("AM1", "Data");
$sheet->mergeCells("AM1:AO1");
$sheet->setCellValue("AM2", "Completeness");
$sheet->setCellValue("AN2", "Received Date");
$sheet->setCellValue("AO2", "Submitted Team");

$sheet->setCellValue("AP1", "SIR");
$sheet->mergeCells("AP1:AR1");
$sheet->setCellValue("AP2", "Status");
$sheet->setCellValue("AQ2", "Date");
$sheet->setCellValue("AR2", "Team");

$sheet->setCellValue("AS1", "TSSR");
$sheet->mergeCells("AS1:AU1");
$sheet->setCellValue("AS2", "Status");
$sheet->setCellValue("AT2", "Date");
$sheet->setCellValue("AU2", "Team");

$sheet->setCellValue("AV1", "ATP Doc");
$sheet->mergeCells("AV1:AW1");
$sheet->setCellValue("AV2", "Status");
$sheet->setCellValue("AW2", "Team");

$sheet->setCellValue("AX1", "BAST");
$sheet->mergeCells("AX1:AY1");
$sheet->setCellValue("AX2", "Status");
$sheet->setCellValue("AY2", "Date");

$sheet->setCellValue("AZ1", "ESAR 1");
$sheet->mergeCells("AZ1:BB1");
$sheet->setCellValue("AZ2", "Status");
$sheet->setCellValue("BA2", "Date");
$sheet->setCellValue("BB2", "Sent");

$sheet->setCellValue("BC1", "ESAR 2");
$sheet->mergeCells("BC1:BE1");
$sheet->setCellValue("BC2", "Status");
$sheet->setCellValue("BD2", "Date");
$sheet->setCellValue("BE2", "Sent");

$row = 3;
for($i=0; $i<count($data); $i++){
    $row = 3 + $i;
    $sheet->setCellValue("B".$row, $data[$i]['PowSow']['site_id_ne']);
    $sheet->setCellValue("C".$row, $data[$i]['PowSow']['site_name_ne']);
    $sheet->setCellValue("D".$row, $data[$i]['PowSow']['site_id_fe']);
    $sheet->setCellValue("E".$row, $data[$i]['PowSow']['site_name_fe']);
    $sheet->setCellValue("F".$row, $data[$i]['PowSow']['ne_fe']);
    $sheet->setCellValue("G".$row, $data[$i]['PowSow']['sow']);
    $sheet->setCellValue("H".$row, $data[$i]['PowSow']['po_detail_sow']);
    $sheet->setCellValue("I".$row, $data[$i]['PowSow']['project_code']);
    $sheet->setCellValue("J".$row, $data[$i]['PowSow']['po_number_released']);
    $sheet->setCellValue("K".$row, $data[$i]['PowSow']['mos_status']);
    $sheet->setCellValue("L".$row, $data[$i]['PowSow']['mos_date']);
    $sheet->setCellValue("M".$row, $data[$i]['PowSow']['mos_team']);
    $sheet->setCellValue("N".$row, $data[$i]['PowSow']['install_status']);
    $sheet->setCellValue("O".$row, $data[$i]['PowSow']['install_date']);
    $sheet->setCellValue("P".$row, $data[$i]['PowSow']['install_team']);
    $sheet->setCellValue("Q".$row, $data[$i]['PowSow']['oa_rfs_status']);
    $sheet->setCellValue("R".$row, $data[$i]['PowSow']['oa_rfs_date']);
    $sheet->setCellValue("S".$row, $data[$i]['PowSow']['oa_rfs_team']);
    $sheet->setCellValue("T".$row, $data[$i]['PowSow']['crossconnect_status']);
    $sheet->setCellValue("U".$row, $data[$i]['PowSow']['cross_connect_enginerr']);
    $sheet->setCellValue("V".$row, $data[$i]['PowSow']['swap_status']);
    $sheet->setCellValue("W".$row, $data[$i]['PowSow']['swap_date']);
    $sheet->setCellValue("X".$row, $data[$i]['PowSow']['swap_team']);
    $sheet->setCellValue("Y".$row, $data[$i]['PowSow']['bbu_quantity']);
    $sheet->setCellValue("Z".$row, $data[$i]['PowSow']['antenna_hybrid_installation']);
    $sheet->setCellValue("AA".$row, $data[$i]['PowSow']['dismantle_status']);
    $sheet->setCellValue("AB".$row, $data[$i]['PowSow']['dismantle_date']);
    $sheet->setCellValue("AC".$row, $data[$i]['PowSow']['dismantle_team']);
    $sheet->setCellValue("AD".$row, $data[$i]['PowSow']['return_back_status']);
    $sheet->setCellValue("AE".$row, $data[$i]['PowSow']['return_back_date']);
    $sheet->setCellValue("AF".$row, $data[$i]['PowSow']['return_back_team']);
    $sheet->setCellValue("AG".$row, $data[$i]['PowSow']['survey_status']);
    $sheet->setCellValue("AH".$row, $data[$i]['PowSow']['survey_date']);
    $sheet->setCellValue("AI".$row, $data[$i]['PowSow']['survey_team']);
    $sheet->setCellValue("AJ".$row, $data[$i]['PowSow']['lmd_status']);
    $sheet->setCellValue("AK".$row, $data[$i]['PowSow']['lmd_date']);
    $sheet->setCellValue("AL".$row, $data[$i]['PowSow']['lmd_team']);
    $sheet->setCellValue("AM".$row, $data[$i]['PowSow']['data_completeness']);
    $sheet->setCellValue("AN".$row, $data[$i]['PowSow']['data_received_date']);
    $sheet->setCellValue("AO".$row, $data[$i]['PowSow']['data_submitted_team']);
    
    $sheet->setCellValue("AP".$row, $data[$i]['PowSow']['sir_submit_status']);
    $sheet->setCellValue("AQ".$row, $data[$i]['PowSow']['sir_submit_date']);
    $sheet->setCellValue("AR".$row, $data[$i]['PowSow']['sir_submit_team']);
    
    $sheet->setCellValue("AS".$row, $data[$i]['PowSow']['tssr_submit_status']);
    $sheet->setCellValue("AT".$row, $data[$i]['PowSow']['tssr_submit_date']);
    $sheet->setCellValue("AU".$row, $data[$i]['PowSow']['tssr_submit_team']);
    
    $sheet->setCellValue("AV".$row, $data[$i]['PowSow']['atp_doc_submit_status']);
    $sheet->setCellValue("AW".$row, $data[$i]['PowSow']['atp_doc_submit_team']);
    
    $sheet->setCellValue("AX".$row, $data[$i]['PowSow']['bast_status']);
    $sheet->setCellValue("AY".$row, $data[$i]['PowSow']['bast_date']);
    
    $sheet->setCellValue("AZ".$row, $data[$i]['PowSow']['esar_1_status']);
    $sheet->setCellValue("BA".$row, $data[$i]['PowSow']['esar_1_submit_date']);
    $sheet->setCellValue("BB".$row, $data[$i]['PowSow']['esar_1_sent_to_hq']);
    
    $sheet->setCellValue("BC".$row, $data[$i]['PowSow']['esar_2_status']);
    $sheet->setCellValue("BD".$row, $data[$i]['PowSow']['esar_2_submit_date']);
    $sheet->setCellValue("BE".$row, $data[$i]['PowSow']['esar_2_sent_to_hq']);
}

$this->PhpExcel->output();
?>