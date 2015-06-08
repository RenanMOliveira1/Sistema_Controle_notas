<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?
	$nome = @$_POST['admin-nome-mod'];
	$descricao = @$_POST['admin-descricao-mod'];
	
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
	define("TITULO","Criar Módulo");
	switch($_SESSION['admCargo']){
		case "dir":
		case "rca":
		case "ped":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	
	//Conecção ao Banco de Dados
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");
	}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `idModulo`, `nome`, `descr` FROM `modulo` 
			  WHERE `nome` = '$nome'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		header("Location: /acount/admin/criar-modulo.php?msg=Modulo já cadastrado");
	}else{
		$nome = utf8_decode($nome);
		$descricao = utf8_decode($descricao);
		
		$query = "INSERT INTO `modulo`(`nome`, `descr`) 
				  VALUES ('$nome', '$descricao')";
		
		$resultado = mysql_query($query, $conexao);
					  
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				header("Location: /acount/admin/criar-modulo.php?msg=?Ocorreu um erro durante a inclusão");
			}
			else{
				header("Location: /acount/admin/criar-modulo.php?msg=Ocorreu um erro inesperado durante a inclusão");
			}
		}else{
			header("Location: /acount/admin/criar-modulo.php?msg=Módulo cadastrado com sucesso");
		}
	}
	mysql_close($conexao);
?>
</body>
</html>
