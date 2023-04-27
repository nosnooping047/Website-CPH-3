<!DOCTYPE html>
	<html>
		<head>
			<title>Problemas para acessar a conta?</title>
			<link rel="icon" type="image/x-icon" href="favicon.ico">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<link rel="stylesheet" href="css/recuperar_style.css">
		</head>
	<body>
	<?php if ($error): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php else: ?>
        <form action="recuperar_senha.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Enviar">
        </form>
    <?php endif; ?>
	</body>
</html>
