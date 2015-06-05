<?
	session_start();
	$usuario = @$_POST['usuario'];
	$senha = @$_POST['login-senha'];
	$autentificacao = @$_POST['autentificacao'];
	
	//Conecção ao Banco de Dados
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `matricula`, `nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`, `acesso`
			  FROM `$autentificacao` 
			  WHERE `email` = '$usuario'
			  AND `senha` = '$senha'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		switch ($autentificacao) {
			case 'aluno':
				$aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				$_SESSION['alMatricula'] = $aluno['matricula'];
				$_SESSION['alNome'] = $aluno['nomeAluno'];
				$_SESSION['alCpf'] = $aluno['cpf'];
				$_SESSION['alDataNascimento'] = $aluno['dataNascimento'];
				$_SESSION['alSexo'] = $aluno['sexo'];
				$_SESSION['alEmail'] = $aluno['email'];
				$_SESSION['alSenha'] = $aluno['senha'];
				
				$query = "SELECT `Cep`, `tipoLogradouro`, `numero`, `logradouro`, `complemento`, `bairro`, `cidade`, `estado`
			 			  FROM `endereco` 
			  			  WHERE `alunoMatricula` = '{$_SESSION['alMatricula']}'";
						  
				$resultadoPesquisa = mysql_query($query, $conexao);
				$endereco = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				if (mysql_num_rows($resultadoPesquisa) == 1) {
					$_SESSION['alCep'] = $endereco['Cep'];
					$_SESSION['alTipoLogradouro'] = $endereco['tipoLogradouro'];
					$_SESSION['alNumero'] = $endereco['numero'];
					$_SESSION['alLogradouro'] = $endereco['logradouro'];
					$_SESSION['alComplemento'] = $endereco['complemento'];
					$_SESSION['alBairro'] = $endereco['bairro'];
					$_SESSION['alCidade'] = $endereco['cidade'];
					$_SESSION['alEstado'] = $endereco['estado'];
				}
				$query = "SELECT `telefone`, `celular`
			 			  FROM `telefone`
			  			  WHERE `alunoMatricula` = '{$_SESSION['alMatricula']}'";
						  
				$resultadoPesquisa = mysql_query($query, $conexao);
				$telefone = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				if (mysql_num_rows($resultadoPesquisa) == 1) {
					$_SESSION['alTelefone'] = $telefone['telefone'];
					$_SESSION['alCelular'] = $telefone['celular'];
				}
				header("Location: /acount/adminal/");
				break;
			case 'professor':
				header("Location: /acount/adminprof/");
				break;
			case 'administracao':
				header("Location: /acount/admin/");
				break;
		}
	} else {
		$dadosInvalidos = " has-error";
		$msg = "Usuario ou Senha Invalidos";
		header("Location: /acount/?dadosInvalidos=$dadosInvalidos&msg=$msg");}
	
	mysql_close($conexao);
?>