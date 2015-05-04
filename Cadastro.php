<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição" />
    <title>Cadastro - Sistema de Gestão Acadêmica</title>
    <link rel="stylesheet" type="text/css" href="includes/design/estilo.css" />
    
    <script type="text/javascript" src="includes/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="includes/js/funcoes.js" charset="iso-8859-1"></script>
    
    <style type="text/css">
		#section-corpo {height: 940px;}
		
		.asterisco-obrigatoria {color: red;}
		
		fieldset {
			border: none;
			padding: 20px 0px 20px 0px;
		}
		
		legend {
			font-size: 24px;
			color: #093357;
			padding: 0px 10px 0px 0px;
		}
		
		.form-campos {padding-top: 10px;}
		
		#section-corpo input, #section-corpo select  {
			color: #616475;
			border-radius: 4px;
			margin-left: 20px;
			border:solid 1px #999999;
			padding: 10px 0px 10px 0px;
		}
		
		#section-corpo select {width: 90px;}
		
		#section-corpo input, #section-corpo textarea {padding: 10px;}
		
		::-webkit-input-placeholder {
		   margin-left: 5px;
		   color: #999999;
		   font: 12px verdana, arial, sans-serif;
		}
		
		:-moz-placeholder {
		   margin-left: 5px;
		   color: #999999;
		   font: 12px verdana, arial, sans-serif;
		}
		
		::-moz-placeholder {
		   margin-left: 5px;
		   color: #999999;  
		   font: 12px verdana, arial, sans-serif;
		}
		
		:-ms-input-placeholder {  
		   margin-left: 5px;
		   color: #999999;
		   font: 12px verdana, arial, sans-serif;
		}
		
		#div-container-formulario {
			width: 800px;
			padding: 10px 0px 0px 0px;
			margin: 0 auto;
		}
		
		#div-cpf, #div-telefone-fixo, #div-cep, #div-numero, #div-cidade, #div-senha {
			float: left;
			margin-right: 30px;
		}

		#div-btn-enviar input {
			margin: 50px 0px 0px 330px;
			width: 150px;
			border-radius: 4px;
			border:solid 1px #999999;
			padding: 15px 0px 15px 0px;
		}
	</style>
</head>

