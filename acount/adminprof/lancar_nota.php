<?			
	session_start();
	$matricula = @$_GET['matricula'];
	if($matricula == ""){
		header("Location: /acount/adminprof/");
	}
	$av1 = @$_POST['nota-av1-{$matricula}'];
	$av2 = @$_POST['nota-av2-$matricula'];
	$av3 = @$_POST['nota-pf-$matricula'];
	$comentario = @$_POST['comentario'];	
	
	if($av1 == ""){
		$av1 = -1.00;
	}
	if($av2 == ""){
		$av2 = -1.00;
	}
	if($av3 == ""){
		$av3 = -1.00;
	}
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	define("TITULO","Visualizar Turma");
	switch($_SESSION['autenticacao']){
		case "administracao":
			header("Location: /acount/admin/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
	
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "UPDATE `turma_aluno` 
			  SET `av1`='$av1',`av2`='$av2',`av3`='$av3'
			  WHERE `alunoMatricula` = '$matricula'
			  AND `turmaID` = '{$_SESSION['notaTurmaId']}'";
	
	$resultado = mysql_query($query, $conexao);
	if(mysql_affected_rows($conexao) != 1){
		if(mysql_errno() >= 1){
			header("Location: /acount/adminprof/mostrar_turma.php?msgSenha=Ocorreu um erro durante a alteração");
		}else{
			header("Location: /acount/adminprof/mostrar_turma.php?msgSenha=Ocorreu um erro inesperado durante a alteração");
		}
	}else{
		header("Location: /acount/adminprof/mostrar_turma.php?msgSenha=Nota lançada com sucesso");		
	}
	mysql_close($conexao);
	?>