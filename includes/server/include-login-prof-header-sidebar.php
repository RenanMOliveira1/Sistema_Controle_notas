<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="adminLogo" href="/"><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="150" hegth="30" /></a>
				<ul class="user-menu">
					<li><a href="/acount/adminprof/configuracoes.php" title="Configurações do Usuário" ><span class="glyphicon glyphicon-user"></span> <?= utf8_encode($_SESSION['profNome'])?></span></a></li>
						<li><a id="log-out-prof" href="/acount/logout.php" title="Sair da Conta" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div> <!-- navbar-header -->
		</div> <!-- container-fluid -->
	</nav> <!-- navbar-fixed-top -->
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Pesquisar">
			</div> <!-- search -->
		</form>
		<ul class="nav menu">
			<li id="navModulosProf" class=""><a href="/acount/adminprof/index.php" title="Visualizar Módulo" ><span class="glyphicon glyphicon-tasks"></span> Módulos</a></li>
			<li id="navLancarNotas" class=""><a href="/acount/adminprof/notas.php" title="Aplicar Nota aos Alunos" ><span class="glyphicon glyphicon-th"></span> Aplicar Notas</a></li>
            <li id="navAvaliacaoProf" class=""><a href="/acount/adminprof/avaliacao-institucional.php" title="Visualizar Avaliações Institucionais" ><span class="glyphicon glyphicon-th"></span> Avaliação Institucional</a></li>
			<li id="navConfiguracoesProf" class=""><a href="/acount/adminprof/configuracoes.php" title="Configurações do Usuário" ><span class="glyphicon glyphicon-wrench"></span> Configurações</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="/" title="Página Inicial do Site SGA" ><span class="glyphicon glyphicon-home"></span> Página Inicial</a></li>
            <li><a href="/sobre.php" title="Sobre o SGA" ><span class="glyphicon glyphicon-credit-card"></span> Sobre</a></li>
            <li><a href="/contato.php" title="Entre em Contato Conosco" ><span class="glyphicon glyphicon-earphone"></span> Contato</a></li>
		</ul>
		
	</div> <!-- sidebar -->