<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição" />
    <title>Entre em Contato</title>
    <link rel="stylesheet" type="text/css" href="includes/design/estilo-contato.css" />
    <? include("includes/server/include-css-js.php"); ?>
    
    <style>
		#section-corpo { height: 400px}
	</style>
</head>

<body>
	<div id="div-container">
        <? include("includes/server/include-header.php"); ?>
		<? include("includes/server/include-nav-principal.php"); ?>
        <section id="section-corpo">
            <section id="section-form-contato">
            	<h3>False Conosco</h3>
                <form id="form-contato" action="contato_exe.php" method="post">
                    <fieldset>
                        <div id="div-nome">
                            <span>Nome: <span class="asterisco-obrigatoria">*</span></span>
                            <input id="nome-contato" name="nome-contato" title="Entre com o Seu Nome" placeholder="Entre com o Seu Nome" size="40" />
                        </div>
                        <div id="div-assunto">
                            <label><span>Assunto: <span class="asterisco-obrigatoria">*</span></span><input type="text" name="assunto" id="assunto" placeholder="Entre com o Assunto" /></label>
                        </div>
                        <div id="div-mensagem">
                            <label><span>Mensagem: <span class="asterisco-obrigatoria">*</span></span><textarea name="mensagem" id="mensagem" cols="40" rows="5" ></textarea></label>
                        </div>
                    </fieldset>
                    
                    <div id="dados-invalidos"></div>
                    
                    <div id="div-btn-enviar">
                        <input type="button" id="btn-enviar" value=" Enviar " />
                    </div>
                </form>
            </section>
            	
            <section id="section-meios-contato">
            	<div id="div-contato-endereco">
                <h3>Endereço</h3>
                	<p>Rua São José de Meriti, 45<br />Centro - Rio de Janeiro<br />RJ | Andar 254<br />29171-450</p>
                </div>
                <div id="div-contato-telefones">
                	<h3>Telefones</h3>
                    <p>21-3878-9878</p>
                    <p>21-2323-8987</p>
                    <p><br/><strong>Email</strong>: contato@sga.edu.br</p>
                </div>
                
            </section>
        </section>
        
        <? include("includes/server/include-footer.php"); ?>
    </div>
</body>
</html>