<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="adminLogo" href="index.html"><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="150" hegth="30" ></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
			<li class="active"><a href="/acount/admin/index.php"><span class="glyphicon glyphicon-dashboard"></span> Criar Programa</a></li>
            <li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Cadastrar <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="/acount/admin/cadastrar-professor.php"><span class="glyphicon glyphicon-share-alt"></span> Professores</a></li>
					<li><a class="" href="/acount/admin/criar-modulo.php"><span class="glyphicon glyphicon-share-alt"></span> Módulos</a></li>
                    <li><a class="" href="/acount/admin/"><span class="glyphicon glyphicon-share-alt"></span> Laboratório</a></li>
                    <li><a class="" href="/acount/admin/"><span class="glyphicon glyphicon-share-alt"></span> Turno de Aula</a></li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Vincular <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="#"><span class="glyphicon glyphicon-share-alt"></span> Alunos</a></li>
					<li><a class="" href="/acount/admin/vincular-professor.php"><span class="glyphicon glyphicon-share-alt"></span> Professores</a></li>
				</ul>
			</li>
			<li><a href="/acount/admin/configuracoes.php"><span class="glyphicon glyphicon-pencil"></span> Configurações</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="/index.php"><span class="glyphicon glyphicon-user"></span> Página Inicial</a></li>
            <li><a href="/sobre.php"><span class="glyphicon glyphicon-user"></span> Sobre</a></li>
            <li><a href="/contato.php"><span class="glyphicon glyphicon-user"></span> Contato</a></li>
		</ul>
		
	</div><!--/.sidebar-->