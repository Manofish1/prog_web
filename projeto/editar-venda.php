<h1>Editar Venda</h1>

<?php
$sql = "SELECT * FROM venda WHERE id_venda=".$_REQUEST['id_venda'];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row->id_venda; ?>">

    <!-- CLIENTE -->
    <div class="mb-3">
        <label>Cliente
            <select name="cliente_id_cliente" class="form-control">
                <option value="">-= Escolha =-</option>
                <?php
                    $sql_c = "SELECT * FROM cliente";
                    $res_c = $conn->query($sql_c);
                    if($res_c->num_rows > 0){
                        while($cli = $res_c->fetch_object()){
                            $selected = ($row->cliente_id_cliente == $cli->id_cliente) ? "selected" : "";
                            print "<option value='{$cli->id_cliente}' {$selected}>{$cli->nome_cliente}</option>";
                        }
                    }else{
                        print "<option>Não há clientes cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <!-- FUNCIONÁRIO -->
    <div class="mb-3">
        <label>Funcionário
            <select name="funcionario_id_funcionario" class="form-control">
                <option value="">-= Escolha =-</option>
                <?php
                    $sql_f = "SELECT * FROM funcionario";
                    $res_f = $conn->query($sql_f);
                    if($res_f->num_rows > 0){
                        while($fun = $res_f->fetch_object()){
                            $selected = ($row->funcionario_id_funcionario == $fun->id_funcionario) ? "selected" : "";
                            print "<option value='{$fun->id_funcionario}' {$selected}>{$fun->nome_funcionario}</option>";
                        }
                    }else{
                        print "<option>Não há funcionários cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <!-- MODELO -->
    <div class="mb-3">
        <label>Modelo
            <select name="modelo_id_modelo" class="form-control">
                <option value="">-= Escolha =-</option>
                <?php
                    $sql_m = "SELECT mo.id_modelo, mo.nome_modelo, ma.nome_marca
                              FROM modelo mo
                              LEFT JOIN marca ma ON mo.marca_id_marca = ma.id_marca";
                    $res_m = $conn->query($sql_m);
                    if($res_m->num_rows > 0){
                        while($mod = $res_m->fetch_object()){
                            $label = $mod->nome_modelo;
                            if(!empty($mod->nome_marca)){
                                $label = "{$mod->nome_marca} - {$label}";
                            }
                            $selected = ($row->modelo_id_modelo == $mod->id_modelo) ? "selected" : "";
                            print "<option value='{$mod->id_modelo}' {$selected}>{$label}</option>";
                        }
                    }else{
                        print "<option>Não há modelos cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <!-- DATA -->
    <div class="mb-3">
        <label>Data da Venda
            <input type="date" name="data_venda" class="form-control" 
                   value="<?php print $row->data_venda; ?>" required>
        </label>
    </div>

    <!-- VALOR -->
    <div class="mb-3">
        <label>Valor da Venda (R$)
            <input type="number" name="valor_venda" step="0.01" min="0" class="form-control"
                   value="<?php print $row->valor_venda; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
