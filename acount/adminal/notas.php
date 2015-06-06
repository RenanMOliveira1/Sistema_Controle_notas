<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	define('TITULO','Notas');
		$trTemp="";		
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT modulo.`nome`, aluno_avaliacao.`nota`, modulo.`idModulo`, avaliacao.`tipoAvaliacao`
			  FROM `aluno_avaliacao`
			  JOIN avaliacao ON avaliacao.`idAvaliacao` = aluno_avaliacao.`idAvaliacao`
              JOIN turma ON turma.`idTurma` = avaliacao.`idTurma`
			  JOIN modulo ON modulo.`idModulo` = turma.`idModulo`
			  JOIN aluno ON aluno.`matricula` = aluno_avaliacao.`alunoMatricula`
			  WHERE aluno.`matricula` ='{$_SESSION['alMatricula']}'
			  ORDER BY modulo.`nome`, avaliacao.`tipoAvaliacao`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$msg = "";
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		$modulo;
		$contador = 0;
		$contaModulo = 0;
		$contaNotas = 0;
		$somaNotas = 0;
		while($avaliacao[$contador] = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			if($contador == 0){
				$modulo[$contaModulo]['nome'] = $avaliacao[$contador]['nome'];
				$modulo[$contaModulo][$contaNotas] = $avaliacao[$contador]['nota'];
				$somaNotas+= $modulo[$contaModulo][$contaNotas];
				$contaNotas++;
			}
			else{
				if($avaliacao[($contador-1)]['idModulo'] == $avaliacao[$contador]['idModulo']){
					$modulo[$contaModulo][$contaNotas] = $avaliacao[$contador]['nota'];
					$somaNotas+= $modulo[$contaModulo][$contaNotas];
					$contaNotas++;
				}
				else{					
					$contaModulo++;
					$contaNotas = 0;
					$somaNotas = 0;
					$modulo[$contaModulo]['nome'] = $avaliacao[$contador]['nome'];
					$modulo[$contaModulo][$contaNotas] = $avaliacao[$contador]['nota'];
					$somaNotas+= $modulo[$contaModulo][$contaNotas];
					$contaNotas++;					
				}
			}
			$modulo[$contaModulo]['media'] = ($somaNotas / $contaNotas);	
			if($contaNotas < 2){
				$modulo[$contaModulo]['status'] = "Em avaliação";
			}
			else{
				if($contaNotas < 3){
					if($modulo[$contaModulo]['media'] >= 6){
						$modulo[$contaModulo]['status'] = "Aprovado";
					}
					else{
						$modulo[$contaModulo]['status'] = "Em Prova Final";
					}					
				}
				else{
					if($modulo[$contaModulo]['media'] >= 5){
						$modulo[$contaModulo]['status'] = "Aprovado na PF";
					}
					else{
						$modulo[$contaModulo]['status'] = "Reprovado";
					}
				}
			}
			$contador++;	
		}
		$contador = $contaModulo;
		$contaModulo = 0;
		$contaNotas = 0;
		while($contaModulo <= $contador){
					@$trTemp.="<tbody>
						 <td>{$modulo[$contaModulo]['nome']}</td>
						 <td>{$modulo[$contaModulo][$contaNotas]}</td>
						 <td>{$modulo[$contaModulo][($contaNotas+1)]}</td>
						 <td>{$modulo[$contaModulo][($contaNotas+2)]}</td>
						 <td>{$modulo[$contaModulo]['media']}</td>
						 <td>{$modulo[$contaModulo]['status']}</td>
					  </tbody>";								
			$contaModulo++;
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
  	<meta name="keywords" content="faculdade, alunos, notas" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('notas');">
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-notas" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
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
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Resumo de notas</div> <!-- panel-heading -->
                <div class="table-responsive panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th data-field="disciplina" data-align="right">Disciplina</th>
                                <th data-field="av1">1ª Avaliação</th>
                                <th data-field="av2">2ª Avaliação</th>
                                <th data-field="av3">Prova Final</th>
                                <th data-field="pf">Nota Final</th>
                                <th data-field="status">Status</th>
                            </tr>
                        </thead>
                        <?= $trTemp?>
                    </table>
                </div> <!-- table-responsive panel-body -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-md-12 -->
		
	</section> <!-- main -->	
</body>

</html>
