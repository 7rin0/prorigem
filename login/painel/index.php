<?php
session_start();

// importar ficheiro
require("../opcoes.php");

// se actualizou os campos dos blocos
if($_SERVER["REQUEST_METHOD"] === "POST"){
	$nome_bloco = $_POST["sel_blocos"]; // nome bloco ex:bloco_0
	$conteudo_bloco = addslashes($_POST[$nome_bloco]); // conteudo do mesmo bloco
	$numero_bloco = explode("_",$nome_bloco)[1]; // numero ex: 0
	$linha_real = $numero_bloco+1;
	
	echo htmlspecialchars($conteudo_bloco." ".$numero_bloco);// apenas para testes
	
	// actualizar servidor e base dados
	$actualizar_bd = mysql_query("UPDATE {$t_blocos} SET conteudo='{$conteudo_bloco}' WHERE numero='{$linha_real}';");
}

// se têm o login feito
if(isset($_SESSION['login_utilizador'])){
	// login feito?
	$sessao_uti =$_SESSION['login_utilizador'];
	$sessao_sql_uti= mysql_query("Select numero from $t_dados where nome='{$sessao_uti}';");
	$sessao_linhas = mysql_num_rows($sessao_sql_uti);

	// receber conteudos
	$t_tabela = mysql_num_rows(mysql_query("SHOW TABLES LIKE '{$t_blocos}';"));

	
	
	// existencia coluna menu
	// detectar se os menus existem
	$coluna_menu = mysql_query("Show columns from $t_blocos like 'menu'");
	$exi_c_menu = mysql_num_rows($coluna_menu);
	
	//detectar se os valores sao nulos
	$linhas_c_menu =mysql_query("select menu from $t_blocos where numero='1';");
	$imp_linha = mysql_fetch_row($linhas_c_menu)[0];
	$v_imp = strlen($imp_linha);
	
	if($v_imp === 0){
		
	}
	
	if($exi_c_menu === 0){
		$adi_c_menu = mysql_query("alter table $t_blocos add column menu varchar(10);");
	}

	echo $v_imp;
	
	
	
	// se a tabela nao existir
	if($t_tabela === 0){
		// criar tabela e colunas
		mysql_query("CREATE TABLE t_blocos(numero INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(numero),conteudo varchar(200));");
		
		// loop criador de blocos
		for($a=0;$a<44;$a++){
			mysql_query("INSERT INTO {$t_blocos}(conteudo) VALUES (\"vazio\");");
		}
	}
	else if($sessao_linhas === 1){
		// conteudos tabela blocos
		$conteudos_t_blocos = mysql_query("SELECT * FROM {$t_blocos}");
		$n_linhas_t_blocos = mysql_num_rows($conteudos_t_blocos); // n linhas
		$array_conteudos = [];
		
		while($conteudos_t_blocos_n = mysql_fetch_array($conteudos_t_blocos)){
			$array_conteudos[] = " \"".addslashes($conteudos_t_blocos_n['conteudo'])."\" ";
		}
		
		$valores_conteudos = implode(",",$array_conteudos);
		
		echo "  <html>
					<head>
						<title>Painel de Controlo</title>
						<link rel='stylesheet' type='text\css' href='/css/geral.css' />
					</head>
					<body>
						<div id=\"conteudo\">
							<p>Painel de controlo</p>
							<p>{$n_linhas_t_blocos}</p>
							<form name=\"forma_blocos\" action='' method='POST'>
							<p>Selecione o bloco a alterar:</p>
							<select name=\"sel_blocos\" onchange='tcontcampo()'>
							<script>
								// receber numero de blocos
								// criar options de selecção
								var n_blocos = {$n_linhas_t_blocos},
									forma_blocos = document.forms[\"forma_blocos\"][\"sel_blocos\"],
									s_pad = \"\",
									forma_blocos_seleccionado = forma_blocos.options[forma_blocos.selectedIndex];
									
								// loop de selecção blocos
								for(a=0;a<{$n_linhas_t_blocos};a++){
									// se primeiro campo
									if(a===0){
										s_pad = \"selected\";
									}
									else{
										s_pad= \"\";
									}
									
									forma_blocos.innerHTML += \"<option maxlength='200' value='bloco_\"+a+\"'\"+s_pad+\">Bloco \"+a+\"</option>\";
								}
								
								window.array_c_t_b = [{$valores_conteudos}];
								
								// conteudos e campos
								function tcontcampo(){
								var forma_blocos = document.forms[\"forma_blocos\"][\"sel_blocos\"],
									s_pad = \"\",
									forma_blocos_seleccionado = forma_blocos.options[forma_blocos.selectedIndex].value,
									f_b_o_numero = forma_blocos_seleccionado.split(\"_\")[1],
									
									// alterar conteudo no campo a enviar
									campo_c_b = document.getElementById(\"campo_c_b\");
									
									// alterar campos
									campo_c_b.innerHTML = \"<input name='bloco_\"+f_b_o_numero+\"' value='\"+array_c_t_b[f_b_o_numero]+\"'>		<select name='tipo_menu'><option value='p'>Menu Principal</option><option value='s'>Menu Secundario</option></select>\";
								}
							</script>
							</select>
							<div id=\"campo_c_b\">
							<input name=\"bloco_0\" value={$array_conteudos[0]}>
							<select name='tipo_menu'>
								<option value='p'>Menu Principal</option>
								<option value='s'>Menu Secundario</option>
							</select>
							</div>
							<input type=\"submit\" value=\"alterar\">
							</form>
						</div>
					</body>
				</html>";
			}
}
// se não tiver login feito
else{
	echo "Para visualizar este conteudo por favor faça login. <a href=\"/login/\">login</href>";
	unset($_SESSION["login"]);
	session_destroy();
}
?>