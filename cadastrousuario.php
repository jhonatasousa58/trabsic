<?php
session_start();
include 'inc/header.php'; 
include 'inc/conectDB.php';

?>

    <div class="container-flex">
        <?php include "inc/mlateral.php"; ?>

    <div class="parte-central">
         <?php include "inc/mtop.php"; ?>

        <div class="corpo-meio">
            <br>
            <center>
                <h3>Cadastro de Usuário</h3>
                <?php
                if(isset($_POST['cadU'])){
                    $nomeUser = mysqli_real_escape_string($conexao, $_POST['nome']);
                    $cargoUser = mysqli_real_escape_string($conexao, $_POST['cargo']);
                    $loginUser = mysqli_real_escape_string($conexao, $_POST['login']);
                    $senhaUser = md5(mysqli_real_escape_string($conexao, $_POST['senha']));
                    if($cargoUser == "Administrador" || $cargoUser == "administrador"){
                        $nivelUser = 2;
                    }else{
                        $nivelUser = 1;
                    }
                    $data = date("Y-m-d H:i:s");

                    $verifica = mysqli_query($conexao, "SELECT * FROM usuario WHERE loginUsuario = '$loginUser'");
                    $cv = mysqli_num_rows($verifica);
                    if($cv > 0){
                        echo '<div class="panel panel-danger"><div class="panel-body">Login ja existente</div></div>';
                    }else {
                        $cadUser = mysqli_query($conexao, "INSERT INTO usuario(nomeUsuario, loginUsuario, senhaUsuario, cargoUsuario, dataCadastro, nivelAcesso) VALUES ('$nomeUser', '$loginUser', '$senhaUser', '$cargoUser', '$data', '$nivelUser')");
                    }


                    if(mysqli_affected_rows($conexao)){
                        echo '<div class="panel panel-success"><div class="panel-body">Usuario Cadastrado com sucesso!</div></div>';
                    }else{
                        echo "Nao Cadastrou!";
                    }

                }
                ?>
                <form method="post" action="">
                    <table border="7">
                        <tr>
                            <td colspan="2"><center><h3>Informações Pessoais</h3></center></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Nome</td>
                            <td><center><input type="text" name="nome" size="50" maxlength="50"></center></td>
                        </tr>

                        <tr>
                            <td>&nbsp;Cargo</td>
                            <td><center><input type="text" name="cargo" size="50" maxlength="20"></center></td>
                        </tr>

                        <tr>
                            <td colspan="2"><center><h3>Entrada de dados para o login</h3>Digite apenas letras minúsculas
                                    e sem espaços em branco (preenchimento obrigatório)</center></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Login</td>
                            <td><center><input type="text" name="login" size="50" maxlength="45"></center></td>
                        </tr>

                        <tr>
                            <td>&nbsp;Senha</td>
                            <td><center><input type="password" name="senha" size="50" maxlength="20"></center></td>
                        </tr>


                        <td colspan="2"><center>Clique em enviar para enviar os dados</center></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center>
                                    <input type="reset" value="Limpar Formulario">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="submit" name="cadU" value="- Enviar Dados -">
                                </center></td>
                        </tr>
                    </table>
                </form>
            </center>
        </div>
    </div>
</div>

<?php
    include "inc/footer.php";
?>

