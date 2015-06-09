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
	define('TITULO','Notas');
	define('ENDERECO_PAG_INIC_AL','/acount/adminal/index.php');
	
	$trTemp="";		
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT modulo.`nome`, turma_aluno.`av1`, turma_aluno.`av2`, turma_aluno.`av3`, modulo.`idModulo`
			  FROM `turma_aluno`
              JOIN turma ON turma.`idTurma` = turma_aluno.`turmaID`
			  JOIN modulo ON modulo.`idModulo` = turma.`idModulo`
			  JOIN aluno ON aluno.`matricula` = turma_aluno.`alunoMatricula`
			  WHERE aluno.`matricula` = '{$_SESSION['alMatricula']}'
			  ORDER BY modulo.`nome`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$msg = "";
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		while($nota = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			$contNotas = 0;
			$somaNotas = 0;
			if($nota['av1'] < 0){
				$nota['av1'] = "--";
				$somaNotas += 0;
			}else{
				$somaNotas += $nota['av1'];
				$contNotas++;
			}
			if($nota['av2'] < 0){
				$nota['av2'] = "--";
				$somaNotas += 0;
			}else{
				$somaNotas += $nota['av2'];
				$contNotas++;
			}			
			if($nota['av3'] < 0){
				$nota['av3'] = "--";
				$somaNotas += 0;
			}else{
				$somaNotas += $nota['av3'];
				$contNotas++;
			}
			if($contNotas > 0){	
				$media = $somaNotas / $contNotas;
			}
			else{
				$media = "--";
			}
			if((($nota['av1'] == "--") && ($nota['av2'] > 0)) && ($nota['av3'] == "--")){
				$status = "Em prova final";
			}else{
				if((($nota['av1'] == "--") && ($nota['av2'] > 0) && ($nota['av3'] > 0)) && ($media >= 5)){
					$status = "Aprovado na PF";
				}else{
					if((($nota['av1'] == "--") && ($nota['av2'] > 0) && ($nota['av3'] > 0)) && ($media < 5)){
						$status = "Reprovado";
					}else{
						if((($nota['av1'] > 0) && ($nota['av2'] == "--")) && ($nota['av3'] == "--")){
							$status = "Em avaliação";
						}else{
							if((($nota['av1'] > 0) && ($nota['av2'] > 0)) && ($media >= 6)){
								$status = "Aprovado";
							}
							else{
								if((($nota['av1'] > 0) && ($nota['av2'] > 0) && ($nota['av3'] == "--")) && ($media < 6)){
									$status = "Em prova final";
								}
								else{
									if((($nota['av1'] > 0) && ($nota['av2'] > 0) && ($nota['av3'] > 0)) && ($media >= 5)){
										$status = "Aprovado na PF";
									}
									else{
										if((($nota['av1'] > 0) && ($nota['av2'] > 0) && ($nota['av3'] > 0)) && ($media < 5)){
											$status = "Reprovado";
										}
										else{
											$status = "--";
										}
									}
								}
							}
						}
					}
				}
			}
			@$trTemp.="<tbody>
				 <td>{$nota['nome']}</td>
				 <td>{$nota['av1']}</td>
				 <td>{$nota['av2']}</td>
				 <td>{$nota['av3']}</td>
				 <td>{$media}</td>
				 <td>{$status}</td>
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
  	<meta name="keywords" content="faculdade, alunos, notas" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('notas');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-notas" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
        
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
