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
	define("TITULO","Cadastrar Turma");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	$idPrograma = @$_GET['idPrograma'];
	include("../../controle/admin.php");
	
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, laboratorio" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle Administrativo - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('cad-turma');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php");?>
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Dados da Turma</div> <!-- panel-heading -->
					<div class="panel-body">
                    <?
					
					?>
						<form class="form-horizontal" id="form-cadastrar-turma" action="/acount/admin/cadastrar-turma.php?opcao=turma&acao=cria" method="post">

                            <div class="form-group" id="div-turma-turno" >
                                <label class="col-md-3 control-label">
                                	<span>Turno</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="turma-turno" name="turma-turno"
                                    title="Escolha o Turno de Aula" >
                                        <option value="Manhã">Manhã</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noite">Noite</option>
                                        <option value="Sábado">Sábado</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-turno -->
                            <div class="form-group" id="div-turma-programa" >
                                <label class="col-md-3 control-label">
                                	<span>Programa</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="turma-programa" name="turma-programa"
                                    title="Escolha o Programa" >
                                    <option value="0" onClick="window.location='/acount/admin/cadastrar-turma.php'">Graduação:</option>
                                    <?
                                        //Conecção ao Banco de Dados
                                        $conexao = @mysql_connect("localhost", "root", "");
                                        if (!$conexao) {
                                            exit("Site Temporariamente fora do ar");}
                                        
                                        mysql_select_db("infnetgrid", $conexao);
                                        
                                        $query = "SELECT `idPrograma`, `tipo`, `nomeCurso`, `sigla` 
                                                  FROM `programa` 
                                                  WHERE `tipo` = 'graduacao';";
                                
                                        $resultadoPesquisa = @mysql_query($query, $conexao);
                                        $numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
                                        if ($numeroPesquisa >= 1){
                                            while($programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
											    $selecionado = "";
												if($idPrograma == $programa['idPrograma']){
													$selecionado .= "selected='selected'";	
												}
                                                $programa['nomeCurso'] = utf8_encode($programa['nomeCurso']);
                                                echo "<option value='{$programa['idPrograma']}' onClick=\"window.location='/acount/admin/cadastrar-turma.php?idPrograma={$programa['idPrograma']}'\" $selecionado>&nbsp;&nbsp;&nbsp;&nbsp;{$programa['nomeCurso']}</option>";
                                            }
                                        }
										mysql_close($conexao);
                                    ?>
                                    <option value="0" onClick="window.location='/acount/admin/cadastrar-turma.php'">Pós-Graduação:</option>
                                    <?
                                        //Conecção ao Banco de Dados
                                        $conexao = @mysql_connect("localhost", "root", "");
                                        if (!$conexao) {
                                            exit("Site Temporariamente fora do ar");}
                                        
                                        mysql_select_db("infnetgrid", $conexao);
                                        
                                        $query = "SELECT `idPrograma`, `tipo`, `nomeCurso`, `sigla` 
                                                  FROM `programa` 
                                                  WHERE `tipo` = 'pos';";
                                
                                        $resultadoPesquisa = @mysql_query($query, $conexao);
                                        $numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
                                        if ($numeroPesquisa >= 1){
                                            while($programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
												$selecionado = "";
												if($idPrograma == $programa['idPrograma']){
													$selecionado .= "selected='selected'";	
												}
                                                $programa['nomeCurso'] = utf8_encode($programa['nomeCurso']);
                                                echo "<option value='{$programa['idPrograma']}' onClick=\"window.location='/acount/admin/cadastrar-turma.php?idPrograma={$programa['idPrograma']}'\" $selecionado>&nbsp;&nbsp;&nbsp;&nbsp;{$programa['nomeCurso']}</option>";
                                            }
                                        }
										mysql_close($conexao);
                                  ?>
                                    <option value="0" onClick="window.location='/acount/admin/cadastrar-turma.php'">Intensivo:</option>
                                  <?
                                        //Conecção ao Banco de Dados
                                        $conexao = @mysql_connect("localhost", "root", "");
                                        if (!$conexao) {
                                            exit("Site Temporariamente fora do ar");}
                                        
                                        mysql_select_db("infnetgrid", $conexao);
                                        
                                        $query = "SELECT `idPrograma`, `tipo`, `nomeCurso`, `sigla` 
                                                  FROM `programa` 
                                                  WHERE `tipo` = 'intensivo';";
                                
                                        $resultadoPesquisa = @mysql_query($query, $conexao);
                                        $numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
                                        if ($numeroPesquisa >= 1){
                                            while($programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
											    $selecionado = "";
												if($idPrograma == $programa['idPrograma']){
													$selecionado .= "selected='selected'";	
												}
                                                $programa['nomeCurso'] = utf8_encode($programa['nomeCurso']);
                                                echo "<option value='{$programa['idPrograma']}' onClick=\"window.location='/acount/admin/cadastrar-turma.php?idPrograma={$programa['idPrograma']}'\" $selecionado>&nbsp;&nbsp;&nbsp;&nbsp;{$programa['nomeCurso']}</option>";
                                            }
                                        }
										mysql_close($conexao);
									?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-modulo -->                            
 
                            <div class="form-group" id="div-turma-modulo" >
                                <label class="col-md-3 control-label">
                                	<span>Modulo</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="turma-modulo" name="turma-modulo"
                                    title="Escolha o Módulo" >
                                    	<?	
											if($idPrograma == ""){
												echo "<option value='0'> Selecione um programa </option>";
											}else{
												if($idPrograma > 0){
													//Conecção ao Banco de Dados
													$conexao = @mysql_connect("localhost", "root", "");
													if (!$conexao) {
														exit("Site Temporariamente fora do ar");}
													
													mysql_select_db("infnetgrid", $conexao);
													
													$query = "SELECT modulo.`idModulo`, modulo.`nome`
															  FROM `programa_modulo`
															  JOIN `modulo` ON modulo.`idModulo` = programa_modulo.`idModulo`
															  JOIN `programa` ON programa.`idPrograma` = programa_modulo.`idPrograma`
															  WHERE programa.`idPrograma` = '$idPrograma'";
											
													$resultadoPesquisa = @mysql_query($query, $conexao);
													$msg = "";
													$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
													if ($numeroPesquisa >= 1){
														while($modulo = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
															$modulo['nome'] = utf8_encode($modulo['nome']);
															echo "<option value='{$modulo['idModulo']}'>{$modulo['nome']}</option>";
														}
													}
												}else{
													echo "<option value='0'> Selecione um programa </option>";
												}
											}	
											mysql_close($conexao);										
										?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-modulo -->						
                            <div id="dados-invalidos">
                            	<?= @$GLOBALS['msg']?>
                            </div> <!-- dados-invalidos -->                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-turma-enviar">
                                    <input type="button" id="btn-turma-enviar" value="Enviar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-turma-enviar','#form-cadastrar-turma',ValidarCadTurma());"/>
                                </div> <!-- div-btn-turma-enviar -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-8 -->
        </div> <!-- row -->
	</section> <!-- main -->	
</body>

</html>
