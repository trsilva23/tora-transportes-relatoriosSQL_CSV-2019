<?php
/**
 * Tora Transportes Ltda - Sistema de Relatórios
 * Configuração de ambientes Oracle (Ambiente Local)
 */

return [
    'database_frota' => [
        'user'     => 'FROTA_ADMIN',
        'pass'     => 'tora_2019_op',
        'tns'      => '127.0.0.1/XE',
        'charset'  => 'AL32UTF8'
    ],
    'database_rh' => [
        'user'     => 'RH_CONTROL',
        'pass'     => 'tora_2019_adm',
        'tns'      => '127.0.0.1/XE',
        'charset'  => 'AL32UTF8'
    ],
    'app' => [
        'versao' => '1.2.0',
        'debug'  => false
    ]
];
