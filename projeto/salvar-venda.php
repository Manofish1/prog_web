<h1>salvar venda</h1>
<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $data_venda = $_POST['data_venda'];
        $valor_venda = $_POST['valor_venda'];
        $cliente = $_POST['cliente_id_cliente'];
        $funcionario = $_POST['funcionario_id_funcionario'];
        $modelo = $_POST['modelo_id_modelo'];

        $sql = "INSERT INTO venda (
                    data_venda, 
                    valor_venda, 
                    cliente_id_cliente, 
                    funcionario_id_funcionario, 
                    modelo_id_modelo
                ) 
                VALUES (
                    '{$data_venda}',
                    '{$valor_venda}',
                    '{$cliente}',
                    '{$funcionario}',
                    '{$modelo}'
                )";

        $res = $conn->query($sql);

        if($res == true){
            print "<script>alert('Venda cadastrada com sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar venda!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
    break;

    case 'editar':
        $data_venda = $_POST['data_venda'];
        $valor_venda = $_POST['valor_venda'];
        $cliente = $_POST['cliente_id_cliente'];
        $funcionario = $_POST['funcionario_id_funcionario'];
        $modelo = $_POST['modelo_id_modelo'];

        $sql = "UPDATE venda SET
                    data_venda='{$data_venda}',
                    valor_venda='{$valor_venda}',
                    cliente_id_cliente='{$cliente}',
                    funcionario_id_funcionario='{$funcionario}',
                    modelo_id_modelo='{$modelo}'
                WHERE id_venda=".$_REQUEST['id_venda'];

        $res = $conn->query($sql);

        if($res == true){
            print "<script>alert('Venda editada com sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Erro ao editar venda!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
    break;

    case 'excluir':
        $sql = "DELETE FROM venda WHERE id_venda=".$_REQUEST['id_venda'];

        $res = $conn->query($sql);

        if($res == true){
            print "<script>alert('Venda excluída com sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Erro ao excluir venda!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
    break;

}
?>