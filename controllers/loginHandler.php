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
        echo "we failed with <br>";
        var_dump($user); 
        echo "<br>";
    } else {
        //echo "we succeeded <br>";
        $_SESSION['user'] = serialize($user); 
       // var_dump($user);
        //echo $user->getUsername();
        header('Location: ../views/myPeople.php');
        //var_dump($user);
        //redirect to logged in view of all pages 
    }
?>