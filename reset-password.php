<?php
require_once('config.php');

// Verifica se o token foi enviado via GET
if (!isset($_GET['token'])) {
    header('Location: index.php');
    exit();
}

// Verifica se o token é válido
$token = $_GET['token'];
$stmt = $pdo->prepare("SELECT * FROM password_reset WHERE token = ?");
$stmt->execute([$token]);
$user = $stmt->fetch();

// Se o token não for válido, redireciona para a página de erro
if (!$user) {
    header('Location: error.php');
    exit();
}

// Se o formulário de redefinição de senha foi enviado
if (isset($_POST['submit'])) {
    // Verifica se as senhas digitadas são iguais
    if ($_POST['password'] != $_POST['confirm_password']) {
        $error_msg = "As senhas não coincidem";
    } else {
        // Atualiza a senha do usuário no banco de dados
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$password, $user['user_id']]);

        // Remove o token de recuperação de senha do banco de dados
        $stmt = $pdo->prepare("DELETE FROM password_reset WHERE token = ?");
        $stmt->execute([$token]);

        // Redireciona para a página de login
        header('Location: log.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
</head>
<body>
    <h1>Redefinir Senha</h1>
    <?php if (isset($error_msg)) echo "<p>$error_msg</p>" ?>
    <form method="post">
        <label for="password">Nova Senha:</label>
        <input type="password" name="password" required>
        <br>
        <label for="confirm_password">Confirmar Nova Senha:</label>
        <input type="password" name="confirm_password" required>
        <br>
        <input type="submit" name="submit" value="Redefinir Senha">
    </form>
</body>
</html>