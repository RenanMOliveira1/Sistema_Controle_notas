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
	define("TITULO","Vincular Alunos à Turma");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('vinc-aluno');">
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
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
					<div class="panel-heading"> Dados da Vinculação</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="vincular_alun_exe.php" method="post" id="form-vincular-alun">
                            <div class="form-group" id="div-vincular-aluno-nomeAl" >
                                <label class="col-md-3 control-label">
                                    <span>Selecione o Aluno</span>
                                </label>
                                <div class="col-md-9">
                                    <select id="vincular-aluno-nomeAl" name="vincular-aluno-nomeAl" 
                                    class="form-control" title="Escolha o Aluno" >
                                        <option value="Aluno#1">Aluno #1</option>
                                        <option value="Aluno#2">Aluno #2</option>
                                        <option value="Aluno#3">Aluno #3</option>
                                        <option value="Aluno#4">Aluno #4</option>
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
                                        <option value="Turma#1">Turma #1</option>
                                        <option value="Turma#2">Turma #2</option>
                                        <option value="Turma#3">Turma #3</option>
                                        <option value="Turma#4">Turma #4</option>
                                    </select>
                                </div> <!-- col-md-9 -->
                            </div> <!-- col-md-9 -->
                            
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
