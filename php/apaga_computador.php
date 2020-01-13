<?php
require_once "valida_login.php";
require_once 'apagar_computador.php';
?>


<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Remover computador - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/apaga_computador.css">
</head>

<body>

<?php
require_once 'navbar.php';
require_once 'status.php';
?>

<div class="content delete">
	<h2>Remover computador ID: <?= $device['id']?></h2>
		<p>Tem certeza que deseja remover o computador ID: <?= $device['id']?>?</p>
		<div class="yesno">
			<a href="apagar_computador.php?id=<?=$device['id']?>&confirm=yes">Sim</a>
			<a href="apagar_computador.php?id=<?=$device['id']?>&confirm=no">Não</a>
		</div>
</div>
</body>
</html>