<h1>Cadastrar Novo Livro</h1>
<hr>
<!-- O formulário envia os dados para 'salvar-livro.php' através da rota "?page=salvar-livro" -->
<form action="?page=salvar-livro" method="POST">
    <!-- Campo oculto para indicar que a ação é de cadastro -->
    <input type="hidden" name="acao" value="cadastrar">

    <!-- Título do Livro -->
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" required>
    </div>

    <!-- Ano de Publicação -->
    <div class="mb-3">
        <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" min="1000" max="<?php echo date('Y'); ?>" required>
    </div>

    <!-- Seleção de Autor (NOVO CAMPO) -->
    <div class="mb-3">
        <label for="autor_id" class="form-label">Autor</label>
        <select name="autor_id" id="autor_id" class="form-select" required>
            <option value="" selected disabled>Selecione um Autor</option>
            <?php
                // Busca a lista de autores para popular o dropdown
                $sql_autores = "SELECT id, nome FROM autores ORDER BY nome ASC";
                $res_autores = $conn->query($sql_autores);

                if ($res_autores && $res_autores->num_rows > 0) {
                    while ($row_autor = $res_autores->fetch_assoc()) {
                        echo "<option value='{$row_autor['id']}'>{$row_autor['nome']}</option>";
                    }
                } else {
                    echo "<option value='' disabled>Nenhum autor cadastrado. Cadastre um autor primeiro.</option>";
                }
            ?>
        </select>
    </div>

    <!-- Seleção de Editora -->
    <div class="mb-3">
        <label for="editora_id" class="form-label">Editora</label>
        <select name="editora_id" id="editora_id" class="form-select" required>
            <option value="" selected disabled>Selecione uma Editora</option>
            <?php
                // Busca a lista de editoras para popular o dropdown
                $sql_editoras = "SELECT id, nome FROM editoras ORDER BY nome ASC";
                $res_editoras = $conn->query($sql_editoras);

                if ($res_editoras && $res_editoras->num_rows > 0) {
                    while ($row_editora = $res_editoras->fetch_assoc()) {
                        echo "<option value='{$row_editora['id']}'>{$row_editora['nome']}</option>";
                    }
                } else {
                    echo "<option value='' disabled>Nenhuma editora cadastrada. Cadastre uma editora primeiro.</option>";
                }
            ?>
        </select>
    </div>

    <!-- Botão de Envio -->
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
    </div>
</form>