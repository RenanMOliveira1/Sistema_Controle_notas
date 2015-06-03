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
				<li>Criar Módulo</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Criar Módulo</h1>
			</div>
		</div><!--/.row-->
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados do Módulo</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
								<div class="form-group" id="admin-nome-mod" >
									<label class="col-md-3 control-label">Nome do Módulo</label>
									<div class="col-md-9">
									<input id="admin-nome-mod" name="admin-nome-mod" type="text" placeholder="Digite o Nome do Módulo" class="form-control">
									</div>
								</div>
                                
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="btn-mod-enviar" id="btn-mod-enviar" value="Enviar" class="btn btn-default btn-md pull-right" />
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
