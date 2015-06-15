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
			$nomeTurma = utf8_encode($nomeTurma);
		}
		
		$query = "INSERT INTO `turma`(`turno`, `nomeTurma`, `idModulo`, `idLaboratorio`, `idPrograma`) 
				  VALUES ('$turno', '$nomeTurma', '$idModulo', $idLab, '$idPrograma')";
				  
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				$GLOBALS['msg'] = "Ocorreu um erro durante o cadastro";	
				$GLOBALS['rsl'] = "err";			
				mysql_close($conexao);
			}
			else{
				$GLOBALS['msg'] = "Ocorreu um erro inexperado durante o cadastro";
				$GLOBALS['rsl'] = "err";
				mysql_close($conexao);
			}			
		}else{
			$GLOBALS['msg'] = "Cadastro realizado com sucesso, nome da turma é: ".utf8_encode($nomeTurma);
			$GLOBALS['rsl'] = "sucess";
			mysql_close($conexao);
		}
	}
	
	function alterarTurma(){
		$idTurma = @$_POST['alterar-turma-id'];
		$nome = @$_POST['alterar-turma-nome'];
		$turno = @$_POST['alterar-turma-turno'];
		$idProf = @$_POST['alterar-turma-prof'];
		$idLab = @$_POST['alterar-turma-laboratorio'];
		
		$turno = utf8_decode($turno);
		$nome = utf8_decode($nome);

		if($idLab == 0){
			$idLab = "NULL";
		}
		if($idProf == 0){
			$idProf = "NULL";
		}
				
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "UPDATE `turma` 
				  SET `turno` = '$turno', `nomeTurma` = '$nome', `idLaboratorio` = $idLab, `idProfessor` = $idProf
				  WHERE `idTurma` = '$idTurma'";
				  
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				$GLOBALS['msg'] = "Ocorreu um erro durante a alteração";
				header("Location: /acount/admin/alterar-turma.php");
				mysql_close($conexao);
			}
			else{
				$GLOBALS['msg'] = "Ocorreu um erro inexperado durante a alteração";
				header("Location: /acount/admin/alterar-turma.php");
				mysql_close($conexao);
			}			
		}else{
			$GLOBALS['msg'] = "Turma: '$nome', alterada com sucesso";
			header("Location: /acount/admin/alterar-turma.php");
			mysql_close($conexao);
		}		
	}
	
	function excluirTurma(){
		$idTurma = @$_GET['idTurma'];

		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "DELETE FROM `turma` 
				  WHERE `idTurma` = '$idTurma'";
				  
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				$GLOBALS['msg'] = "Ocorreu um erro durante a exclusão";
				header("Location: /acount/admin/excluir-turma.php");
				mysql_close($conexao);
			}
			else{
				$GLOBALS['msg'] = "Ocorreu um erro inexperado durante a exclusão";
				header("Location: /acount/admin/excluir-turma.php");
				mysql_close($conexao);
			}			
		}else{
			$GLOBALS['msg'] = "Turma excluída com sucesso";
			header("Location: /acount/admin/excluir-turma.php");
			mysql_close($conexao);
		}	
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
	
	function excluirLab(){
		$idLab = @$_GET['idLab'];

		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `idLaboratorio` 
			      FROM `turma`
				  WHERE `idLaboratorio` = '$idLab'";
				  
		$resultadoPesquisa = mysql_query($query, $conexao);
		
		if(mysql_num_rows($resultadoPesquisa) >= 1){
			$GLOBALS['msg'] = "Laboratório não pode ser excluído pois está sendo usado";
			header("Location: /acount/admin/excluir-laboratorio.php");
		}
		else{
			$query = "DELETE FROM `laboratorio`
					  WHERE `idLaboratorio` = '$idLab'";
					  
			$resultado = mysql_query($query, $conexao);
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msg'] = "Ocorreu um erro durante a exclusão";
					header("Location: /acount/admin/excluir-laboratorio.php");
					mysql_close($conexao);
				}
				else{
					$GLOBALS['msg'] = "Ocorreu um erro inexperado durante a exclusão";
					header("Location: /acount/admin/excluir-laboratorio.php");
					mysql_close($conexao);
				}			
			}else{
				$GLOBALS['msg'] = "Laboratorio excluído com sucesso";
				header("Location: /acount/admin/excluir-laboratorio.php");
				mysql_close($conexao);
			}
		}	
	}
	
	function cadastrarHab(){
		$nomeHab = @$_POST['habilidade-nome'];
		$nomeHab = utf8_decode($nomeHab);
		
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `nomeHab`
				  FROM `hablidade`
				  WHERE `nomeHab` = '$nomeHab'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		
		if(mysql_num_rows($resultadoPesquisa) == 1){			
			$GLOBALS['msg'] = "Habilidade já cadastrada";
			mysql_close($conexao);
		}
		else{
			$query = "INSERT INTO `hablidade`(`nomeHab`) 
					  VALUES ('$nomeHab')";
					  
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
	
	function vincularHab(){
		$GLOBALS['msg'] = "";
		$idProfessor = @$_POST['vincular-habilidade-prof'];
		$idHabilidades = @$_POST['vincular-habilidade-habil'];
		
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		for($cont = 0; $cont < count($idHabilidades); $cont++){	
			$query = "SELECT hablidade.`nomeHab`
					  FROM `habilidade_professor`
					  JOIN hablidade ON hablidade.`idHabilidade` = habilidade_professor.`idHabilidade`
					  WHERE habilidade_professor.`idHabilidade` = '$idHabilidades[$cont]'
                      AND `idProfessor`= '$idProfessor'";
			
			$resultadoPesquisa = mysql_query($query, $conexao);
			
			if(mysql_num_rows($resultadoPesquisa) == 1){
				$habilidade[$cont] = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				$habilidade[$cont]['nomeHab'] = utf8_encode($habilidade[$cont]['nomeHab']);				
				$GLOBALS['msg'] .= "Habilidade: {$habilidade[$cont]['nomeHab']} já vinculada a este professor<br>";
			}			
			else{
				$query = "SELECT `nomeHab`
						  FROM `hablidade`
						  WHERE `idHabilidade` = '$idHabilidades[$cont]'";
						  
				$resultado = mysql_query($query, $conexao);
				$habilidade = mysql_fetch_array($resultado, MYSQL_ASSOC);
				$habilidade['nomeHab'] = utf8_encode($habilidade['nomeHab']);
				
				$query = "INSERT INTO `habilidade_professor`(`idHabilidade`, `idProfessor`)
						  VALUES ('$idHabilidades[$cont]', '$idProfessor')";
						  
				$resultado = mysql_query($query, $conexao);
															
				if(mysql_affected_rows($conexao) != 1){
					if(mysql_errno() >= 1){
						
						$GLOBALS['msg'] .= "Ocorreu um erro durante a vincuação da habilidade {$habilidade[$cont]['nomeHab']}<br>";
					}
					else{
						$GLOBALS['msg'] .= "Ocorreu um erro inexperado durante a vinculação habilidade {$habilidade[$cont]['nomeHab']}<br>";
					}			
				}else{
					$GLOBALS['msg'] .= "Habilidade: {$habilidade['nomeHab']} vinculada com sucesso.<br>";
				}
			}			
		}	
		mysql_close($conexao);
	}
	
	function cadastrarModulo(){
		$nome = @$_POST['admin-nome-mod'];
		$descricao = @$_POST['admin-descricao-mod'];
		$habilidades = @$_POST['admin-habil-mod'];
		$nome = utf8_decode($nome);
		
		//Conecção ao Banco de Dados
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `idModulo`, `nome`, `descr` 
				  FROM `modulo` 
				  WHERE `nome` = '$nome'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		if (mysql_num_rows($resultadoPesquisa) == 1) {
			$GLOBALS['msgMod'] = "Módulo já cadastrado";
		}else{
			$descricao = utf8_decode($descricao);
			
			$query = "INSERT INTO `modulo`(`nome`, `descr`) 
					  VALUES ('$nome', '$descricao')";
			
			$resultado = mysql_query($query, $conexao);
			
			$query = "SELECT `idModulo` 
					  FROM `modulo`
				 	  WHERE `nome` = '$nome'";
			$resultadoPesquisa = mysql_query($query, $conexao);
			$modulo = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
			
			for($cont = 0; $cont < count($habilidades); $cont++){
				
				$query = "INSERT INTO `habilidade_modulo`(`idHabilidade`, `idModulo`) 
					  	  VALUES('$habilidades[$cont]', '{$modulo['idModulo']}')";
			
				$resultado = mysql_query($query, $conexao);
			}
						  
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msgMod'] = "Ocorreu um erro durante a inclusão";
				}
				else{
					$GLOBALS['msgMod'] = "Ocorreu um erro inesperado durante a inclusão";
				}
			}else{
				$GLOBALS['msgMod'] = "Módulo cadastrado com sucesso";
			}
		}
		mysql_close($conexao);
	}
	
	function excluirModulo(){
		$idModulo = @$_GET['idModulo'];

		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "DELETE FROM `modulo` 
				  WHERE `idModulo` = '$idModulo'";
				  
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				$GLOBALS['msg'] = "Ocorreu um erro durante a exclusão";
				header("Location: /acount/admin/excluir-modulo.php");
				mysql_close($conexao);
			}
			else{
				$GLOBALS['msg'] = "Ocorreu um erro inexperado durante a exclusão";
				header("Location: /acount/admin/excluir-modulo.php");
				mysql_close($conexao);
			}			
		}else{
			$GLOBALS['msg'] = "Módulo excluído com sucesso";
			header("Location: /acount/admin/excluir-modulo.php");
			mysql_close($conexao);
		}	
	}
	
	function vincularProfModulo(){
		$idModulo = @$_POST['vincular-prof-modulo'];
		$idProf = @$_POST['vincular-prof-prof'];
				
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `idModulo`, `idProfessor` 
				  FROM `modulo_professor` 
				  WHERE `idModulo` = '$idModulo'
				  AND `idProfessor` = '$idProf'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		
		if(mysql_num_rows($resultadoPesquisa) == 1){		
			$GLOBALS['msg'] = "Professor já vinculado a este módulo";			
		}
		else{			
			$query = "INSERT INTO `modulo_professor`(`idModulo`, `idProfessor`) 
					  VALUES ('$idModulo', '$idProf')";
					  
			$resultado = mysql_query($query, $conexao);
			
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msg'] = "Ocorreu um erro durante a vinculação";	
					$GLOBALS['rsl'] = "err";			
					mysql_close($conexao);
				}
				else{
					$GLOBALS['msg'] = "Ocorreu um erro inesperado durante a vinculação";
					$GLOBALS['rsl'] = "err";
					mysql_close($conexao);
				}			
			}else{
				$GLOBALS['msg'] = "Professor vinculado ao módulo com sucesso";
				$GLOBALS['rsl'] = "sucess";
				mysql_close($conexao);
			}
		}
	}
	
	function cadastrarFuncionario(){
		$cargo = @$_POST['cadastrar-func-cargo'];
		$nome = @$_POST['cadastrar-func-nome'];
		$cpf = @$_POST['cadastrar-func-cpf'];		
		$senha = "!admin2015";
		
		$nome = ucwords(strtolower($nome));
		$nome_email = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) );
		
		$nome_dividido = @explode(" ", $nome_email);
		$primeiro_nome = @$nome_dividido[0];
		$sobre_nome = @substr($nome_dividido[1], 0, 1);
		$tamanho_nome = @count($nome_dividido);
		$ultimo_nome = @$nome_dividido[($tamanho_nome-1)];
		
		$email = strtolower($primeiro_nome.".".$ultimo_nome."@admin.com");
		
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `cpf` 
				  FROM `administracao` 
				  WHERE `cpf` = '$cpf'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		$msg = "";
		if (mysql_num_rows($resultadoPesquisa) == 1) {
			$GLOBALS['msg'] = "Funcionário já cadastrado";
		}else{
			$query = "SELECT `idAdm`, `nomeFuncionario`, `email`, `senha`, `cpf`, `cargo`
					  FROM `administracao` 
					  WHERE `email` = '$email'";
		
			$resultadoPesquisa = mysql_query($query, $conexao);
			if (mysql_num_rows($resultadoPesquisa) == 1){
				$email = strtolower($primeiro_nome.".".$sobre_nome.$ultimo_nome."@admin.com");
			}
			$query = "INSERT INTO `administracao`(`nomeFuncionario`, `email`, `senha`, `cpf`, `cargo`)
					  VALUES ('$nome', '$email', '$senha', '$cpf', '$cargo');";
			$resultado = mysql_query($query, $conexao);
			if(mysql_affected_rows($conexao) != 1){
				if(mysql_errno() >= 1){
					$GLOBALS['msg'] = "Ocorreu um erro durante a inclusão";
				}
				else{
					$GLOBALS['msg'] = "Ocorreu um erro inesperado durante a inclusão";
				}
			}else{
				$GLOBALS['msg'] = "Cadastro concluído com sucesso";
			}
		}
		mysql_close($conexao);
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
					alterarTurma();
				break;
				case "exclui":
					excluirTurma();
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
				case "altera":
					
				break;
				case "exclui":
					excluirLab();
				break;
				default:
					header("Location: /acount/admin/");
			}
		break;
		case "habilidade":
			$acao = @$_GET['acao'];
			switch($acao){
				case "cadastra":
					cadastrarHab();
				break;
				case "vincula":
					vincularHab();
				break;
				default:
					header("Location: /acount/admin/");
			}
		break;
		case "modulo":
			$acao = @$_GET['acao'];
			switch($acao){
				case "cadastra":
					cadastrarModulo();
				break;
				case "vincula":
					vincularProfModulo();
				break;
				case "exclui":
					excluirModulo();
				break;
				default:
					header("Location: /acount/admin/");
			}
		break;
		case "funcionario":
			$acao = @$_GET['acao'];
			switch($acao){
				case "cadastra":
					cadastrarFuncionario();
				break;
				default:
					header("Location: /acount/admin/");
			}
		break;
		case "":
			//para abrir a página
		break;
		default:
			header("Location: /acount/admin/");
		break;
	}
?>