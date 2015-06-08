<?
	$msg = "";
	$msg .= @$_GET['msg'];
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
	define("TITULO","Criar Módulo");
	switch($_SESSION['admCargo']){
		case "dir":
		case "rca":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, modulo" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('criar-modulo');">
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
					<div class="panel-heading"> Dados do Módulo</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-criar-modulo" action="/acount/admin/criar_modulo.php" method="post">
                            <div class="form-group" id="div-admin-nome-mod" >
                                <label class="col-md-3 control-label">
                                    <span>Nome do Módulo</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="admin-nome-mod" name="admin-nome-mod" type="text" class="form-control"
                                    placeholder="Digite o Nome do Módulo" title="Digite o Nome do Módulo" >
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-admin-nome-mod -->
                            
                            <div class="form-group" id="div-admin-descricao-mod" >
                                <label class="col-md-3 control-label">
                                    <span>Descrição do Módulo</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="admin-descricao-mod" name="admin-descricao-mod" type="text" class="form-control"
                                    placeholder="Digite a Descrição do Módulo" title="Digite a Descrição do Módulo" >
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-admin-descricao-mod -->
                            
                            <div id="dados-invalidos">
                            	<?
									if($msg != ""){
										echo $msg;
									}
								?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-mod-enviar" >
                                    <input type="button" id="btn-mod-enviar" value="Enviar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-mod-enviar','#form-criar-modulo',ValidarCriarModulo());"/>
                                </div> <!-- div-btn-mod-enviar -->
                            </div> <!-- form-group -->
						</form>
			 		</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
