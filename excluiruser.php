<?php
    session_start();
    include 'inc/conectDB.php';

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
    }

    if ($_REQUEST['delete1']) {
        $pid = $_REQUEST['delete1'];
        $result = mysqli_query($conexao, "DELETE FROM usuario WHERE idUsuario = '$pid'");

        if($result){
            echo 'Registro excluido com sucesso!';
        }


    }