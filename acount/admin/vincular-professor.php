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
		
        <form action="vincular_prod.php" method="post" id="form-vincular-prof">
            <div class="form-group">
                <label>Selecione o Professor</label>
                <select class="form-control">
                    <option>Professor #1</option>
                    <option>Professor #2</option>
                    <option>Professor #3</option>
                    <option>Professor #4</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Selecione o Módulo</label>
                <select class="form-control">
                    <option>Módulo #1</option>
                    <option>Módulo #2</option>
                    <option>Módulo #3</option>
                    <option>Módulo #4</option>
                </select>
            </div>
        	
            <div id="btn-vinc-prof-enviar">
                <input type="btn-vinc-prof-enviar" id="btn-vinc-prof-enviar" value="Vincular" class="btn btn-default" />
            </div>
        </form>
        
	</div>	<!--/.main-->
</body>

</html>
