<?php
defined('CONTROL') or die('Acesso negado!');
if (empty($_SESSION['usuario'])) {
    header('Location: index.php?rota=login');
    exit;
}
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
</head>

<body>
  <h2>Bem-vinda, <?= htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8') ?>!</h2>
  <p>Você está logada. Esta é uma página protegida.</p>
  <a href="index.php?rota=logout">Sair</a>

</body>
</html>
