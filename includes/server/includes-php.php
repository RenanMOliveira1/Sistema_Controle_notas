<?
	function usuarioLogado() {
		switch ($_SESSION['autenticacao']) {
			case 'aluno':
				echo "<div class='usuario-logado'>
						 <a href='/acount/adminal/'>" . $_SESSION['alNome'] . "</a>
						  - <a href='/acount/logout.php'>Sair</a>
					  </div>";
			break;
			case 'professor':
				echo "<div class='usuario-logado'>
						 <a href='/acount/adminal/'>" . $_SESSION['profNome'] . "</a>
						  - <a href='/acount/logout.php'>Sair</a>
					  </div>";
			break;
			case 'administracao':
				echo "<div class='usuario-logado'>
						 <a href='/acount/admin/'>" . $_SESSION['admNome'] . "</a>
						  - <a href='/acount/logout.php'>Sair</a>
					  </div>";
			break;
		}
	}
	
	function usuarioNaoLogado() {
		echo "<div id='nav-botao' class='btn-group'>
				<button type=\"button btn-primary\" title=\"Entre na sua conta\" onclick=\"location.href='/acount/'\" class=\"btn btn-default\">Login</button>
			    <button type=\"button\" title=\"Clique aqui e se cadastre\" onclick=\"location.href='/cadastrar.php'\" class=\"btn btn-default\">Cadastrar</button>
			  </div> <!-- nav-botao -->";
	}
?>