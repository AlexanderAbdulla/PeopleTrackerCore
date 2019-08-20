<?php
    // includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';
    // session
    session_start();

    $db = new DbSuper();
    $result = $db->signupUser($_POST['usernameSignup'], $_POST['passwordSignup']);
    if(!$result) {
        $_SESSION['signupError'] = "There was an error signing you up. This email may be in use.";
        echo "<br> failed </br>";
        header('Location: ../index.php');
    } else {
        $db = new DbSuper();
        $user = $db->loginUser($_POST['usernameSignup'], $_POST['passwordSignup']);
        echo "<br> succeeded </br>";
        $_SESSION['user'] = serialize($user);
        header('Location: ../views/myPeople.php');
    }
/*
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
*/

?>