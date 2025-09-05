<?php
defined('CONTROL') or die('Acesso negado!');

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = $_POST['senha'] ?? '';

    if ($usuario === '' || $senha === '') {
        $erro = 'Usuário e senha são obrigatórios!';
    } else {
        $usuarios = require __DIR__ . '/../inc/usuarios.php';

        $logado = false;

        foreach ($usuarios as $user) {
            if ($user['usuario'] === $usuario && password_verify($senha, $user['senha'])) {
                $_SESSION['usuario'] = $usuario;
                $logado = true;
                break;
            }
        }

        if ($logado) {
            header('Location: index.php?rota=home');
            exit;
        }
        $erro = 'Usuário ou senha inválidos!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
</head>
<body>
<h3>Login</h3>
<form action="index.php?rota=login" method="post" autocomplete="off">
    <div>
        <label for="usuario">Usuário (email)</label>
        <input type="email" name="usuario" id="usuario" required>
    </div>
    <div>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>
    </div>
    <button type="submit">Entrar</button>
</form>

<?php if (!empty($erro)) : ?>
  <p style="color:red"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>
</body>
</html>
