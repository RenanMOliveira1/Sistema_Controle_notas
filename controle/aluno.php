<?
	$acao = @$_GET['acao'];
	
	function cadastrar(){
		$nome = @$_POST['nome'];
		$dataNascimento = @$_POST['data-nascimento'];
		$cpf = @$_POST['cpf'];
		$sexo = @$_POST['sexo'];
		$telefone = @$_POST['telefone-fixo'];
		$celular = @$_POST['telefone-celular'];
		$cep = @$_POST['cep'];
		$tipoLogradouro = @$_POST['tipo-logradouro'];
		$numero = @$_POST['numero'];
		$logradouro = @$_POST['logradouro'];
		$complemento = @$_POST['complemento'];
		$bairro = @$_POST['bairro'];
		$cidade = @$_POST['cidade'];
		$estado = @$_POST['estado'];
		$programa = @$_POST['programa'];
		$senha = "!aluno2015";
		
		$nome = ucwords(strtolower($nome));
		$nome_email = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) );
		
		$nome_dividido = explode(" ", $nome_email);
		$primeiro_nome = $nome_dividido[0];
		$sobre_nome = substr($nome_dividido[1], 0, 1);
		$tamanho_nome = count($nome_dividido);
		$ultimo_nome = $nome_dividido[($tamanho_nome-1)];
		
		$email = strtolower($primeiro_nome.".".$ultimo_nome."@aluno.com");				
		
		//Conecção ao Banco de Dados
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `matricula`, `nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`, `acesso`
				  FROM `aluno` 
				  WHERE `email` = '$email'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		
		if (mysql_num_rows($resultadoPesquisa) == 1) {
			$email = strtolower($primeiro_nome.".".$sobre_nome.$ultimo_nome."@aluno.com");
			$nome = utf8_decode($nome);
			$logradouro = utf8_decode($logradouro );
			$complemento = utf8_decode($complemento);
			$bairro = utf8_decode($bairro);
			$cidade = utf8_decode($cidade);
			
			$query1 = "INSERT INTO `aluno`(`nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`)
					  VALUES ('$nome', '$cpf', '$dataNascimento','$sexo','$email','$senha');";
	
			$queryPesquisa = "SELECT `matricula`
					  FROM `aluno` 
					  WHERE `email` = '$email'";
			
			$resultado = mysql_query($query1, $conexao);
			
			$resultadoPesquisa = mysql_query($queryPesquisa, $conexao);
			$aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
			$matricula = $aluno['matricula'];		
			
			$query2 = "INSERT INTO `endereco`(`Cep`, `tipoLogradouro`, `numero`, `logradouro`, `complemento`, `bairro`, `cidade`, `estado`, `alunoMatricula`) 
					   VALUES ('$cep','$tipoLogradouro',$numero,'$logradouro','$complemento','$bairro','$cidade','$estado', '$matricula');";
			$resultado = mysql_query($query2, $conexao);		
			  
			$query3 = "INSERT INTO `telefone` (`telefone`, `celular`, `alunoMatricula`)
					   VALUES ('$telefone', '$celular','$matricula');";
			$resultado = mysql_query($query3, $conexao);
			
			$query4 ="INSERT INTO `aluno_programa`(`idPrograma`, `alunoMatricula`)
					  VALUES ('$programa', '$matricula')";
			$resultado = mysql_query($query4, $conexao);
					  
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msg'] = "Ocorreu um erro durante o cadastro";
					$GLOBALS['rsl'] = "err";
				}
				else{
					$GLOBALS['msg'] = "Ocorreu um erro inexperado durante o cadastro";
					$GLOBALS['rsl'] = "err";
				}
			}else{
				$GLOBALS['msg'] = "Cadastro realizado com sucesso.";
				$GLOBALS['rsl'] = "sucess";
			}
		}else{
			$nome = utf8_decode($nome);
			$logradouro = utf8_decode($logradouro );
			$complemento = utf8_decode($complemento);
			$bairro = utf8_decode($bairro);
			$cidade = utf8_decode($cidade);
			
			$query1 = "INSERT INTO `aluno`(`nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`)
					  VALUES ('$nome', '$cpf', '$dataNascimento','$sexo','$email','$senha');";
	
			$queryPesquisa = "SELECT `matricula`
					  FROM `aluno` 
					  WHERE `email` = '$email'";
			
			$resultado = mysql_query($query1, $conexao);
			
			$resultadoPesquisa = mysql_query($queryPesquisa, $conexao);
			$aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
			$matricula = $aluno['matricula'];		
			
			$query2 = "INSERT INTO `endereco`(`Cep`, `tipoLogradouro`, `numero`, `logradouro`, `complemento`, `bairro`, `cidade`, `estado`, `alunoMatricula`) 
					   VALUES ('$cep','$tipoLogradouro',$numero,'$logradouro','$complemento','$bairro','$cidade','$estado', '$matricula');";
			$resultado = mysql_query($query2, $conexao);		
			  
			$query3 = "INSERT INTO `telefone` (`telefone`, `celular`, `alunoMatricula`)
					   VALUES ('$telefone', '$celular','$matricula');";
			$resultado = mysql_query($query3, $conexao);
			
			$query4 ="INSERT INTO `aluno_programa`(`idPrograma`, `alunoMatricula`)
					  VALUES ('$programa', '$matricula')";
			$resultado = mysql_query($query4, $conexao);
					  
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msg'] = "Ocorreu um erro durante o cadastro";
					$GLOBALS['rsl'] = "err";
				}
				else{
					$GLOBALS['msg'] = "Ocorreu um erro inexperado durante o cadastro";
					$GLOBALS['rsl'] = "err";
				}
			}else{
				$GLOBALS['msg'] = "Cadastro realizado com sucesso.";
				$GLOBALS['rsl'] = "sucess";
			}
		}
		mysql_close($conexao);
	}
	
	function alterar($tipo){		
		switch($tipo){
			case "senha":
				$senhaAntiga = @$_POST['alterar-senha-antiga'];
				$senhaNova = @$_POST['alterar-senha-nova'];
				
				if($_SESSION['alSenha'] == $senhaAntiga){
					//Conecção ao Banco de Dados
					$conexao = @mysql_connect("localhost", "root", "");
					if (!$conexao) {
						exit("Site Temporariamente fora do ar");
					}
				
					mysql_select_db("infnetgrid", $conexao);
					$query = "UPDATE `aluno` 
							  SET `senha`= '$senhaNova'
							  WHERE `matricula` = '{$_SESSION['alMatricula']}'";
				
					$resultado = mysql_query($query, $conexao);
					$msgSenha = "";
					if(mysql_affected_rows($conexao) != 1){
						if(mysql_errno() >= 1){
							$GLOBALS['msg'] = "Ocorreu um erro durante a alteração";
							$GLOBALS['rsl'] = "err";
						}
						else{
							$GLOBALS['msg'] = "Ocorreu um erro inesperado durante a alteração";
							$GLOBALS['rsl'] = "err";
						}
					}else{
						$GLOBALS['msg'] = "Senha Modificada com Sucesso";
						$GLOBALS['rsl'] = "sucess";
						$_SESSION['alSenha'] = $senhaNova;
					}
					mysql_close($conexao);				
				}else{
					$GLOBALS['msg'] = "Senha atual não confere.";
					$GLOBALS['rsl'] = "err";
				}
			break;	
			
			case "email":
				$emailAntigo = @$_POST['alt-email-atual'];
				$emailNovo = @$_POST['alt-email-novo'];
				
				if($_SESSION['alEmail'] == $emailAntigo){
					//Conecção ao Banco de Dados
					$conexao = @mysql_connect("localhost", "root", "");
					if (!$conexao) {
						exit("Site Temporariamente fora do ar");
					}
				
					mysql_select_db("infnetgrid", $conexao);
					$query = "UPDATE `aluno` 
							  SET `email` = '$emailNovo'
							  WHERE `matricula` = '{$_SESSION['alMatricula']}'";
				
					$resultado = mysql_query($query, $conexao);
					$msgEmail = "";
					if(mysql_affected_rows($conexao) != 1){
						if(mysql_errno() >= 1){
							$GLOBALS['msg'] = "Ocorreu um erro durante a alteração";
							$GLOBALS['rsl'] = "err";
						}
						else{
							$GLOBALS['msg'] = "Ocorreu um erro inesperado durante a alteração";
							$GLOBALS['rsl'] = "err";
						}
					}else{
						$GLOBALS['msg'] = "Email Modificado com Sucesso";
						$GLOBALS['rsl'] = "sucess";
						$_SESSION['alEmail'] = $emailNovo;
					}
					mysql_close($conexao);				
				}else{
					$GLOBALS['msg'] = "Email atual não confere";
					$GLOBALS['rsl'] = "err";
				}
			break;
			
			case "dados":
				$nome = @$_POST['alt-nome'];
				$dataNascimento = @$_POST['alt-data-nascimento'];
				$cpf = @$_POST['alt-cpf'];
				$sexo = @$_POST['alt-sexo'];
				$telefone = @$_POST['alt-telefone-fixo'];
				$celular = @$_POST['alt-telefone-celular'];
				$cep = @$_POST['alt-cep'];
				$tipoLogradouro = @$_POST['alt-tipo-logradouro'];
				$numero = @$_POST['alt-numero'];
				$logradouro = @$_POST['alt-logradouro'];
				$complemento = @$_POST['alt-complemento'];
				$bairro = @$_POST['alt-bairro'];
				$cidade = @$_POST['alt-cidade'];
				$estado = @$_POST['alt-estado'];
				
				$nome = utf8_decode($nome);
				$logradouro = utf8_decode($logradouro );
				$complemento = utf8_decode($complemento);
				$bairro = utf8_decode($bairro);
				$cidade = utf8_decode($cidade);
				
				//Conecção ao Banco de Dados
				$conexao = @mysql_connect("localhost", "root", "");
				if (!$conexao) {
					exit("Site Temporariamente fora do ar");
				}
			
				mysql_select_db("infnetgrid", $conexao);
				
				$query1 = "UPDATE `aluno` 
						  SET `nomeAluno` = '$nome',`cpf` = '$cpf',`dataNascimento` = '$dataNascimento',`sexo` = '$sexo'
						  WHERE `matricula` = '{$_SESSION['alMatricula']}'";
			
				$resultado = mysql_query($query1, $conexao);
				
				$query2 = "UPDATE `endereco`
						  SET `Cep` = '$cep',`tipoLogradouro`= '$tipoLogradouro',`numero`= '$numero',`logradouro`= '$logradouro',`complemento`= '$complemento',`bairro`= '$bairro',`cidade`= '$cidade',`estado`= '$estado'
						  WHERE `alunoMatricula` = '{$_SESSION['alMatricula']}'";
			
				$resultado = mysql_query($query2, $conexao);
				
				$query3 = "UPDATE `telefone` 
						  SET `telefone` = '$telefone', `celular` = '$celular' 
						  WHERE `alunoMatricula` = '{$_SESSION['alMatricula']}' ";
			
				$resultado = mysql_query($query3, $conexao);
				
				$msgDados = "";
				if(mysql_affected_rows($conexao) < 0){
					if(mysql_errno() >= 1){
						$GLOBALS['msg'] = "Ocorreu um erro durante a alteração";
						$GLOBALS['rsl'] = "err";
					}
					else{
						$GLOBALS['msg'] = "Ocorreu um erro inesperado durante a alteração";
						$GLOBALS['rsl'] = "err";
					}
				}else{
					$GLOBALS['msg'] = "Dados modificados com sucesso";
					$GLOBALS['rsl'] = "sucess";
					
					$_SESSION['alNome'] = $nome;
					$_SESSION['alCpf'] = $cpf;
					$_SESSION['alDataNascimento'] = $dataNascimento;
					$_SESSION['alSexo'] = $sexo;				
					$_SESSION['alCep'] = $cep;
					$_SESSION['alTipoLogradouro'] = $tipoLogradouro;
					$_SESSION['alNumero'] = $numero;
					$_SESSION['alLogradouro'] = $logradouro;
					$_SESSION['alComplemento'] = $complemento;
					$_SESSION['alBairro'] = $bairro;
					$_SESSION['alCidade'] = $cidade;
					$_SESSION['alEstado'] = $estado;
					$_SESSION['alTelefone'] = $telefone;
					$_SESSION['alCelular'] = $celular;				
				}
				mysql_close($conexao);	
			break;
		}
	}
	
	function liberar(){
		session_start();
		$matricula = @$_GET['matricula'];
		if(!$_SESSION['logado']){
			$msg = "Sessão expirada.";
			header("Location: /acount/?msg=$msg");
		}
		switch($_SESSION['autenticacao']){
			case "professor":
				header("Location: /acount/adminprof/");
			break;
			case "aluno":
				header("Location: /acount/adminal/");
			break;
		}
		define("TITULO","Liberar Acesso de Aluno");
		switch($_SESSION['admCargo']){
			case "ass":
			case "dir":
			case "ped":
				header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		}
		
		//Conecção ao Banco de Dados
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "UPDATE `aluno` 
				  SET `acesso` = 1 
				  WHERE `matricula` = '$matricula'";
		
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				header("Location: /acount/admin/liberar-acesso.php?msg=Ocorreu um erro durante a alteração");
			}
			else{
				header("Location: /acount/admin/liberar-acesso.php?msg=Ocorreu um erro inesperado durante a alteração");
			}
		}else{
			header("Location: /acount/admin/liberar-acesso.php?msg=Acesso liberado com sucesso");
		}
		
		mysql_close($conexao);
	}
	
	function vincular(){
		$matricula = @$_POST['vincular-aluno-nomeAl'];
		$turmaId = @$_POST['vincular-aluno-turma'];
		
		//Conecção ao Banco de Dados
		$conexao = mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `alunoMatricula`, `turmaID`
				  FROM `turma_aluno` 
				  WHERE `alunoMatricula` = '$matricula' 
				  AND `turmaID` = '$turmaId'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		if (mysql_num_rows($resultadoPesquisa) == 1) {
			header("Location: /acount/admin/vincular-alunos.php?msg=Aluno já inserido nesta turma");
		}else{
			$query = "INSERT INTO `turma_aluno`(`alunoMatricula`, `turmaID`) 
					  VALUES ('$matricula','$turmaId')";
					  
			$resultado = mysql_query($query, $conexao);
			
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					header("Location: /acount/admin/vincular-alunos.php?msg=Ocorreu um erro durante a vinculação");
				}
				else{
					header("Location: /acount/admin/vincular-alunos.php?msg=Ocorreu um erro inesperado durante a vinculação");
				}
			}else{
				header("Location: /acount/admin/vincular-alunos.php?msg=Aluno inserido na turma com sucesso");
			}		
		}
		mysql_close($conexao);
		
	}
	
	function lancarNota($matricula){			
		session_start();
		if($matricula == ""){
			header("Location: /acount/adminprof/");
		}
		$turmaId = @$_POST['nota-turma'];
		$av1 = @$_POST['nota-av1-'.$matricula];
		$av2 = @$_POST['nota-av2-'.$matricula];
		$av3 = @$_POST['nota-pf-'.$matricula];
		$comentario = @$_POST['comentario'];	
		
		if($av1 == ""){
			$av1 = -1.00;
		}
		if($av2 == ""){
			$av2 = -1.00;
		}
		if($av3 == ""){
			$av3 = -1.00;
		}
		if(!$_SESSION['logado']){
			$msg = "Sessão expirada.";
			header("Location: /acount/?msg=$msg");
		}
		define("TITULO","Visualizar Turma");
		switch($_SESSION['autenticacao']){
			case "administracao":
				header("Location: /acount/admin/");
			break;
			case "aluno":
				header("Location: /acount/adminal/");
			break;
		}
		
		//Conecção ao Banco de Dados
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "UPDATE `turma_aluno` 
				  SET `av1`='$av1',`av2`='$av2',`av3`='$av3'
				  WHERE `alunoMatricula` = '$matricula'
				  AND `turmaID` = '$turmaId'";
		
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) < 0){
			if(mysql_errno() >= 1){
				header("Location: /acount/adminprof/mostrar_turma.php?msg=Ocorreu um erro durante a alteração");
			}else{
				header("Location: /acount/adminprof/mostrar_turma.php?msg=Ocorreu um erro inesperado durante a alteração");
			}
		}else{
			header("Location: /acount/adminprof/mostrar_turma.php?msg=Nota lançada com sucesso");		
		}
		mysql_close($conexao);
	}
	
	function avaliar($qtdTurmas){
		$resp1 = @$_POST['desemp-infra-pergunta1'];
		$resp2 = @$_POST['desemp-infra-pergunta2'];
		$resp3 = @$_POST['desemp-infra-pergunta3'];
		$resp4 = @$_POST['desemp-infra-pergunta4'];
		
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "INSERT INTO `avaliacao`(`alunoMatricula`, `resposta1`, `resposta2`, `resposta3`, `resposta4`)
			  VALUES('{$_SESSION['alMatricula']}', '$resp1', '$resp2', '$resp3', '$resp4')";
			  
			  
	$resultado = @mysql_query($query, $conexao);
	
	$query = "SELECT MAX(`idAvaliacao`) AS idAvaliacao FROM `avaliacao`";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	
	$idAvaliacao = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
	$idAv = $idAvaliacao['idAvaliacao'];
		
		for($contador = 0; $contador < $qtdTurmas; $contador++){
			$idTurma = $GLOBALS[$contador];
			$profResp1 = @$_POST['desemp-'.$idTurma.'-pergunta1'];
			$profResp2 = @$_POST['desemp-'.$idTurma.'-pergunta2'];
			$profResp3 = @$_POST['desemp-'.$idTurma.'-pergunta3'];
			$profResp4 = @$_POST['desemp-'.$idTurma.'-pergunta4'];
			$profResp5 = @$_POST['desemp-'.$idTurma.'-pergunta5'];
			$profResp6 = @$_POST['desemp-'.$idTurma.'-pergunta6'];
			$profResp7 = @$_POST['desemp-'.$idTurma.'-pergunta7'];
			$profResp8 = @$_POST['desemp-'.$idTurma.'-pergunta8'];
			
			$query = "INSERT INTO `turma_avaliacao`(`idTurma`, `idAvaliacao`, `respProf1`, `respProf2`, `respProf3`, `respProf4`, `respProf5`, `respProf6`, `respProf7`, `respProf8`) 
					  VALUES('$idTurma', '$idAv', '$profResp1', '$profResp2', '$profResp3', '$profResp4', '$profResp5', '$profResp6', '$profResp7', '$profResp8')";
			
			$resultado = @mysql_query($query, $conexao);
		}
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				$GLOBALS['msg'] = "Ocorreu um erro durante a avaliação";
			}
			else{
				$GLOBALS['msg'] = "Ocorreu um erro inesperado durante a avaliação";
			}			
		}else{
			$GLOBALS['msg'] = "Avaliação feita com sucesso";
		}
		mysql_close($conexao);	
	}

	
	switch($acao){
		case "cadastro":
			cadastrar();
		break;
		case "alteracao":
			$tipo = @$_GET['tipo'];
			alterar($tipo);
		break;
		case "liberacao":
			$matricula = @$_GET['matricula'];
			liberar($matricula);
		break;
		case "vinculacao":
			vincular();
		break;
		case "nota":
			$matricula = @$_GET['matricula'];
			lancarNota($matricula);
		break;
		case "avaliacao":
			$qtdTurmas = @$_GET['qtdTurmas'];
			avaliar($qtdTurmas);
		break;
		case "":
		break;
		default:
			header("Location:/");
		break;
	}
?>