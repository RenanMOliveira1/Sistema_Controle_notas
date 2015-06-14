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
	define("TITULO","Vincular Módulo à Professor");
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
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('vinc-prof');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados da Vinculação</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="vincular_prof_exe.php" method="post" id="form-vincular-prof">
                            <div class="form-group" id="div-vincular-prof-prof">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Professor</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-prof-prof" 
                                    name="vincular-prof-prof" title="Escolha o Professor" >
                                        <option value="Professor#1">Professor #1</option>
                                        <option value="Professor#2">Professor #2</option>
                                        <option value="Professor#3">Professor #3</option>
                                        <option value="Professor#4">Professor #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-prof-prof -->
                            
                            <div class="form-group" id="div-vincular-prof-modulo">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Módulo</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-prof-modulo" 
                                    name="vincular-prof-modulo" title="Escollha o Módulo" >
                                        <option value="Modulo#1">Módulo #1</option>
                                        <option value="Modulo#2">Módulo #2</option>
                                        <option value="Modulo#3">Módulo #3</option>
                                        <option value="Modulo#4">Módulo #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-prof-modulo -->
                            
                            <div id="dados-invalidos"></div> <!-- dados-invalidos -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-prof-enviar">
                                <input type="button" id="btn-vinc-prof-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-vinc-prof-enviar','#form-vincular-prof',ValidarVincProf());"/>
                            </div> <!-- div-btn-vinc-prof-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
	    </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
