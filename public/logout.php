<?php
    /* inicia a sessão e destroi a sessão e manda o usuario para o index */
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();

?>