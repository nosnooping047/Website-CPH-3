<?php


$error = '';

// Conexão com o banco de dados
$dsn = 'mysql:host=localhost;dbname=registros';
$username = 'phpmyadmin';
$password = 'H3C#w]E;b/`5Q3Pq';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o e-mail fornecido é válido
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Endereço de e-mail inválido';
    } else {
        // Verifique se o endereço de e-mail está registrado no banco de dados
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            $error = 'Endereço de e-mail não encontrado';
        } else {
            // Crie um token único para a senha do usuário e insira-o no banco de dados
            $token = bin2hex(random_bytes(32));
            $stmt = $pdo->prepare("UPDATE usuarios SET token = ? WHERE id = ?");
            $stmt->execute([$token, $user['id']]);

            // Envie um e-mail ao usuário com um link para redefinir a senha
            $resetLink = 'http://51.161.52.149/reset-password.php?token=' . $token;
            $to = $user['email'];
            $subject = 'LUCAS Recuperação de senha';
            $message = 'Clique neste link para redefinir sua senha: ' . $resetLink;
            $headers = 'From: noreply@example.com' . "\r\n" .
                'Reply-To: noreply@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            echo $to, $subject, $message, $headers;
            // Redirecionar o usuário para uma página de confirmação
            //header('Location: confirmation.php');
            exit;
        }
    }
}
