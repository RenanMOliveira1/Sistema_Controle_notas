<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	
	define("TITULO","Aplicar Notas: Selecionar Turma");
	
	switch($_SESSION['autenticacao']){
		case "administracao":
			header("Location: /acount/admin/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, aplicar, notas" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Professor - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('lancar-notas');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<section id="section-prof-notas" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
        
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Selecionando a Turma</div> <!-- panel-heading -->
					<div class="panel-body">
                        <form class="form-horizontal" id="form-notas-selecionarTurma" method="post" action="mostrar_turma.php">
                            <label>Selecione a Turma na qual você deseja Lançar Nota: </label>
                            <select class="form-control" id="escolher-turma" name="escolher-turma">
                                <?
									//Conecção ao Banco de Dados
									$conexao = @mysql_connect("localhost", "root", "");
									if (!$conexao) {
										exit("Site Temporariamente fora do ar");}
									
									mysql_select_db("infnetgrid", $conexao);
									
									$query = "SELECT turma.`nomeTurma`, turma.`idTurma`
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
										while($turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
											echo "<option value='{$turma['idTurma']}'>{$turma['nomeTurma']}</option>";
										}
									}else{
										echo "<option value='0'>Não está alocado em nenhuma turma</option>";
									}
                                ?>
                            </select>
                            
                            <div class="col-md-12 widget-left" id="div-btn-enviar-notas-selecionarTurma">
                                <input type="button" id="btn-enviar-notas-selecionarTurma" class="btn btn-default btn-md pull-left" value="Visualizar Turma" onClick="botoesEnviar('#btn-enviar-notas-selecionarTurma', '#form-notas-selecionarTurma', true);" />
                            </div> <!-- div-btn-enviar-notas-selecionarTurma -->
                        </form>
        			</div> <!-- panel-body -->
       			 </div> <!-- panel panel-default -->
        	 </div> <!-- col-lg-12 -->
	     </div> <!-- row -->
	</section> <!-- main -->
    
	<? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</body>

</html>