<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "administracao":
			header("Location: /acount/admin/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
?>
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

<body onLoad="SidebarActive('lancar-notas');">
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Lançar Notas</li>
			</ol>
		</div><!--/.row-->
		
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Turma NomeDaTurma</div>
                    <div class="table-responsive panel-body">
                        <form method="post" action="/lancar_nota.php" id="form-lacar-nota" >
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th data-field="disciplina" data-align="right">Nome do Aluno</th>
                                        <th data-field="av1">1ª Avaliação</th>
                                        <th data-field="av2">2ª Avaliação</th>
                                        <th data-field="av3">Prova Final</th>
                                        <th data-field="pf">Comentário</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>NomeDoAluno</td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av1" name="nota-av1" placeholder="Digite a Nota da AV1" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av2" name="nota-av2" placeholder="Digite a Nota da AV2"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-pf" name="nota-pf" placeholder="Digite a Nota da PF"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-comentario" name="nota-comentario" placeholder="Digite um Comentário"  />
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>NomeDoAluno</td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av1" name="nota-av1" placeholder="Digite a Nota da AV1" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av2" name="nota-av2" placeholder="Digite a Nota da AV2"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-pf" name="nota-pf" placeholder="Digite a Nota da PF"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-comentario" name="nota-comentario" placeholder="Digite um Comentário"  />
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>NomeDoAluno</td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av1" name="nota-av1" placeholder="Digite a Nota da AV1" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av2" name="nota-av2" placeholder="Digite a Nota da AV2"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-pf" name="nota-pf" placeholder="Digite a Nota da PF"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-comentario" name="nota-comentario" placeholder="Digite um Comentário"  />
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>NomeDoAluno</td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av1" name="nota-av1" placeholder="Digite a Nota da AV1" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av2" name="nota-av2" placeholder="Digite a Nota da AV2"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-pf" name="nota-pf" placeholder="Digite a Nota da PF"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-comentario" name="nota-comentario" placeholder="Digite um Comentário"  />
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>NomeDoAluno</td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av1" name="nota-av1" placeholder="Digite a Nota da AV1" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av2" name="nota-av2" placeholder="Digite a Nota da AV2"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-pf" name="nota-pf" placeholder="Digite a Nota da PF"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-comentario" name="nota-comentario" placeholder="Digite um Comentário"  />
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>NomeDoAluno</td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av1" name="nota-av1" placeholder="Digite a Nota da AV1" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-av2" name="nota-av2" placeholder="Digite a Nota da AV2"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-pf" name="nota-pf" placeholder="Digite a Nota da PF"  />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" id="nota-comentario" name="nota-comentario" placeholder="Digite um Comentário"  />
                                    </td>
                                </tbody>
                            </table>
                        <input type="button" class="btn btn-primary" id="btn-nota-lancar" value="Lançar Nota" />
                        </form>
                  </div> <!-- table-responsive panel-body -->
            </div> <!-- panel panel-default  -->
        </div> <!-- col-md-12 -->
	</div> <!--/.main-->

	<? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</body>

</html>
