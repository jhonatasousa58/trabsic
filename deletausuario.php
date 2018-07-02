<?php
    session_start();
    include 'inc/conectDB.php';

    include "inc/header.php";

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
    }

     if(isset($_POST['btnbusca'])){
        $busca = mysqli_real_escape_string($conexao, $_POST['busca']);
        $bnot = mysqli_query($conexao, "SELECT * FROM usuario WHERE usuario.nomeUsuario LIKE '%".$busca."%' OR (usuario.loginUsuario LIKE '%".$busca."%')");

    }
?>
    <div class="container-flex">
        <?php include "inc/mlateral.php"; ?>
      <div class="parte-central">
          <?php include "inc/mtop.php"; ?>
          <div class="corpo-meio">
           <?php if(isset($_POST['btnbusca'])){ ?> <div>Resultados para: <?php echo $busca.'</div>'; } ?>
            <form action="" method="post">
            <div class="form-group">
                <label for="busca">Busca Usuário</label>
                <input type="text" name="busca" class="form-control" id="busca" placeholder="busca da notícia">
            </div>
            <div class="padding-10">
                <button type="submit" name="btnbusca" class="btn btn-success"> Buscar</button>
            </div>
            <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome Usuário</th>
                            <th>Login</th>
                            <th>Cargo</th>
                            <th>Data do Cadastro</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($_POST['btnbusca'])){
                            $i = 1;

                            while($record = mysqli_fetch_assoc($bnot)) {
                                $data = $record['dataCadastro'];
                                    echo '<tr>
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$record['nomeUsuario'].'</td>
                                        <td>'.$record['loginUsuario'].'</td>
                                        <td>'.$record['cargoUsuario'].'</td>
                                        <td>'.date('d/m/Y H:i:s', strtotime($data)).'</td>
                                        <td><button class="btn btn-danger delete_user" data-id="'.$record['idUsuario'].'">Excluir</button></td>';
                                $i++;
                            }
                             
                        }
                        
                            ?>
                        </tbody>
                    </table>
                </div>
                

        </form>
    </div>
        <div class="corpo-meio">
            
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function(){

            $('.delete_user').click(function(e){

                e.preventDefault();

                var pid = $(this).attr('data-id');
                var parent = $(this).parent("td").parent("tr");

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


                                $.post('excluir.php', { 'delete1':pid })
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