<?php
    ob_start();
    session_start();
    include "inc/conectDB.php";
    include "inc/header.php";

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
    }

$doenca = mysqli_query($conexao,"SELECT * FROM doencas");

?>

<div class="container-flex">
    <?php include "inc/mlateral.php"; ?>
    <div class="parte-central">
        <?php include "inc/mtop.php"; ?>
        <div class="corpo-meio">

            <div class="titulo-centro">
                <h3> FORMULÁRIO DE EXTRAÇÃO DE INFORMAÇÕES DE NOTÍCIAS DA MÍDIA SOBRE EVENTOS DE INTERESSE A SAÚDE </h3>
            </div>
            <br>
            <div class="titulo-centro">
                <h4>DADOS GERAIS DA NOTÍCIA</h4>
            </div>
            <br>
            <form action="dadosdoenca.php" method="POST">
                <div class="form-group">
                    <label for="tituloOriginal">1) TÍTULO ORIGINAL DA NOTÍCIA:</label>
                    <input type="text" name="tituloOriginal" required class="form-control" id="tituloOriginal" placeholder="Título original da notícia">
                </div>
                <div class="form-group">
                    <label for="tituloPortugues">2) TÍTULO DA NOTÍCIA EM PORTUGUÊS:</label>
                    <input type="text" name="tituloPortugues" required class="form-control" id="tituloPortugues" placeholder="Título da notícia em português">
                </div>
                <div class="form-group">
                    <label for="fonteNoticia">3) FONTE DA NOTÍCIA:</label>
                    <input type="text" name="fonteNoticia" required class="form-control" id="fonteNoticia" placeholder="Fonte da notícia">
                </div>
                <div class="form-group">
                    <label for="linkNoticia">4) LINK DA NOTÍCIA:</label>
                    <input type="link" name="linkNoticia" required class="form-control" id="linkNoticia" placeholder="Link da notícia">
                </div>

                <div class="container-flex">
                    <div class="form-group padding-date">
                        <label for="linkNoticia">5) DATA DA PUBLICAÇÃO:</label>
                        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="dataPublicacao" required class="form-control tam-date" id="dataPublicacao" placeholder="Link da notícia">
                    </div>
                    <div class="form-group padding-date">
                        <label for="linkNoticia">6) DATA DA ATUALIZAÇÃO:</label>
                        <input type="date" name="dataAtualizacao" required class="form-control tam-date" id="dataAtualizacao" placeholder="Link da notícia">
                    </div>
                    <div class="form-group padding-date">
                        <label for="linkNoticia">7) DATA DA BUSCA:</label>
                        <input type="date" name="dataBusca" required class="form-control tam-date" id="dataBusca" placeholder="Link da notícia">
                    </div>
                </div>

                <div class="padding-10">
                    <button type="submit" name="btncadN" class="btn btn-success"> Avançar</button>
                </div>

            </form>


        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>