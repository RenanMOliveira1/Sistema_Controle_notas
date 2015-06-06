<?
	session_start();
	$usuario = @$_POST['usuario'];
	$senha = @$_POST['login-senha'];
	$autenticacao = @$_POST['autenticacao'];
	
	switch ($autenticacao) {
		case 'aluno':
			$conexao = mysql_connect("localhost", "root", "");
			if (!$conexao) {
				exit("Site Temporariamente fora do ar");}
			
			mysql_select_db("infnetgrid", $conexao);
			
			$query = "SELECT `matricula`, `nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`, `acesso`
					  FROM `$autenticacao` 
					  WHERE `email` = '$usuario'
					  AND `senha` = '$senha'";
			
			$resultadoPesquisa = mysql_query($query, $conexao);
			$msg = "";
			if (mysql_num_rows($resultadoPesquisa) == 1) {
				$aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				if($aluno['acesso'] == 1){
					$_SESSION['alMatricula'] = $aluno['matricula'];
					$_SESSION['alNome'] = $aluno['nomeAluno'];
					$_SESSION['alCpf'] = $aluno['cpf'];
					$_SESSION['alDataNascimento'] = $aluno['dataNascimento'];
					$_SESSION['alSexo'] = $aluno['sexo'];
					$_SESSION['alEmail'] = $aluno['email'];
					$_SESSION['alSenha'] = $aluno['senha'];
					$_SESSION['logado'] = true;
					$_SESSION['autenticacao'] = $autenticacao;
					
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
				}else{
					$msg = "Aguardando liberação de acesso";
					header("Location: /acount/?msg=$msg");
				}			
			}else {
				$dadosInvalidos = " has-error";
				$msg = "Usuario ou Senha Invalidos";
				header("Location: /acount/?dadosInvalidos=$dadosInvalidos&msg=$msg");
			}
			mysql_close($conexao);
		break;
		case 'professor':			
			$conexao = mysql_connect("localhost", "root", "");
			if (!$conexao) {
				exit("Site Temporariamente fora do ar");
			}			
			mysql_select_db("infnetgrid", $conexao);
			
			$query = "SELECT `idProfessor`, `nomeProfessor`, `email`, `senha`, `cpf`
					  FROM `$autenticacao` 
					  WHERE `email` = '$usuario'
					  AND `senha` = '$senha'";
			
			$resultadoPesquisa = mysql_query($query, $conexao);
			$msg = "";
			if (mysql_num_rows($resultadoPesquisa) == 1) {
				$prof = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				$_SESSION['profId'] = $prof['idProfessor'];
				$_SESSION['profNome'] = $prof['nomeProfessor'];	
				$_SESSION['profEmail'] = $prof['email'];	
				$_SESSION['profSenha'] = $prof['senha'];
				$_SESSION['profCpf'] = $prof['cpf'];	
				$_SESSION['logado'] = true;
				$_SESSION['autenticacao'] = $autenticacao;
				header("Location: /acount/adminprof/");
			}else {
				$dadosInvalidos = " has-error";
				$msg = "Usuario ou Senha Invalidos";
				header("Location: /acount/?dadosInvalidos=$dadosInvalidos&msg=$msg");
			}
			mysql_close($conexao);			
		break;
		case 'administracao':
			$conexao = mysql_connect("localhost", "root", "");
			if (!$conexao) {
				exit("Site Temporariamente fora do ar");
			}			
			mysql_select_db("infnetgrid", $conexao);
			
			$query = "SELECT `idAdm`, `nomeFuncionario`, `email`, `senha`, `cpf`, `cargo`
					  FROM `$autenticacao` 
					  WHERE `email` = '$usuario'
					  AND `senha` = '$senha'";
			
			$resultadoPesquisa = mysql_query($query, $conexao);
			$msg = "";
			if (mysql_num_rows($resultadoPesquisa) == 1) {
				$adm = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
				$_SESSION['admId'] = $adm['idAdm'];
				$_SESSION['admNome'] = $adm['nomeFuncionario'];	
				$_SESSION['admEmail'] = $adm['email'];	
				$_SESSION['admSenha'] = $adm['senha'];
				$_SESSION['admCpf'] = $adm['cpf'];	
				$_SESSION['admCargo'] = $adm['cargo'];	
				$_SESSION['logado'] = true;
				$_SESSION['autenticacao'] = $autenticacao;
				header("Location: /acount/admin/");
			}else {
				$dadosInvalidos = " has-error";
				$msg = "Usuario ou Senha Invalidos";
				header("Location: /acount/?dadosInvalidos=$dadosInvalidos&msg=$msg");
			}
			mysql_close($conexao);
		break;
	}	
?>