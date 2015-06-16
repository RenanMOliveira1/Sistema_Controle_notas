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
	define("TITULO","Alterar Turma - Visualisar Turma");
	switch($_SESSION['admCargo']){
		case "dir":
		case "rca":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	$idTurma = @$_POST['alterar-turma-selTurma'];
	include("../../controle/admin.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, laboratorio" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('alt-turma');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">NomeDoAluno</div> <!-- panel-heading -->
                        <div class="table-responsive panel-body">
                            <table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <th data-field='matricula'>Perguntas</th>
                                        <th data-field='disciplina' data-align='right'>Respostas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>Pergunta #1</td>
                                    <td>Resposta #1</td>
                                </tbody>
                                <tbody>
                                    <td>Pergunta #2</td>
                                    <td>Resposta #2</td>
                                </tbody>
                            </table>
                        <a href="/acount/admin/visualizar-avaliacao.php"><input type="submit" class="btn btn-primary" id="btn-nota-lancar" value="Voltar" /></a>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default  -->
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
	</section> <!-- main -->	
</body>

</html>
