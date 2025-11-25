<?php
// Arquivo responsável por exibir o formulário preenchido com os dados da editora
// a ser editada.

// A variável $conn é assumida como a conexão ativa do 'config.php'

// 1. Recebe o ID da editora via URL
$id = (int)$_REQUEST["id"];

// 2. Query para buscar os dados da editora (Tabela: editoras)
$sql = "SELECT * FROM editoras WHERE id = {$id}";
$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $row = $res->fetch_object();
} else {
    print "<div class='alert alert-danger'>Editora não encontrada.</div>";
    return;
}
?>

<h1>Editar Editora</h1>
<hr>

<!-- O formulário envia os dados para 'salvar-editora.php' com a ação 'editar' -->
<form action="?page=salvar-editora" method="POST">
    <!-- Campo oculto para indicar que a ação é de edição -->
    <input type="hidden" name="acao" value="editar">
    <!-- Campo oculto para enviar o ID do registro que está sendo editado -->
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

    <!-- Nome da Editora -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Editora</label>
        <input 
            type="text" 
            name="nome" 
            id="nome" 
            class="form-control" 
            value="<?php echo $row->nome; ?>" 
            required
        >
    </div>

    <!-- Botão de Envio -->
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="?page=listar-editora" class="btn btn-secondary">Cancelar</a>
    </div>
</form>