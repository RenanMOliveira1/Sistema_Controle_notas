<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>Sistema de Controle de Notas - HOME</title>
    
    <!-- Css Código -->
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/font-awesome.min.css" rel="stylesheet">
    <link href="includes/css/animate.min.css" rel="stylesheet">
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
                        <li class="active"><a href="index.php" title="Página Inicial do Site" >Página Inicial</a></li>
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
		
    </header><!--/header-->
    
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Graduação em Engenharia de Computação</h1>
                                    <h2 class="animation animated-item-2">"É uma graduação para quem quer mergulhar no mundo do software e fazer uma carreira brilhante..."</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Saiba Mais</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">MIT em Engenharia de Software com Java</h1>
                                    <h2 class="animation animated-item-2">"O aluno se prepara para os desafios do desenvolvimento de software, aprendendo os principais conceitos e práticas de Engenharia de Software e Programação em Java..."</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Saiba Mais</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img2.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Gestor de TI</h1>
                                    <h2 class="animation animated-item-2">"Na formação em Gestor de TI você aprende as técnicas, frameworks e melhores práticas necessárias para se tornar Gestor de TI..."</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Saiba Mais</a>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
    
    <section id="painel-cursos">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>SGA - Sistema de Gestão Acadêmica</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item1.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">Banco de Dados</a> </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item2.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">Marketing Digital</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item3.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">MIT em Big Data</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item4.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">MIT em Engenharia de Software .NET </a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div>   
                
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item5.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">MIT em Arquitetura de Software </a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item6.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">DBA Oracle </a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item7.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">WebDesigner </a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item8.png" alt="">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="#">Desenvolvedor Android </a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="#" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> 
                        </div>
                    </div>
                </div>   
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--painel-cursos -->
    
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
