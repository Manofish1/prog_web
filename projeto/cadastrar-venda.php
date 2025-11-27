<h1>Cadastrar Venda</h1>
<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Cliente
            <select name="cliente_id_cliente" class="form-control">
                <option value="">-= Escolha =-</option>
                <?php
                    $sql = "SELECT id_cliente, nome_cliente FROM cliente";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0){
                        while($row = $res->fetch_object()){
                            print "<option value='{$row->id_cliente}'>{$row->nome_cliente}</option>";
                        }
                    }else{
                        print "<option>Não há clientes cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Funcionário
            <select name="funcionario_id_funcionario" class="form-control">
                <option value="">-= Escolha =-</option>
                <?php
                    $sql = "SELECT id_funcionario, nome_funcionario FROM funcionario";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0){
                        while($row = $res->fetch_object()){
                            print "<option value='{$row->id_funcionario}'>{$row->nome_funcionario}</option>";
                        }
                    }else{
                        print "<option>Não há funcionários cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Modelo
            <select name="modelo_id_modelo" class="form-control">
                <option value="">-= Escolha =-</option>
                <?php
                    $sql = "SELECT mo.id_modelo, mo.nome_modelo, ma.nome_marca 
                            FROM modelo mo
                            LEFT JOIN marca ma ON mo.marca_id_marca = ma.id_marca";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0){
                        while($row = $res->fetch_object()){
                            $label = $row->nome_modelo;
                            if(!empty($row->nome_marca)) $label = "{$row->nome_marca} - {$label}";
                            print "<option value='{$row->id_modelo}'>{$label}</option>";
                        }
                    }else{
                        print "<option>Não há modelos cadastrados</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Data da Venda
            <input type="date" name="data_venda" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Valor da Venda (R$)
            <input type="number" name="valor_venda" step="0.01" min="0" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
