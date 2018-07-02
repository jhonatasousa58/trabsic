<?php

    $loginu = $_SESSION['userlogin']['login'];
    $senhau = $_SESSION['userlogin']['senha'];
    $sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE loginUsuario = '$loginu' AND senhaUsuario = '$senhau' ");
    $row = mysqli_fetch_assoc($sql);

    $nome = $row['nomeUsuario'];
    $nivel = $row['nivelAcesso'];

?>

<div class="dropdown menu-user">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?php echo $nome; ?>
        <span class="caret"></span>
    </button>
    <?php
        if($nivel == 2){

        ?>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <li><a href="cadastrousuario.php">Cadastrar Usuário</a></li>
                <li><a href="deletausuario.php">Deletar Usuário</a></li>
                <li><a href="index.php?sair=true">Sair</a></li>
            </ul>
    <?php
        }else{
    ?>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <li><a href="index.php?sair=true">Sair</a></li>
            </ul>
    <?php
        }
        ?>
</div>