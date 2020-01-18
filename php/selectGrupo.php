<?=
	'<div class="form-group">
		<label for="cadastroGrupo"><i class="fas fa-users mr-1"></i></i>Grupo</label>
		<select id="cadastroGrupo" name="grupo" class="custom-select" required>
			<option value="" disabled>Selecione o grupo</option>
			<option value="admin" <?= if(isset($user[\'grupo\'])) {	$user[\'grupo\'] == \'admin\' ? \' selected="selected"\' : \'\'; } ?>>Administrador</option>
			<option value="user" <?= if(isset($user[\'grupo\'])) {	$user[\'grupo\'] == \'user\' ? \' selected="selected"\' : \'\'; } ?>>Usuário</option>
		</select>
	</div>'
?>
