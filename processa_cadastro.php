<?php
session_start();
ini_set('display_errors', 0);
ini_set('log_errors', 1);

if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$servername = 'localhost';
$username = 'phpmyadmin';
$password = 'H3C#w]E;b/`5Q3Pq';
$dbname = 'registros';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $senha = htmlspecialchars($_POST['senha'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $conf_senha = htmlspecialchars($_POST['conf_senha'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE email = ? OR nome = ?');
    $stmt->bind_param('ss', $email, $nome);
    $stmt->execute();
    $result = $stmt->get_result();

    if (empty($senha)) {
        $_SESSION['mensagem'] = 'Senha não pode ser nula!';
        header('Location: reg.php');
        exit();
    }

    if ($senha !== $conf_senha) {
        $_SESSION['mensagem'] = 'As senhas não coincidem!';
        header('Location: reg.php');
        exit();
    }

    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $nome, $email, $senha_criptografada);

    if ($result->num_rows > 0) {
        $_SESSION['mensagem'] = 'Email ou nome de usuário já cadastrado!';
        header('Location: reg.php');
        exit();
    }

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Cadastro realizado com sucesso!';
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['mensagem'] = 'Erro ao cadastrar: ' . $conn->error;
        header('Location: reg.php');
        exit();
    }
}

$conn->close();
