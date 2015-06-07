<?
	$matricula = @$_POST['vincular-aluno-nomeAl'];	
	$idTurma = @$_POST['vincular-aluno-turma'];

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
	define("TITULO","Vincular Alunos à Turma");
	
	switch($_SESSION['admCargo']){
		case "dir":
		case "ass":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");
	}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `alunoMatricula`, `turmaID` 
			  FROM `turma_aluno` 
			  WHERE `alunoMatricula` = '$matricula'
			  AND `turmaID` = '$idTurma'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		header("Location: /acount/admin/vincular-alunos.php?msg=Aluno já vinculado a esta turma");
	}else{
		$query = "INSERT INTO `turma_aluno`(`alunoMatricula`, `turmaID`)
				  VALUES ('$matricula','$idTurma')";
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				header("Location: /acount/admin/vincular-alunos.php?msg=Ocorreu um erro durante a vinculação");
			}
			else{
				header("Location: /acount/admin/vincular-alunos.php?msg=Ocorreu um erro inesperado durante a vinculação");
			}
		}else{
			header("Location: /acount/admin/vincular-alunos.php?msg=Aluno vinculado a turma com sucesso");
		}
	}
	mysql_close($conexao);
	
?>