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

            <form action="" method="post">
            <div class="form-group">
                <label for="busca">Busca</label>
                <input type="text" name="busca" class="form-control" id="busca" placeholder="busca da notícia">
            </div>
            <div class="padding-10">
                <button type="submit" name="btnbusca" class="btn btn-success"> Buscar</button>
            </div>
            <div class="table-responsive">
                        <?php
                        if(isset($_POST['btnbusca'])){
                            $i = 1;
                            if($busca == "" || $busca == " "){
                                while ($record = mysqli_fetch_assoc($bnot)) {
                                    echo '<div class="panel panel-info resultpanel">
                                                 <div class="panel-body">
                                                    <div class="col-lg-4">Titulo Original: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Titulo Portugues: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Fonte Noticia: ' . $record['fonteNoticia'] . '</div>
                                                    <div class="col-lg-12">Link da Noticia: ' . $record['linkNoticia'] . '</div>
                                                    <div class="col-lg-4">Data Publicação: ' . date('d/m/Y', strtotime($record['dataPublicacao'])) . '</div>
                                                    <div class="col-lg-4">Data Atualização: ' . date('d/m/Y', strtotime($record['dataAtualizacao'])) . '</div>
                                                    <div class="col-lg-4">Data Busca: ' . date('d/m/Y', strtotime($record['dataBusca'])) . '</div>
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-danger delete_product pull-right" style="margin-left: 10px;" data-id="' . $record['idNoticias'] . '">Excluir</button>
                                                        <a class="btn btn-success pull-right" href="ver.php?id=' . $record['idNoticias'] . '">Ver</a>
                                                    </div>    
                                                 </div>
                                            </div>';
                                }
                            }else {
                                while ($record = mysqli_fetch_assoc($bnot)) {
                                    echo '<div class="panel panel-info resultpanel">
                                                 <div class="panel-body">
                                                    <div class="col-lg-4">Titulo Original: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Titulo Portugues: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Fonte Noticia: ' . $record['fonteNoticia'] . '</div>
                                                    <div class="col-lg-12">Link da Noticia: ' . $record['linkNoticia'] . '</div>
                                                    <div class="col-lg-4">Data Publicação: ' . date('d/m/Y', strtotime($record['dataPublicacao'])) . '</div>
                                                    <div class="col-lg-4">Data Atualização: ' . date('d/m/Y', strtotime($record['dataAtualizacao'])) . '</div>
                                                    <div class="col-lg-4">Data Busca: ' . date('d/m/Y', strtotime($record['dataBusca'])) . '</div>
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-danger delete_product pull-right" style="margin-left: 10px;" data-id="' . $record['idNoticias'] . '">Excluir</button>
                                                        <a class="btn btn-success pull-right" href="ver.php?id=' . $record['idNoticias'] . '">Ver</a>
                                                    </div>    
                                                 </div>
                                            </div>';
                                }
                                while ($record = mysqli_fetch_assoc($bdoe)) {
                                    $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                                    while ($record = mysqli_fetch_assoc($sql)) {
                                        echo '<div class="panel panel-info resultpanel">
                                                 <div class="panel-body">
                                                    <div class="col-lg-4">Titulo Original: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Titulo Portugues: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Fonte Noticia: ' . $record['fonteNoticia'] . '</div>
                                                    <div class="col-lg-12">Link da Noticia: ' . $record['linkNoticia'] . '</div>
                                                    <div class="col-lg-4">Data Publicação: ' . date('d/m/Y', strtotime($record['dataPublicacao'])) . '</div>
                                                    <div class="col-lg-4">Data Atualização: ' . date('d/m/Y', strtotime($record['dataAtualizacao'])) . '</div>
                                                    <div class="col-lg-4">Data Busca: ' . date('d/m/Y', strtotime($record['dataBusca'])) . '</div>
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-danger delete_product pull-right" style="margin-left: 10px;" data-id="' . $record['idNoticias'] . '">Excluir</button>
                                                        <a class="btn btn-success pull-right" href="ver.php?id=' . $record['idNoticias'] . '">Ver</a>
                                                    </div>    
                                                 </div>
                                            </div>';
                                        $i++;
                                    }
                                }
                                while ($record = mysqli_fetch_assoc($blin)) {
                                    $sql = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE iddadosDoenca = '$record[dadosDoenca_iddadosDoenca]'");
                                    while ($record = mysqli_fetch_assoc($sql)) {
                                        $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                                        while ($record = mysqli_fetch_assoc($sql)) {
                                            echo '<div class="panel panel-info resultpanel">
                                                 <div class="panel-body">
                                                    <div class="col-lg-4">Titulo Original: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Titulo Portugues: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Fonte Noticia: ' . $record['fonteNoticia'] . '</div>
                                                    <div class="col-lg-12">Link da Noticia: ' . $record['linkNoticia'] . '</div>
                                                    <div class="col-lg-4">Data Publicação: ' . date('d/m/Y', strtotime($record['dataPublicacao'])) . '</div>
                                                    <div class="col-lg-4">Data Atualização: ' . date('d/m/Y', strtotime($record['dataAtualizacao'])) . '</div>
                                                    <div class="col-lg-4">Data Busca: ' . date('d/m/Y', strtotime($record['dataBusca'])) . '</div>
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-danger delete_product pull-right" style="margin-left: 10px;" data-id="' . $record['idNoticias'] . '">Excluir</button>
                                                        <a class="btn btn-success pull-right" href="ver.php?id=' . $record['idNoticias'] . '">Ver</a>
                                                    </div>    
                                                 </div>
                                            </div>';
                                            $i++;
                                        }
                                    }

                                }
                                while ($record = mysqli_fetch_assoc($blna)) {
                                    $sql = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE iddadosDoenca = '$record[dadosDoenca_iddadosDoenca]'");
                                    while ($record = mysqli_fetch_assoc($sql)) {
                                        $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                                        while ($record = mysqli_fetch_assoc($sql)) {
                                            echo '<div class="panel panel-info resultpanel">
                                                 <div class="panel-body">
                                                    <div class="col-lg-4">Titulo Original: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Titulo Portugues: ' . $record['tituloOriginalNoticia'] . '</div>
                                                    <div class="col-lg-4">Fonte Noticia: ' . $record['fonteNoticia'] . '</div>
                                                    <div class="col-lg-12">Link da Noticia: ' . $record['linkNoticia'] . '</div>
                                                    <div class="col-lg-4">Data Publicação: ' . date('d/m/Y', strtotime($record['dataPublicacao'])) . '</div>
                                                    <div class="col-lg-4">Data Atualização: ' . date('d/m/Y', strtotime($record['dataAtualizacao'])) . '</div>
                                                    <div class="col-lg-4">Data Busca: ' . date('d/m/Y', strtotime($record['dataBusca'])) . '</div>
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-danger delete_product pull-right" style="margin-left: 10px;" data-id="' . $record['idNoticias'] . '">Excluir</button>
                                                        <a class="btn btn-success pull-right" href="ver.php?id=' . $record['idNoticias'] . '">Ver</a>
                                                    </div>    
                                                 </div>
                                            </div>';
                                            $i++;
                                        }
                                    }
                                }
                            }
                        }
                        
                            ?>
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