<?php
//Incluimos el fichero de conexion
//require("../Modelo/Conexion.php");

//Incluimos la libreria PDF
require('Vista/fpdf/fpdf.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        // Add logo to page
        $this->Image('Vista/img/3.png',15,7.5,15);

        // Set font family to Arial bold 
        $this->SetFont('Arial','B',13);

        // Move to the right
        $this->Cell(80);

        // Header
        $this->Cell(95,10,'Comprobante de cita',1,0,'C');

        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {

        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Pag. ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Instantiation of FPDF class
$pdf = new PDF('L','mm','A4');

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
////////////////////////////////////////////////////////////////////////////////

// // Declaramos el ancho de las columnas
// //$pdf->SetLeftMargin(55);
// $w = array(38, 45, 35);
// //          N   A  D    E   G   E  P  LGN  ESC

//Declaramos el encabezado de la tabla
// $pdf->Cell(38,12,'Nombre',1);
// $pdf->Ln();
// $pdf->Cell(45,12,'Apellido',1);
// $pdf->Ln();
// $pdf->Cell(35,12,'Documento',1);
// $pdf->Cell(15,12,'Edad',1);
// $pdf->Cell(30,12,'Genero',1);
// $pdf->Cell(18,12,'Estatura',1);
// $pdf->Cell(17,12,'Peso',1);
// $pdf->Cell(45,12,'Lugar de Nacimiento',1);
// $pdf->Cell(35,12,'Estado Civil',1);
// //$pdf->Cell(50,12,utf8_decode('Contraseña'),1);


// $pdf->Ln();

// Mostrar contenido Tabla
foreach($result as $row) {
 $pdf->Cell(0,6,'nombre:');
 $pdf->Ln(12);
 $pdf->Cell(0,4,$row['pacnombres']);
 $pdf->Ln(12);
 $pdf->Cell(0,6,'apellido:');
 $pdf->Ln(12);
 $pdf->Cell(0,6,$row['pacapellidos']);
 $pdf->Ln(12);
 $pdf->Cell(0,6,'documento:');
 $pdf->Ln(12);
 $pdf->Cell(0,6,$row['pacidentificacion']);
 $pdf->Ln(12);
 $pdf->Cell(0,6,'fecha de nacimiento:');
 $pdf->Ln(12);
 $pdf->Cell(0,6,$row['pacfechadenacimiento']);
 $pdf->Ln(12);
 $pdf->Cell(0,6,'genero:');
 $pdf->Ln(12);
 $pdf->Cell(0,6,$row['pacsexo']);

    }

// $pdf -> output();
?>