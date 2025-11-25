<h1>Cadastrar Novo Autor</h1>
<hr>
<!-- O formulário envia os dados para 'salvar-autor.php' através da rota "?page=salvar-autor" -->
<form action="?page=salvar-autor" method="POST">
    <!-- Campo oculto para indicar que a ação é de cadastro -->
    <input type="hidden" name="acao" value="cadastrar">

    <!-- Nome do Autor (Único campo restante) -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" name="nome" id="nome" class="form-control" required>
    </div>

    <!-- Botão de Envio -->
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cadastrar Autor</button>
    </div>
</form>