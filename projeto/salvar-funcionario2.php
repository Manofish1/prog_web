<h1>Salvar Funcionário</h1>
<?php
    switch ($_REQUEST['acao']) {
    	case 'cadastrar':
    		$nome = $_POST['nome_funcionario'];
    		$email = $_POST['email_funcionario'];
    		$telefone = $_POST['telefone_funcionario'];

    		$sql = "INSERT INTO funcionario (nome_funcionario, email_funcionario, telefone_funcionario)
    		        VALUES ('{$nome}','{$email}','{$telefone}')";

    		$res = $conn->query($sql);

    		if($res == true){
    			print "<script>alert('Cadastrou com sucesso!');</script>";
    			print "<script>location.href='?page-listar-funcionario';</script>";
    		}else{
    			print "<script>alert('Nao cadastrar');</script>";
    			print "<script>location.href='?page-listar-funcionario';</script>";
    		}
    		break;

			case 'editar':
				$nome = $_POST['nome_funcionario'];
				$email = $_POST['email_funcionario'];
				$telefone = $_POST['telefone_funcionario'];
	
				$sql = "UPDATE funcionario SET  nome_funcionario='{$nome}', email_funcionario='{$email}', telefone_funcionario='{$telefone}' WHERE  id_funcionario=".$_REQUEST['id_funcionario'];
	$res = $conn->query($sql);
	if($res == true){
		print "<script>alert('Editou com sucesso!');</script>";
		print "<script>location.href='?page=listar-funcionario';</script>"; 	  
	}else{
		print "<script>alert('Não editou!');</script>";
		print "<script>location.href='?page=listar-funcionario';</script>"; 	 
	}
		break;

    	case 'excluir':
    		$sql = "DELETE FROM  funcionario WHERE  id_funcionario=".$_REQUEST['id_funcionario'];
			$res = $conn->query($sql);
			if($res == true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>  location.href='?page=listar-funcionario';</script>"; 	  
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>  location.href='?page=listar-funcionario';</script>"; 	 
			}
    		break;
		}
