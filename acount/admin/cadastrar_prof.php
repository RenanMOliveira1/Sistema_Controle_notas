<?
	$nome = @$_POST['admin-prof-nome'];
	$cpf = @$_POST['admin-prof-cpf'];
	$email = @$_POST['admin-prof-email'];
	$senha = @$_POST['admin-prof-senha'];
	
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
	define("TITULO","Cadastrar Professores");
		switch($_SESSION['admCargo']){
		case "dir":
		case "rca":
		case "ass":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");
	}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `idProfessor`, `nomeProfessor`, `email`, `senha`, `cpf` 
			  FROM `professor` 
			  WHERE `email` = '$email'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		header("Location: /acount/admin/cadastrar-professor.php?msg=Email já cadastrado");
	}else{
		$query = "INSERT INTO `professor`(`nomeProfessor`, `email`, `senha`, `cpf`)
		 		  VALUES ('$nome', '$email', '$senha', '$cpf');";
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				header("Location: /acount/admin/cadastrar-professor.php?msg=Ocorreu um erro durante a inclusão");
			}
			else{
				header("Location: /acount/admin/cadastrar-professor.php?msg=Ocorreu um erro inesperado durante a inclusão");
			}
		}else{
			header("Location: /acount/admin/cadastrar-professor.php?msg=Cadastro concluído com sucesso");
		}
	}
	mysql_close($conexao);
?>