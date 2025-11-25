<?php
// Arquivo responsável por listar todas as editoras cadastradas.
?>
<h1>Listar Editoras</h1>
<hr>
<p>
    <a href="?page=cadastrar-editora" class="btn btn-primary mb-3">
        + Cadastrar Nova Editora
    </a>
</p>

<?php
// 1. Consulta SQL para buscar todas as editoras
// A variável $conn é a conexão do 'config.php'
$sql = "SELECT id, nome FROM editoras ORDER BY nome ASC";
$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    // 2. Se houver resultados, inicia a tabela
    print "<p class='alert alert-info'>Encontrados <b>$qtd</b> resultado(s).</p>";
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";

    // 3. Loop para exibir cada linha de resultado
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>
                <button onclick=\"location.href='?page=editar-editora&id=".$row->id."';\" class='btn btn-warning btn-sm'>
                    Editar
                </button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir esta editora?')){location.href='?page=salvar-editora&acao=excluir&id=".$row->id."';}else{false;}\" class='btn btn-danger btn-sm'>
                    Excluir
                </button>
               </td>";
        print "</tr>";
    }

    print "</tbody>";
    print "</table>";
} else {
    // 4. Se não houver resultados
    print "<p class='alert alert-warning'>Nenhuma editora cadastrada.</p>";
}
?>