<?php 
include 'inc/header.php'; 
include 'inc/conectDB.php'; 

session_start();

?>

    <div class="container-flex">
        <?php include "inc/mlateral.php"; ?>

    <div class="parte-central">
         <?php include "inc/mtop.php"; ?>

        <div class="corpo-meio">
            <br>
            <center>
                <h3>Cadastro de Usuário</h3>

                <form method="post" action="caduser.php">
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
                            <td colspan="2"><center><h3>Entrada de dados para o logoff</h3>Digite apenas letras minúsculas
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
                                    <input type="submit" value="- Enviar Dados -">
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

