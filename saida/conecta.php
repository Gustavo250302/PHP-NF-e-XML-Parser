<?php


// Conexao � base de dados no banco MySQL. Ap�s a fiun��o de importa��o para fazer Queries a vontade:

$banco   = 'xmlparser';             // nome do banco aonde ser�o salvas as informa��es do XML 
$host    = '127.0.0.1';             // host
$usuario = 'root';                  // usuario
$senha   = 'tronblast';               // senha

//// connectamos ao host e selecionamos o banco
mysql_connect($host, $usuario, $senha);
mysql_select_db($banco);


?>
