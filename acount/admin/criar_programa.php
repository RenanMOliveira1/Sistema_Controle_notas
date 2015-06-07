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
	
	$tipo = @$_POST['programa-tipo'];
	$nome = @$_POST['nome-curso'];
	$sigla = @$_POST['sigla-curso'];
	
	//Conecção ao Banco de Dados
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");
	}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `idPrograma`, `tipo`, `nomeCurso`, `sigla` 
			  FROM `programa`
			  WHERE `nomeCurso` = '$nome'
			  AND `tipo` = '$tipo'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		header("Location: /acount/admin/?msg=Já existe curso com este nome");
	}else{
		$query = "INSERT INTO `programa`(`tipo`, `nomeCurso`, `sigla`) 
				   VALUES ('$tipo','$nome','$sigla')";
		
		$resultado = mysql_query($query, $conexao);
						  
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				header("Location: /acount/admin/?msg=Ocorreu um erro durante a inclusão");
			}
			else{
				header("Location: /acount/admin/?msg=Ocorreu um erro inesperado durante a inclusão");
			}
		}else{
			header("Location: /acount/admin/?msg=Programa criado com sucesso");
		}
	}
	mysql_close($conexao);
?>