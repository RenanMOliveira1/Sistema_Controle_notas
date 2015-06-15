<?
	$msg = "";
	$msg .= @$_GET['msg'];
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
	define("TITULO","Criar Módulo");
	switch($_SESSION['admCargo']){
		case "dir":
		case "rca":
		case "ped":
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
  	<meta name="keywords" content="faculdade, alunos, admnistração, modulo" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('criar-modulo');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados do Módulo</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-criar-modulo" action="/acount/admin/criar-modulo.php?opcao=modulo&acao=cadastra" method="post">
                            <div class="form-group" id="div-admin-nome-mod" >
                                <label class="col-md-3 control-label">
                                    <span>Nome do Módulo</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="admin-nome-mod" name="admin-nome-mod" type="text" class="form-control"
                                    placeholder="Digite o Nome do Módulo" title="Digite o Nome do Módulo" autofocus >
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-admin-nome-mod -->
                            
                            <div class="form-group" id="div-admin-descricao-mod" >
                                <label class="col-md-3 control-label">
                                    <span>Descrição do Módulo</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="admin-descricao-mod" name="admin-descricao-mod" type="text" class="form-control"
                                    placeholder="Digite a Descrição do Módulo" title="Digite a Descrição do Módulo" >
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-admin-descricao-mod -->
                            
                            <div class="form-group" id="div-admin-habil-mod">
                                <label class="col-md-3 control-label">
                                	<span>Habilidades</span>
                                </label>
                                <div class="col-md-9">
                                    <select multiple class="form-control" id="admin-habil-mod" 
                                    name="admin-habil-mod[]" title="Escollha as Habilidades para Esse Módulo" >
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
												echo "<option value='0'>Não há Habilidades cadastradas</option>";
											}
											mysql_close($conexao);
										?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-admin-habil-mod -->
                            
                            <div id="dados-invalidos">
                            	<?= @$GLOBALS['msgMod'] ?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-mod-enviar" >
                                    <input type="button" id="btn-mod-enviar" value="Enviar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-mod-enviar','#form-criar-modulo',ValidarCriarModulo());"/>
                                </div> <!-- div-btn-mod-enviar -->
                            </div> <!-- form-group -->
						</form>
			 		</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
