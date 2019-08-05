<?php
    // includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';
    $db = new DbSuper();
    echo 'trying to log you in dawg<br>';
    $user = $db->loginUser($_POST['usernameLogin'], $_POST['passwordLogin']);
    if(!$user) {
        echo "we failed with <br>";
        var_dump($user); 
        echo "<br>";
    } else {
        echo "we succeeded <br>";
        var_dump($user);
    }
?>