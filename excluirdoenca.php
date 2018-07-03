<?php
session_start();
include 'inc/conectDB.php';

if(!isset($_SESSION['userlogin'])){
    unset($_SESSION['userlogin']);
    header("Location: index.php");
}

if ($_REQUEST['delete2']) {
    $pid = $_REQUEST['delete2'];
    $result = mysqli_query($conexao, "DELETE FROM doencas WHERE idDoenca = '$pid'");

    if($result){
        echo 'Registro excluido com sucesso!';
    }


}