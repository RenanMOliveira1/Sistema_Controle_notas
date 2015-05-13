<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="notas, faculdade, alunos" />
  	<meta name="description" content="Descrição do site" />
    <title>Sistema de Controle de Notas - HOME</title>
    <link rel="stylesheet" type="text/css" href="includes/design/estilo.css" />
    <link rel="stylesheet" type="text/css" href="includes/design/estilo-login.css" />
    
    <script type="text/javascript" src="includes/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="includes/js/funcoes.js" charset="iso-8859-1"></script>
    
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
                    <input type="password" id="senha" name="senha">
                    <div id="div-botao">
                    	<input type="submit" id="btn-logar" value="Entrar">
            		</div>
                </div>
            </form>
        </div>
    </section>
    <? include("includes/server/include-footer.php"); ?>
</body>
</html>
