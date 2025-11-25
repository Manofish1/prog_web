<?php
// Arquivo responsável por receber os dados do formulário de Editora e interagir com o banco de dados.

// A variável $conn é assumida como a conexão ativa do 'config.php'

// IMPORTANTE: VERIFICAÇÃO CRÍTICA DE CONEXÃO. 
if (!isset($conn) || $conn->connect_error) {
    print "<div class='alert alert-danger' role='alert'>
            <strong>ERRO CRÍTICO (Conexão):</strong> A conexão com o banco de dados (\$conn) não foi estabelecida. 
            Verifique se o seu servidor MySQL está ativo e se o arquivo <code>config.php</code> está a funcionar.
           </div>";
    return; // Impede a execução do resto do script
}

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // 1. Receber e sanitizar o Nome
        $nome = $conn->real_escape_string($_POST["nome"]);

        if (empty($nome)) {
             print "<div class='alert alert-danger' role='alert'>Erro: O campo Nome da Editora não pode estar vazio.</div>";
             print "<script>setTimeout(function(){ location.href='?page=cadastrar-editora'; }, 2500);</script>";
             break;
        }

        // 2. Montar a query SQL de inserção (Tabela: editoras)
        $sql = "INSERT INTO editoras (nome) 
                VALUES ('{$nome}')";

        // 3. Executar a query
        $res = $conn->query($sql);

        // 4. Verificar o resultado e exibir feedback
        if ($res) {
            print "<div class='alert alert-success' role='alert'>Editora cadastrada com sucesso!</div>";
        } else {
            // Se houver erro, exibe o erro do MySQL
            print "<div class='alert alert-danger' role='alert'>Erro ao cadastrar editora: " . $conn->error . "</div>";
        }

        // Redireciona de volta para a página de listagem
        print "<script>setTimeout(function(){ location.href='?page=listar-editora'; }, 1500);</script>";
        break;

    case 'editar':
        // 1. Receber e sanitizar os dados do formulário, incluindo o ID
        $id = (int)$_POST["id"];
        $nome = $conn->real_escape_string($_POST["nome"]);

        if ($id === 0 || empty($nome)) {
             print "<div class='alert alert-danger' role='alert'>Erro: ID da Editora inválido ou nome vazio.</div>";
             print "<script>setTimeout(function(){ location.href='?page=listar-editora'; }, 2500);</script>";
             break;
        }

        // 2. Montar a query SQL de atualização (Tabela: editoras)
        $sql = "UPDATE editoras SET nome = '{$nome}' WHERE id = '{$id}'";

        // 3. Executar a query
        $res = $conn->query($sql);

        // 4. Verificar o resultado e exibir feedback
        if ($res) {
            print "<div class='alert alert-success' role='alert'>Editora editada com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger' role='alert'>
                    Erro ao editar a Editora. Detalhes do MySQL: " . $conn->error . "
                   </div>";
        }

        // Redireciona de volta para a página de listagem
        print "<script>setTimeout(function(){ location.href='?page=listar-editora'; }, 1500);</script>";
        break;
        
    case 'excluir':
        // 1. Receber e sanitizar o ID da editora a ser excluída
        $id = (int)$_REQUEST["id"];

        // 2. Montar a query SQL de exclusão (Tabela: editoras)
        $sql = "DELETE FROM editoras WHERE id = '{$id}'";

        // 3. Executar a query
        $res = $conn->query($sql);

        // 4. Verificar o resultado e exibir feedback
        if ($res) {
            if ($conn->affected_rows > 0) {
                print "<div class='alert alert-success' role='alert'>Editora excluída com sucesso!</div>";
            } else {
                print "<div class='alert alert-warning' role='alert'>Editora não encontrada ou já excluída.</div>";
            }
        } else {
            // 5. Tratar erro de Chave Estrangeira (Erro 1451 - Editora associada a Livros)
            if ($conn->errno == 1451) { 
                print "<div class='alert alert-danger' role='alert'>
                        <strong>Erro de Exclusão:</strong> A editora não pode ser excluída porque está associada a um ou mais livros no catálogo. 
                        Remova a associação dos livros primeiro.
                       </div>";
            } else {
                // Outros erros de MySQL
                print "<div class='alert alert-danger' role='alert'>Erro ao excluir editora: " . $conn->error . "</div>";
            }
        }

        // Redireciona de volta após um pequeno delay (2s) para a página de listagem
        print "<script>setTimeout(function(){ location.href='?page=listar-editora'; }, 2000);</script>";
        break;
    
    default:
        print "<div class='alert alert-warning' role='alert'>Ação desconhecida.</div>";
}
?>