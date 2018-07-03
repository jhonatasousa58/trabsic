<?php
    session_start();
    include 'inc/conectDB.php';

    include "inc/header.php";

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
    }

    $idNot = $_GET['id'];
?>
    <div class="container-flex">
<?php include "inc/mlateral.php"; ?>
    <div class="parte-central">
        <?php include "inc/mtop.php"; ?>
        <div class="corpo-meio">
            <div class="corpo-meio">
                <h3>Dados Noticia:</h3>
                <?php

                $noticia = mysqli_query($conexao,"SELECT * FROM noticias WHERE idNoticias = '$idNot'");
                $i = 1;
                while($noticias = mysqli_fetch_assoc($noticia)) {
                    echo '<div class="panel panel-info resultpanel">
                             <div class="panel-body">
                                <div class="col-lg-4">Titulo Original: '.$noticias['tituloOriginalNoticia'].'</div>
                                <div class="col-lg-4">Titulo Portugues: '.$noticias['tituloOriginalNoticia'].'</div>
                                <div class="col-lg-4">Fonte Noticia: '.$noticias['fonteNoticia'].'</div>
                                <div class="col-lg-12">Link da Noticia: '.$noticias['linkNoticia'].'</div>
                                <div class="col-lg-4">Data Publicação: '.date('d/m/Y', strtotime($noticias['dataPublicacao'])).'</div>
                                <div class="col-lg-4">Data Atualização: '.date('d/m/Y', strtotime($noticias['dataAtualizacao'])).'</div>
                                <div class="col-lg-4">Data Busca: '.date('d/m/Y', strtotime($noticias['dataBusca'])).'</div>    
                             </div>
                        </div>';
                }
                ?>
                <h3>Dados Doença(s):</h3>
                <?php

                $doencas = mysqli_query($conexao,"SELECT * FROM dadosdoenca WHERE noticias_idNoticias = '$idNot'");
                $i = 1;
                while($doenca = mysqli_fetch_assoc($doencas)) {
                    echo '<div class="panel panel-info resultpanel">
                             <div class="panel-body">
                                <div class="col-lg-4">Nome: '.$doenca['nomeD'].'</div>
                                <div class="col-lg-4">Periodo Referencia Inicial: '.date("d/m/Y", strtotime($doenca['periodoReferenciaInicio'])).'</div>
                                <div class="col-lg-4">Periodo Referencia Final: '.date("d/m/Y", strtotime($doenca['periodoReferenciaFinal'])).'</div>';
                    if($doenca['dadosQuantitativos'] == "sim"){
                        echo '<div class="col-lg-3">Casos Suspeitos: '.$doenca['nCasosSuspeitos'].'</div>
                                <div class="col-lg-3">Casos Confirmados: '.$doenca['nCasosConfirmados'].'</div>
                                <div class="col-lg-3">Casos Provaveis: '.$doenca['nCasosProvaveis'].'</div>
                                <div class="col-lg-3">Numero de Obitos: '.$doenca['nObitos'].'</div>
                                <div class="col-lg-6">Outros Dados: '.$doenca['outrosDados'].'</div>';
                    }
                    echo '<div class="col-lg-6">Dados Qualitativos: '.$doenca['informacoesQualitativas'].'</div>';

                    $idD = $doenca['iddadosDoenca'];

                    $nacional = mysqli_query($conexao,"SELECT * FROM localdoencanacional WHERE dadosDoenca_iddadosDoenca = '$idD'");
                    $internacional = mysqli_query($conexao,"SELECT * FROM localdoencainternacional WHERE dadosDoenca_iddadosDoenca = '$idD'");
                    while($localnacional = mysqli_fetch_assoc($nacional)) {
                        echo '<div class="col-lg-4">Regiao(oes): '.$localnacional['regiao'].'</div>
                              <div class="col-lg-4">Estado(s): '.$localnacional['estado'].'</div>
                              <div class="col-lg-4">Municipio(s): '.$localnacional['municipio'].'</div>
                              <div class="col-lg-4">Outro(s): '.$localnacional['outro'].'</div>';
                    }
                    while($localinternacional = mysqli_fetch_assoc($internacional)) {
                        echo '<div class="col-lg-4">Continente(s): '.$localinternacional['continente'].'</div>
                              <div class="col-lg-4">País(es): '.$localinternacional['pais'].'</div>
                              <div class="col-lg-4">Regiao Pais: '.$localinternacional['regiaoPais'].'</div>
                              <div class="col-lg-4">Outro(s): '.$localinternacional['outro'].'</div>';
                    }
                    echo '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>
<?php
include "inc/footer.php";
?>