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
					<div class="panel-heading">Turma Selecionada </div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-alterar-turma" action="/acount/admin/cadastrar_alterar_exe.php" method="post">
                            <div class="form-group" id="div-alterar-turma-nome" >
                                <label class="col-md-3 control-label">
                                	<span>Nome</span>
                                </label>
                                <div class="col-md-9">
                                	<input id="alterar-turma-nome" name="alterar-turma-nome" type="text" autofocus
                                    placeholder="Digite o novo Nome da Turma" title="Digite o novo Nome da Turma" class="form-control">
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-turma-nome -->

                            <div class="form-group" id="div-alterar-turma-turno" >
                                <label class="col-md-3 control-label">
                                	<span>Turno</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="alterar-turma-turno" name="alterar-turma-turno"
                                    title="Escolha o Novo Turno de Aula" >
                                        <option value="manha">Manhã</option>
                                        <option value="tarde">Tarde</option>
                                        <option value="noite">Noite</option>
                                        <option value="sabado">Sabádo</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-turma-turno -->
                            
                            <div class="form-group" id="div-alterar-turma-prof" >
                                <label class="col-md-3 control-label">
                                	<span>Professor</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="alterar-turma-prof" name="alterar-turma-prof"
                                    title="Escolha o Novo Professor" >
                                    <option value="Professor#1">Professor #1</option>
                                    <option value="Professor#1">Professor #2</option>
                                    <option value="Professor#1">Professor #3</option>
                                    <option value="Professor#1">Professor #4</option>
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
											$msg = "";
											$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
											if ($numeroPesquisa >= 1){
												$contador = 0;
												while($laboratorio = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
													echo "<option value='{$laboratorio['idLaboratorio']}'>{$laboratorio['numeroLab']}</option>";
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
