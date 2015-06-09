<?
	session_start();
	$msg = "";
	$msg = @$_GET['msg'];
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
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>
    
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('admin-index');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
          
        <div class="row">
			<div class="col-lg-12">
				<div id="div-msg-bemVindo"class="alert bg-primary" role="alert">
					<span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo à Administração do SGA - Sistema de Gestão de Notas <a href="#" class="pull-right"></a>
				</div> <!-- div-msg-bemVindo -->
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
        
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Sobre a Página de Administração</div> <!-- panel-heading -->
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.</p>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-12 -->
           
           <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Observação sobre Permissões na Administração</div> <!-- panel-heading -->
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.<br/>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed nulla id massa egestas scelerisque. Donec interdum augue eu augue facilisis, ut imperdiet metus euismod. Nam nec arcu ligula. Maecenas vulputate interdum eros, non iaculis sem dignissim et. Suspendisse suscipit magna ac erat sollicitudin pretium. Ut facilisis non quam eget venenatis. Maecenas non lacus erat. Etiam ut velit posuere, blandit massa et, ultrices ligula. Vivamus vel lectus a magna vulputate molestie.</p>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-12 -->
        </div> <!-- row -->
        
	</section> <!-- main -->
</body>
<script type="text/javascript">
	<? 
		if($msg != ""){
			echo "alert('$msg');";
	}
	?>
</script>

</html>
