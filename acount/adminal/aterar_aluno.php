<?	
	session_start();
	$acao = $_GET['acao'];
	echo $acao;
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
	$email = @$_POST['email'];
	$senha = @$_POST['senha'];
	


	
	switch($acao){
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
				}
				mysql_close($conexao);				
			}else{
				header("Location: /acount/adminal/configuracoes.php?msgEmail=Email atual não confere.");
			}
		break;
	}
	


?>