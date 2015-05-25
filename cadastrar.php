<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Faça o seu Cadastro</title>
    
    <!-- Css Código -->
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/font-awesome.min.css" rel="stylesheet">
    <link href="includes/css/main.css" rel="stylesheet">
    <link href="includes/css/responsive.css" rel="stylesheet">
   
    <!-- Favicon SGA -->
    <link rel="shortcut icon" href="images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/icon/apple-touch-icon-57-precomposed.png">
    
    <script type="text/javascript" src="includes/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="includes/js/validacoes.js" charset="utf-8" ></script>
</head>

<body>
    <header id="header">
        <div id="div-top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  021 3345 5879</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div id="nav-botao" class="btn-group">
                          <button type="button btn-primary" title="Entre na sua conta" onclick="location.href='/login.php'" class="btn btn-default">Login</button>
                          <button type="button" title="Clique aqui e se cadastre" onclick="location.href='/cadastrar.php'" class="btn btn-default">Cadastrar</button>
                        </div>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Procurar...">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div> <!-- search -->
                       </div> <!-- social -->
                    </div> <!-- col-sm-6 col-xs-8 -->
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- div-top-bar -->
    </header>
    
    <nav id="div-navbar-header" class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="287" height="100" hegth="20" ></a>
                </div> <!-- navbar-header -->
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul id="div-menu" class="nav navbar-nav">
                        <li><a href="index.php" title="Página Inicial do Site" >Página Inicial</a></li>
                        <li id="dropdwon-edicao" class="dropdown">
                            <a href="#" class="dropdown-toggle" title="Cursos de Graduação" data-toggle="dropdown">Graduação <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Análise e Desenvolvimento de Sistemas">Análise e Desenvolvimento de Sistemas</a></li>
                                <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Engenharia de Computação, com ênfase em Software">Engenharia de Computação, com ênfase em Software</a></li>
                                <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Gestão da Tecnologia da Informação">Gestão da Tecnologia da Informação</a></li>
                                <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Sistemas de Informação">Sistemas de Informação</a></li>
                                <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Redes de Computadores">Redes de Computadores</a></li>
                            </ul>
                        </li>
                        <li id="dropdwon-edicao" class="dropdown">
                            <a href="#" class="dropdown-toggle" title="Cursos de Pós-Graduação" data-toggle="dropdown">Pós-Graduação <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
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
                        <li id="dropdwon-edicao" class="dropdown">
                            <a href="#" class="dropdown-toggle" title="Cursos Intensivos" data-toggle="dropdown">Intensivo <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
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
                        <li><a href="/sobre.php" title="Saiba mais sobre o SGA" >Sobre</a></li>
                        <li><a href="/contato.php" title="Entre em contato conosco" >Contato</a></li>                   
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
        <section>
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
                                            maxlength="150" title="Entre com o Seu Nome" placeholder="Digite o seu Nome Completo" />
                                    </div> <!-- div-nome -->
                                        </label>
                                    <div class="form-group" id="div-nascimento">
                                        <label>
                                            <span>Nascimento: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" id="data-nascimento" class="form-control" maxlenght="10" size="30"
                                            title="Entre com a Data de Nascimento 00/00/0000" placeholder="Digite a Data 00/00/0000" />
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
                                            title="Entre aqui com o seu endereço" class="form-control" size="80" placeholder="Digite o seu Logadouro"/>
                                        </label>
                                    </div> <!-- div-logradouro -->
                                    <div class="form-group" id="div-complemento">
                                        <label>
                                            <span>Complemento: </span>
                                            <input type="text" name="complemento" id="complemento" size="80"
                                            title="Se houver algum complemento, digite aqui" class="form-control" placeholder="Digite o Algum Complemento, se Tiver"/>
                                        </label>
                                    </div> <!-- div-complemento -->
                                    <div class="form-group" id="div-bairro">
                                        <label>
                                            <span>Bairro: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="bairro" id="bairro"
                                            title="Entre com o seu bairro" class="form-control" placeholder="Digite o seu Bairro"/>
                                        </label>
                                    </div> <!-- div-bairro -->
                                    <div class="form-group" id="div-cidade">
                                        <label>
                                            <span>Cidade: <span class="asteristicos-obrigatorio">*</span></span>
                                            <input type="text" name="cidade" id="cidade"
                                            title="Entre com a cidade" class="form-control" placeholder="Digite a sua Cidade"/>
                                        </label>
                                    </div> <!-- div-cidade -->
                                    <div class="form-group" id="div-estado">
                                        <label>
                                        <span>Estado: <span class="asteristicos-obrigatorio">*</span> </span>
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
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Digite o seu Email"
                                        title="Entre com o seu email para acesso" size="60" />
                                        </label>
                                    </div> <!-- div-email -->
                                    <div class="form-group" id="div-senha">
                                        <label>
                                        <span>Password: <span class="asteristicos-obrigatorio">*</span></span>
                                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma Senha"
                                        title="Digite uma senha com no mínimo de 6 caracteres. Pelo menos uma letra minúscula, um numero e um caracter especial"  />
                                        </label>
                                    </div> <!-- div-senha -->
                                    <div class="form-group" id="div-confirmar-senha">
                                        <label>
                                        <span>Confirmar Password: <span class="asteristicos-obrigatorio">*</span></span>
                                        <input type="password" class="form-control" name="confirmar-senha" id="confirmar-senha" placeholder="Confirme a sua Senha" size="25" title="Confirme a sua Senha Digitada Anteriormente"  />
                                        </label>
                                    </div> <!-- div-confirmar-senha -->
                                    
                                    <div id="dados-invalidos"></div>
                                    
                                <div id="div-btn-enviar">
                                    <input type="button" id="btn-enviar-cadastro" class="btn btn-primary" value="Enviar" />
                                </div> <!-- div-btn-enviar -->
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-4 social-login">
                            <p>Registra-se usando o Facebook ou Twitter</p>
                            <div class="social-login-buttons">
                                <a href="#" title="Faça login usando o Facebook" class="btn-facebook-login">Login com o Facebook</a>
                                <a href="#" title="Faça login usando o Twitter" title="" class="btn-twitter-login">Login com o Twitter</a>
                                <div class="clearfix"></div>
                            </div>
                            <div id="div-logo-cadastrar">
                            	<img src="images/logo-footer.png" width="375" height="340" title="Logo do SGA" alt="Logo do SGA" heigth="320" />
                            </div>
                        </div>
                    </div>
                </div>
             </div>
		</section>
        
        <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-4 col-sm-8">
                    <div class="widget">
                        <h3>A Faculdade</h3>
                        <ul>
                            <li><a title="Saiba mais sobre o SGA" href="/sobre.php">Sobre</a></li>
                            <li><a title="Campos da Instituição" href="#">Campos</a></li>
                            <li><a title="Copuright do SGA" href="#">Copyright</a></li>
                            <li><a title="Termos de uso e responsabilidade" href="#">Termos de Uso</a></li>
                            <li><a title="Politicas da Instituição" href="#">Politica</a></li>
                            <li><a title="Entre com contato conosco" href="#">Entre em Contato</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-4 col-sm-8">
                    <div class="widget">
                        <h3>Serviços</h3>
                        <ul>
                            <li><a title="FAQ - Tire suas duvidas" href="#">FAQ</a></li>
                            <li><a title="Nucleo de Carreiras do Site" href="#">Nucleo de Carreiras</a></li>
                            <li><a title="Notícias recentes" href="#">Noticias</a></li>
                            <li><a title="Detalher sobre o Vestibular" href="#">Vestibular</a></li>
                            <li><a title="Resumo de Notas" href="#">Notas</a></li>
                            <li><a title="Resumo de Avalações" href="#">Avaliações</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-2 col-sm-">
                    <div class="widget">
                        <p><strong>Unidade Botafogo</strong></p>
                        <p>Rua de Botafogo, 9 - Botafogo</p>
                        <p>Rio de Janeiro - RJ</p>
                    </div> 
                    <div class="widget">
                        <p><strong>Unidade Centro</strong></p>
                        <p>Rua São João, 104 - Centro</p>
                        <p>Rio de Janeiro - RJ</p>
                    </div>    
                </div><!--/.col-md-3-->

				<div class="col-md-2 col-sm-4">
                    <div class="widget">
                        <p><strong>Unidade Ilha do Governador</strong></p>
                        <p>Galeão, 120 - Ilha do Governador</p>
                        <p>Rio de Janeiro - RJ</p>
                    </div> 
                    <div class="widget">
                        <p><strong>Unidade Penha</strong></p>
                        <p>Rua da Penha, 75 - Centro</p>
                        <p>Rio de Janeiro - RJ</p>
                    </div>    
                </div><!--/.col-md-3-->

            </div>
        </div>
    </section><!-- bottom -->
    
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="/index.php" title="Página Incial do Site">SGA - Sistema de Gestão Acadêmica</a>. Todos os Direitos Reservados.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a title="Página Inicial do Site" href="/index.php">Home</a></li>
                        <li><a title="Saiba mais sobre a Instituição" href="#">A Instituição</a></li>
                        <li><a title="Termos de uso do SGA" href="#">Termos</a></li>
                        <li><a title="Entre com contato conosco" href="/contato.php">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    
    <script src="includes/js/jquery.js"></script>
    <script src="includes/js/bootstrap.min.js"></script>
    <script src="includes/js/jquery.isotope.min.js"></script>
    <!-- Plugin para Animar os Scrolls -->
    <script src="includes/js/wow.min.js"></script>
</body>
</html>