<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../config/conexao.php';

require_auth();

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=relatorioTotal.csv');
header('Pragma: no-cache');

$out = fopen('php://output', 'w');

if ($out === false) {
    exit;
}

$tabelas = ['usuario', 'classe', 'posicao', 'jogador', 'injurie', 'sb'];

foreach ($tabelas as $tabela) {
    fputcsv($out, [strtoupper($tabela)]);

    $stmt = $con->query("SELECT * FROM {$tabela}");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        fputcsv($out, array_keys($results[0]));
        foreach ($results as $result) {
            fputcsv($out, $result);
        }
    }

    fputcsv($out, []);
}

fclose($out);
?>