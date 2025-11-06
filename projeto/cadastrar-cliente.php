<h1>Cadastrar Cliente</h1>
<form action="?page=salvar-cliente" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_cliente"
			class="form_control">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_cliente" class="form-control">
		</label>		
	</div>
	<div class="mb-3">
		<label>Telefone			
			<input type="text" name="telefone_cliente" class="form-control">
		</label>		
	</div>
	<div>
		<button type="submit" class="btn btn-primary">
	</div>
</form>