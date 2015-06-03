<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title>SGA | Painel de Controle do Aluno</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body>
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Configurações</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Configurações</h1>
			</div>
		</div><!--/.row-->
		
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Senha</div>
					<div class="panel-body">
                    	<form id="form-alterar-senha" method="post" action="aterar_senha_exec.php">
                        	<div class="form-group" id="div-alterar-senha-antiga">
                            	<label>
                                	<span>Senha Atual: </span>
                                    <input type="password" id="alterar-senha-antiga" class="form-control" name="alterar-senha-antiga" title="Digite sua Senha atual" />
                                </label>
                            </div>
                            <div class="form-group" id="div-alterar-senha-nova">
                            	<label>
                                	<span>Nova Senha: </span>
                                    <input type="password" id="alterar-senha-nova" class="form-control" name="alterar-senha-nova" title="Digite a sua Nova senha" />
                                </label>
                            </div>
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<label>
                                	<span>Confirmar Senha: </span>
                                    <input type="password" id="alterar-senha-Confirmar" class="form-control" name="alterar-senha-Confirmar" title="Confirme a sua nova Senha" />
                                </label>
                            </div>
                            
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<input type="button" id="btn-alterar-enviar" class="btn btn-primary" value="Alterar Senha" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
	</section>	<!--/.main-->
</body>

</html>
