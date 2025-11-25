<h1>Cadastrar Nova Editora</h1>
<hr>
<!-- O formulário envia os dados para 'salvar-editora.php' através da rota "?page=salvar-editora" -->
<form action="?page=salvar-editora" method="POST">
    <!-- Campo oculto para indicar que a ação é de cadastro -->
    <input type="hidden" name="acao" value="cadastrar">

    <!-- Nome da Editora -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Editora</label>
        <input type="text" name="nome" id="nome" class="form-control" required>
    </div>

    <!-- Botão de Envio -->
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cadastrar Editora</button>
    </div>
</form>