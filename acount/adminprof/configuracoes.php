<?
	$msgSenha = "";
	$msgSenha .= @$_GET['msgSenha'];
	$msgEmail = "";
	$msgEmail .= @$_GET['msgEmail'];
	$msgDados = "";
	$msgDados .= @$_GET['msgDados'];

	session_start();
	define("TITULO", "Configurações");
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "administracao":
			header("Location: /acount/admin/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, configuracoes" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Professor - SGA</title>

    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('configuracoes-prof');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Senha</div>
					<div class="panel-body">
                    	<form id="form-alterar-senha" method="post" action="/controle/professor.php?acao=alteracao&tipo=senha">
                        	<div class="form-group" id="div-alterar-senha-antiga">
                            	<label>
                                	<span>Senha Atual: </span>
                                    <input type="password" id="alterar-senha-antiga" class="form-control" name="alterar-senha-antiga" title="Digite sua Senha atual" placeholder="Digite sua Senha atual" size="30"/>
                                </label>
                            </div> <!-- div-alterar-senha-antiga -->
                            <div class="form-group" id="div-alterar-senha-nova">
                            	<label>
                                	<span>Nova Senha: </span>
                                    <input type="password" id="alterar-senha-nova" class="form-control" name="alterar-senha-nova" title="Digite a sua Nova senha" placeholder="Digite a sua Nova senha" size="30"/>
                                </label>
                            </div> <!-- div-alterar-senha-nova -->
                            <div class="form-group" id="div-alterar-senha-confirmar">
                            	<label>
                                	<span>Confirmar Senha: </span>
                                    <input type="password" id="alterar-senha-Confirmar" class="form-control" name="alterar-senha-Confirmar" title="Confirme a sua nova Senha" placeholder="Confirme a sua nova Senha" size="30"/>
                                </label>
                            </div> <!-- div-alterar-senha-confirmar -->
                            <div id="dados-invalidos">
								<?	if($msgSenha != ""){
                                        echo $msgSenha;
                                    }
                                ?>
                            </div> <!-- dados-invalidos --> 
                            <div class="form-group" id="div-alterar-senha-confirmar">
                            	<input type="button" id="btn-alterar-enviar" class="btn btn-primary" value="Alterar Senha"/>
                            </div> <!-- div-alterar-senha-confirmar -->
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-12 -->
            
            <div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Dados</div>
					<div class="panel-body">
                    	<form id="formulario-alterar-cadastro" action="/controle/professor.php?acao=alteracao&tipo=dados" method="post">
                            <div class="form-campos" id="div-prof-nome">
                                <label>
                                    <span>Nome: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-prof-nome" name="alt-prof-nome" size="70" class="form-control"
                                    maxlength="150" title="Entre com o novo Nome" value="<?= utf8_encode($_SESSION['profNome'])?>"
                                    placeholder="Digite o seu Nome Completo" autofocus />
                                </label>
                            </div> <!-- div-nome -->
                                
                            <div class="form-campos" id="div-prof-cpf">
                                <label>
                                    <span>CPF: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-prof-cpf" name="alt-prof-cpf" class="form-control" maxlenght="11" size="20" value="<?= $_SESSION['profCpf']?>"
                                    title="Entre com o seu CPF" placeholder="Digite o novo CPF" />
                                </label>
                            </div> <!-- div-cpf -->
                            
                            <div id="dados-invalidos">
                            	<?	if($msgDados != ""){
                                        echo $msgDados;
                                    }
                                ?>
                            </div> <!-- dados-invalidos -->                            
                        <div id="div-btn-prof-alterarDados">
                            <input type="button" id="btn-prof-alterarDados" class="btn btn-primary" value="Alterar Dados" />
                        </div> <!-- div-btn-enviar -->
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
   
	</section> <!-- main -->
</body>

</html>
