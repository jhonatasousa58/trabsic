<?php
session_start();
include 'inc/conectDB.php';

if(!isset($_SESSION['userlogin'])){
    unset($_SESSION['userlogin']);
    header("Location: index.php");
}

if ($_REQUEST['delete3']) {
    $pid = $_REQUEST['delete3'];
    $result = mysqli_query($conexao, "DELETE FROM dadosdoenca WHERE iddadosDoenca = '$pid'");

    if($result){
        echo 'Registro excluido com sucesso!';
    }


}