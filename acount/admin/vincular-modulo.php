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
	define("TITULO","Vincular Módulo à Programa");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ped":
		case "rca":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
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
						<form class="form-horizontal" action="vincular_mod.php" method="post" id="form-vincular-mod">
                            <div class="form-group" id="div-vincular-mod-modulo">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Módulo</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-mod-modulo" 
                                    name="vincular-mod-modulo" title="Escolha o Módulo" >
                                    	<?
													//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idModulo`, `nome`
													  FROM `modulo`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($modulo = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$modulo['nome'] = utf8_encode($modulo['nome']);
													echo "<option value='{$modulo['idModulo']}'>{$modulo['nome']}</option>";
												}
											}else{
												echo "<option value ='0'>Não há programas cadastrados</option>";
											}
										?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-mod-modulo -->
                            
                            <div class="form-group" id="div-vincular-mod-programa">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Programa</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-mod-programa" 
                                    name="vincular-mod-programa" title="Escollha o Programa" >
                                    <option value="0">Graduação:</option>
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
                                            $contador = 0;
                                            while($programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
                                                $programa['nomeCurso'] = utf8_encode($programa['nomeCurso']);
                                                echo "<option value='{$programa['idPrograma']}'>&nbsp;&nbsp;&nbsp;&nbsp;{$programa['nomeCurso']}</option>";
                                            }
                                        }else{
                                            $trTemp.="Não há programas criados";
                                        }
                                    ?>
                                    <option value="0">Pós-Graduação:</option>
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
                                            $contador = 0;
                                            while($programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
                                                $programa['nomeCurso'] = utf8_encode($programa['nomeCurso']);
                                                echo "<option value='{$programa['idPrograma']}'>&nbsp;&nbsp;&nbsp;&nbsp;{$programa['nomeCurso']}</option>";
                                            }
                                        }else{
                                            $trTemp.="Não há programas criados";
                                        }
                                  ?>
                                    <option value="0">Intensivo:</option>
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
                                            $contador = 0;
                                            while($programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
                                                $programa['nomeCurso'] = utf8_encode($programa['nomeCurso']);
                                                echo "<option value='{$programa['idPrograma']}'>&nbsp;&nbsp;&nbsp;&nbsp;{$programa['nomeCurso']}</option>";
                                            }
                                        }else{
                                            $trTemp.="Não há programas criados";
                                        }
                                    ?>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-mod-programa -->
                            
                            <div id="dados-invalidos">
                            	<?
									if($msg != ""){
										echo $msg;
									}
								?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-mod-enviar">
                                <input type="button" id="btn-vinc-mod-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-vinc-mod-enviar','#form-vincular-mod', ValidarVincularModulo());"/>
                            </div> <!-- div-btn-vinc-mod-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
	    </div> <!-- row -->
        
	</section> <!-- main -->
</body>

</html>
