<?php

    include "inc/conectDB.php";

    $nomeUser = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cargoUser = mysqli_real_escape_string($conexao, $_POST['cargo']);
    $loginUser = mysqli_real_escape_string($conexao, $_POST['login']);
    $senhaUser = md5(mysqli_real_escape_string($conexao, $_POST['senha']));
    if($cargoUser == "Administrador" || $cargoUser == "administrador"){
        $nivelUser = 2;
    }else{
        $nivelUser = 1;
    }
    $data = date("Y-m-d H:i:s");

    $verifica = mysqli_query($conexao, "SELECT * FROM usuario WHERE loginUsuario = '$loginUser'");
    $cv = mysqli_num_rows($verifica);
    if($cv > 0){
        echo "Login ja existente";
    }else {
        $cadUser = mysqli_query($conexao, "INSERT INTO usuario(nomeUsuario, loginUsuario, senhaUsuario, cargoUsuario, dataCadastro, nivelAcesso) VALUES ('$nomeUser', '$loginUser', '$senhaUser', '$cargoUser', '$data', '$nivelUser')");
    }


    if(mysqli_affected_rows($conexao)){
        header( "Refresh:3; url=http://localhost/trabsi/cadastrousuario.php");
    }else{
        echo "Nao Cadastrou!";
    }


?>