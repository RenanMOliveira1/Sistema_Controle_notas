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
	
	$idTurma = @$_POST['prof-avaliacao-selTurma'];
	$trTemp = "";
	
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `nomeTurma` 
			  FROM `turma`
			  WHERE `idTurma` = '$idTurma'";

	$resultadoPesquisa = @mysql_query($query, $conexao);
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	$turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
	$turma['nomeTurma'] = utf8_encode($turma['nomeTurma']);
	
	$query = "SELECT `alunoMatricula` 
			  FROM `turma_aluno`
			  WHERE `turmaID` = '$idTurma'";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$qtdAlunos = mysql_num_rows($resultadoPesquisa);
	
	if($qtdAlunos >= 1){
		$query = "SELECT `respProf1`, `respProf2`, `respProf3`, `respProf4`, `respProf5`, `respProf6`, `respProf7`, `respProf8` 
				  FROM `turma_avaliacao` 
				  WHERE `idTurma` = '$idTurma'";
				  
		$resultadoPesquisa = @mysql_query($query, $conexao);
		if(mysql_num_rows($resultadoPesquisa) >= 1){
			$somaResp1 = 0;
			$somaResp2 = 0;
			$somaResp3 = 0;
			$somaResp4 = 0;
			$somaResp5 = 0;
			$somaResp6 = 0;
			$somaResp7 = 0;
			$somaResp8 = 0;
			
			while($avaliacao = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
				$somaResp1 += $avaliacao['respProf1'];
				$somaResp2 += $avaliacao['respProf2'];
				$somaResp3 += $avaliacao['respProf3'];
				$somaResp4 += $avaliacao['respProf4'];
				$somaResp5 += $avaliacao['respProf5'];
				$somaResp6 += $avaliacao['respProf6'];
				$somaResp7 += $avaliacao['respProf7'];
				$somaResp8 += $avaliacao['respProf8'];
			}
			$mediaResp1 = $somaResp1/$qtdAlunos;
			$mediaResp2 = $somaResp2/$qtdAlunos;
			$mediaResp3 = $somaResp3/$qtdAlunos;
			$mediaResp4 = $somaResp4/$qtdAlunos;
			$mediaResp5 = $somaResp5/$qtdAlunos;
			$mediaResp6 = $somaResp6/$qtdAlunos;
			$mediaResp7 = $somaResp7/$qtdAlunos;
			$mediaResp8 = $somaResp8/$qtdAlunos;
			
			$trTemp .= "<tr>
							<td>O professor domina o conteúdo e está atualizado</td>
							<td>$mediaResp1</td>
						</tr>
						<tr>
							<td>O professor tem bom relacionamento com os alunos e é aberto ao diálogo</td>
							<td>$mediaResp2</td>
						</tr>
						<tr>
							<td>O professor é pontual em suas funções</td>
							<td>$mediaResp3</td>
						</tr>
						<tr>
							<td>O professor é disponível para o esclarecimento de dúvidas</td>
							<td>$mediaResp4</td>
						</tr>
						<tr>
							<td>Eu Gostaria de Ter Aula Novamente com esse Professor</td>
							<td>$mediaResp5</td>
						</tr>
						<tr>
							<td>O plano da disciplina apresentado contém os itens essenciais (objetivos, conteúdos, sistema de avaliação, atividades a serem realizadas)</td>
							<td>$mediaResp6</td>
						</tr>
						<tr>
							<td>Os recursos didáticos utilizados na disciplina são de boa qualidade</td>
							<td>$mediaResp7</td>
						</tr>
						<tr>
							<td> A bibliografia para estudo do conteúdo é disponível na biblioteca</td>
							<td>$mediaResp8</td>
						</tr>";
		}
		else{
			$trTemp .= "<tr><td colspan='2'>Nenhum aluno fez a avaliação</tr></td>";
		}
	}
	else{
		$trTemp .= "<tr><td colspan='2'>Turma não possui alunos</tr></td>";
	}
	
	mysql_close($conexao);	
	
	define("TITULO", "Visualizar Avaliação da Turma ".$turma['nomeTurma']);
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
                    <div class="panel-heading">Avaliação da turma <?= $turma['nomeTurma']?></div> <!-- panel-heading -->
                        <div class="table-responsive panel-body">
                            <table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <th data-field='matricula'>Perguntas</th>
                                        <th data-field='disciplina' data-align='right'>Média</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $trTemp ?>
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
