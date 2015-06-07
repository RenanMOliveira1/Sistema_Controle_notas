<?
	session_start();
	$matricula = @$_GET['matricula'];
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
	define("TITULO","Liberar Acesso de Aluno");
	switch($_SESSION['admCargo']){
		case "ass":
		case "dir":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
	}
	
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "UPDATE `aluno` 
			  SET `acesso` = 1 
			  WHERE `matricula` = '$matricula'";
	
	$resultado = mysql_query($query, $conexao);
				if(mysql_affected_rows($conexao) != 1){
					if(mysql_errno() >= 1){
						header("Location: /acount/admin/liberar-acesso.php?msg=Ocorreu um erro durante a alteração");
					}
					else{
						header("Location: /acount/admin/liberar-acesso.php?msg=Ocorreu um erro inesperado durante a alteração");
					}
				}else{
					header("Location: /acount/admin/liberar-acesso.php?msg=Acesso liberado com sucesso");
				}
	
	mysql_close($conexao);
	
	
	
?>