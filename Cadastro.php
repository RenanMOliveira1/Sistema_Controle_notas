<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição" />
    <title>Cadastro - Sistema de Gestão Acadêmica</title>
    <link rel="stylesheet" type="text/css" href="includes/design/estilo-cadastro.css" />
    
    <? include("includes/server/include-css-js.php"); ?>
    
    <style>
		#section-corpo {height: 100%;}
	</style>
</head>

<body>
      <div id="div-container">
        <? include("includes/server/include-header.php"); ?>
		<? include("includes/server/include-nav-principal.php"); ?>
        
        <section id="section-corpo">
            <h1>Cadastro no SGA</h1>
            <div id="div-container-formulario">
                <form id="formulario-cadastro" name="formulario-cadastro" method="post" action="Cadastro_SGA.php">
                    <fieldset>
                        <legend>Dados Pessoais</legend>
                            <div class="form-campos" id="div-nome">
                                <label>
                                    <span>Nome: <span class="asterisco-obrigatoria">*</span></span>
                                    <input type="text" id="nome" size="70"
                                    maxlength="150" title="Entre com o Seu Nome" placeholder="Digite o seu Nome Completo" />
                            </div> <!-- div-sobre-conteudo -->
                                </label>
                            <div class="form-campos" id="div-nascimento">
                                <label>
                                    <span>Nascimento: <span class="asterisco-obrigatoria">*</span></span>
                                    <input type="text" id="data-nascimento" maxlenght="10" size="30"
                                    title="Entre com a Data de Nascimento 00/00/0000" placeholder="Digite a Data 00/00/0000" />
                                </label>
                            </div> <!-- div-nascimento -->
                            <div class="form-campos" id="div-cpf">
                                <label>
                                    <span>CPF: <span class="asterisco-obrigatoria">*</span></span>
                                    <input type="text" id="cpf" maxlenght="11" size="20"
                                    title="Entre com o seu CPF" placeholder="Digite o seu CPF" />
                                </label>
                            </div> <!-- div-nascimento -->
                            <div class="form-campos" id="div-sexo">
                                <label>
                                    <span>Sexo: <span class="asterisco-obrigatoria">*</span></span>
                                    <select class="" id="sexo" name="sexo" title="Escolha o seu Sexo" >
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </label>
                            </div> <!-- div-nascimento -->
                            <div class="form-campos" id="div-telefone-fixo">
                                <label>
                                    <span>Telefone: </span>
                                    <input type="text" id="telefone-fixo" 
                                    maxlenght="45" placeholder="Digite o seu Telefone Fixo"/>
                                </label>
                            </div> <!-- div-telefone-fixo -->
                            <div class="form-campos" id="div-telefone-celular">
                                <label>
                                    <span>Celular: </span>
                                    <input type="text" class="" id="telefone-celular" 
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
                                <input type="password" name="confirmar-senha" id="confirmar-senha" placeholder="Confirme a sua Senha" size="25" title="Confirme a sua Senha Digitada Anteriormente"  />
                            </div> <!-- div-confirmar-senha -->
                     </fieldset>
                        <div id="div-btn-enviar">
                            <input type="button" id="btn-enviar" value="Enviar" />
                        </div> <!-- div-btn-enviar -->
                        
                        <div id="dados-invalidos"></div>
                </form>
            </div>
        </section>
            
    	<? include("includes/server/include-footer.php"); ?>
      </div> <!-- div-container -->
</body>
</html>
