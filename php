//dias do ano
print date("d/m/y");
    print "<br>";
    print "hoje e o dia " .date("z"). "° do ano";                                                                         
?>


//variação de aritmetica
<?php
 $a = 5;
   $b = 2;
   $c = $a ** $b;

   print $c;

   //operadores aritmeticos (+ - * / % **)


//variável de nome
<?php
  $txt = "Neymar da Silva Santos Junior";
  //quantidade de caracteres numa string (no caso no nome)
  print strlen($txt);
  print "<br>";

  //quantidade de´palavras ma string
  print str_word_count($txt);
  print "<br>";

  //todos os caracteres em maiusculo
  print strtoupper($txt);
  print"<br>";

  //todos em minusculo
  print strtolower($txt);
  print "<br>";

  //apenas a primeira em maisuculo
  print ucfirst($txt);
  print "<br>";

  //todas as primieras palavras em maiusculo
  print ucwords($txt);
  print "<br>";

  //reverter uma string
  print strrev($txt);
  print "<br>";

  //embaralhar string
  print str_shuffle ($txt);
  print "<br>";

  //substituir com uma string
  print str_replace("da Silva", " da S.", $txt);
  print "<br>";

  //parte de uma string
  print substr($txt, 0, 6);

//atividades

<?php
//1.questao
$nome = "Davi Goncalves Castro";
print "<br>";
$a = 2025;
$b = 2006;
$c = $a - $b;
print "1. meu nome e $nome e tenho $c anos de idade";

//2.questao
print "<br>";
print "<br>";

$a = 5;
$b = 4;
$c = $a + $b;

print "2. a) resultado da soma é $c";

print "<br>";

$a = 5;
$b = 4;
$c = $a - $b;

print "b) resultado da subtração é $c";

print "<br>";

$a = 5;
$b = 4;
$c = $a * $b;

print "c) resultado da multiplicação é $c";

print "<br>";

$a = 5;
$b = 4;
$c = $a / $b;

print "d) resultado da divisão é $c";

print "<br>";

$a = 5;
$b = 4;
$c = $a % $b;

print "e) resultado do módulo é $c";

print "<br>";

$a = 5;
$b = 4;
$c = $a ** $b;

print "f) resultado da potência é $c";

//3. questao
print "<br>";
print "<br>";

$txt = "Davi Goncalves Castro";
print strlen($txt);
print "<br>";

   
