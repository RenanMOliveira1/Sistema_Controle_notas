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
				<li>Vincular Alunos</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Vincular Alunos</h1>
			</div>
		</div><!--/.row-->
		
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados da Vinculação</div>
					<div class="panel-body">
						<form action="vincular_alun_exe.php" method="post" id="form-vincular-alun">
                            <div class="form-group">
                                <label>Selecione o Aluno</label>
                                <select id="vincular-aluno-nomeAl" name="vincular-aluno-nomeAl" class="form-control">
                                    <option value="Aluno#1">Aluno #1</option>
                                    <option value="Aluno#2">Aluno #2</option>
                                    <option value="Aluno#3">Aluno #3</option>
                                    <option value="Aluno#4">Aluno #4</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Selecione a Turma</label>
                                <select id="vincular-aluno-turma" name="vincular-aluno-turma" class="form-control">
                                    <option value="Turma#1">Turma #1</option>
                                    <option value="Turma#2">Turma #2</option>
                                    <option value="Turma#3">Turma #3</option>
                                    <option value="Turma#4">Turma #4</option>
                                </select>
                            </div>
                            
                            <div id="btn-vinc-al-enviar">
                                <input type="btn-vinc-al-enviar" id="btn-vinc-al-enviar" value="Vincular" class="btn btn-default" />
                            </div>
                        </form>
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
