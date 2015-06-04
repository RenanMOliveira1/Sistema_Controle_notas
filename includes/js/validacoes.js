// JavaScript Document

function SidebarActive(opcaoSidebar) {
	switch (opcaoSidebar) {
		case 'disciplinas':
			$("#navDisciplinas").addClass("active");
			break;
		case "notas":
			$("#navNotas").addClass("active");
			break;
		case "perfil":
			$("#navPerfil").addClass("active");
			break;
		case "configuracoes":
			$("#navConfiguracoes").addClass("active");
			break;
		case "configuracoes-prof":
			$("#navConfiguracoesProf").addClass("active");
			break;
		case "lancar-notas":
			$("#navLancarNotas").addClass("active");
			break;
		case "modulos-prof":
			$("#navModulosProf").addClass("active");
			break;
	}
}

function NavActive(opcaoMenu) {

	switch (opcaoMenu) {
		case 'index':
			$("#opcaoMenu-index").addClass("active");
			break;
		case "sobre":
			$("#opcaoMenu-sobre").addClass("active");
			break;
		case "contato":
			$("#opcaoMenu-contato").addClass("active");
			break;
	}
}

function ValidarEmail(pEmail) {
	var posicaoArroba; 
	var tamanhoEmail = pEmail.length;
	
	if ((posicaoArroba = pEmail.indexOf("@")) < 1) { return false; }
	if (pEmail.indexOf("@", posicaoArroba+1) >= 0) { return false; }
	if (posicaoArroba==(tamanhoEmail-1)) { return false; }
	if (pEmail.indexOf(".") == 0) { return false; }
	if (pEmail.lastIndexOf(".") == (tamanhoEmail-1)) { return false; }
	if (pEmail.indexOf("..") >= 0) { return false; }
	if (pEmail.indexOf("@.") >= 0) { return false; }
	if (pEmail.indexOf(".", posicaoArroba+1) < 0 ) { return false; }
	if (pEmail.indexOf("$") >= 0) { return false; }
	if (pEmail.indexOf("#") >= 0) { return false; }

	return true;
}

function ValidarCPF(pCPF) {
	var MODULO_11=11;
	var soma, resto, dv1, dv2;

    if (pCPF.length != 11) { return false;}
	
	if (pCPF=="11111111111" || 
		pCPF=="22222222222" || 
		pCPF=="33333333333" || 
		pCPF=="44444444444" || 
		pCPF=="55555555555" || 
		pCPF=="66666666666" || 
		pCPF=="77777777777" || 
		pCPF=="88888888888" || 
		pCPF=="99999999999") {
		return false;
	}
	
	soma = (pCPF.charAt(0)*10) +
	       (pCPF.charAt(1)*9) +
           (pCPF.charAt(2)*8) +
           (pCPF.charAt(3)*7) +
           (pCPF.charAt(4)*6) +
           (pCPF.charAt(5)*5) +
           (pCPF.charAt(6)*4) +
           (pCPF.charAt(7)*3) +
           (pCPF.charAt(8)*2);

	resto = (soma % 11);
	if (resto < 2){
		dv1 = 0;
	} else { 
		dv1 = MODULO_11-resto;
	}
	
	if (dv1 != pCPF.charAt(9)){ return false;}

	soma = (pCPF.charAt(0)*11) + 
           (pCPF.charAt(1)*10) + 
           (pCPF.charAt(2)*9) + 
           (pCPF.charAt(3)*8) + 
           (pCPF.charAt(4)*7) + 
           (pCPF.charAt(5)*6) + 
           (pCPF.charAt(6)*5) + 
           (pCPF.charAt(7)*4) + 
           (pCPF.charAt(8)*3) + 
           (dv1*2);
		
	resto = (soma % MODULO_11);
	if (resto < 2){
		dv2 = 0;
	}
	else {
		dv2 = MODULO_11-resto;
	}
	
	if (dv2 != pCPF.charAt(10)){
		return false;
	}
		
	return true;
}

