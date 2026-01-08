<?php
/**
 * Controlador de Relatórios
 * Faz a ponte entre os filtros HTML e a Procedure Oracle
 */

$config = require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_ini = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $modelo   = $_POST['modelo'];

    // Conexão via OCI8 (Extensão recomendada em 2019)
    $conn = oci_connect(
        $config['database_frota']['user'],
        $config['database_frota']['pass'],
        $config['database_frota']['tns']
    );

    if (!$conn) {
        die("Falha na conexão com o servidor de dados Tora.");
    }

    // Preparando chamada da Procedure PL/SQL
    $sql = "BEGIN SP_GERAR_RELATORIO_TORA(:p_inicio, :p_fim, :p_modelo, :p_cursor); END;";
    $stmt = oci_parse($conn, $sql);

    // Binds
    $cursor = oci_new_cursor($conn);
    oci_bind_by_name($stmt, ":p_inicio", $data_ini);
    oci_bind_by_name($stmt, ":p_fim", $data_fim);
    oci_bind_by_name($stmt, ":p_modelo", $modelo);
    oci_bind_by_name($stmt, ":p_cursor", $cursor, -1, OCI_B_CURSOR);

    oci_execute($stmt);
    oci_execute($cursor);

    // Aqui entraria a biblioteca PhpSpreadsheet para converter o cursor em Excel
    // Exemplo: header('Content-Type: application/vnd.ms-excel');
}
