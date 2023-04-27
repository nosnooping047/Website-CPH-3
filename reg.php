<?php
session_start();
error_reporting(0);

// Verificar se o usuário já está logado
if (isset($_SESSION["usuario_id"])) {
	// Redirecionar para a página de perfil
	header("Location: perfil.php");
	exit();
}

// Verificar se há uma mensagem na sessão
if (isset($_SESSION["mensagem"])) {
	// Exibir a mensagem na div
	echo "<script>document.getElementById('notificacao').style.display = 'block';</script>";
	echo "<p>" . $_SESSION["mensagem"] . "</p>";
	
	// Remover a mensagem da sessão
	unset($_SESSION["mensagem"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Cadastro</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/register_style.css">
</head>

<body>
	<form action="processa_cadastro.php" method="post">
		<h2>Cadastro</h2>
		<label for="nome">Nome:</label>
		<input type="text" name="nome" required>
		<label for="email">E-mail:</label>
		<input type="email" name="email" required>
		<label for="senha">Senha:</label>
		<input type="password" name="senha" required>
		<label for="conf_senha">Repita sua senha:</label>
		<input type="password" name="conf_senha" required>
		<input type="submit" value="Cadastrar">
	</form>
    <div class="login">
        <a href="log.php">Já tem uma conta? Faça login aqui.</a>
    </div>
	<div id="notificacao">
	<?php
		if (isset($_SESSION["mensagem"])) {
			echo "<p>" . $_SESSION["mensagem"] . "</p>";
		}
	?>
	</div>
</body>
</html>