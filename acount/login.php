<?
	$usuario = @$_POST['usuario'];
	$senha = @$_POST['login-senha'];
	$autentificacao = @$_POST['autentificacao'];
	
	//Conecção ao Banco de Dados
	$conexao = mysql_connect("localhost", "root", "14789632");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("sga", $conexao);
	
	$query = "SELECT `USU_CODID`, `USU_NOME`, `USU_SENHA`, `USU_EMAIL` 
			    FROM `USUARIOS`
				WHERE USU_EMAIL = '$usuario'
				  AND USU_SENHA = '$senha'";
	
	$resultadoPesquisa = mysql_query($query, $conexao);
	$msg = "";
	if (mysql_num_rows($resultadoPesquisa) == 1) {
		switch ($autentificacao) {
			case 'al':
				header("Location: /acount/adminal/");
				break;
			case 'prof':
				header("Location: /acount/adminprof/");
				break;
			case 'admin':
				header("Location: /acount/admin/");
		}
	} else {
		$dadosInvalidos = " has-error";
		$msg = "Usuario ou Senha Invalidos";
		header("Location: /acount/?dadosInvalidos=$dadosInvalidos&msg=$msg");}
	
	mysql_close($conexao);
?>