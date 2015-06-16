<?
	$msgSenha = "";
	$msgSenha .= @$_GET['msgSenha'];
	$msgEmail = "";
	$msgEmail .= @$_GET['msgEmail'];
	$msgDados = "";
	$msgDados .= @$_GET['msgDados'];
	
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "professor":
			header("Location: /acount/adminprof/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
	define("TITULO","Configurações");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, configuracoes" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('configuracao-admin');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Senha</div> <!-- panel-heading -->
					<div class="panel-body">
                    	<form class="form-horizontal" id="form-adm-alterar-senha" method="post" action="alterar_admin.php?acao=senha">
                        	<div class="form-group" id="div-adm-alterar-senha-antiga">
                            	<label class="col-md-3 control-label">
                                	<span>Senha Atual: </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" id="adm-alterar-senha-antiga" class="form-control" 
                                    name="adm-alterar-senha-antiga" placeholder="Digite sua Senha atual"
                                    title="Digite sua Senha atual" size="40" autofocus />
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-senha-antiga -->
                            <div class="form-group" id="div-adm-alterar-senha-nova">
                            	<label class="col-md-3 control-label">
                                	<span>Nova Senha: </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" id="adm-alterar-senha-nova" class="form-control"
                                     name="adm-alterar-senha-nova" placeholder="Digite a sua Nova senha"
                                     title="Digite a sua Nova senha" size="40" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-senha-nova -->
                            <div class="form-group" id="div-adm-alterar-senha-Confirmar">
                            	<label class="col-md-3 control-label">
                                	<span>Confirmar Senha: </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" id="adm-alterar-senha-Confirmar" class="form-control" 
                                    name="adm-alterar-senha-Confirmar" placeholder="Confirme a sua nova Senha" 
                                    title="Confirme a sua nova Senha" size="40" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-senha-Confirmar -->
                            
                            <div id="dados-invalidos">
								<?	if($msgSenha != ""){
                                        echo $msgSenha;
                                    }
                                ?>
                            </div>  <!-- dados-invalidos -->                           
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-alterar-enviar">
                            		<input type="button" id="btn-adm-alterar-enviar" class="btn btn-default btn-md pull-right" value="Alterar Senha" onClick="botoesEnviar('#btn-adm-alterar-enviar','#form-adm-alterar-senha',ValidarAdminConfig());"/>
                            	</div> <!-- div-alterar-senha-Confirmar -->
                            </div> <!-- form-group -->
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-8 -->
        </div> <!-- row -->   
	</section> <!-- main -->
</body>

</html>