<body>
	<header id="header">
        <div id="div-logo">
            <a title="Irá para a Home do Site" href="index.php"><img src="images/logo1.png" alt="Logo do Sistema de Gestão Acadêmica" width="320" height="116" border="0" /></a>
        </div> <!-- div-titulo -->
        
        <div id="div-container-usuario">
            <div id="div-logarNoSite">
                <span>Bem-Vindo ao SGA:</span>
                <a title="Irá para a Página de Login" href="Login.php">Logar-se no Site</a>
            </div> <!-- div-logarNoSite -->
            <div id="div-cadastrarNoSite">
            	<span>Aluno Novo?</span>
            	<a title="Irá para a Página de Cadastro" href="Cadastro.php">Cadastre-se Aqui</a>
            </div> <!-- div-cadastrarNoSite -->
        </div> <!-- div-container-usuario -->
           
    </header>
    <nav id="nav-principal">
    	<div id="div-menu-principal">
            <ul>
                <li><a href="Index.php" title="Clique Aqui para Acessar a Página Inicial">Home</a></li>
                <li><a href="#" title="Clique Aqui para Conhecer a Graduação">Graduação</a>
                	<ul>
                        <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Análise e Desenvolvimento de Sistemas">Análise e Desenvolvimento de Sistemas</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Engenharia de Computação, com ênfase em Software">Engenharia de Computação, com ênfase em Software</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Gestão da Tecnologia da Informação">Gestão da Tecnologia da Informação</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Sistemas de Informação">Sistemas de Informação</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Redes de Computadores">Redes de Computadores</a></li>
                    </ul>
                </li>
                <li><a href="#" title="Clique Aqui para Conhecer a Pós-Graduação">Pós-Graduação</a>
                    <ul>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Arquitetura de Software">MIT em Arquitetura de Software</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Big Data">MIT em Big Data</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Cloud Computing">MIT em Cloud Computing</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Desenvolvimento Mobile">MIT em Desenvolvimento Mobile</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Engenharia de Redes">MIT em Engenharia de Redes</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Gestão de Bancos de Dados com Oracle">MIT em Gestão de Bancos de Dados com Oracle</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Engenharia de Software com Java">MIT em Engenharia de Software com Java</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Engenharia de Software com .NET">MIT em Engenharia de Software com .NET</a></li>
                    </ul>
                </li>
                <li><a href="#" title="Clique Aqui para Conhecer os Cursos Intensivos">Intensivo</a>
                	<ul>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de WebDesigner">WebDesigner</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de Marketing Digital">Marketing Digital</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de WebMaster">WebMaster</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de Gestor de TI">Gestor de TI</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de Desenvolvedor Android">Desenvolvedor Android</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de MCSD Web Applications .NET">MCSD Web Applications .NET</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de DBA Oracle">DBA Oracle</a></li>
                        <li><a href="#" title="Clique Aqui para Detalhes do Curso de MCSD Web Applications .NET">MCSD Web Applications .NET</a></li>
                    </ul>
                </li>
                <li><a href="Sobre.php" title="Sobre o Sistema de Controle de Notas">Sobre</a></li>
                <li><a href="mailto:tiago.hsilva@al.infnet.edu.br" title="Entre em Contato Conosco">Contato</a></li>
            </ul>
        </div> <!-- div-menu-principal -->
        <div id="div-pesquisa">
        	<label>
                <input type="text" id="campo-pesquisa" name="pesquisa" />
        		<input type="button" id="btn-pesquisa" value="Pesquisar" />
            </label>
        </div> <!-- div-pesquisa -->
    </nav>
    
    <section id="section-corpo">
		<h1>Cadastro no SGA</h1>
        <div id="div-container-formulario">
        	<form id="formulario-cadastro" name="formulario-cadastro" method="post" action="Cadastro_SGA.php">
            	<fieldset>
                	<legend>Dados Pessoais</legend>
                    	<div class="form-campos" id="div-nome">
                        	<label>
                                <span>Nome: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" class="class-obrigatorio" id="nome" size="70"
                                maxlength="150" title="Entre com o Seu Nome" placeholder="Digite o seu Nome Completo" />
                        </div> <!-- div-sobre-conteudo -->
                        	</label>
                        <div class="form-campos" id="div-nascimento">
                        	<label>
                                <span>Nascimento: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" class="class-obrigatorio" id="data-nascimento" maxlenght="10" size="30"
                                title="Entre com a Data de Nascimento 00/00/0000" placeholder="Digite a Data 00/00/0000" />
                            </label>
                        </div> <!-- div-nascimento -->
                        <div class="form-campos" id="div-cpf">
                        	<label>
                                <span>CPF: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" class="class-obrigatorio" id="cpf" maxlenght="11" size="20"
                                title="Entre com o seu CPF" placeholder="Digite o seu CPF" />
                            </label>
                        </div> <!-- div-nascimento -->
                        <div class="form-campos" id="div-sexo">
                        	<label>
                                <span>Sexo: <span class="asterisco-obrigatoria">*</span></span>
                                <select class="class-obrigatorio" id="sexo" name="sexo" title="Escolha o seu Sexo" >
                                	<option value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                </select>
                            </label>
                        </div> <!-- div-nascimento -->
                        <div class="form-campos" id="div-telefone-fixo">
                        	<label>
                                <span>Telefone: </span>
                                <input type="text" class="class-obrigatorio" id="telefone-fixo" 
                                maxlenght="45" placeholder="Digite o seu Telefone Fixo"/>
                            </label>
                        </div> <!-- div-telefone-fixo -->
                        <div class="form-campos" id="div-telefone-celular">
                        	<label>
                                <span>Celular: </span>
                                <input type="text" class="class-obrigatorio" id="telefone-celular" 
                                maxlenght="45" placeholder="Digite o seu Celular"/>
                            </label>
                        </div> <!-- div-telefone-celular -->
                </fieldset>
                
                <fieldset>
                	<legend>Endereço</legend>
                    	<div class="form-campos" id="div-cep">
                        	<label>
                            	<span>CEP: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" name="cep" id="cep"
                                title="Entre com o CEP" placeholder="Digite o seu CEP" />
                            </label>
                        </div> <!-- div-cep -->
                        <div class="form-campos" id="div-tipo-logradouro">
                        	<label>
                                <span>Tipo de Logradouro: <span class="asterisco-obrigatoria">*</span></span>
                                <select name="tipo-logradouro" id="tipo-logradouro" >
                                    <option value="casa">Casa</option>
                                    <option value="condominio">Condomínio</option>
                                    <option value="AV">Avenida</option>
                                    <option value="praca">Praça</option>
                                    <option value="beco">Beco</option>
                                    <option value="rodovia">Rodovía</option>
                                    <option value="aeroporto">Aeroporto</option>
                                    <option value="vila">Vila</option>
                                    <option value="chacara">Chácara</option>
                                    <option value="sitio">Sitío</option>
                                    <option value="morro">Morro</option>
                                    <option value="favela">Favela</option>
                                    <option value="loteamento">Loteamento</option>
                                </select>
                             </label>
                        </div> <!-- div-tipo-logradouro  -->
                        <div class="form-campos" id="div-logradouro">
                        	<label>
                            	<span>Logradouro: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" name="logradouro" id="logradouro"
                                title="Entre aqui com o seu endereço" size="60" placeholder="Digite o seu Logadouro"/>
                            </label>
                        </div> <!-- div-logradouro -->
                        <div class="form-campos" id="div-complemento">
                        	<label>
                            	<span>Complemento: </span>
                                <input type="text" name="complemento" id="complemento" size="80"
                                title="Se houver algum complemento, digite aqui"  placeholder="Digite o Algum Complemento, se Tiver"/>
                            </label>
                        </div> <!-- div-complemento -->
                        <div class="form-campos" id="div-numero">
                        	<label>
                            	<span>Numero: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" name="numero" id="numero" placeholder="Numero"
                                title="Entre com o Numero da Casa" size="7" />
                            </label>
                        </div> <!-- div-numero -->
                        <div class="form-campos" id="div-bairro">
                        	<label>
                            	<span>Bairro: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" name="bairro" id="bairro"
                                title="Entre com o seu bairro"  placeholder="Digite o seu Bairro"/>
                            </label>
                        </div> <!-- div-bairro -->
                        <div class="form-campos" id="div-cidade">
                        	<label>
                            	<span>Cidade: <span class="asterisco-obrigatoria">*</span></span>
                                <input type="text" name="cidade" id="cidade"
                                title="Entre com a cidade" placeholder="Digite a sua Cidade"/>
                            </label>
                        </div> <!-- div-cidade -->
                        <div class="form-campos" id="div-estado">
                        	<label>
                            <span>Estado:<span class="asterisco-obrigatoria">*</span> </span>
                            	<select name="estado" id="estado">
                                	<option value="AC">Acre</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RN">Rio Grande do Nore</option>
                                    <option value="RS">Rio Grande do Sul</option>
                               		<option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="SC">Santa Catarina</option>
                                </select>
                            </label>
                        </div> <!-- div-estado -->
                </fieldset>
                <fieldset>
                	<legend>Dados de Acesso</legend>
                        <div class="form-campos" id="div-email">
                            <span>Email: <span class="asterisco-obrigatoria">*</span></span>
                            <input type="text" name="email" id="email" placeholder="Digite o seu Email"
                            title="Entre com o seu email para acesso" size="50" />
                        </div> <!-- div-email -->
                        <div class="form-campos" id="div-senha">
                            <span>Password: <span class="asterisco-obrigatoria">*</span></span>
                            <input type="password" name="senha" id="senha" placeholder="Digite uma Senha"
                            title="Digite uma senha com no mínimo de 6 caracteres. Pelo menos uma letra minúscula, um numero e um caracter especial"  />
                        </div> <!-- div-senha -->
                        <div class="form-campos" id="div-confirmar-senha">
                            <span>Confirmar Password: <span class="asterisco-obrigatoria">*</span></span>
                            <input type="password" name="confirmar-senha" id="confirmar-senha" placeholder="Confirme a sua Senha"
                            title="Confirme a sua Senha Digitada Anteriormente"  />
                        </div> <!-- div-confirmar-senha -->
                 </fieldset>
                    <div id="div-btn-enviar">
                    	<input type="submit" id="btn-enviar" value="Enviar" />
                    </div> <!-- div-btn-enviar -->
            </form>
        </div>
    </section>
    	
