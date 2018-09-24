<?php
session_start();
require ('fpdf.php');
$date = $_SESSION['pdate'];
$date = date('d/m/Y', strtotime($date));


class PDF_reciept extends FPDF {
    function _construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
        $this->FPDF($orientation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
        $this->SetAutoPageBreak(true, $margin);
    }

    function Header() {
        $this->SetFont('Arial', 'B', 20);
        $this->SetFillColor(6, 9, 84);
        $this->SetTextColor(225);
        $this->Cell(0, 30, "EZshare", 0, 1, 'C', true);
    }

    function Footer() {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(0,-60);
        $this->Cell(0, 20, "Thank you for shopping at EZshare", 'T', 0, 'C');
    }

    function PriceTable($products, $prices) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(0.2);
        $this->Cell(70, 15, "Item Description", 'LTR', 0, 'C', true);
        $this->Cell(50, 15, "Price", 'LTR', 1, 'C', true);

        $this->Cell(70, 10, $products, 1, 0, 'L', true);
        $this->Cell(50, 10, '$' . $prices, 1, 1, 'R', true);

        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
        $fill = false;

    }
}

$pdf = new PDF_reciept();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(50);
$pdf->Cell(40, 13, "Customer");
$pdf->SetFont('Arial', '');
$pdf->Cell(30, 13, $_SESSION['firstName']. ' ' .$_SESSION['lastName']);

$pdf->SetX(100);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(25, 13, 'Date');
$pdf->SetFont('Arial', '');
$pdf->Cell(10, 13, $date, 0, 1);

$pdf->SetX(50);
$pdf->SetFont('Arial', 'I');
$pdf->Cell(200, 6, $_SESSION['email'], 0, 2);
$pdf->Cell(200, 6, $_SESSION['phone'], 0, 2);
$pdf->Cell(200, 6, $_POST['postal_code'] . ' ' . $_POST['country']);
$pdf->Ln(20);

$pdf->PriceTable($_SESSION['product'], $_SESSION['price']);

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor(1, 162, 232);
$pdf->Ln(30);
$pdf->Write(13, "Ezshareau.com", "mailto:Ezshareau.com");


$pdf->Output('reciept.pdf', 'F');?>

<!doctype html>
<html lang="en">
<head>
  <title>Reciept</title>
</head>
<body>
    <h2>Thank you!</h2>
    <p>Thank you for your order. Please <a href='reciept.pdf'>download your reciept</a>. 
    </p>
</body>

</html>