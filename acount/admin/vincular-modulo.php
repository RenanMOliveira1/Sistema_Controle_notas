<?
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
	define("TITULO","Vincular Módulo à Programa");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
		case "rca":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('vinc-prof');">
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div><!-- row -->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div>
		</div><!-- row -->
		
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados da Vinculação</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="vincular_mod_exe.php" method="post" id="form-vincular-mod">
                            <div class="form-group" id="div-vincular-mod-modulo">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Módulo</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-mod-modulo" 
                                    name="vincular-mod-modulo" title="Escolha o Módulo" >
                                        <option value="Modulo#1">Modulo #1</option>
                                        <option value="Modulo#2">Modulo #2</option>
                                        <option value="Modulo#3">Modulo #3</option>
                                        <option value="Modulo#4">Modulo #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-mod-modulo -->
                            
                            <div class="form-group" id="div-vincular-mod-programa">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Programa</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-mod-programa" 
                                    name="vincular-mod-programa" title="Escollha o Programa" >
                                        <option value="Programa#1">Programa #1</option>
                                        <option value="Programa#2">Programa #2</option>
                                        <option value="Programa#3">Programa #3</option>
                                        <option value="Programa#4">Programa #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-mod-programa -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-mod-enviar">
                                <input type="button" id="btn-vinc-mod-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-vinc-mod-enviar','#form-vincular-mod',true);"/>
                            </div> <!-- div-btn-vinc-mod-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
	    </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
