<?php

    // includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';
    // start session
    session_start();
    
    $db = new DbSuper();
    echo 'trying to log you in dawg<br>';
    $user = $db->loginUser($_POST['usernameLogin'], $_POST['passwordLogin']);
    if(!$user) {
        $_SESSION['loginError'] = "This username / password combo is incorrect";
        header('Location: ../index.php');
    } else {
        $_SESSION['user'] = serialize($user); 
        header('Location: ../views/myPeople.php');
    }
?>