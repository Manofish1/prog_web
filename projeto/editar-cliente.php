<h1>Editar Cliente</h1>
<?php
$sql =  "SELECT * FROM cliente WHERE id_cliente=". $_REQUEST['id_cliente'];
 
$res = $conn->query($sql);

$row = $res->fetch_object();

?>
 <form action="?page=salvar-cliente" method="POST">
	<input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?php print $row->id_cliente; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_cliente" class="form-control" value="<?php print $row->nome_cliente; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_cliente" class="form-control" value="<?php print $row->email_cliente; ?>">
		</label>		
	</div>
	<div class="mb-3">
		<label>Telefone			
			<input type="text" name="telefone_cliente" class="form-control" value="<?php print $row->telefone_cliente; ?>">
		</label>		
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>