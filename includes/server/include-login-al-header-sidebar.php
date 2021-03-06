    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="adminLogo" href="/" ><img src="/images/logo.png" alt="Logo do SGA" title="Logo do SGA" width="150" hegth="30" ></a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= utf8_encode($_SESSION['alNome'])?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/acount/adminal/perfil.php" title="Perfil do Usuário" ><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                            <li><a href="/acount/adminal/configuracoes.php" title="Configurações do Usuário" ><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
                            <li><a href="/acount/logout.php" title="Sair da Conta" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div> <!-- navbar-header -->
        </div><!-- container-fluid -->
    </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Pesquisar">
            </div>
        </form>
        <ul class="nav menu">
            <li id="navAlIndex" class="" class="active"><a href="/acount/adminal/index.php" title="" ><span class="glyphicon glyphicon-home"></span> Página Inicial</a></li>
            <li id="navDisciplinas" class="" class="active"><a href="/acount/adminal/disciplinas.php" title="" ><span class="glyphicon glyphicon-tasks"></span> Disciplinas</a></li>
            <li id="navNotas" class=""><a href="/acount/adminal/notas.php" title="" ><span class="glyphicon glyphicon-th"></span> Notas</a></li>
            <li id="navAvaliacaoQualidade" class=""><a href="/acount/adminal/avaliacao-qualidade.php" title="Realizar a Avaliação de Qualidade do Instituto"><span class="glyphicon glyphicon-list-alt"></span> Avaliação de Qualidade</a></li>
            <li id="navPerfil" class=""><a href="/acount/adminal/perfil.php" title="Perfil do Usuario" ><span class="glyphicon glyphicon-list-alt"></span> Perfil</a></li>
            <li id="navConfiguracoes" class=""><a href="/acount/adminal/configuracoes.php" title="Configurações do Usuário" ><span class="glyphicon glyphicon-wrench"></span> Configurações</a></li>
            <li role="presentation" class="divider"></li>
            <li><a href="/" title="Página Inicial do Site SGA" ><span class="glyphicon glyphicon-home"></span> Página Inicial</a></li>
            <li><a href="/sobre.php" title="Sobre o SGA" ><span class="glyphicon glyphicon-credit-card"></span> Sobre</a></li>
            <li><a href="/contato.php" title="Entre em Contato Conosco" ><span class="glyphicon glyphicon-earphone"></span> Contato</a></li>
        </ul>
        
    </div><!-- sidebar -->