<?
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title>SGA: Painel de Controle do Aluno | Notas</title>
	
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('notas');">
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Notas</li>
			</ol>
		</div><!--/.row-->
		
        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Notas</h1>
			</div>
		</div><!--/.row-->
        
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ciclo 3</div>
                    <div class="table-responsive panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-field="disciplina" data-align="right">Disciplina</th>
                                    <th data-field="av1">1ª Avaliação</th>
                                    <th data-field="av2">2ª Avaliação</th>
                                    <th data-field="av3">Prova Final</th>
                                    <th data-field="pf">Nota Final</th>
                                    <th data-field="status">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>Discplina #1</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #2</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #3</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #4</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ciclo 2</div>
                    <div class="table-responsive panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-field="disciplina" data-align="right">Disciplina</th>
                                    <th data-field="av1">1ª Avaliação</th>
                                    <th data-field="av2">2ª Avaliação</th>
                                    <th data-field="av3">Prova Final</th>
                                    <th data-field="pf">Nota Final</th>
                                    <th data-field="status">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>Discplina #1</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #2</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #3</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #4</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ciclo 1</div>
                    <div class="table-responsive panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-field="disciplina" data-align="right">Disciplina</th>
                                    <th data-field="av1">1ª Avaliação</th>
                                    <th data-field="av2">2ª Avaliação</th>
                                    <th data-field="av3">Prova Final</th>
                                    <th data-field="pf">Nota Final</th>
                                    <th data-field="status">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>Discplina #1</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #2</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #3</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                            <tbody>
                                <td>Discplina #4</td>
                                <td>7</td>
                                <td>8</td>
                                <td>--</td>
                                <td>7</td>
                                <td>Aprovado</td>
                            </tbody>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
		
	</section>	<!--/.main-->	
</body>

</html>
