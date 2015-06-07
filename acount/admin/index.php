<?
	session_start();
	$msgExiste = "";
	$msgExiste = @$_GET['msg'];
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
	define("TITULO","Admin: Página Incial");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, administracao, programa" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('criar-programa');">
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/acount/admin/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div> <!-- row -->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
		
        <div class="row">
			<div class="col-lg-12">
				<div class="alert bg-primary" role="alert">
					<span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo à Administração do SGA - Sistema de Gestão de Notas <a href="#" class="pull-right"></a>
				</div>
            </div>
        </div>
        
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Sobre a Página de Administração</div>
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.</p>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-12 -->
           <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Observação sobre Permissões na Administração</div>
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.<br/>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.</p>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-12 -->
        </div> <!-- row -->
        
	</div> <!-- main -->
</body>

</html>
