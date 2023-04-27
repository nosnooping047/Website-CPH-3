<?php
	session_start();
	if (!isset($_SESSION['usuario_id'])) {
    	header("Location: index.php");
    	exit();
	}
	ob_start();
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Perfil do Usuário</title>
			<link rel="icon" type="image/x-icon" href="favicon.ico">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<link rel="stylesheet" href="css/logout_style.css">
		</head>
	<body>
		<form action="processa_logout.php" method="post">
			<h2>Perfil do Usuário</h2>
			<label for="nome">Nome: <?php echo $_SESSION['nome']; ?></label>
			<label for="email">E-mail: <?php echo $_SESSION['email']; ?></label>
			<input type="submit" value="Logout">
		</form>
	</body>
</html>
