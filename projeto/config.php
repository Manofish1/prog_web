<?php
// Arquivo de configuração e conexão com o banco de dados.

// ******************************************************
// AVISO: AJUSTE DE CREDENCIAIS
// Usando o padrão mais comum: 'root' com senha vazia.
// Se ainda falhar, consulte as credenciais do seu servidor MySQL.
// ******************************************************

$host = 'localhost';
// Usuário padrão do XAMPP/WAMP
$user = 'root'; 
// Senha padrão do XAMPP/WAMP (deixe vazio se não tiver configurado)
$pass = '';     
$db   = 'biblioteca_db'; 

// Tenta estabelecer a conexão (Linha 16)
$conn = new mysqli($host, $user, $pass, $db);

// Verifica a conexão (Linha 19)
if ($conn->connect_error) {
    // Se a conexão falhar, exibe uma mensagem de diagnóstico formatada.
    die("<h3>&#x274C; Falha Crítica na Conexão com o Banco de Dados</h3>
         <p class='alert alert-danger'>
            <strong>Detalhes do Erro:</strong> " . $conn->connect_error . " <br>
            O erro anterior ('Access denied for user **'seu_usuario'@'localhost''') foi causado por credenciais incorretas.
            Verifique se o MySQL está ligado e se o usuário/senha (atualmente <code>root</code>/<code>vazio</code>) estão corretos.
         </p>
         
         <h4>Passos para Solução de Problemas:</h4>
         <ol>
            <li><strong>Verifique o Servidor:</strong> Certifique-se de que o <strong>serviço MySQL</strong> no seu XAMPP/WAMP está <strong>INICIADO (verde)</strong>.</li>
            <li><strong>Corrija Credenciais:</strong> Se o erro for 'Access denied', tente mudar \$user ou \$pass no <code>config.php</code> para o correto.</li>
            <li><strong>Execute o Schema:</strong> O banco de dados ou tabelas podem não existir. <br>
                Vá ao phpMyAdmin e execute o script SQL do arquivo <strong><code>database_schema.sql</code></strong>.</li>
         </ol>
         
         <p>Por favor, resolva este erro externo ao PHP e recarregue a página.</p>"
    );
}

// Define o charset para UTF-8 (importante para caracteres especiais)
$conn->set_charset("utf8");

// NOTA: Para um projeto mais robusto, é recomendável usar Prepared Statements (PDO ou mysqli) para segurança.
?>