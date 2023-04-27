<?php
session_start(); // Inicia a sessão

// Define configurações de segurança
ini_set('display_errors', 0); // Não exibir erros para o usuário
ini_set('log_errors', 1); // Registrar erros em um arquivo de log

// Verificar se o usuário já está logado
if (isset($_SESSION["usuario_id"])) {
	// Redirecionar para a página de perfil
	header("Location: index.php");
	exit();
}

// Conexão segura ao banco de dados
$servername = "localhost";
$username = "phpmyadmin";
$password = "H3C#w]E;b/`5Q3Pq";
$dbname = "registros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error); // Finaliza a execução se houver erro de conexão
}

if (isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prevenir ataques XSS
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $senha = filter_var($_POST["senha"], FILTER_SANITIZE_STRING);

    // Preparar a declaração SQL para evitar ataques de injeção de SQL
    $stmt = $conn->prepare("SELECT id, senha, nome FROM usuarios WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $linha = $resultado->fetch_assoc();
        $hash = $linha["senha"];

        if (password_verify($senha, $hash)) {
            $_SESSION["usuario_id"] = $linha["id"];
            $_SESSION["nome"] = $linha["nome"];
            $_SESSION["email"] = $email;
            $_SESSION["mensagem"] = "Login bem-sucedido!";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["mensagem"] = "Senha incorreta! Por favor, tente novamente.";
            header("Location: log.php");
            exit();
        }
    } else {
        $_SESSION["mensagem"] = "Email não encontrado! Por favor, tente novamente.";
        header("Location: log.php");
        exit();
    }
}

$conn->close();
?>