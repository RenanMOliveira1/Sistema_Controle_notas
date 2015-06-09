<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "professor":
			header("Location: /acount/adminprof/");
		break;
		case "administracao":
			header("Location: /acount/admin/");
		break;
	}
	define('TITULO','Perfil');
	define('ENDERECO_PAG_INIC_AL','/acount/adminal/index.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, perfil" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('perfil');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-perfil" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="col-md-6">
            <div class="panel panel-default"> 
                <div class="panel-heading">Dados Pessoais</div> <!-- panel panel-default -->
                <div class="table-responsive panel-body">
                        <table class="table table-striped">
                            <tbody>
                          <td class="success">Email de Acesso: </td>
                                <td><?= $_SESSION['alEmail']?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Nome: </td>
                                <td><?= utf8_encode($_SESSION['alNome'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Nascimento</td>
                                <td><?= utf8_encode($_SESSION['alDataNascimento'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">CPF</td>
                                <td><?= utf8_encode($_SESSION['alCpf'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Sexo</td>
                                <td><?= utf8_encode($_SESSION['alSexo'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Telefone</td>
                                <td><?= utf8_encode($_SESSION['alTelefone'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Celular</td>
                                <td><?= utf8_encode($_SESSION['alCelular'])?></td>
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
                                <td><?= utf8_encode($_SESSION['alCep']) ?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Tipo de Logradouro: </td>
                                <td><?= utf8_encode($_SESSION['alTipoLogradouro']) ?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Logradouro: </td>
                                <td><?= utf8_encode($_SESSION['alLogradouro'])." - ". utf8_encode($_SESSION['alNumero'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Complemento: </td>
                                <td><?= utf8_encode($_SESSION['alComplemento'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Bairro: </td>
                                <td><?= utf8_encode($_SESSION['alBairro'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Cidade: </td>
                                <td><?= utf8_encode($_SESSION['alCidade'])?></td>
                            </tbody>
                            <tbody>
                          <td class="success">Estado: </td>
                                <td><?= utf8_encode($_SESSION['alEstado'])?></td>
                            </tbody>
                        </table>
                </div> <!-- table-responsive panel-body -->
            </div> <!-- panel panel-default -->
      </div> <!-- col-md-6 -->
	</section> <!-- main -->
	</div>
        </div><!-- panel-heading --><!-- table-responsive panel-body --><!-- main -->
</body>

</html>
