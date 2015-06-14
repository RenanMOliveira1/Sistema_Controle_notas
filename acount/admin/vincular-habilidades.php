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
	define("TITULO","Vincular Habilidades à Professor");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
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
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('vinc-habil');">
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
						<form class="form-horizontal" action="/acount/admin/vincular-habilidades.php?opcao=habilidade&acao=vincula" method="post" id="form-vincular-habilidade">
                            <div class="form-group" id="div-vincular-habilidade-prof">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Professor</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-habilidade-prof" 
                                    name="vincular-habilidade-prof" title="Escolha o Professor" >
                                        <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idProfessor`, `nomeProfessor`
													  FROM `professor`
													  ORDER BY `nomeProfessor`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($professor = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													echo "<option value='{$professor['idProfessor']}'>{$professor['nomeProfessor']}</option>";
												}
											}
											else{
												echo "<option value='0'>Não há professores cadastrados</option>";
											}
											mysql_close($conexao);
										?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-habilidade-prof -->
                            
                            <div class="form-group" id="div-vincular-habilidade-habil">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Módulo</span>
                                </label>
                                <div class="col-md-8">
                                    <select multiple class="form-control" id="vincular-habilidade-habil" 
                                    name="vincular-habilidade-habil[]" title="Escollha as Habilidades do Professor" >
                                        <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idHabilidade`, `nomeHab` 
													  FROM `hablidade`
													  ORDER BY `nomeHab`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($habilidade = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$habilidade['nomeHab'] = utf8_encode($habilidade['nomeHab']);
													echo "<option value='{$habilidade['idHabilidade']}'>{$habilidade['nomeHab']}</option>";
												}
											}
											else{
												echo "<option value='0'>Não há professores cadastrados</option>";
											}
											mysql_close($conexao);
										?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-habilidade-habil -->
                            
                            <div id="dados-invalidos">
                            	<?= @$GLOBALS['msg']; ?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-habil-enviar">
                                <input type="button" id="btn-vinc-habil-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-vinc-habil-enviar','#form-vincular-habilidade',ValidarVincHabil());"/>
                            </div> <!-- div-btn-vinc-habil-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
	    </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
