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
	define("TITULO","Excluir Laboratório");
		switch($_SESSION['admCargo']){
		case "ped":
		case "rca":
		case "ass":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	include("../../controle/admin.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, professor, cadastrar" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('excluir-lab');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Selecionar Laboratório</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-excluir-lab" action="/acount/admin/excluir_laboratorio.php" method="post">
                        	<div class="form-group" id="div-excluir-lab-selLab" >
                                <label class="col-md-3 control-label">
                                	<span>Laboratório</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="excluir-lab-selLab" name="excluir-lab-selLab"
                                    title="Escolha o Laboratório" >
                                        <option value="Laboratorio#1">Laboratorio #1</option>
                                        <option value="Laboratorio#2">Laboratorio #2</option>
                                        <option value="Laboratorio#3">Laboratorio #3</option>
                                        <option value="Laboratorio#4">Laboratorio #4</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-excluir-lab-selLab -->
                            
                            <div id="dados-invalidos">
                            	<?= @$GLOBALS['msg']?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-excluir-lab">
                                    <input type="button" id="btn-excluir-lab" value="Excluir" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-excluir-lab','#form-excluir-lab',true);"/>
                                </div> <!-- div-btn-excluir-lab -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
