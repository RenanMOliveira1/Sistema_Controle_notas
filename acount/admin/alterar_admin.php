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
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}

	$acao = $_GET['acao'];
			
	switch($acao){
		case "senha":
			$senhaAntiga = @$_POST['adm-alterar-senha-antiga'];
			$senhaNova = @$_POST['adm-alterar-senha-nova'];
			
			if($_SESSION['admSenha'] == $senhaAntiga){
				//Conecção ao Banco de Dados
				$conexao = mysql_connect("localhost", "root", "");
				if (!$conexao) {
					exit("Site Temporariamente fora do ar");
				}
			
				mysql_select_db("infnetgrid", $conexao);
				$query = "UPDATE `administracao` 
						  SET `senha`= '$senhaNova'
						  WHERE `idAdm` = '{$_SESSION['admId']}'";
			
				$resultado = mysql_query($query, $conexao);
				$msgSenha = "";
				if(mysql_affected_rows($conexao) != 1){
					if(mysql_errno() >= 1){
						header("Location: /acount/admin/configuracoes.php?msgSenha=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/admin/configuracoes.php?msgSenha=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/admin/configuracoes.php?msgSenha=senha modificada com sucesso");
					$_SESSION['admSenha'] = $senhaNova;
				}
				mysql_close($conexao);				
			}else{
				header("Location: /acount/admin/configuracoes.php?msgSenha=Senha atual não confere.");
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
				$query = "UPDATE `administracao` 
						  SET `email` = '$emailNovo'
						  WHERE `idAdm` = '{$_SESSION['admId']}'";
			
				$resultado = mysql_query($query, $conexao);
				$msgEmail = "";
				if(mysql_affected_rows($conexao) != 1){
					if(mysql_errno() >= 1){
						header("Location: /acount/admin/configuracoes.php?msgEmail=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/admin/configuracoes.php?msgEmail=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/admin/configuracoes.php?msgEmail=email modificado com sucesso");
					$_SESSION['admEmail'] = $emailNovo;
				}
				mysql_close($conexao);				
			}else{
				header("Location: /acount/admin/configuracoes.php?msgEmail=Email atual não confere.");
			}
		break;
		
		case "dados":
			$nome = @$_POST['alt-adm-nome'];
			$cpf = @$_POST['alt-adm-cpf'];
			$cargo = @$_POST['alt-adm-cargo'];
			
			//Conecção ao Banco de Dados
			$conexao = mysql_connect("localhost", "root", "");
			if (!$conexao) {
				exit("Site Temporariamente fora do ar");
			}
		
			mysql_select_db("infnetgrid", $conexao);
			
			$query = "UPDATE `administracao` 
					  SET `nomeFuncionario` = '$nome',`cpf` = '$cpf'
					  WHERE `idAdm` = '{$_SESSION['admId']}'";
		
			$resultado = mysql_query($query, $conexao);
			
			$msgDados = "";
			if(mysql_affected_rows($conexao) < 0){
				if(mysql_errno() >= 1){
					header("Location: /acount/admin/configuracoes.php?msgDados=Ocorreu um erro durante a alteração");
				}
				else{
					header("Location: /acount/admin/configuracoes.php?msgDados=Ocorreu um erro inesperado durante a alteração");
				}
			}else{
				header("Location: /acount/admin/configuracoes.php?msgDados=Dados modificados com sucesso");
				$_SESSION['admNome'] = $nome;
				$_SESSION['admCpf'] = $cpf;		
			}
			mysql_close($conexao);	
		break;
	}
	


?>