<?php

require('fpdf/fpdf.php');
require('../config/config.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40, 10, iconv('UTF-8', 'windows-1252', 'Habla ñaño'));
$pdf->Output();