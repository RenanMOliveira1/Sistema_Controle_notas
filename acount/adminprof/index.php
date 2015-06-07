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
	
	$trTemp = "";
	
		//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT modulo.`nome`, modulo.`descr`, programa.`nomeCurso`, turma.`nomeTurma`
			  FROM `turma`
			  JOIN `modulo` ON modulo.`idModulo` = turma.`idModulo`
              JOIN `modulo_professor` ON modulo_professor.`idModulo` = turma.`idModulo`
              JOIN `professor` ON professor.`idProfessor` = modulo_professor.`idProfessor`
              JOIN `programa` ON programa.`idPrograma` = turma.`idPrograma`
			  WHERE
			  turma.`idProfessor` = '{$_SESSION['profId']}'
			  ORDER BY modulo.`nome`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$msg = "";
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		$contador = 0;
		while($modulos = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			$trTemp.= "<div class='col-md-6'>
				<div class='panel panel-info'>
					<div class='panel-heading dark-overlay'>{$modulos['nome']}</div>
					<div class='panel-body'>
						<p>{$modulos['descr']}</p>
                        <p><strong>Turma</strong>: {$modulos['nomeTurma']}</p>
                        <p><strong>Programa</strong>: {$modulos['nomeCurso']}</p>
					</div>
					</div>
				</div>";
		}
	} else {
		$trTemp.="Não está alocado em nenhuma turma";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title>SGA | Painel de Controle do Aluno</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('modulos-prof');">
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Módulos que Ministro</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Módulos que Ministro</h1>
			</div>
		</div><!--/.row-->
		
		 <?= $trTemp?>
	 </div>	<!--/.main-->

	<? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</body>

</html>
