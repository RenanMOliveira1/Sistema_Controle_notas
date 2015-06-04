<?
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

<body>
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div>
		</div><!--/.row-->
		
        
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
                    	<span>Dados do Laboratório</span>
                    </div>
					<div class="panel-body">
						<form class="form-horizontal" id="form-cadastrar-laboratorio" action="/cadastrar_laboratio_exe.php" method="post">
							<fieldset>
								<div class="form-group" id="div-laboratorio-andar" >
									<label class="col-md-3 control-label">
                                    	<span>Andar</span>
                                    </label>
									<div class="col-md-9">
										<input id="laboratorio-andar" name="laboratorio-andar" type="text" placeholder="Digite o Andar" title="Digite o Andar em que se localiza o laboratório" class="form-control">
									</div>
								</div>

								<div class="form-group" id="div-laboratorio-lugares" >
									<label class="col-md-3 control-label">Numero de Lugares</label>
									<div class="col-md-9">
										<input id="laboratorio-lugares" name="laboratorio-lugares" type="text" placeholder="Digite o Numero de Lugares" title="Digite o Numero de Lugares Disponível no Laboratório" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 widget-right" id="div-laboratorio-enviar">
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
