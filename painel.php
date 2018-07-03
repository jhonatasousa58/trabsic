<?php
    ob_start();
    session_start();
    include "inc/conectDB.php";
    include "inc/header.php";

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php?sair=true");
    }

    $stats = mysqli_query($conexao, "SELECT * FROM noticias");
    $cs = mysqli_num_rows($stats);
    $statsu = mysqli_query($conexao, "SELECT * FROM usuario");
    $csu = mysqli_num_rows($statsu);

?>
    <div class="container-flex">
        <?php include "inc/mlateral.php"; ?>

      <div class="parte-central">
          <?php include "inc/mtop.php"; ?>

          <div class="corpo-meio">
            <h2> Últimas Cadastradas </h2>

              <?php

              $noticia = mysqli_query($conexao,"SELECT * FROM noticias ORDER BY idNoticias desc LIMIT 5");
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
          </div>
      </div>    

<?php
    include "inc/footer.php";
?>