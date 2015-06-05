<?	
	session_start();
	$acao = $_GET['acao'];
			
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
	


?>