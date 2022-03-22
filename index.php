<?php

// Incluindo o autoload do Composer para carregar a biblioteca
require_once 'vendor/autoload.php';

// Incluindo a classe
require_once 'src/BackupDatabase.php';
require_once 'config.php';
// Como a geração do backup pode ser demorada, retiramos
// o limite de execução do script
set_time_limit(0);

// Utilizando a classe para gerar um backup na pasta 'backups'
// e manter os últimos dez arquivos
$backup = new BackupDatabase('backups', 10);
/**
 * Define as informações de conexão com o banco de dados
 *
 * @param string $host
 * @param string $database
 * @param string $username
 * @param string $password
 */
$backup->setDatabase(HOST, DATABASE, USERNAME, PASSWORD);
$backup->generate();
