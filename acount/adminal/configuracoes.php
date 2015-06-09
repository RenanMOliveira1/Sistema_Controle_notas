<?
	$msgSenha = "";
	$msgSenha .= @$_GET['msgSenha'];
	$msgEmail = "";
	$msgEmail .= @$_GET['msgEmail'];
	$msgDados = "";
	$msgDados .= @$_GET['msgDados'];

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
	define('TITULO','Configurações');
	define('ENDERECO_PAG_INIC_AL','/acount/adminal/index.php');
	
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, configuracoes" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('configuracoes');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-configuracoes" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Senha</div> <!-- panel-heading -->
					<div class="panel-body">
                    	<form id="form-alterar-senha" method="post" action="alterar_aluno.php?acao=senha">
                        	<div class="form-group" id="div-alterar-senha-antiga">
                            	<label>
                                	<span>Senha Atual: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="password" id="alterar-senha-antiga" class="form-control" name="alterar-senha-antiga" title="Digite sua Senha atual" placeholder="Digite sua Senha atual" size="30" autofocus/>
                                </label>
                            </div> <!-- div-alterar-senha-antiga -->
                            <div class="form-group" id="div-alterar-senha-nova">
                            	<label>
                                	<span>Nova Senha: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="password" id="alterar-senha-nova" class="form-control" name="alterar-senha-nova" title="Digite a sua Nova Senha" placeholder="Digite a sua Nova Senha" size="30" />
                                </label>
                            </div> <!-- div-alterar-senha-nova -->
                            <div class="form-group" id="div-alterar-senha-confirmar">
                            	<label>
                                	<span>Confirmar Senha: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="password" id="alterar-senha-confirmar" class="form-control" name="alterar-senha-confirmar" title="Confirme a sua nova Senha" placeholder="Confirme a sua nova Senha" size="30" />
                                </label>
                            </div> <!-- div-alterar-senha-Confirmar -->
                            
                            <div id="dados-invalidos">
								<?	if($msgSenha != ""){
                                        echo $msgSenha;
                                    }
                                ?>
							</div> <!-- dados-invalidos -->
                            
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<input type="button" id="btn-alterar-enviar" class="btn btn-primary" value="Alterar Senha" onClick="botoesEnviar('#btn-alterar-enviar','#form-alterar-senha',ValidarAlterarSenha());"/>
                            </div> <!-- div-alterar-senha-Confirmar -->
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
            
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Email (Login)</div> <!-- panel-heading -->
					<div class="panel-body">
                    	<form id="form-alterar-email" method="post" action="alterar_aluno.php?acao=email">
                        	<div class="form-campos" id="div-alt-email-atual">
                                <label>
                                    <span>Email Atual: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" class="form-control" name="alt-email-atual" 
                                    placeholder="Digite o seu Atual Email" size="60" id="alt-email-atual" 
                                    value="<?= utf8_encode($_SESSION['alEmail'])?>";
                                    title="Entre com o seu email atual para acesso" />
                                </label>
                            </div> <!-- div-alt-email-atual -->
                            <div class="form-campos" id="div-alt-email-novo">
                                <label>
                                    <span>Novo Email: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" class="form-control" name="alt-email-novo" 
                                    placeholder="Digite o Novo Email" size="60" id="alt-email-novo" 
                                    title="Entre com o seu novo email para acesso" />
                                </label>
                            </div> <!-- div-alt-email-novo -->
                            
                            <div id="dados-invalidos-email">								
								<?	if($msgEmail != ""){
                                		echo $msgEmail;
                                    }
                                ?>
                            </div> <!-- dados-invalidos -->
                            
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<input type="button" id="btn-alterar-enviar-email" class="btn btn-primary" value="Alterar Email" onClick="botoesEnviar('#btn-alterar-enviar-email','#form-alterar-email',ValidarAlterarEmail());"/>
                            </div> <!-- div-alterar-senha-Confirmar -->
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-12 -->
         
            <div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Dados de Cadastro</div> <!-- panel-heading -->
					<div class="panel-body">
                    	<form id="formulario-alterar-cadastro" action="alterar_aluno.php?acao=dados" method="post">
                            <div class="form-campos" id="div-alt-nome">
                                <label>
                                    <span>Nome: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-nome" name="alt-nome" size="70" class="form-control"
                                    maxlength="150" title="Entre com o Novo Nome" value="<?= utf8_encode($_SESSION['alNome'])?>";
                                    placeholder="Entre com o Novo Nome" autofocus />
                                </label>
                            </div> <!-- div-alt-nome -->   
                            <div class="form-campos" id="div-alt-nascimento">
                                <label>
                                    <span>Nascimento: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-data-nascimento" name="alt-data-nascimento" class="form-control" maxlenght="10" size="30"
                                    title="Entre com a Nova Data de Nascimento 00/00/0000" value="<?= utf8_encode($_SESSION['alDataNascimento'])?>";
                                    placeholder="Digite a Nova Data 00/00/0000" />
                                </label>
                            </div> <!-- div-alt-nascimento -->
                            <div class="form-campos" id="div-alt-cpf">
                                <label>
                                    <span>CPF: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-cpf" name="alt-cpf" class="form-control" maxlenght="11" size="20" value="<?= utf8_encode($_SESSION['alCpf'])?>";
                                    title="Entre com o Novo seu CPF" placeholder="Digite o Novo seu CPF" />
                                </label>
                            </div> <!-- div-alt-nascimento -->
                            <div class="form-campos" id="div-alt-sexo">
                                <label>
                                    <span>Sexo: <span class="asteristicos-obrigatorio">*</span></span>
                                    <select id="alt-sexo" class="form-control" name="alt-sexo" title="Escolha o seu Novo Sexo" >
                                    	<?
											if($_SESSION['alSexo'] == "Masculino"){
												echo "<option value='Masculino' selected='selected'>Masculino</option>";
											}else{
												echo "<option value='Masculino'>Masculino</option>";
											}
											if($_SESSION['alSexo'] == "Feminino"){
												echo "<option value='Feminino' selected='selected'>Feminino</option>";
											}else{
												echo "<option value='Feminino'>Feminino</option>";
											}
											
										?>
                                    </select>
                                </label>
                            </div> <!-- div-nascimento -->
                            <div class="form-campos" id="div-alt-telefone-fixo">
                                <label>
                                    <span>Telefone: </span>
                                    <input type="text" id="alt-telefone-fixo" name="alt-telefone-fixo" title="Digite o seu Novo Telefone Fixo" maxlenght="65" class="form-control" value="<?= $_SESSION['alTelefone']?>"; placeholder="Digite o seu Novo Telefone Fixo" size="35" />
                                </label>
                            </div> <!-- div-alt-telefone-fixo -->
                            <div class="form-campos" id="div-alt-telefone-celular">
                                <label>
                                    <span>Celular: </span>
                                    <input type="text" class="form-control" id="alt-telefone-celular" name="alt-telefone-celular"
                                    maxlenght="65" value="<?= $_SESSION['alCelular']?>"; placeholder="Digite o seu Novo Celular" title="Digite o seu Novo Celular" size="35" />
                                </label>
                            </div> <!-- div-telefone-celular -->
                            <div class="form-campos" id="div-alt-cep">
                                <label>
                                    <span>CEP: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-cep" name="alt-cep" value="<?= $_SESSION['alCep']?>";
                                    title="Entre com o Novo CEP" class="form-control" placeholder="Digite o seu Novo CEP" />
                                </label>
                            </div> <!-- div-alt-cep -->
                            <div class="form-campos" id="div-alt-tipo-logradouro">
                                <label>
                                    <span>Tipo de Logradouro: <span class="asteristicos-obrigatorio">*</span></span>
                                    <select name="alt-tipo-logradouro" class="form-control" id="alt-tipo-logradouro"/>
                                    	<?
											if($_SESSION['alTipoLogradouro'] == "casa"){
												echo "<option value='casa' selected='selected'>Casa</option>";
											}else{
												echo "<option value='casa'>Casa</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "condominio"){
												echo "<option value='condominio' selected='selected'>Condomínio</option>";
											}else{
												echo "<option value='condominio'>Condomínio</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "AV"){
												echo "<option value='AV' selected='selected'>Avenida</option>";
											}else{
												echo "<option value='AV'>Avenida</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "praca"){
												echo "<option value='praca' selected='selected'>Praça</option>";
											}else{
												echo "<option value='praca'>Praça</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "beco"){
												echo "<option value='beco' selected='selected'>Beco</option>";
											}else{
												echo "<option value='beco'>Beco</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "rodovia"){
												echo "<option value='rodovia' selected='selected'>Rodovía</option>";
											}else{
												echo "<option value='rodovia'>Rodovía</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "aeroporto"){
												echo "<option value='aeroporto' selected='selected'>Aeroporto</option>";
											}else{
												echo "<option value='aeroporto'>Aeroporto</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "vila"){
												echo "<option value='vila' selected='selected'>Vila</option>";
											}else{
												echo "<option value='vila'>Vila</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "chacara"){
												echo "<option value='chacara' selected='selected'>Chácara</option>";
											}else{
												echo "<option value='chacara'>Chácara</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "sitio"){
												echo "<option value='sitio' selected='selected'>Sitío</option>";
											}else{
												echo "<option value='sitio'>Sitío</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "morro"){
												echo "<option value='morro' selected='selected'>Morro</option>";
											}else{
												echo "<option value='morro'>Morro</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "favela"){
												echo "<option value='favela' selected='selected'>Favela</option>";
											}else{
												echo "<option value='favela'>Favela</option>";
											}
											if($_SESSION['alTipoLogradouro'] == "loteamento"){
												echo "<option value='loteamento' selected='selected'>Loteamento</option>";
											}else{
												echo "<option value='loteamento'>Loteamento</option>";
											}
										?>
                                    </select>
                                 </label>
                            </div> <!-- div-alt-tipo-logradouro  -->
                            <div class="form-campos" id="div-alt-numero">
                                <label>
                                    <span>Numero: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-numero" name="alt-numero" placeholder="Numero" value="<?= $_SESSION['alNumero']?>";
                                    title="Entre com o Novo Numero da Casa" class="form-control" size="7" />
                                </label>
                            </div> <!-- div-alt-numero -->
                            <div class="form-campos" id="div-alt-logradouro">
                                <label>
                                    <span>Logradouro: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" id="alt-logradouro" name="alt-logradouro" value="<?= utf8_encode($_SESSION['alLogradouro'])?>";
                                    title="Digite o seu Novo Logadouro" class="form-control" 
                                    size="80" placeholder="Digite o seu Novo Logadouro" />
                                </label>
                            </div> <!-- div-alt-logradouro -->
                            <div class="form-campos" id="div-alt-complemento">
                                <label>
                                    <span>Complemento: </span>
                                    <input type="text" name="alt-complemento" id="alt-complemento" size="100"
                                    title="Se houver algum complemento, digite aqui"  value="<?= utf8_encode($_SESSION['alComplemento'])?>";
                                    class="form-control" placeholder="Digite o Algum Complemento, se Tiver"/>
                                </label>
                            </div> <!-- div-alt-complemento -->
                            <div class="form-campos" id="div-alt-bairro">
                                <label>
                                    <span>Bairro: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" name="alt-bairro" id="alt-bairro" value="<?= utf8_encode($_SESSION['alBairro'])?>";
                                    title="Entre com o seu Novo bairro" class="form-control" 
                                    placeholder="Digite o seu Novo Bairro" size="35" />
                                </label>
                            </div> <!-- div-alt-bairro -->
                            <div class="form-campos" id="div-alt-cidade">
                                <label>
                                    <span>Cidade: <span class="asteristicos-obrigatorio">*</span></span>
                                    <input type="text" name="alt-cidade" id="alt-cidade" value="<?= utf8_encode($_SESSION['alCidade'])?>";
                                    title="Entre com a Nova cidade" class="form-control" 
                                    placeholder="Digite a sua Nova Cidade" size="35" />
                                </label>
                            </div> <!-- div-alt-cidade -->
                            <div class="form-campos" id="div-alt-estado">
                                <label>
                                <span>Estado: <span class="asteristicos-obrigatorio">*</span></span>
                                    <select name="alt-estado" class="form-control" id="alt-estado">
                                    <?
										if($_SESSION['alEstado'] == "AC"){
											echo "<option value='AC' selected='selected'>Acre</option>";
										}else{
											echo "<option value='AC'>Acre</option>";
										}
										if($_SESSION['alEstado'] == "RJ"){
											echo "<option value='RJ' selected='selected'>Rio de Janeiro</option>";
										}else{
											echo "<option value='RJ'>Rio de Janeiro</option>";
										}
										if($_SESSION['alEstado'] == "SP"){
											echo "<option value='SP' selected='selected'>São Paulo</option>";
										}else{
											echo "<option value='SP'>São Paulo</option>";
										}
										if($_SESSION['alEstado'] == "AL"){
											echo "<option value='AL' selected='selected'>Alagoas</option>";
										}else{
											echo "<option value='AL'>Alagoas</option>";
										}
										if($_SESSION['alEstado'] == "AP"){
											echo "<option value='AP' selected='selected'>Amapá</option>";
										}else{
											echo "<option value='AP'>Amapá</option>";
										}
										if($_SESSION['alEstado'] == "AM"){
											echo "<option value='AM' selected='selected'>Amazonas</option>";
										}else{
											echo "<option value='AM'>Amazonas</option>";
										}
										if($_SESSION['alEstado'] == "BA"){
											echo "<option value='BA' selected='selected'>Bahia</option>";
										}else{
											echo "<option value='BA'>Bahia</option>";
										}
										if($_SESSION['alEstado'] == "CE"){
											echo "<option value='CE' selected='selected'>Ceará</option>";
										}else{
											echo "<option value='CE'>Ceará</option>";;
										}
										if($_SESSION['alEstado'] == "DF"){
											echo "<option value='DF' selected='selected'>Distrito Federal</option>";
										}else{
											echo "<option value='DF'>Distrito Federal</option>";
										}
										if($_SESSION['alEstado'] == "ES"){
											echo "<option value='ES' selected='selected'>Espírito Santo</option>";
										}else{
											echo "<option value='ES'>Espírito Santo</option>";
										}
										if($_SESSION['alEstado'] == "GO"){
											echo "<option value='GO' selected='selected'>Goiás</option>";
										}else{
											echo "<option value='GO'>Goiás</option>";
										}
										if($_SESSION['alEstado'] == "MA"){
											echo "<option value='MA' selected='selected'>Maranhão</option>";
										}else{
											echo "<option value='MA'>Maranhão</option>";;
										}
										if($_SESSION['alEstado'] == "MT"){
											echo "<option value='MT' selected='selected'>Mato Grosso</option>";
										}else{
											echo "<option value='MT'>Mato Grosso</option>";
										}		
										if($_SESSION['alEstado'] == "MS"){
											echo "<option value='MS' selected='selected'>Mato Grosso do Sul</option>";
										}else{
											echo "<option value='MS'>Mato Grosso do Sul</option>";
										}
										if($_SESSION['alEstado'] == "MG"){
											echo "<option value='MG' selected='selected'>Minas Gerais</option>";
										}else{
											echo "<option value='MG'>Minas Gerais</option>";
										}
										if($_SESSION['alEstado'] == "PA"){
											echo "<option value='PA' selected='selected'>Pará</option>";
										}else{
											echo "<option value='PA'>Pará</option>";
										}
										if($_SESSION['alEstado'] == "PB"){
											echo "<option value='PB' selected='selected'>Paraíba</option>";
										}else{
											echo "<option value='PB'>Paraíba</option>";
										}
										if($_SESSION['alEstado'] == "PR"){
											echo "<option value='PR' selected='selected'>Paraná</option>";
										}else{
											echo "<option value='PR'>Paraná</option>";
										}
										if($_SESSION['alEstado'] == "PE"){
											echo "<option value='PE' selected='selected'>Pernambuco</option>";
										}else{
											echo "<option value='PE'>Pernambuco</option>";
										}
										if($_SESSION['alEstado'] == "PI"){
											echo "<option value='PI' selected='selected'>Piauí</option>";
										}else{
											echo "<option value='PI'>Piauí</option>";
										}
										if($_SESSION['alEstado'] == "RN"){
											echo "<option value='RN' selected='selected'>Rio Grande do Norte</option>";
										}else{
											echo "<option value='RN'>Rio Grande do Norte</option>";
										}
										if($_SESSION['alEstado'] == "RS"){
											echo "<option value='RS' selected='selected'>Rio Grande do Sul</option>";
										}else{
											echo "<option value='RS'>Rio Grande do Sul</option>";
										}
										if($_SESSION['alEstado'] == "RO"){
											echo "<option value='RO' selected='selected'>Rondônia</option>";
										}else{
											echo "<option value='RO'>Rondônia</option>";
										}
										if($_SESSION['alEstado'] == "RR"){
											echo "<option value='RR' selected='selected'>Roraima</option>";
										}else{
											echo "<option value='RR'>Roraima</option>";
										}
										if($_SESSION['alEstado'] == "SC"){
											echo "<option value='SC' selected='selected'>Santa Catarina</option>";
										}else{
											echo "<option value='SC'>Santa Catarina</option>";
										}
										if($_SESSION['alEstado'] == "SE"){
											echo "<option value='SE' selected='selected'>Sergipe</option>";
										}else{
											echo "<option value='SE'>Sergipe</option>";
										}
										if($_SESSION['alEstado'] == "TO"){
											echo "<option value='TO' selected='selected'>Tocantins</option>";
										}else{
											echo "<option value='TO'>Tocantins</option>";
										}
									?>
                                    </select>
                                </label>
                            </div> <!-- div-alt-estado -->
                            
                            <div id="dados-invalidos-alt-cad">
                            	<?	if($msgDados != ""){
                                        echo $msgDados;
                                    }
                                ?>
                            </div> <!-- dados-invalidos-alt-cad -->
                            
                        <div id="div-btn-enviar">
                            <input type="button" id="btn-enviar-alt-cadastro" class="btn btn-primary" value="Alterar Dados" onClick="botoesEnviar('#btn-enviar-alt-cadastro', '#formulario-alterar-cadastro', ValidarAlterarCadastro());" />
                        </div> <!-- div-btn-enviar -->
                       </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
        
		
	</section> <!-- main -->
</body>

</html>
