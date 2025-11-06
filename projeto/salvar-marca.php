<h1>Salvar Marca</h1>
<?php
    switch ($_REQUEST['acao']) {
    	case 'cadastrar':
    		$nome = $_POST['nome_marca'];

    		$sql = "INSERT INTO marca (nome_marca)
    		        VALUES ('{$nome}')";

    		$res = $conn->query($sql);

    		if($res == true){
    			print "<script>alert('Cadastrou com sucesso!');</script>";
    			print "<script>location.href='?page-listar-marca';</script>";
    		}else{
    			print "<script>alert('Nao cadastrar');</script>";
    			print "<script>location.href='?page-listar-marca';</script>";
    		}
    		break;

			case 'editar':
				$nome = $_POST['nome_marca'];
	
				$sql = "UPDATE marca SET  nome_marca='{$nome}' WHERE  id_marca=".$_REQUEST['id_marca'];
	$res = $conn->query($sql);
	if($res == true){
		print "<script>alert('Editou com sucesso!');</script>";
		print "<script>location.href='?page=listar-marca';</script>"; 	  
	}else{
		print "<script>alert('Não editou!');</script>";
		print "<script>location.href='?page=listar-marca';</script>"; 	 
	}
		break;

    	case 'excluir':
    		$sql = "DELETE FROM  marca WHERE  id_marca=".$_REQUEST['id_marca'];
			$res = $conn->query($sql);
			if($res == true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>  location.href='?page=listar-marca';</script>"; 	  
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>  location.href='?page=listar-marca';</script>"; 	 
			}
    		break;
		}