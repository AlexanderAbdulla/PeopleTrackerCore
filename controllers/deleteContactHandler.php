<?php
    // Includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';
    require_once '../models/contact.php';
    // Start session
    session_start();
    // Get our DB object
    $db = new DbSuper();
    $user = unserialize($_SESSION['user']);
    $contactID = $_GET['contactID'];
    $user->setConn($db->getConn());
    $user->deleteContact($contactID);    
    $_SESSION['user'] = serialize($user);
    header('Location: ../views/myPeople.php');
?>