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
	define("TITULO","Alterar Turma - Visualisar Turma");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	$idTurma = @$_POST['alterar-turma-selTurma'];
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

<body onLoad="SidebarActive('alt-turma');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section id="section-prof-pagina-inicial" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
                   <?
						$conexao = @mysql_connect("localhost", "root", "");
						if (!$conexao) {
							exit("Site Temporariamente fora do ar");}
						
						mysql_select_db("infnetgrid", $conexao);
						
						$query = "SELECT `idTurma`, `turno`, `nomeTurma`, `idModulo`, `idLaboratorio`, `idProfessor` 
								  FROM `turma`
								  WHERE `idTurma` = '$idTurma'";
				
						$resultadoPesquisa = @mysql_query($query, $conexao);
						
						$turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
						
						$turma['turno'] = utf8_encode($turma['turno']);
					?>
					<div class="panel-heading"><?= $turma['nomeTurma']?></div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-alterar-turma" action="/acount/admin/turma_selecionada.php?opcao=turma&acao=altera" method="post">
                        	<input type="hidden" id="alterar-turma-id" name="alterar-turma-id" value="<?= $idTurma?>" />
                            <div class="form-group" id="div-alterar-turma-nome" >
                                <label class="col-md-3 control-label">
                                	<span>Nome</span>
                                </label>
                                <div class="col-md-9">
                                	<input id="alterar-turma-nome" name="alterar-turma-nome" type="text" autofocus
                                    placeholder="Digite o novo Nome da Turma" title="Digite o novo Nome da Turma" class="form-control"
                                    value="<?= $turma['nomeTurma']?>" readonly="readonly"/>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-turma-nome -->

                            <div class="form-group" id="div-alterar-turma-turno" >
                                <label class="col-md-3 control-label">
                                	<span>Turno</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="alterar-turma-turno" name="alterar-turma-turno"
                                    title="Escolha o Novo Turno de Aula" >
                                        <option value="Manhã"  <?= ("Manhã" == $turma['turno']) ? "selected='selected'" : "" ?>>Manhã</option>
                                        <option value="Tarde"  <?= ("Tarde" == $turma['turno']) ? "selected='selected'" : "" ?>>Tarde</option>
                                        <option value="Noite"  <?= ("Noite" == $turma['turno']) ? "selected='selected'" : "" ?>>Noite</option>
                                        <option value="Sábado" <?= ("Sábado" == $turma['turno']) ? "selected='selected'" : "" ?>>Sábado</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-turma-turno -->
                            
                            <div class="form-group" id="div-alterar-turma-prof" >
                                <label class="col-md-3 control-label">
                                	<span>Professor</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="alterar-turma-prof" name="alterar-turma-prof"
                                    title="Escolha o Novo Professor" <?= (($_SESSION['admCargo'] != "adm") && $_SESSION['admCargo'] != "ped") ? "readonly='readonly'" : ""?>>
                                    <option value="0">Selecione um professor</option>
                                   <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT professor.`idProfessor`, professor.`nomeProfessor`
													  FROM `modulo_professor`
													  JOIN turma on turma.`idTurma` = {$turma['idTurma']}
													  JOIN professor ON professor.`idProfessor` = modulo_professor.`idProfessor`
													  WHERE modulo_professor.`idModulo` = {$turma['idModulo']}
													  ORDER BY professor.`nomeProfessor`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($professor = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$professor['nomeProfessor'] = utf8_encode($professor['nomeProfessor']);
													$selecionado = "";
													if($professor['idProfessor'] == $turma['idProfessor']){
														$selecionado .= "selected='selected'";
													}
													echo "<option value='{$professor['idProfessor']}' $selecionado>{$professor['nomeProfessor']}</option>";
												}
											}
										?> 
                                    </select>                                   
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-turma-prof -->                            
 
                            <div class="form-group" id="div-alterar-turma-laboratorio" >
                                <label class="col-md-3 control-label">Laboratório</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="alterar-turma-laboratorio" name="alterar-turma-laboratorio"
                                    title="Escolha o novo Laboratório">
                                        <option value="0">Não alocar laboratório</option>
                                        <?
											//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idLaboratorio`, `numeroLab`
													  FROM `laboratorio`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												while($laboratorio = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$selecionado = "";
													if($laboratorio['idLaboratorio'] == $turma['idLaboratorio']){
														$selecionado .= "selected='selected'";
													}
													echo "<option value='{$laboratorio['idLaboratorio']}' $selecionado>{$laboratorio['numeroLab']}</option>";
												}
											}
										?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-turma-laboratorio -->
							
                            <div id="dados-invalidos"></div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-alterar-turma">
                                    <input type="button" id="btn-alterar-turma" value="Alterar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-alterar-turma','#form-alterar-turma',ValidarAltTurma());"/>
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
