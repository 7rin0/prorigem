<?php 
	// requerer ficheiros
	require("login/opcoes.php");
	
	// criar array de dados
	$receber_conteudo_blocos = mysql_query("SELECT * FROM {$t_blocos}");
	$num_linhas_blocos = mysql_num_rows($receber_conteudo_blocos);
	$array_cb = [];
	
	// linha a linha
	while($array_cb_v = mysql_fetch_array($receber_conteudo_blocos)){
		$array_cb[] = "\"".addslashes($array_cb_v['conteudo'])."\"";
	}
	
	// transformar em string IMPLODE
	$implodir_array = implode(",",$array_cb);
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript, prorigem">
<title> Prorigem - web.design, marketing e fotografia </title>
<link id="page_favicon" href="/imagens/gosquares.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="css/letra.css" type="text/css" charset="utf-8" />

<!--<script type="text/javascript" charset="utf-8" src="js/prorigem.js"></script>-->
</head>

<body>
<script>
// website
// variaveis
var largura_website = window.innerWidth,
	altura_website = window.innerHeight,
	largura_disponivel = largura_website,
	altura_disponivel = altura_website,
	ajuste =1,
	valor = false,
	geral,
	load_imagem = new Image(),
	todas_imagens = [],
	todos_conteudos = [];

// todas imagens
todas_imagens = ["b_0","b_0_b","b_1","b_1_b","b_2","b_3","b_3_b","b_4","b_4_b","b_5_b","b_6","b_7_b","b_8","b_8_b","b_9","b_9_b","b_13","b_14","b_14_b","b_15","b_15_b","b_17","b_17_b","b_21","b_21_b","b_22","b_22_b","b_24","b_25","b_25_b","b_26","b_26_b","b_29","b_35","b_35_b","b_37","b_37_b","b_39","b_40","b_40_b","b_42","b_43","b_43_b","b_azul","b_central","b_laranja","b_preto","b_verde","b_vermelho","fundo","logo_centro","logo_petalas"];

// todos os conteudos
todos_conteudos = [<?php echo $implodir_array; ?>];

// Loading conteudos
for (c=0;c<todas_imagens.length;c++){
	load_imagem.src = "imagens/"+todas_imagens[c]+".png";
}

// Iniciar construção
load_imagem.onload = function (){
	geral(ajuste,"inicio");
}

// Redimencionar layout
function ajustar(valor){

	if(valor=== "true"){
		var contentor_blocos = document.getElementById("contentor_blocos"),
			cbl = parseFloat(contentor_blocos.style.left),
			cbt = parseFloat(contentor_blocos.style.top),
			cbw = parseFloat(contentor_blocos.style.width),
			cbh = parseFloat(contentor_blocos.style.heigth),
			lc = (window.innerWidth-cbw)/2,
			tc = (window.innerHeight-cbh)/2;
			
			contentor_blocos.style.left = lc+"px";
			contentor_blocos.style.top = tc+"px";
	}
}
	
