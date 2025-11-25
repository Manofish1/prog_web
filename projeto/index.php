<?php
// Este é o arquivo principal do sistema de biblioteca.
// Ele carrega o cabeçalho, a navegação e, com base no parâmetro 'page' (URL),
// carrega o conteúdo dinâmico (formulários, listas, etc.).
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestão de Biblioteca</title>
    <!-- CORRIGIDO: Carregando CSS do Bootstrap via CDN para garantir o estilo correto -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Biblioteca Central</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Início</a>
        </li>
        
        <!-- Menu Livros -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Livros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-livro">Cadastrar Livro</a></li>
            <li><a class="dropdown-item" href="?page=listar-livro">Listar Livros</a></li>
          </ul>
        </li>
        
        <!-- Menu Autores (REINSERIDO) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Autores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-autor">Cadastrar Autor</a></li>
            <li><a class="dropdown-item" href="?page=listar-autor">Listar Autores</a></li>
          </ul>
        </li>

        <!-- Menu Editoras -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Editoras
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-editora">Cadastrar Editora</a></li>
            <li><a class="dropdown-item" href="?page=listar-editora">Listar Editoras</a></li>
          </ul>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar Livro/Editora/Autor" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <?php
                    // Arquivo de conexão (mantido)
                    include ('config.php');
                    
                    // Lógica para carregar o conteúdo dinâmico
                    switch (@$_REQUEST['page']){
                        // LIVROS
                        case 'cadastrar-livro':
                            include('cadastrar-livro.php');
                            break;
                        case 'listar-livro':
                            include('listar-livro.php');
                            break;
                        case 'editar-livro':
                            include('editar-livro.php');
                            break;
                        case 'salvar-livro':
                            include('salvar-livro.php');
                            break;
                        
                        // AUTORES (REINSERIDO)
                        case 'cadastrar-autor':
                            include('cadastrar-autor.php');
                            break;
                        case 'listar-autor':
                            include('listar-autor.php');
                            break;
                        case 'editar-autor':
                            include('editar-autor.php');
                            break;
                        case 'salvar-autor':
                            include('salvar-autor.php');
                            break;
                            
                        // EDITORAS
                        case 'cadastrar-editora':
                            include('cadastrar-editora.php');
                            break;
                        case 'listar-editora':
                            include('listar-editora.php');
                            break;
                        case 'editar-editora':
                            include('editar-editora.php');
                            break;
                        case 'salvar-editora':
                            include('salvar-editora.php');
                            break;
                            
                        default:
                            print "<h1>Bem-vindo ao Catálogo de Livros!</h1>";
                            print "<p>Use os menus acima para cadastrar e listar livros, autores e editoras.</p>";
                    }
                ?>
            </div>
        </div>
    </div>

<!-- CORRIGIDO: Carregando JavaScript do Bootstrap via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>