function ValidarData(Data) {
	Data = Data.substring(0,10);
	var dma = -1;
	var data = Array(3);
	var ch = Data.charAt(0); 
	
	for(i=0; i < Data.length && (( ch >= '0' && ch <= '9' ) || ( ch == '/' && i != 0 ) ); ){
		data[++dma] = '';
		
		if(ch!='/' && i != 0) {return false;}
		if(i != 0 ) {ch = Data.charAt(++i);}
		if(ch=='0') {ch = Data.charAt(++i);}
		
		while( ch >= '0' && ch <= '9' ){
			data[dma] += ch;
			ch = Data.charAt(++i);
		} 
	}
	
	if(ch!='') {return false;}
	if(data[0] == '' || isNaN(data[0]) || parseInt(data[0]) < 1) {return false;}
	if(data[1] == '' || isNaN(data[1]) || parseInt(data[1]) < 1 || parseInt(data[1]) > 12) {return false;}
	if(data[2] == '' || isNaN(data[2]) || ((parseInt(data[2]) < 0 || parseInt(data[2]) > 99 ) && (parseInt(data[2]) < 1900 || parseInt(data[2]) > 9999))) {return false;}
		
	if (data[2] < 50)  {data[2] = parseInt(data[2]) + 2000;}
	else if(data[2] < 100) {data[2] = parseInt(data[2]) + 1900;}
		
	switch(parseInt(data[1])) {
		case 2: 
			if(((parseInt(data[2])%4!=0 || (parseInt(data[2])%100==0 && parseInt(data[2])%400!=0)) && parseInt(data[0]) > 28) || parseInt(data[0]) > 29 ) {return false;}
			break; 
		case 4: case 6: case 9: case 11: 
			if(parseInt(data[0]) > 30) {return false;} 
			break;
		default: 
			if(parseInt(data[0]) > 31) {return false;}
	}
	
	return true; 
}

function ValidarCEP(cep) {
	// Caso o CEP não esteja nesse formato ele é inválido!
	if (/\d{2}\\d{3}\-\d{3}/.test(cep) || /\d{5}\-\d{3}/.test(cep) || /\d{8}/.test(cep))
    	return true;
else
    return false;
}

//Validar Campos da Pagina Cadastro
function ValidarCadastro() {
	var msg = "";
	
	if ($("#nome").val() == "") {
		msg += "Campo Nome é Obrigatorio<br/>";
		$("#div-nome").addClass(" has-error");
	}
	if ($("#logradouro").val() == "") { 
		msg += "Campo Logradouro é Obrigatorio<br/>";
		$("#div-logradouro").addClass(" has-error");
	}
	if ($("#bairro").val() == "") { 
		msg += "Campo Bairro é Obrigatorio<br/>";
		$("#div-bairro").addClass(" has-error");
	}
	if ($("#cidade").val() == "") { 
		msg += "Campo Cidade é Obrigatorio<br/>";
		$("#div-cidade").addClass(" has-error");
	}
	
	if (isNaN($("#telefone-fixo").val())) { 
		msg += "Campo Telefone só se Aceita Numero";
		$("#div-telefone-fixo").addClass(" has-error");
	}
	if (isNaN($("#telefone-celular").val())) { 
		msg += "Campo Celular só se Aceita Numero";
		$("#div-telefone-fixo").addClass(" has-error");
	}
	
	var numero = $("#numero").val();
	if (numero == "") { 
		msg += "Campo Numero é Obrigatorio<br/>";
		$("#div-numero").addClass(" has-error");
	} else if (isNaN(numero)) {
		msg += "Campo Numero só se Aceita Numeros<br/>";
		$("#div-numero").addClass(" has-error");
	}
	
	var senha = $("#senha").val();
	var confirmarSenha = $("#confirmar-senha").val();
	if (senha == "") { 
		msg += "Campo Password é Obrigatorio<br/>";
		$("#div-senha").addClass(" has-error");
	}
	if (confirmarSenha == "") { 
		msg += "Campo Confirmar Password é Obrigatorio<br/>";
		$("#div-confirmar-senha").addClass(" has-error");
	}	
	if (senha != confirmarSenha) { 
		msg += "Password e Confirmar Password devem ser Iguais<br/>";
		$("#div-senha").addClass(" has-error");
		$("#div-confirmar-senha").addClass(" has-error");
	}
	
	var cep = $("#cep").val();
	if (cep == "") {
		msg += "Campo CEP é Obrigatorio<br/>";
		$("#div-cep").addClass(" has-error");
	} else if (!ValidarCEP(cep)) {
		msg += "CEP Inválido<br/>";
		$("#div-cep").addClass(" has-error");
	}
	
	var cpf = $("#cpf").val();
	if (cpf == "") { 
		msg += "Campo CPF é Obrigatorio<br/>";
		$("#div-cpf").addClass(" has-error");
	} else if (!ValidarCPF(cpf)) {
		msg += "CPF inválido.<br/>";
		$("#div-cpf").addClass(" has-error");
	}
	
	var data = $("#data-nascimento").val();
	if (data == "") {
		msg += "Campo Data de Nascimento é Obrigatorio<br/>";
		$("#div-nascimento").addClass(" has-error");
	} else if (!ValidarData(data)) {
		msg += "Data Inválida<br/>";
		$("#div-nascimento").addClass(" has-error");
	}
	
	var email = $("#email").val();
	if (email == "") {
		msg += "Campo Email é Obrigatorio<br/>";
		$("#div-email").addClass(" has-error");
	} else if (!ValidarEmail(email)) {
		msg += "E-mail inválido<br />";
		$("#div-email").addClass(" has-error");	
	}

	if (msg != "") {
		alert('Dados Inválidos! Verifique e Corrija');
		$("#dados-invalidos").html(msg);
		return false;}
	
	return true;
}

