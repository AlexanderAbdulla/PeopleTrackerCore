<?php
    // includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';

    $db = new DbSuper();
    $result = $db->signupUser($_POST['usernameSignup'], $_POST['passwordSignup']);
    if(!$result) {
        echo 'we have failed <br>';
    } else {
        echo 'we have succeeded <br>';
    }
?>