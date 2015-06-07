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
	define("TITULO","Liberar Acesso de Aluno");
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
			<div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Alunos Pendentes</div> <!-- panel-heading -->
                    <div class="table-responsive panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-field="disciplina" data-align="right">Nome</th>
                                    <th data-field="av1">Email</th>
                                    <th data-field="av2">Programa</th>
                                    <th data-field="av2">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <td>NomeAluno</td>
                                 <td>Email</td>
                                 <td>Programa</td>
                                 <td>
                                    <div class="todo-list-item pull-left action-buttons">
                                        <a href="#" title="Excluir/Recusar Liberação" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="#" title="Aceitar" class="trash"><span class="glyphicon glyphicon-ok"></span></a>
                                    </div> 
                                 </td>
                              </tbody>
                              <tbody>
                                 <td>NomeAluno</td>
                                 <td>Email</td>
                                 <td>Programa</td>
                                 <td>
                                    <div class="todo-list-item pull-left action-buttons">
                                        <a href="#" title="Excluir/Recusar Liberação" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="#" title="Aceitar" class="trash"><span class="glyphicon glyphicon-ok"></span></a>
                                    </div>
                                 </td>
                              </tbody>
                              <tbody>
                                 <td>NomeAluno</td>
                                 <td>Email</td>
                                 <td>Programa</td>
                                 <td>
                                    <div class="todo-list-item pull-left action-buttons">
                                        <a href="#" title="Excluir/Recusar Liberação" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="#" title="Aceitar" class="trash"><span class="glyphicon glyphicon-ok"></span></a>
                                    </div>
                                 </td>
                              </tbody>
                        </table>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
        
	</div> <!-- main -->
</body>

</html>
