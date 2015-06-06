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
	define("TITULO", "Cadastrar Laboratório");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, administração, cadastrar, laboratorio" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('cad-laboratorio');">
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
			</div>
		</div> <!-- row -->
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Dados do Laboratório</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" id="form-cadastrar-laboratorio" action="/acount/admin/cadastrar_laboratio_exe.php" method="post" >
                            <div class="form-group" id="div-laboratorio-andar" >
                                <label class="col-md-3 control-label">
                                    <span>Andar</span>
                                </label>
                                <div class="col-md-9">
                                    <select id="laboratorio-andar" name="laboratorio-andar" class="form-control" 
                                    title="Escolha o Andar em que se localiza o laboratório">
									<? for ($numLugar = 1; $numLugar <= 10; $numLugar++) { ?>
                                    	<option value="<?=$numLugar?>"><?=$numLugar?></option> 
                                    <? } ?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-laboratorio-andar -->

                            <div class="form-group" id="div-laboratorio-lugares" >
                                <label class="col-md-3 control-label">
                                    <span>Numero de Lugares</span>
                                </label>
                                <div class="col-md-9">
                                    <select id="laboratorio-lugares" name="laboratorio-lugares" class="form-control" 
                                    title="Escolha o Numero de Lugares Disponível no Laboratório">
									<? for ($numLugar = 1; $numLugar <= 80; $numLugar++) { ?>
                                    	<option value="<?=$numLugar?>"><?=$numLugar?></option> 
                                    <? } ?>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-laboratorio-lugares -->

                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-laboratorio-enviar">
                                    <input type="button" id="btn-laboratorio-enviar" 
                                    value="Enviar" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#btn-laboratorio-enviar','#form-cadastrar-laboratorio',true);"/>
                                </div> <!-- div-laboratorio-enviar -->
                            </div> <!-- form-group -->
						</form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
      </div> <!-- row -->
	</div> <!-- main -->
</body>

</html>
