<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "administracao":
			header("Location: /acount/admin/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
	define("TITULO", "Visualizar Avaliação da Turma#1");
	include("../../controle/professor.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, laboratorio" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Professor - SGA</title>

    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('avaliacao-prof');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Avaliação#1</div> <!-- panel-heading -->
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
                        <a href="/acount/adminprof/avaliacao-institucional.php"><input type="submit" class="btn btn-primary" id="btn-nota-lancar" value="Voltar" /></a>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default  -->
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
	</section> <!-- main -->	
</body>

</html>
