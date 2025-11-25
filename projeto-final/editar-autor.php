<?php
// Arquivo responsável por exibir o formulário preenchido com os dados do autor
// a ser editado.

// 1. Recebe o ID do autor via URL
$id = (int)$_REQUEST["id"];

// 2. Query para buscar os dados do autor (Tabela: autores)
$sql = "SELECT * FROM autores WHERE id = {$id}";
$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $row = $res->fetch_object();
} else {
    print "<div class='alert alert-danger'>Autor não encontrado.</div>";
    return;
}
?>

<h1>Editar Autor</h1>
<hr>

<!-- O formulário envia os dados para 'salvar-autor.php' com a ação 'editar' -->
<form action="?page=salvar-autor" method="POST">
    <!-- Campo oculto para indicar que a ação é de edição -->
    <input type="hidden" name="acao" value="editar">
    <!-- Campo oculto para enviar o ID do registro que está sendo editado -->
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

    <!-- Nome do Autor -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Autor</label>
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
        <a href="?page=listar-autor" class="btn btn-secondary">Cancelar</a>
    </div>
</form>