// Função geral
function geral(ajuste,motivo){

	// DEFINIR LAYOUT
	if(largura_website > altura_website){
		largura_disponivel = altura_website*1.59;
		// se largura disponivel for maior que largura de website recomeça
		if(largura_disponivel > largura_website){
			altura_disponivel =  largura_website*0.63;
			largura_disponivel = largura_website;
		}
	}
	else if(largura_website < altura_website){
		altura_disponivel =  largura_website*0.63;
		largura_disponivel = largura_website;
	}
	else{
		alert(largura_website+" "+altura_website);
	}
	
	// variaveis
	var body = document.getElementsByTagName("body")[0],
		bcl = largura_disponivel*ajuste*0.154511,
		bca = altura_disponivel*ajuste*0.531220,
		M = bcl*0.071,
		GB = [],
		a = 0,
		b = 0,
		c = 0,
		d = 0,
		e = 0,
		criar_contentor_blocos,
		contentor_top,
		contentor_left,
		criar_bloco,
		largura_maxima_contentor,
		altura_maxima_contentor,
		criar_cantos,
		b_canto,
		canto,
		cateto_oposto = bca*0.07,
		cateto_adjacente = cateto_oposto*1.8,
		z_index,
		cor;
		
		
	
	// contentor de blocos
	criar_contentor_blocos = document.createElement("div");
	criar_contentor_blocos.setAttribute("id","contentor_blocos");
	body.appendChild(criar_contentor_blocos);
	body.setAttribute("onresize", "ajustar('true')");
	body.style.fontFamily = "champagne__limousinesregular";
	body.style.background = "url(\"/imagens/fundo.png\")";
		
		
	// ! Arrays largura, altura, esquerda e top
		// !! Top , Left , Height , Width , Canto
		GB[0] = [M,M,0.3733*bca,0.7677*bcl,"rec"];
		GB[1] = [M,(2*M)+GB[0][3],GB[0][2],0.8759*bcl,"rec"];
		GB[2] = [M,M+GB[1][1]+GB[1][3],0.4504*bca,0.9495*bcl,"rec"];
		GB[3] = [2*M+GB[0][2],M,0.3456*bca,0.5984*bcl,"rec"];
		GB[4] = [2*M+GB[0][2],2*M+GB[3][3],0.2690*bca,1.285*bcl,"rec"];
		GB[5] = [M+GB[2][0]+GB[2][2],M+GB[4][1]+GB[4][3],0.0908*bca,0.7115*bcl,"rec"];
		GB[6] = [M+GB[3][0]+GB[3][2],M,0.1808*bca,GB[3][3],"rec"];
		
		GB[7] = [M+GB[4][2]+GB[4][0],GB[4][1],0.4838*bca,0.5006*bcl,"rec"];
		GB[8] = [GB[7][0],GB[7][1]+GB[7][3]+M,0.2552*bca,0.72*bcl,"rec"];
		GB[9] = [M+GB[5][0]+GB[5][2],GB[5][1],0.2831*bca,GB[8][3],"rec"];
		GB[10] = [M+GB[6][0]+GB[6][2],M,0.3015*bca,GB[3][3],"rec"];
		GB[11] = [M+GB[8][0]+GB[8][2],GB[8][1],GB[9][2],GB[8][3],"rec"];
		GB[12] = [M+GB[9][0]+GB[9][2],GB[9][1],GB[9][2],GB[8][3],"rec"];
		GB[13] = [M+GB[10][0]+GB[10][2],M,GB[9][2],GB[3][3],"rec"];
		
		GB[14] = [M+GB[7][0]+GB[7][2],GB[7][1],0.3907*bca,0.7897*bcl,"rec"];
		GB[15] = [M+GB[12][0]+GB[12][2],GB[12][1],0.2152*bca,GB[8][3],"rec"];
		GB[16] = [M+GB[11][0]+GB[11][2],M+GB[14][1]+GB[14][3],0.5022*bca,0.425*bcl,"rec"];
		GB[17] = [M+GB[13][0]+GB[13][2],M,0.1678*bca,0.8841*bcl,"rec"];
		GB[18] = [GB[17][0],M+GB[17][1]+GB[17][3],GB[17][2],0.5039*bcl,"rec"];
		GB[19] = [M+GB[15][0]+GB[15][2],GB[15][1],0.3322*bca,GB[15][3],"rec"];
		GB[20] = [GB[11][0],M+GB[19][1]+GB[19][3],GB[9][2],GB[8][3],"rec"];
		
		GB[21] = [M+GB[20][0]+GB[20][2],GB[20][1],0.1361*bca,bcl,"rec"];
		GB[22] = [GB[19][0],GB[20][1],GB[19][2],GB[21][3],"rec"];
		GB[23] = [0,GB[22][1],bca,bcl,"rec"];
		GB[24] = [M,M+GB[22][1]+bcl,0.2831*bca,0.5960*bcl,"rec"];
		GB[25] = [M,M+GB[24][1]+GB[24][3],0.2256*bca,0.8122*bcl,"rec"];
		GB[26] = [M,M+GB[25][1]+GB[25][3],0.4466*bca,0.9071*bcl,"rec"];
		GB[27] = [M+GB[24][0]+GB[24][2],GB[24][1],0.3313*bca,GB[24][3],"rec"];
		
		GB[28] = [M+GB[25][0]+GB[25][2],GB[25][1],0.1881*bca,GB[25][3],"rec"];
		GB[29] = [M+GB[28][0]+GB[28][2],GB[28][1],0.1679*bca,1.2294*bcl,"rec"];
		GB[30] = [M+GB[27][0]+GB[27][2],GB[27][1],0.2060*bca,0.4231*bcl,"rec",];
		GB[31] = [GB[30][0],M+GB[30][1]+GB[30][3],0.2831*bca,GB[20][3],"rec"];
		GB[32] = [GB[29][0],M+GB[29][1]+GB[29][3],0.4412*bca,0.4898*bcl,"rec"];
		GB[33] = [M+GB[30][0]+GB[30][2],M+GB[20][1]+GB[20][3],GB[9][2],0.711*bcl,"rec"];
		GB[34] = [GB[20][0],GB[31][1],GB[20][2],GB[20][3],"rec"];
		
		GB[35] = [GB[31][0],M+GB[34][1]+GB[34][3],0.4825*bca,0.6198*bcl,"rec"];
		GB[36] = [M+GB[32][0]+GB[32][2],GB[32][1],0.21*bca,GB[32][3],"rec"];
		GB[37] = [GB[15][0],M+GB[21][1]+GB[21][3],0.3053*bca,0.7*bcl,"rec"];
		GB[38] = [M+GB[34][0]+GB[34][2],M+GB[37][1]+GB[37][3],0.0907*bca,0.46*bcl,"rec"];
		GB[39] = [M+GB[35][0]+GB[35][2],GB[35][1],0.2844*bca,GB[35][3],"rec"];
		GB[40] = [M+GB[36][0]+GB[36][2],GB[36][1],GB[39][2],GB[36][3],"rec"];
		GB[41] = [M+GB[37][0]+GB[37][2],GB[37][1],0.243*bca,GB[37][3],"rec"];
		
		GB[42] = [M+GB[38][0]+GB[38][2],GB[38][1],0.385*bca,0.74*bcl,"rec"];
		GB[43] = [M+GB[40][0]+GB[40][2],M+GB[42][1]+GB[42][3],0.308*bca,0.875*bcl,"rec"];
	
	contentor_top = (altura_website-altura_disponivel)/2;
	contentor_left = (largura_website-largura_disponivel)/2;

	var contentor_blocos = document.getElementById("contentor_blocos");
	contentor_blocos.style.cssText = "position:absolute;top:"+contentor_top+"px;left:"+contentor_left+"px;padding:0px;display:block;width:"+largura_disponivel+"px;margin:0px auto;background:#;height:"+altura_disponivel+"px;border:0px solid red;";
	

	// ! forloops
	for(e= 0; e < GB.length;e++){
		// BLOCOS
		// criar bloco
		criar_bloco = document.createElement("div");
		// adicionar attributos
		criar_bloco.setAttribute("class","bloco");
		criar_bloco.setAttribute("id","bloco_"+e);
		// css
		cor = "#615d5c";
		z_index = 0;
		b_top = GB[e][0].toFixed(4);
		b_left = GB[e][1].toFixed(4);
		b_height = GB[e][2].toFixed(4);
		b_width = GB[e][3].toFixed(4);
		b_canto = GB[e][4];
		
		var font_size = M*2.3,
			font_c_v = b_height,
			con_display = "none",
			b_top_c = 0,
			valor_icone = GB[36][3].toFixed(4)*0.5,
			overflow = "hidden";
		
		// conteudo blocos
		// contactos
		if(e===0){
			criar_bloco.setAttribute("onmouseover","botoes('contactos')");
			con_display = "";
		}
		else if(e===1){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.3;
		}
		else if(e===3){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		else if(e===4){
			con_display = "none";
			font_size = M*1.5;
		}
		// equipa
		else if(e===26){
			criar_bloco.setAttribute("onmouseover","botoes('equipa')");
			con_display = "";
		}
		else if(e===25){
			con_display = "none";
			font_size = M*1.5;
		}
		else if(e===28){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.2;
		}
		// redes sociais
		else if(e===43){
			criar_bloco.setAttribute("onmouseover","botoes('redes_sociais')");
			con_display = "";
		}
		else if(e===35){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.3;
		}
		else if(e===36){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.1;
		}
		else if(e===39){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.2;
		}
		else if(e===40){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.2;
		}
		else if(e===41){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.15;
		}
		else if(e===42){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.3;
		}
		//lingua
		else if(e===17){
			criar_bloco.setAttribute("onmouseover","botoes('lingua')");
			con_display = "";
		}
		//prorigem
		else if(e===7){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		else if(e===8){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		else if(e===14){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		//design
		else if(e===9){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		else if(e===15){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		else if(e===19){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		//webdesign
		else if(e===21){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.3;
		}
		else if(e===22){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		else if(e===37){
			con_display = "none";
			font_size = M*1.5;
			font_c_v = "";
			b_top_c = b_height*0.4;
		}
		
		// cor do bloco
		if(e===0 || e===1 || e===2 || e===4 || e===6 || e===8 || e===9 || e === 11 ||e=== 12 || e=== 13 || e=== 14 || e=== 15 || e=== 17 || e === 20|| e === 21|| e === 22||  e === 23|| e === 24|| e === 25|| e === 26|| e === 29|| e === 33|| e === 34 || e === 35 || e === 37 || e===39 || e===42 || e===43){
			cor = "#";
			z_index = 1;

			// criar imagem
			var criar_imagem = document.createElement("img");
				criar_imagem.setAttribute("width",GB[e][3]);
				criar_imagem.setAttribute("height",GB[e][2]);
				criar_imagem.style.cssText = "display:block;border:0px;position:absolute;top:0px;left:0px;z-index:100";
			
			if(e!=2){
			if(e!=6){
			if(e!=13){
			if(e!=24){
			if(e!=29){
				// 2 a branca
				var criar_imagem_2 = document.createElement("img");
					criar_imagem_2.setAttribute("width",GB[e][3]);
					criar_imagem_2.setAttribute("height",GB[e][2]);
					criar_imagem_2.style.cssText = "display:block;border:0px;position:absolute;top:0px;left:0px;z-index:99";
			}
			}
			}
			}
			}
			
			// prorigem
			if(e === 11){
				criar_bloco.setAttribute("onmouseover","botoes('prorigem')");
				criar_imagem.setAttribute("src","imagens/b_preto.png");
				criar_imagem_2 = "";
				con_display = "";
			}
			// design
			else if(e === 12){
				criar_bloco.setAttribute("onmouseover","botoes('design')");
				criar_imagem.setAttribute("src","imagens/b_laranja.png");
				criar_imagem_2 = "";
				con_display = "";
			}
			// webdesign
			else if(e === 20){
				criar_bloco.setAttribute("onmouseover","botoes('webdesign')");
				criar_imagem.setAttribute("src","imagens/b_verde.png");
				criar_imagem_2 = "";
				con_display = "";
			}
			else if(e === 21){
				criar_imagem.setAttribute("src","imagens/b_21.png");
				criar_imagem_2.setAttribute("src","imagens/b_21_b.png");
				criar_imagem.setAttribute("height",bca*0.2161);
				criar_imagem_2.setAttribute("height",bca*0.2161);
				criar_imagem.style.cssText = "display:block;border:0px;position:absolute;bottom:0px;left:0px;z-index:100";
				criar_imagem_2.style.cssText = "display:block;border:0px;position:absolute;bottom:0px;left:0px;z-index:99";
				overflow = "";
			}
			else if(e === 23){
				criar_imagem.setAttribute("src","imagens/b_central.png");
				criar_imagem_2 = "";
				criar_bloco.setAttribute("onmouseover","botoes('central')");
				
				// var adicionar logotipo
				var logo_centro = document.createElement("img"),
					logo_petalas = document.createElement("img"),
					v_qua = (GB[23][3]*0.9).toFixed(4),
					v_qua_2 = (GB[23][3]*0.46).toFixed(4),
					v_m = ((GB[23][3]-v_qua)/2).toFixed(4),
					v_m_2 = ((GB[23][3]-v_qua_2)/2).toFixed(4);
				
				// centro
				logo_centro.setAttribute("id","logo_centro");
				logo_centro.setAttribute("src","imagens/logo_centro.png");
				logo_centro.setAttribute("width",v_qua_2);
				logo_centro.setAttribute("height",v_qua_2);
				logo_centro.style.cssText = "position:absolute;z-index:1000;left:"+v_m_2+"px;bottom:"+v_m_2+"px";
				
				// petalas
				logo_petalas.setAttribute("id","logo_petalas");
				logo_petalas.setAttribute("src","imagens/logo_petalas.png");
				logo_petalas.setAttribute("width",v_qua);
				logo_petalas.setAttribute("height",v_qua);
				logo_petalas.style.cssText = "position:absolute;z-index:1000;left:"+v_m+"px;bottom:"+v_m+"px";
				
				criar_bloco.appendChild(logo_centro);
				criar_bloco.appendChild(logo_petalas);

			}
			// marketing
			else if(e === 33){
				criar_bloco.setAttribute("onmouseover","botoes('marketing')");
				criar_imagem.setAttribute("src","imagens/b_vermelho.png");
				criar_imagem_2 = "";
				con_display = "";
			}
			// jogos
			else if(e === 34){
				criar_bloco.setAttribute("onmouseover","botoes('jogos')");
				criar_imagem.setAttribute("src","imagens/b_azul.png");
				criar_imagem_2 = "";
				con_display = "";
			}
			else{
				criar_imagem.setAttribute("src","imagens/b_"+e+".png");
				if(e!=2){
				if(e!=6){
				if(e!=13){
				if(e!=24){
				if(e!=29){
					criar_imagem_2.setAttribute("src","imagens/b_"+e+"_b.png");
				}
				}
				}
				}
				}
			}
			// adicionar imagem ao bloco
			criar_bloco.appendChild(criar_imagem);
			if(e!=2){
			if(e!=6){
			if(e!=13){
			if(e!=24){
			if(e!=29){
			if(criar_imagem_2 != ""){
				criar_bloco.appendChild(criar_imagem_2);
			}
			}
			}
			}
			}
			}
		}
		
		// adicionar conteudos
		b_conteudo = todos_conteudos[e];
		
		// adicionar conteudo
		criar_bloco.innerHTML += "<p style='z-index:1000;font-size:"+font_size+"px;margin-top:"+b_top_c+"px;position:relative;line-height:"+font_c_v+"px;display:"+con_display+"'>"+b_conteudo+"</p>";
		
		// adicionar css bloco
		criar_bloco.style.cssText = "position:absolute;width:"+b_width+"px;height:"+b_height+"px;background:"+cor+";top:"+(b_top)+"px;left:"+b_left+"px;display:none;overflow:"+overflow+"";
		
		// adicionar bloco 
		contentor_blocos.appendChild(criar_bloco);
		
		// função montagem
		if(e===43){
			montagem();
		}
	}

}

// MONTAGEM
function montagem(){
		
		// 3 fases
		// fase um: bloco central
		var blocos = document.getElementsByClassName("bloco"),
			contentor = document.getElementById("contentor_blocos"),
			contentor_t = contentor.offsetTop,
			contentor_h = contentor.offsetHeight,
			bloco_23 = blocos[23],
			bloco_11 = blocos[11],
			bloco_12 = blocos[12],
			bloco_20 = blocos[20],
			bloco_33 = blocos[33],
			bloco_34 = blocos[34],
			// detectar acções
			fase_2 = "inicio",
			fase_3;
			
			// activar display
			bloco_23.style.display = "";
			bloco_11.style.display = "";
			bloco_12.style.display = "";
			bloco_20.style.display = "";
			bloco_33.style.display = "";
			bloco_34.style.display = "";
			
		var bloco_top_23 = bloco_23.offsetTop,
			bloco_height_23 = bloco_23.offsetHeight,
			b_n_top_23 = -contentor_t-bloco_height_23;
			// reposicionar
			bloco_23.style.top = b_n_top_23+"px";
			
		// fase dois
		var bloco_bottom_11 = bloco_11.offsetTop,
			bloco_bottom_12 = bloco_12.offsetTop,
			bloco_bottom_20 = bloco_20.offsetTop,
			bloco_bottom_33 = bloco_33.offsetTop,
			bloco_bottom_34 = bloco_34.offsetTop,
			dbc = bloco_bottom_11-bloco_bottom_12,
			b_n_top_11 = contentor_h+contentor_t+dbc,
			b_n_top_12 = contentor_h+contentor_t;

			// reposicionar blocos
			// blocos baixo
			bloco_11.style.top = b_n_top_11+"px";
			bloco_20.style.top = b_n_top_11+"px";
			bloco_34.style.top = b_n_top_11+"px";
			// blocos cima
			bloco_12.style.top = b_n_top_12+"px";
			bloco_33.style.top = b_n_top_12+"px";
		
		
		// sistema
		// montar maquina
		function m_m(){
			// fase um
			// bloco central fora posição
			if(b_n_top_23+5 < bloco_top_23){
				// diminuir top
				b_n_top_23 = b_n_top_23+5;
				bloco_23.style.top = b_n_top_23+"px";
			}
			// bloco central dentro posição
			else{
				// Encaixa bloco
				bloco_23.style.top = bloco_top_23+"px";
			}
			
			
			// fase dois
			// blocos central: botoes
			// blocos central: botoes
			if(b_n_top_12-4.7 > bloco_bottom_12){
				// diminuir top
				b_n_top_12 = b_n_top_12-4.7;
				b_n_top_11 = b_n_top_11-4.7;
				// b baixo
				bloco_11.style.top = b_n_top_11+"px";
				bloco_20.style.top = b_n_top_11+"px";
				bloco_34.style.top = b_n_top_11+"px";
				// b cima
				bloco_12.style.top = b_n_top_12+"px";
				bloco_33.style.top = b_n_top_12+"px";
			}
			// bloco central dentro posição
			else if(fase_2 === "inicio"){
				// estado fase dois
				fase_2 = "fim";
				
				// Encaixa bloco
				// b baixo
				bloco_11.style.top = bloco_bottom_11+"px";
				bloco_20.style.top = bloco_bottom_11+"px";
				bloco_34.style.top = bloco_bottom_11+"px";
				// b cima
				bloco_12.style.top = bloco_bottom_12+"px";
				bloco_33.style.top = bloco_bottom_33+"px";
				
				// iniciar blocos centro
				fase_3 = "iniciar";
			}
			
			
			// fase tres
			// blocos centro
			if(fase_3 === "iniciar"){
				// iniciar loop e efeito opacidade
				
				// efeito opacidade
				efeito_opacidade(blocos[0]);
				efeito_opacidade(blocos[1]);
				efeito_opacidade(blocos[2]);
				efeito_opacidade(blocos[3]);
				efeito_opacidade(blocos[4]);
				efeito_opacidade(blocos[5]);
				efeito_opacidade(blocos[6]);
				efeito_opacidade(blocos[7]);
				efeito_opacidade(blocos[8]);
				efeito_opacidade(blocos[9]);
				efeito_opacidade(blocos[10]);
				
				efeito_opacidade(blocos[13]);
				efeito_opacidade(blocos[14]);
				efeito_opacidade(blocos[15]);
				efeito_opacidade(blocos[16]);
				efeito_opacidade(blocos[17]);
				efeito_opacidade(blocos[18]);
				efeito_opacidade(blocos[19]);
				
				efeito_opacidade(blocos[21]);
				efeito_opacidade(blocos[22]);
				
				efeito_opacidade(blocos[24]);
				efeito_opacidade(blocos[25]);
				efeito_opacidade(blocos[26]);
				efeito_opacidade(blocos[27]);
				efeito_opacidade(blocos[28]);
				efeito_opacidade(blocos[29]);
				efeito_opacidade(blocos[30]);
				efeito_opacidade(blocos[31]);
				efeito_opacidade(blocos[32]);
				
				efeito_opacidade(blocos[35]);
				efeito_opacidade(blocos[36]);
				efeito_opacidade(blocos[37]);
				efeito_opacidade(blocos[38]);
				efeito_opacidade(blocos[39]);
				efeito_opacidade(blocos[40]);
				efeito_opacidade(blocos[41]);
				efeito_opacidade(blocos[42]);
				efeito_opacidade(blocos[43]);
				
				// acabar intervalo
				clearInterval(i_m_m);
				
				// iniciar animação logotipo
				efeito_logo();
			}
		}
		var i_m_m = setInterval(m_m,30);
}

/* BLUR
function efeito_blur(b_selec){
	var tempo = -50,
		bloco = b_selec,
		valores = 0;

	// função
	function encaixe(){
		tempo++;
		
		if(tempo<1){
			valores++;
			// estilo
			b_selec.style.boxShadow = "0px 0px "+valores+"px #ffffff";
		}
		else if(tempo>0 && tempo<100){
			valores--;
			// estilo
			b_selec.style.boxShadow = "0px 0px "+valores+"px #ffffff";
		}
		else{
			clearInterval(i_encaixe);
			b_selec.style.boxShadow = "";
		}
	}
	var i_encaixe = setInterval(encaixe,50);
}*/

// OPACIDADE
function efeito_opacidade(b_selec){
	var tempo = 0,
		bloco = b_selec,
		bloco_id = bloco.getAttribute("id");
		
		// restrições
		bloco.style.opacity ="0";
		bloco.style.display ="";
		

	// função
	function opacidade(){
		tempo = tempo+5;
		
		// definir 
		bloco
		
		if(tempo<100){
			// estilo
			b_selec.style.opacity = tempo/100;
		}
		else{
			clearInterval(i_opacidade);
			b_selec.style.opacity = 1;
		}
	}
	var i_opacidade = setInterval(opacidade,100);
}


// LOGOTIPO
function efeito_logo(){

	// variaveis
	var l_c = document.getElementById("logo_centro"),
		l_p = document.getElementById("logo_petalas"),
		graus_c = 0,
		graus_p = 0;
	
	// janela inactiva
	window.onblur = function(){
		clearInterval(r_petalas);
		l_c.setAttribute("class","inactivo");
	}
	
	// definir tag
	l_c.setAttribute("class","activo");
	
	// janela activa
	window.onfocus = function(){
		l_c.setAttribute("class","activo");
		// detectar se esta inactivo
		if(document.getElementById("logo_centro").getAttribute("class").search("inactivo") === -1 && document.getElementById("logo_centro").style.webkitTransform === "" && document.getElementById("logo_petalas").style.webkitTransform === ""){
			efeito_logo();
		}
	}
	
	if(document.getElementById("logo_centro").getAttribute("class").search("inactivo") === -1 && document.getElementById("logo_centro").style.webkitTransform === "" && document.getElementById("logo_petalas").style.webkitTransform === ""){
		// repetir
		var r_petalas = setTimeout(efeito_logo,16000);
		
		// função
		function rotacao(){
			// rotação petalas
			// rotação centro
			if(graus_c-5>-360){
				graus_c= graus_c-5;
				l_c.style.webkitTransform = "rotate("+graus_c+"deg)";
			}
			else if(graus_p+5<360){
				l_c.style.webkitTransform = "";
				graus_p= graus_p+5;
				l_p.style.webkitTransform = "rotate("+graus_p+"deg)";
			}
			else{
				// se estiver inactivo para
				if(document.getElementById("logo_centro").getAttribute("class").search("inactivo") !== -1){
					clearInterval(r_petalas);
				}
				clearInterval(i_rotacao);
				l_c.style.webkitTransform = "";
				l_p.style.webkitTransform = "";
			}
		}
		var i_rotacao = setInterval(rotacao,50);
	}
}

// BOTÕES
function botoes(valor){
	
	// todos os blocos
	var blocos = document.getElementsByClassName("bloco");
	
	// CENTRAL
	// loop para displaysar 0 a todos
	for(a=0;a<blocos.length;a++){
		if(a===0 || a=== 11 ||  a=== 12 || a=== 20 || a=== 26 || a=== 33 || a=== 34 || a=== 43){
			blocos[a].getElementsByTagName("p")[0].style.display = "";
		}
		else{
			blocos[a].getElementsByTagName("p")[0].style.display = "none";
		}
	}
	//background contactos
	blocos[0].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[1].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[3].style.background = "#615d5c";
	blocos[4].getElementsByTagName("img")[1].style.zIndex="99";
	//background equipa
	blocos[25].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[26].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[28].style.background = "#615d5c";
	//background redes sociais
	blocos[35].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[36].style.background = "#615d5c";
	blocos[39].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[40].style.background = "#615d5c";
	blocos[41].style.background = "#615d5c";
	blocos[42].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[43].getElementsByTagName("img")[1].style.zIndex="99";
	//lingua
	blocos[17].getElementsByTagName("img")[1].style.zIndex="99";
	// prorigem
	blocos[7].style.background = "#615d5c";
	blocos[8].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[14].getElementsByTagName("img")[1].style.zIndex="99";
	// design
	blocos[9].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[15].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[19].style.background = "#615d5c";
	// webdesign
	blocos[21].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[22].getElementsByTagName("img")[1].style.zIndex="99";
	blocos[37].getElementsByTagName("img")[1].style.zIndex="99";
	
	// conteudo
	blocos[17].getElementsByTagName("p")[0].innerHTML = "pt / fr / en";
	blocos[17].getElementsByTagName("p")[0].style.display = "";
	
	// CONTACTOS
	if(valor === "contactos"){
		//background
		blocos[0].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[1].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[3].style.background = "#808080";
		blocos[4].getElementsByTagName("img")[1].style.zIndex="101";

		// conteudo
		blocos[1].getElementsByTagName("p")[0].style.display = "";
		blocos[3].getElementsByTagName("p")[0].style.display = "";
		blocos[4].getElementsByTagName("p")[0].style.display = "";
	}
	// EQUIPA
	if(valor === "equipa"){
		//background
		blocos[25].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[26].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[28].style.background = "#808080";

		// conteudo
		blocos[25].getElementsByTagName("p")[0].style.display = "";
		blocos[28].getElementsByTagName("p")[0].style.display = "";
	}
	// REDES SOCIAIS
	if(valor === "redes_sociais"){
		//background
		blocos[35].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[36].style.background = "#808080";
		blocos[39].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[40].style.background = "#808080";
		blocos[41].style.background = "#808080";
		blocos[42].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[43].getElementsByTagName("img")[1].style.zIndex="101";
	
		//conteudo
		blocos[35].getElementsByTagName("p")[0].style.display = "";
		blocos[36].getElementsByTagName("p")[0].style.display = "";
		blocos[39].getElementsByTagName("p")[0].style.display = "";
		blocos[40].getElementsByTagName("p")[0].style.display = "";
		blocos[41].getElementsByTagName("p")[0].style.display = "";
		blocos[42].getElementsByTagName("p")[0].style.display = "";
		blocos[43].getElementsByTagName("p")[0].style.display = "";
	}
	// LINGUA
	if(valor === "lingua"){
		//background
		blocos[17].getElementsByTagName("img")[1].style.zIndex="101";
		
		//conteudo
		blocos[17].getElementsByTagName("p")[0].innerHTML = "";
	}
	// PRORIGEM
	if(valor === "prorigem"){
		//background
		blocos[7].style.background = "#808080";
		blocos[8].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[14].getElementsByTagName("img")[1].style.zIndex="101";
		
		// conteudo
		blocos[7].getElementsByTagName("p")[0].style.display = "";
		blocos[8].getElementsByTagName("p")[0].style.display = "";
		blocos[14].getElementsByTagName("p")[0].style.display = "";
	}
	// DESIGN
	if(valor === "design"){
		//background
		blocos[9].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[15].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[19].style.background = "#808080";
		
		// conteudo
		blocos[9].getElementsByTagName("p")[0].style.display = "";
		blocos[15].getElementsByTagName("p")[0].style.display = "";
		blocos[19].getElementsByTagName("p")[0].style.display = "";
	}
	// WEBDESIGN
	if(valor === "webdesign"){
		//background
		blocos[21].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[22].getElementsByTagName("img")[1].style.zIndex="101";
		blocos[37].getElementsByTagName("img")[1].style.zIndex="101";
		
		// conteudo
		blocos[21].getElementsByTagName("p")[0].style.display = "";
		blocos[22].getElementsByTagName("p")[0].style.display = "";
		blocos[37].getElementsByTagName("p")[0].style.display = "";
	}
}


// LOG

// UTILIZAR IMAGENS NOS CANTOS POIS OS BORDERS SAO CONTADOS COMO BLOCOS
</script>
</body>

</html>
