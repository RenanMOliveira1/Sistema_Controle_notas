<?
	define("TITULO", "Recuperar Senha");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title><?=TITULO?></title>
    
    <!-- include com os scripts, CSS e Favicon do SGA -->
    <? include("../includes/server/include-css-js-favicon.php"); ?> 
</head>

<body>
	<!-- include com o header, botões sociais, Procurar, logo e Menu -->
    <? include("../includes/server/include-header.php"); ?> 
    
    <section id="section-esqueceu-senha">
    	<div class="container">
            <div class="center wow fadeInDown">
            	<h2><?=TITULO?></h2>
            </div>
           <div class="center wow fadeInDown">
           		<p>Este deve ser o endereço de e-mail associado com a sua conta. Se você não alterou ele pelo seu painel de controle do usuário então este é o endereço de e-mail que você registrou com a sua conta.</p>
           </div>
           <div class="center wow fadeInDown">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="basic-login">
                            <form id="form-recuperar-senha" method="post" action="/esqueceu-senha_exe.php" >
                                <div class="form-campos" id="div-recuperarSenha-email">
                                    <label>
                                        <i class="icon-envelope"></i> 
                                        <p>Entre com o Seu Email</p>
                                    	<input class="form-control" id="restaurar-senha-email" size="40"
                                        type="text" placeholder="Entre aqui com o seu Email">
                                    </label>
                                </div>
                                <div class="form-campos" id="div-btn-resetar" >
                                    <input type="button" class="btn btn-primary" id="btn-resetar" value="Recuperar Senha" onClick="botoesEnviar('#btn-resetar', '#form-recuperar-senha', ValidarRecuperarSenha());"/>
                                </div>    

                                <div id="dados-invalidos"></div> <!-- dados-invalidos -->
                                
                                <div class="clearfix">  
                                </div>
                            </form>
                        </div>
                    </div>
             </div>
        </div>
    </section>
    
    <!-- include com o section 'bottom' e o footer -->
    <? include("../includes/server/include-footer.php"); ?> 
</body>
</html>