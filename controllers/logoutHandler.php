<?php
    echo 'logging out <br>';
    session_start();
    session_unset(); 
    session_destroy(); 
    header('Location: ../index.php');
?>