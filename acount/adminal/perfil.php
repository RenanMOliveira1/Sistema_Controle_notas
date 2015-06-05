<?
	session_start();
	define('TITULO','Perfil');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, perfil" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('perfil');">
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-pefil" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div>
		</div><!--/.row-->
		
        <div class="col-md-6">
<<<<<<< HEAD
            <div class="panel panel-default"> 
                <div class="panel-heading">Dados Pessoais</div> <!-- panel panel-default -->
                <div class="table-responsive panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <td class="success">Email de Acesso: </td>
                            <td>tiago.silva.93@hotmail.com</td>
                        </tbody>
                        <tbody>
                            <td class="success">Nome: </td>
                            <td>Tiago Henrique</td>
                        </tbody>
                        <tbody>
                            <td class="success">Nascimento</td>
                            <td>08/11/1993</td>
                        </tbody>
                        <tbody>
                            <td class="success">CPF</td>
                            <td>424.254.548-78</td>
                        </tbody>
                        <tbody>
                            <td class="success">Sexo</td>
                            <td>Masculino</td>
                        </tbody>
                        <tbody>
                            <td class="success">Telefone</td>
                            <td>3879-6521</td>
                        </tbody>
                        <tbody>
                            <td class="success">Celular</td>
                            <td>98782-8974</td>
                        </tbody>
                    </table>
                </div> <!-- table-responsive panel-body -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-md-6 -->
        
        <div class="col-md-6">
            <div class="panel panel-default"> 
                <div class="panel-heading">Endereço</div> <!-- panel panel-default -->
                <div class="table-responsive panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <td class="success">CEP: </td>
                            <td>21911-200</td>
                        </tbody>
                        <tbody>
                            <td class="success">Tipo de Logradouro: </td>
                            <td>Casa</td>
                        </tbody>
                        <tbody>
                            <td class="success">Logradouro: </td>
                            <td>Rua Pio Dutra - 140</td>
                        </tbody>
                        <tbody>
                            <td class="success">Complemento: </td>
                            <td>--</td>
                        </tbody>
                        <tbody>
                            <td class="success">Bairro: </td>
                            <td>Ilha do Governador</td>
                        </tbody>
                        <tbody>
                            <td class="success">Cidade: </td>
                            <td>Rio de janeiro</td>
                        </tbody>
                        <tbody>
                            <td class="success">Estado: </td>
                            <td>Rio de janeiro</td>
                        </tbody>
                    </table>
                </div> <!-- table-responsive panel-body -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-md-6 -->
	</section> <!-- main -->
=======
            <div class="panel panel-default">
                <div class="panel-heading">Dados Pessoais</div>
                    <div class="table-responsive panel-body">
                        <table class="table table-striped">
                            <tbody>
                                <td class="success">Email de Acesso: </td>
                                <td><?= $_SESSION['alEmail']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Nome: </td>
                                <td><?= $_SESSION['alNome']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Nascimento</td>
                                <td><?= $_SESSION['alDataNascimento']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">CPF</td>
                                <td><?= $_SESSION['alCpf']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Sexo</td>
                                <td><?= $_SESSION['alSexo']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Telefone</td>
                                <td><?= $_SESSION['alTelefone']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Celular</td>
                                <td><?= $_SESSION['alCelular']?></td>
                            </tbody>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Endereço</div>
                    <div class="table-responsive panel-body">
                        <table class="table table-striped">
                            
                            <tbody>
                                <td class="success">CEP: </td>
                                <td><?= $_SESSION['alCep']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Tipo de Logradouro: </td>
                                <td><?= $_SESSION['alTipoLogradouro']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Logradouro: </td>
                                <td><?= $_SESSION['alLogradouro']." - ". $_SESSION['alNumero']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Complemento: </td>
                                <td><?= $_SESSION['alComplemento']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Bairro: </td>
                                <td><?= $_SESSION['alBairro']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Cidade: </td>
                                <td><?= $_SESSION['alCidade']?></td>
                            </tbody>
                            <tbody>
                                <td class="success">Estado: </td>
                                <td><?= $_SESSION['alEstado']?></td>
                            </tbody>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
        
		
	</section>	<!--/.main-->
>>>>>>> origin/master
</body>

</html>
