<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <script src="https://kit.fontawesome.com/2a6a87e578.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Adiciona a tag viewport para controlar a escala da página em dispositivos móveis -->
  <link rel="stylesheet" href="css/home_style.css">
  <title>Conexão Play-Hard</title>
</head>
<body>
  <!-- Menu -->
  <nav>
     <span class="logo">Conexão Play-Hard 3</span>
		<div>
		<?php if (!isset($_SESSION['usuario_id'])) { ?>
			<a href="./log.php" class="login"><i class="fa-solid fa-user"></i></i> Login</a>
			<a href="./reg.php" class="register"><i class="fa-solid fa-user-plus"></i> Registrar</a>
			<?php } else { ?>

				<a href="./perfil.php" class="register"><i class="fa-solid fa-user"></i></i> <?php echo $_SESSION['nome']; ?></a>
			<?php } ?>
		</div>
	</nav>
<!-- Conteúdo -->
<section class="content">
	<h1>Bem-vindo ao meu site!</h1>
	<p>Aqui você encontrará conteúdo de qualidade sobre diversos assuntos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam accumsan eget quam vel facilisis. Sed sit amet blandit libero. Nam eu lectus eu ex scelerisque consequat. Integer et quam sagittis, ornare velit id, luctus risus. Vestibulum vel ante eget sapien faucibus malesuada. Sed placerat pharetra lectus sit amet volutpat. Aenean quis sapien vel risus tristique viverra in vitae leo. In ultrices, libero a pellentesque placerat, quam metus commodo lorem, vitae elementum quam mauris quis urna. Donec in est commodo, tincidunt sapien at, consequat nibh. Vestibulum eget justo dui. Integer aliquam diam non mi iaculis, in ullamcorper urna imperdiet. Sed facilisis, libero id posuere iaculis, nisi ante bibendum tortor, sit amet volutpat orci ex sit amet turpis.</p>

	<?php if (isset($_SESSION['usuario_id'])) { ?><p style="color: lime;">SE VOCÊ ESTÁ VENDO ESSE TEXTO ÉSSA É UMA ÁREA PRIVADA E VOCÊ ESTÁ LOGADO E TEM ACESSO.</p><?php } ?>
</section>
  <!-- Rodapé -->
 

</body>
</html>