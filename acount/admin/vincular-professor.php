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
	define("TITULO","Vincular Professor à Módulo");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
		case "rca":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	$idModulo = @$_GET['idModulo'];
	include("../../controle/admin.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('vinc-prof');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados da Vinculação</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="/acount/admin/vincular-professor.php?opcao=modulo&acao=vincula" method="post" id="form-vincular-prof">
                            <div class="form-group" id="div-vincular-prof-modulo">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Módulo</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-prof-modulo" 
                                    name="vincular-prof-modulo" title="Escollha o Módulo" >
                                    	<option value="0" onClick="window.location='/acount/admin/vincular-professor.php'">Selecione um módulo</option>
                                        <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idModulo`, `nome` 
													  FROM `modulo`
													  ORDER BY `nome`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												while($modulos = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$selecionado = "";
													if($idModulo == $modulos['idModulo']){
														$selecionado .= "selected='selected'";	
													}
													$modulos['nome'] = utf8_encode($modulos['nome']);
													echo "<option value='{$modulos['idModulo']}' onClick=\"window.location='/acount/admin/vincular-professor.php?idModulo={$modulos['idModulo']}'\" $selecionado>{$modulos['nome']}</option>";
												}
											}
											else{
												echo "<option value='0'>Não há módulos cadastrados</option>";
											}
											mysql_close($conexao);
                                        ?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-prof-modulo -->
                        
                        
                            <div class="form-group" id="div-vincular-prof-prof">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Professor</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-prof-prof" 
                                    name="vincular-prof-prof" title="Escolha o Professor" >
                                        <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT professor.`idProfessor`, professor.`nomeProfessor`
													  FROM `habilidade_professor`
													  JOIN professor ON professor.`idProfessor` = habilidade_professor.`idProfessor`
													  GROUP BY `idProfessor`
													  HAVING GROUP_CONCAT(`idHabilidade` ORDER BY `idHabilidade`) = 
													  (SELECT GROUP_CONCAT(`idHabilidade` ORDER BY `idHabilidade`) as idHabilidades 
													  FROM `habilidade_modulo` WHERE `idModulo` = '$idModulo')";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												while($professor = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$professor['nomeProfessor'] = utf8_encode($professor['nomeProfessor']);
													echo "<option value='{$professor['idProfessor']}'>{$professor['nomeProfessor']}</option>";
												}
											}
											else{
												echo "<option value='0'>Não há professores com habilidade para ministrar esse módulo</option>";
											}
											mysql_close($conexao);
                                        ?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-prof-prof -->
                            
                            <div id="dados-invalidos">
                            <?= @$GLOBALS['msg']?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-prof-enviar">
                                <input type="button" id="btn-vinc-prof-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-vinc-prof-enviar','#form-vincular-prof',ValidarVincProf());"/>
                            </div> <!-- div-btn-vinc-prof-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
	    </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
