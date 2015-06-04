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
				<li>Cadastrar Laboratório</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Cadastrar Laboratório</h1>
			</div>
		</div><!--/.row-->
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados do Laboratório</div>
					<div class="panel-body">
						<form class="form-horizontal" id="form-cadastrar-laboratorio" action="/cadastrar_laboratorio_exe.php" method="post">
							<fieldset>
								<div class="form-group" id="laboratorio-andar" >
									<label class="col-md-3 control-label">Nome</label>
									<div class="col-md-9">
									<input id="laboratorio-andar" name="laboratorio-andar" type="text" placeholder="Digite o Andar" title="igite o Andar em que se localiza o laboratório" class="form-control">
									</div>
								</div>

								<div class="form-group" id="div-turma-turno" >
									<label class="col-md-3 control-label">Turno</label>
                                    <select class="form-control" id="turma-turno" name="turma-turno">
                                    	<option value="manha">Manhã</option>
                                        <option value="tarde">Tarde</option>
                                        <option value="noite">Noite</option>
                                        <option value="sabado">Sabádo</option>
                                    </select>
								</div>
                                
                                <div class="form-group" id="div-turma-modulo" >
									<label class="col-md-3 control-label">Modulo</label>
                                    <select class="form-control" id="turma-modulo" name="turma-modulo">
                                    	<option value="Modulo#1">Modulo #1</option>
                                        <option value="Modulo#2">Modulo #2</option>
                                        <option value="Modulo#3">Modulo #3</option>
                                        <option value="Modulo#4">Modulo #4</option>
                                    </select>
								</div>
                                
                                <div class="form-group" id="div-turma-laboratorio" >
									<label class="col-md-3 control-label">Laboratório</label>
                                    <select class="form-control" id="turma-laboratorio" name="turma-laboratorio">
                                    	<option value="Laboratório#1">Laboratório #1</option>
                                        <option value="Laboratório#2">Laboratório #2</option>
                                        <option value="Laboratório#3">Laboratório #3</option>
                                        <option value="Laboratório#4">Laboratório #4</option>
                                    </select>
								</div>

								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="btn-laboratorio-enviar" id="btn-laboratorio-enviar" value="Enviar" class="btn btn-default btn-md pull-right" />
									</div>
								</div>
							</fieldset>
						</form>
					</div>
                </div>
           </div>
      </div>
	</div>	<!--/.main-->
<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
