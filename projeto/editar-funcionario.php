
<h1>editar funcionario</h1>
<?php
$sql =  "SELECT * FROM funcionario WHERE id_funcionario=". $_REQUEST['id_funcionario'];
 
$res = $conn->query($sql);

$row = $res->fetch_object();

?>
 <form action="?page=salvar-funcionario" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
    <input type="hidden" name="id_funcionario" value="<?php print $row->id_funcionario; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_funcionario" class="form-control" value="<?php print $row->nome_funcionario; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_funcionario" class="form-control" value="<?php print $row->email_funcionario; ?>">
		</label>		
	</div>
	<div class="mb-3">
		<label>Telefone			
			<input type="text" name="telefone_funcionario" class="form-control" value="<?php print $row->telefone_funcionario; ?>">
		</label>		
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>
