<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Administração</title>
    
    <!-- include com os scripts e CSS do SGA -->
    <? include("../../includes/server/include-css-js-favicon.php"); ?>
</head>

<body>
    <header id="header">
        <div id="div-admin-top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <a class="adminLogo" href="index.html"><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="187" hegth="20" ></a>
                    </div> 
                    <!-- col-sm-6 col-xs-4 -->
                    <div class="col-sm-6 col-xs-8">
                    <div class="adminNavUsuario"> 
                    	<div class="collapse navbar-collapse navbar-right">
						<ul class="nav navbar-nav">
                        	<li id="dropdwon-edicao" class="dropdown">
                                <a href="#" id="adminDropdown" title="Cursos de Graduação" data-toggle="dropdown">Tiago Henrique da Silva <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Análise e Desenvolvimento de Sistemas">Disciplinas</a></li>
                                    <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Engenharia de Computação, com ênfase em Software">Avaliações</a></li>
                                    <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Gestão da Tecnologia da Informação">Notas</a></li>
                                    <li><a href="#" title="Clique Aqui para Detalhes da Graduação de Sistemas de Informação">Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                      </div>
                    </div> <!-- col-sm-6 col-xs-8 -->
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- div-top-bar -->
    </header><!-- header -->
    
    
    <!-- include com o section 'bottom' e o footer -->
    <? include("../../includes/server/include-footer.php"); ?> 
</body>
</html>