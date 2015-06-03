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
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Cadastrar Professores</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Cadastrar Professores</h1>
			</div>
		</div><!--/.row-->
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados do Professor</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
								<div class="form-group" id="admin-prof-nome" >
									<label class="col-md-3 control-label">Nome</label>
									<div class="col-md-9">
									<input id="admin-prof-nome" name="admin-prof-nome" type="text" placeholder="Digite o Nome" class="form-control">
									</div>
								</div>

								<div class="form-group" id="admin-prof-cpf" >
									<label class="col-md-3 control-label">CPF</label>
									<div class="col-md-9">
										<input id="admin-prof-cpf" name="admin-prof-cpf" type="text" placeholder="Digite o CPF do Professor" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="btn-cad-prof-enviar" id="btn-cad-prof-enviar" value="Enviar" class="btn btn-default btn-md pull-right" />
									</div>
								</div>
							</fieldset>
						</form>
					</div>
                </div>
           </div>
      </div>
	</div>	<!--/.main-->
</body>

</html>
