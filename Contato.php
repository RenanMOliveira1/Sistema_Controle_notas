<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Entre com contato Conosco</title>
    
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
                        	</div> <!-- nav-botao -->
                            
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
                        <li class="active"><a href="/contato.php" title="Entre em contato conosco" >Contato</a></li>                   
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
    
    <section id="contact-info">
        <div class="center">                
            <h2>Como chegar até nós?</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non arcu congue, tincidunt ex ac, tempor libero. Cras et lacinia orci. Sed tempus semper tortor, sed blandit nunc. Vestibulum et. </p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.226402610247!2d-43.17510440000004!3d-22.905018699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997f5f81628123%3A0xd7989a79c0d90ac9!2sR.+S%C3%A3o+Jos%C3%A9+-+Centro%2C+Rio+de+Janeiro+-+RJ%2C+20010-020!5e0!3m2!1spt-BR!2sbr!4v1432431857968"></iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Unidade Botafogo</h5>
                        			<p>Rua de Botafogo, 9 - Botafogo <br>
                                    Rio de Janeiro - RJ, CEP: 21800-878</p>
                                    <p>Telefone: 21 3798-9874 <br>
                                    Email:contato@sga.edu.br</p>
                                </address>

                                <address>
                                    <h5>Unidade Penha</h5>
                                    <p>Rua da Penha, 75 - Centro <br>
                                    Rio de Janeiro - RJ, CEP: 21780-128</p>                                
                                    <p>Telefone: 21 3456-8956 <br>
                                    Email:contato@sga.edu.br</p>
                                </address>
                            </li>

                            <li class="col-sm-6">
                                <address>
                                    <h5>Unidade Centro</h5>
                                    <p>Rua São João, 104 - Centro <br>
                                    Rio de Janeiro - RJ, CEP: 2100-108</p>
                                    <p>Telefone: 21 3214-7864 <br>
                                    Email:contato@sga.edu.br</p>
                                </address>

                                <address>
                                    <h5>Unidade Ilha do Governador</h5>
                                    <p>Galeão, 120 - Ilha do Governador <br>
                                    Rio de Janeiro - CEP: 21911-022</p>
                                    <p>Telefone: 21 3426-8978 <br>
                                    Email:contato@sga.edu.br</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->
    
    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Deixe a sua Mensagem</h2>
                <p class="lead">Duvidas ? Sugestões ? Críticas ? Preencha o formulário abaixo e tire suas duvídas</p>
            </div> 
            <div class="row contact-wrap"> 
                <form id="form-contato" action="contato_exe.php" method="post">
                	<div id="dados-invalidos"></div> <!-- Exibe os Dados Incorretos -->
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Nome <span class="asteristicos-obrigatorio">*</span></label>
                            <input type="text" name="nome-contato" id="nome-contato" title="Entre com o seu nome" class="form-control" placeholder="Entre com o seu Nome">
                        </div>
                        <div class="form-group">
                            <label>Email <span class="asteristicos-obrigatorio">*</span></label>
                            <input type="text" name="email-contato" id="email-contato" title="Entre com o seu Email" class="form-control" placeholder="Entre com o Seu Email">
                        </div>
                        <div class="form-group">
                            <label>Assunto <span class="asteristicos-obrigatorio">*</span></label>
                            <input type="text" name="assunto" id="assunto" class="form-control" title="Entre com o seu Email" class="form-control" placeholder="Entre com o Assunto">
                        </div>                    
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Menssagem <span class="asteristicos-obrigatorio">*</span></label>
                            <textarea name="mensagem" id="mensagem" class="form-control" rows="8" placeholder="Escreva aqui a sua mensagem" title="Escreva aqui suas duvidas, sugestões ou críticas" ></textarea>
                        </div>                        
                        <div class="form-group">
                            <input type="button" id="btn-enviar" class="btn btn-default btn-lg" value="Enviar" />
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
    
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