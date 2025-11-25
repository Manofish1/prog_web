<?php
// Arquivo responsável por processar as ações de cadastrar, editar e excluir Autor.

// A variável $conn é assumida como a conexão ativa do 'config.php'

if (!isset($conn) || $conn->connect_error) {
    print "<div class='alert alert-danger' role='alert'><strong>ERRO CRÍTICO:</strong> Conexão falhou.</div>";
    return;
}

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $conn->real_escape_string($_POST["nome"]);
        $sql = "INSERT INTO autores (nome) VALUES ('{$nome}')";
        
        if ($conn->query($sql)) {
            print "<div class='alert alert-success' role='alert'>Autor cadastrado com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger' role='alert'>Erro ao cadastrar autor: " . $conn->error . "</div>";
        }
        print "<script>setTimeout(function(){ location.href='?page=listar-autor'; }, 1500);</script>";
        break;

    case 'editar':
        $id = (int)$_POST["id"];
        $nome = $conn->real_escape_string($_POST["nome"]);

        if ($id === 0) {
             print "<div class='alert alert-danger' role='alert'>Erro: ID do Autor inválido.</div>";
             print "<script>setTimeout(function(){ location.href='?page=listar-autor'; }, 2500);</script>";
             break;
        }

        $sql = "UPDATE autores SET nome = '{$nome}' WHERE id = '{$id}'";

        if ($conn->query($sql)) {
            print "<div class='alert alert-success' role='alert'>Autor editado com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger' role='alert'>Erro ao editar Autor: " . $conn->error . "</div>";
        }
        print "<script>setTimeout(function(){ location.href='?page=listar-autor'; }, 1500);</script>";
        break;
        
    case 'excluir':
        $id = (int)$_REQUEST["id"];
        $sql = "DELETE FROM autores WHERE id = '{$id}'";

        if ($conn->query($sql)) {
            if ($conn->affected_rows > 0) {
                print "<div class='alert alert-success' role='alert'>Autor excluído com sucesso!</div>";
            } else {
                print "<div class='alert alert-warning' role='alert'>Autor não encontrado ou já excluído.</div>";
            }
        } else {
            // Trata erro de Chave Estrangeira (Autor associado a Livros)
            if ($conn->errno == 1451) { 
                print "<div class='alert alert-danger' role='alert'>
                        <strong>Erro de Exclusão:</strong> O autor não pode ser excluído porque está associado a livros.
                       </div>";
            } else {
                print "<div class='alert alert-danger' role='alert'>Erro ao excluir autor: " . $conn->error . "</div>";
            }
        }
        print "<script>setTimeout(function(){ location.href='?page=listar-autor'; }, 2000);</script>";
        break;
    
    default:
        print "<div class='alert alert-warning' role='alert'>Ação desconhecida.</div>";
}
?>