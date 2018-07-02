<?php
    ob_start();
    session_start();
    include "inc/conectDB.php";
    include "inc/header.php";

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
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
        <h2>Estatísticas</h2>

        <div class="container-flex" id="central">
          <div class="inf-boxes"> 
            <div style="padding: 5px;">

              <img src="Imagens/visitors.png" class="tam-fix-box">

            </div>
            <h5> <button class="btn btn-primary">  <?php echo $csu; ?></button></h5>

          </div>
          
          <div class="inf-boxes"> 

            <div style="padding: 5px;">

              <img src="Imagens/alvo.png" class="tam-fix-box">

            </div>
            <h5><button class="btn btn-primary"> <?php echo $cs; ?></button></h5>

          </div>


        </div>

        <h2> Últimas Cadastradas </h2>

          <div class="table-responsive">
              <table class="table table-striped table-hover">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Titulo Noticia Original</th>
                      <th>Titulo Noticia Português</th>
                      <th>Fonte</th>
                      <th>Link Noticia</th>
                      <th>Data Publicação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  $noticia = mysqli_query($conexao,"SELECT * FROM noticias LIMIT 5");
                  $i = 1;
                  while($noticias = mysqli_fetch_assoc($noticia)) {
                      echo '<tr>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$noticias['tituloOriginalNoticia'].'</td>
                                    <td>'.$noticias['tituloNoticiaPortugues'].'</td>
                                    <td>'.$noticias['fonteNoticia'].'</td>
                                    <td>'.$noticias['linkNoticia'].'</td>
                                    <td>'.$noticias['linkNoticia'].'</td>';
                      $i++;
                  }
                  ?>
                  </tbody>
              </table>
          </div>

      </div>    
    </div>
<?php
    include "inc/footer.php";
?>