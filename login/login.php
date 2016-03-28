<?php
// importar ficheiro
require("opcoes.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// variaveis do formulario
	$uti_nome = $_POST["nome"];
	$uti_senha = $_POST["senha"];

	// mysql query
	$combinar = "select numero from $t_dados where nome ='".$uti_nome."' and senha ='".$uti_senha."';";
	$confirmar = mysql_query($combinar);
	$n_linhas = mysql_num_rows($confirmar); // numero de linhas

	// se existir
	if($n_linhas === 1){
		$_SESSION["login_utilizador"] = $uti_nome;
		// Boas-vindas
		echo "Olá {$uti_nome}, seja bem-vindo(a)!<br>";
		echo "Aceder ao painel de controlo:<a href='painel/'>Painel Controlo</a>";
	}
	else{
		// Boas-vindas
		echo "Lamentamos mas o seu login não foi executado verifique se o seu nome e/o password estão correctos. <a href=\"/login/\">login</a><br>";
		session_destroy();

		unset($_SESSION["login"]);
	}
}
?>
