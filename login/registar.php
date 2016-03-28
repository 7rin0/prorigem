<?php
session_start();
require("opcoes.php"); // conectar servidor e dados

// Valores do utilizador
$util_n_nome = $_POST['nome'];
$util_n_senha = $_POST['senha'];

echo "alert($util_n_nome+\" \"+$util_n_senha);";
?>