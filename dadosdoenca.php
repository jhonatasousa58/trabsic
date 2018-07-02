<?php
    session_start();
    include 'inc/conectDB.php';
    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
    }
    if(isset($_POST['btncadN'])) {

        $tituloOriginal = mysqli_real_escape_string($conexao, $_POST['tituloOriginal']);
        $tituloPortugues = mysqli_real_escape_string($conexao, $_POST['tituloPortugues']);
        $fonteNoticia = mysqli_real_escape_string($conexao, $_POST['fonteNoticia']);
        $linkNoticia = mysqli_real_escape_string($conexao, $_POST['linkNoticia']);
        $dataPublicacao = mysqli_real_escape_string($conexao, $_POST['dataPublicacao']);
        $dataAtualizacao = mysqli_real_escape_string($conexao, $_POST['dataAtualizacao']);
        $dataBusca = mysqli_real_escape_string($conexao, $_POST['dataBusca']);

        $cadnoticia = mysqli_query($conexao,"INSERT INTO noticias(tituloOriginalNoticia, tituloNoticiaPortugues, fonteNoticia, linkNoticia, dataPublicacao, dataAtualizacao, dataBusca) VALUES ('$tituloOriginal', '$tituloPortugues', '$fonteNoticia', '$linkNoticia', '$dataPublicacao', '$dataAtualizacao', '$dataBusca')");
        $idN = mysqli_insert_id($conexao);
    }



    if(isset($_POST['btncadD'])) {
        $idN =  mysqli_real_escape_string($conexao, $_POST['idN']);
        $doencaN =  mysqli_real_escape_string($conexao, $_POST['doenca']);

        $nomeD = mysqli_query($conexao,"SELECT nomeDoenca FROM doencas WHERE idDoenca = '$doencaN' LIMIT 1");
        while($nomeDr = mysqli_fetch_assoc($nomeD)) {
            $nomeDo = $nomeDr['nomeDoenca'];
        }


        $referenciaI = mysqli_real_escape_string($conexao, $_POST['referenciaInicial']);
        $referenciaF = mysqli_real_escape_string($conexao, $_POST['referenciaFinal']);
        $dadosQ = mysqli_real_escape_string($conexao, $_POST['dadosQ']);
            if($dadosQ == "sim"){
                $infoQual = mysqli_real_escape_string($conexao, $_POST['infoQuali']);
                $nsuspeitos = mysqli_real_escape_string($conexao, $_POST['suspeitos']);
                $nconfirmados = mysqli_real_escape_string($conexao, $_POST['casosConfirm']);
                $nprovaveis = mysqli_real_escape_string($conexao, $_POST['casosProvaveis']);
                $nobitos = mysqli_real_escape_string($conexao, $_POST['obitos']);
                $outrosD = mysqli_real_escape_string($conexao, $_POST['outroDados']);
                $cadD = mysqli_query($conexao,"INSERT INTO dadosdoenca(periodoReferenciaInicio, periodoReferenciaFinal, dadosQuantitativos, informacoesQualitativas, nCasosSuspeitos, nCasosConfirmados, nCasosProvaveis, nObitos, outrosDados, noticias_idNoticias, doencas_idDoenca, nomeD) VALUES ('$referenciaI', '$referenciaF', '$dadosQ', '$infoQual', '$nsuspeitos', '$nconfirmados', '$nprovaveis', '$nobitos', '$outrosD', '$idN', '$doencaN', '$nomeDo')");
            }else{
                $cadD = mysqli_query($conexao,"INSERT INTO dadosdoenca(periodoReferenciaInicio, periodoReferenciaFinal, dadosQuantitativos, informacoesQualitativas, nCasosSuspeitos, nCasosConfirmados, nCasosProvaveis, nObitos, outrosDados, noticias_idNoticias, doencas_idDoenca, nomeD) VALUES ('$referenciaI', '$referenciaF', '$dadosQ', NULL, NULL, NULL, NULL, NULL, NULL, '$idN', '$doencaN', '$nomeDo')");
            }

        $idD = mysqli_insert_id($conexao);

        $local =  mysqli_real_escape_string($conexao, $_POST['optradio']);
        if($local == "nacional"){
            $regiaoN =  mysqli_real_escape_string($conexao, $_POST['regiao']);
            $estadoN = mysqli_real_escape_string($conexao, $_POST['estado']);
            $cidadeN = mysqli_real_escape_string($conexao, $_POST['cidade']);
            $outroN = mysqli_real_escape_string($conexao, $_POST['outroNacional']);
            $cadLD = mysqli_query($conexao, "INSERT INTO localdoencanacional(regiao, estado, municipio, outro, dadosDoenca_iddadosDoenca) VALUES ('$regiaoN', '$estadoN', '$cidadeN', '$outroN', '$idD')");
        }else{
            $continente = mysqli_real_escape_string($conexao, $_POST['continente']);
            $pais = mysqli_real_escape_string($conexao, $_POST['pais']);
            $regiaoP = mysqli_real_escape_string($conexao, $_POST['regPais']);
            $outroP = mysqli_real_escape_string($conexao, $_POST['outroPais']);
            $cadLD = mysqli_query($conexao, "INSERT INTO localdoencainternacional(continente, pais, regiaoPais, outro, dadosDoenca_iddadosDoenca) VALUES ('$continente', '$pais', '$regiaoP', '$outroP', '$idD')");
        }
    }

    include "inc/header.php";
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
                <h4>DADOS SOBRE A(S) DOENÇA(S)/AGRAVO(S)</h4>
            </div>
            <br>

            <form action="" method="post">
                <input type="hidden" value="<?php  echo $idN; ?>" name="idN">
                <div id="base">
                <div id="copia">
                        <div class="input-group mb-3 padding-date">
                            <label for="menu-doencas" class="padding-date">9) INFORME A DOENÇA:</label>
                            <select class="custom-select" id="menu-doencas" name="doenca" required>
                                <option value="" selected>Doenças</option>
                                <?php
                                $doenca = mysqli_query($conexao,"SELECT * FROM doencas");
                                while($doencas = mysqli_fetch_assoc($doenca)) {
                                    echo "<option value=".$doencas["idDoenca"].">".$doencas["nomeDoenca"]."</option>";
                                }
                                ?>
                            </select>
                            <small style="padding-left: 10px;">*Caso não encontre a doença, <a href="doenca.php">CLIQUE AQUI</a> para cadastra-la </small>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#menu-nacional").hide();
                                $("#menu-internacional").hide();
                                $("#menu-sim").hide();
                                $("#inQuali").hide();

                            });

                        </script>
                        <div class="input-group mb-3 padding-date">
                            <label for="menu-doencas" class="padding-date">10) INFORME A LOCALIDADE:</label>
                            <div class="radio-inline" id="opcao">
                                <label><input required class="radio-inline" value="nacional" id="nacional" onclick="show_menu()" type="radio" name="optradio">Nacional</label>
                            </div>

                            <div class="radio-inline">
                                <label><input type="radio" value="internacional" id="internacional" onclick="show_menu()" name="optradio">Internacional</label>

                            </div>
                        </div>

                        <div class="input-group mb-3 container-flex" id="menu-nacional">
                            <div class="menu-info col-lg-6">
                                <div class="form-group mb-3 padding-10">
                                    <label for="regiao">10.1) DIGITE A(S) REGIÃO(OES):</label>
                                    <input type="text" class="form-control" id="regiao" name="regiao" required placeholder="Digite a(s) Região(ões)">
                                </div>
                                <div class="form-group mb-3 padding-10">
                                    <label for="inNacional">10.3) CIDADE/MUNICÍPIO:</label>
                                    <input type="text" class="form-control" name="cidade" id="inNacional" placeholder="Digite a Cidade/Municípo">
                                </div>
                            </div>
                            <div class="menu-info col-lg-6">
                                <div class="form-group mb-3 padding-10">
                                    <label for="estado">10.2) DIGITE O(S) ESTADO(S):</label>
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o(s) Estado(s)">
                                </div>
                                <div class="form-group mb-3 padding-10">
                                    <label for="outro">10.4) OUTRO:</label>
                                    <input type="text" class="form-control" name="outroNacional" id="outro" placeholder="Outra informação">
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 container-flex" id="menu-internacional">
                            <div class="menu-info col-lg-6">
                                <div class="form-group mb-3 padding-10">
                                    <label for="continente">10.1) INFORME O PAÍS:</label>
                                    <input type="text" class="form-control" id="continente" required name="continente" placeholder="Digite o(s) Continente(s)">
                                </div>
                                <div class="form-group mb-3 padding-10">
                                    <label for="rePais">10.3) REGIÃO DO PAÍS:</label>
                                    <input type="text" class="form-control" id="regPais" name="regPais" placeholder="Região do País">
                                </div>
                            </div>
                            <div class="menu-info col-lg-6">
                                <div class="form-group mb-3 padding-10">
                                    <label for="inInternacional">10.2) INFORME O PAÍS:</label>
                                    <input type="text" class="form-control" name="pais" id="inInternacional" placeholder="Digite o País">
                                </div>
                                <div class="form-group mb-3 padding-10">
                                    <label for="outroPais">10.4) OUTRA INFORMAÇÃO:</label>
                                    <input type="text" class="form-control" id="outroPais" name="outroPais" placeholder="Outra informação">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container-flex menu-info">
                            <div class="form-group padding-10 col-lg-6">
                                <label for="referenciaInicial">11) Periodo de Referencia Inicial:</label>
                                <input type="date" name="referenciaInicial" required class="form-control" id="referenciaInicial">
                            </div>
                            <div class="form-group padding-10 col-lg-6">
                                <label for="referenciaFinal">11.1) Periodo de Referencia Final:</label>
                                <input type="date" name="referenciaFinal" required class="form-control" id="referenciaFinal">
                            </div>
                        </div>

                        <div class="input-group mb-3 padding-date">
                            <label for="dadosQuant" class="padding-date">12) POSSUI DADOS QUANTITATIVOS?</label>
                            <div class="radio-inline" id="opcao">
                                <label><input class="radio-inline" required value="sim" id="sim" onclick="show_menu_quanti()" type="radio" name="dadosQ">Sim</label>
                            </div>
                            <div class="radio-inline">
                                <label><input type="radio" value="nao" id="nao" onclick="show_menu_quanti()" name="dadosQ">Não</label>
                            </div>
                        </div>
                        <div class="form-group mb-3" id="menu-sim">

                            <div class="container-flex ">
                                <div class="menu-info col-lg-6">
                                    <div class="form-group mb-3 padding-10">
                                        <label for="suspeitos">12.1) NÚMERO DE CASOS SUSPEITOS:</label>
                                        <input type="number" class="form-control" style="" name="suspeitos" id="suspeitos" placeholder="Num casos suspeitos">
                                    </div>
                                    <div class="form-group mb-3 padding-10">
                                        <label for="casosProvaveis">12.3) NÚMERO DE CASOS PROVÁVEIS:</label>
                                        <input type="number" class="form-control" name="casosProvaveis" id="casosProvaveis" placeholder="Num casos provaveis">
                                    </div>
                                </div>
                                <div class="menu-info col-lg-6">
                                    <div class="form-group mb-3 padding-10">
                                        <label for="casosConfirm">12.2) NÚMERO DE  CASOS CONFIRMADOS:</label>
                                        <input type="number" class="form-control" name="casosConfirm" id="casosConfirm" placeholder="Num casos confirmados">
                                    </div>
                                    <div class="form-group mb-3 padding-10">
                                        <label for="obitos">12.4) NÚMERO DE ÓBITOS:</label>
                                        <input type="number" class="form-control" name="obitos" id="obitos" placeholder="Num Óbitos">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3 padding-10">
                                    <label for="outroDados">12.5) OUTRO:</label>
                                    <input type="text" class="form-control" name="outroDados" id="outroDados" placeholder="Outras informações">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" id="inQuali">
                            <div class="form-group mb-3 padding-date" id="inQuali">
                                <label for="infoQuali">12.1) INFORMAÇÕES QUALITATIVAS:</label>
                                <input type="text" class="form-control" name="infoQuali" id="infoQuali" placeholder="Informações Qualitativas">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="padding-10">
                    <button type="submit" name="btncadD" class="btn btn-success"> Cadastrar</button>
                </div>
            </form>



        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>