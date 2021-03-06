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
	define("TITULO","Excluir Turma");
		switch($_SESSION['admCargo']){
		case "ped":
		case "rca":
		case "ass":
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
  	<meta name="keywords" content="faculdade, alunos, professor, cadastrar" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('excluir-turma');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Selecionar Turma</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-excluir-turma" action="/acount/admin/excluir-turma.php?opcao=turma&acao=exclui" method="post">
                        	<div class="form-group" id="div-excluir-lab-selTurma" >
                                <label class="col-md-3 control-label">
                                	<span>Turma</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="excluir-lab-selTurma" name="excluir-lab-selTurma"
                                    title="Escolha a Turma" >
                                        <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idTurma`, `nomeTurma` 
													  FROM `turma`
													  ORDER BY `nomeTurma`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												while($turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$turma['nomeTurma'] = utf8_encode($turma['nomeTurma']);
													echo "<option value='{$turma['idTurma']}'>{$turma['nomeTurma']}</option>";
												}
											}
											else{
												echo "<option value='0'>Não há turmas cadastradas</option>";
											}
											mysql_close($conexao);
                                        ?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-excluir-lab-selTurma -->
                            
                            <div id="dados-invalidos">
                            	<?= @$GLOBALS['msg']?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-excluir-turma">
                                    <input type="button" id="btn-excluir-turma" value="Excluir" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-excluir-turma','#form-excluir-turma',ValidarExcluirTurma());"/>
                                </div> <!-- div-btn-excluir-turma -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
