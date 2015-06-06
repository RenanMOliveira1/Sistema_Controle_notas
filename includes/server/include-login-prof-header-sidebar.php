<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					ass="icon-bar"></span>
				</button><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span cl
				<a class="adminLogo" href="/"><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="150" hegth="30" ></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['profNome']?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/acount/adminprof/configuracoes.php"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
							<li><a href="/acount/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Pesquisar">
			</div>
		</form>
		<ul class="nav menu">
			<li id="navModulosProf" class=""><a href="/acount/adminprof/index.php"><span class="glyphicon glyphicon-dashboard"></span> Módulos</a></li>
			<li id="navLancarNotas" class=""><a href="/acount/adminprof/notas.php"><span class="glyphicon glyphicon-th"></span> Notas</a></li>
			<li id="navConfiguracoesProf" class=""><a href="/acount/adminprof/configuracoes.php"><span class="glyphicon glyphicon-pencil"></span> Configurações</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="/index.php"><span class="glyphicon glyphicon-user"></span> Página Inicial</a></li>
            <li><a href="/sobre.php"><span class="glyphicon glyphicon-user"></span> Sobre</a></li>
            <li><a href="/contato.php"><span class="glyphicon glyphicon-user"></span> Contato</a></li>
		</ul>
		
	</div><!--/.sidebar-->