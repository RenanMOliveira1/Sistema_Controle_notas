<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title>SGA | Painel de Controle do Aluno: Notas</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('configuracoes-prof');">
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
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
                                    <input type="password" id="alterar-senha-antiga" class="form-control" name="alterar-senha-antiga" title="Digite sua Senha atual" placeholder="Digite sua Senha atual" size="30"/>
                                </label>
                            </div>
                            <div class="form-group" id="div-alterar-senha-nova">
                            	<label>
                                	<span>Nova Senha: </span>
                                    <input type="password" id="alterar-senha-nova" class="form-control" name="alterar-senha-nova" title="Digite a sua Nova senha" placeholder="Digite a sua Nova senha" size="30"/>
                                </label>
                            </div>
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<label>
                                	<span>Confirmar Senha: </span>
                                    <input type="password" id="alterar-senha-Confirmar" class="form-control" name="alterar-senha-Confirmar" title="Confirme a sua nova Senha" placeholder="Confirme a sua nova Senha" size="30"/>
                                </label>
                            </div>
                            
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<input type="button" id="btn-alterar-enviar" class="btn btn-primary" value="Alterar Senha" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Dados</div>
					<div class="panel-body">
                    	<form id="formulario-cadastro" action="Entrar.php" method="post">
                            <div class="form-campos" id="div-prof-nome">
                                <label>
                                    <span>Nome: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="prof-nome" size="70" class="form-control"
                                    maxlength="150" title="Entre com o novo Nome" 
                                    placeholder="Digite o seu Nome Completo" autofocus />
                                </label>
                            </div> <!-- div-nome -->
                                
                            <div class="form-campos" id="div-prof-cpf">
                                <label>
                                    <span>CPF: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="prof-cpf" class="form-control" maxlenght="11" size="20"
                                    title="Entre com o seu CPF" placeholder="Digite o novo CPF" />
                                </label>
                            </div> <!-- div-nascimento -->
                            
                            <div id="dados-invalidos"></div> <!-- dados-invalidos -->
                            
                        <div id="div-btn-prof-alterarDados">
                            <input type="button" id="btn-prof-alterarDados" class="btn btn-primary" value="Alterar Dados" />
                        </div> <!-- div-btn-enviar -->
                    </div>
                </div>
            </div>
        </div>
        
		
	</section>	<!--/.main-->
</body>

</html>
