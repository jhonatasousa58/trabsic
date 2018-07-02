<?php
ob_start();
session_start();

if(isset($_SESSION['userlogin'])){
    header("Location: painel.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/controller.js"></script>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
<div class="login-page">
    <div class="form">
        <form class="login-form" name="login" method="post" action="">
            <input type="text" name="login" required placeholder="login"/>
            <input type="password" name="pass" required placeholder="senha"/>
            <input type="submit" name="btnsend" value="Logar">
        </form>
    </div>
</div>

    <?php
        if(isset($_GET['sair'])){
            unset($_SESSION['userlogin']);
            echo '<div> Deslogado</div>';
        }

    ?>

<!-- The actual snackbar -->
<div id="snackbarf">Dados Não Conferem</div>
<div id="snackbars">Login Efetuado.</div>
</body>

</html>
<?php ob_end_flush(); ?>