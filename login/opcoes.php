<?php
	// variaveis de conexão
	$servidor = "localhost";
	$nome = "root";
	$senha = "sementes12345";
	$base_dados = "login";
	$t_dados = "dados"; // tabela dados
	$t_blocos = "t_blocos"; // tabela blocos
	$conectar = mysql_connect($servidor, $nome, $senha);
	mysql_select_db($base_dados, $conectar);
?>