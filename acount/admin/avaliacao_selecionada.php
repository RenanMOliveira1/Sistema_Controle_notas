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
	$trTemp = "";
	$idTurma = @$_POST['avaliacao-selTurma'];
	$matricula = @$_POST['avaliacao-selAluno'];

	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT turma.`nomeTurma`
			  FROM `turma`
			  WHERE turma.`idTurma` = '$idTurma'";

	$resultadoPesquisa = @mysql_query($query, $conexao);
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	$turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
	$turma['nomeTurma'] = utf8_encode($turma['nomeTurma']);
	
	$query = "SELECT `idAvaliacao`, `resposta1`, `resposta2`, `resposta3`, `resposta4` 
			  FROM `avaliacao`
			  WHERE `alunoMatricula` = '$matricula'";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){		
		$trTemp = "";
		$avaliacao = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
		$query = "SELECT `respProf1`, `respProf2`, `respProf3`, `respProf4`, `respProf5`, `respProf6`, `respProf7`, `respProf8`
				  FROM `turma_avaliacao`
				  WHERE  `idTurma` = '$idTurma' 
				  AND `idAvaliacao` = '{$avaliacao['idAvaliacao']}'";

		$resultadoPesquisa = @mysql_query($query, $conexao);
		
		$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);

			switch($avaliacao['resposta1']){
				case "1":
					$avaliacao['resposta1'] = "Discordo totalmente";
				break;
				case "2":
					$avaliacao['resposta1'] = "Discordo";
				break;
				case "3":
					$avaliacao['resposta1'] = "Não concordo nem discordo";
				break;
				case "4":
					$avaliacao['resposta1'] = "Concordo";
				break;
				case "5":
					$avaliacao['resposta1'] = "Concordo totalmente";
				break;
			}
			switch($avaliacao['resposta2']){
				case "1":
					$avaliacao['resposta2'] = "Discordo totalmente";
				break;
				case "2":
					$avaliacao['resposta2'] = "Discordo";
				break;
				case "3":
					$avaliacao['resposta2'] = "Não concordo nem discordo";
				break;
				case "4":
					$avaliacao['resposta2'] = "Concordo";
				break;
				case "5":
					$avaliacao['resposta2'] = "Concordo totalmente";
				break;
			}
			switch($avaliacao['resposta3']){
				case "1":
					$avaliacao['resposta3'] = "Discordo totalmente";
				break;
				case "2":
					$avaliacao['resposta3'] = "Discordo";
				break;
				case "3":
					$avaliacao['resposta3'] = "Não concordo nem discordo";
				break;
				case "4":
					$avaliacao['resposta3'] = "Concordo";
				break;
				case "5":
					$avaliacao['resposta3'] = "Concordo totalmente";
				break;
			}
			switch($avaliacao['resposta4']){
				case "1":
					$avaliacao['resposta4'] = "Discordo totalmente";
				break;
				case "2":
					$avaliacao['resposta4'] = "Discordo";
				break;
				case "3":
					$avaliacao['resposta4'] = "Não concordo nem discordo";
				break;
				case "4":
					$avaliacao['resposta4'] = "Concordo";
				break;
				case "5":
					$avaliacao['resposta4'] = "Concordo totalmente";
				break;
			}

			$trTemp .= "<tr>
							<td>O ambiente para as aulas é apropriado quanto à acústica, luminosidade e ventilação</td>
							<td>{$avaliacao['resposta1']}</td>
						</tr>
						<tr>
							<td>Os equipamentos dos laboratórios da instituição são adequados e em número suficiente</td>
							<td>{$avaliacao['resposta2']}</td>
						</tr>
						<tr>
							<td>A biblioteca dispõe dos livros básicos e periódicos recomendados nas disciplinas</td>
							<td>{$avaliacao['resposta3']}</td>
						</tr>
						<tr>
							<td>Os serviços de limpeza no Campus são adequados</td>
							<td>{$avaliacao['resposta4']}</td>
						</tr>";
			if ($numeroPesquisa >= 1){
				$avProf = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				switch($avProf['respProf1']){
					case "1":
						$avProf['respProf1'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf1'] = "Discordo";
					break;
					case "3":
						$avProf['respProf1'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf1'] = "Concordo";
					break;
					case "5":
						$avProf['respProf1'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf2']){
					case "1":
						$avProf['respProf2'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf2'] = "Discordo";
					break;
					case "3":
						$avProf['respProf2'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf2'] = "Concordo";
					break;
					case "5":
						$avProf['respProf2'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf3']){
					case "1":
						$avProf['respProf3'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf3'] = "Discordo";
					break;
					case "3":
						$avProf['respProf3'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf3'] = "Concordo";
					break;
					case "5":
						$avProf['respProf3'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf4']){
					case "1":
						$avProf['respProf4'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf4'] = "Discordo";
					break;
					case "3":
						$avProf['respProf4'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf4'] = "Concordo";
					break;
					case "5":
						$avProf['respProf4'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf5']){
					case "1":
						$avProf['respProf5'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf5'] = "Discordo";
					break;
					case "3":
						$avProf['respProf5'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf5'] = "Concordo";
					break;
					case "5":
						$avProf['respProf5'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf6']){
					case "1":
						$avProf['respProf6'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf6'] = "Discordo";
					break;
					case "3":
						$avProf['respProf6'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf6'] = "Concordo";
					break;
					case "5":
						$avProf['respProf6'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf7']){
					case "1":
						$avProf['respProf7'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf7'] = "Discordo";
					break;
					case "3":
						$avProf['respProf7'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf7'] = "Concordo";
					break;
					case "5":
						$avProf['respProf7'] = "Concordo totalmente";
					break;
				}
				switch($avProf['respProf8']){
					case "1":
						$avProf['respProf8'] = "Discordo totalmente";
					break;
					case "2":
						$avProf['respProf8'] = "Discordo";
					break;
					case "3":
						$avProf['respProf8'] = "Não concordo nem discordo";
					break;
					case "4":
						$avProf['respProf8'] = "Concordo";
					break;
					case "5":
						$avProf['respProf8'] = "Concordo totalmente";
					break;
				}
				$trTemp .= "<tr>
							<td>O professor domina o conteúdo e está atualizado</td>
							<td>{$avProf['respProf1']}</td>
						</tr>
						<tr>
							<td>O professor tem bom relacionamento com os alunos e é aberto ao diálogo</td>
							<td>{$avProf['respProf2']}</td>
						</tr>
						<tr>
							<td>O professor é pontual em suas funções</td>
							<td>{$avProf['respProf3']}</td>
						</tr>
						<tr>
							<td>O professor é disponível para o esclarecimento de dúvidas</td>
							<td>{$avProf['respProf4']}</td>
						</tr>
						<tr>
							<td>Eu Gostaria de Ter Aula Novamente com esse Professor</td>
							<td>{$avProf['respProf5']}</td>
						</tr>
						<tr>
							<td>O plano da disciplina apresentado contém os itens essenciais (objetivos, conteúdos, sistema de avaliação, atividades a serem realizadas)</td>
							<td>{$avProf['respProf6']}</td>
						</tr>
						<tr>
							<td>Os recursos didáticos utilizados na disciplina são de boa qualidade</td>
							<td>{$avProf['respProf7']}</td>
						</tr>
						<tr>
							<td> A bibliografia para estudo do conteúdo é disponível na biblioteca</td>
							<td>{$avProf['respProf8']}</td>
						</tr>";
			}
			else{
				$trTemp .= "<tr><td colspan='2'>Aluno não fez avaliação deste professor</td></tr>";
			}
	}else{
		$trTemp .= "
		<tr><td>Aluno não respondeu avaliação</td></tr>";
	}


	mysql_close($conexao);
	
	define("TITULO","Visualizar avaliação - {$turma['nomeTurma']}");
	switch($_SESSION['admCargo']){
		case "ass":
		case "ped":
		case "rca":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}

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
                    <div class="panel-heading">
					<?
						//Conecção ao Banco de Dados
						$conexao = @mysql_connect("localhost", "root", "");
						if (!$conexao) {
							exit("Site Temporariamente fora do ar");}
						
						mysql_select_db("infnetgrid", $conexao);
						
						$query = "SELECT `nomeAluno`
								  FROM `aluno`
								  WHERE `matricula` = '$matricula'";
					
						$resultadoPesquisa = @mysql_query($query, $conexao);
						$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
						$aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
						$aluno['nomeAluno'] = utf8_encode($aluno['nomeAluno']);
					
						mysql_close($conexao);	
						
						echo $aluno['nomeAluno'];
					?>
                    </div> <!-- panel-heading -->
                        <div class="table-responsive panel-body">
                            <table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <th data-field='matricula'>Perguntas</th>
                                        <th data-field='disciplina' data-align='right'>Respostas</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?= $trTemp ?>
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
