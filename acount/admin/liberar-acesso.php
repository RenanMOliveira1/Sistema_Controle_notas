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
		case "ped":
		case "rca":
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
								<a href='/controle/aluno.php?acao=liberacao&matricula={$aluno['matricula']}' title='Aceitar' class='trash'><span class='glyphicon glyphicon-ok'></span></a>
							</div> <!-- todo-list-item pull-left -->
						 </td>
					  </tbody>";								
		}
	} else {
		$trTemp.="<div class=\"col-md-6\">
					  <div class=\"panel panel-info\">
						  <tbody>
						  <td>Aluno não fez nenhuma avaliação</td>							
					  </div> <!-- panel panel-info -->
				  </div> <!-- col-md-6 -->";
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
                            <?= utf8_encode($trTemp) ?>
                        </table>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
        
	</section> <!-- main -->
</body>

</html>
