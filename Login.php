<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="notas, faculdade, alunos, login" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição" />
    <title>Sistema de Controle de Notas - HOME</title>
    
    <? include("includes/server/include-css-js.php"); ?>
    
    <style>
		p{margin-left: 45px;}
		
		input  {
			color: #616475;
			border-radius: 2px;
			border:solid 1px #999999;
		}
		
		#quadro-login{
			border: 2px solid #000099;
			border-radius: 50px;
			margin-top: 9%;
			margin-left: 38%;
			width: 345px;
			height: 325px;
		}
		
		#dados-invalidos {
			color: red;
			font-size: 12px;	
		}
		
		#div-logo{
			padding-left: 27%;
			paddin-top: 10%;
			margin-top: 11px;
		}
		
		#footer{margin-top: 50px;}
		
		#div-form{padding-left: 30%;}
		
		#div-senha{margin-top: 9px;}
		
		#div-botao input {padding: 5px 10px 5px 10px}
		
		#footer{margin-top: 13%;}
		
		#div-botao{
			padding-top: 30px;
			padding-left: 32px;
		}
	</style>
</head>

<body>
	<section id="quadro-login">
    	<div id="div-logo">
        <a href="Index.php">
        	<img id="logo-sistema" alt="logo do sistema com link que irá para a pagina inicial" src="images/logo-login.png" width="160" height="100">
        </a>
        </div>
        <div id="div-form">
        	<form id="formulario-login" action="Entrar.php" method="post">
            	<div id="div-usuario">
                    <p>Usuário</p>
                    <input type="text" id="usuario" name="usuario" autofocus autocomplete="off">
            	</div>
                <div id="div-senha">
                    <p> Senha</p>
                    <input type="password" id="login-senha" name="login-senha">
                    
                    <div id="dados-invalidos"></div>
                    
                    <div id="div-botao">
                    	<input type="button" id="btn-logar" value="Entrar">
            		</div>
                    
                    
                </div>
            </form>
        </div>
    </section>
    <? include("includes/server/include-footer.php"); ?>
</body>
</html>
