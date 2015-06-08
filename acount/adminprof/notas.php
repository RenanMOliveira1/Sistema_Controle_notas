<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	define("TITULO","Selecionar Turma");
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
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Professor - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('lancar-notas');">
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/acount/adminprof/"><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div><!--/.row-->
		
        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div>
		</div><!--/.row-->
        
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Selecionando a Turma</div> <!-- panel-heading -->
					<div class="panel-body">
                        <form class="form-horizontal" id="form-notas-selecionarTurma" method="post" action="\mostrar_turma.php">
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
                                    $trTemp.="Não está alocado em nenhuma turma";
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

	<? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</body>

</html>