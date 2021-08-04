<?php
    include '../pdf/mpdf.php';
    define('FPDF_FONTPATH', 'font/');
    $host="localhost";
    $user="root";
    $pass="";
    $banco="nfl";
    $conexao=mysqli_connect($host,$user,$pass,$banco);
    $sql=("SELECT * FROM classe");
    $busca = mysqli_query($conexao, $sql);
    $pdf = new mPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(140,10,('Relatório de Classe'),0,0,"C");
    $pdf->Image('bat.png',10,5,18,21,'PNG');
    $pdf->ln(20);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(5, 7,'id',1,0,"C");
    $pdf->Cell(35, 7,'Nome',1,0,"C");
    $pdf->ln();
    while($resultado = mysqli_fetch_array($busca)){
        $pdf->Cell(5, 7, $resultado['id'],1,0,"C");
        $pdf->Cell(35, 7, $resultado['nome'],1,0,"C");
        $pdf->Ln();
    }
    $pdf->Output();
?>