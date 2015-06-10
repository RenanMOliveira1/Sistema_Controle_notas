<?
	$cadastro = "";
	$cadastro .= @$_GET['cadastro'];
	$dadosInvalidos = @$_GET['dadosInvalidos'];
	$msg = @$_GET['msg'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
    <title>SGA | Faça o seu Login</title>
    
    <!-- include com os scripts e CSS do SGA -->
    <? include("../includes/server/include-css-js-favicon.php"); ?> 
</head>

<body>
    <!-- include com o header, botões sociais, Procurar, logo e Menu -->
    <? include("../includes/server/include-header.php"); ?> 
    
    <section id="section-formulario">
        <div class="container wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="basic-login">
                            <form id="formulario-login" action="/acount/login.php" method="post">
                                <div class="form-campos<?=$dadosInvalidos?>" id="div-login-usuario" >
                                    <label for="login-username">
                                        <i class="icon-user"></i> 
                                        <span>Email <span class="asteristicos-obrigatorio">*</span></span>
                                        <input class="form-control" type="text" id="usuario" 
                                        name="usuario" autofocus autocomplete="off" size="30"
                                        placeholder="Entre com o seu email" title="Entre com o seu email" />
                                    </label>
                                </div> <!-- div-login-nome -->
                                <div class="form-campos<?=$dadosInvalidos?>" id="div-login-senha" >
                                    <label for="login-password">
                                        <i class="icon-lock"></i> 
                                        <span>Senha <span class="asteristicos-obrigatorio">*</span></span>
                                        <input class="form-control" type="password" id="login-senha"  size="30"
                                        name="login-senha" placeholder="Entre com a Senha" title="Entre com a Senha" />
                                    </label>
                                </div> <!-- div-login-senha -->
                                <div id="div-autenticacao">
                                	<label>
                                    	<span id="titulo-aut">Autenticação: </span>
                                    	<select class="form-control" id="autenticacao" name="autenticacao">
                                        	<option value="aluno">Aluno</option>
                                            <option value="professor">Professor</option>
                                            <option value="administracao">Administração</option>
                                        </select>
                                    </label>
                                </div>
                                
                                <div class="form-group" id="div-login-opcoes" >
                                    <div id="div-login-mantenha-me-conectado">
                                        <label class="checkbox">
                                            <input type="checkbox" id="mantenha-me-conectado" > <span>Mantenha-me conectado</span>
                                        </label>
                                    </div> <!-- div-login-mantenha-me-conectado -->
                                    <div id="div-login-esqueceu-senha">
                                    	<a href="/suporte/esqueceu-senha.php" class="forgot-password">Esqueceu a Senha? </a>
                                    </div> <!-- div-login-senha -->
                                    <div id="div-login-btn-logar">
                                    	<input type="button" id="btn-logar" class="btn btn-primary" value="Entrar" onClick="botoesEnviar('#btn-logar', '#formulario-login', ValidarLogin());" />
                                    </div> <!-- div-login-btn-logar -->
                                    
                                    <div id="dados-invalidos">
										<?
										if($msg != ""){
											echo "$msg";
										}
										if($cadastro != ""){
											echo "<script type=\"text/javascript\">
													alert('Cadastro realizado com sucesso');
												  </script>";
										}
										?>
                                    </div> <!-- dados-invalidos -->
									<div class="clearfix"></div>
                                </div> <!-- div-login-opcoes -->
                            </form>
                        </div> <!-- basic-login -->
                    </div> <!-- col-sm-5 -->
                    
                    <div class="col-sm-7 social-login">
                        <div class="social-login-buttons">
                            <img src="../images/logo.png" width="400" height="200"/>
                        </div> <!-- social-login-buttons -->
                        <div class="not-member">
                            <p>Ainda não é membro? <a href="/cadastrar.php" title="Clique aqui para se registrar" >Clique aqui para registrar</a></p>
                        </div> <!-- not-member -->
                    </div> <!-- col-sm-7 social-login -->
                </div> <!-- row -->
            </div> <!-- container -->
         </div> <!-- container wow fadeInDown -->
    </section> <!-- section-formulario -->
    
    <!-- include com o section 'bottom' e o footer -->
    <? include("../includes/server/include-footer.php"); ?> 
</body>
</html>