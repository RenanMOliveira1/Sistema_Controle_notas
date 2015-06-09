    <div class="row">
        <ol class="breadcrumb">
            <li>
            <?
				switch($_SESSION['autenticacao']){
					case "aluno":
						echo "<a href=\"/acount/adminal/\" title=\"Página Inicial\" ><span class=\"glyphicon glyphicon-home\"></span></a>";
						break;
					case "professor":
						echo "<a href=\"/acount/adminprof/\" title=\"Página Inicial (Módulos que Ministro)\" ><span class=\"glyphicon glyphicon-home\"></span></a>";
						break;
					case "administracao":
						echo "<a href=\"/acount/admin/\" title=\"Página Inicial\" ><span class=\"glyphicon glyphicon-home\"></span></a>";
						break;
				}
			?>
            </li>
            <li><?=TITULO?></li>
        </ol>
    </div> <!-- row -->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" ><?=TITULO?></h1>
        </div>
    </div> <!-- row -->