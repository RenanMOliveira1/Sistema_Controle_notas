<?
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "professor":
			header("Location: /acount/adminprof/");
		break;
		case "administracao":
			header("Location: /acount/admin/");
		break;
	}
	define('TITULO','Avaliação de Qualidade');
	define('ENDERECO_PAG_INIC_AL','/acount/adminal/index.php');
	
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	$dataAvaliacao = strftime('%A, %d de %B de %Y', strtotime('today'));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, avaliacao, qualidade" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>
	
    <!-- Js e CSS do Site -->
    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('avaliacao-qualidade');">
	<!-- Header com Logo e Submenu a Direita e a Sidebar a Esquerda -->
	<? include("../../includes/server/include-login-al-header-sidebar.php"); ?>
		
	<section id="section-al-avaliacao-qualidade" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<!-- Caminho da Página e Titulo -->			
		<? include("../../includes/server/include-login-caminho-titulo.php"); ?>
		
        <div class="row">
			<div class="col-lg-12">
                <form id="formulario-avaliacao" action="avaliacao_exe.php" method="post">
                    <div class="col-lg-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">Seus Dados</div> <!-- panel-heading -->
                            <div class="panel-body">
                                <div class="form-group" id="div-avaliacao-data">
                                    <label>
                                        <span>Data da Avaliação: </span>
                                        <input type="text" id="avaliacao-data" name="avaliacao-data" 
                                        size="35" class="form-control" value="<?=utf8_encode($dataAvaliacao)?>"
                                        title="Data em que você está realizando a Avaliacao" disabled />
                                    </label>
                                </div> <!-- div-nome -->
                                <div class="form-group" id="div-nome">
                                    <label>
                                        <span>Nome: </span>
                                        <input type="text" id="nome" name="nome" size="40" class="form-control"
                                        value="<?= utf8_encode($_SESSION['alNome'])?>"
                                        title="Seu Nome Cadastrado" disabled />
                                    </label>
                                </div> <!-- div-nome -->
                                    
                                <div class="form-group" id="div-cpf">
                                    <label>
                                        <span>CPF: <span class="asteristicos-obrigatorio">*</span></span>
                                        <input type="text" id="cpf" name="cpf" class="form-control" size="15"
                                        value="<?= utf8_encode($_SESSION['alCpf'])?>" 
                                        title="Seu CPF Cadastrado" disabled />
                                    </label>
                                </div> <!-- div-nascimento -->
                                <div class="form-group" id="div-email">
                                    <label>
                                        <span>Email: <span class="asteristicos-obrigatorio">*</span></span>
                                        <input type="text" class="form-control" name="email" id="email" 
                                        size="40" value="<?= utf8_encode($_SESSION['alEmail'])?>" 
                                        title="Seu Email Cadastrado" disabled />
                                    </label>
                                </div> <!-- div-email -->
                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel panel-default -->
                    </div> <!--col-lg-8 -->
                    
                <div class="col-lg-12">    
                    <div class="panel panel-default">
                        <div class="panel-heading">Desempenho Docente e Disciplinas do Curso</div> <!-- panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12"> 
                                <div class="text-center form-group" id="div-desemp-prof1">
                                    <label>
                                        <span>Nome do Professor: </span>
                                        <input type="text" id="nome-prof1" name="nome-prof1" size="80" class="form-control"
                                        value="NomeDoProfessor" title="Nome do Professor" disabled />
                                    </label>
                                </div> <!-- div-desemp-prof1 -->
                            </div> <!-- col-lg-12 -->
						<div class="col-lg-6">  
                            <div class="form-group" id="div-desemp-prof1-pergunta1">
                                <label>
                                    <span><strong>1.</strong> O professor domina o conteúdo e está atualizado.: <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta1" id="desemp-prof1-pergunta1" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta1" id="desemp-prof1-pergunta1" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta1" id="desemp-prof1-pergunta1" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta1" id="desemp-prof1-pergunta1" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta1" id="desemp-prof1-pergunta1" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta1 -->
                                           
                            <div class="form-group" id="div-desemp-prof1-pergunta2">
                                <label>
                                    <span><strong>2.</strong>	O professor tem bom relacionamento com os alunos e é aberto ao diálogo: <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta2" id="desemp-prof1-pergunta2" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta2" id="desemp-prof1-pergunta2" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta2" id="desemp-prof1-pergunta2" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta2" id="desemp-prof1-pergunta2" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta2" id="desemp-prof1-pergunta2" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta2 -->   
                            
                            <div class="form-group" id="div-desemp-prof1-pergunta3">
                                <label>
                                    <span><strong>3.</strong>	O professor é pontual em suas funções: <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta3" id="desemp-prof1-pergunta3" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta3" id="desemp-prof1-pergunta3" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta3" id="desemp-prof1-pergunta3" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta3" id="desemp-prof1-pergunta3" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta3" id="desemp-prof1-pergunta3" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta3 -->   
                            
                            <div class="form-group" id="div-desemp-prof1-pergunta4">
                                <label>
                                    <span><strong>4.</strong>	O professor é disponível para o esclarecimento de dúvidas: <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta4" id="desemp-prof1-pergunta4" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta4" id="desemp-prof1-pergunta4" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta4" id="desemp-prof1-pergunta4" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta4" id="desemp-prof1-pergunta4" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta4" id="desemp-prof1-pergunta4" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta4 -->
                        </div> <!-- col-lg-6 -->
                        
                        <div class="col-lg-6">  
                            <div class="form-group" id="div-desemp-prof1-pergunta5">
                                <label>
                                    <span><strong>5.</strong>	Eu Gostaria de Ter Aula Novamente com esse Professor: <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta5" id="desemp-prof1-pergunta5" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta5" id="desemp-prof1-pergunta5" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta5" id="desemp-prof1-pergunta5" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta5" id="desemp-prof1-pergunta5" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta5" id="desemp-prof1-pergunta5" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta5 -->   
                            
                            <div class="form-group" id="div-desemp-prof1-pergunta6">
                                <label>
                                    <span><strong>6.</strong> O plano da disciplina apresentado contém os itens essenciais (objetivos, conteúdos, sistema de avaliação, atividades a serem realizadas): <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta6" id="desemp-prof1-pergunta6" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta6" id="desemp-prof1-pergunta6" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta6" id="desemp-prof1-pergunta6" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta6" id="desemp-prof1-pergunta6" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta6" id="desemp-prof1-pergunta6" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta6 -->      
                            
                            <div class="form-group" id="div-desemp-prof1-pergunta7">
                                <label>
                                    <span><strong>7.</strong>  Os recursos didáticos utilizados na disciplina são de boa qualidade: <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta7" id="desemp-prof1-pergunta7" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta7" id="desemp-prof1-pergunta7" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta7" id="desemp-prof1-pergunta7" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta7" id="desemp-prof1-pergunta7" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta7" id="desemp-prof1-pergunta7" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta7 -->   
                            
                            <div class="form-group" id="div-desemp-prof1-pergunta7">
                                <label>
                                    <span><strong>8.</strong>  A bibliografia para estudo do conteúdo é disponível na biblioteca. <span class="asteristicos-obrigatorio">*</span></span>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta8" id="desemp-prof1-pergunta8" value="opcao-a" checked>
                                            <span>Concordo Totalmente</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta8" id="desemp-prof1-pergunta8" value="opcao-b">
                                            <span>Concordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta8" id="desemp-prof1-pergunta8" value="opcao-c">
                                            <span>Não Concordo nem Discordo</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta8" id="desemp-prof1-pergunta8" value="opcao-d">
                                            <span>Discordo</span>
                                        </label>
                                    </div>
                                   <div class="radio">
                                        <label>
                                            <input type="radio" name="desemp-prof1-pergunta8" id="desemp-prof1-pergunta8" value="opcao-e">
                                            <span>Discordo Totalmente</span>
                                        </label>
                                    </div>
                                </label>
                            </div> <!-- div-nome-prof1-pergunta8 -->  
                     	</div> <!-- col-lg-8 -->
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-12 --> 
                  
            <div class="col-lg-12">    
               <div class="panel panel-default">
                  <div class="panel-heading">Infra-estrutura</div> <!-- panel-heading -->
                  <div class="panel-body">
                     <div class="col-lg-6"> 
                         <div class="form-group" id="div-desemp-infra-pergunta1">
                            <label>
                                <span><strong>1.</strong> O ambiente para as aulas é apropriado quanto à acústica, luminosidade e ventilação <span class="asteristicos-obrigatorio">*</span></span>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp--infra-pergunta1" id="desemp-infra-pergunta1" value="opcao-a" checked>
                                        <span>Concordo Totalmente</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp--infra-pergunta1" id="desemp-infra-pergunta1" value="opcao-b">
                                        <span>Concordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta1" id="desemp-infra-pergunta1" value="opcao-c">
                                        <span>Não Concordo nem Discordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta1" id="desemp-infra-pergunta1" value="opcao-d">
                                        <span>Discordo</span>
                                    </label>
                                </div>
                               <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta1" id="desemp-infra-pergunta1" value="opcao-e">
                                        <span>Discordo Totalmente</span>
                                    </label>
                                </div>
                            </label>
                        </div> <!-- div-nome-infra-pergunta1 -->
                                       
                        <div class="form-group" id="div-desemp-infra-pergunta2">
                            <label>
                                <span><strong>2.</strong> Os equipamentos dos laboratórios da instituição são adequados e em número suficiente <span class="asteristicos-obrigatorio">*</span></span>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta2" id="desemp-infra-pergunta2" value="opcao-a" checked>
                                        <span>Concordo Totalmente</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta2" id="desemp-infra-pergunta2" value="opcao-b">
                                        <span>Concordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta2" id="desemp-infra-pergunta2" value="opcao-c">
                                        <span>Não Concordo nem Discordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta2" id="desemp-infra-pergunta2" value="opcao-d">
                                        <span>Discordo</span>
                                    </label>
                                </div>
                               <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta2" id="desemp-infra-pergunta2" value="opcao-e">
                                        <span>Discordo Totalmente</span>
                                    </label>
                                </div>
                            </label>
                        </div> <!-- div-nome-infra-pergunta2 -->   
                    </div> <!-- col-lg-6 -->   
                    
                    <div class="col-lg-6"> 
                        <div class="form-group" id="div-desemp-infra-pergunta3">
                            <label>
                                <span><strong>3.</strong> A biblioteca dispõe dos livros básicos e periódicos recomendados nas disciplinas <span class="asteristicos-obrigatorio">*</span></span>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta3" id="desemp-infra-pergunta3" value="opcao-a" checked>
                                        <span>Concordo Totalmente</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta3" id="desemp-infra-pergunta3" value="opcao-b">
                                        <span>Concordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta3" id="desemp-infra-pergunta3" value="opcao-c">
                                        <span>Não Concordo nem Discordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta3" id="desemp-infra-pergunta3" value="opcao-d">
                                        <span>Discordo</span>
                                    </label>
                                </div>
                               <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta3" id="desemp-infra-pergunta3" value="opcao-e">
                                        <span>Discordo Totalmente</span>
                                    </label>
                                </div>
                            </label>
                        </div> <!-- div-nome-infra-pergunta3 -->   
                        
                        <div class="form-group" id="div-desemp-infra-pergunta4">
                            <label>
                                <span><strong>4.</strong> Os serviços de limpeza no Campus são adequados <span class="asteristicos-obrigatorio">*</span></span>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta4" id="desemp-infra-pergunta4" value="opcao-a" checked>
                                        <span>Concordo Totalmente</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta4" id="desemp-infra-pergunta4" value="opcao-b">
                                        <span>Concordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta4" id="desemp-prof1-pergunta4" value="opcao-c">
                                        <span>Não Concordo nem Discordo</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta4" id="desemp-infra-pergunta4" value="opcao-d">
                                        <span>Discordo</span>
                                    </label>
                                </div>
                               <div class="radio">
                                    <label>
                                        <input type="radio" name="desemp-infra-pergunta4" id="desemp-infra-pergunta4" value="opcao-e">
                                        <span>Discordo Totalmente</span>
                                    </label>
                                </div>
                            </label>
                        </div> <!-- div-nome-infra-pergunta4 -->
                    </div> <!-- col-lg-6 -->
                    
                    <div id="text-center div-btn-enviar">
                    	<input type="button" id="btn-enviar-avaliacao" class="btn btn-primary" value="Enviar Formulario" onClick="botoesEnviar('#btn-enviar-avaliacao', '#formulario-avaliacao', true);" />
                	</div> <!-- div-btn-enviar -->
                  </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </form>
          </div> <!-- col-lg-12 -->
        </div> <!-- row --> 
	</section> <!-- main -->
</body>

</html>
