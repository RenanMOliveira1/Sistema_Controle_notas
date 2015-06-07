<?	
	session_start();
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	switch($_SESSION['autenticacao']){
		case "aluno":
			header("Location: /acount/adminal/");
		break;
		case "administracao":
			header("Location: /acount/admin/");
		break;
	}

	$acao = $_GET['acao'];
			
	switch($acao){
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
		
		case "email":
			$emailAntigo = @$_POST['alt-email-atual'];
			$emailNovo = @$_POST['alt-email-novo'];
			
			if($_SESSION['profEmail'] == $emailAntigo){
				//Conecção ao Banco de Dados
				$conexao = mysql_connect("localhost", "root", "");
				if (!$conexao) {
					exit("Site Temporariamente fora do ar");
				}
			
				mysql_select_db("infnetgrid", $conexao);
				$query = "UPDATE `professor` 
						  SET `email` = '$emailNovo'
						  WHERE `idProfessor` = '{$_SESSION['profId']}'";
			
				$resultado = mysql_query($query, $conexao);
				$msgEmail = "";
				if(mysql_affected_rows($conexao) != 1){
					if(mysql_errno() >= 1){
						header("Location: /acount/adminprof/configuracoes.php?msgEmail=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/adminprof/configuracoes.php?msgEmail=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/adminprof/configuracoes.php?msgEmail=email modificado com sucesso");
					$_SESSION['profEmail'] = $emailNovo;
				}
				mysql_close($conexao);				
			}else{
				header("Location: /acount/adminprof/configuracoes.php?msgEmail=Email atual não confere.");
			}
		break;
		
		case "dados":
			$nome = @$_POST['alt-prof-nome'];
			$cpf = @$_POST['alt-prof-cpf'];
			
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
	


?>