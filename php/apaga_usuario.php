<?php
require_once "valida_login.php";
require_once 'apagar_usuario.php';
?>


<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Remover computador - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/apaga_usuario.css">
</head>

<body>

<?php
require_once 'navbar.php';
require_once 'status.php';
?>

<div class="content delete">
	<h2>Remover usuário ID: <?=$user['id']?></h2>
	<p>Quer mesmo remover o usuário ID:<?=$user['id']?>?</p>
		<div class="yesno">
			<a href="apagar_usuario.php?id=<?=$user['id']?>&confirm=yes">Sim</a>
			<a href="apagar_usuario.php?id=<?=$user['id']?>&confirm=no">Não</a>
		</div>

</div>
</body>
</html>