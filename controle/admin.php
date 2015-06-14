<?
	$opcao = @$_GET['opcao'];
	
	function cadastrarTurma(){
		$turno = @$_POST['turma-turno'];
		$idPrograma = @$_POST['turma-programa'];
		$idModulo = @$_POST['turma-modulo'];
		$idLab = @$_POST['turma-laboratorio'];	
		
		$turno = utf8_decode($turno);
		
		if($idLab == 0){
			$idLab = "NULL";
		}
				
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
		
		define("TITULO","Cadastrar Turma");
		switch($_SESSION['admCargo']){
			case "dir":
			case "ass":
			case "ped":
				header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
			break;
		}
				
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT programa.`sigla`, modulo.`nome`, `nomeTurma`, modulo.`idModulo`, programa.`idPrograma`
				  FROM `turma`
				  JOIN programa ON programa.`idPrograma` = turma.`idPrograma`
				  JOIN modulo ON modulo.`idModulo`= turma.`idModulo`
				  WHERE modulo.`idModulo` = '$idModulo'
				  AND programa.`idPrograma` = '$idPrograma'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		
		$qtdTurmas = mysql_num_rows($resultadoPesquisa);
		
		if($qtdTurmas > 0){		
			$qtdTurmas++;
			
			$turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
			
			$turma['nome'] = strtoupper($turma['nome']);
			
			$nomeTurma = "{$turma['sigla']} ".$qtdTurmas." - {$turma['nome']}";
			
		}
		else{
			$qtdTurmas++;
			
			$query = "SELECT `sigla`
					  FROM `programa`
					  WHERE `idPrograma` = '$idPrograma'";
					 
			$resultadoPesquisa = mysql_query($query, $conexao);
			
			$programa = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
			
			$query = "SELECT `nome`
					  FROM `modulo`
					  WHERE `idModulo` = '$idModulo'";
					 
			$resultadoPesquisa = mysql_query($query, $conexao);
			
			$modulo = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
			$modulo['nome'] = strtoupper($modulo['nome']);
			
			$nomeTurma = "{$programa['sigla']} ".$qtdTurmas." - {$modulo['nome']}";
		}
		
		$query = "INSERT INTO `turma`(`turno`, `nomeTurma`, `idModulo`, `idLaboratorio`, `idPrograma`) 
				  VALUES ('$turno', '$nomeTurma', '$idModulo', $idLab, '$idPrograma')";
				  
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				mysql_close($conexao);
				header("Location: /acount/admin/cadastrar-turma.php?msg=Ocorreu um erro durante o cadastro");
			}
			else{
				mysql_close($conexao);
				header("Location: /acount/admin/cadastrar-turma.php?msg=Ocorreu um erro inexperado durante o cadastro");
			}			
		}else{
			mysql_close($conexao);
			header("Location: /acount/admin/cadastrar-turma.php?cadastro=Cadastro realizado com sucesso.");
		}
		mysql_close($conexao);
	}
	
	function cadastrarLab(){
		$numeroLab = @$_POST['laboratorio-numero'];
		$andares = @$_POST['laboratorio-andar'];
		$lugares = @$_POST['laboratorio-lugares'];
		
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `numeroLab` 
				  FROM `laboratorio`
				  WHERE `numeroLab` = '$numeroLab'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		
		if(mysql_num_rows($resultadoPesquisa) == 1){		
			$GLOBALS['msg'] = "laboratório já cadastrado";
		}
		else{
			$query = "INSERT INTO `laboratorio`(`numeroLab`, `lugares`, `andar`) 
					  VALUES ('$numeroLab', '$lugares', '$andares')";
					  
			$resultado = mysql_query($query, $conexao);
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msg'] = "Ocorreu um erro durante o cadastro";
					mysql_close($conexao);
				}
				else{
					$GLOBALS['msg'] = "Ocorreu um erro inexperado durante o cadastro";
					mysql_close($conexao);
				}			
			}else{
				$GLOBALS['msg'] = "Cadastro realizado com sucesso.";
				mysql_close($conexao);
			}
		}
	}
	
	/*function alterar($tipo){
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
				
				if($_SESSION['profSenha'] == $senhaAntiga){
					//Conecção ao Banco de Dados
					$conexao = mysql_connect("localhost", "root", "");
					if (!$conexao) {
						exit("Site Temporariamente fora do ar");
					}
				
					mysql_select_db("infnetgrid", $conexao);
					$query = "UPDATE `professor` 
							  SET `senha`= '$senhaNova'
							  WHERE `idProfessor` = '{$_SESSION['profId']}'";
				
					$resultado = mysql_query($query, $conexao);
					$msgSenha = "";
					if(mysql_affected_rows($conexao) != 1){
						if(mysql_errno() >= 1){
							header("Location: /acount/adminprof/configuracoes.php?msgSenha=Ocorreu um erro durante a alteração");
						}
						else{
							header("Location: /acount/adminprof/configuracoes.php?msgSenha=Ocorreu um erro inesperado durante a alteração");
						}
					}else{
						header("Location: /acount/adminprof/configuracoes.php?msgSenha=senha modificada com sucesso");
						$_SESSION['profSenha'] = $senhaNova;
					}
					mysql_close($conexao);				
				}else{
					header("Location: /acount/adminprof/configuracoes.php?msgSenha=Senha atual não confere.");
				}
			break;
			
			case "dados":
				$nome = @$_POST['alt-prof-nome'];
				$cpf = @$_POST['alt-prof-cpf'];
				
				$nome = utf8_decode($nome);
				
				//Conecção ao Banco de Dados
				$conexao = mysql_connect("localhost", "root", "");
				if (!$conexao) {
					exit("Site Temporariamente fora do ar");
				}
			
				mysql_select_db("infnetgrid", $conexao);
				
				$query = "UPDATE `professor` 
						  SET `nomeProfessor` = '$nome',`cpf` = '$cpf'
						  WHERE `idProfessor` = '{$_SESSION['profId']}'";
			
				$resultado = mysql_query($query, $conexao);
				
				$msgDados = "";
				if(mysql_affected_rows($conexao) < 0){
					if(mysql_errno() >= 1){
						header("Location: /acount/adminprof/configuracoes.php?msgDados=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/adminprof/configuracoes.php?msgDados=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/adminprof/configuracoes.php?msgDados=Dados modificados com sucesso");
					$_SESSION['profNome'] = $nome;
					$_SESSION['profCpf'] = $cpf;		
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
		
	}	*/
	
	switch($opcao){
		case "turma":
			$acao = @$_GET['acao'];
			switch($acao){
				case "cria":
					cadastrarTurma();
				break;
				case "altera":
					alteraTurma();
				break;
				default:
					header("Location: /acount/admin/");
			}
		break;
		case "laboratorio":
			$acao = @$_GET['acao'];
			switch($acao){
				case "cadastra":
					cadastrarLab();
				break;
			}
		break;
		case "":
		break;
		default:
			header("Location: /acount/admin/");
		break;
	}
?>