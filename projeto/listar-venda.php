<h1>Listar Vendas</h1>
<?php
$sql = "SELECT 
            v.id_venda,
            v.data_venda,
            v.valor_venda,
            c.nome_cliente,
            f.nome_funcionario,
            m.nome_modelo
        FROM venda v
        INNER JOIN cliente c 
            ON v.cliente_id_cliente = c.id_cliente
        INNER JOIN funcionario f 
            ON v.funcionario_id_funcionario = f.id_funcionario
        INNER JOIN modelo m 
            ON v.modelo_id_modelo = m.id_modelo";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Data</th>";
    print "<th>Valor</th>";
    print "<th>Cliente</th>";
    print "<th>Funcionário</th>";
    print "<th>Modelo</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>{$row->id_venda}</td>";
        print "<td>" . date("d/m/Y", strtotime($row->data_venda)) . "</td>";
        print "<td>R$ " . number_format($row->valor_venda, 2, ',', '.') . "</td>";
        print "<td>{$row->nome_cliente}</td>";
        print "<td>{$row->nome_funcionario}</td>";
        print "<td>{$row->nome_modelo}</td>";
        print "<td>
                <button class='btn btn-success'
                    onclick=\"location.href='?page=editar-venda&id_venda={$row->id_venda}'\">
                    Editar
                </button>

                <button class='btn btn-danger'
                    onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                        location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';
                    }else{false;}\">
                    Excluir
                </button>
               </td>";
        print "</tr>";
    }

    print "</table>";
}else{
    print "<p>Não encontrou resultado</p>";
}
?>