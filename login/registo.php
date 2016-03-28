<?php
session_start();
require("opcoes.php"); // conectar servidor e dados

// Valores do utilizador
$util_n_nome = $_POST['nome'];
$util_n_senha = $_POST['senha'];

// verificar se o nome já existe
$n_nomes = mysql_query("select numero from {$t_dados} where nome='{$util_n_nome}';");
$n_linhas = mysql_num_rows($n_nomes);

// inserior nome caso esteja disponivel
$inserir_dados = "INSERT INTO {$t_dados}(nome,senha) values ('{$util_n_nome}','{$util_n_senha}');";

// se o utilizador já existir
if($n_linhas >0){
	echo "O nome de utilizador <b>{$util_n_nome}</b> já está se encontra ocupado. Por favor seleccione outro.";
}
else{
	mysql_query($inserir_dados);
	echo "O utilizador <b>{$util_n_nome}</b> foi registado com sucesso!";
}
?>
