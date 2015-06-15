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
		
		$conexao = @mysql_connect("localhost", "root", "");
		if (!$conexao) {
			exit("Site Temporariamente fora do ar");
		}
		
		mysql_select_db("infnetgrid", $conexao);
		
		$query = "SELECT `cpf` 
				  FROM `professor` 
				  WHERE `cpf` = '$cpf'";
		
		$resultadoPesquisa = mysql_query($query, $conexao);
		if (mysql_num_rows($resultadoPesquisa) == 1) {
			$GLOBALS['msg'] = "Professor já cadastrado";
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
				$senhaAntiga = @$_POST['prof-alt-senha-antiga'];
				$senhaNova = @$_POST['prof-alt-senha-nova'];
				
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
							header("Location: /acount/adminprof/configuracoes.php?tp=senha&rsl=err&msgSenha=Ocorreu um erro durante a alteração");
						}
						else{
							header("Location: /acount/adminprof/configuracoes.php?tp=senha&rsl=err&msgSenha=Ocorreu um erro inesperado durante a alteração");
						}
					}else{
						header("Location: /acount/adminprof/configuracoes.php?tp=senha&rsl=sucess&msgSenha=senha modificada com sucesso");
						$_SESSION['profSenha'] = $senhaNova;
					}
					mysql_close($conexao);				
				}else{
					header("Location: /acount/adminprof/configuracoes.php?tp=senha&rsl=err&msgSenha=Senha atual não confere.");
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
						header("Location: /acount/adminprof/configuracoes.php?tp=dados&rsl=err&msgDados=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/adminprof/configuracoes.php?tp=dados&rsl=err&msgDados=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/adminprof/configuracoes.php?tp=dados&rsl=sucess&msgDados=Dados modificados com sucesso");
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
		
	}		
	
	switch($acao){
		case "cadastro":
			cadastrar();
		break;
		case "alteracao":
			$tipo = @$_GET['tipo'];
			alterar($tipo);
		break;
		case "vinculacao":
			vincular();
		break;
		default:
			header("Location:/");
		break;
	}
?>