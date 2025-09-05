<?php
defined('CONTROL') or die('Acesso negado!');

session_destroy();

header('Location: index.php?rota=login');
exit;
