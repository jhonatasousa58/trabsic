<?php
ob_start();
session_start();
include "inc/conectDB.php";
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

                <?php if(isset($_POST['btnbusca'])){

                    while($record = mysqli_fetch_assoc($bnot)) {
                        echo $record['tituloOriginalNoticia'].'<br>';
                    }
                    while($record = mysqli_fetch_assoc($bdoe)) {
                        echo $record['nomeD'].'<br>';
                        $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                        while($record = mysqli_fetch_assoc($sql)) {
                            echo $record['tituloOriginalNoticia'].'<br>';
                        }
                    }
                    while($record = mysqli_fetch_assoc($blin)) {
                        echo $record['continente'].'<br>';
                        $sql = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE iddadosDoenca = '$record[dadosDoenca_iddadosDoenca]'");
                        while($record = mysqli_fetch_assoc($sql)) {
                            $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                            while($record = mysqli_fetch_assoc($sql)) {
                                echo $record['tituloOriginalNoticia'].'<br>';
                            }
                        }

                    }
                    while($record = mysqli_fetch_assoc($blna)) {
                        echo $record['regiao'].'<br>';
                        $sql = mysqli_query($conexao, "SELECT * FROM dadosdoenca WHERE iddadosDoenca = '$record[dadosDoenca_iddadosDoenca]'");
                        while($record = mysqli_fetch_assoc($sql)) {
                            $sql = mysqli_query($conexao, "SELECT * FROM noticias WHERE idNoticias = '$record[noticias_idNoticias]' GROUP BY idNoticias");
                            while($record = mysqli_fetch_assoc($sql)) {
                                echo $record['tituloOriginalNoticia'].'<br>';
                            }
                        }
                    }

                }
                ?>

        </form>
    </div>
    </div>
</div>
<?php
include "inc/footer.php";
?>
