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
	define("TITULO","Cadastrar Professores");
		switch($_SESSION['admCargo']){
		case "dir":
		case "rca":
		case "ass":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
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

<body onLoad="SidebarActive('cad-prof');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Dados do Professor</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-cadastrar-prof" action="/controle/professor.php?acao=cadastro" method="post">
                            <div class="form-group" id="div-admin-prof-nome" >
                                <label class="col-md-3 control-label">
                                    <span>Nome</span>
                                </label>
                                <div class="col-md-9">
                                	<input id="admin-prof-nome" name="admin-prof-nome" type="text" class="form-control"
                                	 title="Digite o Nome do Professor" placeholder="Digite o Nome do Professor" autofocus >
                                </div> <!-- col-md-3 control-label -->
                            </div> <!-- div-admin-prof-nome -->

                            <div class="form-group" id="div-admin-prof-cpf" >
                                <label class="col-md-3 control-label">
                                    <span>CPF</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="admin-prof-cpf" name="admin-prof-cpf" type="text" class="form-control"
                                    placeholder="Digite o CPF do Professor" title="Digite o CPF do Professor" >
                                </div> <!-- col-md-3 control-label -->
                            </div> <!-- div-admin-prof-cpf -->
							
                            <div id="dados-invalidos">
                            	<?
									if($msg != ""){
										echo "$msg";
									}
								?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-cad-prof-enviar">
                                    <input type="button" id="btn-cad-prof-enviar" value="Enviar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-cad-prof-enviar','#form-cadastrar-prof',ValidarCadastrarProf());"/>
                                </div> <!-- div-btn-cad-prof-enviar -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
