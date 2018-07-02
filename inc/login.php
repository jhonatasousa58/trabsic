<?php
ob_start();
session_start();
require_once('conectDB.php');

$acao = mysqli_real_escape_string($conexao, $_POST['acao']);

switch($acao){
    case 'login':
        $login = mysqli_real_escape_string($conexao, $_POST['login']);
        $pass = md5(mysqli_real_escape_string($conexao, $_POST['pass']));
        if(!trim($login) || !$pass){
            echo '0';
        }else{
            $readUser = mysqli_query($conexao,"SELECT * FROM usuario WHERE loginUsuario = '$login' AND senhaUsuario = '$pass' ");
            $cr = mysqli_num_rows($readUser);
            if($cr > 0):
                $_SESSION['userlogin']['login'] = $login;
                $_SESSION['userlogin']['senha'] = $pass;
                echo '1';
            else:
                echo '2';
            endif;
        }
        break;
    default:
        echo 'error';
}

ob_end_flush();