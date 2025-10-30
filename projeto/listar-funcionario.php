<h1>listar funcionario</h1>
<?php
$sql = "SELECT * FROM funcionario";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    print "<p>encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print"<tr>";
    print"<th>#</th>";
    print"<th>Nome</th>";
    print"<th>E-mail</th>";
    print"<th>Telefone</th>";
    print"</tr>";
    while ( $row = $res->fetch_object() ){
        print "<tr>";
        print "<td>".$row->id_funcionario."</td>";
        print "<td>".$row->nome_funcionario."</td>";
        print "<td>".$row->email_funcionario."</td>";
        print "<td>".$row->telefone_funcionario."</td>";
        print "</tr>";
    } 
    print "</table>";
} else {
    print "<p>Não encontrou resultado</p>";
}
