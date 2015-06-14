<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA: Sistema de Controle de Notas</title>
    
    <!-- include com os scripts, CSS e Favicon do SGA -->
    <? include("includes/server/include-css-js-favicon.php"); ?> 
</head>

<body onLoad="NavActive('index');">
	<!-- include com o header, botões sociais, Procurar, logo e Menu -->
    <? include("includes/server/include-header.php"); ?> 
    
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
                                    <a class="btn-slide animation animated-item-3" href="/cursos/cursograduacao2.php">Saiba Mais</a>
                                </div> <!-- carousel-content -->
                            </div> <!-- col-sm-6 -->

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" alt="Graduação em Engenharia de Computação" title="Graduação em Engenharia de Computação" class="img-responsive">
                                </div> <!-- slider-img -->
                            </div> <!-- col-sm-6 hidden-xs animation animated-item-4 -->

                        </div> <!-- row slide-margin -->
                    </div> <!-- container -->
                </div><!-- .item active -->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">MIT em Engenharia de Software com Java</h1>
                                    <h2 class="animation animated-item-2">"O aluno se prepara para os desafios do desenvolvimento de software, aprendendo os principais conceitos e práticas de Engenharia de Software e Programação em Java..."</h2>
                                    <a class="btn-slide animation animated-item-3" title="Conheça a Pós Graduação em MIT em Engenharia de Software com Java" href="/cursos/posgraduacao7.php">Saiba Mais</a>
                                </div> <!-- carousel-content -->
                            </div> <!-- col-sm-6 -->

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img2.png" alt="MIT em Engenharia de Software com Java" title="MIT em Engenharia de Software com Java" class="img-responsive">
                                </div> <!-- slider-img -->
                            </div> <!-- col-sm-6 hidden-xs animation animated-item-4 -->

                        </div> <!-- row slide-margin -->
                    </div> <!-- container -->
                </div><!-- item -->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Gestor de TI</h1>
                                    <h2 class="animation animated-item-2">"Na formação em Gestor de TI você aprende as técnicas, frameworks e melhores práticas necessárias para se tornar Gestor de TI..."</h2>
                                    <a class="btn-slide animation animated-item-3" title="Conheça a Graduação em Gestor de TI"href="/cursos/curso4.php">Saiba Mais</a>
                                </div> <!-- carousel-content -->
                            </div> <!-- col-sm-6 -->
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" alt="Gestor de TI" title="Slide - Gestor de TI" class="img-responsive">
                                </div> <!-- slider-img -->
                            </div> <!-- col-sm-6 hidden-xs animation animated-item-4 -->
                        </div> <!-- row slide-margin -->
                    </div> <!-- container -->
                </div> <!-- item -->
            </div> <!-- carousel-inner -->
        </div> <!-- carousel -->
        
        <a class="prev hidden-xs" title="Anterior" href="#main-slider" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="next hidden-xs" title="Próximo" href="#main-slider" data-slide="next"><i class="fa fa-chevron-right"></i></a>
        
    </section> <!-- main-slider -->
    
    <section id="painel-cursos">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>SGA - Sistema de Gestão Acadêmica</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div> <!-- center wow fadeInDown -->

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item1.png" alt="Banco de Dados">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/posgraduacao6.php"title="Conheça a Pós Graduação em MIT em Gestão de Banco de Dados" >MIT em Gestão de Banco de Dados</a> </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/posgraduacao6.php" title="Conheça a Pós Graduação em MIT em Gestão de Banco de Dados" href="/cursos/curso4.php" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div> <!-- col-xs-12 col-sm-4 col-md-3 -->

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item2.png" alt="Marketing Digital">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/curso2.php"title="Conheça o Curso Intensivo em Marketing Digital" >Marketing Digital</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/curso2.php" title="Conheça o Curso Intensivo em Marketing Digital" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 -->

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item3.png" alt="MIT em Big Data">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/posgraduacao2.php"title="Conheça a Pós Graduação em MIT em Big Data" >MIT em Big Data</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/posgraduacao2.php" title="Conheça a Pós Graduação em MIT em Big Data" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 --> 

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item4.png" alt="MIT em Engenharia de Software .NET">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/posgraduacao8.php"title="Conheça a Pós Graduação em MIT em Engenharia de Software .NET" >MIT em Engenharia de Software .NET</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/posgraduacao8.php" title="Conheça a Pós Graduação em MIT em Engenharia de Software .NET" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 -->
                
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item5.png" alt="MIT em Arquitetura de Software">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/posgraduacao1.php"title="Conheça a Pós Graduação em MIT em Arquitetura de Software" >MIT em Arquitetura de Software</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/posgraduacao1.php" title="Conheça a Pós Graduação em MIT em Arquitetura de Software" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 -->

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item6.png" alt="DBA Oracle">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/curso7.php" title="Conheça o Curso Intensivo em DBA Oracle" >DBA Oracle</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/curso7.php" title="Conheça o Curso Intensivo em DBA Oracle" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 -->

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item7.png" alt="WebDesigner">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/curso1.php" title="Conheça o Curso Intensivo em WebDesigner" >WebDesigner</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/curso1.php" title="Conheça o Curso Intensivo em WebDesigner" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 -->

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="painel-cursos-item">
                        <img class="img-responsive" src="images/index-cursos/item8.png" alt="Desenvolvedor Android">
                        <div class="overlay">
                            <div class="painel-cursos-descricao">
                                <h3><a href="/cursos/curso5.php" title="Conheça o Curso Intensivo em Desenvolvedor Android" >Desenvolvedor Android</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                <a class="preview" href="/cursos/curso5.php" title="Conheça o Curso Intensivo em Desenvolvedor Android" rel="prettyPhoto"><i class="fa fa-eye"></i> Saiba Mais</a>
                            </div> <!-- painel-cursos-descricao -->
                        </div> <!-- overlay -->
                    </div> <!-- painel-cursos-item -->
                </div>  <!-- col-xs-12 col-sm-4 col-md-3 -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- painel-cursos -->
    
    <!-- include com o section 'bottom' e o footer -->
    <? include("includes/server/include-footer.php"); ?> 
</body>
</html>
