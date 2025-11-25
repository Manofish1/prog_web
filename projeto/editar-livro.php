<?php
// Arquivo responsável por exibir o formulário de edição de um livro,
// pré-preenchido com dados existentes e listas de Autores e Editoras.

// A variável $conn é assumida como a conexão ativa do 'config.php'

// 1. Recebe o ID do livro via URL
$livro_id = (int)$_REQUEST["id"];

// 2. Busca dados do Livro (Tabela: livros)
$sql_livro = "SELECT * FROM livros WHERE id = {$livro_id}";
$res_livro = $conn->query($sql_livro);

if (!$res_livro || $res_livro->num_rows === 0) {
    print "<div class='alert alert-danger'>Livro não encontrado.</div>";
    return;
}
$livro = $res_livro->fetch_object();

// 3. Busca todos os Autores (Tabela: autores)
$sql_autores = "SELECT * FROM autores ORDER BY nome";
$res_autores = $conn->query($sql_autores);

// 4. Busca todas as Editoras (Tabela: editoras)
$sql_editoras = "SELECT * FROM editoras ORDER BY nome";
$res_editoras = $conn->query($sql_editoras);

?>

<h1>Editar Livro: <?php echo $livro->titulo; ?></h1>
<hr>

<!-- O formulário envia os dados para 'salvar-livro.php' com a ação 'editar' -->
<form action="?page=salvar-livro" method="POST">
    <!-- Campos ocultos para a lógica -->
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $livro->id; ?>">

    <!-- Título do Livro -->
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input 
            type="text" 
            name="titulo" 
            id="titulo" 
            class="form-control" 
            value="<?php echo $livro->titulo; ?>" 
            required
        >
    </div>

    <!-- Ano de Publicação -->
    <div class="mb-3">
        <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
        <input 
            type="number" 
            name="ano_publicacao" 
            id="ano_publicacao" 
            class="form-control" 
            min="1800" 
            max="<?php echo date('Y'); ?>" 
            value="<?php echo $livro->ano_publicacao; ?>" 
            required
        >
    </div>

    <!-- Autor -->
    <div class="mb-3">
        <label for="autor_id" class="form-label">Autor</label>
        <select name="autor_id" id="autor_id" class="form-select" required>
            <option value="">Selecione o Autor</option>
            <?php
            if ($res_autores && $res_autores->num_rows > 0) {
                while ($autor = $res_autores->fetch_object()) {
                    // Seleciona o autor atual do livro
                    $selected = ($autor->id == $livro->autor_id) ? 'selected' : '';
                    print "<option value='{$autor->id}' {$selected}>{$autor->nome}</option>";
                }
            } else {
                print "<option disabled>Nenhum autor cadastrado.</option>";
            }
            ?>
        </select>
    </div>

    <!-- Editora (Tabela: editoras) -->
    <div class="mb-3">
        <label for="editora_id" class="form-label">Editora</label>
        <select name="editora_id" id="editora_id" class="form-select" required>
            <option value="">Selecione a Editora</option>
            <?php
            if ($res_editoras && $res_editoras->num_rows > 0) {
                while ($editora = $res_editoras->fetch_object()) {
                    // Seleciona a editora atual do livro
                    $selected = ($editora->id == $livro->editora_id) ? 'selected' : '';
                    print "<option value='{$editora->id}' {$selected}>{$editora->nome}</option>";
                }
            } else {
                print "<option disabled>Nenhuma editora cadastrada.</option>";
            }
            ?>
        </select>
    </div>

    <!-- Botões -->
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="?page=listar-livro" class="btn btn-secondary">Cancelar</a>
    </div>
</form>