<?php include 'inc/conectDB.php';

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



echo $tituloO.'<br>';
echo $tituloP.'<br>';
echo $fonteN.'<br>';
echo $linkN.'<br>';
echo $dataP.'<br>';
echo $dataA.'<br>';
echo $dataB.'<br>';

echo $qtdD.'<br>';


$i = 0;
$asd = count($doencaN);
    print_r($doencaN);
    echo '<br>';
echo $local.'<br>';
$asd = count($local);

for($i=0;$i<$asd;$i++) {
    if ($local[$i] == "nacional") {
        print_r($regiaoN);
        echo '<br>';
        echo $estadoN . '<br>';
        echo $cidadeN . '<br>';
        echo $outroN . '<br>';
    } else {
        echo $continente . '<br>';
        echo $pais . '<br>';
        echo $regiaoP . '<br>';
        echo $outroP . '<br>';
    }
}
echo $referenciaI.'<br>';
echo $referenciaF.'<br>';
echo $dadosQ.'<br>';
echo $infoQual.'<br>';
echo $nsuspeitos.'<br>';
echo $nconfirmados.'<br>';
echo $nprovaveis.'<br>';
echo $nobitos.'<br>';
echo $outrosD.'<br>';