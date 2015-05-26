<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, cadastrar" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Faça o seu Cadastro</title>
   
    <!-- include com os scripts e CSS do SGA -->
    <? include("includes/server/include-css-js-favicon.php"); ?> 
</head>

<body>
    <!-- include com o header, botões sociais, Procurar, logo e Menu -->
    <? include("includes/server/include-header.php"); ?> 
        
        <section id="section-cadastrar">
    		<div class="container wow fadeInDown">
                <div class="container">
                    <div class="row">
                      <div class="col-sm-8">
                            <div class="basic-login">
                                <form id="formulario-cadastro" action="Entrar.php" method="post">
                                    <div class="form-campos" id="div-nome">
                                        <label>
                                            <span>Nome: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" id="nome" size="70" class="form-control"
                                            maxlength="150" title="Entre com o Seu Nome" 
                                            placeholder="Digite o seu Nome Completo" autofocus />
                                    	</label>
                                    </div> <!-- div-nome -->
                                        
                                    <div class="form-group" id="div-nascimento">
                                        <label>
                                            <span>Nascimento: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" id="data-nascimento" class="form-control" maxlenght="10" size="30"
                                            title="Entre com a Data de Nascimento 00/00/0000" 
                                            placeholder="Digite a Data 00/00/0000" />
                                        </label>
                                    </div> <!-- div-nascimento -->
                                    <div class="form-group" id="div-cpf">
                                        <label>
                                            <span>CPF: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" id="cpf" class="form-control" maxlenght="11" size="20"
                                            title="Entre com o seu CPF" placeholder="Digite o seu CPF" />
                                        </label>
                                    </div> <!-- div-nascimento -->
                                    <div class="form-group" id="div-sexo">
                                        <label>
                                            <span>Sexo: <span class="asteristicos-obrigatorio">*</span></span>
                                            <select id="sexo" class="form-control" name="sexo" title="Escolha o seu Sexo" >
                                                <option value="1">Masculino</option>
                                                <option value="2">Feminino</option>
                                            </select>
                                        </label>
                                    </div> <!-- div-nascimento -->
                                    <div class="form-group" id="div-telefone-fixo">
                                        <label>
                                            <span>Telefone: </span>
                                            <input type="text" id="telefone-fixo" 
                                            maxlenght="45" class="form-control" placeholder="Digite o seu Telefone Fixo"/>
                                        </label>
                                    </div> <!-- div-telefone-fixo -->
                                    <div class="form-group" id="div-telefone-celular">
                                        <label>
                                            <span>Celular: </span>
                                            <input type="text" class="form-control" id="telefone-celular" 
                                            maxlenght="45" placeholder="Digite o seu Celular"/>
                                        </label>
                                    </div> <!-- div-telefone-celular -->
                                    <div class="form-group" id="div-cep">
                                        <label>
                                            <span>CEP: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="cep" id="cep"
                                            title="Entre com o CEP" class="form-control" placeholder="Digite o seu CEP" />
                                        </label>
                                    </div> <!-- div-cep -->
                                    <div class="form-group" id="div-tipo-logradouro">
                                        <label>
                                            <span>Tipo de Logradouro: <span class="asteristicos-obrigatorio">*</span></span>
                                            <select name="tipo-logradouro" class="form-control" id="tipo-logradouro" >
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
                                    <div class="form-group" id="div-numero">
                                        <label>
                                            <span>Numero: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="numero" id="numero" placeholder="Numero"
                                            title="Entre com o Numero da Casa" class="form-control" size="7" />
                                        </label>
                                    </div> <!-- div-numero -->
                                    <div class="form-group" id="div-logradouro">
                                        <label>
                                            <span>Logradouro: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="logradouro" id="logradouro"
                                            title="Entre aqui com o seu endereço" class="form-control" 
                                            size="80" placeholder="Digite o seu Logadouro" />
                                        </label>
                                    </div> <!-- div-logradouro -->
                                    <div class="form-group" id="div-complemento">
                                        <label>
                                            <span>Complemento: </span>
                                            <input type="text" name="complemento" id="complemento" size="80"
                                            title="Se houver algum complemento, digite aqui" 
                                            class="form-control" placeholder="Digite o Algum Complemento, se Tiver"/>
                                        </label>
                                    </div> <!-- div-complemento -->
                                    <div class="form-group" id="div-bairro">
                                        <label>
                                            <span>Bairro: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="bairro" id="bairro"
                                            title="Entre com o seu bairro" class="form-control" 
                                            placeholder="Digite o seu Bairro"/>
                                        </label>
                                    </div> <!-- div-bairro -->
                                    <div class="form-group" id="div-cidade">
                                        <label>
                                            <span>Cidade: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="cidade" id="cidade"
                                            title="Entre com a cidade" class="form-control" 
                                            placeholder="Digite a sua Cidade"/>
                                        </label>
                                    </div> <!-- div-cidade -->
                                    <div class="form-group" id="div-estado">
                                        <label>
                                        <span>Estado: <span class="asteristicos-obrigatorio">*</span></span>
                                            <select name="estado" class="form-control" id="estado">
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
                                    <div class="form-group" id="div-email">
                                        <label>
                                            <span>Email: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" class="form-control" name="email" id="email" 
                                            placeholder="Digite o seu Email" size="60"
                                            title="Entre com o seu email para acesso" />
                                        </label>
                                    </div> <!-- div-email -->
                                    <div class="form-group" id="div-senha">
                                        <label>
                                            <span>Password: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="password" class="form-control" name="senha" 
                                            id="senha" placeholder="Digite uma Senha"
                                            title="Digite uma senha com no mínimo de 6 caracteres. Pelo menos uma letra minúscula, um numero e um caracter especial"  />
                                        </label>
                                    </div> <!-- div-senha -->
                                    <div class="form-group" id="div-confirmar-senha">
                                        <label>
                                            <span>Confirmar Password: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="password" class="form-control" name="confirmar-senha" id="confirmar-senha" placeholder="Confirme a sua Senha" size="25" title="Confirme a sua Senha Digitada Anteriormente"  />
                                        </label>
                                    </div> <!-- div-confirmar-senha -->
                                    
                                    <div id="dados-invalidos"></div> <!-- dados-invalidos -->
                                    
                                <div id="div-btn-enviar">
                                    <input type="button" id="btn-enviar-cadastro" class="btn btn-primary" value="Enviar" />
                                </div> <!-- div-btn-enviar -->
                                </form>
                            </div> <!-- basic-login -->
                        </div> <!-- col-sm-8 -->
                        
                        <div class="col-sm-4 social-login">
                            <p>Registra-se usando o Facebook ou Twitter</p>
                            <div class="social-login-buttons">
                                <a href="#" title="Faça login usando o Facebook" class="btn-facebook-login">Login com o Facebook</a>
                                <a href="#" title="Faça login usando o Twitter" title="" class="btn-twitter-login">Login com o Twitter</a>
                            </div> <!-- social-login-buttons -->
                            <div id="div-logo-cadastrar">
                            	<img src="images/logo-footer.png" width="375" height="340" title="Logo do SGA" alt="Logo do SGA" heigth="320" />
                            </div> <!-- div-logo-cadastrar -->
                        </div> <!-- col-sm-4 social-login -->
                    </div> <!-- row -->
                </div> <!-- container -->
             </div> <!-- container wow fadeInDown -->
		</section> <!-- section-cadastrar -->
        
        <!-- include com o section 'bottom' e o footer -->
    	<? include("includes/server/include-footer.php"); ?> 
</body>
</html>