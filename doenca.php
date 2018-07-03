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
          <h3>Cadastro de nova doença</h3>
        </div>

            <?php
            if(isset($_POST['btnsDoenca'])) {
                $doenca = $_POST["novaDoenca"];

                $verifica = mysqli_query($conexao, "SELECT * FROM doencas WHERE nomeDoenca = '$doenca'");
                $cv = mysqli_num_rows($verifica);
                if($cv > 0){
                    echo '<div class="panel panel-danger"><div class="panel-body">Doença ja existente</div></div>';
                }else {
                    $sql = mysqli_query($conexao, "INSERT INTO doencas(nomeDoenca) VALUES ('$doenca')");
                    if(mysqli_affected_rows($conexao)){
                        echo '<div class="panel panel-success"><div class="panel-body">Doença Cadastrada com sucesso!</div></div>';
                    }else{
                        echo "Nao Cadastrou!";
                    }
                }


            }
            ?>

        <form action="" method="POST">
        <div class="form-group">
          <label for="novaDoenca">1) Nova doença</label>
          <input type="text" class="form-control" name="novaDoenca" id="novaDoenca" placeholder="Nova doença">
          <!-- Código para mandar os dados para o bd -->
          <small> <strong>*</strong>Procure escrever o nome da doença corretamente, para melhores resultados de buscas no futuro</small>
        </div>
         <button type="submit" name="btnsDoenca" class="btn btn-success"> Cadastrar</button>
        </form><br><br>
                <?php

                $doenca = mysqli_query($conexao,"SELECT * FROM doencas ORDER BY nomeDoenca asc");
                $i = 1;
                while($doencas = mysqli_fetch_assoc($doenca)) {
                    echo '<div class="panel panel-info resultpanel col-lg-3">
                             <div class="panel-body">
                                <div class="col-lg-9">'.$doencas['nomeDoenca'].'</div>
                                <div class="col-lg-3"> 
                                    <button class="btn btn-danger delete_product pull-right" data-id="'.$doencas['idDoenca'].'">Excluir</button>
                                </div>
                             </div>
                        </div>';
                    $i++;
                }
                ?>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.delete_product').click(function(e){
                e.preventDefault();
                var pid = $(this).attr('data-id');
                var parent = $(this).parent("div").parent("div");
                bootbox.dialog({
                    message: "Tem certeza que deseja deletar ?",
                    title: "<i class='glyphicon glyphicon-trash'></i> Excluir!",
                    buttons: {
                        success: {
                            label: "Não",
                            className: "btn-success",
                            callback: function() {
                                $('.bootbox').modal('hide');
                            }
                        },
                        danger: {
                            label: "Sim!",
                            className: "btn-danger",
                            callback: function() {
                                /*
                                using $.ajax();
                                $.ajax({
                                    type: 'POST',
                                    url: 'delete.php',
                                    data: 'delete='+pid
                                })
                                .done(function(response){
                                    bootbox.alert(response);
                                    parent.fadeOut('slow');
                                })
                                .fail(function(){
                                    bootbox.alert('Something Went Wrog ....');
                                })
                                */
                                $.post('excluirdoenca.php', { 'delete2':pid })
                                    .done(function(response){
                                        bootbox.alert(response);
                                        parent.fadeOut('slow');
                                    })
                                    .fail(function(){
                                        bootbox.alert('Aconteceu algo de errado ....');
                                    })
                            }
                        }
                    }
                });
            });
        });
    </script>
<?php
    include "inc/footer.php";
?>