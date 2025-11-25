<?php
// Arquivo responsável por processar as ações de cadastrar, editar e excluir Livro.

// A variável $conn é assumida como a conexão ativa do 'config.php'

if (!isset($conn) || $conn->connect_error) {
    print "<div class='alert alert-danger' role='alert'><strong>ERRO CRÍTICO:</strong> Conexão falhou.</div>";
    return;
}

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Recebe e sanitiza os dados
        $titulo = $conn->real_escape_string($_POST["titulo"]);
        $ano_publicacao = (int)$_POST["ano_publicacao"];
        $autor_id = (int)$_POST["autor_id"];
        $editora_id = (int)$_POST["editora_id"]; // Usa editora_id

        $sql = "INSERT INTO livros (titulo, ano_publicacao, autor_id, editora_id) 
                VALUES ('{$titulo}', '{$ano_publicacao}', '{$autor_id}', '{$editora_id}')";

        if ($conn->query($sql)) {
            print "<div class='alert alert-success' role='alert'>Livro cadastrado com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger' role='alert'>Erro ao cadastrar livro: " . $conn->error . "</div>";
        }
        print "<script>setTimeout(function(){ location.href='?page=listar-livro'; }, 1500);</script>";
        break;

    case 'editar':
        // Recebe e sanitiza os dados, incluindo o ID do livro
        $id = (int)$_POST["id"];
        $titulo = $conn->real_escape_string($_POST["titulo"]);
        $ano_publicacao = (int)$_POST["ano_publicacao"];
        $autor_id = (int)$_POST["autor_id"];
        $editora_id = (int)$_POST["editora_id"]; // Usa editora_id

        if ($id === 0) {
             print "<div class='alert alert-danger' role='alert'>Erro: ID do Livro inválido.</div>";
             print "<script>setTimeout(function(){ location.href='?page=listar-livro'; }, 2500);</script>";
             break;
        }

        $sql = "UPDATE livros SET 
                    titulo = '{$titulo}', 
                    ano_publicacao = '{$ano_publicacao}', 
                    autor_id = '{$autor_id}', 
                    editora_id = '{$editora_id}' 
                WHERE id = '{$id}'";

        if ($conn->query($sql)) {
            print "<div class='alert alert-success' role='alert'>Livro editado com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger' role='alert'>Erro ao editar Livro: " . $conn->error . "</div>";
        }
        print "<script>setTimeout(function(){ location.href='?page=listar-livro'; }, 1500);</script>";
        break;
        
    case 'excluir':
        $id = (int)$_REQUEST["id"];
        $sql = "DELETE FROM livros WHERE id = '{$id}'";

        if ($conn->query($sql)) {
            if ($conn->affected_rows > 0) {
                print "<div class='alert alert-success' role='alert'>Livro excluído com sucesso!</div>";
            } else {
                print "<div class='alert alert-warning' role='alert'>Livro não encontrado ou já excluído.</div>";
            }
        } else {
            print "<div class='alert alert-danger' role='alert'>Erro ao excluir livro: " . $conn->error . "</div>";
        }
        print "<script>setTimeout(function(){ location.href='?page=listar-livro'; }, 2000);</script>";
        break;
    
    default:
        print "<div class='alert alert-warning' role='alert'>Ação desconhecida.</div>";
}
?>