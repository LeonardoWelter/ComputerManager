<?php
require_once "valida_login.php";
require_once 'apagar_computador.php';
?>


<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/computadores.css">
</head>

<body>

<?php
require_once 'navbar.php';
require_once 'status.php';
?>

<div class="content delete">
	<h2>Delete Contact #<?=$device['id']?></h2>
	<?php if ($msg): ?>
		<p><?=$msg?></p>
	<?php else: ?>
		<p>Are you sure you want to delete contact #<?=$device['id']?>?</p>
		<div class="yesno">
			<a href="apagar_computador.php?id=<?=$device['id']?>&confirm=yes">Yes</a>
			<a href="apagar_computador.php?id=<?=$device['id']?>&confirm=no">No</a>
		</div>
	<?php endif; ?>
</div>
</body>
</html>