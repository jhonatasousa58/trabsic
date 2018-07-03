<?php include 'inc/conectDB.php';

$doenca = $_POST["novaDoenca"];

$sql = mysqli_query($conexao,"INSERT INTO doencas(nomeDoenca) VALUES ('$doenca')");

if(mysqli_affected_rows($conexao)){
	header( "Refresh:3; url=http://localhost/trabsic/doenca.php");
}else{
	echo "Nao Cadastrou!";
}

?>