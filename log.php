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
	<title>Formulário de Login</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://www.google.com/recaptcha/enterprise.js?render=6Ldf26wlAAAAAOfhe_0wLVDGGBPVOEKRyEUzVmCI"></script>
	<link rel="stylesheet" href="css/login_style.css">
	<script>
grecaptcha.enterprise.ready(function() {
    grecaptcha.enterprise.execute('6Ldf26wlAAAAAOfhe_0wLVDGGBPVOEKRyEUzVmCI', {action: 'login'}).then(function(token) {
       ...
    	});
	});
</script>
</head>
<body>
	<form action="processa_login.php" method="post">
			<h2>Login</h2>
			<label for="email">E-mail:</label>
			<input type="email" name="email" required>
			<label for="senha">Senha:</label>
			<input type="password" name="senha" required>
			<input type="submit" value="Entrar">
			<button type="button" onclick="window.location.href='reg.php'" class="register-btn">Criar uma conta</button>
	</form>
	<!--div class="rec">
        <a href="rec.php">Não consegue entrar?</a>
    </div-->
	<div id="notificacao">
	<?php
		if (isset($_SESSION["mensagem"])) {
			echo "<p>" . $_SESSION["mensagem"] . "</p>";
		}
	?>
	</div>	
</body>
</html>