<footer id="footer">
        <div id="div-footer-logo">
            <a title="Irá para a Home do Site" href="index.php"><img src="images/logo-footer.png" alt="Logo do Sistema de Controle de Notas" width="180" height="116" border="0" /></a>
        </div> <!-- div-footer-logo -->
        
        <div id="div-footer-Institucional">
            <div class="div-footer-titulo">
                <span>Institucional<span>
            </div> <!-- div-footer-titulo -->
            <ul>
                <li><a href="#" title="Clique Aqui para Acessar a Página Inicial">Home</a></li>
                <li><a href="#" title="Clique Aqui para Conhecer a Graduação">Graduação</a></li>
                <li><a href="#" title="Clique Aqui para Conhecer a Pós-Graduação">Pós-Graduação</a></li>
                <li><a href="#" title="Clique Aqui para Conhecer os Cursos Intensivos">Intensivo</a></li>
                <li><a href="#" title="Sobre o Sistema de Controle de Notas">Sobre</a></li>
                <li><a href="mailto:tiago.hsilva@al.infnet.edu.br" title="Entre em Contato Conosco">Contato</a></li>
            </ul>   
        </div> <!-- div-footer-Institucional -->
        
        <div id="div-footer-Siga-nos">
        	<div class="div-footer-titulo">
            	<span>Siga-nos</span>
            </div> <!-- div-footer-titulo -->
            <ul>
                <li><a href="#" title="Siga-nos no Google+">Google</a></li>
                <li><a href="#" title="Siga-nos no Linkedin">Linkedin</a></li>
                <li><a href="#" title="Siga-nos no Twitter">Twitter</a></li>
                <li><a href="#" title="Siga-nos no Facebook">Facebook</a></li>
            </ul>  
        </div> <!-- div-footer-Siga-nos -->
        
        <div id="div-copyRight">
    		<span>Sistema de Gestão Acadêmica | Todos os direitos reservados - © 2015</span>
    </div> <!-- div-copyRight -->
    </footer>
</body>
</html>
