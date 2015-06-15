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
	define("TITULO","Liberar Avaliação Institucional às Turmas");
	switch($_SESSION['admCargo']){
		case "ass":
		case "dir":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
	}
	
	$trTemp = "";
	
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `idTurma`, `nomeTurma`, programa.`nomeCurso`, `liberado`
			  FROM `turma` 
			  JOIN programa ON programa.`idPrograma` = turma.`idPrograma`
			  ORDER BY programa.`nomeCurso`, `nomeTurma`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		while($turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			if($turma['liberado'] < 1){
				$turma['liberado'] = "Bloqueado";
			}
			else{
				$turma['liberado'] = "Liberado";
			}
			$trTemp .= "<tr>
							<td>{$turma['nomeCurso']}</td>
							<td>{$turma['nomeTurma']}</td>
							<td>{$turma['liberado']}</td>
						</tr>";
					  
		}
		$trTemp = utf8_encode($trTemp) ;
	} else {
		$trTemp.="Não há turmas cadastradas";
	}
	
	mysql_close($conexao);	
	
	include("../../controle/admin.php");
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
                    <div class="panel-heading">Turmas Cadastradas</div> <!-- panel panel-default -->
                    <div class="table-responsive panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-field="programa" data-align="right">Programa</th>
                                        <th data-field="nome-turma">Nome da Turma</th>
                                        <th data-field="situacao-liberacao">Situação da Liberação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $trTemp ?>
                                </tbody>
                            </table>
                    </div> <!-- table-responsive panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-9 -->
        
		
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading"> Liberar Avaliações</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="liberar-avaliacao.php?opcao=turma&acao=libera" method="post" id="form-liberar-avaliacao">
                            <div class="form-group" id="div-liberar-avaliacao-turma">
                                <label class="col-md-4 control-label">
                                	<span>Selecione a Turma</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="liberar-avaliacao-turma" 
                                    name="liberar-avaliacao-turma" title="Escolha a Turma" >
                                    	<?	//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idTurma`, `nomeTurma`, `liberado`
													  FROM `turma` 
													  WHERE `liberado` = '0'
													  ORDER BY `nomeTurma`";
											
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												while($turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													echo "<option value='{$turma['idTurma']}'>{$turma['nomeTurma']}</option>";											 												}
											} else {
												echo "<option> Não há turmas com acesso bloqueado</option>";
											}
											
											mysql_close($conexao);	
										?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-liberar-avaliacao-turma -->
                            
                            <div id="dados-invalidos">
                            	<?= @$GLOBALS['msg']?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-liberar-avaliacao">
                                <input type="button" id="btn-liberar-avaliacao" value="Liberar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-liberar-avaliacao','#form-liberar-avaliacao',ValidarLiberarAval());"/>
                            </div> <!-- div-btn-liberar-avaliacao -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-9 -->
	    </div> <!-- row -->
        
        
	</section> <!-- main -->
</body>

</html>
