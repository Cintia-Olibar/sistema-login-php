<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
define('CONTROL', true);


$rota = empty($_SESSION['usuario']) ? 'login' : ($_GET['rota'] ?? 'home');

$rotas = [
    'login' => __DIR__ . '/login.php',
    'home'  => __DIR__ . '/home.php',
    'logout'=> __DIR__ . '/logout.php'
];

if (!array_key_exists($rota, $rotas)) {
    http_response_code(403);
    exit('Acesso negado.');
}

require $rotas[$rota];
