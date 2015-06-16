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
		case "administracao":
			header("Location: /acount/admin/");
		break;
	}

	define('TITULO','Página Inicial');
	$msg = "";
	$msg .= @$_GET['msg'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, index, pagina inicial" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('al-index');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-lg-12">
				<div class="alert bg-primary" role="alert">
					<span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo à Administração do Aluno - Sistema de Gestão de Notas <a href="#" class="pull-right"></a>
				</div>
            </div>
        </div>
        
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Sobre a Página de Administração do Aluno</div>
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.</p>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-12 -->
           <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Observação sobre Permissões na Avaliação de Qualidade Institucional</div>
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.<br/>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.</p>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-12 -->
        </div> <!-- row -->	
		
	</section> <!-- main -->
    <?
		if($msg != ""){
			echo "<script type=\"text/javascript\">
					  alert('$msg');
				  </script>";
		}
	?>
</body>
</html>
