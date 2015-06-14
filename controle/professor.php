<?
	$acao = @$_GET['acao'];
	
	function cadastrar(){
		$nome = @$_POST['admin-prof-nome'];
		$cpf = @$_POST['admin-prof-cpf'];		
		$senha = "!prof2015";
		
		$nome = ucwords(strtolower($nome));
		$nome_email = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) );
		
		$nome_dividido = explode(" ", $nome_email);
		$primeiro_nome = $nome_dividido[0];
		$sobre_nome = substr($nome_dividido[1], 0, 1);
		$tamanho_nome = count($nome_dividido);
		$ultimo_nome = $nome_dividido[($tamanho_nome-1)];
		
		$email = strtolower($primeiro_nome.".".$ultimo_nome."@prof.com");
				
		session_start();
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
		define("TITULO","Cadastrar Professores");
			switch($_SESSION['admCargo']){
			case "dir":
			case "rca":
			case "ass":
				header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
			break;
		}
		
		$conexao = mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `cpf` 
				  FROM `professor` 
				  WHERE `cpf` = '$cpf'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		$msg = "";
		if (mysql_num_rows($resultadoPesquisa) == 1) {
			header("Location: /acount/admin/cadastrar-professor.php?msg=Professor já cadastrado");
		}else{
			$query = "SELECT `idProfessor`, `nomeProfessor`, `email`, `senha`, `cpf` 
					  FROM `professor` 
					  WHERE `email` = '$email'";
		
			$resultadoPesquisa = mysql_query($query, $conexao);
			if (mysql_num_rows($resultadoPesquisa) == 1){
				$email = strtolower($primeiro_nome.".".$sobre_nome.$ultimo_nome."@prof.com");
			}
			$query = "INSERT INTO `professor`(`nomeProfessor`, `email`, `senha`, `cpf`)
					  VALUES ('$nome', '$email', '$senha', '$cpf');";
			$resultado = mysql_query($query, $conexao);
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					header("Location: /acount/admin/cadastrar-professor.php?msg=Ocorreu um erro durante a inclusão");
				}
				else{
					header("Location: /acount/admin/cadastrar-professor.php?msg=Ocorreu um erro inesperado durante a inclusão");
				}
			}else{
				header("Location: /acount/admin/cadastrar-professor.php?msg=Cadastro concluído com sucesso");
			}
		}
		mysql_close($conexao);
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
				  AND `turmaID` = '$turmaId";
		
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