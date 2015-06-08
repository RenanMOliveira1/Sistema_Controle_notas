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
	define("TITULO","Vincular Módulo à Programa");
	switch($_SESSION['admCargo']){
		case "dir":
		case "ped":
		case "rca":
			header("Location: /acount/admin/?msg=Você não possui permissão para acessar esta página.");
		break;
	}
	
	$idModulo = @$_POST['vincular-mod-modulo'];
	$idPrograma = @$_POST['vincular-mod-programa'];
	
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");
	}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `idPrograma`, `idModulo`
			  FROM `programa_modulo`
			  WHERE `idPrograma` = '$idPrograma'
			  AND `idModulo` = '$idModulo'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		header("Location: /acount/admin/vincular-modulo.php?msg=Módulo já vinculado a este programa");
	}else{
		$query = "INSERT INTO `programa_modulo`(`idPrograma`, `idModulo`)
				  VALUES ('$idPrograma','$idModulo')";
		$resultado = mysql_query($query, $conexao);
		if(mysql_affected_rows($conexao) != 1){
			if(mysql_errno() >= 1){
				header("Location: /acount/admin/vincular-modulo.php?msg=Ocorreu um erro durante a vinculação");
			}
			else{
				header("Location: /acount/admin/vincular-modulo.php?msg=Ocorreu um erro inesperado durante a vinculação");
			}
		}else{
			header("Location: /acount/admin/vincular-modulo.php?msg=Módulo vinculado ao programa com sucesso");
		}
	}
	mysql_close($conexao);
	
?>