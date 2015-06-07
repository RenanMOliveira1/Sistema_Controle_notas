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
	define("TITULO","Liberar Acesso de Aluno");
	switch($_SESSION['admCargo']){
		case "ass":
		case "dir":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
	}
		$trTemp="";		
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `matricula`, `nomeAluno`, `email`
			  FROM aluno
			  WHERE `acesso` = 0
			  ORDER BY `nomeAluno`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		while($aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			@$trTemp.="<tbody>
						 <td>{$aluno['nomeAluno']}</td>
						 <td>{$aluno['email']}</td>
						 <td>{$aluno['nomeCurso']}</td>
						 <td>
							<div class='todo-list-item pull-left action-buttons'>
								<a href='#' title='Excluir/Recusar Liberação' class='trash'><span class='glyphicon glyphicon-trash'></span></a>
								<a href='liberar.php?matricula={$aluno['matricula']}' title='Aceitar' class='trash'><span class='glyphicon glyphicon-ok'></span></a>
							</div> 
						 </td>
					  </tbody>";								
		}
	} else {
		$trTemp.="<div class=\"col-md-6\">
				  		<div class=\"panel panel-info\">
						<tbody>
						 <td>Aluno não fez nenhuma avaliação</td>							
						</div>
				  </div><!--/.col-->";
	}
	
	mysql_close($conexao);
	
	
	
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
                    <div>
                    <?
						if($msg != ""){
							echo "$msg";
						}
					?>
                    </div>
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
                            <?= $trTemp ?>
                        </table>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
        
	</div> <!-- main -->
</body>

</html>
