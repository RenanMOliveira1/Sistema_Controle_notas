<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, contato, telefone, endereco" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Entre em contato Conosco</title>
    
    <!-- include com os scripts e CSS do SGA -->
    <? include("includes/server/include-css-js-favicon.php"); ?> 
</head>

<body onLoad="NavActive('contato');">
    <!-- include com o header, botões sociais, Procurar, logo e Menu -->
    <? include("includes/server/include-header.php"); ?> 
    
    <section id="contact-info">
        <div class="center">                
            <h2>Como chegar até nós?</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non arcu congue, tincidunt ex ac, tempor libero. Cras et lacinia orci. Sed tempus semper tortor, sed blandit nunc. Vestibulum et. </p>
        </div> <!-- center -->
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.226402610247!2d-43.17510440000004!3d-22.905018699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997f5f81628123%3A0xd7989a79c0d90ac9!2sR.+S%C3%A3o+Jos%C3%A9+-+Centro%2C+Rio+de+Janeiro+-+RJ%2C+20010-020!5e0!3m2!1spt-BR!2sbr!4v1432431857968"></iframe>
                        </div> <!-- gmap -->
                    </div> <!-- col-sm-5 text-center -->

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
                    </div> <!-- col-sm-7 map-content -->
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- gmap-area -->
    </section> <!-- gmap_area -->
    
    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Deixe a sua Mensagem</h2>
                <p class="lead">Duvidas ? Sugestões ? Críticas ? Preencha o formulário abaixo e tire suas duvídas</p>
            </div>  <!-- center -->
            <div class="row contact-wrap"> 
                <form id="form-contato" action="contato_exe.php" method="post">
                	<div id="dados-invalidos"></div> <!-- dados-invalidos -->
                    
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group" id="div-contato-nome" >
                            <label>
                                <span>Nome <span class="asteristicos-obrigatorio">*</span></span>
                                <input type="text" name="nome-contato" id="nome-contato" size="40"
                                title="Entre com o seu nome" class="form-control" placeholder="Entre com o seu Nome">
                            </label>
                        </div> <!-- div-contato-nome -->
                        <div class="form-group" id="div-contato-email" >
                            <label>
                                <span>Email <span class="asteristicos-obrigatorio">*</span></span>
                                <input type="text" name="email-contato" id="email-contato" size="40"
                                title="Entre com o seu Email" class="form-control" placeholder="Entre com o Seu Email">
                            </label>
                        </div> <!-- div-contato-email -->
                        <div class="form-group" id="div-contato-assunto" >
                            <label>
                                <span>Assunto <span class="asteristicos-obrigatorio">*</span></span>
                                <input type="text" name="assunto" id="assunto" class="form-control" size="40"
                                title="Entre com o seu Email" class="form-control" placeholder="Entre com o Assunto">
                            </label>
                        </div> <!-- div-contato-assunto -->                  
                    </div> <!-- col-sm-5 col-sm-offset-1 -->
                    <div class="col-sm-5">
                        <div class="form-group" id="div-contato-mensagem" >
                            <label>
                                <span>Menssagem <span class="asteristicos-obrigatorio">*</span></span>
                                <textarea name="mensagem" id="mensagem" class="form-control" 
                                rows="8" cols="40" placeholder="Escreva aqui a sua mensagem" 
                                title="Escreva aqui suas duvidas, sugestões ou críticas" ></textarea>
                            </label>
                        </div> <!-- div-contato-mensagem -->        
                        <div class="form-group" id="div-contato-btn-enviar" >
                            <input type="button" id="btn-enviar" class="btn btn-default btn-lg" value="Enviar" />
                        </div> <!-- div-contato-btn-enviar -->    
                    </div> <!-- col-sm-5 col-sm-offset-1 -->
                </form> 
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- contact-page -->
    
    <!-- include com o section 'bottom' e o footer -->
    <? include("includes/server/include-footer.php"); ?> 
</body>
</html>