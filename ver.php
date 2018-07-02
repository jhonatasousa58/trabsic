<?php
    session_start();
    include 'inc/conectDB.php';

    include "inc/header.php";

    if(!isset($_SESSION['userlogin'])){
        unset($_SESSION['userlogin']);
        header("Location: index.php");
    }

?>
    <div class="container-flex">
<?php include "inc/mlateral.php"; ?>
    <div class="parte-central">
        <?php include "inc/mtop.php"; ?>
        <div class="corpo-meio">
            <div class="corpo-meio">

            </div>
        </div>
    </div>
<?php
include "inc/footer.php";
?>