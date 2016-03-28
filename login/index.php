<?php
# iniciar pagina de login
?>
<html>
<head>
<title>Prorigem Login</title>
</head>
<body>
Login:
<br>
<form name="forma_login" action="login.php" onSubmit="return analisar_dados()" method="post">
<input type="text" name="nome" maxlength="16" size="16">
<input type="password" name="senha" maxlength="16" size="16">
<input type="submit" value="toca_andar">
</form>

<!--
<br>
<br>
Registo:
<br>
<form action="registo.php" method="post">
<input id="log_n" type="text" name="nome" maxlength="16" size="16">
<input id="log_p" type="password" name="senha" maxlength="16" size="16">
<input type="submit" value="registar">
</form>
-->
<script>
function analisar_dados(){
	var log_n = document.forms["forma_login"]["nome"].value.length,
		log_p = document.forms["forma_login"]["senha"].value.length;
		
		// tem conteudo ou nao
		if(log_n === 0|| log_p === 0){
			return false;
		}
		else{
			return true;
		}
}
</script>

</body>
</html>