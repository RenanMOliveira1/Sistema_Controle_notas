	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="adminLogo" href="/"><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="150" hegth="30" ></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="/acount/admin/#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= utf8_encode($_SESSION['admNome'])?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/acount/admin/configuracoes.php" title="Configurações do Usuário" ><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
							<li><a href="/acount/logout.php" title="Sair da sua Conta" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div> <!-- navbar-header -->
		</div> <!-- container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Pesquisar">
			</div> <!-- form-group -->
		</form>
		<ul class="nav menu">
        	<li id="navAdminIndex" class=""><a href="/acount/admin/" title="Página Inicial da Administração" ><span class="glyphicon glyphicon-home"></span> Página Incial</a></li>
			<li id="navCriarProgama" class=""><a href="/acount/admin/criar-programa.php" title="Criar Programa" ><span class="glyphicon glyphicon-file"></span> Criar Programa</a></li>
            <li id="navAdminCad" class="parent ">
				<a href="#sub-item-1" data-toggle="collapse">
					<span class="glyphicon glyphicon-list"></span> Cadastrar <span class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="/acount/admin/cadastrar-turma.php" title="Cadastrar Turma"><span class="glyphicon glyphicon-file"></span> Turma</a></li>
                    <li><a href="/acount/admin/cadastrar-laboratorio.php" title="Cadastrar Laboratórios"><span class="glyphicon glyphicon-file"></span> Laboratório</a></li>
                    <li><a href="/acount/admin/cadastrar-habilidade.php" title="Cadastrar Habilidades referentes ao Professor"><span class="glyphicon glyphicon-file"></span> Habilidades</a></li> 
                    <li><a href="/acount/admin/cadastrar-professor.php" title="Cadastrar Professor"><span class="glyphicon glyphicon-file"></span> Professores</a></li>
					<li><a href="/acount/admin/criar-modulo.php" title="Cadastrar Módulos"><span class="glyphicon glyphicon-file"></span> Módulos</a></li>  
                    <li><a href="/acount/admin/cadastrar-funcionario.php" title="Cadastrar Funcionários da Administração"><span class="glyphicon glyphicon-file"></span> Funcionário</a></li> 
				</ul>
			</li>
			<li id="navAdminVinc" class="parent ">
				<a data-toggle="collapse" href="#sub-item-2">
					<span class="glyphicon glyphicon-list"></span> Vincular <span class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="/acount/admin/vincular-alunos.php" title="Vincular Alunos à Turma" ><span class="glyphicon glyphicon-random"></span> Alunos</a></li>
                    <li><a class="" href="/acount/admin/vincular-habilidades.php" title="Vincular Habilidades à Professores" ><span class="glyphicon glyphicon-random"></span> Habilidades</a></li>
					<li><a class="" href="/acount/admin/vincular-professor.php" title="Vincular Professores à Módulos" ><span class="glyphicon glyphicon-random"></span> Professores</a></li>
                    <li><a class="" href="/acount/admin/vincular-modulo.php" title="Vincular Módulos à Programa" ><span class="glyphicon glyphicon-random"></span> Módulos</a></li>
				</ul>
			</li>
            <li id="navLiberacoes" class="parent ">
				<a data-toggle="collapse" href="#sub-item-3">
					<span class="glyphicon glyphicon-list"></span> Liberar <span class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="/acount/admin/liberar-acesso.php" title="Liberar Acesso de Aluno à SGA" ><span class="glyphicon glyphicon-saved"></span> Alunos</a></li>
                    <li><a class="" href="/acount/admin/liberar-avaliacao.php" title="Vincular Habilidades à Professores" ><span class="glyphicon glyphicon-saved"></span> Avaliação Institucional</a></li>
				</ul>
			</li>
            <li id="navAltTurma" class=""><a href="/acount/admin/visualizar-avaliacao.php" title="Visualizar Avaliação Institucional dos Alunos" ><span class="glyphicon glyphicon-zoom-in"></span> Visualizar Avaliações</a></li>
            <li id="navAltTurma" class=""><a href="/acount/admin/alterar-turma.php" title="Alterar dados de Uma Turma" ><span class="glyphicon glyphicon-pencil"></span> Alterar Turma</a></li>
			<li id="navAdminConfig" class=""><a href="/acount/admin/configuracoes.php" title="Configurações do Usuário" ><span class="glyphicon glyphicon-wrench"></span> Configurações</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="/index.php" title="Página Inicial do Site SGA" ><span class="glyphicon glyphicon-home"></span> Página Inicial</a></li>
            <li><a href="/sobre.php" title="Sobre o SGA" ><span class="glyphicon glyphicon-credit-card"></span> Sobre</a></li>
            <li><a href="/contato.php" title="Entre em Contato Conosco" ><span class="glyphicon glyphicon-earphone"></span> Contato</a></li>
		</ul>
		
	</div><!-- sidebar -->