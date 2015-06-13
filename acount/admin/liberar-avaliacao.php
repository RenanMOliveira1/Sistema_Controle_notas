<?
	session_start();
	$msg = "";
	$msg .= @$_GET['msg'];
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
	define("TITULO","Liberar Avaliação Institucional às Turmas");
	switch($_SESSION['admCargo']){
		case "ass":
		case "dir":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
	}
	
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

<body onLoad="SidebarActive('liberar-acesso');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		<div class="row">
            <div class="col-md-9">
                <div class="panel panel-default"> 
                    <div class="panel-heading">Turmas Cadastradas</div> <!-- panel panel-default -->
                    <div class="table-responsive panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-field="programa" data-align="right">Programa</th>
                                        <th data-field="nome-turma">Nome da Turma</th>
                                        <th data-field="situacao-liberacao">Situação da Liberação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Programa #1</td>
                                        <td>Turma #1</td>
                                        <td>Liberado</td>
                                    </tr>
                                    <tr>
                                        <td>Programa #2</td>
                                        <td>Turma #2</td>
                                        <td>Bloqueado</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-9 -->
        
		
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading"> Liberar Avaliações</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="liberar_avaliacao_exe.php" method="post" id="form-liberar-avaliacao">
                            <div class="form-group" id="div-liberar-avaliacao-turma">
                                <label class="col-md-4 control-label">
                                	<span>Selecione a Turma</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="liberar-avaliacao-turma" 
                                    name="liberar-avaliacao-turma" title="Escolha a Turma" >
                                        <option value="Turma#1">Turma #1</option>
                                        <option value="Turma#2">Turma #2</option>
                                        <option value="Turma#3">Turma #3</option>
                                        <option value="Turma#4">Turma #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-liberar-avaliacao-turma -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-liberar-avaliacao">
                                <input type="button" id="btn-liberar-avaliacao" value="Liberar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-liberar-avaliacao','#form-liberar-avaliacao',true);"/>
                            </div> <!-- div-btn-liberar-avaliacao -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-9 -->
	    </div> <!-- row -->
        
        
	</section> <!-- main -->
</body>

</html>
