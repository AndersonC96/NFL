<?php
    header( 'Content-type: application/csv' );
    header( 'Content-Disposition: attachment; filename=relatorioTotal.csv' );
    header( 'Content-Transfer-Encoding: binary' );
    header( 'Pragma: no-cache');
    require_once '../config/conexao.php';
    $stmt = $con->prepare( 'SELECT * FROM usuario' );
    $stmt->execute();
    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $out = fopen( 'php://output', 'w' );
    foreach( $results as $result ){
        fputcsv( $out, $result );
    }
    fclose( $out );
?>
<?php
    $stmt = $con->prepare( 'SELECT * FROM classe' );
    $stmt->execute();
    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $out = fopen( 'php://output', 'w' );
    foreach( $results as $result ){
        fputcsv( $out, $result );
    }
    fclose( $out );
?>
<?php
    $stmt = $con->prepare( 'SELECT * FROM posicao' );
    $stmt->execute();
    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $out = fopen( 'php://output', 'w' );
    foreach( $results as $result ){
        fputcsv( $out, $result );
    }
    fclose( $out );
?>
<?php
    $stmt = $con->prepare( 'SELECT * FROM jogador' );
    $stmt->execute();
    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $out = fopen( 'php://output', 'w' );
    foreach( $results as $result ){
        fputcsv( $out, $result );
    }
    fclose( $out );
?>
<?php
    $stmt = $con->prepare( 'SELECT * FROM injurie' );
    $stmt->execute();
    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $out = fopen( 'php://output', 'w' );
    foreach( $results as $result ){
        fputcsv( $out, $result );
    }
    fclose( $out );
?>