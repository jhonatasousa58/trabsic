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


        $bnot = mysqli_query($conexao, "SELECT * FROM noticias WHERE CONCAT_WS (tituloOriginalNoticia, tituloNoticiaPortugues, fonteNoticia, linkNoticia) LIKE '%".$busca."%'");
        $bdoe = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE nomeD LIKE '%".$busca."%'");
        $blna = mysqli_query($conexao, "SELECT * FROM localdoencanacional WHERE CONCAT_WS (regiao, estado, municipio, outro) LIKE '%".$busca."%'");
        $blin = mysqli_query($conexao, "SELECT * FROM localdoencainternacional WHERE CONCAT_WS(continente, pais, regiaoPais, outro) LIKE '%".$busca."%'");

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
                <label for="busca">Busca</label>
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
                            <th>Titulo Noticia Original</th>
                            <th>Titulo Noticia Português</th>
                            <th>Fonte</th>
                            <th>Link Noticia</th>
                            <th>Data Publicação</th>
                        </tr>
                        </thead>
                        <script>
                            $(document).ready(function() {
                                $(".clickable-row").click(function() {
                                    window.location = $(this).data("href");
                                });
                            });

                        </script>
                        <tbody>
                        <?php
                        if(isset($_POST['btnbusca'])){
                            $i = 1;

                            while($record = mysqli_fetch_assoc($bnot)) {
                                    echo '<tr style="cursor: pointer;" class="clickable-row" data-href="ver.php?id='.$record['idNoticias'].'">
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$record['tituloOriginalNoticia'].'</td>
                                        <td>'.$record['tituloNoticiaPortugues'].'</td>
                                        <td>'.$record['fonteNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td><button class="btn btn-danger delete_product" data-id="'.$record['idNoticias'].'">Excluir</button></td>';
                                $i++;
                            }
                            while($record = mysqli_fetch_assoc($bdoe)) {
                                $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                                while($record = mysqli_fetch_assoc($sql)) {
                                    echo '<tr style="cursor: pointer;" class="clickable-row" data-href="ver.php?id='.$record['idNoticias'].'">
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$record['tituloOriginalNoticia'].'</td>
                                        <td>'.$record['tituloNoticiaPortugues'].'</td>
                                        <td>'.$record['fonteNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td><button class="btn btn-danger delete_product" data-id="'.$record['idNoticias'].'">Excluir</button></td>';
                                $i++;
                            }
                                    
                                }
                            while($record = mysqli_fetch_assoc($blin)) {
                                $sql = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE iddadosDoenca = '$record[dadosDoenca_iddadosDoenca]'");
                                while($record = mysqli_fetch_assoc($sql)) {
                                    $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                                    while($record = mysqli_fetch_assoc($sql)) {
                                    echo '<tr style="cursor: pointer;" class="clickable-row" data-href="ver.php?id='.$record['idNoticias'].'">
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$record['tituloOriginalNoticia'].'</td>
                                        <td>'.$record['tituloNoticiaPortugues'].'</td>
                                        <td>'.$record['fonteNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td><button class="btn btn-danger delete_product" data-id="'.$record['idNoticias'].'">Excluir</button></td>';
                                $i++;
                            }
                                }

                            }
                            while($record = mysqli_fetch_assoc($blna)) {
                                $sql = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE iddadosDoenca = '$record[dadosDoenca_iddadosDoenca]'");
                                while($record = mysqli_fetch_assoc($sql)) {
                                    $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                                    while($record = mysqli_fetch_assoc($sql)) {
                                    echo '<tr style="cursor: pointer;" class="clickable-row" data-href="ver.php?id='.$record['idNoticias'].'">
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$record['tituloOriginalNoticia'].'</td>
                                        <td>'.$record['tituloNoticiaPortugues'].'</td>
                                        <td>'.$record['fonteNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td>'.$record['linkNoticia'].'</td>
                                        <td><button class="btn btn-danger delete_product" data-id="'.$record['idNoticias'].'">Excluir</button></td>';
                                $i++;
                            }
                                }
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

            $('.delete_product').click(function(e){

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


                                $.post('excluir.php', { 'delete':pid })
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