<?php

require('fpdf/fpdf.php');
require('../config/config.php');

$pdf = new FPDF();
$pdf->AddPage();


//encabezado
// x y texto
$pdf->SetFont('Arial','B',12);
$pdf->Text(30, 10, 'Title');

//Line break

