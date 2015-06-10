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
	define("TITULO","Vincular Alunos à Turma");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
		case "ped":
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

<body onLoad="SidebarActive('vinc-aluno');">
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
						<form class="form-horizontal" action="/controle/aluno.php?acao=vinculacao" method="post" id="form-vincular-alun">
                            <div class="form-group" id="div-vincular-aluno-nomeAl" >
                                <label class="col-md-3 control-label">
                                    <span>Selecione o Aluno</span>
                                </label>
                                <div class="col-md-9">
                                    <select id="vincular-aluno-nomeAl" name="vincular-aluno-nomeAl" 
                                    class="form-control" title="Escolha o Aluno" >
                                    	<?
													//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `matricula`, `nomeAluno`
													  FROM `aluno`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$alunoFormatado = utf8_encode($aluno['nomeAluno']);
													echo "<option value='{$aluno['matricula']}'>$alunoFormatado</option>";
												}
											}else{
												$trTemp.="Não há alunos matriculados";
											}
										?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-laboratorio-andar -->
                            <div class="form-group" id="div-vincular-aluno-turma" >
                                <label class="col-md-3 control-label">
                                    <span>Selecione a Turma</span>
                                </label>
                                <div class="col-md-9">
                                    <select id="vincular-aluno-turma" name="vincular-aluno-turma" 
                                    class="form-control" title="Escolha a Turma" >
                                    	<?
													//Conecção ao Banco de Dados
											$conexao = @mysql_connect("localhost", "root", "");
											if (!$conexao) {
												exit("Site Temporariamente fora do ar");}
											
											mysql_select_db("infnetgrid", $conexao);
											
											$query = "SELECT `idTurma`, `nomeTurma`, `idPrograma`
													  FROM `turma`";
									
											$resultadoPesquisa = @mysql_query($query, $conexao);
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													$turmaFormatada = utf8_encode($turma['nomeTurma']);
													echo "<option value='{$turma['idTurma']}'>$turmaFormatada</option>";
												}
											}else{
												$trTemp.="Não há turmas criadas";
											}
										?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- col-md-9 -->
                            
                            <div id="dados-invalidos">
                            	<?
									if($msg != ""){
										echo "$msg";
									}
								?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-al-enviar">
                                <input type="button" id="btn-vinc-al-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-vinc-al-enviar','#form-vincular-alun',true);"/>
                            </div> <!-- div-btn-vinc-al-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-md-8 -->
         </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
