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
		$conexao = mysql_connect("localhost", "root", "");
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
					mysql_close($conexao);
					header("Location: /cadastrar.php?msg=Ocorreu um erro durante o cadastro");
				}
				else{
					mysql_close($conexao);
					header("Location: /cadastrar.php?msg=Ocorreu um erro inexperado durante o cadastro");
				}
			}else{
				mysql_close($conexao);
				header("Location: /acount/?cadastro=Cadastro realizado com sucesso.");
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
					mysql_close($conexao);
					header("Location: /cadastrar.php?msg=Ocorreu um erro durante o cadastro");
				}
				else{
					mysql_close($conexao);
					header("Location: /cadastrar.php?msg=Ocorreu um erro inexperado durante o cadastro");
				}
			}else{
				mysql_close($conexao);
				header("Location: /acount/?cadastro=Cadastro realizado com sucesso.");
			}
		}
	}
	
	function alterar($tipo){
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
				
		switch($tipo){
			case "senha":
				$senhaAntiga = @$_POST['alterar-senha-antiga'];
				$senhaNova = @$_POST['alterar-senha-nova'];
				
				if($_SESSION['alSenha'] == $senhaAntiga){
					//Conecção ao Banco de Dados
					$conexao = mysql_connect("localhost", "root", "");
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
							header("Location: /acount/adminal/configuracoes.php?msgSenha=Ocorreu um erro durante a alteração");
						}
						else{
							header("Location: /acount/adminal/configuracoes.php?msgSenha=Ocorreu um erro inesperado durante a alteração");
						}
					}else{
						header("Location: /acount/adminal/configuracoes.php?msgSenha=senha modificada com sucesso");
						$_SESSION['alSenha'] = $senhaNova;
					}
					mysql_close($conexao);				
				}else{
					header("Location: /acount/adminal/configuracoes.php?msgSenha=Senha atual não confere.");
				}
			break;	
			
			case "email":
				$emailAntigo = @$_POST['alt-email-atual'];
				$emailNovo = @$_POST['alt-email-novo'];
				
				if($_SESSION['alEmail'] == $emailAntigo){
					//Conecção ao Banco de Dados
					$conexao = mysql_connect("localhost", "root", "");
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
							header("Location: /acount/adminal/configuracoes.php?msgEmail=Ocorreu um erro durante a alteração");
						}
						else{
							header("Location: /acount/adminal/configuracoes.php?msgEmail=Ocorreu um erro inesperado durante a alteração");
						}
					}else{
						header("Location: /acount/adminal/configuracoes.php?msgEmail=email modificado com sucesso");
						$_SESSION['alEmail'] = $emailNovo;
					}
					mysql_close($conexao);				
				}else{
					header("Location: /acount/adminal/configuracoes.php?msgEmail=Email atual não confere.");
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
				$conexao = mysql_connect("localhost", "root", "");
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
						header("Location: /acount/adminal/configuracoes.php?msgDados=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/adminal/configuracoes.php?msgDados=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/adminal/configuracoes.php?msgDados=Dados modificados com sucesso");
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
		default:
			header("Location:/");
		break;
	}
?>