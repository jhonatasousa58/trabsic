<?php
  session_start();
  include 'inc/conectDB.php';
    include "inc/header.php";
?>

    <div class="container-flex">
        <?php include "inc/mlateral.php"; ?>
      <div class="parte-central">
          <?php include "inc/mtop.php"; ?>
        <div class="corpo-meio">

         <div>
           <h3>
             Doenças já cadastradas: 
           </h3>
         </div>
         <div>
           <!-- Código para puxar as doenças que ja estão cadastradas no bd -->
            <p>Aqui vai mostrar as doenças que ja foram cadastradas</p>         
         </div>

         <br>
        <div>
          <h3>Cadastro de nova doença</h3>
        </div>
        <br>
        <form action="cadastrarDoenca.php" method="POST">
        <div class="form-group">
          <label for="novaDoenca">1) Nova doença</label>
          <input type="text" class="form-control" name="novaDoenca" id="novaDoenca" placeholder="Nova doença">
          <!-- Código para mandar os dados para o bd -->
          <small> <strong>*</strong>Procure escrever o nome da doença corretamente, para melhores resultados de buscas no futuro</small>
        </div>
         <button type="submit" name="btnsDoenca" class="btn btn-success"> Cadastrar</button>
        </div>
        </form>


      <!-- recupera as doencas -->
          <table class="table table-hover">
              <thead>
              <tr>
                  <th>#</th>
                  <th>Nome</th>
              </tr>
              </thead>
              <tbody>
              <?php

              $doenca = mysqli_query($conexao,"SELECT * FROM doencas");
              $i = 1;
              while($doencas = mysqli_fetch_assoc($doenca)) {
                    echo '<tr>
                              <th>'.$i.'</th>
                              <td>'.$doencas['nomeDoenca'].'</td>
                              <td><a href="editar.php?id='.$doencas['idDoenca'].'" >Editar</a> </td>
                              <td><a href="deletar.php?id='.$doencas['idDoenca'].'" >Apagar</a> </td>
                          </tr>';
                    $i++;
                }
              ?>
              </tbody>
          </table>
      </div>
    </div>
<?php
    include "inc/footer.php";
?>