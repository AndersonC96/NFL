<?php
    include '../pdf/mpdf.php';
    define('FPDF_FONTPATH', 'font/');
    $host="localhost";
    $user="root";
    $pass="";
    $banco="nfl";
    $conexao=mysqli_connect($host,$user,$pass,$banco);
    $sql=("SELECT * FROM posicao");
    $busca = mysqli_query($conexao, $sql);
    $pdf = new mPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(140,10,('Relatório de Posição'),0,0,"C");
    $pdf->Image('bat.png',10,5,18,21,'PNG');
    $pdf->ln(20);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(7, 7,'id',1,0,"C");
    $pdf->Cell(35, 7,'nome',1,0,"C");
    $pdf->Cell(20, 7,'id_classe',1,0,"C");
    $pdf->ln(); //nenhum espaçamentos entre linhas
    while($resultado = mysqli_fetch_array($busca)){
        $pdf->Cell(7, 7, $resultado['id'],1,0,"C");
        $pdf->Cell(35, 7, $resultado['nome'],1,0,"C");
        $pdf->Cell(20, 7, $resultado['id_classe'],1,0,"C");
        $pdf->Ln();
    }
    $pdf->Output();
?>