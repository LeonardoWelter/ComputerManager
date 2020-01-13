<?php
require_once "valida_login.php";
require_once 'listar_computadores.php';
require_once 'status.php';

if(!isset($_SESSION)) {
	session_start();
}
?>


<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Computadores - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/computadores.css">
</head>

<body>

<?php
require_once 'navbar.php';
?>
<?php
if(isset($_SESSION['status'])) {
    echo mostrarToastr($_SESSION['status']);
}
?>

<div class="content read">
    <h2>Computadores</h2>
    <a href="novo_computador.php" class="create-contact">Adicionar computador</a>
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>Patrimonial</td>
            <td>Marca</td>
            <td>Modelo</td>
            <td>CPU</td>
            <td>Nome</td>
            <td>OS</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($devices as $device): ?>
            <tr>
                <td><?=$device['id']?></td>
                <td><?=$device['patrimonial']?></td>
                <td><?=$device['marca']?></td>
                <td><?=$device['modelo']?></td>
                <td><?=$device['cpu']?></td>
                <td><?=$device['nome']?></td>
                <td><?=$device['os']?></td>
                <td class="actions">
                    <a href="atualiza_computador.php?id=<?=$device['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="apaga_computador.php?id=<?=$device['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>