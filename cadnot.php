<?php include 'inc/conectDB.php';

if(isset($_POST['btncadN'])){
    $tituloO = $_POST['tituloOriginal'];
    $tituloP = $_POST['tituloPortugues'];
    $fonteN = $_POST['fonteNoticia'];
    $linkN = $_POST['linkNoticia'];
    $dataP = $_POST['dataPublicacao'];
    $dataA = $_POST['dataAtualizacao'];
    $dataB = $_POST['dataBusca'];

    $qtdD = $_POST['numDoencas'];

    $doencaN = $_POST['doenca'];
    $local = $_POST['optradio'];
    $regiaoN = $_POST['regiao'];
    $estadoN = $_POST['estado'];
    $cidadeN = $_POST['cidade'];
    $outroN = $_POST['outroNacional'];
    $continente = $_POST['continente'];
    $pais = $_POST['pais'];
    $regiaoP = $_POST['regPais'];
    $outroP = $_POST['outroPais'];

    $referenciaI = $_POST['referenciaInicial'];
    $referenciaF = $_POST['referenciaFinal'];
    $dadosQ = $_POST['dadosQ'];
    $infoQual = $_POST['infoQuali'];
    $nsuspeitos = $_POST['suspeitos'];
    $nconfirmados = $_POST['casosConfirm'];
    $nprovaveis = $_POST['casosProvaveis'];
    $nobitos = $_POST['obitos'];
    $outrosD = $_POST['outroDados'];


    print_r($doencaN);
    echo "<br>";
    echo implode(", ", $doencaN);
    $sql = sprintf( 'INSERT INTO tabela(numero) VALUES (%s)', implode( '), (' , $valores ) );
    print_r($referenciaF);
    echo "<br>";
    print_r($local);
    echo "<br>";
    print_r($cidadeN);
    echo "<br>";
    print_r($pais);

    //$cadnoticia = mysqli_query($conexao,"INSERT INTO noticias(tituloOriginalNoticia, tituloNoticiaPortugues, fonteNoticia, linkNoticia, dataPublicacao, dataAtualizacao, dataBusca, quantidadeDoencas) VALUES ('$tituloO', '$tituloP', '$fonteN', '$linkN', '$dataP', '$dataA', '$dataB', '$qtdD')");

    //$idN = mysqli_insert_id($conexao);

    //$sql =   mysqli_query($conexao,"INSERT INTO dadosdoenca(periodoReferenciaInicio, periodoReferenciaFinal, dadosQuantitativos, informacoesQualitativas, nCasosSuspeitos, nCasosConfirmados, nCasosProvaveis, nObitos, outrosDados, noticias_idNoticias, doencas_idDoenca) VALUES ('$referenciaI', '$referenciaF', '$dadosQ', '$infoQual', '$nsuspeitos', '$nconfirmados', '$nprovaveis', '$nobitos', '$outrosD', '$idN', '$doencaN')");

}