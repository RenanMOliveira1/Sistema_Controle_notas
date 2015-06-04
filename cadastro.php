<?
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
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		header("Location: /");
	}else{
		$query1 = "INSERT INTO `aluno`(`nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`)
		 		  VALUES ('$nome', '$cpf', '$dataNascimento','$sexo','$email','$senha');";
				  
				  /*SET @alunoMat = LAST_INSERT_ID();
				  
				  INSERT INTO `endereco`(`Cep`, `tipoLogradouro`, `numero`, `logradouro`, `complemento`, `bairro`, `cidade`, `estado`, `alunoMatricula`) 
				  VALUES ('$cep','$tipoLogradouro',$numero,'$logradouro','$complemento','$bairro','$cidade','$estado', @alunoMat);
				  
				  INSERT INTO `telefone` (`telefone`, `celular`, `alunoMatricula`)
				  VALUES ('$telefone', '$celular', @alunoMat);";*/
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
				  
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				$GLOBALS['msgErro']="Ocorreu um erro durante a inclusão";
				header("Location: /cadastrar.php?erro1");
			}
			else{
				$GLOBALS['msgErro']="Ocorreu um erro inesperado durante a inclusão";
				header("Location: /cadastrar.php?erro2");
			}
		}else{
			header("Location: /acount/");
		}
	}
	mysql_close($conexao);
?>