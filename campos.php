<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Campos</title>
    
    <!-- include com os scripts, CSS e Favicon do SGA -->
    <? include("includes/server/include-css-js-favicon.php"); ?> 
</head>

<body>
	<!-- include com o header, botões sociais, Procurar, logo e Menu -->
    <? include("includes/server/include-header.php"); ?> 
    
    <section id="section-campos-slide">
        <div class="container">
			<div class="center wow fadeInDown">
            	<h2>Sobre os Campos da Instituição</h2>
                <div id="about-slider">
                    <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators visible-xs">
                            <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-slider" data-slide-to="1"></li>
                            <li data-target="#carousel-slider" data-slide-to="2"></li>
                        </ol>
    
                        <div class="carousel-inner">
                            <div id="sobre-slide-img1" class="item active">
                                <img src="/images/campos-slide/img1.jpg" class="img-responsive" alt=""> 
                           </div> <!-- sobre-slide-img1 -->
                           <div id="sobre-slide-img2" class="item">
                                <img src="/images/campos-slide/img2.jpg" class="img-responsive" alt=""> 
                           </div> <!-- sobre-slide-img2 -->
                           <div id="sobre-slide-img3" class="item">
                                <img src="/images/campos-slide/img3.jpg" class="img-responsive" alt=""> 
                           </div> <!-- sobre-slide-img3 --> 
                        </div> <!-- carousel-inner -->
                        
                        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                            <i class="fa fa-angle-left"></i> 
                        </a>
                        
                        <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                            <i class="fa fa-angle-right"></i> 
                        </a>
                    </div> <!-- carousel-slider -->
                </div> <!-- about-slider -->
			</div> <!-- section -->
		</div> <!-- container -->
    </section> <!-- section-campos-slide -->
    
    <section id="section-campos" >
        <div class="container">
        	<div class="wow fadeInDown">
            	<h3>Campos Botafogo</h3>
                <div class="col-sm-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus elit dui, id sodales nibh consectetur non. Nullam rutrum congue purus et luctus. Proin rhoncus in mauris sed hendrerit. Duis congue eros massa, eget tristique eros scelerisque id. Nunc at neque mattis, semper nibh et, accumsan leo. Cras quis vulputate ante. Donec lorem dui, tincidunt id efficitur ac, pretium ut nisl. Etiam lacus turpis, molestie id lorem ut, auctor pulvinar erat. Donec sapien dolor, lacinia maximus tortor consequat, dignissim tristique ligula. Duis mattis est eu magna laoreet cursus. Maecenas sit amet congue dui. Mauris consectetur orci lacus, ut porta augue rhoncus quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut blandit eros non erat bibendum, vel sollicitudin tortor aliquam. In egestas ex quam, vel lobortis dui ullamcorper non.</p>
                    <p><strong>Rua de Botafogo, 9 - Botafogo - Rio de Janeiro - RJ</strong></p>
                </div> <!-- col-sm-12 -->
			</div> <!-- wow fadeInDown -->
            <div class="wow fadeInDown">
            	<h3>Campos Ilha do Governador</h3>
                <div class="col-sm-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus elit dui, id sodales nibh consectetur non. Nullam rutrum congue purus et luctus. Proin rhoncus in mauris sed hendrerit. Duis congue eros massa, eget tristique eros scelerisque id. Nunc at neque mattis, semper nibh et, accumsan leo. Cras quis vulputate ante. Donec lorem dui, tincidunt id efficitur ac, pretium ut nisl. Etiam lacus turpis, molestie id lorem ut, auctor pulvinar erat. Donec sapien dolor, lacinia maximus tortor consequat, dignissim tristique ligula. Duis mattis est eu magna laoreet cursus. Maecenas sit amet congue dui. Mauris consectetur orci lacus, ut porta augue rhoncus quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut blandit eros non erat bibendum, vel sollicitudin tortor aliquam. In egestas ex quam, vel lobortis dui ullamcorper non.</p>
                    <p><strong>Galeão, 120 - Ilha do Governador - Rio de Janeiro - RJ</strong></p>
                </div> <!-- col-sm-12 -->
			</div> <!-- wow fadeInDown -->
            <div class="wow fadeInDown">
            	<h3>Campos Penha</h3>
                <div class="col-sm-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus elit dui, id sodales nibh consectetur non. Nullam rutrum congue purus et luctus. Proin rhoncus in mauris sed hendrerit. Duis congue eros massa, eget tristique eros scelerisque id. Nunc at neque mattis, semper nibh et, accumsan leo. Cras quis vulputate ante. Donec lorem dui, tincidunt id efficitur ac, pretium ut nisl. Etiam lacus turpis, molestie id lorem ut, auctor pulvinar erat. Donec sapien dolor, lacinia maximus tortor consequat, dignissim tristique ligula. Duis mattis est eu magna laoreet cursus. Maecenas sit amet congue dui. Mauris consectetur orci lacus, ut porta augue rhoncus quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut blandit eros non erat bibendum, vel sollicitudin tortor aliquam. In egestas ex quam, vel lobortis dui ullamcorper non.</p>
                    <p><strong>Rua da Penha, 75 - Centro - Rio de Janeiro - RJ</strong></p>
                </div> <!-- col-sm-12 -->
			</div> <!-- wow fadeInDown -->
            <div class="wow fadeInDown">
            	<h3>Campos Centro</h3>
                <div class="col-sm-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce luctus elit dui, id sodales nibh consectetur non. Nullam rutrum congue purus et luctus. Proin rhoncus in mauris sed hendrerit. Duis congue eros massa, eget tristique eros scelerisque id. Nunc at neque mattis, semper nibh et, accumsan leo. Cras quis vulputate ante. Donec lorem dui, tincidunt id efficitur ac, pretium ut nisl. Etiam lacus turpis, molestie id lorem ut, auctor pulvinar erat. Donec sapien dolor, lacinia maximus tortor consequat, dignissim tristique ligula. Duis mattis est eu magna laoreet cursus. Maecenas sit amet congue dui. Mauris consectetur orci lacus, ut porta augue rhoncus quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut blandit eros non erat bibendum, vel sollicitudin tortor aliquam. In egestas ex quam, vel lobortis dui ullamcorper non.</p>
                    <p><strong>Rua São João, 104 - Centro - Rio de Janeiro - RJ</strong></p>
                </div> <!-- col-sm-12 -->
			</div> <!-- wow fadeInDown -->
		</div> <!-- container -->
	</section> <!-- section-campos -->
    
    <!-- include com o section 'bottom' e o footer -->
    <? include("includes/server/include-footer.php"); ?> 
</body>
</html>