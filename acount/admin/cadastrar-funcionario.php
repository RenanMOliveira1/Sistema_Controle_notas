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
	define("TITULO","Cadastrar Funcionário da Administração");
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

<body onLoad="SidebarActive('cad-func');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Dados do Funcionário</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-cadastrar-func" action="/controle/cadastrar_funcionario_exe.php" method="post">
                        	<div class="form-group" id="div-cadastrar-func-cargo" >
                                <label class="col-md-3 control-label">
                                	<span>Turno</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="cadastrar-func-cargo" name="cadastrar-func-cargo"
                                    title="Escolha o Cargo" >
                                        <option value="rcs">RCA</option>
                                        <option value="ass">Assistente da Administração</option>
                                        <option value="dir">Direção</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-cadastrar-func-cargo -->
                            
                            <div class="form-group" id="div-cadastrar-func-nome" >
                                <label class="col-md-3 control-label">
                                    <span>Nome</span>
                                </label>
                                <div class="col-md-9">
                                	<input id="cadastrar-func-nome" name="cadastrar-func-nome" type="text" class="form-control"
                                	 title="Digite o Nome do Funcionário" placeholder="Digite o Nome do Funcionário" autofocus >
                                </div> <!-- col-md-3 control-label -->
                            </div> <!-- div-cadastrar-func-nome -->

                            <div class="form-group" id="div-cadastrar-func-cpf" >
                                <label class="col-md-3 control-label">
                                    <span>CPF</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="cadastrar-func-cpf" name="cadastrar-func-cpf" type="text" class="form-control"
                                    placeholder="Digite o CPF do Funcionário" title="Digite o CPF do Funcionário" >
                                </div> <!-- col-md-3 control-label -->
                            </div> <!-- div-cadastrar-func-cpf -->
							
                            <div id="dados-invalidos">
                            	<?
									if($msg != ""){
										echo "$msg";
									}
								?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-cadastrar-func">
                                    <input type="button" id="btn-cadastrar-func" value="Enviar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-cadastrar-func','#form-cadastrar-func',ValidarCadastrarFunc());"/>
                                </div> <!-- div-btn-cadastrar-func -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
