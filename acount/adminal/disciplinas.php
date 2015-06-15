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
		case "administracao":
			header("Location: /acount/admin/");
		break;
	}
	
	$trTemp="";
	define('TITULO','Disciplinas');
	define('ENDERECO_PAG_INIC_AL','/acount/adminal/index.php');
		
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT modulo.`nome`, modulo.`descr`, professor.`nomeProfessor`, turma.`nomeTurma`
			  FROM `turma_aluno`
			  JOIN `aluno` ON aluno.`matricula` = turma_aluno.`alunoMatricula`
			  JOIN `turma` ON turma.`idTurma` = turma_aluno.`turmaID`
			  JOIN `modulo` ON modulo.`idModulo` = turma.`idModulo`
              JOIN `professor` ON professor.`idProfessor` = turma.`idProfessor`
			  WHERE
			  aluno.`matricula` = '{$_SESSION['alMatricula']}'
              GROUP BY turma.`nomeTurma`
			  ORDER BY modulo.`nome`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$msg = "";
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		$contador = 0;
		while($modulos = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			$trTemp .= "<div class=\"col-md-6\">
						<div class=\"panel panel-info\">
							<div class=\"panel-heading dark-overlay\"> {$modulos['nome']}</div>
							<div class=\"panel-body\">
								<p>{$modulos['descr']}</p>
								<p><strong>Turma</strong>: {$modulos['nomeTurma']}</p>
                        		<p><strong>Professor</strong>:{$modulos['nomeProfessor']}</p>
							</div>
						</div>
					  </div><!--/.col-->";
					  
		}
		$trTemp = utf8_encode($trTemp) ;
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
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('disciplinas');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-disciplinas" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <!-- Exibe as Disciplinas -->
        <?= $trTemp ?>	
		
	</section> <!-- main -->
</body>
</html>
