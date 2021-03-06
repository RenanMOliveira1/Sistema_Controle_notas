	<header id="header">
        <div id="div-top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  021 3345 5879</p></div>
                    </div> <!-- col-sm-6 col-xs-4 -->
                    <div class="col-sm-6 col-xs-8">
                       
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
								  <?
                                        session_start();
										if (is_file("includes/server/includes-php.php")) {
											include("/includes/server/includes-php.php");
										} else {
											include("../includes/server/includes-php.php");
										}
										
                                        if (!isset($_SESSION['logado'])) {
											usuarioNaoLogado();
                                        } else {
                                            usuarioLogado();
                                        }
                                  ?>
                        	
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

        <nav id="div-navbar-header" class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="287" height="100" hegth="20" ></a>
                    </div> <!-- navbar-header -->
                    
                    <div class="collapse navbar-collapse navbar-right">
                        <ul id="div-menu" class="nav navbar-nav">
                            <li id="opcaoMenu-index" class=""><a href="/" title="Página Inicial do Site" >Página Inicial</a></li>
                            <li id="dropdwon-edicao" class="dropdown">
                                <a href="#" class="dropdown-toggle" title="Cursos de Graduação" data-toggle="dropdown">Graduação <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/cursos/cursograduacao1.php" title="Clique Aqui para Detalhes da Graduação de Análise e Desenvolvimento de Sistemas">Análise e Desenvolvimento de Sistemas</a></li>
                                    <li><a href="/cursos/cursograduacao2.php" title="Clique Aqui para Detalhes da Graduação de Engenharia de Computação, com ênfase em Software">Engenharia de Computação, com ênfase em Software</a></li>
                                    <li><a href="/cursos/cursograduacao3.php" title="Clique Aqui para Detalhes da Graduação de Gestão da Tecnologia da Informação">Gestão da Tecnologia da Informação</a></li>
                                    <li><a href="/cursos/cursograduacao4.php" title="Clique Aqui para Detalhes da Graduação de Sistemas de Informação">Sistemas de Informação</a></li>
                                    <li><a href="/cursos/cursograduacao5.php" title="Clique Aqui para Detalhes da Graduação de Redes de Computadores">Redes de Computadores</a></li>
                                </ul>
                            </li>
                            <li id="dropdwon-edicao" class="dropdown">
                                <a href="#" class="dropdown-toggle" title="Cursos de Pós-Graduação" data-toggle="dropdown">Pós-Graduação <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/cursos/posgraduacao1.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Arquitetura de Software">MIT em Arquitetura de Software</a></li>
                                    <li><a href="/cursos/posgraduacao2.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Big Data">MIT em Big Data</a></li>
                                    <li><a href="/cursos/posgraduacao3.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Cloud Computing">MIT em Cloud Computing</a></li>
                                    <li><a href="/cursos/posgraduacao4.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Desenvolvimento Mobile">MIT em Desenvolvimento Mobile</a></li>
                                    <li><a href="/cursos/posgraduacao5.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Engenharia de Redes">MIT em Engenharia de Redes</a></li>
                                    <li><a href="/cursos/posgraduacao6.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Gestão de Bancos de Dados com Oracle">MIT em Gestão de Bancos de Dados com Oracle</a></li>
                                    <li><a href="/cursos/posgraduacao7.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Engenharia de Software com Java">MIT em Engenharia de Software com Java</a></li>
                                    <li><a href="/cursos/posgraduacao8.php" title="Clique Aqui para Detalhes da Pós-Graduação: MIT em Engenharia de Software com .NET">MIT em Engenharia de Software com .NET</a></li>
                                </ul>
                            </li>
                            <li id="dropdwon-edicao" class="dropdown">
                                <a href="#" class="dropdown-toggle" title="Cursos Intensivos" data-toggle="dropdown">Intensivo <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/cursos/curso1.php" title="Clique Aqui para Detalhes do Curso de WebDesigner">WebDesigner</a></li>
                                    <li><a href="/cursos/curso2.php" title="Clique Aqui para Detalhes do Curso de Marketing Digital">Marketing Digital</a></li>
                                    <li><a href="/cursos/curso3.php" title="Clique Aqui para Detalhes do Curso de WebMaster">WebMaster</a></li>
                                    <li><a href="/cursos/curso4.php" title="Clique Aqui para Detalhes do Curso de Gestor de TI">Gestor de TI</a></li>
                                    <li><a href="/cursos/curso5.php" title="Clique Aqui para Detalhes do Curso de Desenvolvedor Android">Desenvolvedor Android</a></li>
                                    <li><a href="/cursos/curso6.php" title="Clique Aqui para Detalhes do Curso de MCSD Web Applications .NET">MCSD Web Applications .NET</a></li>
                                    <li><a href="/cursos/curso7.php" title="Clique Aqui para Detalhes do Curso de DBA Oracle">DBA Oracle</a></li>
                                    <li><a href="/cursos/curso8.php" title="Clique Aqui para Detalhes do Curso de MCSD Web Applications .NET">MCSD Web Applications .NET</a></li>
                                </ul>
                            </li>  
                            <li id="opcaoMenu-sobre" class="" ><a href="/sobre.php" title="Saiba mais sobre o SGA" >Sobre</a></li>
                            <li id="opcaoMenu-contato" class="" ><a href="/contato.php" title="Entre em contato conosco" >Contato</a></li>                   
                        </ul>
                    </div> <!-- collapse navbar-collapse navbar-right -->
                </div><!--  container -->
            </nav><!-- nav -->
		
    </header><!-- header -->