<body>
<div class="container-flex">
    <div class="barra-lateral">

        <nav style="position: fixed;">
            <ul class="list-group font-size">
                <li class="list-group-item back-list" > Menu</li>
                <a href="inicio.php"> <li class="list-group-item back-list"> <span class="glyphicon glyphicon-globe" style="padding-right: 5px;"></span> Inicio</li> </a>

                <li class="list-group-item back-list" id="button-menu">
                    <button  type="button" data-toggle="collapse" data-target="#demo" class="back-list"><span class="glyphicon glyphicon-plus" style="padding-right: 5px;" ></span> Cadastrar</button>

                    <div id="demo" class="collapse">
                        <ul class="list-group font-size">
                            <a href="cadastrar.php"> <li class="list-group-item back-list sub-menu"> <span class="glyphicon glyphicon-globe" style="padding-right: 5px;"></span> Notícia</li> </a>

                            <a href="doenca.php"> <li class="list-group-item back-list sub-menu"> <span class="glyphicon glyphicon-globe" style="padding-right: 5px;"></span> Doença</li> </a>

                        </ul>
                    </div>
                </li>

                <a href="cadastrados.php"><li class="list-group-item back-list"> <span class="glyphicon glyphicon-folder-open" style="padding-right: 5px;"></span> Cadastrados</li> </a>
            </ul>
        </nav>
    </div>

    <div class="parte-central">
        <div class="dropdown menu-user">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Nome Usuario
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <li><a href="#">Cadastrar Usuário</a></li>
                <li><a href="#">Deletar Usuário</a></li>
                <li><a href="#">Sair</a></li>
            </ul>
        </div>
