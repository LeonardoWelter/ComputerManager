<?php
require_once "valida_login.php";
require_once 'criar_computador.php';
require_once 'status.php';
?>


<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cadastrar computador - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/novo_computador.css">
</head>

<body>

<?php
require_once 'navbar.php';
?>
<div class="content update">
	<h2>Create Contact</h2>
    <form action="criar_computador.php" method="post">
        <label for="id">ID</label>
		<input type="text" name="id" placeholder="0" value="auto" id="id" disabled>

        <label for="patrimonial">Patrimonial</label>
        <input type="number" name="patrimonial" placeholder="000001" id="patrimonial">

        <label for="marca">Marca</label>
		<input type="text" name="marca" placeholder="Lenovo" id="marca">

        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" placeholder="M92p" id="modelo">

        <label for="cpu">CPU</label>
        <input type="text" name="cpu" placeholder="i7 3700" id="cpu">

		<label for="ram">RAM</label>
		<input type="text" name="ram" placeholder="16GB DDR3 1333MHz" id="ram">

		<label for="hdd">HDD</label>
		<input type="text" name="hdd" placeholder="1TB 7200RPM" id="hdd">

		<label for="fonte">Fonte</label>
		<input type="text" name="fonte" placeholder="400W" id="fonte">

		<label for="mac">MAC</label>
		<input type="text" name="mac" placeholder="0000:0000:0000:0000" id="mac">

		<label for="nome">Nome</label>
		<input type="text" name="nome" placeholder="PC-REI-18872" id="nome">

		<label for="os">OS</label>
		<input type="text" name="os" placeholder="Windows 10" id="os">

        <input type="submit" value="Criar">
    </form>
</div>
</body>
</html>