//Validar Campos da Página Login
function ValidarLogin() {
	var msg = "";
	
	if ($("#login-senha").val() == "") { 
		msg += "Campo Senha é Obrigatorio<br/>";
		$("#div-login-senha").addClass(" has-error");	
	}
	if ($("#usuario").val() == "") { 
		msg += "Campo Email é Obrigatorio<br/>";
		$("#div-login-usuario").addClass(" has-error");	
	}
	
	if (msg != "") {
		$("#dados-invalidos").html(msg);
		return false;}
	
	return true;
}

//Validar Campos da Página Contato
function ValidarContato() {
	var msg = "";
	
	if ($("#nome-contato").val() == "") { 
		msg += "Campo Nome é Obrigatório<br/>";
		$("#div-contato-nome").addClass(" has-error");	
	}
	if ($("#assunto").val() == "") { 
		msg += "Campo Assunto é Obrigatório<br/>";
		$("#div-contato-assunto").addClass(" has-error");	
	}
	if ($("#mensagem").val() == "") { 
		msg += "Campo Mensagem é Obrigatório<br/>";
		$("#div-contato-mensagem").addClass(" has-error");	
	}
	
	var email = $("#email-contato").val();
	if (email == "") {
		msg += "Campo Email é Obrigatorio<br/>";
		$("#div-contato-email").addClass(" has-error");	
	} else if (!ValidarEmail(email)) {
		msg += "E-mail inválido<br />";
		$("#div-contato-email").addClass(" has-error");	
	}
	
	if (msg != "") {
		$("#dados-invalidos").html(msg);
		return false;}
	
	return true;	
}

function ValidarRecuperarSenha() {
	
	var email = $("#restaurar-senha-email").val();
	if (email == "") {
		$("#dados-invalidos").html("Campo Email é Obrigatório");
		$("#div-recuperarSenha-email").addClass(" has-error");
		return false;
	} else if (!ValidarEmail(email)) {
		$("#dados-invalidos").html("Entre com um Email Válido");
		$("#div-recuperarSenha-email").addClass(" has-error");
		return false;
	}
	
	return true;
}

function botoesEnviar(idBotao, idFormulario, funcaoDeValidar) {
	$(document).ready(function(){
		$(idBotao).click(function() {
			if (funcaoDeValidar) {
				$(idFormulario).submit();
			}
		});
	});
}

jQuery(function($) {'use strict',

	//Slide da Página Inicial
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
	});


	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Iniciando o Plugin WOW 
	new WOW().init();

	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});
	
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
});
