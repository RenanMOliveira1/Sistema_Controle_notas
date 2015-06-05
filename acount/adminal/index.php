<?
	session_start();
	
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}

	
	$trTemp="";
	define('TITULO','Disciplinas');
		
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT modulo.`nome`, modulo.`desc`, professor.`nomeProfessor`
			  FROM `turma_aluno`
			  JOIN `aluno` ON aluno.`matricula` = turma_aluno.`alunoMatricula`
			  JOIN `turma` ON turma.`idTurma` = turma_aluno.`turmaID`
			  JOIN `modulo` ON modulo.`idModulo` = turma.`idModulo`
              JOIN `modulo_professor` ON modulo_professor.`idModulo` = turma.`idModulo`
              JOIN `professor` ON professor.`idProfessor` = modulo_professor.`idProfessor`
			  WHERE
			  aluno.`matricula` = '{$_SESSION['alMatricula']}'";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$msg = "";
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		$contador = 0;
		while($modulos = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			$trTemp.="<div class=\"col-md-6\">
						<div class=\"panel panel-info\">
							<div class=\"panel-heading dark-overlay\"> {$modulos['nome']}</div>
							<div class=\"panel-body\">
								<p>{$modulos['desc']}</p>
                        		<p><strong>Professor</strong>:{$modulos['nomeProfessor']}</p>
                        		<p><a href=\"#\">Detalhes da Disciplina</a></p>
							</div>
						</div>
					  </div><!--/.col-->";
		}
	} else {
		$trTemp.="Aluno não está cursando nenhum módulo";
	}
	
	mysql_close($conexao);
	

	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, disciplinas" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('disciplinas');">
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-disciplina" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div> <!-- row -->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
		
        <!-- Exibe as Disciplinas -->
        <?= $trTemp ?>	
		
	</section> <!-- main -->
</body>
</html>
