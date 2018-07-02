<?php
/**
 * Created by PhpStorm.
 * User: Fortes
 * Date: 16/06/2018
 * Time: 20:18
 */
//DATAS
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' ); 
date_default_timezone_set('America/Sao_Paulo');



    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bdnoticias";
    $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

//SET UTF8
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>