<?php
// Arquivo responsável por listar todos os livros cadastrados no banco de dados.
?>
<h1>Listar Livros</h1>
<hr>
<p>
    <a href="?page=cadastrar-livro" class="btn btn-primary mb-3">
        + Cadastrar Novo Livro
    </a>
</p>

<?php
// 1. Consulta SQL para buscar livros e o nome da editora E autor correspondente.
// A variável $conn é a conexão do 'config.php'
$sql = "SELECT 
            l.id, 
            l.titulo, 
            l.ano_publicacao,
            e.nome AS nome_editora,
            a.nome AS nome_autor -- Novo campo
        FROM 
            livros l
        INNER JOIN 
            editoras e ON l.editora_id = e.id
        INNER JOIN 
            autores a ON l.autor_id = a.id -- Nova junção
        ORDER BY 
            l.titulo ASC";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    // 2. Se houver resultados, inicia a tabela
    print "<p class='alert alert-info'>Encontrados <b>$qtd</b> resultado(s).</p>";
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Título</th>";
    print "<th>Autor</th>";
    print "<th>Editora</th>";
    print "<th>Ano</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";

    // 3. Loop para exibir cada linha de resultado
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->titulo . "</td>";
        print "<td>" . $row->nome_autor . "</td>"; // Exibe o nome do Autor
        print "<td>" . $row->nome_editora . "</td>";
        print "<td>" . $row->ano_publicacao . "</td>";
        print "<td>
                <button onclick=\"location.href='?page=editar-livro&id=".$row->id."';\" class='btn btn-warning btn-sm'>
                    Editar
                </button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir este livro?')){location.href='?page=salvar-livro&acao=excluir&id=".$row->id."';}else{false;}\" class='btn btn-danger btn-sm'>
                    Excluir
                </button>
               </td>";
        print "</tr>";
    }

    print "</tbody>";
    print "</table>";
} else {
    // 4. Se não houver resultados
    print "<p class='alert alert-warning'>Nenhum livro cadastrado.</p>";
}
?>