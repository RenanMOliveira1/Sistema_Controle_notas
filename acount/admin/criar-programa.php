<?
	session_start();
	$msgExiste = "";
	$msgExiste = @$_GET['msg'];
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
	define("TITULO","Criar Programa");
	switch($_SESSION['admCargo']){
		case "ass":
		case "rca":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, administracao, programa" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('criar-programa');">
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div> <!-- row -->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
		
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados do Programa</div>
					<div class="panel-body">
						<form id="form-criar-programa" class="form-horizontal" action="/acount/admin/criar_programa.php" method="post">
                            <div class="form-group" id="div-programa-tipo" >
                                <label class="col-md-3 control-label">
                                    <span>Tipo</span>
                                </label>
                                <div class="col-md-9">
                                <select id="programa-tipo" name="programa-tipo" class="form-control" 
                                title="Escolha o Tipo" >
                                    <option value="graduacao">Graduação</option>
                                    <option value="pos">Pós-Graduação</option>
                                    <option value="intensivo">Intensivo</option>
                                </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- programa-tipo -->

                            <div class="form-group" id="div-nome-curso" >
                                <label class="col-md-3 control-label">
                                    <span>Nome do Curso</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="nome-curso" name="nome-curso" type="text" class="form-control"
                                    placeholder="Digite o Nome do Curso" title="Entre com o Nome do Curso" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- nome-curso -->
                            
                            <div class="form-group" id="div-sigla-curso" >
                                <label class="col-md-3 control-label">
                                    <span>Sigla do Curso</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="sigla-curso" name="sigla-curso" type="text" class="form-control"
                                    placeholder="Digite a Sigla do Curso" title="Entre com a Sigla do Curso" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- sigla-curso -->
                            
                            <div id="dados-invalidos">
                            	<? if($msgExiste != " "){
										echo "$msgExiste";
									}									
								?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <input type="button" id="btn-programa-enviar" value="Enviar" 
                                    class="btn btn-default btn-md pull-right" onClick="botoesEnviar('#btn-programa-enviar','#form-criar-programa', ValidarPrograma());"/>
                                </div> <!-- col-md-12 widget-right -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
        </div> <!-- row -->
        
	</div> <!-- main -->
</body>

</html>
