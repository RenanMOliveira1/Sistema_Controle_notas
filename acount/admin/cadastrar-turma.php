<?
	session_start();
	define("TITULO","Cadastrar Turma");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, laboratorio" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('cad-turma');">
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div><!-- row -->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div>
		</div><!-- row -->
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Dados da Turma</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-cadastrar-turma" action="/acount/admin/cadastrar_turma_exe.php" method="post">
                            <div class="form-group" id="div-turma-nome" >
                                <label class="col-md-3 control-label">
                                	<span>Nome</span>
                                </label>
                                <div class="col-md-9">
                                	<input id="turma-nome" name="turma-nome" type="text" placeholder="Digite o Nome da Turma" title="Digite o nome da Turma" class="form-control">
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-nome -->

                            <div class="form-group" id="div-turma-turno" >
                                <label class="col-md-3 control-label">
                                	<span>Turno</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="turma-turno" name="turma-turno"
                                    title="Escolha o Turno de Aula" >
                                        <option value="manha">Manhã</option>
                                        <option value="tarde">Tarde</option>
                                        <option value="noite">Noite</option>
                                        <option value="sabado">Sabádo</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-turno -->
                            
                            <div class="form-group" id="div-turma-modulo" >
                                <label class="col-md-3 control-label">
                                	<span>Modulo</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="turma-modulo" name="turma-modulo"
                                    title="Escolha o Módulo" >
                                        <option value="Modulo#1">Modulo #1</option>
                                        <option value="Modulo#2">Modulo #2</option>
                                        <option value="Modulo#3">Modulo #3</option>
                                        <option value="Modulo#4">Modulo #4</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-modulo -->
                            
                            <div class="form-group" id="div-turma-laboratorio" >
                                <label class="col-md-3 control-label">Laboratório</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="turma-laboratorio" name="turma-laboratorio"
                                    title="Escolha o Laboratório">
                                        <option value="Laboratório#1">Laboratório #1</option>
                                        <option value="Laboratório#2">Laboratório #2</option>
                                        <option value="Laboratório#3">Laboratório #3</option>
                                        <option value="Laboratório#4">Laboratório #4</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-turma-laboratorio -->
							
                            <div id="dados-invalidos"></div> <!-- dados-invalidos -->
                            
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
	</div> <!-- main -->	
</body>

</html>
